#!bin/bash

#/etc/init.d/nginx configtest
#/etc/init.d/nginx start
#mysqld
#cat /etc/php/7.4/fpm/pool.d/www.conf
#ps aux
#ls /etc/init.d

/usr/bin/supervisord -n -c /etc/supervisor/supervisord.conf
/var/www/build.sh
