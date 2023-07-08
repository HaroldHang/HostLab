#!bin/bash

/etc/init.d/nginx -t
/etc/init.d/nginx start
mysqld
ls /etc/init.d && ps
/var/www/build.sh
