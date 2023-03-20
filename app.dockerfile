FROM php:8.1-fpm-alpine
USER root
ARG APP_ENV
ARG PORT
ARG XDEBUG_MODE

WORKDIR /home/app

# Install PHP extensions dependencies
RUN apk add nginx musl curl oniguruma-dev zlib-dev libpng-dev zip memcached linux-headers $PHPIZE_DEPS

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
COPY ./infra/*.conf /etc/nginx/
COPY ./infra/startup.sh /etc/nginx/startup.sh

# Install application
RUN if [ "${APP_ENV}" != "local" ]; then \
    pecl install swoole && \
    docker-php-ext-enable swoole && \
    composer install --no-dev && \
    chown -R www-data: .; fi

# Install xDebug and Infection
RUN if [ "${APP_ENV}" != "prod" ]; then \
    curl -sSL -O https://github.com/infection/infection/releases/download/0.26.19/infection.phar && \
    chmod a+x infection.phar && \
    mv infection.phar /usr/local/bin/infection && \
    pecl install xdebug && \
    docker-php-ext-enable xdebug; fi

CMD sh /etc/nginx/startup.sh
