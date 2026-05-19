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

echo "⚙️ Running FuelPHP Migrations..."
docker-compose exec -T $APP_CONTAINER php oil refine migrate --all

touch "$FLAG_FILE"
echo "✨ Initialization complete!"
