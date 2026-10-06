<?php
/** Run with PHP CLI + GD: php tools/optimize-slider.php. Originals are retained. */
if ( PHP_SAPI !== 'cli' ) { http_response_code( 404 ); exit; }
if ( ! function_exists( 'imagewebp' ) ) { throw new RuntimeException( 'GD WebP support is required.' ); }
$root = dirname( __DIR__ ) . '/assets/img/slider/';
foreach ( glob( $root . '*.{png,jpg,jpeg}', GLOB_BRACE ) as $file ) {
	$image = imagecreatefromstring( file_get_contents( $file ) );
	if ( ! $image ) { throw new RuntimeException( 'Cannot decode ' . $file ); }
	$width = imagesx( $image ); $height = imagesy( $image );
	$stem = pathinfo( $file, PATHINFO_FILENAME );
	$targets = strpos( $stem, '-mobile' ) !== false ? array( 480, 768 ) : array( 1200, 1800 );
	foreach ( array_unique( array_map( static function ( $w ) use ( $width ) { return min( $w, $width ); }, $targets ) ) as $target ) {
		$scaled = imagecreatetruecolor( $target, (int) round( $height * $target / $width ) );
		imagealphablending( $scaled, false ); imagesavealpha( $scaled, true );
		imagecopyresampled( $scaled, $image, 0, 0, 0, 0, $target, imagesy( $scaled ), $width, $height );
		$output = $root . $stem . '-' . $target . '.webp';
		if ( ! imagewebp( $scaled, $output, 80 ) ) { throw new RuntimeException( 'Cannot encode ' . $output ); }
		printf( "%s: %d -> %d bytes\n", basename( $output ), filesize( $file ), filesize( $output ) );
		imagedestroy( $scaled );
	}
	imagedestroy( $image );
}
