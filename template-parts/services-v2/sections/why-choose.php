<?php
$eyebrow = get_sub_field( 'eyebrow' ); $heading = get_sub_field( 'heading' ); $highlight = get_sub_field( 'highlighted_heading' );
$description = get_sub_field( 'description' ); $benefits = get_sub_field( 'benefits' ); $illustration = get_sub_field( 'illustration' ); $background = get_sub_field( 'background' );
if ( ! $heading && ! $benefits ) { return; }
?>
<section class="service-v2-section service-v2-why seo-delhi-section seo-delhi-why seo-module <?php echo esc_attr( di_service_v2_background_class( $background ) ); ?>">
	<div class="service-v2-container seo-delhi-container seo-why-layout">
		<div class="seo-why-content">
			<?php if ( $eyebrow ) : ?><p class="service-v2-kicker seo-delhi-kicker"><?php echo esc_html( $eyebrow ); ?></p><?php endif; ?>
			<h2><?php if ( $highlight ) : ?><span><?php echo esc_html( $highlight ); ?></span> <?php endif; ?><?php echo esc_html( $heading ); ?></h2>
			<?php if ( $description ) : ?><div class="service-v2-copy seo-why-intro"><?php echo wp_kses_post( wpautop( $description ) ); ?></div><?php endif; ?>
			<?php if ( $benefits ) : ?><div class="service-v2-why__benefits service-v2-auto-grid seo-why-benefits seo-auto-grid"><?php foreach ( $benefits as $item ) : ?><article><?php echo di_service_v2_icon( $item['icon'] ?? '' ); // phpcs:ignore ?><div><h3><?php echo esc_html( $item['title'] ?? '' ); ?></h3><?php echo wp_kses_post( wpautop( $item['description'] ?? '' ) ); ?></div></article><?php endforeach; ?></div><?php endif; ?>
		</div>
		<div class="service-v2-illustration seo-why-visual" aria-label="SEO strategy leading to higher rankings and business growth">
			<span class="seo-why-badge seo-why-badge--visibility">More Visibility</span>
			<span class="seo-why-badge seo-why-badge--rankings">Higher Rankings</span>
			<div class="seo-why-browser" aria-hidden="true">
				<div class="seo-why-browser__bar"><i></i><i></i><i></i></div>
				<strong>SEO</strong><span></span><span></span><span></span>
				<div class="seo-why-bars"><i></i><i></i><i></i><i></i></div>
			</div>
			<div class="seo-why-arrow" aria-hidden="true"><i class="fa-solid fa-arrow-up"></i></div>
			<div class="seo-why-steps"><span>Strategy</span><span>Optimisation</span><span>Higher Rankings</span><span>Business Growth</span></div>
		</div>
	</div>
</section>
