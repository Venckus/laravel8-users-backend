FROM php:7.4-fpm-alpine3.11

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql opcache 
# Install packages
RUN apk --no-cache --update add nginx supervisor

RUN chown -R www-data.www-data /var/www/html && \
    chown -R www-data.www-data /run && \
    chown -R www-data.www-data /var/lib/nginx && \
    chown -R www-data.www-data /etc/nginx && \
    chown -R www-data.www-data /var/log/nginx

COPY . /var/www/html
COPY --chown=www-data:www-data . /var/www/html

COPY .docker/fpm-pool.conf /etc/php7/php-fpm.d/www.conf
COPY .docker/nginx.conf /etc/nginx/nginx.conf
RUN rm /etc/nginx/conf.d/default.conf

COPY ./.docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

RUN chmod 755 /var/www/html/storage

USER www-data

CMD ["supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
