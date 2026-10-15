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
if ( ! $heading ) {
	return;
}

$seo_content = get_field( 'seo_content' );
$seo_heading = is_array( $seo_content ) ? trim( (string) ( $seo_content['main_heading'] ?? '' ) ) : '';
$seo_copy    = is_array( $seo_content ) ? (string) ( $seo_content['sub_pera'] ?? '' ) : '';
// Empty rich-text editors may retain paragraph tags, line breaks or non-breaking spaces.
$seo_has_copy = '' !== trim( str_replace( "\xc2\xa0", ' ', html_entity_decode( wp_strip_all_tags( $seo_copy ), ENT_QUOTES, 'UTF-8' ) ) );
?>
<?php if ( '' !== $seo_heading || $seo_has_copy ) : ?>
<section class="brands padding_top_bottom service-v2-seo-content">
	<div class="container"><div class="row"><div class="col-lg-12"><div class="heading text-left">
		<?php if ( '' !== $seo_heading ) : ?><h2><?php echo esc_html( $seo_heading ); ?></h2><?php endif; ?>
		<?php if ( $seo_has_copy ) : ?><div class="sub-heading"><?php echo wp_kses_post( wpautop( $seo_copy ) ); ?></div><?php endif; ?>
	</div></div></div></div>
</section>
<?php endif; ?>
<section class="seo-delhi-final-cta service-v2-final-cta service-v2-final-cta--<?php echo esc_attr( $background ); ?>">
	<div class="seo-delhi-container seo-delhi-final-cta__inner">
		<div>
			<?php if ( $eyebrow ) : ?><p class="seo-delhi-kicker"><?php echo esc_html( $eyebrow ); ?></p><?php endif; ?>
			<h2><?php echo esc_html( $heading ); ?></h2>
			<?php if ( $description ) : ?><?php echo wp_kses_post( wpautop( $description ) ); ?><?php endif; ?>
		</div>
		<?php if ( is_array( $primary ) && ! empty( $primary['url'] ) ) : ?>
			<?php $primary_target = ! empty( $primary['target'] ) ? $primary['target'] : '_self'; ?>
			<a class="seo-delhi-button seo-delhi-button--dark" href="<?php echo esc_url( $primary['url'] ); ?>" target="<?php echo esc_attr( $primary_target ); ?>"<?php echo '_blank' === $primary_target ? ' rel="noopener noreferrer"' : ''; ?>>
				<?php echo esc_html( $primary['title'] ?? __( 'Get Started', 'di-infotech' ) ); ?> <span aria-hidden="true">&rarr;</span>
			</a>
		<?php endif; ?>
	</div>
</section>
