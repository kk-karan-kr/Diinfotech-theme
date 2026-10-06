<?php
/** CLI only: generate missing theme sizes while retaining originals and old sizes. */
if ( PHP_SAPI !== 'cli' ) { http_response_code( 404 ); exit; }
require dirname( __DIR__, 4 ) . '/wp-load.php';
require_once ABSPATH . 'wp-admin/includes/image.php';
add_filter( 'wp_get_missing_image_subsizes', static function ( $sizes ) {
	return array_intersect_key( $sizes, array_flip( array( 'di-card', 'di-content', 'di-logo' ) ) );
} );
$ids = get_posts( array( 'post_type' => 'attachment', 'post_mime_type' => 'image', 'post_status' => 'inherit', 'fields' => 'ids', 'posts_per_page' => -1 ) );
$updated = 0; $missing = 0;
foreach ( $ids as $id ) {
	if ( ! is_file( get_attached_file( $id ) ) ) { $missing++; continue; }
	if ( ! wp_get_missing_image_subsizes( $id ) ) { continue; }
	$result = wp_update_image_subsizes( $id );
	if ( is_wp_error( $result ) ) { echo 'FAILED ' . $id . ': ' . $result->get_error_message() . PHP_EOL; continue; }
	$updated++;
	if ( 0 === $updated % 20 ) { echo 'Processed ' . $updated . ' attachments' . PHP_EOL; }
}
echo 'Updated: ' . $updated . '; missing local originals: ' . $missing . PHP_EOL;
