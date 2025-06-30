#!/bin/sh

# Jalankan migrasi (opsional)
php artisan migrate --force

# Jalankan Laravel server di host publik
php artisan serve --host=0.0.0.0 --port=8000
