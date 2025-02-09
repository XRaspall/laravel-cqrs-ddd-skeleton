FROM php:8.3-fpm-alpine

ADD ./www.conf /usr/local/etc/php-fpm.d/www.conf

RUN addgroup -g 1000 laravel && adduser -G laravel -g laravel -s /bin/sh -D laravel

RUN mkdir -p /var/www/html

ADD ./ /var/www/html

# RUN chmod -R 777 /var/www/html/storage
# RUN chmod -R 777 /var/www/html/bootstrap/cache

# RUN docker-php-ext-install pdo pdo_mysql
# Other PHP8 Extensions
# Instale as dependências necessárias
RUN apk add --no-cache autoconf g++ make openssl-dev \
    php-common \
    php-fpm \
    php-pdo \
    php-opcache \
    php-zip \
    php-phar \
    php-iconv \
    php-cli \
    php-curl \
    php-openssl \
    php-mbstring \
    php-tokenizer \
    php-fileinfo \
    php-json \
    php-xml \
    php-xmlwriter \
    php-simplexml \
    php-dom \
    php-pdo_mysql \
    php-pdo_sqlite \
    php-tokenizer \
    php-gd \
    php-zip \
    php-pecl-redis

RUN apk add --no-cache libxml2-dev
RUN docker-php-ext-install soap

RUN docker-php-ext-enable sodium

RUN apk add --no-cache --update \
    curl \
    openssl \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libzip-dev \
    unzip

RUN docker-php-ext-install zip && docker-php-ext-enable zip

RUN docker-php-ext-configure gd --with-freetype --with-jpeg && docker-php-ext-install gd && docker-php-ext-enable gd

RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli pdo_mysql

RUN curl -sS https://getcomposer.org/installer -o composer-setup.php \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && rm -rf composer-setup.php

RUN chown -R laravel:laravel /var/www/html
