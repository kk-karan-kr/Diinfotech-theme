<?php

/**
 * Home page hero slider.
 *
 * @package DI_Infotech
 */

$di_infotech_slider_defaults = di_infotech_home_slider_defaults();
$di_infotech_slider_content  = function_exists( 'get_field' ) ? get_field( 'main_hero_slider', 'option' ) : array();
$di_infotech_slider_content  = is_array( $di_infotech_slider_content ) ? $di_infotech_slider_content : array();
$di_infotech_slider_page_title = ! empty( $di_infotech_slider_content['page_title'] ) ? $di_infotech_slider_content['page_title'] : $di_infotech_slider_defaults['page_title'];
$di_infotech_slider_aria_label = ! empty( $di_infotech_slider_content['aria_label'] ) ? $di_infotech_slider_content['aria_label'] : $di_infotech_slider_defaults['aria_label'];
$di_infotech_slider_autoplay   = ! empty( $di_infotech_slider_content['autoplay'] ) ? absint( $di_infotech_slider_content['autoplay'] ) : $di_infotech_slider_defaults['autoplay'];
$di_infotech_slides            = array();

foreach ( $di_infotech_slider_defaults['slides'] as $index => $default_slide ) {
    $slide_content = isset( $di_infotech_slider_content[ 'slide_' . ( $index + 1 ) ] ) && is_array( $di_infotech_slider_content[ 'slide_' . ( $index + 1 ) ] )
        ? $di_infotech_slider_content[ 'slide_' . ( $index + 1 ) ]
        : array();
    $slide = $default_slide;

    foreach ( array( 'title', 'accent', 'description', 'primary_text', 'primary_url', 'secondary_text', 'secondary_url' ) as $field ) {
        if ( ! empty( $slide_content[ $field ] ) ) {
            $slide[ $field ] = $slide_content[ $field ];
        }
    }

    $desktop_image = isset( $slide_content['desktop_image'] ) && is_array( $slide_content['desktop_image'] )
        ? $slide_content['desktop_image']
        : array();
    if ( ! empty( $desktop_image['url'] ) ) {
        $slide['image']     = $desktop_image['url'];
        $slide['image_alt'] = isset( $desktop_image['alt'] ) ? $desktop_image['alt'] : '';
        $slide['width']     = ! empty( $desktop_image['width'] ) ? absint( $desktop_image['width'] ) : $slide['width'];
        $slide['height']    = ! empty( $desktop_image['height'] ) ? absint( $desktop_image['height'] ) : $slide['height'];
    } else {
        $slide['image_alt'] = '';
    }

    $mobile_image = isset( $slide_content['mobile_image'] ) && is_array( $slide_content['mobile_image'] )
        ? $slide_content['mobile_image']
        : array();
    if ( ! empty( $mobile_image['url'] ) ) {
        $slide['mobile_image']  = $mobile_image['url'];
        $slide['mobile_width']  = ! empty( $mobile_image['width'] ) ? absint( $mobile_image['width'] ) : $slide['mobile_width'];
        $slide['mobile_height'] = ! empty( $mobile_image['height'] ) ? absint( $mobile_image['height'] ) : $slide['mobile_height'];
    }

    foreach ( array( 'mobile_art', 'mobile_cutout' ) as $field ) {
        if ( array_key_exists( $field, $slide_content ) ) {
            $slide[ $field ] = (bool) $slide_content[ $field ];
        }
    }

    $slide['title'] = nl2br( $slide['title'], false );
    $di_infotech_slides[] = $slide;
}

$di_infotech_total_slides = count($di_infotech_slides);
?>

