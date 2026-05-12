---
name: acf-front-configuration
description: 'Use when creating frontend PHP or Blade code that reads ACF fields, normalizes repeater data, or builds page configuration for templates and sections.'
---

# ACF Frontend Configuration

Use this skill for PHP or Blade code that turns ACF field values into frontend data structures and template output.

## Use When

- Reading ACF fields in templates or view composers
- Building page-level configuration arrays from ACF data
- Mapping repeaters, images, links, or rich text into UI-ready values
- Adding fallback content for missing field values

## Work Rules

- Keep field reading close to the template or composer that consumes the data.
- Use `get_field()` or `get_fields()` for reads, then normalize the result before rendering.
- Convert image fields to usable IDs or URLs consistently, usually with `wp_get_attachment_image_url()` or theme image helpers.
- Handle repeater fields with a clear map/filter/values flow so empty rows do not leak into the view.
- Preserve existing field names exactly so the frontend and provider stay in sync.
- Use safe fallbacks for titles, copy, and links so templates still render when fields are empty.
- If a new field group is needed, stop at the frontend shape and delegate the registration details to the ACF provider skill.

## Reference Files

- [AGENTS.md](../../../AGENTS.md)
- [README.md](../../../README.md)
- [resources/views/front-page.blade.php](../../../resources/views/front-page.blade.php)
- [app/Providers/ACFFieldProvider.php](../../../app/Providers/ACFFieldProvider.php)
