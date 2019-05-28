#!/usr/bin/env bash

chown -R www-data:www-data /var/www

chmod -R 777 /var/log
mkdir -p /var/log/apache2 && \
chown -R www-data:www-data /var/log/apache2 && \
chmod -R 750 /var/log/apache2

mkdir -p /var/log/application/phalcontest
chown -R www-data:www-data /var/log/application/phalcontest && \
chmod -R 750 /var/log/application/phalcontest

touch /var/log/apache2/access.log

service apache2 start

tail -f /var/log/apache2/access.log