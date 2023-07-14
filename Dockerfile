FROM php:8.2.5-fpm
WORKDIR /var/www/html
COPY . .

ENV COMPOSER_ALLOW_SUPERUSER=1
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN apt-get update && apt-get install -y git zip

RUN composer install \
    && install-php-extensions \
        ctype \
        iconv \
        pdo_mysql
