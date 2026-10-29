<?php
/** Shared responsive image and asset helpers. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

function di_infotech_register_image_sizes() {
	add_image_size( 'di-card', 720, 0, false );
	add_image_size( 'di-content', 1200, 0, false );
	add_image_size( 'di-logo', 320, 160, false );
}
add_action( 'after_setup_theme', 'di_infotech_register_image_sizes' );

/** Accept existing ACF arrays and IDs without changing stored content. */
function di_infotech_image( $image, $size = 'di-card', $attributes = array() ) {
	$id = is_array( $image ) ? (int) ( $image['ID'] ?? $image['id'] ?? 0 ) : ( is_numeric( $image ) ? (int) $image : 0 );
	$attributes = array_merge( array( 'loading' => 'lazy', 'decoding' => 'async', 'sizes' => '(max-width: 767px) 100vw, (max-width: 1199px) 50vw, 600px' ), $attributes );
	if ( $id ) { return wp_get_attachment_image( $id, $size, false, $attributes ); }
	if ( ! is_array( $image ) || empty( $image['url'] ) ) { return ''; }
	$attributes['src'] = $image['url'];
	$attributes['alt'] = $attributes['alt'] ?? ( $image['alt'] ?? '' );
	foreach ( array( 'width', 'height' ) as $dimension ) {
		if ( ! empty( $image[ $dimension ] ) ) { $attributes[ $dimension ] = (int) $image[ $dimension ]; }
	}
	unset( $attributes['sizes'] ); // An external URL has no attachment metadata/srcset.
	$html = '<img';
	foreach ( $attributes as $key => $value ) { $html .= ' ' . esc_attr( $key ) . '="' . ( 'src' === $key ? esc_url( $value ) : esc_attr( $value ) ) . '"'; }
	return $html . '>';
}

/** Discover only the generated variants; preserve the original as a fallback. */
function di_infotech_slider_srcset( $url ) {
	$stem = pathinfo( wp_parse_url( $url, PHP_URL_PATH ), PATHINFO_FILENAME );
	$candidates = array();
	foreach ( glob( get_template_directory() . '/assets/img/slider/' . $stem . '-*.webp' ) as $file ) {
		if ( preg_match( '/-(\d+)\.webp$/', $file, $matches ) ) {
			$candidates[ (int) $matches[1] ] = get_template_directory_uri() . '/assets/img/slider/' . basename( $file ) . ' ' . $matches[1] . 'w';
		}
	}
	ksort( $candidates );
	return implode( ', ', $candidates );
}

/** Resolve feature libraries from the actual selected template before wp_head. */
function di_infotech_record_template_features( $template ) {
	$name = basename( $template );
	$GLOBALS['di_theme_owl'] = in_array( $name, array( 'index.php', 'page-About.php', 'single-services.php', 'single-our_servives.php' ), true );
	$GLOBALS['di_theme_aos'] = in_array( $name, array( 'index.php', 'page-About.php', 'page-contact.php', 'page-privacy-policy.php', 'single-services.php', 'single-our_servives.php' ), true );
	$GLOBALS['di_theme_hero'] = 'index.php' === $name;
	if ( in_array( $name, array( 'single-services.php', 'single-our_servives.php' ), true ) && function_exists( 'get_field' ) && 'modular_v2' === get_field( 'service_layout_mode' ) ) {
		$GLOBALS['di_theme_aos'] = false;
		$GLOBALS['di_theme_owl'] = false;
		foreach ( (array) get_field( 'service_sections' ) as $section ) {
			if ( 'legacy_section' === ( $section['acf_fc_layout'] ?? '' ) && 'store_development' === ( $section['section_type'] ?? '' ) ) {
				$GLOBALS['di_theme_owl'] = true;
				break;
			}
		}
	}
	return $template;
}
add_filter( 'template_include', 'di_infotech_record_template_features', 99 );

/** ACF's icon picker may enqueue a second icon stylesheet during rendering. */
function di_infotech_single_icon_source() {
	if ( ! is_admin() ) { wp_dequeue_style( 'acffa_font-awesome' ); }
}
add_action( 'wp_print_styles', 'di_infotech_single_icon_source', 100 );
add_action( 'wp_footer', 'di_infotech_single_icon_source', 1 );

/** Keep CF7 protection intact; let core handle dependency-aware deferral. */
function di_infotech_form_script_strategies() {
	foreach ( array( 'google-recaptcha', 'wpcf7-recaptcha', 'contact-form-7', 'swv' ) as $handle ) {
		wp_script_add_data( $handle, 'strategy', 'defer' );
	}
}
add_action( 'wp_enqueue_scripts', 'di_infotech_form_script_strategies', 100 );

/** Preserve hero geometry even when an optimizer defers external stylesheets. */
function di_infotech_hero_geometry() {
	if ( empty( $GLOBALS['di_theme_hero'] ) ) { return; }
	echo '<style id="di-hero-geometry">.di-hero-slider__slides{position:relative;height:clamp(440px,36.45vw,560px)}.di-hero-slider__slide{position:absolute;inset:0}.di-hero-slider__slide:not(.is-active){visibility:hidden}@media(max-width:900px){.di-hero-slider__slides{height:clamp(440px,65vw,520px)}}@media(max-width:640px){.di-hero-slider__slides{height:480px}}@media(max-width:380px){.di-hero-slider__slides{height:580px}}</style>';
}
add_action( 'wp_head', 'di_infotech_hero_geometry', 1 );

/** Discover the two primary service fonts before the combined stylesheet arrives. */
function di_infotech_service_font_preloads() {
	if ( ! ( is_singular('services') || is_page_template('single-our_servives.php') ) ) { return; }
	foreach (array('NeueMontreal-Regular.woff', 'NeueMontreal-Bold.woff') as $font) {
		printf('<link rel="preload" href="%s" as="font" type="font/woff" crossorigin>', esc_url(get_template_directory_uri().'/assets/fonts/'.$font));
	}
}
add_action('wp_head', 'di_infotech_service_font_preloads', 2);
