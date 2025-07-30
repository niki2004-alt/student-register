#!/bin/bash

echo " Running migrations and seeding database"

php artisan migrate:fresh --seed

echo " Seeding complete!
