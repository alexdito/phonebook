FROM php:7.4-fpm

WORKDIR /application

RUN apt-get update \
    && apt-get install -y \
        libwebp-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libxpm-dev \
        libzip-dev \
        libfreetype6-dev \
        libzip-dev \
        zip \
        cron \
        libxml2-dev \
        libsodium-dev \
    && pecl install libsodium-2.0.23 \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip \
    && docker-php-ext-enable sodium \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        mysqli \
        pdo_mysql \
        gd \
        soap \
    && pecl install xdebug-3.1.0 \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin/ --filename=composer \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

#        memcache \
#        memcached \
#        intl \
#        pdo_mysql \
#        mcrypt \
#        opcache \
#        interbase \
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
COPY ./php-ini-overrides.ini /usr/local/etc/php/conf.d/php-ini-overrides.ini

