# Performance handoff — 6 October 2026

## Follow-up verification with Local running

The local database is reachable again. Read-only inventory confirms 641 image
originals exist, 387 attachments have di-card variants, and no applicable theme
sizes are missing among the 622 raster attachments. The other 19 are SVGs.
The earlier thumbnail-completion uncertainty below is therefore resolved locally.

The repeated ten-case mobile/desktop smoke test passed HTTP status, horizontal
overflow, first-slide WebP selection, manual slide loading, stable slider height
and mobile menu/autoplay checks. Homepage screenshots confirm floating icons now
retain their correct proportions. This pass blocked external requests, so its
reCAPTCHA console errors are expected and it does not verify spam protection or
mail delivery. Local layout-shift measurements still exceeded 0.1 on some pages;
there is no claim that all performance targets have been met.

Plugin settings have not been changed. See **SPEEDYCACHE-SETUP.md** for the
version-specific baseline, staged optimization sequence and plugin inventory.
ACF Pro 5.9.5 and All-in-One WP Migration 6.77 need update review before launch.
The legacy unregistered our_servives record at /?p=1859 returns 404; current
/services/ URLs are separate. Do not delete or redirect the record without
confirming the intended replacement.

The expanded read-only audit visited 19 local URLs at 390px and 1440px. Current
routes returned 200 on desktop, with no horizontal overflow; two mobile visits
timed out during the first pass but returned HTTP 200 in direct retries. The
legacy record above returned 404 on both widths. Two homepage carousel arrows
are hard-coded to https://diinfotech.com in assets/js/script.js:241; they were
blocked by the offline browser test, not proven missing on the live server.
These URLs should become theme-relative in a follow-up portability correction.
No form was submitted and no plugin settings, content or records were changed.

## Implemented in the local theme

- Generated 20 responsive WebP files from all 10 homepage slider originals.
  The first mobile image is 20,012 bytes at 480px and 40,412 bytes at 768px,
  versus the original 1,709,419-byte PNG. Originals are retained as fallbacks.
- Removed the obsolete hero preload. The first picture remains eager/high
  priority; subsequent slides receive their image URLs when selected.
- Disabled autoplay below 768px and for reduced-motion users. Desktop autoplay
  waits for image loading and pauses while hidden, hovered or focused.
- Moved hero CSS/JS into versioned homepage assets, with small early geometry
  CSS to reserve desktop/mobile height before optimization scripts run.
- Added a shared ACF image renderer using attachment IDs and WordPress image
  markup; converted 37 image outputs, including repeated logos and portfolio
  items. Registered di-card, di-content and di-logo sizes.
- Added intrinsic dimensions to the header logo and 47 static image outputs.
  Responsive height:auto prevents distortion when CSS scales these images.
- Portfolio renders eight projects per category/page. Category links and
  pagination work without JavaScript, and hidden categories are not rendered.
- Owl and AOS are selected by template; modular service pages load Owl only
  for the legacy Store Development carousel. Menu/Bootstrap and footer forms
  remain available. WordPress manages dependency-aware script deferral.
- Font Awesome 6.6.0 is served locally with WOFF2 and font-display:swap,
  including legacy compatibility. The ACF icon stylesheet is deduplicated.
- CF7 and reCAPTCHA remain enabled. Their scripts use core defer strategies.
- Build archives exclude tools/browser, its dependencies and test artifacts.

## Verification and limits

The initial real-browser checks covered home, portfolio, landing-page portfolio,
SEO service and contact at 390px and 1440px. All returned HTTP 200 with no
horizontal overflow. The hero requested only its first WebP initially; manual
slide selection loaded the next image without changing its height. Mobile
autoplay stayed off and the mobile menu opened. Forms remained in the markup.
The tests block analytics requests to avoid recording test visits.

The browser exposed a distorted floating icon after intrinsic dimensions were
added; the theme's responsive image rule was corrected afterward. Final browser
retesting is pending because Local's database became unavailable on 6 October.
These local checks are not PageSpeed scores or production Core Web Vitals.

Thumbnail generation was started for existing local Media Library attachments.
At least 91 attachments had the new card size at the last successful check;
completion could not be verified after the database stopped. Run the resumable
script when Local is running, and separately on staging/live after deployment:

```sh
php tools/regenerate-theme-images.php
```

For this Local installation, PHP CLI needs its database port:
`php -d mysqli.default_port=10076 tools/regenerate-theme-images.php`.
The script adds missing sizes without deleting originals or existing sizes.
The tools directory is excluded from production ZIPs; run from a development
checkout or a temporary CLI-only deployment of that script.

## SpeedyCache — settings still require staging review

The local configuration had Combine CSS, Remove Unused CSS and Critical CSS
enabled together, plus image lazy loading. No plugin settings were changed.

1. Purge page/minified CSS/JS caches after uploading the theme and regenerate
   the selected CSS optimization output. Do not reuse the old hero CSS cache.
2. Compare one CSS pipeline at a time: first disable Combine CSS and Critical
   CSS while testing Remove Unused CSS. If dynamic states lose styles, use
   normal minified external CSS until exclusions are verified.
3. Preserve rules for menus, `.active`, `.show`, `.collapse`, `.collapsing`,
   `.owl-*`, `[data-aos]`, `.wpcf7-*` and all `.di-hero-slider*` selectors.
   Keep `hero-slider.css` and `di-hero-geometry` in the initial viewport output.
4. Hero pictures/images include `data-no-lazy="1"`, which the installed plugin
   recognizes. Confirm it leaves picture source selection and fetchpriority
   intact. Exclude `hero-slider.js` from any future interaction-delay feature.
5. Verify category/page query strings produce distinct portfolio output. Do not
   strip `portfolio_type` or `portfolio_page` in cache configuration.

The production audit's 165KB used-CSS and 22KB critical-CSS blocks could not be
reproduced in local output, so their production regeneration remains necessary.

## Remaining plugin, account and hosting work

| Area | Evidence and remaining action |
| --- | --- |
| CF7/reCAPTCHA | Local HTML contains one Google API include. Google returned ERR_CONNECTION_RESET in the test environment, producing a grecaptcha error. Protection is retained. Verify real submission/delivery on staging; interaction-only loading is not implemented because it needs an end-to-end token/submission test. |
| GTM / Meta | Theme contains one GTM loader and one Meta initialization. Account-level tags can still duplicate events. Inspect GTM preview/Meta event diagnostics with account access. No tags or conversion events were removed. |
| Blog / courses | The audited separate stacks are not present as matching pages/templates in this local theme. Consolidate their jQuery in those installations and test individual posts/course screens there. |
| Lead Orbit / Wistia | No matching local page/embed was found. Click-to-play video loading needs its actual template/content and playback test. |
| Static cache / CDN | Configure cache lifetimes on the production server/CDN, retain versioned asset invalidation, and test anonymous desktop/mobile cache hits. Theme edits cannot configure the hosting layer. |
| Server / database | Uncached PHP, query timing and external-request profiling remain a production/staging task. No hosting or database root cause was established. |
| Final performance | After deployment and cache regeneration, run three comparable mobile and desktop PSI runs and compare medians. No new public PSI score or field-CWV pass is claimed. |

## Repeating checks

`php tools/optimize-slider.php` regenerates WebP variants after slider artwork
changes. `node tools/performance-smoke.cjs` runs the local browser checks with
the development Playwright dependency in tools/browser. That dependency and
its artifacts must stay outside production archives.

Implementation references:
- https://developer.wordpress.org/reference/functions/wp_enqueue_script/
- https://www.advancedcustomfields.com/resources/image/
