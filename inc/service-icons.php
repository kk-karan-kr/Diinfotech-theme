<?php
/** Theme-managed service icon options; preserves all existing ACF keys and values. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

function di_service_icon_presets() {
    return array(
        'bullhorn' => 'Marketing: Campaign / advertising',
        'bullseye' => 'Marketing: Targeting / conversions',
        'chart-line' => 'Marketing: ROI / growth',
        'chart-pie' => 'Marketing: Analytics',
        'coins' => 'Marketing: Budget / revenue',
        'flask' => 'Marketing: A/B testing',
        'filter' => 'Marketing: Funnel',
        'arrow-pointer' => 'Marketing: Clicks / PPC',
        'code' => 'Website: Code / development',
        'laptop-code' => 'Website: Web design',
        'mobile-screen-button' => 'Website: Responsive / mobile',
        'gauge-high' => 'Website: Speed',
        'shield-halved' => 'Website: Security',
        'server' => 'Website: Hosting',
        'plug' => 'Website: Integrations',
        'screwdriver-wrench' => 'Website: Maintenance',
        'cart-shopping' => 'Ecommerce: Store',
        'credit-card' => 'Ecommerce: Payments',
        'truck' => 'Ecommerce: Delivery',
        'magnifying-glass' => 'SEO: Search',
        'pen-nib' => 'SEO: Content',
        'robot' => 'General: AI / automation',
        'headset' => 'General: Support'
    );
}

/** Accept only an icon token and a supported Free family, never arbitrary CSS/HTML. */
function di_service_icon_class( $value ) {
    $value = trim( (string) $value );
    if ( ! preg_match('/^(?:(fa-solid|fa-regular|fa-brands|fas|far|fab)\s+)?(?:fa-)?([a-z0-9]+(?:-[a-z0-9]+)*)$/', $value, $m) ) { return ''; }
    $family = array('fas'=>'fa-solid','far'=>'fa-regular','fab'=>'fa-brands');
    $style = $m[1] ?: 'fa-solid';
    $style = $family[$style] ?? $style;
    $name = $m[2];
    static $css;
    if ( null === $css ) { $css = file_get_contents(get_template_directory().'/assets/css/fontawesome-local.css'); }
    if ( ! preg_match('/\.fa-'.preg_quote($name, '/').'(?=[:{,])/', $css) ) { return ''; }
    return $style.' fa-'.$name;
}
add_filter('acf/validate_value/name=icon_custom', static function($valid, $value) {
    if ( true !== $valid || '' === trim((string)$value) ) { return $valid; }
    return di_service_icon_class($value) ? true : 'Enter a valid Font Awesome Free 6.6 icon name, for example fa-solid fa-bullhorn. Do not paste HTML.';
}, 10, 2);

function di_service_icon_fields() {
    static $fields;
    if ( isset( $fields ) ) { return $fields; }
    $fields = array();
    $parents = array(
        'field_v2_result_benefits' => 'field_v2_result_benefit_icon',
        'field_v2_why_benefits' => 'field_v2_why_icon',
        'field_v2_service_items' => 'field_v2_service_icon',
        'field_v2_ai_capabilities' => 'field_v2_ai_cap_icon',
        'field_v2_industry_items' => 'field_v2_industry_icon',
    );
    foreach ( $parents as $parent => $key ) {
        $fields[$parent] = array(
            array('key'=>$key.'_custom', 'parent'=>$parent, 'label'=>'Font Awesome name (HTML: .service-v2-icon)', 'name'=>'icon_custom', 'type'=>'text', 'required'=>0, 'instructions'=>'Use a Free 6.6 icon: bullhorn, fa-bullhorn, fa-solid fa-bullhorn, or fa-brands fa-google. No HTML or Pro icons.', 'conditional_logic'=>array(array(array('field'=>$key,'operator'=>'==','value'=>'custom')))),
            array('key'=>$key.'_image', 'parent'=>$parent, 'label'=>'Uploaded icon (HTML: .service-v2-icon)', 'name'=>'icon_image', 'type'=>'image', 'required'=>0, 'return_format'=>'id', 'preview_size'=>'thumbnail', 'library'=>'all', 'mime_types'=>'png,webp,jpg,jpeg', 'instructions'=>'Use a square PNG or WebP, preferably with a transparent background.', 'conditional_logic'=>array(array(array('field'=>$key,'operator'=>'==','value'=>'image'))))
        );
    }
    return $fields;
}

