# Other — CLAUDE.md

# CLAUDE.md: Project Configuration & AI Guidance

The `CLAUDE.md` file serves as the primary entry point and operational manual for **Claude Code** and other AI assistants working within the MasterSNS (Aocca) repository. It defines the technical environment, architectural patterns, and safety protocols required to maintain the integrity of the platform's personality matching engine.

## 1. Development Environment

The project utilizes a containerized stack for the backend and a modern build pipeline for the frontend.

### Backend (FuelPHP 1.8)
- **Runtime**: PHP-FPM via Docker.
- **Database**: MySQL 8.0 and Redis.
- **Management**: `docker-compose` handles the orchestration of Nginx, PHP, and storage layers.
- **Testing**: Executed via the FuelPHP `oil` utility: `docker-compose exec angue_app php oil test`.

### Frontend (Vue/TS)
- **Tooling**: Laravel Mix (Webpack wrapper).
- **Workflow**:
    - `npm run dev`: Development build with source maps.
    - `npm run pro`: Minified production build.
- **Output**: Assets are compiled from `resources/assets/` into `public/assets/js/`.

---

## 2. System Architecture

MasterSNS is built on a Hierarchical Model-View-Controller (HMVC) architecture.

### Core Matching Engine
The business logic is centered around user compatibility, managed by specific ORM models in `fuel/app/classes/model/`:
- `Model_Personality`: Core sex-specific traits.
- `Model_SecretProfile`: Handles private data and bonus point calculations.
- `Model_DeepProfile`: Manages advanced compatibility metrics.
- `Model_MemberProfile`: The central hub linking users to their profile completion status.

### Data Flow & Templates
- **Controllers**: Inherit from `Controller_Front` to provide consistent session and authentication handling.
- **Views**: Uses the **Smarty** templating engine (`.smarty` files).
- **API**: Frontend components communicate with FuelPHP controllers via **Axios**, while **Socket.io** provides real-time capabilities for messaging.

---

## 3. GitNexus Integration & Safety

This module integrates with **GitNexus** to provide code intelligence. Because the codebase contains over 100,000 symbols, AI agents must follow strict "Impact Analysis" protocols to prevent regressions.

### Mandatory Workflow for Developers/AI
1.  **Impact Analysis**: Before modifying any function or class, run `gitnexus_impact` (upstream) to determine the "blast radius."
2.  **Risk Assessment**: If the impact analysis returns a **HIGH** or **CRITICAL** risk, the change must be flagged for manual review.
3.  **Refactoring**: Use `gitnexus_rename` instead of global find-and-replace to ensure the call graph remains intact.
4.  **Verification**: Run `gitnexus_detect_changes()` before every commit to ensure only intended symbols were modified.

### Functional Areas (Clusters)
The codebase is partitioned into specialized clusters for easier navigation:
- **Auth/Start**: Registration and authentication flows.
- **Profile/Personality**: The core matching and profile management logic.
- **Message/Community**: Social interaction and real-time communication.
- **Payment**: Subscription and credit management.

---

## 4. Directory Structure

| Path | Description |
| :--- | :--- |
| `/ange_mastersns` | Main application root. |
| `.../fuel/app/classes/model` | Business logic and database entities. |
| `.../fuel/app/classes/controller` | Web and API route handlers. |
| `/resources/assets` | Source TypeScript, Sass, and Vue components. |
| `/docker` | Infrastructure-as-code for local development. |
| `.writer-memory/` | Contextual storage for narrative and persona-driven testing. |