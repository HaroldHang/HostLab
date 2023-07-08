#!bin/bash

/etc/init.d/nginx configtest
/etc/init.d/nginx start
mysqld
ls /etc/init.d && ps
/var/www/build.sh
