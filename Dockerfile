#install mysql
#ENV MYSQL_VERSION=8.0.33-1.el8
#FROM mysql:8 AS db

FROM php:7.4-fpm
#COPY --from=db /usr/bin/mysql /usr/bin/mysql
COPY ./php/local.ini /usr/local/etc/php/conf.d/local.ini
COPY . /var/www
RUN apt-get update && apt-get install -y \
    build-essential \
    #libpng-dev \
    #libjpeg62-turbo-dev \
    #libfreetype6-dev \
    locales \
    zip \
    #jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libzip-dev \
    wget dpkg \
    lsb-release gnupg
#RUN add-apt-repository ppa:ondrej/php && apt-get update
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo_mysql zip
#RUN php -m && exit 1
#RUN apt-get install php7.4-mysql php7.4-xml php7.4-xmlrpc php7.4-curl php7.4-gd php7.4-imagick php7.4-cli php7.4-dev php7.4-imap php7.4-mbstring php7.4-opcache php7.4-soap php7.4-zip php7.4-redis php7.4-intl -y

#install ngixn and mysql
RUN apt install -y nginx
RUN wget https://dev.mysql.com/get/mysql-apt-config_0.8.24-1_all.deb
RUN DEBIAN_FRONTEND=noninteractive dpkg -i mysql-apt-config_0.8.24-1_all.deb
RUN apt-get update
RUN apt install -y mysql-client

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

#RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
#RUN docker-php-ext-configure gd --with-gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/
#RUN docker-php-ext-install gd
# Configure nginx && mysql
COPY ./nginx/conf.d/* /etc.nginx/conf.d/



# Change current user to www
WORKDIR /var/www

#COPY ./.env.example ./.env
# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www
ENV COMPOSER_ALLOW_SUPERUSER 1
RUN composer install
#ENV MYSQL_ROOT_PASSWORD = ${MYSQL_ROOT_PASSWORD}
COPY --chown=www:www . /var/www
#USER www
# Expose port 9000 and start php-fpm server
RUN chmod +x ./start.sh
RUN chmod +x ./artisan
RUN chmod +x ./*.php
EXPOSE 9000
EXPOSE 3306
CMD ["./start.sh"]

