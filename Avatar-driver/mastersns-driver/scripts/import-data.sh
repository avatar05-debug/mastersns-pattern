#!/bin/bash
set -e

FLAG_FILE=".data_imported"
DB_CONTAINER="db"

echo "📥 Importing Initial Data (This may take a while)..."
docker-compose exec -T $DB_CONTAINER mysql -uroot -p11111111 mastersns_mgpf < mysql/mastersns_mgpf.sql
docker-compose exec -T $DB_CONTAINER mysql -uroot -p11111111 mastersns_sandbox < mysql/mastersns_sandbox.sql
docker-compose exec -T $DB_CONTAINER mysql -uroot -p11111111 mastersns < mysql/mastersns.sql

touch "$FLAG_FILE"
echo "✅ Data import complete!"
