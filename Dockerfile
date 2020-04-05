FROM composer:latest as build

COPY . /app

RUN composer install

FROM php:7.4-fpm-alpine

# Set Timezone
RUN apk add --no-cache tzdata
ENV TZ America/Sao_Paulo

RUN apk --no-cache add icu-dev \
    && docker-php-ext-install -j$(nproc) bcmath intl opcache mysqli pdo_mysql

RUN apk --no-cache add nginx supervisor curl

# Configure nginx
COPY .config/nginx.conf /etc/nginx/nginx.conf

# Configure PHP-FPM
COPY .config/fpm-pool.conf /usr/local/etc/php-fpm.d/www.conf
COPY .config/php.ini /usr/local/etc/php/conf.d/20_custom.ini

# Configure supervisord
COPY .config/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Make sure files/folders needed by the processes are accessable when they run under the nobody user
RUN chown -R nobody.nobody /run && \
  chown -R nobody.nobody /var/lib/nginx && \
  chown -R nobody.nobody /var/log/nginx && \
  mkdir /.npm && \
  mkdir /.config && \
  chown -R nobody.nobody /.npm && \
  chown -R nobody.nobody /.config

# Switch to use a non-root user from here on
USER nobody

# Add application
WORKDIR /var/www/html

COPY --from=build --chown=nobody /app /var/www/html/

#RUN composer run-script post-autoload-dump
RUN ./bin/console cache:clear --env=prod
RUN ./bin/console cache:warmup --env=prod

# Expose the port nginx is reachable on
EXPOSE 8080

ENTRYPOINT [ "supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf", "-n" ]
