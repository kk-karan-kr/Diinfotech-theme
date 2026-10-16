<?php
$eyebrow    = get_sub_field( 'eyebrow' );
$heading    = get_sub_field( 'heading' );
$description = get_sub_field( 'description' );
$primary    = get_sub_field( 'primary_button' );
$secondary  = get_sub_field( 'secondary_button' );
$background = get_sub_field( 'background' );

if ( ! in_array( $background, array( 'yellow', 'blue', 'dark' ), true ) ) {
	$background = 'yellow';
}
if ( ! $eyebrow && ! $heading && ! $description && empty( $primary['url'] ) && empty( $secondary['url'] ) ) {
	return;
}

?>
<section class="seo-delhi-final-cta service-v2-final-cta service-v2-final-cta--<?php echo esc_attr( $background ); ?>">
	<div class="seo-delhi-container seo-delhi-final-cta__inner">
		<div>
			<?php if ( $eyebrow ) : ?><p class="seo-delhi-kicker"><?php echo esc_html( $eyebrow ); ?></p><?php endif; ?>
			<h2><?php echo esc_html( $heading ); ?></h2>
			<?php if ( $description ) : ?><?php echo wp_kses_post( wpautop( $description ) ); ?><?php endif; ?>
		</div>
		<div class="service-v2-cta-actions">
		<?php if ( is_array( $primary ) && ! empty( $primary['url'] ) ) : ?>
			<?php $primary_target = ! empty( $primary['target'] ) ? $primary['target'] : '_self'; ?>
			<a class="seo-delhi-button seo-delhi-button--dark" href="<?php echo esc_url( $primary['url'] ); ?>" target="<?php echo esc_attr( $primary_target ); ?>"<?php echo '_blank' === $primary_target ? ' rel="noopener noreferrer"' : ''; ?>>
				<?php echo esc_html( $primary['title'] ?? __( 'Get Started', 'di-infotech' ) ); ?> <span aria-hidden="true">&rarr;</span>
			</a>
		<?php endif; ?>
		<?php di_service_v2_link( $secondary, 'seo-delhi-button seo-delhi-button--dark' ); ?>
		</div>
	</div>
</section>
