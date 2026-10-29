<?php
$eyebrow     = get_sub_field( 'eyebrow' );
$heading     = get_sub_field( 'heading' );
$description = get_sub_field( 'description' );
$logos       = di_service_v2_rows( get_sub_field( 'brand_logos' ) );
$display     = 'slider' === get_sub_field( 'display_style' ) ? 'slider' : 'grid';
$background  = get_sub_field( 'background' );

if ( ! $eyebrow && ! $heading && ! $description && ! $logos ) {
	return;
}
?>
<section class="brands padding_top_bottom service-v2-brands <?php echo esc_attr( di_service_v2_background_class( $background ) ); ?>">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-10">
				<header class="heading text-center">
					<?php if ( $eyebrow ) : ?><p class="service-v2-kicker"><?php echo esc_html( $eyebrow ); ?></p><?php endif; ?>
					<?php if ( $heading ) : ?><h2><?php echo esc_html( $heading ); ?></h2><?php endif; ?>
					<?php if ( $description ) : ?><div class="sub_pera"><?php echo wp_kses_post( wpautop( $description ) ); ?></div><?php endif; ?>
				</header>
			</div>
		</div>
		<?php if ( $logos ) : ?>
			<div class="row justify-content-center service-v2-logo-grid--<?php echo esc_attr( $display ); ?>">
				<?php foreach ( $logos as $logo ) : ?>
					<div class="col-lg-2 col-md-3 col-sm-4 col-6">
						<div class="brand_img">
							<?php if ( ! empty( $logo['brand_link']['url'] ) ) : ?><a href="<?php echo esc_url( $logo['brand_link']['url'] ); ?>" target="<?php echo esc_attr( $logo['brand_link']['target'] ?: '_self' ); ?>" aria-label="<?php echo esc_attr( $logo['brand_name'] ?? '' ); ?>"><?php endif; ?>
							<?php if ( ! empty( $logo['brand_logo'] ) ) : ?>
								<?php echo wp_get_attachment_image( (int) $logo['brand_logo'], 'medium', false, array( 'sizes' => '(max-width: 767px) 40vw, 160px', 'data-no-lazy' => '1', 'loading' => 'lazy', 'alt' => $logo['brand_name'] ?? '' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							<?php elseif ( ! empty( $logo['brand_name'] ) ) : ?>
								<span class="preview-brand-name service-v2-logo-card__name"><?php echo esc_html( $logo['brand_name'] ); ?></span>
							<?php endif; ?>
							<?php if ( ! empty( $logo['brand_link']['url'] ) ) : ?></a><?php endif; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
