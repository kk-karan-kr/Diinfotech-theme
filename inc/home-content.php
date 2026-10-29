<?php
/**
 * Homepage content defaults and editable ACF fields.
 *
 * @package DI_Infotech
 */

function di_infotech_home_slider_defaults() {
	$images = get_template_directory_uri() . '/assets/img/slider/';

	return array(
		'page_title' => 'Best Digital Marketing Company in Delhi',
		'aria_label' => 'DI Infotech featured services',
		'autoplay'   => 6500,
		'slides'     => array(
			array(
				'image'          => $images . 'lead-orbit-desktop.jpeg',
				'mobile_image'   => $images . 'lead-orbit-mobile.png',
				'mobile_width'   => 1129,
				'mobile_height'  => 1393,
				'mobile_art'     => true,
				'mobile_cutout'  => false,
				'width'          => 1800,
				'height'         => 656,
				'title'          => "Grow Faster With\nLead Orbit",
				'accent'         => 'Growth Strategy Call',
				'description'    => 'Identify what is holding your business back and build the right digital plan before spending more on marketing.',
				'primary_text'   => 'Explore Lead Orbit',
				'primary_url'    => home_url( '/lead-orbit-detailed/' ),
				'secondary_text' => 'Contact Us',
				'secondary_url'  => home_url( '/contact/' ),
			),
			array(
				'image'          => $images . 'web-development-desktop.jpeg',
				'mobile_image'   => $images . 'web-development-mobile.png',
				'mobile_width'   => 1213,
				'mobile_height'  => 1297,
				'mobile_art'     => true,
				'mobile_cutout'  => true,
				'width'          => 1800,
				'height'         => 656,
				'title'          => "Build Websites That\nConvert Visitors",
				'accent'         => 'Web Development',
				'description'    => 'Custom websites, WordPress builds, Shopify stores, AI automation, and AI integrations designed for speed, clarity, and conversion.',
				'primary_text'   => 'Start a Project',
				'primary_url'    => home_url( '/contact/' ),
				'secondary_text' => 'Explore Web Development',
				'secondary_url'  => home_url( '/services/website-development-company-in-india/' ),
			),
			array(
				'image'          => $images . 'seo-services-desktop.jpeg',
				'mobile_image'   => $images . 'seo-services-mobile.png',
				'mobile_width'   => 770,
				'mobile_height'  => 950,
				'mobile_art'     => true,
				'mobile_cutout'  => true,
				'width'          => 1800,
				'height'         => 656,
				'title'          => "Rank Higher and\nWin Better Leads",
				'accent'         => 'SEO Services',
				'description'    => 'Search-led growth campaigns for businesses that need better visibility, stronger traffic, and qualified enquiries.',
				'primary_text'   => 'Get SEO Help',
				'primary_url'    => home_url( '/contact/' ),
				'secondary_text' => 'See SEO Services',
				'secondary_url'  => home_url( '/services/seo-company-in-india/' ),
			),
			array(
				'image'          => $images . 'performance-marketing-desktop.jpeg',
				'mobile_image'   => $images . 'performance-marketing-mobile.png',
				'mobile_width'   => 770,
				'mobile_height'  => 950,
				'mobile_art'     => true,
				'mobile_cutout'  => true,
				'width'          => 1800,
				'height'         => 656,
				'title'          => "Scale Smarter With\nPerformance Marketing",
				'accent'         => 'Performance Marketing',
				'description'    => 'Turn paid campaigns, conversion data, and clear reporting into measurable and sustainable business growth.',
				'primary_text'   => 'Talk to an Expert',
				'primary_url'    => home_url( '/contact/' ),
				'secondary_text' => 'Explore Services',
				'secondary_url'  => home_url( '/services/performance-marketing-agency/' ),
			),
			array(
				'image'          => $images . 'social-media-marketing-desktop.png',
				'mobile_image'   => $images . 'social-media-marketing-mobile.png',
				'mobile_width'   => 738,
				'mobile_height'  => 922,
				'mobile_art'     => true,
				'mobile_cutout'  => true,
				'width'          => 2078,
				'height'         => 757,
				'title'          => "Turn Social Reach\nInto Brand Demand",
				'accent'         => 'Social Media Marketing',
				'description'    => 'Build consistent campaigns, stronger content, and audience engagement that supports real business goals.',
				'primary_text'   => 'Plan My Social Growth',
				'primary_url'    => home_url( '/contact/' ),
				'secondary_text' => 'Explore Social Media',
				'secondary_url'  => home_url( '/services/social-media-marketing-agency-in-delhi/' ),
			),
		),
	);
}

