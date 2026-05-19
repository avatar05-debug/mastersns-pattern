---
name: auth
description: "Skill for the Auth area of mastersns-driver. 2397 symbols across 32 files."
---

# Auth

2397 symbols | 32 files | Cohesion: 57%

## When to Use

- Working with code in `ange_mastersns/`
- Understanding how delete, isMemberUseOpenId, getBannerInfoId work
- Modifying auth-related functionality

## Key Files

| File | Symbols |
|------|---------|
| `ange_mastersns/public/assets/js/auth/mail_register.js` | f, se, be, _e, Ue (+371) |
| `ange_mastersns/public/assets/js/auth/pre_register.js` | o, d, m, e, Gt (+365) |
| `ange_mastersns/public/assets/js/auth/login.js` | f, se, _e, be, He (+343) |
| `ange_mastersns/public/assets/js/auth/sms.js` | f, se, _e, be, Fe (+297) |
| `ange_mastersns/public/assets/js/auth/inquiry.js` | f, se, _e, be, Ue (+283) |
| `ange_mastersns/public/assets/js/auth/number_auth.js` | n, o, i, s, c (+277) |
| `ange_mastersns/public/assets/js/auth/number.js` | n, o, c, f, p (+180) |
| `ange_mastersns/public/assets/js/auth/inquiry_confirm.js` | n, o, c, f, p (+180) |
| `ange_mastersns/fuel/app/classes/controller/auth/trial.php` | action_register, action_email_sent, action_register_finish, action_register_finish_nr, _regist (+2) |
| `ange_mastersns/fuel/app/classes/controller/auth/start.php` | action_sms, _logout, action_inquiry_stop, action_inquiry_stop_confirm, _getYearList (+1) |

## Entry Points

Start here when exploring this area:

- **`delete`** (Method) — `ange_mastersns/fuel/core/classes/session.php:257`
- **`isMemberUseOpenId`** (Method) — `ange_mastersns/fuel/app/classes/tag.php:753`
- **`getBannerInfoId`** (Method) — `ange_mastersns/fuel/app/classes/tag.php:2713`
- **`logout`** (Method) — `ange_mastersns/fuel/packages/auth/classes/auth.php:279`
- **`action_list`** (Method) — `ange_mastersns/fuel/app/classes/controller/photo.php:46`

## Key Symbols

| Symbol | Type | File | Line |
|--------|------|------|------|
| `delete` | Method | `ange_mastersns/fuel/core/classes/session.php` | 257 |
| `isMemberUseOpenId` | Method | `ange_mastersns/fuel/app/classes/tag.php` | 753 |
| `getBannerInfoId` | Method | `ange_mastersns/fuel/app/classes/tag.php` | 2713 |
| `logout` | Method | `ange_mastersns/fuel/packages/auth/classes/auth.php` | 279 |
| `action_list` | Method | `ange_mastersns/fuel/app/classes/controller/photo.php` | 46 |
| `action_logout` | Method | `ange_mastersns/fuel/app/classes/controller/auth.php` | 52 |
| `action_signinjump` | Method | `ange_mastersns/fuel/app/classes/controller/auth.php` | 70 |
| `_logout` | Method | `ange_mastersns/fuel/app/classes/controller/auth.php` | 423 |
| `isForcingCallOnDialNumber` | Method | `ange_mastersns/fuel/app/classes/model/member.php` | 5785 |
| `getBannerInfoId` | Method | `ange_mastersns/fuel/app/classes/model/infomaillog.php` | 487 |
| `_delApToken` | Method | `ange_mastersns/fuel/app/classes/controller/payment/base.php` | 158 |
| `_delSettleSession` | Method | `ange_mastersns/fuel/app/classes/controller/payment/amazonpay.php` | 194 |
| `action_register` | Method | `ange_mastersns/fuel/app/classes/controller/auth/trial.php` | 15 |
| `action_email_sent` | Method | `ange_mastersns/fuel/app/classes/controller/auth/trial.php` | 230 |
| `action_register_finish` | Method | `ange_mastersns/fuel/app/classes/controller/auth/trial.php` | 250 |
| `action_register_finish_nr` | Method | `ange_mastersns/fuel/app/classes/controller/auth/trial.php` | 310 |
| `_regist` | Method | `ange_mastersns/fuel/app/classes/controller/auth/trial.php` | 330 |
| `action_after_login` | Method | `ange_mastersns/fuel/app/classes/controller/auth/trial.php` | 351 |
| `action_email_finished` | Method | `ange_mastersns/fuel/app/classes/controller/auth/trial.php` | 406 |
| `action_sms` | Method | `ange_mastersns/fuel/app/classes/controller/auth/start.php` | 107 |

## Execution Flows

| Flow | Type | Steps |
|------|------|-------|
| `Action_callback → Get` | cross_community | 4 |
| `Action_callback → Is_json` | cross_community | 4 |

## Connected Areas

| Area | Connections |
|------|-------------|
| Message | 158 calls |
| List | 111 calls |
| Search | 63 calls |
| Profile_edit | 33 calls |
| Model | 29 calls |
| Js | 20 calls |
| Start | 5 calls |
| Controller | 4 calls |

## How to Explore

1. `gitnexus_context({name: "delete"})` — see callers and callees
2. `gitnexus_query({query: "auth"})` — find related execution flows
3. Read key files listed above for implementation details
