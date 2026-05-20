#!/bin/bash
set -e

FLAG_FILE=".initialized"
DB_CONTAINER="db"
APP_CONTAINER="angue_app"

if [ -f "$FLAG_FILE" ]; then
    echo "⚠️ Project already initialized. Delete $FLAG_FILE to re-run."
    exit 0
fi

echo "⏳ Waiting for MySQL to be fully ready for connections..."
until docker-compose exec -T $DB_CONTAINER mysql -uroot -p11111111 -e "SELECT 1" > /dev/null 2>&1; do
    echo -n "."
    sleep 3
done
echo -e "\n✅ MySQL is ready!"

echo "📦 Installing Composer dependencies..."
docker-compose exec -T $APP_CONTAINER composer install

echo "📂 Setting up permissions for cache and logs..."
docker-compose exec -T $APP_CONTAINER mkdir -p fuel/app/cache/fuel/agent
docker-compose exec -T $APP_CONTAINER mkdir -p fuel/app/logs
docker-compose exec -T $APP_CONTAINER chmod -R 777 fuel/app/cache fuel/app/logs

echo "⚙️ Running FuelPHP Migrations..."
docker-compose exec -T $APP_CONTAINER php oil refine migrate --all

touch "$FLAG_FILE"
echo "✨ Initialization complete!"
