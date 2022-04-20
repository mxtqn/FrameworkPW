FROM php:7.4.29-fpm

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer