#!/bin/sh

sudo chown -R www-data:www-data .
sudo chmod -R 777 storage
sudo chmod -R 777 bootstrap/cache
sudo chmod 600 storage/oauth*
sudo php artisan queue:restart
sudo supervisorctl restart all