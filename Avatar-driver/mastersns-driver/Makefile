.PHONY: up down init import reset ps logs git-push git-pull

# Synchronization configuration
TARGET_DIR = /Users/avatar05/www/Projects/mastersns/Project-repo/ange_mastersns
SRC_DIR = $(CURDIR)/ange_mastersns

git-push:
	@CURRENT_BRANCH=$$(cd $(SRC_DIR) && git branch --show-current); \
	echo "Syncing branch [$$CURRENT_BRANCH] to Project-repo..."; \
	cd $(TARGET_DIR) && (git checkout $$CURRENT_BRANCH 2>/dev/null || git checkout -b $$CURRENT_BRANCH); \
	rsync -av --delete --exclude='.git' --exclude='node_modules' --exclude='.env' $(SRC_DIR)/ $(TARGET_DIR)/; \
	cd $(TARGET_DIR) && git add . && git commit -m "Auto-sync from Driver: $$(date)" || echo "No changes to commit"; \
	echo "Push complete on branch $$CURRENT_BRANCH."

git-pull:
	@CURRENT_BRANCH=$$(cd $(SRC_DIR) && git branch --show-current); \
	echo "Syncing branch [$$CURRENT_BRANCH] from Project-repo..."; \
	cd $(TARGET_DIR) && git checkout $$CURRENT_BRANCH; \
	rsync -av --delete --exclude='.git' --exclude='node_modules' --exclude='.env' $(TARGET_DIR)/ $(SRC_DIR)/; \
	echo "Pull complete on branch $$CURRENT_BRANCH."

up:
	docker-compose up -d

dev:
	docker-compose up

down:
	docker-compose down

init: up
	chmod +x scripts/init-project.sh
	./scripts/init-project.sh

import:
	chmod +x scripts/import-data.sh
	./scripts/import-data.sh

reset:
	@echo "🛑 WARNING: This will delete ALL data and volumes. Press Ctrl+C to cancel."
	@sleep 3
	docker-compose down -v
	rm -rf ./docker/db/db_data
	rm -f .initialized .data_imported
	$(MAKE) init
	$(MAKE) import

ps:
	docker-compose ps

logs:
	docker-compose logs -f
