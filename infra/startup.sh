#!/bin/sh

if [ "${APP_ENV}" != "local" ]; then
    sed -i "s,LISTEN_PORT,$PORT,g" /etc/nginx/nginx-octane.conf;
    nginx -c /etc/nginx/nginx-octane.conf;
    php artisan octane:start;
else
    sed -i "s,LISTEN_PORT,$PORT,g" /etc/nginx/nginx.conf;
    php-fpm -D;
    nginx;
fi;
