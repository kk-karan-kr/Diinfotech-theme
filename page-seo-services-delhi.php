<?php

/**
 * Template Name: SEO Services Delhi
 *
 * Landing page for SEO services in Delhi.
 *
 * @package DI_Infotech
 */

get_header();

$seo_theme_uri = get_template_directory_uri();
$seo_contact   = home_url('/contact/');
$seo_form_action = $seo_theme_uri . '/ai-seo/ai-seo/submit-lead.php';


/*
 * Reuse existing SEO service ACF content. A page-specific field takes precedence.
 * Set the seo_delhi_legacy_service_id filter when more than one SEO service exists.
 */
$seo_legacy_source = (int) get_post_meta(get_the_ID(), 'seo_legacy_service_id', true);
$seo_legacy_source = (int) apply_filters('seo_delhi_legacy_service_id', $seo_legacy_source, get_the_ID());
if (!$seo_legacy_source && function_exists('get_field')) {
    $seo_old_services = get_posts(array('post_type' => 'services', 'posts_per_page' => -1, 'post_status' => 'publish', 'orderby' => 'ID', 'order' => 'ASC'));
    foreach ($seo_old_services as $seo_old_service) {
        if (preg_match('/\\bseo\\b|search engine optimi[sz]ation/i', $seo_old_service->post_title . ' ' . $seo_old_service->post_name)) {
            $seo_legacy_source = (int) $seo_old_service->ID;
            break;
        }
    }
}
$seo_render_legacy = static function ($component, $field) use ($seo_legacy_source) {
    if (!function_exists('get_field')) {
        return false;
    }
    $source = get_field($field, get_the_ID()) ? get_the_ID() : $seo_legacy_source;
    if (!$source || !get_field($field, $source)) {
        return false;
    }
    $seo_legacy_source = $source;
    include get_template_directory() . '/template-parts/seo-delhi/legacy-' . $component . '.php';
    return true;
};

$seo_services = array(
    array('01', 'SEO Audit & Strategy', 'A complete review of technical health, search visibility, competitors, content gaps, and conversion opportunities.'),
    array('02', 'Technical SEO', 'Improve crawling, indexing, Core Web Vitals, site architecture, structured data, canonicals, and technical performance.'),
    array('03', 'On-Page SEO', 'Align page structure, search intent, metadata, internal links, entities, and conversion-focused content.'),
    array('04', 'Content-Led SEO', 'Build useful service pages, topic clusters, guides, and authority content around the searches that matter to your buyers.'),
    array('05', 'Local SEO', 'Strengthen Google Business Profile visibility, local landing pages, citations, reviews, and Delhi NCR relevance.'),
    array('06', 'Ecommerce SEO', 'Optimise categories, products, filters, schema, internal linking, and commercial search journeys.'),
    array('07', 'Authority Building', 'Earn relevant mentions and links through digital PR, outreach, partnerships, and linkable content.'),
    array('08', 'SEO Reporting', 'Track qualified traffic, rankings, leads, revenue signals, and completed work through transparent reporting.'),
);

$seo_process = array(
    array('Discover', 'Understand your market, customers, commercial goals, current performance, and competitive landscape.'),
    array('Audit', 'Find the technical, content, authority, local, and conversion gaps limiting organic growth.'),
    array('Plan', 'Prioritise actions by business impact, effort, search demand, and the strength of the opportunity.'),
    array('Implement', 'Execute technical fixes, landing pages, content improvements, local optimisation, and authority campaigns.'),
    array('Measure', 'Monitor visibility, qualified organic sessions, conversions, local actions, and revenue-focused outcomes.'),
    array('Improve', 'Use search data and changing customer behaviour to refine the strategy every month.'),
);

$seo_industries = array(
    'Healthcare & Clinics',
    'Education & Training',
    'Real Estate',
    'Legal & Professional Services',
    'Ecommerce & Retail',
    'SaaS & Technology',
    'Hospitality & Travel',
    'B2B Services',
);

