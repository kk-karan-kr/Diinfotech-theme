<?php
/**
 * DI Infotech functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package DI_Infotech
 */

if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.1.0' );
}

require_once get_template_directory() . '/inc/performance.php';

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function di_infotech_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on DI Infotech, use a find and replace
		* to change 'di-infotech' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'di-infotech', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'di-infotech' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'di_infotech_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'di_infotech_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function di_infotech_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'di_infotech_content_width', 640 );
}
add_action( 'after_setup_theme', 'di_infotech_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function di_infotech_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'di-infotech' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'di-infotech' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'di_infotech_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function di_infotech_asset_version( $relative_path ) {
	$file_path = get_template_directory() . $relative_path;

	return file_exists( $file_path ) ? filemtime( $file_path ) : _S_VERSION;
}

function di_infotech_scripts() {
	wp_enqueue_style( 'di-infotech-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap-min.css', array(), di_infotech_asset_version( '/assets/css/bootstrap-min.css' ) );
	if ( ! empty( $GLOBALS['di_theme_owl'] ) ) wp_enqueue_style( 'di-infotech-owl-carousel', get_template_directory_uri() . '/assets/css/owl-carousel-min.css', array(), di_infotech_asset_version( '/assets/css/owl-carousel-min.css' ) );
	wp_enqueue_style( 'di-infotech-font-awesome', get_template_directory_uri() . '/assets/css/fontawesome-local.css', array(), di_infotech_asset_version( '/assets/css/fontawesome-local.css' ) );

	if ( ! empty( $GLOBALS['di_theme_aos'] ) ) wp_enqueue_style( 'di-infotech-aos', get_template_directory_uri() . '/assets/css/aos.css', array(), di_infotech_asset_version( '/assets/css/aos.css' ) );
	$main_style_dependencies = array( 'di-infotech-bootstrap', 'di-infotech-font-awesome' );
	if ( ! empty( $GLOBALS['di_theme_owl'] ) ) $main_style_dependencies[] = 'di-infotech-owl-carousel';
	if ( ! empty( $GLOBALS['di_theme_aos'] ) ) $main_style_dependencies[] = 'di-infotech-aos';

	wp_enqueue_style( 'di-infotech-main', get_template_directory_uri() . '/assets/css/style.css', $main_style_dependencies, di_infotech_asset_version( '/assets/css/style.css' ) );
	wp_enqueue_style( 'di-infotech-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array( 'di-infotech-main' ), di_infotech_asset_version( '/assets/css/responsive.css' ) );
	wp_enqueue_style( 'di-infotech-style', get_stylesheet_uri(), array( 'di-infotech-responsive' ), di_infotech_asset_version( '/style.css' ) );

	if (
		( is_singular( 'services' ) || is_page_template( 'single-our_servives.php' ) )
		&& function_exists( 'get_field' )
		&& 'modular_v2' === get_field( 'service_layout_mode' )
	) {
		wp_enqueue_style(
			'di-infotech-service-v2',
			get_template_directory_uri() . '/assets/css/service-page-v2.css',
			array( 'di-infotech-style' ),
			di_infotech_asset_version( '/assets/css/service-page-v2.css' )
		);
		wp_enqueue_script( 'di-infotech-testimonials', get_template_directory_uri() . '/assets/js/testimonial-slider.js', array(), di_infotech_asset_version( '/assets/js/testimonial-slider.js' ), true );
		wp_script_add_data( 'di-infotech-testimonials', 'strategy', 'defer' );
	}

	wp_style_add_data( 'di-infotech-style', 'rtl', 'replace' );

	wp_enqueue_script( 'di-infotech-popper', get_template_directory_uri() . '/assets/js/popper-min.js', array(), di_infotech_asset_version( '/assets/js/popper-min.js' ), true );
	wp_enqueue_script( 'di-infotech-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap-min.js', array( 'di-infotech-popper' ), di_infotech_asset_version( '/assets/js/bootstrap-min.js' ), true );
	wp_enqueue_script( 'jquery' );
	if ( ! empty( $GLOBALS['di_theme_owl'] ) ) wp_enqueue_script( 'di-infotech-owl-carousel', get_template_directory_uri() . '/assets/js/owl-carousel-min.js', array( 'jquery' ), di_infotech_asset_version( '/assets/js/owl-carousel-min.js' ), true );

	if ( ! empty( $GLOBALS['di_theme_aos'] ) ) wp_enqueue_script( 'di-infotech-aos', get_template_directory_uri() . '/assets/js/aos.js', array(), di_infotech_asset_version( '/assets/js/aos.js' ), true );
	$theme_script_dependencies = array( 'jquery', 'di-infotech-bootstrap' );
	if ( ! empty( $GLOBALS['di_theme_owl'] ) ) $theme_script_dependencies[] = 'di-infotech-owl-carousel';
	if ( ! empty( $GLOBALS['di_theme_aos'] ) ) $theme_script_dependencies[] = 'di-infotech-aos';

	wp_enqueue_script( 'di-infotech-theme', get_template_directory_uri() . '/assets/js/script.js', $theme_script_dependencies, di_infotech_asset_version( '/assets/js/script.js' ), true );

	if ( ! empty( $GLOBALS['di_theme_hero'] ) ) {
		wp_enqueue_style( 'di-infotech-hero', get_template_directory_uri() . '/assets/css/hero-slider.css', array( 'di-infotech-style' ), di_infotech_asset_version( '/assets/css/hero-slider.css' ) );
		wp_enqueue_script( 'di-infotech-hero', get_template_directory_uri() . '/assets/js/hero-slider.js', array(), di_infotech_asset_version( '/assets/js/hero-slider.js' ), true );
	}
	foreach ( array( 'di-infotech-popper', 'di-infotech-bootstrap', 'di-infotech-owl-carousel', 'di-infotech-aos', 'di-infotech-theme', 'di-infotech-hero' ) as $handle ) {
		wp_script_add_data( $handle, 'strategy', 'defer' );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'di_infotech_scripts' );

/**
 * Editable content for the preview-matched expertise section that was
 * hard-coded in the original HTML/service template.
 */
function di_infotech_register_service_expertise_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group(
		array(
			'key'      => 'group_service_preview_expertise',
			'title'    => 'Service Preview-Matched Sections',
			'fields'   => array(
				array(
					'key'        => 'field_service_expertise_section',
					'label'      => 'Digital Marketing Expertise (HTML: .our_expertise)',
					'name'       => 'digital_marketing_expertise',
					'type'       => 'group',
					'layout'     => 'block',
					'sub_fields' => array(
						array( 'key' => 'field_service_expertise_heading', 'label' => 'Heading', 'name' => 'heading', 'type' => 'text' ),
						array(
							'key'          => 'field_service_expertise_items',
							'label'        => 'Services',
							'name'         => 'items',
							'type'         => 'repeater',
							'layout'       => 'block',
							'button_label' => 'Add Service',
							'sub_fields'   => array(
								array( 'key' => 'field_service_expertise_title', 'label' => 'Service Name', 'name' => 'title', 'type' => 'text' ),
								array( 'key' => 'field_service_expertise_description', 'label' => 'Description', 'name' => 'description', 'type' => 'textarea', 'rows' => 3 ),
								array( 'key' => 'field_service_expertise_link', 'label' => 'Link', 'name' => 'link', 'type' => 'link', 'return_format' => 'array' ),
							),
						),
					),
				),
			),
			'location' => array(
				array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'services' ) ),
				array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'single-our_servives.php' ) ),
			),
			'position' => 'normal',
			'style'    => 'default',
			'active'   => true,
		)
	);
}
add_action( 'acf/init', 'di_infotech_register_service_expertise_fields' );

