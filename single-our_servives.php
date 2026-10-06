<?php
/**
 * Template Name: Our Services
 * Template Post Type: page, services
 *
 * Compatibility template for pages assigned the original (misspelled)
 * `our_servives` template. The canonical service renderer supports both the
 * legacy Service ACF fields and the Modular Service Page V2 builder.
 *
 * @package DI_Infotech
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require get_template_directory() . '/single-services.php';
