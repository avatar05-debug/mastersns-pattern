# Plan: Project Infrastructure & Git Index Cleanup

## 1. Requirements Summary
The repository index is currently corrupted with "git-link" entries (mode 160000) for directories that are not actually configured as submodules, preventing proper tracking of their contents. Additionally, the project requires robust configuration for "Oh My Claude" (OMC) metadata to ensure that operational files (plans, research, logs) are handled correctly by git and exported as intended.

## 2. Acceptance Criteria
- [ ] Git index is cleared of all invalid 160000 (git-link) entries without deleting physical files.
- [ ] `.gitignore` is updated with recursive whitelisting for `.omc/**`.
- [ ] `.gitattributes` is created/updated to exclude `.omc/**` from exports and handle metadata.
- [ ] Root-level documentation (`CLAUDE.md`, `AGENTS.md`) and `.claude/` directory are correctly tracked or whitelisted if they exist.
- [ ] `git status` confirms all nested files in previously "locked" directories are now eligible for tracking.

## 3. Implementation Steps

### Step 1: Surgical Index Cleanup
Remove the corrupted git-link entries from the index. This is a "safe" operation that does not touch physical files on disk.
- **Action:** Run `git rm --cached <path>` for identified links.
- **Target Paths:** `Avatar-driver/mastersns-driver`, `Project-repo/ange_mastersns`.

### Step 2: Configure Recursive Whitelisting
Update `.gitignore` to use more reliable recursive whitelisting patterns for OMC state and plans.
- **Action:** Add `!/.omc/**` to `.gitignore`.
- **Note:** Ensure `.omc/` itself is ignored first, then whitelisted recursively.

### Step 3: Establish Metadata Guardrails
Create or update `.gitattributes` to handle project metadata.
- **Action:** Add `.omc/** export-ignore` to ensure internal agent state isn't included in archives.

### Step 4: Verification & Snapshot
Verify the fix and stage the initial infrastructure.
- **Action:** `git add .` (carefully) and check `git status` to ensure sub-files are now visible.

## 4. Risks and Mitigations
- **Risk:** Accidents during `git rm` leading to file loss. 
  - **Mitigation:** Use the `--cached` flag exclusively to ensure only the index is modified.
- **Risk:** Redundant tracking of large agent logs.
  - **Mitigation:** Ensure `.omc/logs/` is explicitly ignored if not needed in the repo, while keeping `.omc/plans/` whitelisted.

## 5. Verification Steps
1. Run `git ls-files -s | grep "^160000"`: Should return no results for the target directories.
2. Run `git status`: Previously invisible files inside `Avatar-driver/` and `Project-repo/` should now appear as untracked/modified.
3. Run `git archive -o test.zip HEAD`: Verify `.omc/` content is absent from the zip (respecting `.gitattributes`).

## 6. RALPLAN-DR (Decision Record)

### Principles
1. **Surgical Precision:** Fix the index without destructive resets.
2. **Explicit Whitelisting:** Use recursive patterns for tool reliability.
3. **Metadata Isolation:** Prevent agent internals from leaking into distributions.

### Decision Drivers
1. Corrupted 160000 index entries blocking nested file tracking.
2. Missing infrastructure for OMC metadata handling.
3. Need for clean export of project files.

### Options
- **Option A (Chosen):** Surgical `git rm --cached` + Recursive Whitelisting. Bounded, safe, and fixes the root cause.
- **Option B:** `git reset --mixed`. Rejected because it's too broad and might disrupt other staged changes.

### ADR
- **Decision:** Manually remove git-link index entries and implement recursive whitelisting in `.gitignore`.
- **Consequences:** Nested files will become trackable; `.omc` state will be safely managed.
- **Follow-ups:** Monitor for new git-link entries if copying directories from other git repos.

Co-Authored-By: Claude Opus 4.7 <noreply@anthropic.com>