function di_infotech_lead_orbit_defaults() {
	return array(
		'label'          => 'Growth Strategy Call',
		'heading'        => 'Lead Orbit Model',
		'description'    => 'A founder-led Growth Strategy Call to identify what is holding your business back before you spend more on the wrong marketing solution.',
		'highlight_1'    => 'Lead-to-sale clarity',
		'highlight_2'    => 'Ad ROI diagnosis',
		'highlight_3'    => 'Clear next steps',
		'button_text'    => 'Explore Lead Orbit Model',
		'button_url'     => home_url( '/lead-orbit/' ),
		'note'           => 'Refundable ₹199 consultation fee. Details available on the dedicated page.',
		'card_label'     => 'Growth Call Framework',
		'card_heading'   => 'What we clarify with you',
		'framework_1'    => array(
			'number'      => '01',
			'description' => 'Understand your business model, funnel, goals and current marketing activity.',
		),
		'framework_2'    => array(
			'number'      => '02',
			'description' => 'Identify where leads, traffic, ads or website experience are losing value.',
		),
		'framework_3'    => array(
			'number'      => '03',
			'description' => 'Map the highest-impact growth opportunities across your digital ecosystem.',
		),
		'framework_4'    => array(
			'number'      => '04',
			'description' => 'Recommend a focused direction so your next move is practical and measurable.',
		),
	);
}

function di_infotech_home_content_merge( $defaults, $values ) {
	foreach ( $defaults as $key => $default ) {
		if ( ! is_array( $values ) || ! array_key_exists( $key, $values ) || null === $values[ $key ] || '' === $values[ $key ] || array() === $values[ $key ] ) {
			continue;
		}

		if ( is_array( $default ) && is_array( $values[ $key ] ) ) {
			$defaults[ $key ] = di_infotech_home_content_merge( $default, $values[ $key ] );
		} else {
			$defaults[ $key ] = $values[ $key ];
		}
	}

	return $defaults;
}

