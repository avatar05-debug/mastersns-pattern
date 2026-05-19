# Plan: Docker Path Alignment and Credential Sync (v2)

This plan aligns the Docker configuration with the actual codebase structure, stabilizes persistence using named volumes, and synchronizes credentials to ensure a successful local deployment.

## Context
Previous attempts failed due to missing host paths for volumes and credential mismatches between the application and the database container.

## RALPLAN-DR Summary

### Principles
- **Immutable Persistence**: Prefer named volumes over host paths for internal container data (DB, logs) to eliminate host-specific path errors.
- **Single Source of Truth**: Synchronize `.env` and `docker-compose.yaml` to prevent authentication failures.
- **Directory Consistency**: Ensure volume mappings reflect the actual project subdirectory (`ange_mastersns`).
- **Clean Slate**: Purge stale state before reconfiguration.

### Decision Drivers
1. **Reliability**: Eliminating "mount path not found" errors.
2. **Connectivity**: Ensuring the app and phpMyAdmin can actually talk to the database.
3. **Security**: Removing sensitive tokens from versioned or shared environment files.

### Options
- **Option 1: Host-path volumes (Current)**: Rejected. High risk of "directory not found" and permission errors.
- **Option 2: Named volumes (Proposed)**: Selected. Bypasses host filesystem dependency for internal data persistence.

---

## Task Flow

### 1. Operational Cleanup
Purge all existing containers, networks, and volumes to prevent state contamination.
- **Action**: Run `docker-compose down -v`.
- **Acceptance Criteria**: `docker ps -a` shows no `angue_*` containers; `docker volume ls` shows no project volumes.

### 2. Volume and Path Alignment
Update `docker-compose.yaml` to use the correct source directory and switch persistence to named volumes.
- **Action**: 
    - Rename `./mastersns` to `./ange_mastersns` in all service definitions.
    - Replace host path `./docker/db/db_data` with named volume `db_data`.
    - Replace host path `./docker/domain/logs/toppage` with named volume `app_logs`.
    - Declare `volumes:` block at the top level of `docker-compose.yaml`.
- **Acceptance Criteria**: `docker-compose config` executes without errors and reflects named volumes.

### 3. Credential Synchronization
Align database credentials across the environment.
- **Action**:
    - Update `.env` to set `DB_ROOT_PASSWORD=11111111` and `DB_USER=root`.
    - Update `docker-compose.yaml` to ensure `MYSQL_ROOT_PASSWORD` matches `.env`.
    - Ensure `cms_phpmyadmin` environment variables match these credentials.
- **Acceptance Criteria**: phpMyAdmin login succeeds using `root` / `11111111`.

### 4. Security Hardening
Clean up sensitive data in `.env`.
- **Action**: Remove `GITHUB_TOKEN` from `.env` or move it to a `.env.local` (added to .gitignore).
- **Acceptance Criteria**: `.env` file contains no `GITHUB_TOKEN`.

### 5. Deployment and Verification
Bring up the stack and verify service health.
- **Action**: Run `docker-compose up -d`.
- **Acceptance Criteria**: All containers show `Up` status; application logs show successful database connection.

## Success Criteria
1. No "mount path not found" errors during startup.
2. Database persistence survives container restarts via named volumes.
3. App successfully connects to MySQL.
4. Correct code directory (`ange_mastersns`) is mounted to `/var/www`.

Co-Authored-By: Claude Opus 4.7 <noreply@anthropic.com>
