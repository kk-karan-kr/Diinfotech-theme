<?php
/**
 * Local SEO service section (.online-store-wrp).
 *
 * @package DI_Infotech
 */

$eyebrow     = get_sub_field( 'eyebrow' );
$heading     = get_sub_field( 'heading' );
$description = get_sub_field( 'description' );
$locations   = di_service_v2_rows( get_sub_field( 'locations' ) );
$image       = get_sub_field( 'image' );
$cta         = get_sub_field( 'cta_button' );
$background  = get_sub_field( 'background' );

if ( ! $eyebrow && ! $heading && ! $description && ! $locations && ! $image && empty( $cta['url'] ) ) {
	return;
}
?>
<section id="local-seo-services" class="online-store-wrp padding_top_bottom service-v2-local <?php echo esc_attr( di_service_v2_background_class( $background ) ); ?>">
	<div class="container">
		<div class="service-v2-local__layout">
			<div class="service-v2-local__content">
				<?php if ( $eyebrow ) : ?>
					<p class="service-v2-kicker"><?php echo esc_html( $eyebrow ); ?></p>
				<?php endif; ?>
				<div class="heading">
					<?php if ( $heading ) : ?><h2><?php echo esc_html( $heading ); ?></h2><?php endif; ?>
					<?php if ( $description ) : ?><div class="sub_pera"><?php echo wp_kses_post( wpautop( $description ) ); ?></div><?php endif; ?>
				</div>
				<?php if ( $locations ) : ?>
					<div class="service-v2-local__locations" aria-label="Local SEO service locations">
						<?php foreach ( $locations as $location ) : ?>
							<?php $name = $location['name'] ?? ''; $link = $location['link'] ?? array(); if ( ! $name ) { continue; } ?>
							<?php if ( ! empty( $link['url'] ) ) : ?>
								<a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ?? '_self' ); ?>"><i class="fa-solid fa-location-dot" aria-hidden="true"></i><?php echo esc_html( $name ); ?></a>
							<?php else : ?>
								<span><i class="fa-solid fa-location-dot" aria-hidden="true"></i><?php echo esc_html( $name ); ?></span>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
				<?php di_service_v2_link( $cta, 'service-v2-button service-v2-button--primary service-v2-local__cta' ); ?>
			</div>
			<div class="service-v2-local__visual">
				<?php if ( $image ) : ?>
					<?php echo wp_get_attachment_image( (int) $image, 'di-content', false, array( 'alt' => $heading, 'loading' => 'lazy', 'sizes' => '(max-width: 900px) 100vw, 50vw' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				<?php else : ?>
					<div class="service-v2-local-map" aria-hidden="true">
						<span class="service-v2-local-map__ring service-v2-local-map__ring--one"></span><span class="service-v2-local-map__ring service-v2-local-map__ring--two"></span>
						<span class="service-v2-local-map__pin"><i class="fa-solid fa-location-dot"></i></span>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
