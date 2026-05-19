# Plan: Shell Repository Configuration for Agent Metadata

This plan configures the root directory `/Users/avatar05/www/Projects/mastersns-pattern` as a "shell" Git repository. It will track agent configurations (`.claude`, `.omc`, `.serena`) and configuration files while strictly excluding independent development code repositories.

## Requirements Summary
- Track metadata: `.claude/`, `.omc/`, `.serena/`, and root config files (`.gitignore`, `CLAUDE.md`).
- Exclude code: Strictly ignore `Avatar-driver/` and `Project-repo/` directories to avoid "git-link" or submodule issues.
- Maintainability: Use a "whitelist" approach in `.gitignore` to prevent accidental tracking of future code folders.

## Acceptance Criteria
- [ ] `git check-ignore .omc/some-file` returns exit code 1 (not ignored).
- [ ] `git check-ignore Avatar-driver/mastersns-driver/ange_mastersns/some-file` returns exit code 0 (ignored).
- [ ] `git status` shows only `.gitignore`, `.omc/`, `.serena/`, and optionally `.claude/` (if created).
- [ ] No "modified content" or "untracked content" warnings from nested git repos in root `git status`.

## Implementation Steps

### Step 1: Clean Staging Area
Remove any currently tracked files from the Git index to start with a clean slate, ensuring nested repositories are not partially tracked as git-links.
- **File:** Root directory
- **Action:** Run `git rm -r --cached .`

### Step 2: Configure Strict Whitelist Gitignore
Rewrite `.gitignore` to ignore everything by default and explicitly whitelist agent metadata and root documentation.
- **File:** `/Users/avatar05/www/Projects/mastersns-pattern/.gitignore`
- **Action:** Update contents to:
  ```gitignore
  # Ignore everything by default
  /*

  # Whitelist agent directories
  !/.claude/
  !/.omc/
  !/.serena/

  # Whitelist root configuration and documentation
  !/.gitignore
  !/CLAUDE.md
  !/AGENTS.md
  ```

### Step 3: Verify and Commit Configuration
Verify that the ignore rules work as expected and commit the "shell" configuration.
- **Action:** 
  - Run `git add .gitignore .omc/ .serena/`
  - Create initial commit.

## Risks and Mitigations
- **Risk:** Nested repositories appearing as "dirty" submodules (git-links).
  - **Mitigation:** The `/*` ignore rule combined with `git rm --cached` ensures Git ignores these directories entirely, preventing the creation of git-links.
- **Risk:** Accidental loss of code.
  - **Mitigation:** We are only using `git rm --cached`, which removes files from the Git index but leaves the actual files on disk untouched.

## Verification Steps
1. Run `git status` and confirm only `.gitignore`, `.omc/`, and `.serena/` are listed as new files.
2. Run `git check-ignore Avatar-driver/mastersns-driver/ange_mastersns/` to confirm it is ignored.
3. Run `git check-ignore .omc/config` to confirm it is NOT ignored.

---

## RALPLAN-DR Summary

### Principles
1. **Config-Only Tracking:** The root repo exists solely to version agent state and project orchestration.
2. **Explicit Whitelisting:** Default-deny policy for files ensures no code leaks into the shell repo.
3. **Zero Coupling:** No use of git submodules or git-links to maintain independent lifecycles for code repos.

### Decision Drivers
1. **Nested Repo Conflicts:** Nested `.git` folders cause "modified content" warnings in parent repos if not properly ignored.
2. **Security/Privacy:** Ensuring development code (potentially with different access controls) is not accidentally committed to a metadata repo.
3. **Simplicity:** Avoiding the overhead of submodule management.

### Viable Options
- **Option 1 (Chosen): Default-Ignore with Whitelisting.** Uses `/*` in `.gitignore` and `!` to permit specific folders. 
  - *Pros:* Extremely robust; new code folders added to the root are ignored by default.
  - *Cons:* Requires manual whitelisting of any new metadata folders.
- **Option 2: Explicit Code Ignoring.** Specifically ignores `Avatar-driver/` and `Project-repo/`.
  - *Pros:* Simple to understand.
  - *Cons:* Fragile; if a third code repo is added at a different path, it will be tracked by default.

### Invalidation Rationale
Option 2 was invalidated because it fails the "strictly excluding" requirement in a dynamic environment where new code folders might be introduced. Option 1 provides the highest safety margin for a "shell" repository.
