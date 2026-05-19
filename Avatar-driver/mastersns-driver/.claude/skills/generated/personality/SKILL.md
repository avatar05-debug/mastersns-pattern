---
name: personality
description: "Skill for the Personality area of mastersns-driver. 995 symbols across 11 files."
---

# Personality

995 symbols | 11 files | Cohesion: 57%

## When to Use

- Working with code in `ange_mastersns/`
- Understanding how PersonalityHelper, getBrowserURLParams, redirPreviousPage work
- Modifying personality-related functionality

## Key Files

| File | Symbols |
|------|---------|
| `ange_mastersns/public/assets/js/personality/favorite.js` | i, u, d, p, h (+294) |
| `ange_mastersns/public/assets/js/personality/setting.js` | i, l, p, d, h (+293) |
| `ange_mastersns/public/assets/js/personality/notification.js` | o, f, p, d, v (+182) |
| `ange_mastersns/public/assets/js/personality/completed.js` | o, S, e, ft, _n (+178) |
| `ange_mastersns/resources/assets/js/personality/setting.ts` | postSetPersonality, makeid, goPreviousPage, init, initVue (+4) |
| `ange_mastersns/resources/assets/js/personality/favorite.ts` | goBack, postSetFavorite, goPreviousPage, init, initVue (+4) |
| `ange_mastersns/resources/assets/js/personality_helper.ts` | getBrowserURLParams, redirPreviousPage, isBlank, gotoMarkedId, PersonalityHelper (+1) |
| `ange_mastersns/resources/assets/js/browser_helper.ts` | getIEVersion |
| `ange_mastersns/resources/assets/js/animation/scroll_helper.ts` | gotoMarkedId |
| `ange_mastersns/resources/assets/js/dialog.ts` | showEditCancelConfDialog |

## Entry Points

Start here when exploring this area:

- **`PersonalityHelper`** (Class) — `ange_mastersns/resources/assets/js/personality_helper.ts:2`
- **`getBrowserURLParams`** (Method) — `ange_mastersns/resources/assets/js/personality_helper.ts:9`
- **`redirPreviousPage`** (Method) — `ange_mastersns/resources/assets/js/personality_helper.ts:27`
- **`isBlank`** (Method) — `ange_mastersns/resources/assets/js/personality_helper.ts:73`
- **`gotoMarkedId`** (Method) — `ange_mastersns/resources/assets/js/personality_helper.ts:80`

## Key Symbols

| Symbol | Type | File | Line |
|--------|------|------|------|
| `PersonalityHelper` | Class | `ange_mastersns/resources/assets/js/personality_helper.ts` | 2 |
| `getBrowserURLParams` | Method | `ange_mastersns/resources/assets/js/personality_helper.ts` | 9 |
| `redirPreviousPage` | Method | `ange_mastersns/resources/assets/js/personality_helper.ts` | 27 |
| `isBlank` | Method | `ange_mastersns/resources/assets/js/personality_helper.ts` | 73 |
| `gotoMarkedId` | Method | `ange_mastersns/resources/assets/js/personality_helper.ts` | 80 |
| `showEditCancelConfDialog` | Method | `ange_mastersns/resources/assets/js/dialog.ts` | 145 |
| `nl2br` | Method | `ange_mastersns/resources/assets/js/personality_helper.ts` | 66 |
| `o` | Function | `ange_mastersns/public/assets/js/personality/notification.js` | 0 |
| `f` | Function | `ange_mastersns/public/assets/js/personality/notification.js` | 0 |
| `p` | Function | `ange_mastersns/public/assets/js/personality/notification.js` | 0 |
| `d` | Function | `ange_mastersns/public/assets/js/personality/notification.js` | 0 |
| `v` | Function | `ange_mastersns/public/assets/js/personality/notification.js` | 0 |
| `y` | Function | `ange_mastersns/public/assets/js/personality/notification.js` | 0 |
| `T` | Function | `ange_mastersns/public/assets/js/personality/notification.js` | 0 |
| `C` | Function | `ange_mastersns/public/assets/js/personality/notification.js` | 0 |
| `Ee` | Function | `ange_mastersns/public/assets/js/personality/notification.js` | 0 |
| `_n` | Function | `ange_mastersns/public/assets/js/personality/notification.js` | 0 |
| `createTextNode` | Function | `ange_mastersns/public/assets/js/personality/notification.js` | 0 |
| `insertBefore` | Function | `ange_mastersns/public/assets/js/personality/notification.js` | 0 |
| `appendChild` | Function | `ange_mastersns/public/assets/js/personality/notification.js` | 0 |

## Connected Areas

| Area | Connections |
|------|-------------|
| List | 54 calls |
| Message | 49 calls |
| Search | 16 calls |
| Profile_edit | 10 calls |
| Js | 5 calls |
| Community | 2 calls |
| Nicemsg | 2 calls |
| Auth | 1 calls |

## How to Explore

1. `gitnexus_context({name: "PersonalityHelper"})` — see callers and callees
2. `gitnexus_query({query: "personality"})` — find related execution flows
3. Read key files listed above for implementation details
