#!bin/sh
/etc/init.d/nginx start
mysqld
php fpm
/var/www/build.sh