// Hero <picture> is discovered in initial HTML with eager/high priority.
// Script strategies above let WordPress resolve dependency-safe defer order.

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// ACF option page settings.

add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_page') ) {

        // Add parent.
        $parent = acf_add_options_page(array(
            'page_title'  => __('Home page'),
            'menu_title'  => __('Home Page'),
            'redirect'    => false,
			'icon_url' => 'dashicons-admin-home',
        ));

	

		 // Add parent.
		 $parent = acf_add_options_page(array(
            'page_title'  => __('Testimonials'),
            'menu_title'  => __('Testimonials'),
            'redirect'    => false,
			'icon_url' => 'dashicons-groups',
        ));

		 // Add parent.
		 $parent = acf_add_options_page(array(
            'page_title'  => __('Footer'),
            'menu_title'  => __('Footer'),
            'redirect'    => false,
			'icon_url' => 'dashicons-table-row-before',
        ));

		
		
    }

	if( function_exists('acf_add_options_page') ) {
	
		acf_add_options_page(array(
			'page_title' 	=> 'Portfolio',
			'menu_title'	=> 'Portfolio Settings',
			'menu_slug' 	=> 'theme-general-settings',
			'capability'	=> 'edit_posts',
			'redirect'		=> false,
			'icon_url' => 'dashicons-admin-users',
			'menu_position' =>'6'
		));
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Website',
			'menu_title'	=> 'Website',
			'parent_slug'	=> 'theme-general-settings',
		));

		acf_add_options_sub_page(array(
			'page_title' 	=> 'Landing Page',
			'menu_title'	=> 'Landing Page',
			'parent_slug'	=> 'theme-general-settings',
		));
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Email',
			'menu_title'	=> 'Email',
			'parent_slug'	=> 'theme-general-settings',
		));

		acf_add_options_sub_page(array(
			'page_title' 	=> 'Creatives',
			'menu_title'	=> 'Creatives',
			'parent_slug'	=> 'theme-general-settings',
		));	
	}
}


