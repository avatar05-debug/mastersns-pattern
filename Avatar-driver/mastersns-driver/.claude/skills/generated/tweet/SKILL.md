---
name: tweet
description: "Skill for the Tweet area of mastersns-driver. 1376 symbols across 13 files."
---

# Tweet

1376 symbols | 13 files | Cohesion: 57%

## When to Use

- Working with code in `ange_mastersns/`
- Understanding how isPassedViewTime, onScroll, show work
- Modifying tweet-related functionality

## Key Files

| File | Symbols |
|------|---------|
| `ange_mastersns/public/assets/js/tweet/create.js` | y, bt, wt, H, when (+372) |
| `ange_mastersns/public/assets/js/tweet/index.js` | f, se, _e, be, Ue (+302) |
| `ange_mastersns/public/assets/js/tweet/list.js` | f, se, _e, be, Ue (+299) |
| `ange_mastersns/public/assets/js/tweet/history.js` | f, se, _e, be, Ue (+287) |
| `ange_mastersns/public/assets/js/tweet/searcharea_animation.js` | t, l, u, m, E (+30) |
| `ange_mastersns/public/assets/js/tweet/expandphoto.js` | Get, IsConcatSpreadable, IteratorNext, IteratorComplete, IteratorStep (+25) |
| `ange_mastersns/resources/assets/js/tweet/create.ts` | constructor, init, setTweetCounter, initVue, showPenaltyDialog (+5) |
| `ange_mastersns/resources/assets/js/tweet/list.ts` | init, showPenaltyDialog, completeNiceMsg, showMessage, showChat (+4) |
| `ange_mastersns/resources/assets/js/tweet/index.ts` | init, completeMsg, completeNiceMsg, setShow, sendNice (+2) |
| `ange_mastersns/resources/assets/js/tweet/searcharea_animation.ts` | onScroll, show |

## Entry Points

Start here when exploring this area:

- **`isPassedViewTime`** (Function) — `ange_mastersns/resources/assets/js/common.ts:251`
- **`onScroll`** (Method) — `ange_mastersns/resources/assets/js/tweet/searcharea_animation.ts:62`
- **`show`** (Method) — `ange_mastersns/resources/assets/js/tweet/searcharea_animation.ts:163`

## Key Symbols

| Symbol | Type | File | Line |
|--------|------|------|------|
| `isPassedViewTime` | Function | `ange_mastersns/resources/assets/js/common.ts` | 251 |
| `onScroll` | Method | `ange_mastersns/resources/assets/js/tweet/searcharea_animation.ts` | 62 |
| `show` | Method | `ange_mastersns/resources/assets/js/tweet/searcharea_animation.ts` | 163 |
| `y` | Function | `ange_mastersns/public/assets/js/tweet/create.js` | 0 |
| `bt` | Function | `ange_mastersns/public/assets/js/tweet/create.js` | 0 |
| `wt` | Function | `ange_mastersns/public/assets/js/tweet/create.js` | 0 |
| `H` | Function | `ange_mastersns/public/assets/js/tweet/create.js` | 0 |
| `when` | Function | `ange_mastersns/public/assets/js/tweet/create.js` | 0 |
| `addClass` | Function | `ange_mastersns/public/assets/js/tweet/create.js` | 0 |
| `removeClass` | Function | `ange_mastersns/public/assets/js/tweet/create.js` | 0 |
| `toggleClass` | Function | `ange_mastersns/public/assets/js/tweet/create.js` | 0 |
| `hasClass` | Function | `ange_mastersns/public/assets/js/tweet/create.js` | 0 |
| `qt` | Function | `ange_mastersns/public/assets/js/tweet/create.js` | 0 |
| `wrap` | Function | `ange_mastersns/public/assets/js/tweet/create.js` | 0 |
| `highlight` | Function | `ange_mastersns/public/assets/js/tweet/create.js` | 0 |
| `unhighlight` | Function | `ange_mastersns/public/assets/js/tweet/create.js` | 0 |
| `showErrors` | Function | `ange_mastersns/public/assets/js/tweet/create.js` | 0 |
| `resetElements` | Function | `ange_mastersns/public/assets/js/tweet/create.js` | 0 |
| `showLabel` | Function | `ange_mastersns/public/assets/js/tweet/create.js` | 0 |
| `errorsFor` | Function | `ange_mastersns/public/assets/js/tweet/create.js` | 0 |

## Connected Areas

| Area | Connections |
|------|-------------|
| List | 124 calls |
| Message | 82 calls |
| Search | 24 calls |
| Profile_edit | 23 calls |
| Js | 17 calls |
| Profile_detail | 7 calls |
| Nicemsg | 2 calls |
| Community | 1 calls |

## How to Explore

1. `gitnexus_context({name: "isPassedViewTime"})` — see callers and callees
2. `gitnexus_query({query: "tweet"})` — find related execution flows
3. Read key files listed above for implementation details
