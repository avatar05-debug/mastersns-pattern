# Revised Plan (v3): MySQL Multi-DB Initialization & Character Set Standardization

## Context
The previous schema-only initialization plan (v2) was rejected due to inadequate handling of the multi-database structure, inconsistent character sets (`utf8mb3`, typos), and lack of automation for the 200+ source files. This version (v3) implements a consolidated, sequence-aware initialization strategy that unifies the environment under `utf8mb4`.

## RALPLAN-DR Summary

### Principles
- **Atomicity**: Databases must be created, schemas applied, and seeds loaded in a single deterministic sequence.
- **Normalization**: Enforce `utf8mb4` globally to prevent encoding mismatches and support full Unicode.
- **Reproducibility**: Use automated shell commands to consolidate source files, ensuring the environment can be rebuilt from scratch.

### Decision Drivers
1. **Multi-DB Dependency**: `mastersns` depends on `mastersns_mgpf` (users/roles).
2. **Schema Fragmentation**: 200+ SQL files are scattered across `mysql/` and `fuel/packages/`.
3. **Legacy Encodings**: Widespread use of `utf8` and `utf8mb3` (legacy aliases) and typos like `utf8mb4mb4`.

### Options
- **Option A (Consolidated Scripts - Chosen)**: Combine 200+ files into `01_schema.sql` and `02_mvd.sql`. High performance, handles dependencies via `USE` statements, easy to debug.
- **Option B (Docker Volume Mapping - Rejected)**: Mapping the entire `mysql/` directory to `/docker-entrypoint-initdb.d`. Rejected because execution order of 200+ files is alphabetically determined and fragile.

---

## Task Flow

### 1. Environment Reset
- [ ] Wipe existing database state to ensure a clean start.
  - **Acceptance Criteria**: `docker-compose down -v` executed; verified `db_data` volume is removed.

### 2. Multi-DB Schema Consolidation (`01_schema.sql`)
- [ ] Automate the creation of a master schema file with strict database grouping.
  - **Sequence**: `mastersns_mgpf` → `mastersns` → `mastersns_sandbox`.
  - **Acceptance Criteria**: `01_schema.sql` contains all table definitions prefixed by `USE <db>;` statements.

### 3. MVD (Minimal Viable Dataset) Consolidation (`02_mvd.sql`)
- [ ] Consolidate `INSERT` statements from all `init_*.sql` and `sysinit_*.sql` files.
  - **Prioritization**: Seed `mgpf` (users/roles) before `mastersns` (admin/settings).
  - **Acceptance Criteria**: `02_mvd.sql` successfully seeds all 3 databases.

### 4. Global Character Set Normalization
- [ ] Apply automated `sed` transformations to consolidated files to fix typos and legacy encodings.
  - **Acceptance Criteria**: Zero occurrences of `utf8`, `utf8mb3`, or `utf8mb4mb4`. All replaced with `utf8mb4`.

### 5. Deployment & Verification
- [ ] Boot containers and verify logs.
  - **Acceptance Criteria**: `docker-compose up` completes without SQL errors; all 3 DBs are populated.

---

## Detailed TODOs

### Step 1: Cleanup
- [ ] Run `docker-compose down -v`.

### Step 2: Automated Consolidation
- [ ] Create `docker/db/init-schema/` directory if missing.
- [ ] Run consolidation script:
  ```bash
  # Define Paths
  BASE="/Users/avatar05/www/Projects/mastersns/Avatar-driver/mastersns-driver"
  INIT_DIR="$BASE/docker/db/init-schema"
  SCHEMA="$INIT_DIR/01_schema.sql"
  MVD="$INIT_DIR/02_mvd.sql"

  # 01_schema.sql: Group by Database
  {
    echo "USE mastersns_mgpf;"
    cat "$BASE/mysql/mastersns_mgpf.sql"
    echo "USE mastersns;"
    cat "$BASE/mysql/mastersns.sql"
    echo "USE mastersns_sandbox;"
    find "$BASE/ange_mastersns/fuel/packages/mgpayment/sql/sandbox/" -name "create_*.sql" -exec cat {} +
  } > "$SCHEMA"

  # 02_mvd.sql: Group Seeds
  {
    echo "USE mastersns_mgpf;"
    find "$BASE/mysql/" -name "init_mgpf*.sql" -exec cat {} +
    echo "USE mastersns;"
    find "$BASE/mysql/" -name "init_*.sql" ! -name "init_mgpf*.sql" -exec cat {} +
    find "$BASE/mysql/" -name "sysinit_*.sql" -exec cat {} +
  } > "$MVD"
  ```

### Step 3: Global Normalization
- [ ] Execute `sed` on both files:
  ```bash
  sed -i '' 's/CHARSET=utf8/CHARSET=utf8mb4/g' "$SCHEMA" "$MVD"
  sed -i '' 's/utf8mb3/utf8mb4/g' "$SCHEMA" "$MVD"
  sed -i '' 's/utf8mb4mb4/utf8mb4/g' "$SCHEMA" "$MVD"
  ```

### Step 4: Verification
- [ ] `docker-compose up -d db`.
- [ ] `docker-compose logs -f db` (Check for "ready for connections").

---

## ADR: Multi-DB Initialization & Encoding
**Decision**: We are moving away from 200+ fragmented files to two consolidated files (`01_schema.sql` and `02_mvd.sql`) placed in the Docker entrypoint.
**Drivers**: MySQL Docker entrypoint limitations, high volume of files, and character set typos.
**Consequences**: Volume deletion is required to apply changes. Future schema changes should be added to the end of `01_schema.sql` or managed via a migrations tool.
**Follow-ups**: Update FuelPHP `db.php` if connections still attempt to use legacy `utf8`.

Co-Authored-By: Claude Opus 4.7 <noreply@anthropic.com>