/**
 * To hide the /?admin page 
 */
 add_action( 'template_redirect', function() {
    if ( isset( $_GET['admin'] ) ) {
        // Force a 404 header
        status_header( 404 );
        // Load your 404 template
        include( get_query_template( '404' ) );
        exit;
    }
});


// Add hreflang links for specific service pages
function di_infotech_output_service_hreflang() {
	if ( ! is_singular( 'services' ) ) {
		return;
	}

	$slug = get_post_field( 'post_name', get_queried_object_id() );
	if ( ! in_array( $slug, array( 'seo-services-in-usa', 'seo-company-in-india' ), true ) ) {
		return;
	}

	$usa_url   = home_url( '/services/seo-services-in-usa/' );
	$india_url = home_url( '/services/seo-company-in-india/' );
	$links     = array(
		'en-us'     => $usa_url,
		'en-in'     => $india_url,
		'en'        => $usa_url,
		'x-default' => $india_url,
	);

	foreach ( $links as $language => $url ) {
		printf( '<link rel="alternate" hreflang="%1$s" href="%2$s">' . "\n", esc_attr( $language ), esc_url( $url ) );
	}
}
add_action( 'wp_head', 'di_infotech_output_service_hreflang' );

// Editor labels and required fields for the service templates.
require_once get_template_directory() . '/inc/acf-service-editor.php';

/** Allow the performance CTA to link to a form on the current page. */
function di_infotech_performance_cta_field( $field ) {
	$field['type'] = 'text';
	$field['instructions'] = 'Enter a full http(s) URL or a page anchor such as #service-v2-hero-form.';
	return $field;
}
add_filter( 'acf/load_field/key=field_6777a4acfdf0a', 'di_infotech_performance_cta_field' );

/** Retain link validation while accepting same-page anchors. */
function di_infotech_validate_performance_cta( $valid, $value ) {
	if ( true !== $valid || '' === $value || null === $value ) {
		return $valid;
	}
	if ( ! is_string( $value ) ) {
		return 'Enter a full http(s) URL or a page anchor such as #service-v2-hero-form.';
	}
	$is_anchor = preg_match( '/^#[A-Za-z][A-Za-z0-9_:.-]*$/D', $value );
	$is_url = filter_var( $value, FILTER_VALIDATE_URL ) && in_array( strtolower( (string) wp_parse_url( $value, PHP_URL_SCHEME ) ), array( 'http', 'https' ), true );
	return ( $is_anchor || $is_url ) ? true : 'Enter a full http(s) URL or a page anchor such as #service-v2-hero-form.';
}
add_filter( 'acf/validate_value/key=field_6777a4acfdf0a', 'di_infotech_validate_performance_cta', 100, 2 );
