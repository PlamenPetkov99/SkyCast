# 1. Use an official PHP image with Apache/Nginx pre-configured
FROM php:8.3-apache

# 2. Install necessary system extensions for Symfony (like zip, intl)
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip libintl-dev \
    && docker-php-ext-install zip intl

# 3. Enable Apache mod_rewrite for Symfony's routing system
RUN a2enmod rewrite

# 4. Change Apache's document root to Symfony's /public folder
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 5. Copy your project files into the container
COPY . /var/www/html

# 6. Install Composer inside the container
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# 7. Give Apache permission to read files and write to Symfony's cache
RUN chown -R www-data:www-data /var/www/html/var

# 8. Expose port 80 for Render
EXPOSE 80
USER nobody
