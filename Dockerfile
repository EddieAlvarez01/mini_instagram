FROM php:7.4-apache
RUN a2enmod rewrite
RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libicu-dev \
    libxml2-dev \
    libpq-dev \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip intl xmlrpc soap opcache \
    && docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd

RUN apt-get update -y

## add Node 12
RUN curl -sL https://deb.nodesource.com/setup_12.x | bash -- \
    && apt-get install -y nodejs

COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY docker/vhost.conf /etc/apache2/sites-available/000-default.conf

ENV COMPOSER_ALLOW_SUPERUSER 1

WORKDIR /var/www/html/
COPY . .
RUN chown -R www-data:www-data /var/www/html  \
    && composer install  && composer dumpautoload && npm install
