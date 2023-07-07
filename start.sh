#!bin/bash

/etc/init.d/nginx start
service mysql start
RUN ls /etc/init.d && ps
/var/www/build.sh
