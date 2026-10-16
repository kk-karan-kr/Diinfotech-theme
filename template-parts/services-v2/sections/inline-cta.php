<?php
$eyebrow = get_sub_field('eyebrow'); $heading = get_sub_field('heading'); $description = get_sub_field('description');
$primary = get_sub_field('primary_button'); $secondary = get_sub_field('secondary_button');
$style = get_sub_field('style');
if (!in_array($style, array('yellow','blue','dark','light'), true)) { $style = 'yellow'; }
if (!$eyebrow && !$heading && !$description && empty($primary['url']) && empty($secondary['url'])) { return; }
$icon_choice = get_sub_field('icon');
// Empty optional icons must not restore a hard-coded arrow.
$icon_choice = $icon_choice ?: 'none';
$icon = di_service_v2_icon(array(
    'icon' => 'arrow-right' === $icon_choice ? 'custom' : $icon_choice,
    'icon_custom' => 'arrow-right' === $icon_choice ? 'fa-solid fa-arrow-right' : get_sub_field('icon_custom'),
    'icon_image' => get_sub_field('icon_image')
));
?>
<section class="seo-inline-cta seo-inline-cta--<?php echo esc_attr($style); ?> service-v2-inline-cta">
<div class="seo-delhi-container seo-inline-cta__inner<?php echo $icon ? '' : ' seo-inline-cta__inner--no-icon'; ?>"><?php if ($icon) : ?><span class="seo-inline-cta__icon" aria-hidden="true"><?php echo $icon; ?></span><?php endif; ?>
<div><?php if ($eyebrow) : ?><small><?php echo esc_html($eyebrow); ?></small><?php endif; ?>
<?php if ($heading) : ?><h3><?php echo esc_html($heading); ?></h3><?php endif; ?>
<?php echo wp_kses_post(wpautop($description ?: '')); ?></div>
<div class="service-v2-cta-actions"><?php di_service_v2_link($primary, 'seo-delhi-button'); di_service_v2_link($secondary, 'seo-delhi-button'); ?></div>
</div></section>
