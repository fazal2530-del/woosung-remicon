#!/bin/bash
set -e

# Support Render dynamic PORT
PORT="${PORT:-80}"
echo "Configuring Apache for port ${PORT}..."
echo "Listen ${PORT}" > /etc/apache2/ports.conf
sed -i "s/<VirtualHost \*:[0-9]*>/<VirtualHost \*:${PORT}>/g" /etc/apache2/sites-available/000-default.conf

# Ensure .env exists
if [ ! -f /var/www/html/.env ]; then
    echo "Creating .env from .env.example..."
    cp /var/www/html/.env.example /var/www/html/.env
fi

# Set production environment defaults in .env
sed -i "s/APP_ENV=.*/APP_ENV=production/g" /var/www/html/.env
sed -i "s/APP_DEBUG=.*/APP_DEBUG=false/g" /var/www/html/.env
sed -i "s/DB_CONNECTION=.*/DB_CONNECTION=sqlite/g" /var/www/html/.env
sed -i "s|DB_DATABASE=.*|DB_DATABASE=/var/www/html/database/database.sqlite|g" /var/www/html/.env

# Setup SQLite database file
mkdir -p /var/www/html/database
touch /var/www/html/database/database.sqlite
chmod -R 777 /var/www/html/database
chmod 666 /var/www/html/database/database.sqlite

# Ensure storage directories exist and have proper permissions
mkdir -p /var/www/html/storage/framework/cache
mkdir -p /var/www/html/storage/framework/sessions
mkdir -p /var/www/html/storage/framework/views
mkdir -p /var/www/html/storage/logs
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database
chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache

# Generate application key if missing
php artisan key:generate --force || true

# Clear and cache configurations
php artisan config:clear
php artisan route:cache || true
php artisan view:cache || true

# Run database migrations and seeders
echo "Running migrations and seeds..."
php artisan migrate --force --seed || true

echo "Starting Apache on port ${PORT}..."
exec apache2-foreground
