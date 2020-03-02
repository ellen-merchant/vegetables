FROM php:7.4-fpm

RUN apt-get update && apt-get install -y libpq-dev libzip-dev \
    && docker-php-ext-install -j$(nproc) pdo pdo_pgsql pgsql