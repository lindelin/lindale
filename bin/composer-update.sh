#!/bin/sh

sudo composer update --optimize-autoloader --no-dev
sudo composer dump-autoload --optimize --no-dev