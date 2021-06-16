FROM php:7.4-fpm-alpine3.11

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql opcache

# Install packages
RUN apk --no-cache --update add nginx

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]