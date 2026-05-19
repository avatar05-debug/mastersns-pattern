# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## 1. Development Commands

MasterSNS uses a Docker-based environment. Prefer using `make` commands for automated tasks.

- **Start Environment**: `make up` (runs `docker-compose up -d`)
- **Initialize Project**: `make init` (Wait for DB and run migrations)
- **Import Data**: `make import` (Load default SQL dumps)
- **Reset Environment**: `make reset` (🛑 DANGER: wipes DB and re-initializes)
- **Sync Repo**: `make git-push` / `make git-pull` (Sync with Project-repo)
- **Backend Shell**: `docker-compose exec angue_app /bin/bash`
- **Backend Deps**: `docker-compose exec angue_app composer install`
- **Frontend Build**: `npm run dev` / `npm run pro` (Executed inside `ange_mastersns`)
- **Run Tests**: `docker-compose exec angue_app php oil test`

## 2. High-Level Architecture

MasterSNS (Aocca) is a dating/SNS platform centered around a sophisticated **personality matching engine**.

### Backend (FuelPHP 1.8)
Follows a strict **HMVC** pattern with ORM models located in `fuel/app/classes/model/`.
- **Matching Engine Core**:
  - `Model_Personality`: Defines core traits (sex-specific).
  - `Model_SecretProfile`: Private/extended data with bonus point logic.
  - `Model_DeepProfile`: Deeper compatibility traits.
  - `Model_MemberProfile`: Links members to profile data and completion stats.
- **Controller Layer**: Found in `fuel/app/classes/controller/`. `Controller_Front` is the base for most features.

### Frontend (Vue/TS/Smarty)
- **Source Assets**: `resources/assets/js/` (Vue components and TypeScript).
- **Bundling**: Laravel Mix outputs to `public/assets/js/`.
- **Templates**: Smarty (`.smarty`) files in `fuel/app/views/`.
- **Communication**: Axios for APIs, Socket.io for real-time messaging.

## 3. Key Directories

- `/ange_mastersns`: Primary application root.
- `/ange_mastersns/fuel/app/classes/model`: Core business logic and database entities.
- `/ange_mastersns/fuel/app/classes/controller`: API and Web route handlers.
- `/ange_mastersns/resources/assets`: Source TypeScript/Sass/Vue components.
- `/docker`: Container configurations for local development.

## 4. Operational Guidelines

- **Story Context**: Use Writer Memory (`.writer-memory/`) via `/oh-my-claudecode:writer-memory` for narrative context, character arcs, and persona-driven testing.

<!-- gitnexus:start -->
# GitNexus — Code Intelligence

This project is indexed by GitNexus as **mastersns-driver** (105539 symbols, 295298 relationships, 300 execution flows). Use the GitNexus MCP tools to understand code, assess impact, and navigate safely.

> If any GitNexus tool warns the index is stale, run `npx gitnexus analyze` in terminal first.

## Always Do

- **MUST run impact analysis before editing any symbol.** Before modifying a function, class, or method, run `gitnexus_impact({target: "symbolName", direction: "upstream"})` and report the blast radius (direct callers, affected processes, risk level) to the user.
- **MUST run `gitnexus_detect_changes()` before committing** to verify your changes only affect expected symbols and execution flows.
- **MUST warn the user** if impact analysis returns HIGH or CRITICAL risk before proceeding with edits.
- When exploring unfamiliar code, use `gitnexus_query({query: "concept"})` to find execution flows instead of grepping. It returns process-grouped results ranked by relevance.
- When you need full context on a specific symbol — callers, callees, which execution flows it participates in — use `gitnexus_context({name: "symbolName"})`.

## Never Do

- NEVER edit a function, class, or method without first running `gitnexus_impact` on it.
- NEVER ignore HIGH or CRITICAL risk warnings from impact analysis.
- NEVER rename symbols with find-and-replace — use `gitnexus_rename` which understands the call graph.
- NEVER commit changes without running `gitnexus_detect_changes()` to check affected scope.

## Resources

| Resource | Use for |
|----------|---------|
| `gitnexus://repo/mastersns-driver/context` | Codebase overview, check index freshness |
| `gitnexus://repo/mastersns-driver/clusters` | All functional areas |
| `gitnexus://repo/mastersns-driver/processes` | All execution flows |
| `gitnexus://repo/mastersns-driver/process/{name}` | Step-by-step execution trace |

## CLI

| Task | Read this skill file |
|------|---------------------|
| Understand architecture / "How does X work?" | `.claude/skills/gitnexus/gitnexus-exploring/SKILL.md` |
| Blast radius / "What breaks if I change X?" | `.claude/skills/gitnexus/gitnexus-impact-analysis/SKILL.md` |
| Trace bugs / "Why is X failing?" | `.claude/skills/gitnexus/gitnexus-debugging/SKILL.md` |
| Rename / extract / split / refactor | `.claude/skills/gitnexus/gitnexus-refactoring/SKILL.md` |
| Tools, resources, schema reference | `.claude/skills/gitnexus/gitnexus-guide/SKILL.md` |
| Index, status, clean, wiki CLI commands | `.claude/skills/gitnexus/gitnexus-cli/SKILL.md` |

<!-- gitnexus:end -->