$seo_faqs = array(
    array('How long does SEO take to show results in Delhi?', 'Meaningful SEO growth usually develops over several months. The timeline depends on your website condition, competition, market, existing authority, and how quickly recommendations are implemented.'),
    array('What is included in your SEO services in Delhi?', 'Our work can include technical SEO, keyword and competitor research, on-page optimisation, content strategy, local SEO, authority building, ecommerce SEO, reporting, and conversion improvements.'),
    array('Do you provide local SEO for Delhi NCR businesses?', 'Yes. We support businesses targeting Delhi, New Delhi, Noida, Gurugram, Faridabad, Ghaziabad, and relevant neighbourhood-level searches.'),
    array('Can you optimise an existing website?', 'Yes. We audit the current website, protect valuable rankings, identify priority fixes, and create an implementation roadmap around the existing platform.'),
    array('Do you guarantee first-page rankings?', 'No responsible SEO agency can guarantee a particular organic position. We commit to transparent work, sound strategy, measurable progress, and continuous improvement.'),
    array('How do you measure SEO performance?', 'We connect rankings and visibility with qualified organic traffic, enquiries, calls, local actions, ecommerce revenue, and other business-specific conversion signals.'),
    array('Do you optimise for AI Overviews and generative search?', 'Yes. We improve technical accessibility, entity clarity, structured data, source quality, topical depth, and answer-ready content so your brand is easier for search and AI systems to understand.'),
);
/* Keep FAQ structured data in sync with the reused, visible FAQ content. */
if (function_exists('get_field')) {
    $seo_faq_source = get_field('faq_section', get_the_ID()) ? get_the_ID() : $seo_legacy_source;
    $seo_old_faq_groups = $seo_faq_source ? get_field('faq_section', $seo_faq_source) : array();
    $seo_old_faqs = array();
    foreach ((array) $seo_old_faq_groups as $seo_old_faq_group) {
        foreach ((array) ($seo_old_faq_group['faqs'] ?? array()) as $seo_old_faq) {
            if (!empty($seo_old_faq['faq_heading']) && !empty($seo_old_faq['faq_description'])) {
                $seo_old_faqs[] = array(
                    wp_strip_all_tags($seo_old_faq['faq_heading']),
                    wp_strip_all_tags($seo_old_faq['faq_description'])
                );
            }
        }
    }
    if ($seo_old_faqs) {
        $seo_faqs = $seo_old_faqs;
    }
}
?>

<main class="seo-delhi-page" id="main-content">
    <section class="seo-delhi-hero" aria-labelledby="seo-delhi-page-title">
        <span class="seo-delhi-hero__glow seo-delhi-hero__glow--one" aria-hidden="true"></span>
        <span class="seo-delhi-hero__glow seo-delhi-hero__glow--two" aria-hidden="true"></span>
        <div class="seo-delhi-container seo-delhi-hero__grid">
            <div class="seo-delhi-hero__content">
                <p class="seo-delhi-eyebrow"><span aria-hidden="true"></span> SEO growth for Delhi businesses</p>
                <h1 id="seo-delhi-page-title">SEO Services in Delhi for <em>Higher Rankings &amp; Qualified Leads</em></h1>
                <p class="seo-delhi-lead">Build sustainable search visibility with an SEO strategy that connects technical excellence, useful content, local relevance, and measurable business growth.</p>
                <div class="seo-delhi-actions">
                    <a class="seo-delhi-button seo-delhi-button--primary" href="#seo-delhi-hero-form">Request Your Free Audit <span aria-hidden="true">→</span></a>
                    <a class="seo-delhi-text-link" href="#seo-process">See Our SEO Process <span aria-hidden="true">↓</span></a>
                </div>
                <ul class="seo-delhi-hero__proof" aria-label="SEO service highlights">
                    <li><strong>21+</strong><span>Years of digital expertise</span></li>
                    <li><strong>360°</strong><span>Search optimisation</span></li>
                    <li><strong>Search + AI</strong><span>Visibility built for both</span></li>
                </ul>
            </div>
            <div class="seo-delhi-hero__form-wrap">
                <form class="seo-delhi-hero__form" id="seo-delhi-hero-form" action="<?php echo esc_url($seo_form_action); ?>" method="post">
                    <div class="seo-delhi-hero__form-topline">
                        <span class="seo-delhi-kicker">Free Initial Review</span>
                        <span class="seo-delhi-hero__form-badge">SEO AUDIT</span>
                    </div>
                    <h2>Find Out How Visible Your Website Really Is.</h2>
                    <p>Share your details and an SEO specialist will call you to discuss the strongest opportunities for your business.</p>
                    <input type="hidden" name="form_variant" value="Delhi SEO hero form">
                    <input type="hidden" name="business_name" value="Not provided - hero short form">
                    <input type="hidden" name="business_nature" value="SEO services enquiry">
                    <input type="hidden" name="website_url" value="Not provided - hero short form">
                    <input type="hidden" name="service_required" value="AI SEO audit">
                    <input type="hidden" name="message" value="SEO audit request from the SEO Services Delhi page">
                    <input type="hidden" name="consent" value="Yes">
                    <input type="hidden" name="utm_source" value="">
                    <input type="hidden" name="utm_medium" value="">
                    <input type="hidden" name="utm_campaign" value="">
                    <div class="seo-delhi-honeypot" aria-hidden="true"><label>Leave this field empty<input type="text" name="_honey" tabindex="-1" autocomplete="off"></label></div>
                    <label for="seo-delhi-name">Name</label>
                    <input id="seo-delhi-name" name="name" type="text" autocomplete="name" maxlength="80" required>
                    <label for="seo-delhi-email">Work Email</label>
                    <input id="seo-delhi-email" name="email" type="email" autocomplete="email" maxlength="254" required>
                    <label for="seo-delhi-phone">Phone Number</label>
                    <input id="seo-delhi-phone" name="phone" type="tel" inputmode="numeric" autocomplete="tel" pattern="(?:\+?91[ -]?)?[6-9][0-9]{9}" maxlength="14" required>
                    <button class="seo-delhi-button seo-delhi-button--primary" type="submit">Request My Free SEO Audit <span aria-hidden="true">→</span></button>
                    <small>Your details stay private. No spam, just practical advice.</small>
                </form>
            </div>
        </div>
    </section>

    <div class="seo-delhi-legacy-service-body">
        <?php
        if ($seo_legacy_source) {
            global $post;
            $seo_delhi_page_post = $post;
            $post = get_post($seo_legacy_source);
            setup_postdata($post);

            if (!defined('DI_EMBED_SERVICE_BODY')) {
                define('DI_EMBED_SERVICE_BODY', true);
            }
            include get_template_directory() . '/single-services.php';

            $post = $seo_delhi_page_post;
            setup_postdata($post);
        } elseif (current_user_can('manage_options')) {
            echo '<div class="container"><p class="seo-delhi-preview-warning">No existing SEO service was found. Set the <code>seo_delhi_legacy_service_id</code> filter to the old SEO service post ID.</p></div>';
        }
        ?>
    </div>

    <section class="seo-delhi-final-cta">
        <div class="seo-delhi-container seo-delhi-final-cta__inner">
            <div>
                <p class="seo-delhi-kicker">Ready when you are.</p>
                <h2>Let’s Build an SEO Programme That Ranks, Gets Cited and Converts.</h2>
            </div>
            <a class="seo-delhi-button seo-delhi-button--dark" href="#seo-delhi-hero-form">Get Started Today <span aria-hidden="true">→</span></a>
        </div>
    </section>
