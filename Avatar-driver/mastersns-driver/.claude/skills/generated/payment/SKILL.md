---
name: payment
description: "Skill for the Payment area of mastersns-driver. 1450 symbols across 15 files."
---

# Payment

1450 symbols | 15 files | Cohesion: 77%

## When to Use

- Working with code in `ange_mastersns/`
- Understanding how PaymentBase, setStoreInfo, action_settle work
- Modifying payment-related functionality

## Key Files

| File | Symbols |
|------|---------|
| `ange_mastersns/public/assets/js/payment/select.js` | i, o, a, c, u (+285) |
| `ange_mastersns/public/assets/js/payment/product.js` | i, o, a, c, u (+285) |
| `ange_mastersns/public/assets/js/payment/explain_dialog.js` | i, o, a, c, u (+285) |
| `ange_mastersns/public/assets/js/payment/bank_flatratepack.js` | i, o, c, f, p (+176) |
| `ange_mastersns/public/assets/js/payment/conveni_finished.js` | n, i, o, c, f (+176) |
| `ange_mastersns/public/assets/js/payment/conveni.js` | i, o, c, f, p (+175) |
| `ange_mastersns/fuel/packages/mgpayment/classes/sandbox/payment/direct.php` | action_settle, _sendSettlementCompNotice, _sendSettlementRevoke, mgconfig, _errCheckRequiredParam (+8) |
| `ange_mastersns/resources/assets/js/payment/product.ts` | PaymentProduct, constructor, initDomEvent, setShow, select (+3) |
| `ange_mastersns/fuel/packages/mgpayment/classes/sandbox/payment/credit.php` | action_settle, _checkNumber, _validation, action_quick, _createLog (+1) |
| `ange_mastersns/fuel/packages/mgpayment/classes/sandbox/payment/download.php` | action_settle, mgconfig, _errCheckRequiredParam |

## Entry Points

Start here when exploring this area:

- **`PaymentBase`** (Class) — `ange_mastersns/resources/assets/js/payment/payment_base.ts:2`
- **`setStoreInfo`** (Method) — `ange_mastersns/resources/assets/js/payment/payment_base.ts:15`
- **`action_settle`** (Method) — `ange_mastersns/fuel/packages/mgpayment/classes/sandbox/payment/direct.php:25`
- **`_sendSettlementCompNotice`** (Method) — `ange_mastersns/fuel/packages/mgpayment/classes/sandbox/payment/direct.php:226`
- **`_sendSettlementRevoke`** (Method) — `ange_mastersns/fuel/packages/mgpayment/classes/sandbox/payment/direct.php:265`

## Key Symbols

| Symbol | Type | File | Line |
|--------|------|------|------|
| `PaymentBase` | Class | `ange_mastersns/resources/assets/js/payment/payment_base.ts` | 2 |
| `setStoreInfo` | Method | `ange_mastersns/resources/assets/js/payment/payment_base.ts` | 15 |
| `action_settle` | Method | `ange_mastersns/fuel/packages/mgpayment/classes/sandbox/payment/direct.php` | 25 |
| `_sendSettlementCompNotice` | Method | `ange_mastersns/fuel/packages/mgpayment/classes/sandbox/payment/direct.php` | 226 |
| `_sendSettlementRevoke` | Method | `ange_mastersns/fuel/packages/mgpayment/classes/sandbox/payment/direct.php` | 265 |
| `mgconfig` | Method | `ange_mastersns/fuel/packages/mgpayment/classes/sandbox/payment/direct.php` | 341 |
| `_errCheckRequiredParam` | Method | `ange_mastersns/fuel/packages/mgpayment/classes/sandbox/payment/direct.php` | 346 |
| `action_cancel` | Method | `ange_mastersns/fuel/packages/mgpayment/classes/sandbox/payment/direct.php` | 86 |
| `_existRequest` | Method | `ange_mastersns/fuel/packages/mgpayment/classes/sandbox/payment/direct.php` | 294 |
| `_existAmountLog` | Method | `ange_mastersns/fuel/packages/mgpayment/classes/sandbox/payment/direct.php` | 299 |
| `_existRecord` | Method | `ange_mastersns/fuel/packages/mgpayment/classes/sandbox/payment/direct.php` | 304 |
| `_getCvs` | Method | `ange_mastersns/fuel/packages/mgpayment/classes/sandbox/payment/direct.php` | 316 |
| `action_settle` | Method | `ange_mastersns/fuel/packages/mgpayment/classes/sandbox/payment/download.php` | 25 |
| `mgconfig` | Method | `ange_mastersns/fuel/packages/mgpayment/classes/sandbox/payment/download.php` | 185 |
| `_errCheckRequiredParam` | Method | `ange_mastersns/fuel/packages/mgpayment/classes/sandbox/payment/download.php` | 190 |
| `action_pay_conveni` | Method | `ange_mastersns/fuel/packages/mgpayment/classes/sandbox/payment/direct.php` | 116 |
| `action_revoke_conveni` | Method | `ange_mastersns/fuel/packages/mgpayment/classes/sandbox/payment/direct.php` | 177 |
| `_getDirectRequestId` | Method | `ange_mastersns/fuel/packages/mgpayment/classes/sandbox/payment/direct.php` | 322 |
| `action_settle` | Method | `ange_mastersns/fuel/packages/mgpayment/classes/sandbox/payment/credit.php` | 19 |
| `_checkNumber` | Method | `ange_mastersns/fuel/packages/mgpayment/classes/sandbox/payment/credit.php` | 163 |

## Connected Areas

| Area | Connections |
|------|-------------|
| List | 67 calls |
| Message | 63 calls |
| Search | 31 calls |
| Profile_edit | 15 calls |
| Model | 8 calls |
| Js | 6 calls |
| Controller | 3 calls |
| Auth | 1 calls |

## How to Explore

1. `gitnexus_context({name: "PaymentBase"})` — see callers and callees
2. `gitnexus_query({query: "payment"})` — find related execution flows
3. Read key files listed above for implementation details
