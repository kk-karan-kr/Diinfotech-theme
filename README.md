# DI Infotech WordPress Theme

Production theme for the DI Infotech website. It includes ACF-powered legacy service pages and the Modular Service Page V2 builder.

## Requirements

- WordPress 6.0 or newer
- PHP 7.4 or newer
- Advanced Custom Fields Pro
- Contact Form 7 for modular service-page enquiry forms

## Service pages

Service posts can use either the legacy renderer or `Modular Layout V2`. Modular fields are stored in `acf-json/` and should be synchronized from the WordPress ACF administration screen after deployment when prompted. Synchronize an existing group by key; do not repeatedly import the same JSON file as a new field group.

Assets use file modification timestamps for cache-busting. A page-cache/CDN purge is still required after deploying a new release.

## Validation

Run `composer lint:php` when Composer development dependencies are installed. A production archive can be created with `npm run bundle` after installing the Node development dependencies.

See `DEPLOYMENT.md` for the release and rollback checklist. Always deploy the generated archive; never extract or copy the theme inside its own directory.
