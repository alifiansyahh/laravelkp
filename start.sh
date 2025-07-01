#!/bin/bash

# Jalankan migrate
php artisan migrate --force

# Jalankan queue (opsional)
# php artisan queue:work &

# Jalankan Laravel dengan PHP built-in server
php artisan serve --host=0.0.0.0 --port=8080
