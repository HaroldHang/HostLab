#!bin/sh
/etc/init.d/nginx start
mysqld
/var/www/build.sh
