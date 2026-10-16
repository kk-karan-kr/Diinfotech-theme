<?php
$eyebrow = get_sub_field( 'eyebrow' ); $heading = get_sub_field( 'heading' ); $highlight = get_sub_field( 'highlighted_heading' ); $description = get_sub_field( 'description' );
$cta = get_sub_field( 'cta_button' ); $illustration = get_sub_field( 'illustration' ); $platforms = di_service_v2_rows( get_sub_field( 'platforms' ) ); $capabilities = di_service_v2_rows( get_sub_field( 'capabilities' ) ); $background = get_sub_field( 'background' );
if ( ! $eyebrow && ! $heading && ! $highlight && ! $description && ! $illustration && ! $platforms && ! $capabilities && empty( $cta['url'] ) ) { return; }

$heading_lines   = preg_split( '/\s*\|\s*/', (string) $heading );
$highlight_terms = array_values( array_filter( array_map( 'trim', preg_split( '/\s*\|\s*/', (string) $highlight ) ) ) );
$highlight_map   = array();
foreach ( $highlight_terms as $index => $term ) {
	$highlight_map[ strtolower( $term ) ] = $index;
}
$highlight_pattern = $highlight_terms ? '/(' . implode( '|', array_map( static fn( $term ) => preg_quote( $term, '/' ), $highlight_terms ) ) . ')/i' : '';
?>
<section id="ai-search-overview" class="service-v2-section service-v2-ai seo-delhi-section seo-ai-overview seo-module <?php echo esc_attr( di_service_v2_background_class( $background ) ); ?>">
	<div class="service-v2-container seo-delhi-container service-v2-ai__top seo-ai-overview__top">
		<div class="seo-ai-overview__copy">
			<?php if ( $eyebrow ) : ?><p class="service-v2-kicker seo-delhi-kicker"><?php echo esc_html( $eyebrow ); ?></p><?php endif; ?>
			<h2><?php foreach ( $heading_lines as $line_index => $line ) : ?><?php if ( $line_index ) : ?><br><?php endif; ?><?php $parts = $highlight_pattern ? preg_split( $highlight_pattern, $line, -1, PREG_SPLIT_DELIM_CAPTURE ) : array( $line ); foreach ( $parts as $part ) : $key = strtolower( $part ); if ( isset( $highlight_map[ $key ] ) ) : $tag = 0 === $highlight_map[ $key ] ? 'span' : 'em'; ?><<?php echo $tag; ?>><?php echo esc_html( $part ); ?></<?php echo $tag; ?>><?php else : ?><?php echo esc_html( $part ); ?><?php endif; endforeach; ?><?php endforeach; ?></h2>
			<?php if ( $description ) : ?><div class="service-v2-copy"><?php echo wp_kses_post( wpautop( $description ) ); ?></div><?php endif; ?>
			<?php di_service_v2_link( $cta, 'seo-delhi-button seo-delhi-button--primary' ); ?>
		</div>
		<div class="service-v2-ai__visual seo-ai-visual seo-ai-visual--acf">
            <?php if ( $illustration ) : ?>
                <?php echo di_infotech_image( $illustration, 'di-content', array( 'sizes' => '(max-width: 900px) 100vw, 50vw' ) ); ?>
            <?php endif; ?>
            <?php if ( $platforms ) : ?><div class="service-v2-platform-list">
                <?php foreach ( $platforms as $platform ) : ?>
                    <?php if ( empty( $platform['name'] ) && empty( $platform['logo'] ) ) { continue; } ?>
                    <div><?php if ( ! empty( $platform['logo'] ) ) { echo di_infotech_image( $platform['logo'], 'thumbnail' ); } ?><?php if ( ! empty( $platform['name'] ) ) : ?><strong><?php echo esc_html( $platform['name'] ); ?></strong><?php endif; ?></div>
                <?php endforeach; ?>
            </div><?php endif; ?>
        </div>
    </div>
    <?php if ( $capabilities ) : ?><div class="service-v2-container service-v2-capabilities seo-ai-capabilities service-v2-auto-grid"><?php foreach ( $capabilities as $item ) : ?><article><?php echo di_service_v2_icon( $item ); // phpcs:ignore ?><div><h3><?php echo esc_html( $item['title'] ?? '' ); ?></h3><?php echo wp_kses_post( wpautop( $item['description'] ?? '' ) ); ?></div></article><?php endforeach; ?></div><?php endif; ?>
</section>
