# Other — AGENTS.md

# GitNexus Agent Configuration (AGENTS.md)

The `AGENTS.md` file serves as the operational manifest and governance framework for AI agents (such as Claude or GitHub Copilot) interacting with the `mastersns-driver` repository. It defines the mandatory protocols for code exploration, impact assessment, and modification using the GitNexus Code Intelligence system.

## Core Purpose

This module acts as a "Rules of Engagement" document. It ensures that any automated or semi-automated agent understands the scale of the project—which contains over 100,000 symbols—and adheres to safety checks to prevent regressions in a complex, highly interconnected codebase.

## Mandatory Workflow Protocols

The module enforces a strict "Analyze-Before-Act" pattern. Developers and agents must follow these three phases for every change:

### 1. Pre-Edit: Impact Analysis
Before any symbol (function, class, or method) is modified, you must determine the "blast radius."
- **Tool:** `gitnexus_impact({target: "symbolName", direction: "upstream"})`
- **Requirement:** Report direct callers and affected processes.
- **Risk Escalation:** If the tool returns **HIGH** or **CRITICAL** risk, you must pause and obtain explicit confirmation before proceeding.

### 2. Execution: Context-Aware Modification
Standard text-based search and replace is prohibited for structural changes.
- **Refactoring:** Use `gitnexus_rename` for symbol changes to ensure the call graph remains intact.
- **Exploration:** Use `gitnexus_query({query: "concept"})` to find execution flows rather than grepping for strings.
- **Deep Dive:** Use `gitnexus_context({name: "symbolName"})` to retrieve the full relationship map (callers/callees) for a specific symbol.

### 3. Post-Edit: Verification
Before committing any code, the state of the graph must be verified.
- **Tool:** `gitnexus_detect_changes()`
- **Requirement:** Verify that the changes only affected the intended symbols and that no unintended execution flows were broken.

## Repository Architecture & Clusters

The `mastersns-driver` codebase is partitioned into functional clusters. When working within a specific domain, refer to the specialized skill files located in `.claude/skills/generated/`.

| Cluster | Symbol Count | Primary Responsibility |
| :--- | :--- | :--- |
| **List** | 4,267 | Data listing and collection management |
| **Search** | 4,244 | Query logic and indexing |
| **Profile_edit** | 3,547 | User metadata modification logic |
| **Auth** | 2,397 | Authentication and authorization flows |
| **Model** | 1,812 | Data structures and schema definitions |
| **Apiv2** | 424 | Modern API endpoints and routing |

## Resource URIs

Agents can access real-time intelligence via the following GitNexus resource paths:

*   `gitnexus://repo/mastersns-driver/context`: Check if the index is stale. If stale, run `npx gitnexus analyze`.
*   `gitnexus://repo/mastersns-driver/processes`: View all 300+ defined execution flows.
*   `gitnexus://repo/mastersns-driver/process/{name}`: Trace a specific execution path step-by-step to debug logic errors.

## Safety Constraints

*   **Never** ignore impact analysis warnings.
*   **Never** perform "blind" renames using standard IDE find-and-replace.
*   **Always** refresh the index using the CLI if the GitNexus tool indicates the data is out of sync with the current file state.