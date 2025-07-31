#!/bin/sh

# # Load .env values into shell
# export $(grep -v '^#' .env | xargs)

# service mariadb start

# # Wait until the DB is ready
# until nc -z -v -w30 127.0.0.1 3306
# do
#   echo "Waiting for MySQL..."
#   sleep 5
# done

# # Create database and user if not exist
# mysql -u root <<-EOSQL
#   CREATE DATABASE IF NOT EXISTS ${DB_DATABASE} CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
#   CREATE USER IF NOT EXISTS '${DB_USERNAME}'@'%' IDENTIFIED BY '${DB_PASSWORD}';
#   GRANT ALL PRIVILEGES ON ${DB_DATABASE}.* TO '${DB_USERNAME}'@'%';
#   FLUSH PRIVILEGES;
# EOSQL

# Run Laravel setup commands
php artisan key:generate
php artisan migrate --force
# Run database seed script
echo "Running Laravel migrations and seeders..."
sh ./seed.sh

# Start PHP-FPM and Nginx
php-fpm
# nginx -g 'daemon off;'
