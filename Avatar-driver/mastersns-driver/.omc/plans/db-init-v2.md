# Revised DB Initialization Plan (v2) - Schema Optimized

## RALPLAN-DR Summary

**Principles:**
1. **Consistency**: Enforce `utf8mb4` across database definitions, migration scripts, and application configurations.
2. **Compatibility**: Configure MySQL 8.0 to support legacy data formats (`0000-00-00` dates) via `NO_ENGINE_SUBSTITUTION`.
3. **Reproducibility**: Utilize existing schema files in `mysql/` for automated initialization.
4. **Idempotency**: Ensure initialization logic only triggers on fresh volume creation while allowing for safe restarts.

**Decision Drivers:**
1. **Existing Assets**: The project already contains `mastersns.sql`, `mastersns_mgpf.sql`, and `mastersns_sandbox.sql` in the root `mysql/` folder.
2. **Character Set Issues**: Existing schemas use `utf8mb3`, which should be upgraded to `utf8mb4` for modern compliance.
3. **Legacy Data**: Schema dumps contain `0000-00-00` dates which MySQL 8 rejects without specific SQL modes.

**Options:**
- **Option A (Chosen)**: Leverage existing SQL files in `mysql/` by mounting them to `docker-entrypoint-initdb.d` and standardizing their charsets.
- **Option B**: Create a single `init.sql` from scratch (Rejected: redundant since schema files already exist and contain necessary data).

---

## Task Flow

1. **Infrastructure Setup** → verify: `docker-compose.yaml` mounts `mysql/` and has correct SQL mode.
2. **Schema Standardization** → verify: `mysql/*.sql` and `fuel/docs/sql/*.sql` use `utf8mb4`.
3. **Config Alignment** → verify: `db.php` character sets match the schema.
4. **Environment Reset** → verify: `docker-compose down -v` followed by `up` results in a fully initialized DB.

---

## Detailed TODOs

### 1. Multi-DB Infrastructure
- [ ] Update `/Users/avatar05/www/Projects/mastersns/Avatar-driver/mastersns-driver/docker-compose.yaml`:
  - Mount the existing mysql directory: `- ./mysql:/docker-entrypoint-initdb.d:ro` in the `db` service volumes.
  - Set `command: --sql-mode="NO_ENGINE_SUBSTITUTION"` for MySQL 8 compatibility.

### 2. Schema & Script Standardization
- [ ] Perform bulk replacement of `utf8mb3` and `utf8` with `utf8mb4` in:
  - `/Users/avatar05/www/Projects/mastersns/Avatar-driver/mastersns-driver/mysql/*.sql`
  - `/Users/avatar05/www/Projects/mastersns/Avatar-driver/mastersns-driver/ange_mastersns/fuel/docs/sql/*.sql`

### 3. Application Config Alignment
- [ ] Verify/Update `/Users/avatar05/www/Projects/mastersns/Avatar-driver/mastersns-driver/ange_mastersns/fuel/app/config/development/db.php`:
  - Ensure all database connections (default, mgpf, sandbox) use `'charset' => 'utf8mb4'`.

### 4. Operational Reset
- [ ] Run `docker-compose down -v` to ensure fresh initialization.
- [ ] Run `docker-compose up -d`.

---

## Success Criteria
- [ ] All three databases (`mastersns`, `mastersns_mgpf`, `mastersns_sandbox`) are populated automatically on startup.
- [ ] No errors in MySQL logs regarding invalid dates or character sets.
- [ ] Application connects successfully to all schemas with `utf8mb4`.

## ADR: Decision Record
- **Decision**: Reuse existing `.sql` files in the `mysql/` folder as the source of truth for Docker initialization.
- **Alternatives Considered**: Creating a new init directory (rejected for complexity and duplication).
- **Consequences**: Volume resets (`-v`) are required if schema files are updated significantly.
- **Follow-ups**: Monitor for any collation mismatches between legacy tables and new definitions.
