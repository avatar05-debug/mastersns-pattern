# Plan: FuelPHP Migration and Docker Setup

This plan outlines the steps to configure, start, and verify the MasterSNS project using Docker, ensuring database migrations are handled correctly within the FuelPHP framework.

## Context
- **Root Directory**: `/Users/avatar05/www/Projects/mastersns/Avatar-driver/mastersns-driver`
- **Application Directory**: `ange_mastersns`
- **Framework**: FuelPHP 1.8 (Environment: `development`)
- **Docker Components**: `angue_app`, `angue_webserver`, `db`, `redis`, `angue_phpmyadmin`

## Work Objectives
1. Start the Docker-based environment.
2. Verify and apply pending database migrations using FuelPHP's `oil` utility.
3. Validate the environment and connectivity.

## Guardrails
- **MUST** run migrations inside the `angue_app` container.
- **MUST** ensure `FUEL_ENV` is set to `development`.
- **MUST NOT** modify database credentials in `db.php` as they are already aligned with `.env`.
- **MUST** use `php oil refine migrate` for migrations.

## Task Flow

### 1. Environment Preparation
- [ ] Verify Docker Desktop is running.
- [ ] Check `.env` file for `FUEL_ENV=development`.
- [ ] Ensure `docker-compose.yaml` is present in the project root.

### 2. Infrastructure Startup
- [ ] Start Docker containers in detached mode.
  - **Command**: `docker-compose up -d`
- [ ] Wait for MySQL (`db`) to be ready for connections.
  - **Verification**: `docker-compose exec db mysqladmin ping -proot_password` (or via health check if available).

### 3. Migration Execution
- [ ] Check for pending migrations.
  - **Command**: `docker-compose exec angue_app php oil refine migrate --status`
- [ ] Run migrations.
  - **Command**: `docker-compose exec angue_app php oil refine migrate`
  - **Acceptance Criteria**: Command returns success and migration table is updated in `mastersns` database.

### 4. Verification & Validation
- [ ] Verify containers are running.
  - **Command**: `docker-compose ps`
- [ ] Test application connectivity.
  - **Check**: Access `http://localhost:8216` (Nginx port defined in `docker-compose.yaml`).
- [ ] Verify database connectivity from app.
  - **Check**: `docker-compose exec angue_app php oil refine migrate:current` (should show the latest migration version).

## Success Criteria
- All 5 containers (`angue_app`, `angue_webserver`, `db`, `redis`, `angue_phpmyadmin`) are `Up`.
- Database migrations are applied and up-to-date.
- `FUEL_ENV` is confirmed as `development` within the app container.

## Potential Risks
- **DB Connection Timeout**: MySQL might take time to initialize on first boot.
- **Volume Permissions**: Syncing `mastersns` directory to `/var/www` might require correct permissions on the host.
- **Empty Migrations Folder**: Currently, `fuel/app/migrations` only contains `.gitkeep`. If there are no migration files, the command will report "Already at the latest version."
