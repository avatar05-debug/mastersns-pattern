#!/bin/bash

# Script to reset project: delete all data, rebuild, and re-init
echo "🛑 Stopping containers and removing volumes..."
docker-compose down -v

echo "🧹 Cleaning up database data directory..."
rm -rf ./docker/db/db_data

echo "🚀 Starting containers and building images..."
docker-compose up -d --build

echo "⏳ Waiting for MySQL to initialize (this may take 30-60 seconds)..."
until docker-compose exec -T db mysqladmin ping -proot -p11111111 > /dev/null 2>&1; do
    echo -n "."
    sleep 2
done
echo -e "\n✅ MySQL is up!"

echo "⚙️ Running FuelPHP Migrations..."
docker-compose exec -T angue_app php oil refine migrate --all

echo "📥 Importing Initial Data (This may take a while)..."
docker-compose exec -T db mysql -uroot -p11111111 mastersns_mgpf < mysql/mastersns_mgpf.sql
docker-compose exec -T db mysql -uroot -p11111111 mastersns_sandbox < mysql/mastersns_sandbox.sql
docker-compose exec -T db mysql -uroot -p11111111 mastersns < mysql/mastersns.sql

echo "✨ Reset complete!"
echo "📍 Access application at: http://localhost:8216"
echo "📍 Access PHPMyAdmin for manual import at: http://localhost:8215"
