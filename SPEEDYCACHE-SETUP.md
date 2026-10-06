# DI Infotech: SpeedyCache setup

Prepared 6 October 2026 from the installed SpeedyCache + Pro 1.4.1 source and
read-only local database inventory. These are recommended settings, not settings
already applied. Back up files/database and export or screenshot current settings.

## 1. Establish a stable baseline on staging

In **SpeedyCache > Cache**:

| Setting | Value |
| --- | --- |
| Enable Cache | On for testing/production; off during active design editing |
| Logged-in Users | Off (this version means serve cached pages to logged-in users) |
| Mobile Override | Off |
| Mobile Cache | Off; this theme uses responsive CSS/picture, not separate server-rendered mobile HTML |
| Browser Caching | On; verify response headers on the production host |
| GZIP Compressions | On; verify host compression, Nginx may need host configuration |
| Preload | On live, start Once a day; off during local editing |
| Purge Varnish | Off unless the host confirms Varnish is configured |

In **File Optimization**:

| Setting | Baseline |
| --- | --- |
| Minify HTML / CSS / JS | On; disable the affected minifier if it causes a regression |
| Combine CSS / Combine JS | Off |
| Critical CSS | Off |
| Unused CSS | Off initially; test separately as described below |
| Defer JS | Off initially; theme enqueues already use dependency-aware defer |
| Delay JS | Off initially |
| Lazy Render HTML | Off initially |
| Disable Emojis | On if WordPress emoji replacement is not needed |

The current database has Combine CSS, Critical CSS and Unused CSS enabled
together. SpeedyCache explicitly recommends not combining Critical CSS and
Unused CSS. A stable baseline is not a claim of the highest possible score.

## 2. Images

- Keep Lazy Load on for below-the-fold images; exclude the header logo and hero.
- The theme hero includes `data-no-lazy="1"`. Confirm the generated HTML preserves
  it, eager loading, fetchpriority and picture sources. Do not add a second lazy
  loading plugin. Leave at least the first two images excluded above the fold.
- Enable image dimensions only after checking it does not override SVG/logo ratios;
  most theme markup now has explicit intrinsic dimensions.
- In **Image Optimization**, enable **Automatic Optimization** and **Optimize on
  Image Upload**, after backing up originals and checking any license/quota notices.
  Confirm an actual Media Library image is served as WebP in Network; a checkbox
  alone is not proof. Theme slider WebPs are already generated separately.
- Keep original files. Inspect transparent logos and portfolio screenshots for quality.

## 3. Try Unused CSS only after baseline checks pass

Keep Critical CSS and Combine CSS OFF. Enable Unused CSS and choose
**Asynchronously** first, not Remove or On User Interaction.

In **Exclude Stylesheets**, enter `hero-slider.css`. In **Include Selectors**,
include actual dynamic selectors used by menus, accordions, carousel and forms:
`.active`, `.show`, `.collapse`, `.collapsing`, `.menu.active`, `.is-active`,
`.owl-loaded`, `.owl-item`, `.aos-animate`, `.wpcf7-response-output`,
`.wpcf7-not-valid-tip`, `.wpcf7-spinner`. This is a starting list, not an exhaustive
safelist. If a component breaks, exclude its complete stylesheet and regenerate.

Check the hero's `di-hero-geometry` inline style is present before rendering.
Do not assume wildcard selectors are supported by a particular plugin version.
Compare mobile/desktop screenshots before and after generation. Roll back Unused
CSS if headings, menu states, slider slides or form error messages lose styling.

## 4. JavaScript, forms and analytics

Do not enable Delay All JS as a blanket optimization. A future selective-delay
test must keep hero-slider.js, navigation script.js, jQuery/dependencies,
Bootstrap, Owl/AOS where used, Contact Form 7, SWV and reCAPTCHA working.
Changing analytics timing needs consent/conversion review; do not silently delay
GTM/Meta and assume event collection stays equivalent.

The footer contains forms across pages. Do not restrict CF7 to the Contact page.
Check a valid staging submission reaches the intended mailbox and CFDB7, plus an
invalid submission shows readable errors. Read-only browser tests do not prove
mail delivery or reCAPTCHA token acceptance.

## 5. Purge and verify

1. Save one settings group at a time.
2. Delete page cache AND minified CSS/JS; regenerate generated CSS after changes.
3. Purge host/CDN cache too if configured. Do not select a reset/delete-settings action.
4. Check logged-out/private-window home, every service variant, About, Contact,
   portfolio categories and next-page links, at mobile and desktop widths.
5. Confirm initial hero requests only the viewport-appropriate first WebP, subsequent
   slides load on selection, mobile autoplay remains off, and menus/accordions work.
6. Leave portfolio_type and portfolio_page query strings intact. This installed
   version bypasses normal caching for non-ignored query strings; do not add these
   parameters to an ignore/strip list on SpeedyCache or a CDN.
7. On public staging/live, run three comparable PageSpeed runs per device and compare
   medians. Local results cannot validate live TTFB, CDN cache or public PageSpeed.

## Plugin inventory decisions

- No second cache, minifier or lazy-loader is needed.
- Keep ACF Pro, ACF Font Awesome, CPT UI and Classic Editor while this theme/editor
  depends on them. ACF Pro is currently 5.9.5: update to a supported release on a
  backed-up staging copy first; test required fields, repeaters, anchor URLs and saving.
- All-in-One WP Migration 6.77 needs an update review before launch. Deactivate when
  not performing migration, if not otherwise required. It is not a scheduled backup.
- ACF Theme Code Pro generates developer snippets; review deactivating it on production
  after confirming there is no custom dependency. It does not replace ACF Pro.
- WP Mail SMTP is already active: configure/test the existing plugin; no second mailer.
- AIOSEO is already active: no additional SEO plugin. Audit overlap with custom-schema-plugin.
- CF7, CFDB7 and Akismet are already active: retain needed form/protection/storage.
- Verify automated off-site backups and a restore test. If hosting provides these,
  another backup plugin is unnecessary; otherwise select one dedicated backup solution.
- Redis/object cache is conditional on host support and measured query bottlenecks,
  not a required install. Avoid automatic database cleanup without a recoverable backup.

## Official references

- https://speedycache.com/docs/file-optimization/how-to-remove-unused-css/
- https://speedycache.com/docs/caching/mobile-cache/
- https://speedycache.com/docs/caching/how-to-enable-browser-caching/
- https://speedycache.com/docs/image-optimization/how-to-optimize-image-automatically/
- https://speedycache.com/docs/image-optimization/how-to-optimize-image-on-upload/
- https://www.advancedcustomfields.com/downloads/
