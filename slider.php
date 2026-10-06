<?php

/**
 * Home page hero slider.
 *
 * @package DI_Infotech
 */

$di_infotech_slider_images = get_template_directory_uri() . '/assets/img/slider/';

$di_infotech_slides = array(
    array(
        'image'          => $di_infotech_slider_images . 'lead-orbit-desktop.jpeg',
        'mobile_image'   => $di_infotech_slider_images . 'lead-orbit-mobile.png',
        'mobile_width'   => 1129,
        'mobile_height'  => 1393,
        'mobile_art'     => true,
        'width'          => 1800,
        'height'         => 656,
        'title'          => 'Grow Faster With<br>Lead Orbit',
        'accent'         => 'Growth Strategy Call',
        'description'    => 'Identify what is holding your business back and build the right digital plan before spending more on marketing.',
        'primary_text'   => 'Explore Lead Orbit',
        'primary_url'    => home_url('/lead-orbit-detailed/'),
        'secondary_text' => 'Contact Us',
        'secondary_url'  => home_url('/contact/'),
    ),
    array(
        'image'          => $di_infotech_slider_images . 'web-development-desktop.jpeg',
        'mobile_image'   => $di_infotech_slider_images . 'web-development-mobile.png',
        'mobile_width'   => 1213,
        'mobile_height'  => 1297,
        'mobile_art'     => true,
        'mobile_cutout'  => true,
        'width'          => 1800,
        'height'         => 656,
        'title'          => 'Build Websites That<br>Convert Visitors',
        'accent'         => 'Web Development',
        'description'    => 'Custom websites, WordPress builds, Shopify stores, AI automation, and AI integrations designed for speed, clarity, and conversion.',
        'primary_text'   => 'Start a Project',
        'primary_url'    => home_url('/contact/'),
        'secondary_text' => 'Explore Web Development',
        'secondary_url'  => home_url('/services/website-development-company-in-india/'),
    ),
    array(
        'image'          => $di_infotech_slider_images . 'seo-services-desktop.jpeg',
        'mobile_image'   => $di_infotech_slider_images . 'seo-services-mobile.png',
        'mobile_width'   => 770,
        'mobile_height'  => 950,
        'mobile_art'     => true,
        'mobile_cutout'  => true,
        'width'          => 1800,
        'height'         => 656,
        'title'          => 'Rank Higher and<br>Win Better Leads',
        'accent'         => 'SEO Services',
        'description'    => 'Search-led growth campaigns for businesses that need better visibility, stronger traffic, and qualified enquiries.',
        'primary_text'   => 'Get SEO Help',
        'primary_url'    => home_url('/contact/'),
        'secondary_text' => 'See SEO Services',
        'secondary_url'  => home_url('/services/seo-company-in-india/'),
    ),
    array(
        'image'          => $di_infotech_slider_images . 'performance-marketing-desktop.jpeg',
        'mobile_image'   => $di_infotech_slider_images . 'performance-marketing-mobile.png',
        'mobile_width'   => 770,
        'mobile_height'  => 950,
        'mobile_art'     => true,
        'mobile_cutout'  => true,
        'width'          => 1800,
        'height'         => 656,
        'title'          => 'Scale Smarter With<br>Performance Marketing',
        'accent'         => 'Performance Marketing',
        'description'    => 'Turn paid campaigns, conversion data, and clear reporting into measurable and sustainable business growth.',
        'primary_text'   => 'Talk to an Expert',
        'primary_url'    => home_url('/contact/'),
        'secondary_text' => 'Explore Services',
        'secondary_url'  => home_url('/services/performance-marketing-agency/'),
    ),
    array(
        'image'          => $di_infotech_slider_images . 'social-media-marketing-desktop.png',
        'mobile_image'   => $di_infotech_slider_images . 'social-media-marketing-mobile.png',
        'mobile_width'   => 738,
        'mobile_height'  => 922,
        'mobile_art'     => true,
        'mobile_cutout'  => true,
        'width'          => 2078,
        'height'         => 757,
        'title'          => 'Turn Social Reach<br>Into Brand Demand',
        'accent'         => 'Social Media Marketing',
        'description'    => 'Build consistent campaigns, stronger content, and audience engagement that supports real business goals.',
        'primary_text'   => 'Plan My Social Growth',
        'primary_url'    => home_url('/contact/'),
        'secondary_text' => 'Explore Social Media',
        'secondary_url'  => home_url('/services/social-media-marketing-agency-in-delhi/'),
    ),
);

$di_infotech_total_slides = count($di_infotech_slides);
?>

<section class="di-hero-slider" aria-label="DI Infotech featured services" data-autoplay="6500">
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
                    <img class="di-hero-slider__image" <?php echo $is_active ? 'src' : 'data-src'; ?>="<?php echo esc_url($slide['image']); ?>" alt=""
                        width="<?php echo esc_attr($slide['width']); ?>" height="<?php echo esc_attr($slide['height']); ?>"
                        loading="<?php echo esc_attr($is_active ? 'eager' : 'lazy'); ?>"
                        fetchpriority="<?php echo esc_attr($is_active ? 'high' : 'auto'); ?>" decoding="async" data-no-lazy="1">
                </picture>

                <div class="di-hero-slider__overlay"></div>

                <div class="di-hero-slider__content">
                    <?php if ($is_active) : ?>
                        <h1 class="di-hero-slider__page-title">Best Digital Marketing Company in Delhi</h1>
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