<section class="di-hero-slider" aria-label="<?php echo esc_attr( $di_infotech_slider_aria_label ); ?>" data-autoplay="<?php echo esc_attr( $di_infotech_slider_autoplay ); ?>">
    <div class="di-hero-slider__slides">
        <?php foreach ($di_infotech_slides as $index => $slide) : ?>
            <?php
            $is_active = (0 === $index);
            $source_attribute = $is_active ? 'srcset' : 'data-srcset';
            ?>
            <article class="di-hero-slider__slide <?php echo esc_attr(trim(($is_active ? 'is-active ' : '') . (! empty($slide['mobile_art']) ? 'has-mobile-art ' : '') . (! empty($slide['mobile_cutout']) ? 'has-mobile-cutout' : ''))); ?>"
                aria-roledescription="slide"
                aria-label="<?php echo esc_attr('Slide ' . ($index + 1) . ' of ' . $di_infotech_total_slides); ?>"
                aria-hidden="<?php echo esc_attr($is_active ? 'false' : 'true'); ?>"
                <?php echo $is_active ? '' : 'inert'; ?>>
                <picture class="di-hero-slider__picture" data-no-lazy="1">
                    <?php if (di_infotech_slider_srcset($slide['mobile_image'])) : ?>
                        <source media="(max-width: 640px)" type="image/webp" sizes="100vw"
                            <?php echo $source_attribute; ?>="<?php echo esc_attr(di_infotech_slider_srcset($slide['mobile_image'])); ?>">
                    <?php endif; ?>
                    <?php if (! empty($slide['mobile_image'])) : ?>
                        <source media="(max-width: 640px)"
                            <?php echo $source_attribute; ?>="<?php echo esc_url($slide['mobile_image']); ?>"
                            width="<?php echo esc_attr($slide['mobile_width']); ?>"
                            height="<?php echo esc_attr($slide['mobile_height']); ?>">
                    <?php endif; ?>
                    <?php if (di_infotech_slider_srcset($slide['image'])) : ?>
                        <source type="image/webp" sizes="100vw" <?php echo $source_attribute; ?>="<?php echo esc_attr(di_infotech_slider_srcset($slide['image'])); ?>">
                    <?php endif; ?>
                    <img class="di-hero-slider__image" <?php echo $is_active ? 'src' : 'data-src'; ?>="<?php echo esc_url($slide['image']); ?>" alt="<?php echo esc_attr( $slide['image_alt'] ); ?>"
                        width="<?php echo esc_attr($slide['width']); ?>" height="<?php echo esc_attr($slide['height']); ?>"
                        loading="<?php echo esc_attr($is_active ? 'eager' : 'lazy'); ?>"
                        fetchpriority="<?php echo esc_attr($is_active ? 'high' : 'auto'); ?>" decoding="async" data-no-lazy="1">
                </picture>

                <div class="di-hero-slider__overlay"></div>

                <div class="di-hero-slider__content">
                    <?php if ($is_active) : ?>
                        <h1 class="di-hero-slider__page-title"><?php echo esc_html( $di_infotech_slider_page_title ); ?></h1>
                    <?php endif; ?>

                    <h2 class="di-hero-slider__title">
                        <?php echo wp_kses($slide['title'], array('br' => array())); ?>
                    </h2>

                    <p class="di-hero-slider__accent">
                        <?php echo esc_html($slide['accent']); ?>
                    </p>

                    <p class="di-hero-slider__description">
                        <?php echo esc_html($slide['description']); ?>
                    </p>

                    <div class="di-hero-slider__actions">
                        <a class="di-hero-slider__button di-hero-slider__button--primary"
                            href="<?php echo esc_url($slide['primary_url']); ?>">
                            <?php echo esc_html($slide['primary_text']); ?>
                        </a>

                        <a class="di-hero-slider__button di-hero-slider__button--secondary"
                            href="<?php echo esc_url($slide['secondary_url']); ?>">
                            <?php echo esc_html($slide['secondary_text']); ?>
                        </a>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>

        <div class="di-hero-slider__navigation" aria-label="Hero slider controls">
            <button class="di-hero-slider__arrow" type="button" data-di-slider-prev aria-label="Previous slide">
                <span aria-hidden="true">&larr;</span>
            </button>

            <button class="di-hero-slider__arrow" type="button" data-di-slider-next aria-label="Next slide">
                <span aria-hidden="true">&rarr;</span>
            </button>
        </div>

        <div class="di-hero-slider__dots" aria-label="Select a slide">
            <?php foreach ($di_infotech_slides as $index => $slide) : ?>
                <button type="button" class="di-hero-slider__dot <?php echo esc_attr(0 === $index ? 'is-active' : ''); ?>"
                    data-di-slider-go="<?php echo esc_attr($index); ?>"
                    aria-label="<?php echo esc_attr('Show slide ' . ($index + 1)); ?>"
                    aria-current="<?php echo esc_attr(0 === $index ? 'true' : 'false'); ?>"></button>
            <?php endforeach; ?>
        </div>
    </div>
</section>
