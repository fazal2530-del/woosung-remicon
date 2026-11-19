#!/bin/sh
set -e

# Disable composer security advisory blocking
composer config policy.advisories.block false 2>/dev/null || true

# Run composer install if vendor does not exist
if [ ! -d "/var/www/vendor" ]; then
    echo "Installing composer dependencies..."
    composer install --no-interaction --prefer-dist --optimize-autoloader --no-audit || composer update --no-interaction --prefer-dist --optimize-autoloader
fi

# Ensure storage and bootstrap permissions
chmod -R 777 /var/www/storage /var/www/bootstrap/cache || true

# Wait for database connection if DB_HOST is mysql
if [ "$DB_CONNECTION" = "mysql" ]; then
    echo "Waiting for MySQL database connection..."
    max_retries=30
    counter=0
    while ! php -r "try { new PDO('mysql:host=$DB_HOST;port=$DB_PORT;dbname=$DB_DATABASE', '$DB_USERNAME', '$DB_PASSWORD'); exit(0); } catch (Exception \$e) { exit(1); }" 2>/dev/null; do
        sleep 2
        counter=$((counter + 1))
        if [ $counter -gt $max_retries ]; then
            echo "Warning: Database connection timed out. Proceeding anyway."
            break
        fi
    done
    echo "Database ready or bypassed."

    # Run migrations and seeders automatically
    php artisan migrate --force --seed || true
fi

echo "Starting PHP-FPM..."
exec php-fpm
