#!bin/bash

/etc/init.d/nginx configtest
/etc/init.d/nginx start
#mysqld
ls /etc/init.d
/var/www/build.sh
ps aux
cat /etc/php/7.4/fpm/pool.d/www.conf
