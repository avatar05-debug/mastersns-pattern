---
name: classes
description: "Skill for the Classes area of mastersns-driver. 627 symbols across 145 files."
---

# Classes

627 symbols | 145 files | Cohesion: 67%

## When to Use

- Working with code in `ange_mastersns/`
- Understanding how get_real_class, import, setup_autoloader work
- Modifying classes-related functionality

## Key Files

| File | Symbols |
|------|---------|
| `ange_mastersns/fuel/packages/orm/classes/model.php` | FrozenObject, forge, connection, cached_object, primary_key (+42) |
| `ange_mastersns/fuel/core/classes/file.php` | _init, instance, get, exists, create_dir (+17) |
| `ange_mastersns/fuel/core/classes/arr.php` | insert, insert_before_key, insert_before_value, get, pluck (+16) |
| `ange_mastersns/fuel/packages/orm/classes/query.php` | hydrate, _table, select, build_query, use_subquery (+13) |
| `ange_mastersns/fuel/core/classes/fieldset.php` | validation, validated, error, show_errors, __construct (+13) |
| `ange_mastersns/fuel/app/classes/tag.php` | getQuestionList, getQuestionQuestion, getQuestionAnswer, getQuestionQuestionByName, getQuestionAnswerByName (+12) |
| `ange_mastersns/fuel/app/classes/agent.php` | get_incpath, get_defaultpath, get_previewpath, get_viewfolder_custom, get_viewfolder_default (+12) |
| `ange_mastersns/fuel/packages/myorm/classes/query.php` | hydrate, __construct, where, _where, _parse_where_array (+11) |
| `ange_mastersns/fuel/core/classes/inflector.php` | singularize, humanize, classify, underscore, demodulize (+9) |
| `ange_mastersns/fuel/packages/oil/classes/generate.php` | controller, model, module, views, migration (+8) |

## Entry Points

Start here when exploring this area:

- **`get_real_class`** (Function) — `ange_mastersns/fuel/core/base.php:235`
- **`import`** (Function) — `ange_mastersns/fuel/core/base.php:38`
- **`setup_autoloader`** (Function) — `ange_mastersns/fuel/core/bootstrap.php:114`
- **`get_drupal_path`** (Function) — `ange_mastersns/public/assets/admin/js/kcfinder/integration/drupal.php:15`
- **`FrozenObject`** (Class) — `ange_mastersns/fuel/packages/orm/classes/model.php:22`

## Key Symbols

| Symbol | Type | File | Line |
|--------|------|------|------|
| `FrozenObject` | Class | `ange_mastersns/fuel/packages/orm/classes/model.php` | 22 |
| `ValidationFailed` | Class | `ange_mastersns/fuel/packages/orm/classes/observer/validation.php` | 17 |
| `RelationNotSoft` | Class | `ange_mastersns/fuel/packages/orm/classes/model/soft.php` | 14 |
| `Mail_mimeDecode` | Class | `ange_mastersns/fuel/app/classes/mimeDecode.php` | 88 |
| `HttpBadRequestException` | Class | `ange_mastersns/fuel/core/classes/httpexceptions.php` | 14 |
| `HttpException` | Class | `ange_mastersns/fuel/core/classes/httpexception.php` | 14 |
| `Arraylike` | Class | `ange_mastersns/fuel/core/tests/view.php` | 14 |
| `get_real_class` | Function | `ange_mastersns/fuel/core/base.php` | 235 |
| `import` | Function | `ange_mastersns/fuel/core/base.php` | 38 |
| `setup_autoloader` | Function | `ange_mastersns/fuel/core/bootstrap.php` | 114 |
| `get_drupal_path` | Function | `ange_mastersns/public/assets/admin/js/kcfinder/integration/drupal.php` | 15 |
| `current` | Method | `ange_mastersns/fuel/core/classes/migrate.php` | 178 |
| `hydrate` | Method | `ange_mastersns/fuel/packages/orm/classes/query.php` | 1374 |
| `forge` | Method | `ange_mastersns/fuel/packages/orm/classes/model.php` | 142 |
| `connection` | Method | `ange_mastersns/fuel/packages/orm/classes/model.php` | 153 |
| `cached_object` | Method | `ange_mastersns/fuel/packages/orm/classes/model.php` | 244 |
| `primary_key` | Method | `ange_mastersns/fuel/packages/orm/classes/model.php` | 294 |
| `implode_pk` | Method | `ange_mastersns/fuel/packages/orm/classes/model.php` | 311 |
| `properties` | Method | `ange_mastersns/fuel/packages/orm/classes/model.php` | 343 |
| `relations` | Method | `ange_mastersns/fuel/packages/orm/classes/model.php` | 449 |

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
| Model | 103 calls |
| Controller | 18 calls |
| Session | 16 calls |
| Tasks | 11 calls |
| Fieldset | 9 calls |
| Tests | 6 calls |
| Form | 4 calls |
| Auth | 3 calls |

## How to Explore

1. `gitnexus_context({name: "get_real_class"})` — see callers and callees
2. `gitnexus_query({query: "classes"})` — find related execution flows
3. Read key files listed above for implementation details
