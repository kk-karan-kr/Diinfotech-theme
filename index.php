<?php
/* Template Name: home */

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DI_Infotech
 */

get_header();
?>


<?php get_template_part('slider'); ?>

<!-- Lead Orbit section start  -->
<section class="lead_orbit_model padding_top_bottom margin_top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-sm-6" data-aos="fade-right" data-aos-delay=".5s" data-aos-duration="1800">
                <div class="lead_orbit_content">
                    <span class="lead_orbit_label">Growth Strategy Call</span>
                    <div class="heading">
                        <h2>Lead Orbit Model</h2>
                    </div>
                    <div class="sub_pera">
                        <p>A founder-led Growth Strategy Call to identify what is holding your business back before you
                            spend more on the wrong marketing solution.</p>
                    </div>
                    <div class="lead_orbit_highlights">
                        <span><i class="fa-solid fa-check"></i> Lead-to-sale clarity</span>
                        <span><i class="fa-solid fa-check"></i> Ad ROI diagnosis</span>
                        <span><i class="fa-solid fa-check"></i> Clear next steps</span>
                    </div>
                    <div class="main_btn">
                        <a class="bg_yellow" href="<?php echo esc_url(home_url('/lead-orbit/')); ?>">Explore Lead Orbit Model
                            <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                    <p class="lead_orbit_note">Refundable &#8377;199 consultation fee. Details available on the
                        dedicated page.</p>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6" data-aos="fade-left" data-aos-delay=".5s" data-aos-duration="1800">
                <div class="lead_orbit_card">
                    <div class="lead_orbit_card_head">
                        <span>Growth Call Framework</span>
                        <h3>What we clarify with you</h3>
                    </div>
                    <ul>
                        <li>
                            <span>01</span>
                            <p>Understand your business model, funnel, goals and current marketing activity.</p>
                        </li>
                        <li>
                            <span>02</span>
                            <p>Identify where leads, traffic, ads or website experience are losing value.</p>
                        </li>
                        <li>
                            <span>03</span>
                            <p>Map the highest-impact growth opportunities across your digital ecosystem.</p>
                        </li>
                        <li>
                            <span>04</span>
                            <p>Recommend a focused direction so your next move is practical and measurable.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Lead Orbit section end  -->


