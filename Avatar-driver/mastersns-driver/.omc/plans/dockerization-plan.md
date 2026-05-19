# Dockerization Implementation Plan - mastersns-driver

## Principles
1.  **Isolation & Reproducibility**: Containers must encapsulate all dependencies (PHP 7.4, Node 10+, specific system libraries) to eliminate "works on my machine" issues.
2.  **Stateless App Containers**: All persistent data (MySQL, Redis, S3) must be externalized or volume-mounted; the app image should be immutable in production.
3.  **Developer Parity**: Local development environment should mirror production as closely as possible, using Docker Compose to orchestrate services.
4.  **Optimized Build Pipeline**: Use multi-stage Dockerfiles to separate heavy build-time dependencies (Node/Mix) from the lean runtime image (PHP-FPM/Nginx).

## Decision Drivers
1.  **Legacy Compatibility**: FuelPHP 1.7 requires PHP 7.4. The Docker images must strictly adhere to this version while enabling modern workflows.
2.  **Submodule Management**: The code resides in `ange_mastersns`. The plan must handle this directory structure correctly for both local development (volumes) and production (COPY).
3.  **Local Network Connectivity**: The app relies on MySQL and Redis. Local orchestration must provide reliable container-to-container communication using internal hostnames.

## Viable Options
### Option A: Single Unified Image (Apache + PHP)
- **Pros**: Simpler to manage (one Dockerfile).
- **Cons**: Poor separation of concerns; harder to scale; Apache is generally slower for high-concurrency PHP than Nginx+FPM.
- **Invalidation**: Dismissed in favor of industry-standard Nginx + PHP-FPM separation for better performance and scalability.

### Option B: Multi-Stage Nginx + PHP-FPM (Chosen)
- **Pros**: Clean separation; optimized image size; standard production architecture.
- **Cons**: Slightly more complex `docker-compose.yml` (requires two services for the web layer).
- **Rationale**: Best balance of performance and maintainability for a FuelPHP/Vue project.

## Implementation Steps

### 1. Dockerfile Structure (`ange_mastersns/Dockerfile`)
- **Stage 1 (Frontend Build)**:
  - Base: `node:10` (or appropriate version for Webpack 3).
  - Tasks: `npm install`, `npm run pro` to compile assets via Laravel Mix.
- **Stage 2 (Backend Build)**:
  - Base: `composer:2`.
  - Tasks: `composer install --no-dev`.
- **Stage 3 (Production Runtime)**:
  - Base: `php:7.4-fpm-alpine`.
  - Tasks: 
    - Install `mysqli`, `pdo_mysql`, `redis` extensions.
    - Copy code from previous stages.
    - Set permissions for `fuel/app/cache`, `fuel/app/logs`, and `fuel/app/tmp`.

### 2. Docker Compose Configuration (Root `docker-compose.yml`)
- **app**: PHP-FPM container.
  - Context: `./ange_mastersns`
  - Volumes: `./ange_mastersns:/var/www/html` (Dev mode)
  - Env: Reads from root `.env`.
- **web**: Nginx container.
  - Conf: Custom `nginx.conf` to handle FuelPHP rewrites and proxy `.php` to `app:9000`.
  - Ports: `80:80`.
- **db**: MySQL 5.7 (matching Aurora compatibility).
  - Ports: `3306:3306`.
- **redis**: Redis 6.0+.

### 3. Sync Mechanism
- **Local Development**: Host-to-container volume mapping for `ange_mastersns` ensures immediate feedback for PHP and JS changes.
- **Frontend HMR**: Optional configuration to run `npm run dev` with polling enabled for file change detection within the container.

## Pre-mortem (Failure Scenarios)
1.  **Permission Hell**: `fuel/app/logs` or `cache` becomes unreadable/unwritable by the FPM user (`www-data`).
    - *Mitigation*: Explicit `chown` in Dockerfile and entrypoint script to fix volume permissions.
2.  **Database Connection Refusal**: App fails to connect to `db` because it's looking for `localhost` instead of the service name `db`.
    - *Mitigation*: Use environment variables in FuelPHP config (`db.php`) to fallback to `env('DB_HOST', 'db')`.
3.  **Mix Build Failures**: Old `node_modules` or Node version mismatch breaks asset compilation.
    - *Mitigation*: Enforce a specific Node version in the build stage and ignore host `node_modules` via `.dockerignore`.

## Acceptance Criteria
- [ ] `docker-compose up` starts all 4 services without errors.
- [ ] Accessing `localhost` loads the FuelPHP application.
- [ ] Compiled Vue assets are correctly served by Nginx.
- [ ] Database migrations/queries successfully connect to the `db` container.
- [ ] Redis session storage is functional (verifiable via `redis-cli`).

🤖 Generated with [Claude Code](https://claude.com/claude-code)
