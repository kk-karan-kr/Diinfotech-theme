<?php
$eyebrow     = get_sub_field( 'eyebrow' );
$heading     = get_sub_field( 'heading' );
$description = get_sub_field( 'description' );
$items       = (array) get_sub_field( 'testimonials' );
$slider_id   = wp_unique_id( 'service-testimonials-' );
$background  = get_sub_field( 'background' );

if ( ! $heading && ! $items ) {
	return;
}
?>
<section class="our_clients seo-testimonials-light padding_top_bottom service-v2-testimonials <?php echo esc_attr( di_service_v2_background_class( $background ) ); ?>">
	<div class="container">
		<header class="heading text-center">
			<?php if ( $eyebrow ) : ?><p class="service-v2-kicker"><?php echo esc_html( $eyebrow ); ?></p><?php endif; ?>
			<?php if ( $heading ) : ?><h2><?php echo esc_html( $heading ); ?></h2><?php endif; ?>
			<?php if ( $description ) : ?><div class="sub_pera"><?php echo wp_kses_post( wpautop( $description ) ); ?></div><?php endif; ?>
		</header>
		<?php if ( $items ) : ?>
			<div id="<?php echo esc_attr( $slider_id ); ?>" class="preview-testimonials service-v2-testimonial-slider" tabindex="0" role="region" aria-label="Client testimonials">
				<?php foreach ( $items as $item ) : ?>
					<article class="client_wrp">
						<div class="client_heading">
							<h3><?php echo esc_html( ! empty( $item['title'] ) ? $item['title'] : ( $item['name'] ?? '' ) ); ?></h3>
							<?php echo wp_kses_post( wpautop( $item['quote'] ?? '' ) ); ?>
						</div>
						<div class="user_name">
							<?php if ( ! empty( $item['photo'] ) ) : ?><?php echo wp_get_attachment_image( (int) $item['photo'], 'thumbnail', false, array( 'loading' => 'lazy' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><?php endif; ?>
							<div><p><?php echo esc_html( $item['name'] ?? '' ); ?></p><span><?php echo esc_html( trim( ( $item['designation'] ?? '' ) . ( ! empty( $item['company'] ) ? ', ' . $item['company'] : '' ) ) ); ?></span></div>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
			<div class="service-v2-testimonial-controls" data-testimonial-controls="<?php echo esc_attr( $slider_id ); ?>" hidden>
				<button type="button" data-testimonial-prev aria-controls="<?php echo esc_attr( $slider_id ); ?>" aria-label="Previous testimonials">&#8592;</button>
				<span data-testimonial-status aria-live="polite" aria-atomic="true"></span>
				<button type="button" data-testimonial-next aria-controls="<?php echo esc_attr( $slider_id ); ?>" aria-label="Next testimonials">&#8594;</button>
			</div>
		<?php endif; ?>
	</div>
</section>
