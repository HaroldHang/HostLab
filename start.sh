#!bin/bash
/etc/init.d/nginx start
service mysql start
/var/www/build.sh
