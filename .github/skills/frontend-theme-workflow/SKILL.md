---
name: frontend-theme-workflow
description: 'Use when creating or updating Blade templates, frontend JavaScript, Tailwind CSS, asset imports, or Vite-wired UI behavior in this Sage theme.'
---

# Frontend Theme Workflow

Use this skill for the presentation layer of this theme: Blade templates, JavaScript modules, CSS, and the assets they depend on.

## Use When

- Building or revising templates in `resources/views/`
- Adding behavior in `resources/js/`
- Styling in `resources/css/`
- Wiring images, fonts, or other frontend assets through Vite
- Working on the block editor UI scripts/styles when the task is frontend-facing

## Work Rules

- Prefer the existing Blade structure in `resources/views/layouts/`, `resources/views/partials/`, and `resources/views/sections/` before inventing a new pattern.
- Keep template logic small and readable. Use `@php` only for local formatting or data shaping that belongs in the view.
- Use the existing Vite aliases from `vite.config.js`: `@scripts`, `@styles`, `@fonts`, and `@images`.
- Keep JavaScript modular. `resources/js/app.js` should stay the main browser bootstrap, while feature code lives in separate files.
- Keep CSS in the project stylesheets under `resources/css/` and prefer the established Tailwind approach already used by the theme.
- Do not edit generated assets in `public/build/`.
- When asset entry points or imports change, validate with the production build command.

## Reference Files

- [AGENTS.md](../../../AGENTS.md)
- [README.md](../../../README.md)
- [vite.config.js](../../../vite.config.js)
- [resources/views/layouts/app.blade.php](../../../resources/views/layouts/app.blade.php)
- [resources/js/app.js](../../../resources/js/app.js)