function di_infotech_register_home_content_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	$slider_defaults = di_infotech_home_slider_defaults();
	$hero_fields     = array(
		array(
			'key'           => 'field_home_hero_page_title',
			'label'         => 'Page Title (H1)',
			'name'          => 'page_title',
			'type'          => 'text',
			'default_value' => $slider_defaults['page_title'],
		),
		array(
			'key'           => 'field_home_hero_aria_label',
			'label'         => 'Slider Accessibility Label',
			'name'          => 'aria_label',
			'type'          => 'text',
			'default_value' => $slider_defaults['aria_label'],
		),
		array(
			'key'           => 'field_home_hero_autoplay',
			'label'         => 'Slide Duration (milliseconds)',
			'name'          => 'autoplay',
			'type'          => 'number',
			'default_value' => $slider_defaults['autoplay'],
			'min'           => 1000,
			'step'          => 500,
		),
	);

	foreach ( $slider_defaults['slides'] as $index => $slide ) {
		$slide_number = $index + 1;
		$slide_key    = 'field_home_hero_slide_' . $slide_number . '_';
		$title        = str_replace( '<br>', "\n", $slide['title'] );

		$hero_fields[] = array(
			'key'        => $slide_key . 'group',
			'label'      => 'Slide ' . $slide_number,
			'name'       => 'slide_' . $slide_number,
			'type'       => 'group',
			'layout'     => 'block',
			'sub_fields' => array(
				array(
					'key'           => $slide_key . 'title',
					'label'         => 'Title',
					'name'          => 'title',
					'type'          => 'textarea',
					'rows'          => 2,
					'default_value' => $title,
					'instructions'  => 'Use a new line to split the title across lines.',
				),
				array(
					'key'           => $slide_key . 'accent',
					'label'         => 'Accent',
					'name'          => 'accent',
					'type'          => 'text',
					'default_value' => $slide['accent'],
				),
				array(
					'key'           => $slide_key . 'description',
					'label'         => 'Description',
					'name'          => 'description',
					'type'          => 'textarea',
					'rows'          => 3,
					'default_value' => $slide['description'],
				),
				array(
					'key'           => $slide_key . 'primary_text',
					'label'         => 'Primary Button Text',
					'name'          => 'primary_text',
					'type'          => 'text',
					'default_value' => $slide['primary_text'],
				),
				array(
					'key'           => $slide_key . 'primary_url',
					'label'         => 'Primary Button URL',
					'name'          => 'primary_url',
					'type'          => 'url',
					'default_value' => $slide['primary_url'],
				),
				array(
					'key'           => $slide_key . 'secondary_text',
					'label'         => 'Secondary Button Text',
					'name'          => 'secondary_text',
					'type'          => 'text',
					'default_value' => $slide['secondary_text'],
				),
				array(
					'key'           => $slide_key . 'secondary_url',
					'label'         => 'Secondary Button URL',
					'name'          => 'secondary_url',
					'type'          => 'url',
					'default_value' => $slide['secondary_url'],
				),
				array(
					'key'           => $slide_key . 'desktop_image',
					'label'         => 'Desktop Image',
					'name'          => 'desktop_image',
					'type'          => 'image',
					'instructions'  => 'Optional. Leave empty to keep the current desktop image.',
					'return_format' => 'array',
					'preview_size'  => 'medium',
					'library'       => 'all',
				),
				array(
					'key'           => $slide_key . 'mobile_image',
					'label'         => 'Mobile Image',
					'name'          => 'mobile_image',
					'type'          => 'image',
					'instructions'  => 'Optional. Leave empty to keep the current mobile image.',
					'return_format' => 'array',
					'preview_size'  => 'medium',
					'library'       => 'all',
				),
				array(
					'key'           => $slide_key . 'mobile_art',
					'label'         => 'Use Mobile Artwork Styling',
					'name'          => 'mobile_art',
					'type'          => 'true_false',
					'ui'            => 1,
					'default_value' => $slide['mobile_art'],
				),
				array(
					'key'           => $slide_key . 'mobile_cutout',
					'label'         => 'Use Mobile Cutout Styling',
					'name'          => 'mobile_cutout',
					'type'          => 'true_false',
					'ui'            => 1,
					'default_value' => $slide['mobile_cutout'],
				),
			),
		);
	}

	$lead_defaults = di_infotech_lead_orbit_defaults();
	$lead_fields   = array(
		array( 'key' => 'field_home_orbit_label', 'label' => 'Section Label', 'name' => 'label', 'type' => 'text', 'default_value' => $lead_defaults['label'] ),
		array( 'key' => 'field_home_orbit_heading', 'label' => 'Heading', 'name' => 'heading', 'type' => 'text', 'default_value' => $lead_defaults['heading'] ),
		array( 'key' => 'field_home_orbit_description', 'label' => 'Description', 'name' => 'description', 'type' => 'textarea', 'rows' => 3, 'default_value' => $lead_defaults['description'] ),
		array( 'key' => 'field_home_orbit_highlight_1', 'label' => 'Highlight 1', 'name' => 'highlight_1', 'type' => 'text', 'default_value' => $lead_defaults['highlight_1'] ),
		array( 'key' => 'field_home_orbit_highlight_2', 'label' => 'Highlight 2', 'name' => 'highlight_2', 'type' => 'text', 'default_value' => $lead_defaults['highlight_2'] ),
		array( 'key' => 'field_home_orbit_highlight_3', 'label' => 'Highlight 3', 'name' => 'highlight_3', 'type' => 'text', 'default_value' => $lead_defaults['highlight_3'] ),
		array( 'key' => 'field_home_orbit_button_text', 'label' => 'Button Text', 'name' => 'button_text', 'type' => 'text', 'default_value' => $lead_defaults['button_text'] ),
		array( 'key' => 'field_home_orbit_button_url', 'label' => 'Button URL', 'name' => 'button_url', 'type' => 'url', 'default_value' => $lead_defaults['button_url'] ),
		array( 'key' => 'field_home_orbit_note', 'label' => 'Note', 'name' => 'note', 'type' => 'textarea', 'rows' => 2, 'default_value' => $lead_defaults['note'] ),
		array( 'key' => 'field_home_orbit_card_label', 'label' => 'Framework Label', 'name' => 'card_label', 'type' => 'text', 'default_value' => $lead_defaults['card_label'] ),
		array( 'key' => 'field_home_orbit_card_heading', 'label' => 'Framework Heading', 'name' => 'card_heading', 'type' => 'text', 'default_value' => $lead_defaults['card_heading'] ),
	);

	foreach ( range( 1, 4 ) as $point_number ) {
		$point_key       = 'framework_' . $point_number;
		$point_field_key = 'field_home_orbit_' . $point_key;
		$lead_fields[]   = array(
			'key'        => $point_field_key,
			'label'      => 'Framework Point ' . $point_number,
			'name'       => $point_key,
			'type'       => 'group',
			'layout'     => 'block',
			'sub_fields' => array(
				array(
					'key'           => $point_field_key . '_number',
					'label'         => 'Number',
					'name'          => 'number',
					'type'          => 'text',
					'default_value' => $lead_defaults[ $point_key ]['number'],
				),
				array(
					'key'           => $point_field_key . '_description',
					'label'         => 'Description',
					'name'          => 'description',
					'type'          => 'textarea',
					'rows'          => 2,
					'default_value' => $lead_defaults[ $point_key ]['description'],
				),
			),
		);
	}

	acf_add_local_field_group(
		array(
			'key'      => 'group_home_hero_lead_orbit',
			'title'    => 'Home Page Hero Slider and Lead Orbit',
			'fields'   => array(
				array(
					'key'        => 'field_home_main_hero_slider',
					'label'      => 'Main Hero Slider',
					'name'       => 'main_hero_slider',
					'type'       => 'group',
					'layout'     => 'block',
					'sub_fields' => $hero_fields,
				),
				array(
					'key'        => 'field_home_lead_orbit_model',
					'label'      => 'Lead Orbit Model',
					'name'       => 'lead_orbit_model',
					'type'       => 'group',
					'layout'     => 'block',
					'sub_fields' => $lead_fields,
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'options_page',
						'operator' => '==',
						'value'    => 'acf-options-home-page',
					),
				),
			),
			'position' => 'normal',
			'style'    => 'default',
			'active'   => true,
		)
	);
}
add_action( 'acf/init', 'di_infotech_register_home_content_fields' );
