# Plan: Setup Guide and Sync Logic Improvement (Revised)

## Context
The project requires a robust synchronization logic between a "Driver" development environment and a "Project-repo" target repository. The Critic has requested higher safety standards, portability, and clearer documentation to prevent accidental data loss during `rsync --delete` operations.

## RALPLAN-DR
### Principles
1. **Safety First, Sync Second**: Never delete data without verifying the source is valid.
2. **Portability**: Avoid absolute paths; use relative paths for environment independence.
3. **Explicit Intent**: Require dry-runs for destructive operations.
4. **Developer-Centric**: Develop ONLY in Driver to maintain a clear Source of Truth.

### Decision Drivers
1. **Data Integrity**: Preventing `rsync --delete` from wiping a target if the source is empty/missing.
2. **Setup Reproducibility**: Ensuring submodules are initialized correctly.
3. **Verification**: Providing dry-run and acceptance criteria for executors.

### Options Considered
- **Option A (Initial)**: Standard `rsync` with absolute paths. (Invalidated: Lacks safety and portability).
- **Option B (Revised)**: Wrapped `rsync` in Makefile with directory checks, relative paths, and dry-run targets. (Selected).

### ADR (Architectural Decision Record)
- **Decision**: Implement safety gates in Makefile (`check_dir` function) and use relative paths (`../../`).
- **Drivers**: Prevention of data loss, Ease of onboarding.
- **Alternatives**: Using git-hooks (rejected as too complex for simple file sync).
- **Consequences**: Developers must use `make init` to ensure submodules are ready.
- **Follow-ups**: Monitor sync logs for any edge cases with permission flags.

## Work Objectives
- [ ] Implement Safety Gates in `Avatar-driver/mastersns-driver/Makefile`.
- [ ] Update `Avatar-driver/mastersns-driver/README.md` with Vietnamese instructions and warnings.
- [ ] Ensure submodule initialization is part of the `make init` flow.

## Task Flow
1. **Makefile Update**: Add `check_dir`, dry-run targets, and relative path configuration.
2. **Documentation Update**: Rewrite README.md with "DANGER WARNING" and "Acceptance Criteria".
3. **Verification**: Run `make git-push-dry` to confirm logic without affecting files.

## Detailed TODOs
### Step 1: Makefile Safety Implementation
- Add `check_dir` macro to verify directory existence and non-emptiness.
- Update `TARGET_DIR` and `SRC_DIR` to relative paths.
- Add `git-push-dry` and `git-pull-dry` using `rsync -n`.
- Update `init` target to include `git submodule update --init --recursive`.
- **Acceptance Criteria**: `make git-push` fails if `ange_mastersns` is empty.

### Step 2: Documentation Refresh (Vietnamese)
- Add "CẢNH BÁO NGUY HIỂM" regarding `rsync --delete`.
- Document "Source of Truth" policy.
- Provide step-by-step setup guide including submodule step.
- **Acceptance Criteria**: README.md contains clear Vietnamese instructions for setup and safety.

### Step 3: Final Verification
- Verify `docker-compose ps` health as part of acceptance criteria.
- **Acceptance Criteria**: Executor can follow the guide to a "Green" state.

## Success Criteria
1. `make git-push`/`pull` are safe against empty directories.
2. Setup guide is comprehensive and emphasizes submodule requirement.
3. No absolute paths remain in synchronization scripts.
