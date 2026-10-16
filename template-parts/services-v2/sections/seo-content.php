<?php
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
