---
name: acf-provider
description: 'Use only when creating or updating app/Providers/ACFFieldProvider.php to register ACF option pages, field groups, or local field definitions.'
---

# ACF Provider

Use this skill only for the ACF provider that registers local field groups and option pages.

## Use When

- Adding or changing `acf_add_local_field_group()` definitions
- Registering or updating `acf_add_options_page()`
- Adjusting ACF location rules, field keys, labels, or repeater structure
- Refactoring `app/Providers/ACFFieldProvider.php` without changing template rendering

## Work Rules

- Keep all registration inside the `acf/init` hook and guard with `function_exists('acf_add_local_field_group')`.
- Use unique, stable field keys with a consistent prefix.
- Keep option pages narrow and purposeful; add them only when templates actually need shared settings.
- Group related fields together by page or template so the provider stays readable.
- Match field names to the consuming template code exactly.
- Do not put frontend rendering, Blade markup, or business logic in this file.
- Do not spread ACF registration across multiple files unless the existing project structure already requires it.

## Reference Files

- [AGENTS.md](../../../AGENTS.md)
- [app/Providers/ACFFieldProvider.php](../../../app/Providers/ACFFieldProvider.php)
- [resources/views/front-page.blade.php](../../../resources/views/front-page.blade.php)