/** Inline CTAs share the icon renderer, without creating another field group. */
function di_service_inline_icon_fields() {
    $base = array('parent'=>'layout_v2_inline_cta', 'parent_layout'=>'layout_v2_inline_cta');
    return array(
        array_merge($base, array('key'=>'field_v2_inline_icon', 'name'=>'icon', 'label'=>'CTA icon (HTML: .seo-inline-cta__icon)', 'type'=>'select', 'ui'=>1, 'allow_null'=>1, 'required'=>0, 'default_value'=>'none', 'choices'=>array_merge(array('arrow-right'=>'Arrow (existing appearance)'), di_service_icon_presets(), array('custom'=>'Custom Font Awesome name','image'=>'Uploaded icon','none'=>'No icon')))),
        array_merge($base, array('key'=>'field_v2_inline_icon_custom', 'name'=>'icon_custom', 'label'=>'Font Awesome name (HTML: .seo-inline-cta__icon)', 'type'=>'text', 'required'=>0, 'instructions'=>'Example: fa-solid fa-bullhorn or fa-brands fa-google. Use Free 6.6 icons; no HTML.', 'conditional_logic'=>array(array(array('field'=>'field_v2_inline_icon','operator'=>'==','value'=>'custom'))))),
        array_merge($base, array('key'=>'field_v2_inline_icon_image', 'name'=>'icon_image', 'label'=>'Uploaded icon (HTML: .seo-inline-cta__icon)', 'type'=>'image', 'return_format'=>'id', 'preview_size'=>'thumbnail', 'mime_types'=>'png,webp,jpg,jpeg', 'required'=>0, 'conditional_logic'=>array(array(array('field'=>'field_v2_inline_icon','operator'=>'==','value'=>'image')))))
    );
}
add_action('acf/init', static function () {
    foreach (di_service_inline_icon_fields() as $field) { acf_add_local_field($field); }
}, 30);
add_filter('acf/load_field/key=field_6aace66671cf3', static function ($field) {
    $field['instructions'] = ($field['instructions'] ?? '').' Add Inline CTA repeatedly wherever needed. Each row has its own content, icon and Yellow / Blue / Dark / Light style. Final CTA is the separate bottom banner.';
    foreach ($field['layouts'] as &$layout) {
        if ('inline_cta' !== $layout['name']) { continue; }
        $layout['label'] = 'Inline CTA — repeatable, 4 styles (HTML: .seo-inline-cta)';
        $layout['max'] = '';
        $keys = array_column($layout['sub_fields'], 'key');
        foreach (di_service_inline_icon_fields() as $child) {
            if (!in_array($child['key'], $keys, true)) { $layout['sub_fields'][] = $child; }
        }
    }
    unset($layout);
    return $field;
}, 30);

// Register child keys so ACF can validate, save and format values without a JSON sync.
add_action('acf/init', static function () {
    foreach (di_service_icon_fields() as $parent => $fields) {
        // Register the complete row, not just the additions: ACF prefers local children over database children.
        $repeater = acf_get_field($parent);
        $all = $repeater['sub_fields'] ?? $fields;
        foreach ($all as $index => $field) {
            $field['parent'] = $parent;
            $field['menu_order'] = $index;
            acf_add_local_field($field);
        }
    }
}, 30);
add_filter('acf/load_field', static function ($field) {
    $groups = di_service_icon_fields();
    foreach ($groups as $parent => $children) {
        $icon_key = substr($children[0]['key'], 0, -7);
        if ($field['key'] === $icon_key) {
            $field['choices'] = array_merge($field['choices'] ?? array(), di_service_icon_presets(), array('custom'=>'Custom Font Awesome name', 'image'=>'Uploaded icon', 'none'=>'No icon'));
            $field['ui'] = 1;
            $field['required'] = 0;
            $field['allow_null'] = 1;
            $field['default_value'] = 'none';
            $field['instructions'] = 'Search presets, enter a Font Awesome name, upload an icon, or choose No icon.';
        }
        if ($field['key'] === $parent) {
            $existing = array_column($field['sub_fields'] ?? array(), 'key');
            foreach ($children as $child) {
                if (!in_array($child['key'], $existing, true)) { $field['sub_fields'][] = $child; }
            }
        }
    }
    return $field;
}, 30);
