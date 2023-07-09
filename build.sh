#!bin/sh
#php7.4-fpm
cd /var/www
pwd
php artisan key:generate
#php artisan migrate:refresh
#php artisan db:seed
php artisan cache:clear
#php artisan config:clear && \
php artisan route:clear
php artisan view:clear
php artisan clear-compiled
cd /
