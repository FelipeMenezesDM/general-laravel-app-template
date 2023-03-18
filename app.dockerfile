FROM php:8.1-fpm-alpine
USER root
ARG APP_ENV
ARG PORT
ARG XDEBUG_MODE

WORKDIR /home/app

# Install PHP extensions dependencies
RUN apk update && apk upgrade && apk add nginx musl git curl oniguruma-dev zlib-dev libpng-dev zip memcached

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sockets opcache

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

# Environment variables
ENV PORT=$PORT
ENV APP_ENV=$APP_ENV
ENV XDEBUG_MODE=$XDEBUG_MODE
ENV XDEBUG_CONFIG="discover_client_host=false client_host=host.docker.internal"

# Copy project
COPY ./app .
COPY ./infra/nginx.conf /etc/nginx/nginx.conf

# Install application
RUN if [ "${APP_ENV}" != "local" ]; then \
    composer install --no-dev && \
    php artisan passport:keys --force && \
    chown -R www-data: .; fi

# Install xDebug
RUN if [ "${APP_ENV}" != "prod" ]; then \
    apk add linux-headers $PHPIZE_DEPS && \
    pecl install xdebug && \
    docker-php-ext-enable xdebug; fi

CMD sh ./infra/startup.sh
