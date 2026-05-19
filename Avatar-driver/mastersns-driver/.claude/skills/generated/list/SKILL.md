---
name: list
description: "Skill for the List area of mastersns-driver. 4267 symbols across 166 files."
---

# List

4267 symbols | 166 files | Cohesion: 61%

## When to Use

- Working with code in `ange_mastersns/`
- Understanding how count, escapeHtml, nl2br work
- Modifying list-related functionality

## Key Files

| File | Symbols |
|------|---------|
| `ange_mastersns/public/assets/js/list/memo.js` | isPlainObject, isArrayBuffer, isDate, isFile, isBlob (+305) |
| `ange_mastersns/public/assets/js/list/favorite.js` | isPlainObject, isArrayBuffer, isDate, isFile, isBlob (+305) |
| `ange_mastersns/public/assets/js/list/photorequest.js` | isPlainObject, isArrayBuffer, isDate, isFile, isBlob (+304) |
| `ange_mastersns/public/assets/js/list/niceskip.js` | isPlainObject, isArrayBuffer, isDate, isFile, isBlob (+304) |
| `ange_mastersns/public/assets/js/list/footprint.js` | isPlainObject, isArrayBuffer, isDate, isFile, isBlob (+304) |
| `ange_mastersns/public/assets/js/list/myniced.js` | isPlainObject, isArrayBuffer, isDate, isFile, isBlob (+303) |
| `ange_mastersns/public/assets/js/list/block.js` | isPlainObject, isArrayBuffer, isDate, isFile, isBlob (+303) |
| `ange_mastersns/public/assets/js/list/limited.js` | isPlainObject, isArrayBuffer, isDate, isFile, isBlob (+302) |
| `ange_mastersns/public/assets/js/list/hide.js` | isPlainObject, isArrayBuffer, isDate, isFile, isBlob (+302) |
| `ange_mastersns/public/assets/js/list/nice.js` | isPlainObject, isArrayBuffer, isDate, isFile, isBlob (+294) |

## Entry Points

Start here when exploring this area:

- **`count`** (Function) — `ange_mastersns/resources/assets/js/common.ts:7`
- **`escapeHtml`** (Function) — `ange_mastersns/resources/assets/js/common.ts:187`
- **`nl2br`** (Function) — `ange_mastersns/resources/assets/js/common.ts:216`
- **`setHeaderNavi`** (Function) — `ange_mastersns/resources/assets/js/common.ts:255`
- **`bgFixStart`** (Function) — `ange_mastersns/resources/assets/js/dialog.ts:13`

## Key Symbols

| Symbol | Type | File | Line |
|--------|------|------|------|
| `LimitHideBlockDialog` | Class | `ange_mastersns/resources/assets/js/limit_hide_block_dialog.ts` | 4 |
| `count` | Function | `ange_mastersns/resources/assets/js/common.ts` | 7 |
| `escapeHtml` | Function | `ange_mastersns/resources/assets/js/common.ts` | 187 |
| `nl2br` | Function | `ange_mastersns/resources/assets/js/common.ts` | 216 |
| `setHeaderNavi` | Function | `ange_mastersns/resources/assets/js/common.ts` | 255 |
| `bgFixStart` | Function | `ange_mastersns/resources/assets/js/dialog.ts` | 13 |
| `bgFixEnd` | Function | `ange_mastersns/resources/assets/js/dialog.ts` | 19 |
| `get_ua` | Method | `ange_mastersns/resources/assets/js/user_agent_info.ts` | 14 |
| `show` | Method | `ange_mastersns/resources/assets/js/toast.ts` | 12 |
| `createElement` | Method | `ange_mastersns/resources/assets/js/toast.ts` | 19 |
| `setEventAnimation` | Method | `ange_mastersns/resources/assets/js/toast.ts` | 30 |
| `showError` | Method | `ange_mastersns/resources/assets/js/error_dialog.ts` | 45 |
| `showNgwordDialog` | Method | `ange_mastersns/resources/assets/js/dialog.ts` | 99 |
| `showProfCompDialog` | Method | `ange_mastersns/resources/assets/js/dialog.ts` | 138 |
| `showListHeaderMenuDialog` | Method | `ange_mastersns/resources/assets/js/dialog.ts` | 165 |
| `getList` | Method | `ange_mastersns/resources/assets/js/profile_detail/tweet_list.ts` | 52 |
| `formatPhotoData` | Method | `ange_mastersns/resources/assets/js/profile_detail/expandphotobase.ts` | 38 |
| `formatPaginationData` | Method | `ange_mastersns/resources/assets/js/profile_detail/expandphotobase.ts` | 46 |
| `isProcessing` | Method | `ange_mastersns/resources/assets/js/profile_detail/expandphotobase.ts` | 66 |
| `clickOkBtn` | Method | `ange_mastersns/resources/assets/js/search/search_prof_viewmodel.ts` | 445 |

## Connected Areas

| Area | Connections |
|------|-------------|
| Message | 200 calls |
| Profile_edit | 78 calls |
| Search | 74 calls |
| Js | 49 calls |
| Profile_detail | 31 calls |
| Community | 12 calls |
| Tweet | 11 calls |
| Nicemsg | 5 calls |

## How to Explore

1. `gitnexus_context({name: "count"})` — see callers and callees
2. `gitnexus_query({query: "list"})` — find related execution flows
3. Read key files listed above for implementation details
