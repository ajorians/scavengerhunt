#!/bin/bash

echo "doing replacements"
sed -i "s/localhost/${DATABASE_HOST}/g" /var/www/html/index.php
sed -i "s/scavengeruser/${DATABASE_USER}/g" /var/www/html/index.php
sed -i "s/scavengerpassword/${DATABASE_PASSWD}/g" /var/www/html/index.php
sed -i "s/scavengerhuntdb/${DATABASE_DB}/g" /var/www/html/index.php
#exec "$@"
echo "Starting PHP"
#docker-php-entrypoint $@
exec apache2-foreground
