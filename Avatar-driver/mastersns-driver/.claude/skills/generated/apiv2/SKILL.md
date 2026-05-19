---
name: apiv2
description: "Skill for the Apiv2 area of mastersns-driver. 424 symbols across 131 files."
---

# Apiv2

424 symbols | 131 files | Cohesion: 72%

## When to Use

- Working with code in `ange_mastersns/`
- Understanding how Line, Model_PrTemplate, set_global work
- Modifying apiv2-related functionality

## Key Files

| File | Symbols |
|------|---------|
| `ange_mastersns/fuel/app/classes/controller/app/apiv2/setting.php` | post_top, post_get_account, post_get_trial_email, post_get_email, post_regist_email (+26) |
| `ange_mastersns/fuel/app/classes/controller/app/apiv2/mem.php` | check_openid, action_check_lineid, action_create_fb_member, action_create_twitter_member, action_create_google_member (+21) |
| `ange_mastersns/fuel/app/classes/controller/app/api/setting.php` | action_get_nice_max, action_get_footstamp_setting, action_set_footstamp_setting, action_get_offline_update, action_set_offline_update (+11) |
| `ange_mastersns/fuel/app/classes/controller/app/api/mem.php` | action_check_fbid, action_check_uuid, action_set_uuid, action_check_secret_code, action_link_fb_member (+10) |
| `ange_mastersns/fuel/app/classes/controller/apiv2/setting.php` | post_getalert, post_setalert, post_get_aocca_notice, action_get_footprint_setting, action_get_email (+8) |
| `ange_mastersns/fuel/app/classes/controller/appapi.php` | setResponse, signatureCheck, makeResponse, debug, _getPaymentData (+7) |
| `ange_mastersns/fuel/app/classes/model/member.php` | isDuplicateEmail, saveEmail, saveLastLoginApp, resetMailUnknown, getStatus4ApiResponse (+6) |
| `ange_mastersns/fuel/app/classes/controller/app/apiv2/search.php` | post_setsort, post_getsort, post_simple, action_simpletop, post_aocca (+4) |
| `ange_mastersns/fuel/app/classes/controller/app/apiv2/purchase.php` | before, post_getProduct, post_getProductNonAddon, post_paymentStatus, post_ageverification (+3) |
| `ange_mastersns/fuel/app/classes/controller/app/apiv2/community.php` | post_category_list, post_detail, post_join, post_list, post_type_list (+3) |

## Entry Points

Start here when exploring this area:

- **`Line`** (Class) — `ange_mastersns/fuel/app/classes/line.php:5`
- **`Model_PrTemplate`** (Class) — `ange_mastersns/fuel/app/classes/model/prtemplate.php:2`
- **`set_global`** (Method) — `ange_mastersns/fuel/core/classes/view.php:366`
- **`forge`** (Method) — `ange_mastersns/fuel/core/classes/response.php:93`
- **`isFreeStatus`** (Method) — `ange_mastersns/fuel/app/classes/tag.php:1501`

## Key Symbols

| Symbol | Type | File | Line |
|--------|------|------|------|
| `Line` | Class | `ange_mastersns/fuel/app/classes/line.php` | 5 |
| `Model_PrTemplate` | Class | `ange_mastersns/fuel/app/classes/model/prtemplate.php` | 2 |
| `set_global` | Method | `ange_mastersns/fuel/core/classes/view.php` | 366 |
| `forge` | Method | `ange_mastersns/fuel/core/classes/response.php` | 93 |
| `isFreeStatus` | Method | `ange_mastersns/fuel/app/classes/tag.php` | 1501 |
| `getOtokuPriceToPoint` | Method | `ange_mastersns/fuel/app/classes/tag.php` | 2646 |
| `getCasePoint` | Method | `ange_mastersns/fuel/app/classes/point.php` | 709 |
| `getMemberViewStatus` | Method | `ange_mastersns/fuel/app/classes/point.php` | 1042 |
| `verifyAccessToken` | Method | `ange_mastersns/fuel/app/classes/line.php` | 87 |
| `getUserinfo` | Method | `ange_mastersns/fuel/app/classes/line.php` | 127 |
| `_serverGet` | Method | `ange_mastersns/fuel/app/classes/line.php` | 141 |
| `generateProfPhotoUrlApp` | Method | `ange_mastersns/fuel/app/classes/common.php` | 2058 |
| `action_email_sent` | Method | `ange_mastersns/fuel/app/classes/controller/setting.php` | 444 |
| `action_email_sended` | Method | `ange_mastersns/fuel/app/classes/controller/setting.php` | 603 |
| `action_update_fb_friend` | Method | `ange_mastersns/fuel/app/classes/controller/setting.php` | 774 |
| `isInvalidMail` | Method | `ange_mastersns/fuel/app/classes/controller/setting.php` | 1331 |
| `setResponse` | Method | `ange_mastersns/fuel/app/classes/controller/appapi.php` | 95 |
| `signatureCheck` | Method | `ange_mastersns/fuel/app/classes/controller/appapi.php` | 101 |
| `makeResponse` | Method | `ange_mastersns/fuel/app/classes/controller/appapi.php` | 149 |
| `debug` | Method | `ange_mastersns/fuel/app/classes/controller/appapi.php` | 409 |

## Execution Flows

| Flow | Type | Steps |
|------|------|-------|
| `Post_prof → Need_logging` | cross_community | 6 |
| `Post_prof → Instance` | cross_community | 6 |
| `Post_partner → Server` | cross_community | 5 |
| `Action_create → Or_where_open` | cross_community | 5 |
| `Action_create → Or_where_close` | cross_community | 5 |
| `Post_prof → Server` | cross_community | 5 |
| `Post_add → Server` | cross_community | 5 |
| `Post_before → Server` | cross_community | 5 |
| `Post_main → Server` | cross_community | 5 |
| `Post_prof → To_array` | cross_community | 5 |

## Connected Areas

| Area | Connections |
|------|-------------|
| Model | 775 calls |
| Tests | 18 calls |
| Controller | 11 calls |
| Classes | 7 calls |
| Session | 2 calls |

## How to Explore

1. `gitnexus_context({name: "Line"})` — see callers and callees
2. `gitnexus_query({query: "apiv2"})` — find related execution flows
3. Read key files listed above for implementation details
