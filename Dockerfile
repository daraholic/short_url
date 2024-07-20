FROM php:8.2.21-fpm-alpine3.20

RUN apk update && apk add --no-cache \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd


COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /www

COPY . /www

RUN set -eux; \
    composer install -o --no-ansi --no-progress; \
    chmod -R 777 /www/storage; \
    chown -R www-data:www-data /www
