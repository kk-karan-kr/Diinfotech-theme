<?php
$eyebrow = get_sub_field( 'eyebrow' ); $heading = get_sub_field( 'heading' ); $highlight = get_sub_field( 'highlighted_heading' ); $description = get_sub_field( 'description' );
$heading = $heading ?: get_post_meta( get_the_ID(), 'service_sections_' . max( 0, get_row_index() - 1 ) . '_heading', true );
$heading = $heading ?: __( 'SEO for Google,|AI Overviews &|Generative Search', 'di-infotech' );
$cta = get_sub_field( 'cta_button' ); $illustration = get_sub_field( 'illustration' ); $platforms = get_sub_field( 'platforms' ); $capabilities = get_sub_field( 'capabilities' ); $background = get_sub_field( 'background' );
if ( ! $heading && ! $capabilities ) { return; }

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
		<?php $platform_names = array_values( array_filter( array_map( static fn( $platform ) => $platform['name'] ?? '', (array) $platforms ) ) ); $platform_names = array_pad( $platform_names, 3, '' ); ?>
		<div class="service-v2-ai__visual seo-ai-visual" aria-label="Search visibility across Google, AI Overviews and generative AI">
			<div class="seo-ai-orbit" aria-hidden="true"></div>
			<div class="seo-ai-google-card">
				<div class="seo-ai-google-word"><span>G</span><span>o</span><span>o</span><span>g</span><span>l</span><span>e</span></div>
				<div class="seo-ai-search-bar"><span>Your Business</span><b>&times;</b><i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i></div>
				<div class="seo-ai-answer"><strong><i>&#10022;</i> AI Overview</strong><span></span><span></span><span></span><span></span><div><small></small><small></small><small></small></div></div>
			</div>
			<div class="seo-ai-platform seo-ai-platform--chat"><b>&#9678;</b><strong><?php echo esc_html( $platform_names[0] ?: 'ChatGPT' ); ?></strong><span></span><span></span><span></span></div>
			<div class="seo-ai-platform seo-ai-platform--gemini"><b>&#10022;</b><strong><?php echo esc_html( $platform_names[1] ?: 'Gemini' ); ?></strong><span></span><span></span><span></span></div>
			<div class="seo-ai-platform seo-ai-platform--copilot"><b>&#9670;</b><strong><?php echo esc_html( $platform_names[2] ?: 'Copilot' ); ?></strong><span></span><span></span><span></span></div>
			<div class="seo-ai-channels"><span><i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i><b>Search</b></span><span>&#9678; <b>AI Overviews</b></span><span>&#10022; <b>Generative AI</b></span></div>
		</div>
	</div>
	<?php if ( $capabilities ) : ?><div class="service-v2-container service-v2-capabilities seo-ai-capabilities service-v2-auto-grid"><?php foreach ( $capabilities as $item ) : ?><article><?php echo di_service_v2_icon( $item['icon'] ?? '' ); // phpcs:ignore ?><div><h3><?php echo esc_html( $item['title'] ?? '' ); ?></h3><?php echo wp_kses_post( wpautop( $item['description'] ?? '' ) ); ?></div></article><?php endforeach; ?></div><?php endif; ?>
</section>
