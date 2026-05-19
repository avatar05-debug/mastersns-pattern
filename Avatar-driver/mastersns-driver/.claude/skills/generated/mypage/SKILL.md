---
name: mypage
description: "Skill for the Mypage area of mastersns-driver. 1970 symbols across 15 files."
---

# Mypage

1970 symbols | 15 files | Cohesion: 60%

## When to Use

- Working with code in `ange_mastersns/`
- Understanding how unescapeHtml, CameraCapture, open work
- Modifying mypage-related functionality

## Key Files

| File | Symbols |
|------|---------|
| `ange_mastersns/public/assets/js/mypage/top.js` | f, se, _e, be, Ue (+299) |
| `ange_mastersns/public/assets/js/mypage/info.js` | f, se, _e, be, Ue (+295) |
| `ange_mastersns/public/assets/js/mypage/nobrush.js` | f, se, _e, be, Ue (+286) |
| `ange_mastersns/public/assets/js/mypage/ageverification_camera.js` | i, o, a, s, c (+285) |
| `ange_mastersns/public/assets/js/mypage/edge.js` | f, se, _e, be, Ue (+284) |
| `ange_mastersns/public/assets/js/mypage/ageverification.js` | f, se, _e, be, Ue (+284) |
| `ange_mastersns/public/assets/js/mypage/brush.js` | i, o, s, c, f (+177) |
| `ange_mastersns/resources/assets/js/mypage/ageverification_camera.ts` | open, showPermissionError, close, capture, captureWithCrop (+1) |
| `ange_mastersns/resources/assets/js/mypage/brush.ts` | constructor, initBrush, floatFormat, getCursor, saveNowStatus |
| `ange_mastersns/resources/assets/js/mypage/nobrush.ts` | reTake, openCamera, capturePhoto, init |

## Entry Points

Start here when exploring this area:

- **`unescapeHtml`** (Function) — `ange_mastersns/resources/assets/js/common.ts:203`
- **`CameraCapture`** (Class) — `ange_mastersns/resources/assets/js/mypage/ageverification_camera.ts:28`
- **`open`** (Method) — `ange_mastersns/resources/assets/js/mypage/ageverification_camera.ts:41`
- **`showPermissionError`** (Method) — `ange_mastersns/resources/assets/js/mypage/ageverification_camera.ts:107`
- **`close`** (Method) — `ange_mastersns/resources/assets/js/mypage/ageverification_camera.ts:115`

## Key Symbols

| Symbol | Type | File | Line |
|--------|------|------|------|
| `CameraCapture` | Class | `ange_mastersns/resources/assets/js/mypage/ageverification_camera.ts` | 28 |
| `unescapeHtml` | Function | `ange_mastersns/resources/assets/js/common.ts` | 203 |
| `open` | Method | `ange_mastersns/resources/assets/js/mypage/ageverification_camera.ts` | 41 |
| `showPermissionError` | Method | `ange_mastersns/resources/assets/js/mypage/ageverification_camera.ts` | 107 |
| `close` | Method | `ange_mastersns/resources/assets/js/mypage/ageverification_camera.ts` | 115 |
| `capture` | Method | `ange_mastersns/resources/assets/js/mypage/ageverification_camera.ts` | 133 |
| `captureWithCrop` | Method | `ange_mastersns/resources/assets/js/mypage/ageverification_camera.ts` | 145 |
| `i` | Function | `ange_mastersns/public/assets/js/mypage/ageverification_camera.js` | 0 |
| `o` | Function | `ange_mastersns/public/assets/js/mypage/ageverification_camera.js` | 0 |
| `a` | Function | `ange_mastersns/public/assets/js/mypage/ageverification_camera.js` | 0 |
| `s` | Function | `ange_mastersns/public/assets/js/mypage/ageverification_camera.js` | 0 |
| `c` | Function | `ange_mastersns/public/assets/js/mypage/ageverification_camera.js` | 0 |
| `u` | Function | `ange_mastersns/public/assets/js/mypage/ageverification_camera.js` | 0 |
| `f` | Function | `ange_mastersns/public/assets/js/mypage/ageverification_camera.js` | 0 |
| `p` | Function | `ange_mastersns/public/assets/js/mypage/ageverification_camera.js` | 0 |
| `d` | Function | `ange_mastersns/public/assets/js/mypage/ageverification_camera.js` | 0 |
| `h` | Function | `ange_mastersns/public/assets/js/mypage/ageverification_camera.js` | 0 |
| `v` | Function | `ange_mastersns/public/assets/js/mypage/ageverification_camera.js` | 0 |
| `y` | Function | `ange_mastersns/public/assets/js/mypage/ageverification_camera.js` | 0 |
| `b` | Function | `ange_mastersns/public/assets/js/mypage/ageverification_camera.js` | 0 |

## Connected Areas

| Area | Connections |
|------|-------------|
| List | 126 calls |
| Message | 108 calls |
| Search | 41 calls |
| Profile_edit | 29 calls |
| Js | 21 calls |
| Auth | 2 calls |
| Top | 1 calls |

## How to Explore

1. `gitnexus_context({name: "unescapeHtml"})` — see callers and callees
2. `gitnexus_query({query: "mypage"})` — find related execution flows
3. Read key files listed above for implementation details
