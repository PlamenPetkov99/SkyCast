FROM php:8.3-apache

RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip libicu-dev libcurl4-openssl-dev \
    && docker-php-ext-install zip intl curl

RUN a2enmod rewrite

ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

COPY . /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN composer install --no-dev --optimize-autoloader

RUN php bin/console cache:clear --env=prod
RUN chown -R www-data:www-data /var/www/html/var

EXPOSE 80
