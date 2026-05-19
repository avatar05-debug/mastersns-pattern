---
name: message
description: "Skill for the Message area of mastersns-driver. 1619 symbols across 40 files."
---

# Message

1619 symbols | 40 files | Cohesion: 58%

## When to Use

- Working with code in `ange_mastersns/`
- Understanding how timeout, clearSessionGotoMessageChatFrom, RightTopMenu work
- Modifying message-related functionality

## Key Files

| File | Symbols |
|------|---------|
| `ange_mastersns/public/assets/js/message/template_list.js` | mo, chars, y, bt, wt (+379) |
| `ange_mastersns/public/assets/js/message/template_regist.js` | n, i, a, s, c (+358) |
| `ange_mastersns/public/assets/js/message/index.js` | Ee, ke, handler, dispatch, preventDefault (+351) |
| `ange_mastersns/public/assets/js/message/expansion.js` | n, o, i, a, s (+177) |
| `ange_mastersns/public/assets/js/message/nicemsg.js` | i, S, x, P, L (+177) |
| `ange_mastersns/resources/assets/js/message/index.ts` | setFavorite, constructor, startstore, init, showCompleted (+41) |
| `ange_mastersns/public/assets/js/message/socketclient.js` | c, f, p, a, u (+14) |
| `ange_mastersns/resources/assets/js/message/socketclient.ts` | publish, reconnect, status, connect, prepend (+4) |
| `ange_mastersns/public/assets/js/auth/number_auth.js` | St, Ct, handler, stopPropagation, stopImmediatePropagation (+3) |
| `ange_mastersns/public/assets/js/top/index_sp.js` | wt, Tt, handler, stopPropagation, stopImmediatePropagation (+2) |

## Entry Points

Start here when exploring this area:

- **`timeout`** (Function) — `ange_mastersns/resources/assets/js/common.ts:230`
- **`clearSessionGotoMessageChatFrom`** (Function) — `ange_mastersns/resources/assets/js/message/helper.ts:18`
- **`RightTopMenu`** (Class) — `ange_mastersns/resources/assets/js/righttopmenu.ts:26`
- **`Image`** (Class) — `ange_mastersns/fuel/core/classes/image.php:14`
- **`MessageClient`** (Class) — `ange_mastersns/resources/assets/js/message/socketclient.ts:3`

## Key Symbols

| Symbol | Type | File | Line |
|--------|------|------|------|
| `RightTopMenu` | Class | `ange_mastersns/resources/assets/js/righttopmenu.ts` | 26 |
| `Image` | Class | `ange_mastersns/fuel/core/classes/image.php` | 14 |
| `MessageClient` | Class | `ange_mastersns/resources/assets/js/message/socketclient.ts` | 3 |
| `timeout` | Function | `ange_mastersns/resources/assets/js/common.ts` | 230 |
| `clearSessionGotoMessageChatFrom` | Function | `ange_mastersns/resources/assets/js/message/helper.ts` | 18 |
| `setheaderMenuFavoriteBtn` | Method | `ange_mastersns/resources/assets/js/righttopmenu.ts` | 51 |
| `setFavoriteCall` | Method | `ange_mastersns/resources/assets/js/righttopmenu.ts` | 60 |
| `publish` | Method | `ange_mastersns/resources/assets/js/message/socketclient.ts` | 25 |
| `reconnect` | Method | `ange_mastersns/resources/assets/js/message/socketclient.ts` | 72 |
| `status` | Method | `ange_mastersns/resources/assets/js/message/socketclient.ts` | 93 |
| `connect` | Method | `ange_mastersns/resources/assets/js/message/socketclient.ts` | 15 |
| `prepend` | Method | `ange_mastersns/resources/assets/js/message/socketclient.ts` | 54 |
| `on` | Method | `ange_mastersns/resources/assets/js/message/socketclient.ts` | 79 |
| `readMessage` | Method | `ange_mastersns/resources/assets/js/message/socketclient.ts` | 20 |
| `publishTemplate` | Method | `ange_mastersns/resources/assets/js/message/socketclient.ts` | 35 |
| `n` | Function | `ange_mastersns/public/assets/js/message/template_regist.js` | 0 |
| `i` | Function | `ange_mastersns/public/assets/js/message/template_regist.js` | 0 |
| `a` | Function | `ange_mastersns/public/assets/js/message/template_regist.js` | 0 |
| `s` | Function | `ange_mastersns/public/assets/js/message/template_regist.js` | 0 |
| `c` | Function | `ange_mastersns/public/assets/js/message/template_regist.js` | 0 |

## Connected Areas

| Area | Connections |
|------|-------------|
| List | 112 calls |
| Search | 66 calls |
| Profile_edit | 33 calls |
| Auth | 22 calls |
| Js | 19 calls |
| Top | 6 calls |
| Dialogs | 6 calls |
| Classes | 3 calls |

## How to Explore

1. `gitnexus_context({name: "timeout"})` — see callers and callees
2. `gitnexus_query({query: "message"})` — find related execution flows
3. Read key files listed above for implementation details
