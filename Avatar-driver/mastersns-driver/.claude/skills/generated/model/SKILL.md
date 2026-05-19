---
name: model
description: "Skill for the Model area of mastersns-driver. 1812 symbols across 434 files."
---

# Model

1812 symbols | 434 files | Cohesion: 69%

## When to Use

- Working with code in `ange_mastersns/`
- Understanding how Facebook2, AppleApi, Exception work
- Modifying model-related functionality

## Key Files

| File | Symbols |
|------|---------|
| `ange_mastersns/fuel/app/classes/model/member.php` | setSession, getDuplicateEmailMember, deletePreMember, deleteAdminMember, getUser (+99) |
| `ange_mastersns/fuel/app/classes/model/memberprofile.php` | getIdsCachedFile, formatProfileData, formatPickupData, getPickupIds, getPickupSortedIds (+67) |
| `ange_mastersns/fuel/app/classes/tag.php` | getAge, getMemberId, getMemberIdForApi, getMemberEmail, getMemberEmail1 (+41) |
| `ange_mastersns/fuel/app/classes/common.php` | fileUpload, fileUploadMulti, createThumbnail, cropFromCenter, cropFromCenterToRatioAndResize (+33) |
| `ange_mastersns/fuel/app/classes/model/nice.php` | _queueNotify, flushNotify, getBtnType, _getNiceBtnTypeMyEarlierAction, add (+32) |
| `ange_mastersns/fuel/app/classes/model/snscooperation.php` | _createPhoto, __construct, confirmSubscription, __construct, _loadConfig (+25) |
| `ange_mastersns/fuel/packages/orm/classes/model/nestedset.php` | tree_config, get_tree_id, build_query, is_root, is_child (+25) |
| `ange_mastersns/fuel/app/classes/model/photo.php` | getUploadPath, setPhotoRollback, setProfileimagecheck, getPhotoKind, updateChkList (+23) |
| `ange_mastersns/fuel/app/classes/model/messagelog.php` | setReadat, getSendCnt, checkFirstApp, getMessageForProfDetail, getNiceMiteneMessageCnt (+19) |
| `ange_mastersns/fuel/app/classes/controller/setting.php` | action_index, action_account, action_withdrawalreg, action_pause, action_pausereg (+17) |

## Entry Points

Start here when exploring this area:

- **`Facebook2`** (Class) — `ange_mastersns/fuel/app/classes/facebook2.php:6`
- **`AppleApi`** (Class) — `ange_mastersns/fuel/app/classes/appleapi.php:7`
- **`Exception`** (Class) — `ange_mastersns/fuel/packages/oil/classes/exception.php:22`
- **`Model_TextEdit`** (Class) — `ange_mastersns/fuel/app/classes/model/textedit.php:2`
- **`Model_PreRegistLog`** (Class) — `ange_mastersns/fuel/app/classes/model/preregistlog.php:5`

## Key Symbols

| Symbol | Type | File | Line |
|--------|------|------|------|
| `Facebook2` | Class | `ange_mastersns/fuel/app/classes/facebook2.php` | 6 |
| `AppleApi` | Class | `ange_mastersns/fuel/app/classes/appleapi.php` | 7 |
| `Exception` | Class | `ange_mastersns/fuel/packages/oil/classes/exception.php` | 22 |
| `Model_TextEdit` | Class | `ange_mastersns/fuel/app/classes/model/textedit.php` | 2 |
| `Model_PreRegistLog` | Class | `ange_mastersns/fuel/app/classes/model/preregistlog.php` | 5 |
| `Model_NewsLog` | Class | `ange_mastersns/fuel/app/classes/model/newslog.php` | 1 |
| `Model_MailRegErrLog` | Class | `ange_mastersns/fuel/app/classes/model/mailregerrlog.php` | 2 |
| `Model_MailEdit` | Class | `ange_mastersns/fuel/app/classes/model/mailedit.php` | 1 |
| `Model_Follow` | Class | `ange_mastersns/fuel/app/classes/model/follow.php` | 4 |
| `TransactionException` | Class | `ange_mastersns/fuel/packages/mgpayment/classes/mgpayment/driver.php` | 11 |
| `Ipcountry` | Class | `ange_mastersns/fuel/app/classes/ipcountry.php` | 6 |
| `Model_PushAlertSetting` | Class | `ange_mastersns/fuel/app/classes/model/pushalertsetting.php` | 2 |
| `Model_MemberProfile` | Class | `ange_mastersns/fuel/app/classes/model/memberprofile.php` | 2 |
| `Model_MemberPenaltie` | Class | `ange_mastersns/fuel/app/classes/model/memberpenaltie.php` | 2 |
| `Model_MemberPayment` | Class | `ange_mastersns/fuel/app/classes/model/memberpayment.php` | 2 |
| `Model_MemberMatching` | Class | `ange_mastersns/fuel/app/classes/model/membermatching.php` | 2 |
| `Model_MemberMailerr` | Class | `ange_mastersns/fuel/app/classes/model/membermailerr.php` | 7 |
| `Model_MemberDetail` | Class | `ange_mastersns/fuel/app/classes/model/memberdetail.php` | 2 |
| `Model_MemberAocca` | Class | `ange_mastersns/fuel/app/classes/model/memberaocca.php` | 2 |
| `Model_Member` | Class | `ange_mastersns/fuel/app/classes/model/member.php` | 2 |

## Execution Flows

| Flow | Type | Steps |
|------|------|-------|
| `Save → Is_countable` | cross_community | 10 |
| `Save → Denamespace` | cross_community | 9 |
| `Save → Underscore` | cross_community | 9 |
| `Action_partner → Get` | cross_community | 7 |
| `Action_partner → Ucfirst` | cross_community | 7 |
| `Action_partner → Start` | cross_community | 7 |
| `Action_create → Get` | cross_community | 7 |
| `Action_create → Ucfirst` | cross_community | 7 |
| `Action_index → Get` | cross_community | 7 |
| `Action_index → Ucfirst` | cross_community | 7 |

## Connected Areas

| Area | Connections |
|------|-------------|
| Apiv2 | 486 calls |
| Classes | 99 calls |
| Tests | 57 calls |
| Controller | 52 calls |
| Auth | 31 calls |
| Session | 14 calls |
| Driver | 14 calls |
| Tasks | 8 calls |

## How to Explore

1. `gitnexus_context({name: "Facebook2"})` — see callers and callees
2. `gitnexus_query({query: "model"})` — find related execution flows
3. Read key files listed above for implementation details