</main>

<style>
    .seo-delhi-preview-warning {
        margin: 30px 0;
        padding: 18px;
        border: 1px solid #f0cf00;
        background: #fffbd4;
        color: #212529;
    }

    .seo-delhi-page :where(.seo-delhi-hero, .seo-delhi-section, .seo-delhi-final-cta) :is(h1, h2, h3, strong) {
        font-family: 'NeueMontreal-Bold', sans-serif;
    }

    .seo-delhi-page .brands .brand_img img {
        min-height: 90px;
        border: 1px solid #e8e8e8;
        padding: 12px;
    }

    .seo-delhi-page .brands .heading {
        margin-bottom: 6px;
    }

    @media (max-width: 575px) {
        .seo-delhi-page .work-process-tab .nav-link {
            white-space: normal;
        }
    }

    .seo-delhi-page,
    .seo-delhi-page * {
        box-sizing: border-box;
    }

    .seo-delhi-page {
        --blue: #356EEA;
        --navy: #212529;
        --gold: #FCF315;
        --ink: #212529;
        --muted: #5d6c80;
        --line: #dce6f2;
        --pale: #f4f9ff;
        overflow: hidden;
        color: var(--ink);
        font-family: inherit;
    }

    .seo-delhi-container {
        width: min(1180px, calc(100% - 40px));
        margin-inline: auto;
    }

    .seo-delhi-section {
        padding: clamp(70px, 8vw, 112px) 0;
    }

    .seo-delhi-page :where(.seo-delhi-hero, .seo-delhi-section, .seo-delhi-final-cta) h1,
    .seo-delhi-page :where(.seo-delhi-hero, .seo-delhi-section, .seo-delhi-final-cta) h2,
    .seo-delhi-page :where(.seo-delhi-hero, .seo-delhi-section, .seo-delhi-final-cta) h3,
    .seo-delhi-page :where(.seo-delhi-hero, .seo-delhi-section, .seo-delhi-final-cta) p {
        margin-top: 0;
    }

    .seo-delhi-page :where(.seo-delhi-hero, .seo-delhi-section, .seo-delhi-final-cta) h1 {
        max-width: 780px;
        margin-bottom: 24px;
        color: var(--navy);
        font-size: clamp(2.7rem, 5.4vw, 5.4rem);
        line-height: .98;
        letter-spacing: -.045em;
    }

    .seo-delhi-page :where(.seo-delhi-hero, .seo-delhi-section, .seo-delhi-final-cta) h2 {
        margin-bottom: 18px;
        color: var(--navy);
        font-size: 32px;
        line-height: 1.05;
        letter-spacing: normal;
    }

    .seo-delhi-page :where(.seo-delhi-hero, .seo-delhi-section, .seo-delhi-final-cta) h3 {
        color: var(--navy);
        font-size: 1.25rem;
        line-height: 1.2;
    }

    .seo-delhi-page :where(.seo-delhi-hero, .seo-delhi-section, .seo-delhi-final-cta) p {
        color: var(--muted);
        font-size: 1.05rem;
        line-height: 1.7;
    }

    .seo-delhi-eyebrow,
    .seo-delhi-kicker {
        margin-bottom: 14px !important;
        color: var(--blue) !important;
        font-size: .82rem !important;
        font-weight: 700;
        letter-spacing: .14em;
        text-transform: uppercase;
    }

    .seo-delhi-heading {
        max-width: 780px;
        margin: 0 auto 46px;
        text-align: center;
    }

    .seo-delhi-heading--left {
        margin: 0;
        text-align: left;
    }

    .seo-delhi-heading--light h2,
    .seo-delhi-heading--light p {
        color: #fff;
    }

    .seo-delhi-heading--light p {
        opacity: .74;
    }

    .seo-delhi-hero {
        position: relative;
        isolation: isolate;
        overflow: hidden;
        padding: 62px 0 76px;
        background: radial-gradient(circle at 1px 1px, rgba(7, 26, 56, .08) 1px, transparent 1.5px) 0 0 / 25px 25px, linear-gradient(118deg, #fff 0%, #f7f9fc 56%, #eef5ff 100%);
    }

    .seo-delhi-hero__glow {
        position: absolute;
        z-index: -1;
        border-radius: 50%;
        filter: blur(8px);
        pointer-events: none;
    }

    .seo-delhi-hero__glow--one {
        top: -220px;
        right: 7%;
        width: 540px;
        height: 540px;
        background: rgba(20, 120, 199, .15);
    }

    .seo-delhi-hero__glow--two {
        bottom: -280px;
        left: 18%;
        width: 500px;
        height: 500px;
        background: rgba(245, 196, 0, .13);
    }

    .seo-delhi-hero__grid {
        display: grid;
        grid-template-columns: 1.02fr .98fr;
        align-items: center;
        gap: clamp(38px, 5.5vw, 66px);
    }

    .seo-delhi-hero__content {
        position: relative;
        z-index: 2;
    }

    .seo-delhi-lead {
        max-width: 650px;
        font-size: clamp(1.05rem, 1.5vw, 1.3rem) !important;
    }

    .seo-delhi-hero .seo-delhi-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }

    .seo-delhi-hero .seo-delhi-eyebrow>span {
        width: 28px;
        height: 3px;
        border-radius: 4px;
        background: var(--gold);
    }

    .seo-delhi-hero h1 {
        max-width: 700px;
        font-size: clamp(2.7rem, 5vw, 4.75rem);
    }

    .seo-delhi-hero h1 em {
        position: relative;
        color: var(--blue);
        font-style: normal;
    }

    .seo-delhi-hero h1 em::after {
        content: "";
        position: absolute;
        right: 0;
        bottom: -.06em;
        left: 0;
        z-index: -1;
        height: .12em;
        border-radius: 10px;
        background: var(--gold);
        transform: rotate(-1deg);
    }

    .seo-delhi-actions {
        align-items: center;
        display: flex;
        flex-wrap: wrap;
        gap: 24px;
        margin-top: 32px;
    }

    .seo-delhi-actions .seo-delhi-text-link {
        color: var(--navy);
        font-weight: 700;
    }

    .seo-delhi-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 52px;
        padding: 14px 24px;
        border: 1px solid transparent;
        border-radius: 999px;
        font-weight: 700;
        text-decoration: none;
        transition: .2s ease;
    }

    .seo-delhi-button:hover {
        transform: translateY(-2px);
        text-decoration: none;
    }

    .seo-delhi-button--primary {
        background: var(--gold);
        color: var(--navy);
        box-shadow: 0 12px 26px rgba(245, 196, 0, .22);
    }

    .seo-delhi-button--secondary {
        border-color: var(--blue);
        background: #fff;
        color: var(--blue);
    }

    .seo-delhi-hero__proof {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin: 28px 0 0;
        padding: 0;
        list-style: none;
        color: var(--ink);
        font-size: .92rem;
        font-weight: 600;
    }

    .seo-delhi-hero__proof li::before {
        content: "✓";
        margin-right: 7px;
        color: #15a05c;
    }

    .seo-delhi-hero__visual {
        position: absolute;
        inset: 0 0 0 50%;
        overflow: hidden;
    }

    .seo-delhi-hero__visual picture,
    .seo-delhi-hero__visual img {
        display: block;
        width: 100%;
        height: 100%;
    }

    .seo-delhi-hero__visual img {
        object-fit: cover;
        object-position: center;
        mask-image: linear-gradient(90deg, transparent 0%, #000 28%);
    }

    /* Split audit hero adapted from the AI SEO landing page. */
    .seo-delhi-hero__proof {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 0;
        margin-top: 38px;
        color: inherit;
        font-size: inherit;
    }

    .seo-delhi-hero__proof li {
        display: grid;
        gap: 4px;
        padding: 0 18px;
        border-left: 1px solid rgba(7, 26, 56, .14);
    }

    .seo-delhi-hero__proof li::before {
        content: none;
    }

    .seo-delhi-hero__proof li:first-child {
        padding-left: 0;
        border-left: 0;
    }

    .seo-delhi-hero__proof strong {
        color: var(--navy);
        font-size: 1.18rem;
        line-height: 1.1;
    }

    .seo-delhi-hero__proof span {
        color: var(--muted);
        font-size: .78rem;
        font-weight: 500;
        line-height: 1.35;
    }

    .seo-delhi-hero__form-wrap {
        position: relative;
        width: min(100%, 510px);
        margin-left: auto;
    }

    .seo-delhi-hero__form-wrap::before {
        content: "";
        position: absolute;
        inset: 18px -18px -18px 18px;
        z-index: -1;
        border-radius: 24px;
        background: var(--gold);
        transform: rotate(2.2deg);
    }

    .seo-delhi-hero__form {
        display: grid;
        gap: 10px;
        padding: clamp(26px, 3.2vw, 42px);
        border: 1px solid rgba(7, 26, 56, .1);
        border-radius: 22px;
        background: #fff;
        box-shadow: 0 30px 70px rgba(7, 26, 56, .17);
    }

    .seo-delhi-hero__form-topline {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
    }

    .seo-delhi-hero__form-topline .seo-delhi-kicker {
        margin: 0 !important;
    }

    .seo-delhi-hero__form-badge {
        padding: 6px 10px;
        border-radius: 999px;
        background: #edf6ff;
        color: var(--blue);
        font-size: .68rem;
        font-weight: 800;
        letter-spacing: .1em;
    }

    .seo-delhi-hero__form h2 {
        margin: 8px 0 2px;
        font-size: clamp(1.75rem, 2.6vw, 2.6rem);
    }

    .seo-delhi-hero__form p {
        margin-bottom: 10px;
        font-size: .94rem;
        line-height: 1.55;
    }

    .seo-delhi-hero__form label {
        margin-top: 2px;
        color: var(--navy);
        font-size: .78rem;
        font-weight: 700;
    }

    .seo-delhi-hero__form input:not([type="hidden"]) {
        width: 100%;
        min-height: 48px;
        padding: 11px 14px;
        border: 1px solid #d9e0e9;
        border-radius: 8px;
        background: #fbfcfe;
        color: var(--navy);
        font: inherit;
    }

    .seo-delhi-hero__form input:focus {
        border-color: var(--blue);
        outline: 3px solid rgba(20, 120, 199, .13);
    }

    .seo-delhi-hero__form .seo-delhi-button {
        width: 100%;
        margin-top: 8px;
        cursor: pointer;
        font: inherit;
    }

    .seo-delhi-hero__form small {
        color: var(--muted);
        font-size: .7rem;
        text-align: center;
    }

    .seo-delhi-honeypot {
        position: absolute !important;
        left: -9999px !important;
        width: 1px !important;
        height: 1px !important;
        overflow: hidden !important;
    }

    .seo-delhi-trust {
        padding: 34px 0;
        border-block: 1px solid var(--line);
        background: #fff;
    }

    .seo-delhi-trust h2 {
        margin-bottom: 24px;
        font-size: .9rem;
        letter-spacing: .08em;
        text-align: center;
        text-transform: uppercase;
    }

    .seo-delhi-logo-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 30px;
        align-items: center;
    }

    .seo-delhi-logo {
        height: 55px;
        display: grid;
        place-items: center;
        filter: grayscale(1);
        opacity: .65;
        transition: .2s;
    }

    .seo-delhi-logo:hover {
        filter: none;
        opacity: 1;
    }

    .seo-delhi-logo img {
        max-width: 145px;
        max-height: 48px;
        object-fit: contain;
    }

    .seo-delhi-results {
        background: var(--pale);
    }

    .seo-delhi-results__grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 22px;
    }

    .seo-delhi-results__grid article {
        min-height: 280px;
        padding: 34px;
        border: 1px solid var(--line);
        border-radius: 18px;
        background: #fff;
        box-shadow: 0 18px 50px rgba(20, 65, 110, .07);
    }

    .seo-delhi-results__grid span,
    .seo-delhi-service-card>span {
        display: block;
        margin-bottom: 44px;
        color: var(--blue);
        font-weight: 700;
    }

    .seo-delhi-split {
        display: grid;
        grid-template-columns: .9fr 1.1fr;
        gap: clamp(40px, 7vw, 90px);
        align-items: center;
    }

    .seo-delhi-feature-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 18px;
    }

    .seo-delhi-feature-grid article {
        padding: 27px;
        border-left: 3px solid var(--gold);
        background: var(--pale);
    }

    .seo-delhi-feature-grid p {
        margin-bottom: 0;
        font-size: .95rem;
    }

    .seo-delhi-text-link {
        color: var(--blue);
        font-weight: 700;
        text-decoration: none;
    }

    .seo-delhi-card-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 18px;
    }

    .seo-delhi-service-card {
        padding: 28px;
        border: 1px solid var(--line);
        border-radius: 14px;
        background: #fff;
        transition: .2s;
    }

    .seo-delhi-service-card:hover {
        transform: translateY(-5px);
        border-color: #a9cdf2;
        box-shadow: 0 18px 44px rgba(20, 75, 130, .09);
    }

    .seo-delhi-service-card>span {
        margin-bottom: 25px;
    }

    .seo-delhi-service-card p {
        margin-bottom: 0;
        font-size: .94rem;
    }

    .seo-delhi-process {
        background: var(--navy);
    }

    .seo-delhi-process__grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1px;
        margin: 0;
        padding: 1px;
        background: rgba(255, 255, 255, .13);
        list-style: none;
    }

    .seo-delhi-process__grid li {
        padding: 34px;
        background: var(--navy);
    }

    .seo-delhi-process__grid span {
        color: var(--gold);
        font-weight: 700;
    }

    .seo-delhi-process__grid h3 {
        margin: 28px 0 12px;
        color: #fff;
    }

    .seo-delhi-process__grid p {
        margin: 0;
        color: rgba(255, 255, 255, .66);
        font-size: .94rem;
    }

    .seo-delhi-ai {
        background: linear-gradient(135deg, #edf7ff, #fff);
    }

    .seo-delhi-ai__grid {
        display: grid;
        grid-template-columns: 1.05fr .95fr;
        align-items: center;
        gap: 70px;
    }

    .seo-delhi-check-list {
        display: grid;
        gap: 13px;
        margin: 28px 0 0;
        padding: 0;
        list-style: none;
    }

    .seo-delhi-check-list li {
        padding-left: 30px;
        position: relative;
    }

    .seo-delhi-check-list li::before {
        content: "✓";
        position: absolute;
        left: 0;
        color: #15a05c;
        font-weight: 700;
    }

    .seo-delhi-ai__panel {
        position: relative;
        min-height: 420px;
        display: grid;
        align-content: center;
        gap: 15px;
        padding: 50px;
        border: 1px solid rgba(20, 120, 199, .18);
        border-radius: 30px;
        background: rgba(255, 255, 255, .65);
        box-shadow: 0 25px 80px rgba(20, 80, 140, .13);
        overflow: hidden;
    }

    .seo-delhi-ai__panel div {
        position: relative;
        z-index: 2;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        border-radius: 12px;
        background: #fff;
        box-shadow: 0 10px 30px rgba(13, 61, 109, .08);
    }

    .seo-delhi-ai__panel small {
        color: var(--muted);
    }

    .seo-delhi-ai__panel strong {
        color: var(--blue);
    }

    .seo-delhi-ai__orbit {
        position: absolute;
        width: 360px;
        height: 360px;
        right: -130px;
        top: -110px;
        border: 55px solid rgba(20, 120, 199, .08);
        border-radius: 50%;
    }

    .seo-delhi-industry-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        border: 1px solid var(--line);
    }

    .seo-delhi-industry-grid div {
        min-height: 130px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 24px;
        border: 1px solid var(--line);
        color: var(--navy);
        font-size: 1.1rem;
        font-weight: 700;
    }

    .seo-delhi-industry-grid span {
        color: var(--blue);
        font-size: .8rem;
    }

    .seo-delhi-local {
        background: var(--pale);
    }

    .seo-delhi-location-list {
        display: flex;
        flex-wrap: wrap;
        gap: 9px;
        margin-top: 28px;
    }

    .seo-delhi-location-list span {
        padding: 9px 13px;
        border: 1px solid #cfe1f4;
        border-radius: 999px;
        background: #fff;
        font-size: .9rem;
    }

    .seo-delhi-local__map {
        position: relative;
        min-height: 430px;
        display: grid;
        place-items: center;
        border-radius: 24px;
        background: radial-gradient(circle at center, #fff 0 12%, transparent 13%), radial-gradient(circle at center, #d4eaff 0 36%, #b8dcff 37% 37.5%, #eaf5ff 38% 60%, #cfe7ff 61% 61.5%, #f7fbff 62%);
        overflow: hidden;
    }

    .seo-delhi-local__map span {
        position: relative;
        z-index: 2;
        color: var(--navy);
        font-size: 1.35rem;
        font-weight: 700;
    }

    .seo-delhi-local__map i {
        position: absolute;
        width: 14px;
        height: 14px;
        border: 4px solid #fff;
        border-radius: 50% 50% 50% 0;
        background: var(--blue);
        transform: rotate(-45deg);
        box-shadow: 0 5px 12px rgba(20, 120, 199, .25);
    }

    .seo-delhi-local__map i:nth-of-type(1) {
        left: 25%;
        top: 24%
    }

    .seo-delhi-local__map i:nth-of-type(2) {
        right: 24%;
        top: 30%
    }

    .seo-delhi-local__map i:nth-of-type(3) {
        left: 32%;
        bottom: 23%
    }

    .seo-delhi-local__map i:nth-of-type(4) {
        right: 30%;
        bottom: 18%
    }

    .seo-delhi-testimonial-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    .seo-delhi-testimonial-grid article,
    .seo-delhi-testimonial-empty {
        padding: 30px;
        border: 1px solid var(--line);
        border-radius: 16px;
        background: #fff;
    }

    .seo-delhi-quote {
        min-height: 125px;
        color: var(--ink) !important;
    }

    .seo-delhi-person {
        display: flex;
        align-items: center;
        gap: 13px;
    }

    .seo-delhi-person img {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        object-fit: cover;
    }

    .seo-delhi-person strong,
    .seo-delhi-person span {
        display: block;
    }

    .seo-delhi-person span {
        margin-top: 3px;
        color: var(--muted);
        font-size: .86rem;
    }

    .seo-delhi-faq {
        background: var(--pale);
    }

    .seo-delhi-faq__grid {
        display: grid;
        grid-template-columns: .7fr 1.3fr;
        gap: 70px;
        align-items: start;
    }

    .seo-delhi-faq__list {
        border-top: 1px solid #bfd3e8;
    }

    .seo-delhi-faq details {
        border-bottom: 1px solid #bfd3e8;
    }

    .seo-delhi-faq summary {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        padding: 23px 0;
        color: var(--navy);
        font-size: 1.08rem;
        font-weight: 700;
        cursor: pointer;
        list-style: none;
    }

    .seo-delhi-faq summary::-webkit-details-marker {
        display: none
    }

    .seo-delhi-faq summary span {
        color: var(--blue);
        font-size: 1.35rem
    }

    .seo-delhi-faq details[open] summary span {
        transform: rotate(45deg)
    }

    .seo-delhi-faq details p {
        padding: 0 40px 22px 0;
        margin: 0;
        font-size: .96rem
    }

    .seo-delhi-final-cta {
        padding: 62px 0;
        background: var(--gold);
    }

    .seo-delhi-final-cta__inner {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 50px;
    }

    .seo-delhi-final-cta h2,
    .seo-delhi-final-cta p {
        max-width: 760px;
        color: var(--navy);
    }

    .seo-delhi-final-cta p {
        margin-bottom: 0;
        opacity: .82;
    }

    .seo-delhi-final-cta .seo-delhi-kicker {
        color: var(--navy) !important;
        opacity: .68;
    }

    .seo-delhi-final-cta .seo-delhi-button {
        flex: 0 0 auto;
    }

    .seo-delhi-button--dark {
        background: var(--navy);
        color: #fff;
        box-shadow: 0 14px 28px rgba(7, 26, 56, .2);
    }

    .seo-delhi-button--dark:hover {
        background: var(--blue);
        color: #fff;
    }

    @media (max-width: 980px) {

        .seo-delhi-hero__grid,
        .seo-delhi-split,
        .seo-delhi-ai__grid,
        .seo-delhi-faq__grid {
            grid-template-columns: 1fr
        }

        .seo-delhi-hero__content {
            max-width: 760px;
            text-align: center;
        }

        .seo-delhi-hero__form-wrap {
            margin: 10px auto 0;
        }

        .seo-delhi-hero .seo-delhi-eyebrow,
        .seo-delhi-hero__content {
            margin-inline: auto;
        }

        .seo-delhi-hero h1,
        .seo-delhi-lead {
            margin-inline: auto;
        }

        .seo-delhi-actions {
            justify-content: center;
        }

        .seo-delhi-card-grid,
        .seo-delhi-industry-grid {
            grid-template-columns: repeat(2, 1fr)
        }

        .seo-delhi-faq__grid {
            gap: 40px
        }

        .seo-delhi-heading--left {
            max-width: 760px
        }

        .seo-delhi-final-cta__inner {
            align-items: flex-start;
            flex-direction: column
        }
    }

    @media (max-width: 700px) {
        .seo-delhi-container {
            width: min(100% - 28px, 1180px)
        }

        .seo-delhi-section {
            padding: 64px 0
        }

        .seo-delhi-hero {
            min-height: 0;
            padding: 52px 0 66px;
        }

        .seo-delhi-hero__grid {
            gap: 44px;
        }

        .seo-delhi-hero__content {
            max-width: 100%
        }

        .seo-delhi-page :where(.seo-delhi-hero, .seo-delhi-section, .seo-delhi-final-cta) h1 {
            font-size: clamp(2.25rem, 11vw, 3.45rem)
        }

        .seo-delhi-results__grid,
        .seo-delhi-feature-grid,
        .seo-delhi-process__grid,
        .seo-delhi-testimonial-grid {
            grid-template-columns: 1fr
        }

        .seo-delhi-card-grid,
        .seo-delhi-industry-grid {
            grid-template-columns: 1fr
        }

        .seo-delhi-logo-grid {
            grid-template-columns: repeat(2, 1fr)
        }

        .seo-delhi-logo-grid .seo-delhi-logo:last-child {
            grid-column: 1/-1
        }

        .seo-delhi-ai__panel {
            min-height: 340px;
            padding: 24px
        }

        .seo-delhi-local__map {
            min-height: 330px
        }

        .seo-delhi-hero__proof {
            grid-template-columns: 1fr;
            gap: 14px;
            max-width: 330px;
            margin: 32px auto 0;
            text-align: left;
        }

        .seo-delhi-hero__proof li,
        .seo-delhi-hero__proof li:first-child {
            grid-template-columns: 95px 1fr;
            align-items: center;
            padding: 0 0 0 14px;
            border-left: 2px solid var(--gold);
        }

        .seo-delhi-actions {
            align-items: stretch;
            flex-direction: column
        }

        .seo-delhi-actions .seo-delhi-text-link {
            padding: 8px 0;
            text-align: center;
        }

        .seo-delhi-actions .seo-delhi-button {
            width: 100%
        }

        .seo-delhi-final-cta {
            padding: 52px 0
        }

        .seo-delhi-final-cta .seo-delhi-button {
            width: 100%
        }

        .seo-delhi-hero__form-wrap::before {
            inset: 12px -6px -12px 8px;
        }

        .seo-delhi-hero__form {
            padding: 24px 20px;
        }
    }
</style>

<?php if ( ! defined( 'AIOSEO_VERSION' ) ) : ?>
<script type="application/ld+json">
    <?php
    echo wp_json_encode(
        array(
            '@context'   => 'https://schema.org',
            '@type'      => 'FAQPage',
            'mainEntity' => array_map(
                static function ($seo_faq) {
                    return array(
                        '@type'          => 'Question',
                        'name'           => $seo_faq[0],
                        'acceptedAnswer' => array('@type' => 'Answer', 'text' => $seo_faq[1]),
                    );
                },
                $seo_faqs
            ),
        ),
        JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
    );
    ?>
</script>
<?php endif; ?>

<?php get_footer(); ?>
