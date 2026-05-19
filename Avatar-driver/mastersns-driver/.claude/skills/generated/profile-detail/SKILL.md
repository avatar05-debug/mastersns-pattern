---
name: profile-detail
description: "Skill for the Profile_detail area of mastersns-driver. 2066 symbols across 23 files."
---

# Profile_detail

2066 symbols | 23 files | Cohesion: 57%

## When to Use

- Working with code in `ange_mastersns/`
- Understanding how format, ExpandPhotoBase, showTweetPenaltyDialog work
- Modifying profile_detail-related functionality

## Key Files

| File | Symbols |
|------|---------|
| `ange_mastersns/public/assets/js/profile_detail/myexpandphoto.js` | f, se, be, _e, Ue (+316) |
| `ange_mastersns/public/assets/js/profile_detail/expandphoto.js` | f, se, be, _e, Ue (+316) |
| `ange_mastersns/public/assets/js/profile_detail/top.js` | f, se, ye, be, Fe (+308) |
| `ange_mastersns/public/assets/js/profile_detail/memo.js` | f, se, _e, be, Ue (+285) |
| `ange_mastersns/public/assets/js/profile_detail/community_list.js` | f, se, _e, be, Ue (+285) |
| `ange_mastersns/public/assets/js/profile_detail/myself.js` | f, se, _e, be, Ue (+284) |
| `ange_mastersns/public/assets/js/profile_detail/report.js` | c, g, Ie, lt, Ft (+172) |
| `ange_mastersns/resources/assets/js/profile_detail/top.ts` | clickOkBtn, showMessage, showChat, prev, next (+18) |
| `ange_mastersns/resources/assets/js/profile_detail/myself.ts` | constructor, displaySecretProfile, displayDeepProfile, setProcessing, isProcessing (+5) |
| `ange_mastersns/resources/assets/js/profile_detail/report.ts` | checkReportReason, checkReport, sendReport, getCountReport, isErrorReport (+1) |

## Entry Points

Start here when exploring this area:

- **`format`** (Function) — `ange_mastersns/resources/assets/js/common.ts:223`
- **`ExpandPhotoBase`** (Class) — `ange_mastersns/resources/assets/js/profile_detail/expandphotobase.ts:8`
- **`showTweetPenaltyDialog`** (Method) — `ange_mastersns/resources/assets/js/dialog.ts:152`
- **`closeTweetPenaltyDialog`** (Method) — `ange_mastersns/resources/assets/js/dialog.ts:159`
- **`showTweetPenaltyDialog`** (Method) — `ange_mastersns/resources/assets/js/profile_detail/tweet_list.ts:95`

## Key Symbols

| Symbol | Type | File | Line |
|--------|------|------|------|
| `ExpandPhotoBase` | Class | `ange_mastersns/resources/assets/js/profile_detail/expandphotobase.ts` | 8 |
| `format` | Function | `ange_mastersns/resources/assets/js/common.ts` | 223 |
| `showTweetPenaltyDialog` | Method | `ange_mastersns/resources/assets/js/dialog.ts` | 152 |
| `closeTweetPenaltyDialog` | Method | `ange_mastersns/resources/assets/js/dialog.ts` | 159 |
| `showTweetPenaltyDialog` | Method | `ange_mastersns/resources/assets/js/profile_detail/tweet_list.ts` | 95 |
| `checkTweetPenalty` | Method | `ange_mastersns/resources/assets/js/profile_detail/tweet_list.ts` | 107 |
| `selectProfileTab` | Method | `ange_mastersns/resources/assets/js/profile_detail/tweet_list.ts` | 122 |
| `tweetOnClick` | Method | `ange_mastersns/resources/assets/js/search/search_footer.ts` | 160 |
| `setProcessing` | Method | `ange_mastersns/resources/assets/js/profile_detail/expandphotobase.ts` | 62 |
| `getUrlParameter` | Method | `ange_mastersns/resources/assets/js/profile_detail/expandphotobase.ts` | 24 |
| `MyExpandPhoto` | Class | `ange_mastersns/resources/assets/js/profile_detail/myexpandphoto.ts` | 11 |
| `ExpandPhoto` | Class | `ange_mastersns/resources/assets/js/profile_detail/expandphoto.ts` | 15 |
| `f` | Function | `ange_mastersns/public/assets/js/profile_detail/top.js` | 0 |
| `se` | Function | `ange_mastersns/public/assets/js/profile_detail/top.js` | 0 |
| `ye` | Function | `ange_mastersns/public/assets/js/profile_detail/top.js` | 0 |
| `be` | Function | `ange_mastersns/public/assets/js/profile_detail/top.js` | 0 |
| `Fe` | Function | `ange_mastersns/public/assets/js/profile_detail/top.js` | 0 |
| `Ue` | Function | `ange_mastersns/public/assets/js/profile_detail/top.js` | 0 |
| `He` | Function | `ange_mastersns/public/assets/js/profile_detail/top.js` | 0 |
| `createTextNode` | Function | `ange_mastersns/public/assets/js/profile_detail/top.js` | 0 |

## Connected Areas

| Area | Connections |
|------|-------------|
| List | 141 calls |
| Message | 115 calls |
| Search | 40 calls |
| Profile_edit | 34 calls |
| Js | 16 calls |
| Start | 3 calls |
| Community | 3 calls |
| Cond | 1 calls |

## How to Explore

1. `gitnexus_context({name: "format"})` — see callers and callees
2. `gitnexus_query({query: "profile_detail"})` — find related execution flows
3. Read key files listed above for implementation details
