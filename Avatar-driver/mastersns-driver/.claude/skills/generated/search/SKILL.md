---
name: search
description: "Skill for the Search area of mastersns-driver. 4244 symbols across 135 files."
---

# Search

4244 symbols | 135 files | Cohesion: 57%

## When to Use

- Working with code in `ange_mastersns/`
- Understanding how SearchProfData, SearchEasyResultData, SearchEasyData work
- Modifying search-related functionality

## Key Files

| File | Symbols |
|------|---------|
| `ange_mastersns/public/assets/js/search/search_prof_viewmodel.js` | ready, se, _e, be, Ue (+335) |
| `ange_mastersns/public/assets/js/search/aocca_setting.js` | ready, o, c, D, L (+322) |
| `ange_mastersns/public/assets/js/search/search_easy_viewmodel.js` | ready, n, a, s, u (+319) |
| `ange_mastersns/public/assets/js/search/search_aocca_viewmodel.js` | ready, f, se, _e, be (+318) |
| `ange_mastersns/public/assets/js/search/search_easyresult_viewmodel.js` | ready, se, _e, be, Ue (+299) |
| `ange_mastersns/public/assets/js/search/search_pickup.js` | ready, f, se, _e, be (+293) |
| `ange_mastersns/public/assets/js/search/search_footer.js` | a, s, ready, f, se (+292) |
| `ange_mastersns/public/assets/js/search/search_baseviewmodel.js` | ready, o, i, a, s (+288) |
| `ange_mastersns/public/assets/js/search/search_prof_model.js` | ready, a, s, ht, kt (+284) |
| `ange_mastersns/public/assets/js/search/search_aocca_model.js` | ready, a, s, ht, kt (+284) |

## Entry Points

Start here when exploring this area:

- **`SearchProfData`** (Class) — `ange_mastersns/resources/assets/js/search/search_prof_data.ts:180`
- **`SearchEasyResultData`** (Class) — `ange_mastersns/resources/assets/js/search/search_easyresult_data.ts:175`
- **`SearchEasyData`** (Class) — `ange_mastersns/resources/assets/js/search/search_easy_data.ts:178`
- **`SearchBaseData`** (Class) — `ange_mastersns/resources/assets/js/search/search_basedata.ts:164`
- **`SearchAoccaData`** (Class) — `ange_mastersns/resources/assets/js/search/search_aocca_data.ts:179`

## Key Symbols

| Symbol | Type | File | Line |
|--------|------|------|------|
| `SearchProfData` | Class | `ange_mastersns/resources/assets/js/search/search_prof_data.ts` | 180 |
| `SearchEasyResultData` | Class | `ange_mastersns/resources/assets/js/search/search_easyresult_data.ts` | 175 |
| `SearchEasyData` | Class | `ange_mastersns/resources/assets/js/search/search_easy_data.ts` | 178 |
| `SearchBaseData` | Class | `ange_mastersns/resources/assets/js/search/search_basedata.ts` | 164 |
| `SearchAoccaData` | Class | `ange_mastersns/resources/assets/js/search/search_aocca_data.ts` | 179 |
| `SearchProfViewModel` | Class | `ange_mastersns/resources/assets/js/search/search_prof_viewmodel.ts` | 37 |
| `SearchEasyResultViewModel` | Class | `ange_mastersns/resources/assets/js/search/search_easyresult_viewmodel.ts` | 23 |
| `SearchEasyViewModel` | Class | `ange_mastersns/resources/assets/js/search/search_easy_viewmodel.ts` | 21 |
| `SearchBaseViewModel` | Class | `ange_mastersns/resources/assets/js/search/search_baseviewmodel.ts` | 15 |
| `SearchAoccaViewModel` | Class | `ange_mastersns/resources/assets/js/search/search_aocca_viewmodel.ts` | 29 |
| `SearchProfModel` | Class | `ange_mastersns/resources/assets/js/search/search_prof_model.ts` | 13 |
| `SearchEasyResultModel` | Class | `ange_mastersns/resources/assets/js/search/search_easyresult_model.ts` | 12 |
| `SearchEasyModel` | Class | `ange_mastersns/resources/assets/js/search/search_easy_model.ts` | 11 |
| `SearchBaseModel` | Class | `ange_mastersns/resources/assets/js/search/search_basemodel.ts` | 9 |
| `SearchAoccaModel` | Class | `ange_mastersns/resources/assets/js/search/search_aocca_model.ts` | 13 |
| `SearchHeader` | Class | `ange_mastersns/resources/assets/js/search/search_header.ts` | 46 |
| `SearchFooter` | Class | `ange_mastersns/resources/assets/js/search/search_footer.ts` | 99 |
| `SearchAoccaList` | Class | `ange_mastersns/resources/assets/js/search/search_aocca_list.ts` | 70 |
| `SearchEasySimpleSearchConditionRandom` | Class | `ange_mastersns/resources/assets/js/search/search_easy_simple_search_condition_random.ts` | 20 |
| `SearchEasyList2` | Class | `ange_mastersns/resources/assets/js/search/search_easy_list2.ts` | 70 |

## Execution Flows

| Flow | Type | Steps |
|------|------|-------|
| `Action_register → Cookie` | cross_community | 5 |
| `Save → Random` | cross_community | 4 |
| `Action_index → Cookie` | cross_community | 4 |

## Connected Areas

| Area | Connections |
|------|-------------|
| Message | 290 calls |
| List | 269 calls |
| Profile_edit | 72 calls |
| Js | 51 calls |
| Top | 19 calls |
| Auth | 13 calls |
| Tweet | 9 calls |
| Cond | 7 calls |

## How to Explore

1. `gitnexus_context({name: "SearchProfData"})` — see callers and callees
2. `gitnexus_query({query: "search"})` — find related execution flows
3. Read key files listed above for implementation details
