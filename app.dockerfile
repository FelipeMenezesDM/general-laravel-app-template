FROM php:8.1-fpm-alpine
USER root
ARG APP_ENV
ARG PORT
ARG XDEBUG_MODE

WORKDIR /home/app

# Install PHP extensions dependencies
RUN apk add nginx musl curl oniguruma-dev zlib-dev libpng-dev zip memcached

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sockets

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
COPY ./infra/startup.sh /etc/nginx/startup.sh

# Install application
RUN if [ "${APP_ENV}" != "local" ]; then \
    composer install --no-dev; fi

# Install xDebug
RUN if [ "${APP_ENV}" != "prod" ]; then \
    apk add linux-headers $PHPIZE_DEPS && \
    pecl install xdebug && \
    docker-php-ext-enable xdebug; fi

RUN chown -R www-data: .;

CMD sh /etc/nginx/startup.sh
