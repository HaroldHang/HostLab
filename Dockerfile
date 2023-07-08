FROM ubuntu/mysql:latest

RUN apt update
#RUN apt upgrade -y
RUN apt -y install software-properties-common
RUN apt-add repository ppa:ondrej/php
RUN apt-get update

# Install nginx, php-fpm and supervisord from ubuntu repository
RUN apt install -y nginx php-7.4 php-fpm supervisor
RUN apt-get install -y \
    git \
    curl \
    wget \
    dpkg \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip
RUN apt install php7.4-common php7.4-zip php7.4-curl php7.4-xml php7.4-xmlrpc php7.4-json php7.4-mysql php7.4-pdo php7.4-gd php7.4-imagick php7.4-ldap php7.4-imap php7.4-mbstring php7.4-intl php7.4-cli php7.4-tidy php7.4-bcmath php7.4-opcache
#Get composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ENV nginx_vhost /etc/nginx/sites-available/default
ENV nginx_conf /etc/nginx/nginx.conf
ENV php_conf /etc/php/7.4/fpm/php.ini
ENV supervisor_conf /etc/supervisor/supervisord.conf
# Allow composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

COPY ./nginx/conf.d/app.conf ${nginx_vhost}

RUN sed -i -e 's/;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/g' ${php_conf} && echo "\ndaemon off;" >> ${nginx_conf}
RUN chown -R www-data:www-data /var/www
RUN chown -R www-data:www-data /var/www/storage
RUN chown -R www-data:www-data /var/www/bootstrap/cache

# Volume configuration
VOLUME ["/etc/nginx/sites-enabled", "/etc/nginx/certs", "/etc/nginx/conf.d", "/var/log/nginx", "/var/www/html", "/var/run","/var/lib/mysql"]

RUN composer install
RUN chmod +x ./build.sh
COPY ./start.sh /start.sh
WORKDIR /
RUN chmod +x ./start.sh
EXPOSE 80
EXPOSE 443
