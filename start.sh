#!/bin/sh

# Set permission
chmod -R 775 storage bootstrap/cache

# Buat storage link (jika kamu pakai upload/cetak PDF)
php artisan storage:link || true

# Generate key (optional kalau belum di Variables)
php artisan key:generate --force

# Serve Laravel ke Railway
php artisan serve --host=0.0.0.0 --port=8000
