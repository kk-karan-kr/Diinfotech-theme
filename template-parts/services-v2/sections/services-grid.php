<?php
$eyebrow = get_sub_field( 'eyebrow' ); $heading = get_sub_field( 'heading' ); $description = get_sub_field( 'description' ); $items = di_service_v2_rows( get_sub_field( 'items' ) );
$columns = max( 2, min( 4, (int) ( get_sub_field( 'columns' ) ?: 3 ) ) ); $background = get_sub_field( 'background' );
$column_class = 4 === $columns ? 'col-lg-3 col-sm-6' : ( 2 === $columns ? 'col-lg-6 col-sm-6' : 'col-lg-4 col-sm-6' );
if ( ! $eyebrow && ! $heading && ! $description && ! $items ) { return; }
?>
<section class="advertising-wrp padding_top_bottom service-v2-services <?php echo esc_attr( di_service_v2_background_class( $background ) ); ?>">
	<div class="container"><div class="heading text-center"><?php if ( $eyebrow ) : ?><p class="service-v2-kicker"><?php echo esc_html( $eyebrow ); ?></p><?php endif; ?><?php if ( $heading ) : ?><h2><?php echo esc_html( $heading ); ?></h2><?php endif; ?><?php if ( $description ) : ?><div class="sub_pera"><?php echo wp_kses_post( wpautop( $description ) ); ?></div><?php endif; ?></div>
	<?php if ( $items ) : ?><div class="row"><?php foreach ( $items as $item ) : ?><div class="<?php echo esc_attr( $column_class ); ?>"><div class="advertising-content-wrp"><?php if ( ! empty( $item['number'] ) ) : ?><span class="service-v2-card-number"><?php echo esc_html( $item['number'] ); ?></span><?php endif; ?><?php if ( ! empty( $item['icon'] ) ) { echo di_service_v2_icon( $item ); } ?><div class="heading"><h3><?php echo esc_html( $item['title'] ?? '' ); ?></h3><div class="sub_pera grey-text"><?php echo wp_kses_post( wpautop( $item['description'] ?? '' ) ); ?><?php di_service_v2_link( $item['link'] ?? array() ); ?></div></div></div></div><?php endforeach; ?></div><?php endif; ?></div>
</section>
