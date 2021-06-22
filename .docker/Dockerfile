FROM php:7.4-fpm-alpine3.11

COPY . /var/www/html

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql opcache

# Install packages
RUN apk --no-cache --update add nginx

# Add user for laravel application
# RUN groupadd -g 1000 www
# RUN useradd -u 1000 -ms /bin/bash -g www www
# RUN useradd -G www-data
# RUN chown -R www-data:www-data /var/www/html/storage
COPY --chown=$user:www-data . /var/www/html
RUN chown -R /var/www/html
RUN chmod 755 /var/www/html/storage
# USER $user
USER 1000
# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]