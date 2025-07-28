#!/bin/bash
service mariadb start

mysql -uroot -e "CREATE DATABASE IF NOT EXISTS student_register_app;"
mysql -uroot -e "ALTER USER 'root'@'localhost' IDENTIFIED BY '';"
mysql -uroot -e "GRANT ALL ON student_register_app.* TO 'root'@'localhost';"

php-fpm &
nginx -g "daemon off;"