<!-- our work section start  -->
<?php if (have_rows('our_work', 'option')) : ?>
    <?php while (have_rows('our_work', 'option')) : the_row(); ?>
        <section class="our_work margin_top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <div class="heading " data-aos="fade-right" data-aos-delay=".5s" data-aos-duration="2000">
                            <h2><?php the_sub_field('heading'); ?></h2>
                            <div class="sub_pera">
                                <p> <?php the_sub_field('description_'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-container">
                <div class="our_work_slider owl-carousel">
                    <?php if (have_rows('our_works')) : ?>
                        <?php while (have_rows('our_works')) : the_row(); ?>
                            <div class="work_wrp" data-aos="fade-left" data-aos-delay=".5s" data-aos-duration="1200">
                                <?php $image = get_sub_field('image'); ?>
                                <?php if ($image) : ?>
<?php echo di_infotech_image( $image, 'di-card', array(  ) ); ?>
                                <?php endif; ?>

                            </div>

                        <?php endwhile; ?>
                    <?php else : ?>
                        <?php // no rows found 
                        ?>
                    <?php endif; ?>

                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>
<!-- our work section end  -->

<!-- Website Development CTA section start  -->
<section class="home_service_cta home_service_cta_web margin_top">
    <div class="container">
        <div class="home_service_cta_inner" data-aos="fade-up" data-aos-delay=".3s" data-aos-duration="1400">
            <div class="home_service_cta_content">
                <span class="home_service_cta_label">Website Development</span>
                <h2>Need a website that looks sharp and converts better?</h2>
                <p>We build fast, responsive websites for service businesses, ecommerce brands, and growth-focused
                    companies.</p>
            </div>
            <div class="home_service_cta_action">
                <a href="<?php echo esc_url(home_url('/services/website-development-company-in-india/')); ?>">Explore
                    Website Development <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>
<!-- Website Development CTA section end  -->


<!-- brand section start  -->
<?php if (have_rows('our_valuable_brands', 'option')) : ?>
    <?php while (have_rows('our_valuable_brands', 'option')) : the_row(); ?>
        <section class="brands margin_top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading text-center " data-aos="zoom-in" data-aos-delay=".3s" data-aos-duration="1500">
                            <h2><?php the_sub_field('heading'); ?></h2>
                            <?php the_sub_field('discription'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <?php if (have_rows('our_brands')) : ?>
                        <?php while (have_rows('our_brands')) : the_row(); ?>
                            <div class="col-lg-2 col-sm-2 col-xs-6">
                                <div class="brand_img" data-aos="fade-up" data-aos-delay=".5s" data-aos-duration="1200">
                                    <?php $brands_logo = get_sub_field('brands_logo'); ?>
                                    <?php if ($brands_logo) : ?>
<?php echo di_infotech_image( $brands_logo, 'di-logo', array( 'sizes' => '(max-width: 767px) 100px, 160px' ) ); ?>
                                    <?php endif; ?>

                                </div>

                            </div>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <?php // no rows found 
                        ?>
                    <?php endif; ?>

                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>
<!-- brand section end  -->



<!-- Our expertise section start  -->
<?php if (have_rows('our_expertise', 'option')) : ?>
    <?php while (have_rows('our_expertise', 'option')) : the_row(); ?>
        <section class="our_expertise margin_top bg_black padding_top_bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading " data-aos="fade-right" data-aos-delay=".5s" data-aos-duration="1000">
                            <h2 class="text-white"><?php the_sub_field('heading'); ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-7 col-sm-7">
                        <div class="row_inner accordion_wrp">
                            <?php if (have_rows('our_expertise_are')) : ?>
                                <?php while (have_rows('our_expertise_are')) : the_row(); ?>

                                    <div class="accordion_new" data-aos="fade-right" data-aos-delay=".5s" data-aos-duration="1200">
                                        <div class="numeric_number">
                                            <p><?php the_sub_field('no_of_expertise'); ?></p>
                                        </div>
                                        <div class="accordion_intro">
                                            <div class="accordion_flex">

                                                <h3><?php the_sub_field('expertise_heading'); ?></h3>

                                            </div>

                                            <div class="accordion_content">
                                                <?php $expertise_image = get_sub_field('expertise_image'); ?>
                                                <?php if ($expertise_image) : ?>
<?php echo di_infotech_image( $expertise_image, 'di-card', array( 'class' => 'accordion_image' ) ); ?>
                                                <?php endif; ?>

                                                <div class="expertise_pera">
                                                    <p><?php the_sub_field('expertise_description'); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="circle_arrow">

                                            <?php $expertise_page_url = get_sub_field('expertise_page_url'); ?>
                                            <?php if ($expertise_page_url) : ?>
                                                <a href="<?php echo esc_url($expertise_page_url['url']); ?>"
                                                    target="<?php echo esc_attr($expertise_page_url['target']); ?>"><i
                                                        class="fa-solid fa-arrow-right"> </i></a>
                                            <?php endif; ?>





                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php else : ?>
                                <?php // no rows found 
                                ?>
                            <?php endif; ?>





                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-5">
                        <div class="row_inner accordion_images" data-aos="zoom-in" data-aos-delay=".5s"
                            data-aos-duration="2000">
                            <?php if (have_rows('our_expertise_are')) : ?>
                                <?php while (have_rows('our_expertise_are')) : the_row(); ?>

                                    <?php $expertise_image = get_sub_field('expertise_image'); ?>
                                    <?php if ($expertise_image) : ?>
<?php echo di_infotech_image( $expertise_image, 'di-card', array(  ) ); ?>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            <?php else : ?>
                                <?php // no rows found 
                                ?>
                            <?php endif; ?>





                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>
<!-- Our expertise section end  -->


<!-- Guaranteed Growth section start  -->
<?php if (have_rows('guaranteed_growth', 'option')) : ?>
    <?php while (have_rows('guaranteed_growth', 'option')) : the_row(); ?>
        <section class="guaranteed_growth margin_top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-6" data-aos="fade-right" data-aos-delay=".5s" data-aos-duration="2000">
                        <div class="heading">
                            <h2><?php the_sub_field('heading'); ?></span></h2>
                            <div class="sub_pera">
                                <?php the_sub_field('description'); ?>


                            </div>
                        </div>
                        <div class="main_btn ">

                            <?php $learn_more_url = get_sub_field('learn_more_url'); ?>
                            <?php if ($learn_more_url) : ?>
                                <a class="bg_yellow" href="<?php echo esc_url($learn_more_url); ?>">Learn More <i
                                        class="fa-solid fa-arrow-right"></i></a>
                            <?php endif; ?>

                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6" data-aos="fade-left" data-aos-delay=".5s" data-aos-duration="2200">
                        <div class="guarantee_growth">
                            <?php $guaranteed_growth_image = get_sub_field('guaranteed_growth_image'); ?>
                            <?php if ($guaranteed_growth_image) : ?>
<?php echo di_infotech_image( $guaranteed_growth_image, 'di-card', array( 'class' => 'big_graph' ) ); ?>
                            <?php endif; ?>


                            <div class="small_graph">
                                <?php $guaranteed_growth_small_image1 = get_sub_field('guaranteed_growth_small_image1'); ?>
                                <?php if ($guaranteed_growth_small_image1) : ?>
<?php echo di_infotech_image( $guaranteed_growth_small_image1, 'di-card', array(  ) ); ?>
                                <?php endif; ?>
                                <?php $guaranteed_growth_small_image2 = get_sub_field('guaranteed_growth_small_image2'); ?>
                                <?php if ($guaranteed_growth_small_image2) : ?>
<?php echo di_infotech_image( $guaranteed_growth_small_image2, 'di-card', array(  ) ); ?>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>
<!-- Guaranteed Growth section end  -->

<!-- Social Media Marketing CTA section start  -->
<section class="home_service_cta home_service_cta_social margin_top">
    <div class="container">
        <div class="home_service_cta_inner" data-aos="fade-up" data-aos-delay=".3s" data-aos-duration="1400">
            <div class="home_service_cta_content">
                <span class="home_service_cta_label">Social Media Marketing</span>
                <h2>Turn social presence into brand demand.</h2>
                <p>Plan campaigns, improve content consistency, and build social media activity that supports real
                    business goals.</p>
            </div>
            <div class="home_service_cta_action">
                <a href="<?php echo esc_url(home_url('/services/social-media-marketing-agency-in-delhi/')); ?>">Explore
                    Social Media Marketing <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>
<!-- Social Media Marketing CTA section end  -->

<!-- More services section start  -->
<?php if (have_rows('more_services_section', 'option')) : ?>
    <?php while (have_rows('more_services_section', 'option')) : the_row(); ?>
        <section class="more_services margin_top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading" data-aos="fade-right" data-aos-delay=".1s" data-aos-duration="1200">
                            <h2><?php the_sub_field('heading'); ?></h2>
                            <?php the_sub_field('discription'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php if (have_rows('more_services_are')) : ?>
                        <?php while (have_rows('more_services_are')) : the_row(); ?>
                            <div class="col-lg-6 col-sm-6" data-aos="fade-right" data-aos-delay=".5s" data-aos-duration="1500">
                                <div class="services_wrp">
                                    <div class="service_child">
                                        <h3><?php the_sub_field('service_heading'); ?></h3>
                                        <p><?php the_sub_field('service_short_descriptions'); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <?php // no rows found 
                        ?>
                    <?php endif; ?>

                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>
<!-- More services section end  -->




<!-- Attract Customers section start  -->
<?php if (have_rows('attract_customers', 'option')) : ?>
    <?php while (have_rows('attract_customers', 'option')) : the_row(); ?>
        <section class="guaranteed_growth attract margin_top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-sm-7" data-aos="fade-up" data-aos-delay=".5s" data-aos-duration="2000">
                        <div class="heading">
                            <h2><?php the_sub_field('heading'); ?></h2>

                            <div class="sub_pera">
                                <p><?php the_sub_field('discriptions'); ?></p>
                            </div>
                        </div>
                        <div class="main_btn ">

                            <?php $read_more_url = get_sub_field('read_more_url'); ?>
                            <?php if ($read_more_url) : ?>
                                <a class="bg_none" href="<?php echo esc_url($read_more_url); ?>">Explore Ecommerce Growth <i
                                        class="fa-solid fa-arrow-right"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-5" data-aos="fade-down" data-aos-delay=".5s" data-aos-duration="3000">
                        <div class="guarantee_growth">
                            <?php $image = get_sub_field('image'); ?>
                            <?php if ($image) : ?>
<?php echo di_infotech_image( $image, 'di-card', array(  ) ); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>
<!-- Attract Customers section end  -->




<!-- our clients section start  -->
<?php if (have_rows('our_testimonials', 'option')) : ?>
    <?php while (have_rows('our_testimonials', 'option')) : the_row(); ?>
        <section class="our_clients bg_black padding_top_bottom margin_top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading" data-aos="fade-right" data-aos-delay=".5s" data-aos-duration="1500">
                            <h2><?php the_sub_field('heading'); ?></h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="client_slider owl-carousel">
                <?php if (have_rows('valuable_testimonials')) : ?>
                    <?php while (have_rows('valuable_testimonials')) : the_row(); ?>
                        <div class="client_wrp" data-aos="fade-right" data-aos-delay=".5s" data-aos-duration="1500">
                            <div class="client_heading">
                                <h3><?php the_sub_field('heading'); ?></h3>
                                <p><?php the_sub_field('description'); ?></p>
                            </div>
                            <div class="clients_details">
                                <div class="user_img">
                                    <?php $user_image = get_sub_field('user_image'); ?>
                                    <?php if ($user_image) : ?>
<?php echo di_infotech_image( $user_image, 'di-card', array(  ) ); ?>
                                    <?php endif; ?>
                                </div>
                                <div class="user_name">
                                    <p><?php the_sub_field('user_name'); ?></p>
                                    <span><?php the_sub_field('user_designation'); ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else : ?>
                    <?php // no rows found 
                    ?>
                <?php endif; ?>

            </div>

        </section>
    <?php endwhile; ?>
<?php endif; ?>
<!-- our clients section end  -->

<!-- Attract Customers section start  -->
<?php if (have_rows('attract_customers_section', 'option')) : ?>
    <?php while (have_rows('attract_customers_section', 'option')) : the_row(); ?>
        <section class="attract_customer margin_top Mb-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-9 col-sm-9">
                        <div class="heading text-center" data-aos="zoom-in" data-aos-delay=".5s" data-aos-duration="2000">
                            <h2><?php the_sub_field('heading'); ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-11 col-sm-12">
                        <div class="row">
                            <?php if (have_rows('services_are')) : ?>
                                <?php while (have_rows('services_are')) : the_row(); ?>
                                    <div class="col-lg-6 col-sm-6" data-aos="fade-right" data-aos-delay=".5s" data-aos-duration="1500">
                                        <div class="attract_wrp">
                                            <div class="attract_icon">
                                                <?php $icon = get_sub_field('icon'); ?>
                                                <?php if ($icon) : ?>
<?php echo di_infotech_image( $icon, 'di-logo', array( 'sizes' => '(max-width: 767px) 100px, 160px' ) ); ?>
                                                <?php endif; ?>

                                            </div>
                                            <div class="attract_heading">
                                                <h3> <?php the_sub_field('heading'); ?></h3>
                                                <p><?php the_sub_field('description'); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php else : ?>
                                <?php // no rows found 
                                ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>

<!-- Performance Marketing CTA section start  -->
<section class="home_service_cta home_service_cta_performance margin_top">
    <div class="container">
        <div class="home_service_cta_inner" data-aos="fade-up" data-aos-delay=".3s" data-aos-duration="1400">
            <div class="home_service_cta_content">
                <span class="home_service_cta_label">Performance Marketing</span>
                <h2>Need campaigns that bring measurable enquiries?</h2>
                <p>Run focused Google and Meta campaigns with sharper targeting, clearer reporting, and better lead quality.</p>
            </div>
            <div class="home_service_cta_action">
                <a href="<?php echo esc_url(home_url('/services/performance-marketing-agency/')); ?>">Explore Performance Marketing <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>
<!-- Performance Marketing CTA section end  -->

<!-- strategic creative section start  -->
<?php if (have_rows('about_us_section', 'option')) : ?>
    <?php while (have_rows('about_us_section', 'option')) : the_row(); ?>
        <section class="strategic_creative padding_top_bottom grey-bg margin_top">
            <div class="container">
                <div class="row flex_direction align-items-center">
                    <div class="col-lg-6 col-sm-6" data-aos="fade-down" data-aos-delay=".5s" data-aos-duration="3000">
                        <div class="team">
                            <?php $about_us_image = get_sub_field('about_us_image'); ?>
                            <?php if ($about_us_image) : ?>
<?php echo di_infotech_image( $about_us_image, 'di-card', array(  ) ); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="heading">
                            <h2 data-aos="fade-left" data-aos-delay=".5s" data-aos-duration="1200">
                                <?php the_sub_field('heading'); ?> </h2>

                            <div class="sub_pera">
                                <?php the_sub_field('detail_description'); ?>
                            </div>
                            <div class="main_btn " data-aos="fade-left" data-aos-delay=".5s" data-aos-duration="3000">
                                <a class="bg_yellow" href="<?php echo get_home_url(); ?>/about">More About us <i
                                        class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>

<!-- strategic creative section end  -->

<!-- faq -->
<?php if (have_rows('faq_section', 'option')) : ?>
    <?php while (have_rows('faq_section', 'option')) : the_row(); ?>
        <section class="faq-wrp padding_top_bottom">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="faq-text">
                            <div class="heading">
                                <h2><?php the_sub_field('heading'); ?></h2>
                                <?php the_sub_field('description'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-7 col-sm-8">
                        <div class="accordion" id="accordionExample">
                            <?php if (have_rows('faqs')) : ?>
                                <?php
                                $i = 0;
                                while (have_rows('faqs')) : the_row();
                                    $i++;
                                    $heading_id = 'heading' . $i;
                                    $collapse_id = 'collapse' . $i;
                                ?>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="<?php echo esc_attr($heading_id); ?>">
                                            <button class="accordion-button <?php echo ($i !== 1) ? 'collapsed' : ''; ?>" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr($collapse_id); ?>"
                                                aria-expanded="<?php echo ($i === 1) ? 'true' : 'false'; ?>"
                                                aria-controls="<?php echo esc_attr($collapse_id); ?>">
                                                <?php the_sub_field('faq_heading'); ?>
                                            </button>
                                        </h2>
                                        <div id="<?php echo esc_attr($collapse_id); ?>"
                                            class="accordion-collapse collapse <?php echo ($i === 1) ? 'show' : ''; ?>"
                                            aria-labelledby="<?php echo esc_attr($heading_id); ?>" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <?php the_sub_field('faq_description'); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php else : ?>
                                <?php // no rows found 
                                ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>
<!--faq end -->

<?php

get_footer();
