# Plan - Infrastructure Shell Orchestration (Consensus Iteration)

This plan outlines the steps to correctly configure the "shell" repository (`mastersns-pattern`) to track infrastructure and agent configurations without interference from nested Git repositories or conflicting `.gitignore` rules.

## 1. Requirements Summary
- Track infrastructure files (`.omc/`, `.serena/`, `.claude/`, `CLAUDE.md`, etc.) in the shell repository.
- Neutralize nested Git states (git-links/submodules) that prevent shell tracking.
- Safely preserve existing code in nested directories without tracking it in the shell.
- Implement a whitelist-based Git configuration for safety and precision.

## 2. Acceptance Criteria
- [ ] No `160000` (git-link) entries remain in the shell Git index for managed directories.
- [ ] Nested `.git` directories are renamed to `.git_backup` (neutralized).
- [ ] Shell repository tracks `.omc/`, `.claude/`, `CLAUDE.md`, and `.gitignore` files.
- [ ] Shell repository does NOT track the thousands of code files inside `Avatar-driver/` or `Project-repo/`.
- [ ] `git status` shows only relevant infrastructure changes.

## 3. Detailed Implementation Steps

### Step 1: Neutralize Nested Git State
Physically hide nested `.git` directories from the root Git process.
- **Action**: Rename all discovered nested `.git` directories to `.git_backup`.
- **Target Directories**:
    - `Avatar-driver/mastersns-driver/ange_mastersns/.git`
    - `Project-repo/ange_mastersns/.git`
    - `Avatar-driver/mastersns-driver/ange_mastersns/fuel/app/classes/controller/admin/.git`
    - `test-git-logic/.git`
- **Acceptance Criteria**: `find . -mindepth 2 -name ".git"` returns no results.

### Step 2: Index Cleanup (Surgical Removal)
Remove existing git-link entries from the shell repository's index.
- **Action**: Run `git rm --cached -r` on the root directories of the nested repos.
- **Commands**: 
    - `git rm --cached -r Avatar-driver/mastersns-driver/ange_mastersns/`
    - `git rm --cached -r Project-repo/ange_mastersns/`
- **Acceptance Criteria**: `git ls-files --stage` shows no entries with mode `160000`.

### Step 3: Infrastructure Configuration (Whitelist Approach)
Rewrite `.gitignore` and create `.gitattributes` to enforce tracking only infrastructure.
- **Action**: Modify `.gitignore` to use a "deny-all, whitelist-infrastructure" pattern.
- **New `.gitignore` content**:
    ```text
    # Ignore everything by default
    /*
    
    # Whitelist infrastructure
    !/.gitignore
    !/.gitattributes
    !/CLAUDE.md
    !/AGENTS.md
    !/.omc/
    !/.claude/
    !/.serena/
    !/.omc/**
    !/.claude/**
    !/.serena/**
    ```
- **Action**: Create `.gitattributes` to ensure proper handling of text files.
- **Acceptance Criteria**: `git check-ignore -v some/code/file.ts` confirms it's ignored, while `git check-ignore -v CLAUDE.md` confirms it's not.

### Step 4: Selective Staging and Verification
Stage the infrastructure files and verify the status.
- **Action**: Explicitly stage the whitelisted files.
- **Command**: `git add .gitignore CLAUDE.md .omc/ .claude/ .serena/` (and any other root-level docs).
- **Acceptance Criteria**: `git status` shows only infrastructure files as "new file" or "modified", with no massive staging of code files.

## 4. Risks and Mitigations
- **Risk**: Renaming `.git` to `.git_backup` breaks local development in those sub-repos.
  - **Mitigation**: This is intentional for the shell setup. Reverting is as simple as renaming back. This is documented in this plan.
- **Risk**: `git add .` stages thousands of files if `.gitignore` is wrong.
  - **Mitigation**: Use specific paths in `git add` and verify with `git status` before committing. Whitelist approach in `.gitignore` provides a second layer of safety.

## 5. Verification Steps
1. Run `git ls-files --stage | grep 160000` -> Should be empty.
2. Run `git status` -> Should only list infrastructure files.
3. Try to add a dummy file in a nested code folder -> `git add Avatar-driver/test.txt` should be ignored by `.gitignore`.

## 6. ADR (Architectural Decision Record)
- **Decision**: Neutralize nested Git repos via renaming to `.git_backup` and use a whitelist-only tracking strategy for the shell repo.
- **Drivers**: Need to track agent configurations (infra) in a parent repo while avoiding Git's "nested repo" behavior (git-links) and preventing accidental tracking of massive codebases.
- **Alternatives Considered**: 
    - *Git Submodules*: Rejected because the shell isn't intended to manage versions of the sub-repos, just to house configurations.
    - *Sparse Checkout*: Rejected as too complex for this simple configuration-tracking use case.
- **Consequences**: Local Git operations inside sub-repos will require renaming `.git_backup` back to `.git` temporarily.

## 7. RALPLAN-DR Summary
- **Principles**: 
    - Infrastructure as Code (IaC) - treat agent configs as tracked assets.
    - Safety First - neutralize nested state to prevent index corruption.
    - Minimal Surface Area - track only what is strictly necessary.
- **Decision Drivers**: Data safety, index cleanliness, ease of agent orchestration.
- **Options**:
    1. **Renaming (Neutralization)**: Physically hides `.git` folders. Safe, reversible, prevents git-link detection. **(Chosen)**
    2. **`git rm --cached` only**: Risky, as Git might re-detect the `.git` folders during the next `git add .` if not carefully ignored.
