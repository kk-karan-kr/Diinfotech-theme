<?php
/**
 * Flexible Content renderer for Modular Service Page V2.
 *
 * @package DI_Infotech
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'di_service_v2_background_class' ) ) {
	function di_service_v2_background_class( $background ) {
		$allowed = array( 'white', 'light', 'dark', 'yellow', 'blue' );
		$value   = in_array( $background, $allowed, true ) ? $background : 'white';
		return 'service-v2-bg--' . $value;
	}
}

if ( ! function_exists( 'di_service_v2_link' ) ) {
	function di_service_v2_link( $link, $class = 'service-v2-button service-v2-button--primary' ) {
		if ( ! is_array( $link ) || empty( $link['url'] ) ) {
			return;
		}

		$target = ! empty( $link['target'] ) ? $link['target'] : '_self';
		$title  = ! empty( $link['title'] ) ? $link['title'] : __( 'Learn More', 'di-infotech' );
		$rel    = '_blank' === $target ? ' rel="noopener noreferrer"' : '';

		printf(
			'<a class="%1$s" href="%2$s" target="%3$s"%4$s>%5$s <span aria-hidden="true">&rarr;</span></a>',
			esc_attr( $class ),
			esc_url( $link['url'] ),
			esc_attr( $target ),
			$rel, // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			esc_html( $title )
		);
	}
}

if ( ! function_exists( 'di_service_v2_icon' ) ) {
	function di_service_v2_icon( $icon ) {
		$icons = array(
			'visibility' => 'fa-chart-column', 'traffic' => 'fa-users', 'growth' => 'fa-bullseye',
			'leads' => 'fa-user-check', 'reporting' => 'fa-file-lines', 'experience' => 'fa-award',
			'data' => 'fa-chart-line', 'location' => 'fa-location-dot', 'settings' => 'fa-gears',
			'report' => 'fa-file-contract', 'target' => 'fa-bullseye', 'search' => 'fa-magnifying-glass',
			'technical' => 'fa-code', 'content' => 'fa-pen-nib', 'local' => 'fa-map-location-dot',
			'commerce' => 'fa-cart-shopping', 'authority' => 'fa-shield-halved', 'development' => 'fa-laptop-code',
			'marketing' => 'fa-bullhorn', 'automation' => 'fa-robot', 'healthcare' => 'fa-heart-pulse',
			'education' => 'fa-graduation-cap', 'real_estate' => 'fa-building', 'legal' => 'fa-scale-balanced',
			'technology' => 'fa-microchip', 'travel' => 'fa-plane', 'business' => 'fa-briefcase',
		);
		$class = isset( $icons[ $icon ] ) ? $icons[ $icon ] : 'fa-star';
		return '<span class="service-v2-icon" aria-hidden="true"><i class="fa-solid ' . esc_attr( $class ) . '"></i></span>';
	}
}

$service_v2_templates = array(
	'hero'               => 'hero',
	'trusted_brands'     => 'trusted-brands',
	'results'            => 'results',
	'why_choose'         => 'why-choose',
	'services_grid'      => 'services-grid',
	'process'            => 'process',
	'ai_search_overview' => 'ai-search-overview',
	'industries'         => 'industries',
	'local_service'      => 'local-service',
	'testimonials'       => 'testimonials',
	'inline_cta'         => 'inline-cta',
	'faqs'               => 'faqs',
	'final_cta'          => 'final-cta',
	'legacy_section'     => 'legacy-section',
);
?>

<main class="service-v2-page seo-delhi-page" id="main-content">
	<?php if ( function_exists( 'have_rows' ) && have_rows( 'service_sections' ) ) : ?>
		<?php while ( have_rows( 'service_sections' ) ) : ?>
			<?php
			the_row();
			$service_v2_layout = get_row_layout();

			if ( isset( $service_v2_templates[ $service_v2_layout ] ) ) {
				get_template_part( 'template-parts/services-v2/sections/' . $service_v2_templates[ $service_v2_layout ] );
			}
			?>
		<?php endwhile; ?>
	<?php elseif ( current_user_can( 'edit_post', get_the_ID() ) ) : ?>
		<div class="service-v2-editor-notice" role="status">
			<?php esc_html_e( 'Modular Layout V2 is selected, but no page sections have been added yet.', 'di-infotech' ); ?>
		</div>
	<?php endif; ?>
</main>
