FROM php:7.4-fpm

RUN apt-get update -y \
    && apt-get install -y \
        libpng-dev libjpeg-dev libfreetype6-dev zlib1g-dev \
        libjpeg62-turbo-dev \
        libwebp-dev \
        libonig-dev \
        libzip-dev \
        libcurl4-openssl-dev \
        libmcrypt-dev \
        libmagickwand-dev \ 
        sendmail \ 
    && docker-php-ext-install pdo pdo_mysql zip \ 
    && apt-get install -y npm

RUN pecl install imagick && docker-php-ext-enable imagick

RUN pecl install mcrypt && docker-php-ext-enable mcrypt

RUN docker-php-ext-install mysqli

RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd
RUN docker-php-ext-enable gd
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN npm install -g n
RUN n 16
RUN apt purge nodejs npm -y
RUN service sendmail restart

WORKDIR /var/www

EXPOSE 9000

CMD ["php-fpm"]
