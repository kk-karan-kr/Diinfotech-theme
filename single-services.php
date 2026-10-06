<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package DI_Infotech
 */

$di_embed_service_body = defined('DI_EMBED_SERVICE_BODY') && DI_EMBED_SERVICE_BODY;

if (!$di_embed_service_body) {
    get_header();
}

/*
 * Modular Service Page V2.
 * Existing services remain on the legacy renderer unless an editor explicitly
 * changes Service Layout Mode to "Modular Layout V2".
 */
if (
    !$di_embed_service_body
    && function_exists('get_field')
    && 'modular_v2' === get_field('service_layout_mode')
) {
    get_template_part('template-parts/services-v2/builder');
    get_footer();
    return;
}
?>

<?php if (!$di_embed_service_body && have_rows( 'banner_section' )) : ?>
    <?php while ( have_rows( 'banner_section' ) ) : the_row(); 
     
        $heading = get_sub_field( 'heading' );
        $heading_part2 = get_sub_field( 'heading_part2' );
        $description = get_sub_field( 'description' );
        $button_name = get_sub_field( 'button_name' );
        $button_url = get_sub_field( 'button_url' );

        if ( $heading || $description || $button_name || $button_url ) : ?>
            <section class="marketing-wrp bg_black padding_top_bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="marketing-text">
                                <div class="heading">
                                    <?php if ( $heading ) : ?>
                                        <h1><?php echo esc_html( $heading ); ?><br><?php echo esc_html( $heading_part2 ); ?></h1>
                                       
                                    <?php endif; ?>
                                    <?php if ( $description ) : ?>
                                        <div class="sub_pera">
                                            <?php echo wp_kses_post( $description ); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <?php if ( $button_name && $button_url ) : ?>
                                    <div class="main_btn">
                                        <a class="bg_yellow" href="<?php echo esc_url( $button_url ); ?>">
                                            <?php echo esc_html( $button_name ); ?>
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>


<?php if ( have_rows( 'advertising_core_warp_section' ) ) : ?>
    <?php while ( have_rows( 'advertising_core_warp_section' ) ) : the_row(); ?>
        <?php if ( have_rows( 'advertising_nav_section' ) ) : ?>
            <section class="advertising-wrp grey-bg padding_top_bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="heading">
                        <h2 class="text-center"><?php the_sub_field( 'heading' ); ?></h2>
        </div>
                            <ul class="advertising-nav nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <?php 
                                $tabHead = 1;
                                while ( have_rows( 'advertising_nav_section' ) ) : the_row(); 
                                    if ( get_sub_field( 'advertising_nav_heading' ) ) : ?>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link <?php echo $tabHead === 1 ? 'active' : ''; ?>" 
                                                id="pills-core-tab<?php echo $tabHead; ?>" 
                                                data-bs-toggle="pill" 
                                                data-bs-target="#pills-core<?php echo $tabHead; ?>" 
                                                type="button" 
                                                role="tab" 
                                                aria-controls="pills-core<?php echo $tabHead; ?>" 
                                                aria-selected="<?php echo $tabHead === 1 ? 'true' : 'false'; ?>">
                                                <?php the_sub_field( 'advertising_nav_heading' ); ?>
                                            </button>
                                        </li>
                                    <?php 
                                    endif;
                                    $tabHead++;
                                endwhile; ?>
                            </ul>
                        </div>
                        <div class="col-lg-12">

                        <div class="heading text-center">
                        <h2><?php the_sub_field( 'heading' ); ?></h2>
        </div>
                            <div class="tab-content" id="pills-tabContent">
                                <?php 
                                $tabContent = 1;
                                while ( have_rows( 'advertising_nav_section' ) ) : the_row(); 
                                    if ( have_rows( 'advertising_nav_details_section' ) ) : ?>
                                        <div class="tab-pane fade <?php echo $tabContent === 1 ? 'show active' : ''; ?>" 
                                            id="pills-core<?php echo $tabContent; ?>" 
                                            role="tabpanel" 
                                            aria-labelledby="pills-core-tab<?php echo $tabContent; ?>">
                                            <div class="row">
                                                <?php while ( have_rows( 'advertising_nav_details_section' ) ) : the_row(); 
                                                    if ( get_sub_field( 'heading' ) || get_sub_field( 'advertising_nav_details' ) ) : ?>
                                                        <div class="col-lg-4 col-sm-4">
                                                            <div class="advertising-content-wrp">
                                                                <div class="heading">
                                                                    <?php if ( get_sub_field( 'heading' ) ) : ?>
                                                                        <h3><?php the_sub_field( 'heading' ); ?></h3>
                                                                    <?php endif; ?>
                                                                    <?php if ( get_sub_field( 'advertising_nav_details' ) ) : ?>
                                                                        <div class="sub_pera grey-text">
                                                                            <p><?php the_sub_field( 'advertising_nav_details' ); ?></p>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php 
                                                    endif;
                                                endwhile; ?>
                                            </div>
                                        </div>
                                    <?php 
                                    endif;
                                    $tabContent++;
                                endwhile; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>








  <!-- brand section start kk  -->
  <?php if ( have_rows( 'our_valuable_brands' ) ) : ?>
	<?php while ( have_rows( 'our_valuable_brands' ) ) : the_row(); ?>
            <section class="brands margin_top">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="heading text-center " data-aos="zoom-in" data-aos-delay=".3s"
                                data-aos-duration="1500">
                                <h2><?php the_sub_field( 'heading' ); ?></h2>
                                <?php the_sub_field( 'discription' ); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                       
                        <?php if ( have_rows( 'our_brands' ) ) : ?>
                            <?php while ( have_rows( 'our_brands' ) ) : the_row(); ?>
                        <div class="col-lg-2 col-sm-2 col-xs-6">
                            <div class="brand_img" data-aos="fade-up" data-aos-delay=".5s" data-aos-duration="1200">
                            <?php $brands_logo = get_sub_field( 'brands_logo' ); ?>
				<?php if ( $brands_logo ) : ?>
<?php echo di_infotech_image( $brands_logo, 'di-logo', array( 'sizes' => '(max-width: 767px) 100px, 160px' ) ); ?>
				<?php endif; ?>
                               
                            </div>

                        </div>
                        <?php endwhile; ?>
		<?php else : ?>
			<?php // no rows found ?>
		<?php endif; ?>
                       
                    </div>
                </div>
            </section>
            <?php endwhile; ?>
            <?php endif; ?>
            <!-- brand section end  -->



            
<?php if ( have_rows( 'store_development' ) ) : ?>
    <?php while ( have_rows( 'store_development' ) ) : the_row(); ?>       
            <section class="work-process-wrp padding_top_bottom">
                <div class="container">


                <div class="row justify-content-center">
                        <div class="col-lg-8">

                            <div class="experiences-text text-center">

                                <div class="heading ">
                                    <h2><?php the_sub_field( 'heading' ); ?></h2>
                                    <div class="sub_pera">
                                    <p class="grey-text"><?php the_sub_field( 'description' ); ?></p>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                    <?php if ( have_rows( 'work_process_tab_menu' ) ) : ?>
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-sm-6">
                            <div class="work-process-tab">
                                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <?php
                                    $tabHead = 1;
                                    while ( have_rows( 'work_process_tab_menu' ) ) :
                                        the_row();
                                        ?>
                                        <h3>
                                        <button class="nav-link <?php echo $tabHead === 1 ? 'active' : ''; ?>"
                                            id="v-pills-home-tab<?php echo $tabHead; ?>"
                                            data-bs-toggle="pill"
                                            data-bs-target="#v-pills-home<?php echo $tabHead; ?>"
                                            type="button"
                                            role="tab"
                                            aria-controls="v-pills-home<?php echo $tabHead; ?>"
                                            aria-selected="<?php echo $tabHead === 1 ? 'true' : 'false'; ?>">
                                            <?php the_sub_field( 'work_process_tab_menu_name' ); ?>
                                        </button>
                                        </h3>
                                        <?php $tabHead++; ?>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="tab-content" id="v-pills-tabContent">
                                <?php
                                $tabContent = 1;
                                while ( have_rows( 'work_process_tab_menu' ) ) :
                                    the_row();
                                    ?>
                                    <div class="tab-pane fade <?php echo $tabContent === 1 ? 'show active' : ''; ?>"
                                        id="v-pills-home<?php echo $tabContent; ?>"
                                        role="tabpanel"
                                        aria-labelledby="v-pills-home-tab<?php echo $tabContent; ?>">
                                        <div class="work-process-text">

                                        <!-- banner  -->
                                        
                                                    <div class="ad-slider1 owl-carousel owl-theme">
                                                    <?php if ( have_rows( 'work_process_tab_bammer' ) ) : ?>
                                                        <?php while ( have_rows( 'work_process_tab_bammer' ) ) : the_row(); ?>
                                                        <div class="item">
                                                            <div class="social-media-img">
                                                                <?php $image = get_sub_field( 'image' ); ?>
						                                        <?php if ( $image ) : ?>
<?php echo di_infotech_image( $image, 'di-card', array(  ) ); ?>
						                                        <?php endif; ?>

                                                            </div>
                                                        </div>
                                                        <?php endwhile; ?>
			                                        	<?php else : ?>
			                                        		<?php // no rows found ?>
			                                        	<?php endif; ?>
                                                        
                                                    </div>
                                                    <!-- banner end -->



                                            <div class="main-nav">
                                                <p class="bg_yellow"><?php the_sub_field( 'work_process_tab_menu_name' ); ?></p>
                                            </div>
                                            <div class="sub_pera">
                                                <?php the_sub_field( 'work_process_tab_detials' ); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $tabContent++; ?>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; // End check for work_process_tab_menu ?>
    <?php endwhile; ?>
<?php endif; ?>




<?php if ( have_rows( 'experiences_warp_section' ) ) : ?>
	<?php while ( have_rows( 'experiences_warp_section' ) ) : the_row(); ?>
            <section class="experiences-wrp  grey-bg padding_top_bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="experiences-text  ">

                                <div class="heading ">
                                    <h2><?php the_sub_field( 'heading' ); ?>
                                    </h2>
                                    <div class="sub_pera  ">
                                    <?php the_sub_field( 'description' ); ?>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="row">
                    <?php if ( have_rows( 'experiences_are' ) ) : ?>
                        <?php while ( have_rows( 'experiences_are' ) ) : the_row(); ?>
                        <div class="col-lg-3 col-sm-3">
                            <div class="experiences-btn-wrp">

                                <div class="experiences-btn">
                                    <a href="<?php the_sub_field( 'url' ); ?>"><i class="fa-solid fa-arrow-right"></i> 
                                    <?php the_sub_field( 'experiences_name' ); ?>
                                    </a>

                                </div>


                            </div>
                        </div>

                        <?php endwhile; ?>
		<?php else : ?>
			<?php // no rows found ?>
		<?php endif; ?>
                       

                    </div>

                </div>


            </section>
            <?php endwhile; ?>
            <?php endif; ?>




            <?php if ( have_rows( 'advertising_core_warp_section_with_image' ) ) : ?>
    <?php while ( have_rows( 'advertising_core_warp_section_with_image' ) ) : the_row(); ?>
        <?php if ( have_rows( 'advertising_nav_section' ) ) : ?>
            <section class="advertising-wrp bg_black  padding_top_bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="advertising-nav-new advertising-nav nav nav-pills" id="pills-tab" role="tablist">
                                <?php $tabHead = 1; ?>
                                <?php while ( have_rows( 'advertising_nav_section' ) ) : the_row(); ?>
                                    <li class="nav-item" role="presentation">
                                        <h2>
                                        <button class="nav-link <?php echo ($tabHead === 1) ? 'active' : ''; ?>" id="pills-a-tab<?php echo $tabHead; ?>" 
                                            data-bs-toggle="pill"
                                            data-bs-target="#pills-a<?php echo $tabHead; ?>" type="button" role="tab" 
                                            aria-controls="pills-a<?php echo $tabHead; ?>"
                                            aria-selected="<?php echo ($tabHead === 1) ? 'true' : 'false'; ?>">
                                            <?php the_sub_field( 'advertising_nav_heading' ); ?>
                                        </button>
                                        </h2>
                                    </li>
                                    <?php $tabHead++; ?>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                        <div class="col-lg-12">
                            <div class="tab-content" id="pills-tabContent">
                                <?php $tabContent = 1; ?>
                                <?php while ( have_rows( 'advertising_nav_section' ) ) : the_row(); ?>
                                    <div class="tab-pane fade <?php echo ($tabContent === 1) ? 'show active' : ''; ?>" 
                                        id="pills-a<?php echo $tabContent; ?>" 
                                        role="tabpanel"
                                        aria-labelledby="pills-a-tab<?php echo $tabContent; ?>">
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-lg-10 col-sm-10">
                                                <div class="ad-wrp">
                                                    <?php if ( have_rows( 'advertising_nav_details_section' ) ) : ?>
                                                        <?php while ( have_rows( 'advertising_nav_details_section' ) ) : the_row(); ?>
                                                            <div class="row align-items-center">
                                                                <div class="col-lg-6 col-sm-6">
                                                                    <div class="ad-text-new">
                                                                        <div class="heading">
                                                                            <h3><?php the_sub_field( 'heading' ); ?> </h3>
                                                                            <div class="sub_pera grey-text">
                                                                                <p><?php the_sub_field( 'advertising_nav_details' ); ?></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-6">
                                                                    <div class="ad-img">
                                                                        <?php $image = get_sub_field( 'image' ); ?>
                                                                        <?php if ( $image ) : ?>
<?php echo di_infotech_image( $image, 'di-card', array(  ) ); ?>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endwhile; ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $tabContent++; ?>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>




<!-- white -->

<?php if ( have_rows( 'support_warp_growth_section' ) ) : ?>
    <?php 
    $has_valid_content = false; 

   
    while ( have_rows( 'support_warp_growth_section' ) ) : the_row();
        if ( get_sub_field( 'heading' ) || have_rows( 'steps_to_growth' ) ) {
            $has_valid_content = true; 
            break; 
        }
    endwhile;

   
    if ( $has_valid_content ) : ?>
        <section id="advertising-section" class="support-wrp grey-bg padding_top_bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-sm-8">
                        <div class="support-text">
                            <?php 
                           
                            reset_rows();
                            while ( have_rows( 'support_warp_growth_section' ) ) : the_row(); ?>
                                <?php if ( get_sub_field( 'heading' ) ) : ?>
                                    <div class="heading">
                                        <h2><?php the_sub_field( 'heading' ); ?></h2>
                                        <p><?php the_sub_field( 'description' ); ?></p>
                                    </div>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <?php 
                    reset_rows(); 
                    while ( have_rows( 'support_warp_growth_section' ) ) : the_row(); 
                        if ( have_rows( 'steps_to_growth' ) ) :
                            while ( have_rows( 'steps_to_growth' ) ) : the_row(); ?>
                                <div class="col-lg-2 col-sm-2 col-xs-6">
                                    <div class="support-icons-wrp">
                                        <?php $growth_step_image_icon = get_sub_field( 'growth_step_image_icon' ); ?>
                                        <?php if ( $growth_step_image_icon ) : ?>
<?php echo di_infotech_image( $growth_step_image_icon, 'di-logo', array( 'sizes' => '(max-width: 767px) 100px, 160px' ) ); ?>
                                        <?php endif; ?>
                                        <div class="main-nav">
                                            <p class="bg_yellow"><?php the_sub_field( 'growth_step_heading' ); ?></p>
                                        </div>
                                        <div class="sub_pera">
                                            <p><?php the_sub_field( 'growth_step_short_description' ); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; 
                        endif; 
                    endwhile; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?>

<!-- All services section -->
<section class="our_expertise bg_black padding_top_bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="heading " data-aos="fade-right" data-aos-delay=".5s"
                                data-aos-duration="1000">
                                <h2 class="text-white">Our Complete Digital Marketing Services </h2>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-lg-7 col-sm-7">
                            <div class="row_inner accordion_wrp">
                                                            
                                <div class="accordion_new" data-aos="fade-right" data-aos-delay=".5s"
                                    data-aos-duration="1200">
                                    <div class="numeric_number">
                                        <p>01</p>
                                    </div>
                                    <div class="accordion_intro">
                                        <div class="accordion_flex">

                                            <h3>Search Engine Optimization (SEO)</h3>

                                        </div>

                                        <div class="accordion_content">
                                        									<img src="https://diinfotech.com/wp-content/uploads/2025/03/SEO-1.png" alt="search engine optimization" class="accordion_image" />
				                                         
                                            <div class="expertise_pera">
                                                <p>Our team provides expert SEO services to increase your website’s visibility in search engines. By improving site structure, optimizing content, and building quality backlinks, we help you achieve higher rankings and attract more organic traffic.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="circle_arrow">

                                    									<a href="https://diinfotech.com/services/seo-company-in-india/" target=""><i class="fa-solid fa-arrow-right"> </i></a>
				
                                  
				
			
                                       
                                    </div>
                                </div>
                                
                                <div class="accordion_new" data-aos="fade-right" data-aos-delay=".5s"
                                    data-aos-duration="1200">
                                    <div class="numeric_number">
                                        <p>02</p>
                                    </div>
                                    <div class="accordion_intro">
                                        <div class="accordion_flex">

                                            <h3>Social Media Marketing</h3>

                                        </div>

                                        <div class="accordion_content">
                                        									<img src="https://diinfotech.com/wp-content/uploads/2025/03/SMM.png" alt="social media marketing" class="accordion_image" />
				                                         
                                            <div class="expertise_pera">
                                                <p>Our team uses social media to grow your brand online. Through engaging content, targeted ad campaigns, and real-time interaction, we help build a loyal following and drive traffic to your website.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="circle_arrow">

                                    									<a href="https://diinfotech.com/services/social-media-marketing-agency-in-delhi/" target=""><i class="fa-solid fa-arrow-right"> </i></a>
				
                                  
				
			
                                       
                                    </div>
                                </div>
                                
                                <div class="accordion_new" data-aos="fade-right" data-aos-delay=".5s"
                                    data-aos-duration="1200">
                                    <div class="numeric_number">
                                        <p>03</p>
                                    </div>
                                    <div class="accordion_intro">
                                        <div class="accordion_flex">

                                            <h3>Performance Marketing / Pay-Per-Click (PPC)</h3>

                                        </div>

                                        <div class="accordion_content">
                                        									<img src="https://diinfotech.com/wp-content/uploads/2025/03/Performance-Marketing-1.png" alt="ppc services" class="accordion_image" />
				                                         
                                            <div class="expertise_pera">
                                                <p>With deep expertise in PPC service, we create highly focused campaigns that bring qualified traffic. We do all the work for you from keyword research to ad placement and ongoing optimization to ensure maximum ROI and lead generation.
</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="circle_arrow">

                                    									<a href="https://diinfotech.com/services/performance-marketing-agency/" target=""><i class="fa-solid fa-arrow-right"> </i></a>
				
                                  
				
			
                                       
                                    </div>
                                </div>
                                
                                <div class="accordion_new" data-aos="fade-right" data-aos-delay=".5s"
                                    data-aos-duration="1200">
                                    <div class="numeric_number">
                                        <p>04</p>
                                    </div>
                                    <div class="accordion_intro">
                                        <div class="accordion_flex">

                                            <h3>Email Marketing</h3>

                                        </div>

                                        <div class="accordion_content">
                                        									<img src="https://diinfotech.com/wp-content/uploads/2025/03/Email-Marketing-1.png" alt="email marketing services" class="accordion_image" />
				                                         
                                            <div class="expertise_pera">
                                                <p>Our email marketing services are focused on building customer relationships. We design eye-catching emails, improve open and click-through rates, and track results to help you nurture leads and improve retention.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="circle_arrow">

                                    									<a href="https://diinfotech.com/services/email-marketing-service/" target=""><i class="fa-solid fa-arrow-right"> </i></a>
				
                                  
				
			
                                       
                                    </div>
                                </div>
                                
                                <div class="accordion_new" data-aos="fade-right" data-aos-delay=".5s"
                                    data-aos-duration="1200">
                                    <div class="numeric_number">
                                        <p>05</p>
                                    </div>
                                    <div class="accordion_intro">
                                        <div class="accordion_flex">

                                            <h3>Brand Management</h3>

                                        </div>

                                        <div class="accordion_content">
                                        									<img src="https://diinfotech.com/wp-content/uploads/2025/03/Brand-Management-1.png" alt="brand management services" class="accordion_image" />
				                                         
                                            <div class="expertise_pera">
                                                <p>We help shape and protect your brand identity across digital platforms. From managing your image to responding to feedback, we ensure your brand is consistently presented and positively perceived by the users.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="circle_arrow">

                                    									<a href="https://diinfotech.com/services/strategic-brand-management/" target=""><i class="fa-solid fa-arrow-right"> </i></a>
				
                                  
				
			
                                       
                                    </div>
                                </div>
                                
                                <div class="accordion_new" data-aos="fade-right" data-aos-delay=".5s"
                                    data-aos-duration="1200">
                                    <div class="numeric_number">
                                        <p>06</p>
                                    </div>
                                    <div class="accordion_intro">
                                        <div class="accordion_flex">

                                            <h3>UI/UX Designing</h3>

                                        </div>

                                        <div class="accordion_content">
                                        									<img src="https://diinfotech.com/wp-content/uploads/2025/03/UI-UX-Designing-1.png" alt="UI/UX design service" class="accordion_image" />
				                                         
                                            <div class="expertise_pera">
                                                <p>We design websites and applications that offer smooth, intuitive experiences. Our UI/UX design services aim to enhance usability, increase engagement, and conversions by focusing on the particular user journey.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="circle_arrow">

                                    									<a href="https://diinfotech.com/services/ui-ux-design-agency/" target=""><i class="fa-solid fa-arrow-right"> </i></a>
				
                                  
				
			
                                       
                                    </div>
                                </div>
                                
                                <div class="accordion_new" data-aos="fade-right" data-aos-delay=".5s"
                                    data-aos-duration="1200">
                                    <div class="numeric_number">
                                        <p>07</p>
                                    </div>
                                    <div class="accordion_intro">
                                        <div class="accordion_flex">

                                            <h3>Ecommerce Development</h3>

                                        </div>

                                        <div class="accordion_content">
                                        									<img src="https://diinfotech.com/wp-content/uploads/2025/03/Ecommerce-Development-1.png" alt="ecommerce website development" class="accordion_image" />
				                                         
                                            <div class="expertise_pera">
                                                <p>We build powerful, scalable e-commerce solutions using platforms like Shopify, WordPress, and custom builds. Our e-commerce development services help you start and grow your online store with ease. Whether you need Shopify development, WordPress development, or e-commerce development, we’re the trusted digital marketing company in Delhi near you.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="circle_arrow">

                                    									<a href="https://diinfotech.com/services/ecommerce-development-company-in-india/" target=""><i class="fa-solid fa-arrow-right"> </i></a>
				
                                  
				
			
                                       
                                    </div>
                                </div>
                                
                                <div class="accordion_new" data-aos="fade-right" data-aos-delay=".5s"
                                    data-aos-duration="1200">
                                    <div class="numeric_number">
                                        <p>08</p>
                                    </div>
                                    <div class="accordion_intro">
                                        <div class="accordion_flex">

                                            <h3>E-commerce SEO</h3>

                                        </div>

                                        <div class="accordion_content">
                                        									<img src="https://diinfotech.com/wp-content/uploads/2025/03/Ecommerce-SEO-1.png" alt="ecommerce seo" class="accordion_image" />
				                                         
                                            <div class="expertise_pera">
                                                <p>Our e-commerce SEO strategies are customized to get your products in front of the right customers. We optimize product listings, categories, and content to increase search visibility and drive more sales.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="circle_arrow">

                                    									<a href="https://diinfotech.com/services/ecommerce-seo-marketing/" target=""><i class="fa-solid fa-arrow-right"> </i></a>
				
                                  
				
			
                                       
                                    </div>
                                </div>
                                
                                <div class="accordion_new" data-aos="fade-right" data-aos-delay=".5s"
                                    data-aos-duration="1200">
                                    <div class="numeric_number">
                                        <p>09</p>
                                    </div>
                                    <div class="accordion_intro">
                                        <div class="accordion_flex">

                                            <h3>Generating Engine Optimization</h3>

                                        </div>

                                        <div class="accordion_content">
                                        									<img src="https://diinfotech.com/wp-content/uploads/2026/02/geo-2-scaled.png" alt="generative engine optimization services" class="accordion_image" />
				                                         
                                            <div class="expertise_pera">
                                                <p>Our generative engine optimisation services are designed to improve your brand visibility in LLMs such as ChatGPT, Gemini, and Perplexity and ensure your products appear in front of the right audience.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="circle_arrow">

                                    									<a href="https://diinfotech.com/services/generative-engine-optimization/" target=""><i class="fa-solid fa-arrow-right"> </i></a>
				
                                  
				
			
                                       
                                    </div>
                                </div>
                                		




                            </div>
                        </div>
                        <div class="col-lg-5 col-sm-5">
                            <div class="row_inner accordion_images" data-aos="zoom-in" data-aos-delay=".5s"
                                data-aos-duration="2000">
                                                                    
                                    									<img src="https://diinfotech.com/wp-content/uploads/2025/03/SEO-1.png" alt="search engine optimization" />
				                
                                    									<img src="https://diinfotech.com/wp-content/uploads/2025/03/SMM.png" alt="social media marketing" />
				                
                                    									<img src="https://diinfotech.com/wp-content/uploads/2025/03/Performance-Marketing-1.png" alt="ppc services" />
				                
                                    									<img src="https://diinfotech.com/wp-content/uploads/2025/03/Email-Marketing-1.png" alt="email marketing services" />
				                
                                    									<img src="https://diinfotech.com/wp-content/uploads/2025/03/Brand-Management-1.png" alt="brand management services" />
				                
                                    									<img src="https://diinfotech.com/wp-content/uploads/2025/03/UI-UX-Designing-1.png" alt="UI/UX design service" />
				                
                                    									<img src="https://diinfotech.com/wp-content/uploads/2025/03/Ecommerce-Development-1.png" alt="ecommerce website development" />
				                
                                    									<img src="https://diinfotech.com/wp-content/uploads/2025/03/Ecommerce-SEO-1.png" alt="ecommerce seo" />
				                
                                    									<img src="https://diinfotech.com/wp-content/uploads/2026/02/geo-2-scaled.png" alt="generative engine optimization services" />
				                		




                            </div>
                        </div>
                    </div>
                </div>
            </section>
                                    <!-- All services section -->



<!--  7-->

<?php if ( have_rows( 'performance_section' ) ) : ?>
    <?php while ( have_rows( 'performance_section' ) ) : the_row(); 
      
        $heading = get_sub_field( 'heading' );
        $description = get_sub_field( 'description' );
        $button_url = get_sub_field( 'button_url' );
        $button_text = get_sub_field( 'button_text' );
        $image = get_sub_field( 'image' );

      
        if ( $heading || $description || $button_url || $button_text || $image ) : ?>
            <section class="proformance-wrp margin_top">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-8 col-sm-8">
                            <div class="proformance-text text-center">
                                <div class="heading">
                                    <?php if ( $heading ) : ?>
                                        <h2><?php echo esc_html( $heading ); ?></h2>
                                    <?php endif; ?>
                                    <?php if ( $description ) : ?>
                                        <div class="sub_pera">
                                            <?php echo wp_kses_post( $description ); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php if ( $button_url && $button_text ) : ?>
                                <div class="main_btn">
                                    <a class="bg_yellow" href="<?php echo esc_url( $button_url ); ?>">
                                        <?php echo esc_html( $button_text ); ?>
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- <div class="col-lg-5 col-sm-5">
                            <div class="proformance-img">
                                <?php if ( $image ) : ?>
<?php echo di_infotech_image( $image, 'di-card', array(  ) ); ?>
                                <?php endif; ?>
                            </div>
                        </div> -->
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>

<!-- service audit section  -->

<?php if (have_rows('service_brand')) : ?>
    <?php while (have_rows('service_brand')) : the_row(); ?>
        <section class="self_brand service_brand padding_top_bottom">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-6 col-sm-6" data-aos="fade-right" data-aos-delay=".5s"
                        data-aos-duration="2000">
                        <div class="introduction_wrp">
                            <div class="introduction_heading">
                                <h3><?php the_sub_field('marketing_heading'); ?></h3>
                            </div>
                            <div class="brand_logo">
                                <img src="<?php echo esc_url(the_sub_field('icon')); ?>" alt="">
                            </div>
                            <div class="bottom_pera">
                                <p><?php the_sub_field('marketing_pera'); ?></p>
                            </div>
                            <div class="main_btn ">
                                <a class="bg_black" href="https://diinfotech.com/contact/">Contact Us Now !<i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6" data-aos="fade-right" data-aos-delay=".5s"
                        data-aos-duration="2000">
                        <div class="introduction_wrp">
                            <div class="introduction_heading">
                                <h3><?php the_sub_field('marketing_heading_second'); ?></h3>
                            </div>
                            <div class="brand_logo">
                                <img src="<?php echo esc_url(the_sub_field('icon_two')); ?>" alt="">
                            </div>
                            <div class="bottom_pera">
                                 <p><?php the_sub_field('marketing_pera_two'); ?></p>
                            </div>
                            <div class="main_btn ">
                              <a class="bg_black" href="https://diinfotech.com/contact/">Contact Us Now !<i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php else : ?>
<?php endif; ?>

<!-- faq -->
<?php if ( have_rows( 'faq_section' ) ) : ?>
	<?php while ( have_rows( 'faq_section' ) ) : the_row(); ?>
<section class="faq-wrp padding_top_bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="faq-text">
                    <div class="heading">
                        <h2><?php the_sub_field( 'heading' ); ?></h2>
                        <?php the_sub_field( 'description' ); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-7 col-sm-8">
                <div class="accordion" id="accordionExample">
                    <?php if ( have_rows( 'faqs' ) ) : ?>
                        <?php 
                        $i = 0;
                        while ( have_rows( 'faqs' ) ) : the_row(); 
                        $i++;
                        $heading_id = 'heading' . $i;
                        $collapse_id = 'collapse' . $i;
                        ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="<?php echo esc_attr($heading_id); ?>">
                                <button class="accordion-button <?php echo ($i !== 1) ? 'collapsed' : ''; ?>" 
                                    type="button" data-bs-toggle="collapse" 
                                    data-bs-target="#<?php echo esc_attr($collapse_id); ?>" 
                                    aria-expanded="<?php echo ($i === 1) ? 'true' : 'false'; ?>" 
                                    aria-controls="<?php echo esc_attr($collapse_id); ?>">
                                    <?php the_sub_field( 'faq_heading' ); ?>
                                </button>
                            </h2>
                            <div id="<?php echo esc_attr($collapse_id); ?>" 
                                class="accordion-collapse collapse <?php echo ($i === 1) ? 'show' : ''; ?>" 
                                aria-labelledby="<?php echo esc_attr($heading_id); ?>" 
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <?php the_sub_field( 'faq_description' ); ?>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <?php // no rows found ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endwhile; ?>
<?php endif; ?>


<!-- 

 <?php if ( have_rows( 'brand_deserving_section' ) ) : ?>
    <?php while ( have_rows( 'brand_deserving_section' ) ) : the_row(); 
       
        $image = get_sub_field( 'image' );
        $heading = get_sub_field( 'heading' );
        $descriptions = get_sub_field( 'descriptions' );

        if ( $image || $heading || $descriptions ) : ?>
            <section class="your-brand-wrp bg_black padding_top_bottom margin_top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-sm-5">
                            <div class="your-brand-img">
                                <?php if ( $image ) : ?>
<?php echo di_infotech_image( $image, 'di-card', array(  ) ); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-7 col-sm-7">
                            <div class="your-brand-text">
                                <div class="heading">
                                    <?php if ( $heading ) : ?>
                                        <h2><?php echo esc_html( $heading ); ?></h2>
                                    <?php endif; ?>
                                    <?php if ( $descriptions ) : ?>
                                        <div class="sub_pera">
                                            <?php echo wp_kses_post( $descriptions ); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
 -->


            <!-- service 1 section   --> 

<!-- 

            <?php if ( have_rows( 'best_service_section' ) ) : ?>
    <?php while ( have_rows( 'best_service_section' ) ) : the_row(); 
       
        $heading = get_sub_field( 'heading' );
        $descriptions = get_sub_field( 'descriptions' );
        $image = get_sub_field( 'image' );

      
        if ( $heading || $descriptions || $image ) : ?>
            <section class="online-store-wrp margin_top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="online-shop-text text-center">
                                <div class="heading">
                                    <?php if ( $heading ) : ?>
                                        <h2><?php echo esc_html( $heading ); ?></h2>
                                    <?php endif; ?>
                                    <?php if ( $descriptions ) : ?>
                                        <div class="sub_pera">
                                            <?php echo wp_kses_post( $descriptions ); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-sm-10">
                            <div class="online-shop-img">
                                <?php if ( $image ) : ?>
<?php echo di_infotech_image( $image, 'di-card', array(  ) ); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>

 -->





<!-- 
<?php if ( have_rows( 'ecommerce_section' ) ) : ?>
    <?php while ( have_rows( 'ecommerce_section' ) ) : the_row(); 
       
        $heading = get_sub_field( 'heading' );
        $description = get_sub_field( 'description' );
        $has_image_section = have_rows( 'image_section' );

     
        if ( $heading || $description || $has_image_section ) : ?>
            <section class="ecommerce-wrp bg_black padding_top_bottom margin_top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ecommerce-text text-center">
                                <div class="heading">
                                    <?php if ( $heading ) : ?>
                                        <h2><?php echo esc_html( $heading ); ?></h2>
                                    <?php endif; ?>
                                    <?php if ( $description ) : ?>
                                        <div class="sub_pera">
                                            <?php echo wp_kses_post( $description ); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ecommerce-img-main">
                                <div class="row align-items-center">
                                    <?php if ( $has_image_section ) : ?>
                                        <?php while ( have_rows( 'image_section' ) ) : the_row(); 
                                            $image = get_sub_field( 'image' ); ?>
                                            <?php if ( $image ) : ?>
                                                <div class="col-lg-4 col-sm-4">
                                                    <div class="ecommerce-img-wrp">
<?php echo di_infotech_image( $image, 'di-card', array(  ) ); ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>



 -->




   
<!-- 
            <section class=" advertising-wrp margin_top">
                <div class="container">
               
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="advertising-nav nav nav-pills  mb-3" id="pills-tab" role="tablist">
                           
                                <li class="nav-item" role="presentation">
                                    <button class=" nav-link active" id="pills-o-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-o" type="button" role="tab" aria-controls="pills-o"
                                        aria-selected="true">Core Elemants</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-r-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-r" type="button" role="tab" aria-controls="pills-r"
                                        aria-selected="false">Our Services</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-t-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-t" type="button" role="tab" aria-controls="pills-t"
                                        aria-selected="false">Core Elements</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-k-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-k" type="button" role="tab" aria-controls="pills-k"
                                        aria-selected="false">Core Elements</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-s-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-s" type="button" role="tab" aria-controls="pills-s"
                                        aria-selected="false">Core Elements</button>
                                </li>
                            </ul>

                        </div>
                        <div class="col-lg-12">
                            <div class="tab-content" id="pills-tabContent">


                                <div class="tab-pane fade show active" id="pills-o" role="tabpanel"
                                    aria-labelledby="pills-o-tab">
                                    <section class="work-process-wrp work-mt margin_top ">
                                        <div class="container">
                                            <div class="row align-items-center">
                                                <div class="col-lg-6 col-sm-6">
                                                    <div class="work-process-tab ">
                                                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab"
                                                            role="tablist" aria-orientation="vertical">
                                                            <button class="nav-link" id="v-pills-home-tab"
                                                                data-bs-toggle="pill" data-bs-target="#v-pills-home"
                                                                type="button" role="tab" aria-controls="v-pills-home"
                                                                aria-selected="false" tabindex="-1">ppc audits</button>
                                                            <button class="nav-link" id="v-pills-profile-tab"
                                                                data-bs-toggle="pill" data-bs-target="#v-pills-profile"
                                                                type="button" role="tab" aria-controls="v-pills-profile"
                                                                aria-selected="false" tabindex="-1">social
                                                                advertising</button>
                                                            <button class="nav-link" id="v-pills-messages-tab"
                                                                data-bs-toggle="pill" data-bs-target="#v-pills-messages"
                                                                type="button" role="tab"
                                                                aria-controls="v-pills-messages" aria-selected="false"
                                                                tabindex="-1">google adWords</button>
                                                            <button class="nav-link" id="v-pills-plugin-tab"
                                                                data-bs-toggle="pill" data-bs-target="#v-pills-plugin"
                                                                type="button" role="tab" aria-controls="v-pills-plugin"
                                                                aria-selected="false" tabindex="-1">bing
                                                                advertising</button>
                                                            <button class="nav-link active" id="v-pills-hosting-tab"
                                                                data-bs-toggle="pill" data-bs-target="#v-pills-hosting"
                                                                type="button" role="tab" aria-controls="v-pills-hosting"
                                                                aria-selected="true">retention</button>


                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="col-lg-6 col-sm-6">

                                                   

                                                    <div class="tab-content" id="v-pills-tabContent">





                                                        <div class="tab-pane fade" id="v-pills-home" role="tabpanel"
                                                            aria-labelledby="v-pills-home-tab">
                                                            <div class="ad-slider owl-carousel owl-theme">
                                                        <div class="item">
                                                            <div class="social-media-img">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/ad-slider.jpg" alt="" width="456" height="218" loading="lazy" decoding="async">

                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="social-media-img">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/ad-slider.jpg" alt="" width="456" height="218" loading="lazy" decoding="async">

                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="social-media-img">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/ad-slider.jpg" alt="" width="456" height="218" loading="lazy" decoding="async">

                                                            </div>

                                                        </div>

                                                    </div>
                                                            <div class="work-process-text">
                                                                <div class="main-nav ">
                                                                    <p class="bg_yellow">Store Development</p>
                                                                </div>
                                                                <div class="sub_pera">
                                                                    <p>When visitors visit your store, its appearance is
                                                                        the first thing they see,
                                                                        followed by navigation, usability, speed, and
                                                                        productivity. We work on these
                                                                        elements through Shopify integration solutions,
                                                                        custom development
                                                                        processes, UX/UI enhancements, and Shopify
                                                                        mobile commerce. What’s more? As
                                                                        a trusted digital partner, we will also assist
                                                                        you in getting your Shopify
                                                                        webstore in the limelight.</p>
                                                                </div>

                                                            </div>
                                                        </div>












                                                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                                            aria-labelledby="v-pills-profile-tab">
                                                            <div class="work-process-text">
                                                                <div class="main-nav ">
                                                                    <p class="bg_yellow">UI UX Design</p>
                                                                </div>
                                                                <div class="sub_pera  ">
                                                                    <p>When visitors visit your store, its appearance is
                                                                        the first thing they see,
                                                                        followed by navigation, usability, speed, and
                                                                        productivity. We work on these
                                                                        elements through Shopify integration solutions,
                                                                        custom development
                                                                        processes, UX/UI enhancements, and Shopify
                                                                        mobile commerce. What’s more? As
                                                                        a trusted digital partner, we will also assist
                                                                        you in getting your Shopify
                                                                        webstore in the limelight.</p>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                                            aria-labelledby="v-pills-messages-tab">
                                                            <div class="work-process-text">
                                                                <div class="main-nav ">
                                                                    <p class="bg_yellow">App Programming</p>
                                                                </div>
                                                                <div class="sub_pera  ">
                                                                    <p>When visitors visit your store, its appearance is
                                                                        the first thing they see,
                                                                        followed by navigation, usability, speed, and
                                                                        productivity. We work on these
                                                                        elements through Shopify integration solutions,
                                                                        custom development
                                                                        processes, UX/UI enhancements, and Shopify
                                                                        mobile commerce. What’s more? As
                                                                        a trusted digital partner, we will also assist
                                                                        you in getting your Shopify
                                                                        webstore in the limelight.</p>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="v-pills-plugin" role="tabpanel"
                                                            aria-labelledby="v-pills-plugin-tab">
                                                            <div class="work-process-text">
                                                                <div class="main-nav ">
                                                                    <p class="bg_yellow">Plugin Development</p>
                                                                </div>
                                                                <div class="sub_pera  ">
                                                                    <p>When visitors visit your store, its appearance is
                                                                        the first thing they see,
                                                                        followed by navigation, usability, speed, and
                                                                        productivity. We work on these
                                                                        elements through Shopify integration solutions,
                                                                        custom development
                                                                        processes, UX/UI enhancements, and Shopify
                                                                        mobile commerce. What’s more? As
                                                                        a trusted digital partner, we will also assist
                                                                        you in getting your Shopify
                                                                        webstore in the limelight.</p>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade active show" id="v-pills-hosting"
                                                            role="tabpanel" aria-labelledby="v-pills-hosting-tab">
                                                            <div class="work-process-text">
                                                                <div class="main-nav ">
                                                                    <p class="bg_yellow">Hosting Support</p>
                                                                </div>
                                                                <div class="sub_pera  ">
                                                                    <p>When visitors visit your store, its appearance is
                                                                        the first thing they see,
                                                                        followed by navigation, usability, speed, and
                                                                        productivity. We work on these
                                                                        elements through Shopify integration solutions,
                                                                        custom development
                                                                        processes, UX/UI enhancements, and Shopify
                                                                        mobile commerce. What’s more? As
                                                                        a trusted digital partner, we will also assist
                                                                        you in getting your Shopify
                                                                        webstore in the limelight.</p>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="v-pills-migration"
                                                            role="tabpanel" aria-labelledby="v-pills-migration-tab">
                                                            <div class="work-process-text">
                                                                <div class="main-nav ">
                                                                    <p class="bg_yellow">Migration</p>
                                                                </div>
                                                                <div class="sub_pera  ">
                                                                    <p>When visitors visit your store, its appearance is
                                                                        the first thing they see,
                                                                        followed by navigation, usability, speed, and
                                                                        productivity. We work on these
                                                                        elements through Shopify integration solutions,
                                                                        custom development
                                                                        processes, UX/UI enhancements, and Shopify
                                                                        mobile commerce. What’s more? As
                                                                        a trusted digital partner, we will also assist
                                                                        you in getting your Shopify
                                                                        webstore in the limelight.</p>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



                                            </div>
                                        </div>

                                    </section>
                                </div>







                                <div class="tab-pane fade" id="pills-r" role="tabpanel" aria-labelledby="pills-r-tab">
                                    .....
                                </div>











                                <div class="tab-pane fade" id="pills-t" role="tabpanel" aria-labelledby="pills-t-tab">
                                    ......
                                </div>
                                <div class="tab-pane fade" id="pills-k" role="tabpanel" aria-labelledby="pills-k-tab">
                                    .......
                                </div>
                                <div class="tab-pane fade" id="pills-s" role="tabpanel" aria-labelledby="pills-s-tab">
                                    ......
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

 -->
<!-- 
            <?php if ( have_rows( 'social_media_section' ) ) : ?>
    <?php while ( have_rows( 'social_media_section' ) ) : the_row(); ?>
        <?php if ( get_sub_field( 'heading' ) || get_sub_field( 'content_description' ) || get_sub_field( 'sub_heading' ) || have_rows( 'our_social_platforms_are' ) ) : ?>
            <section class="social-media-wrp margin_top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="social-media-text">
                                <div class="heading">
                                    <?php if ( get_sub_field( 'heading' ) ) : ?>
                                        <h2><?php the_sub_field( 'heading' ); ?></h2>
                                    <?php endif; ?>
                                    <?php if ( get_sub_field( 'content_description' ) ) : ?>
                                        <div class="sub_pera">
                                            <?php the_sub_field( 'content_description' ); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="social-media-text">
                                <div class="heading">
                                    <?php if ( get_sub_field( 'sub_heading' ) ) : ?>
                                        <h3><?php the_sub_field( 'sub_heading' ); ?></h3>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <?php if ( have_rows( 'our_social_platforms_are' ) ) : ?>
                                <div class="social-slider owl-carousel owl-theme">
                                    <?php while ( have_rows( 'our_social_platforms_are' ) ) : the_row(); ?>
                                        <div class="item">
                                            <div class="social-media-img">
                                                <?php $social_iconimage = get_sub_field( 'social_iconimage' ); ?>
                                                <?php if ( $social_iconimage ) : ?>
<?php echo di_infotech_image( $social_iconimage, 'di-logo', array( 'sizes' => '(max-width: 767px) 100px, 160px' ) ); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
 -->

<!-- 

<?php if ( have_rows( 'about_service_agency_section' ) ) : ?>
    <?php 
    $has_content = false;
    while ( have_rows( 'about_service_agency_section' ) ) : the_row();
        if ( have_rows( 'about_service_agency_list' ) ) :
            $has_content = true;
            break; 
        endif;
    endwhile;

  
    if ( $has_content ) : ?>
        <section class="visitors-wrp margin_top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-sm-7">
                        <div class="visitors-text">
                            <?php while ( have_rows( 'about_service_agency_section' ) ) : the_row(); ?>
                                <?php if ( have_rows( 'about_service_agency_list' ) ) : ?>
                                    <div class="heading">
                                        <h2><?php the_sub_field( 'heading' ); ?></h2>
                                        <?php the_sub_field( 'description' ); ?>
                                    </div>
                                    <div class="visitor-pera-wrp">
                                        <?php while ( have_rows( 'about_service_agency_list' ) ) : the_row(); ?>
                                            <div class="visitor-pera">
                                                <div class="circle-arrow">
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </div>
                                                <p><?php the_sub_field( 'heading_of_about_service' ); ?></p>
                                            </div>
                                        <?php endwhile; ?>
                                    </div>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?>
 -->

<!-- 
<?php if ( have_rows( 'talk_to_expert__section' ) ) : ?>
    <?php while ( have_rows( 'talk_to_expert__section' ) ) : the_row(); ?>
        <?php 
        $heading = get_sub_field( 'heading' );
        $heading_two = get_sub_field( 'heading_two' );
        $contact_page_url = get_sub_field( 'contact_page_url' );
        $contact_to_expert_text = get_sub_field( 'contact_to_expert_text' );

        // Check if any required subfields have content
        if ( $heading || $heading_two || ( $contact_page_url && $contact_to_expert_text ) ) : 
        ?>
            <section class="expert-now-wrp bg_blue margin_top padding_top_bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <?php if ( $heading ) : ?>
                            <div class="col-lg-4 col-sm-4">
                                <div class="expert-now-text-wrp">
                                    <div class="heading">
                                        <?php echo $heading; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ( $heading_two ) : ?>
                            <div class="col-lg-4 col-sm-4">
                                <div class="expert-now-text-wrp">
                                    <div class="heading text-center">
                                        <h3><?php echo $heading_two; ?> </h3>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ( $contact_page_url && $contact_to_expert_text ) : ?>
                            <div class="col-lg-4 col-sm-4">
                                <div class="expert-now-text-wrp">
                                    <div class="main_btn">
                                        <a class="bg_black" href="<?php echo esc_url( $contact_page_url ); ?>">
                                            <?php echo $contact_to_expert_text; ?> 
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
 -->
<!-- 
<?php if ( have_rows( 'video_advertising' ) ) : ?>
    <?php while ( have_rows( 'video_advertising' ) ) : the_row(); ?>
        <?php 
        // Check if the key fields have any content
        $heading = get_sub_field( 'heading' );
        $description = get_sub_field( 'description' );
        $icon_image = get_sub_field( 'icon_image' );
        $express_this_service = get_sub_field( 'express_this_service' );
        $list_of_expertise_exists = have_rows( 'list_of_expertise' );

        // Only show the section if at least one of these has content
        if ( $heading || $description || $icon_image || $express_this_service || $list_of_expertise_exists ) : 
        ?>
            <section class="video-advertising-wrp margin_top">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-sm-8">
                            <div class="video-advertising-text">
                                <?php if ( $heading || $description ) : ?>
                                    <div class="heading">
                                        <?php if ( $heading ) : ?>
                                            <h2><?php echo esc_html( $heading ); ?></h2>
                                        <?php endif; ?>
                                        <?php if ( $description ) : ?>
                                            <div class="sub_pera">
                                                <p><?php echo esc_html( $description ); ?></p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ( $list_of_expertise_exists ) : ?>
                                    <div class="video-advertising-list">
                                        <ul>
                                            <?php while ( have_rows( 'list_of_expertise' ) ) : the_row(); ?>
                                                <?php $icon = get_sub_field( 'icon' ); ?>
                                                <?php $expertise_heading = get_sub_field( 'heading' ); ?>
                                                <?php if ( $icon || $expertise_heading ) : ?>
                                                    <li>
                                                        <?php if ( $icon ) : ?>
                                                            <div class="tick-img">
<?php echo di_infotech_image( $icon, 'di-logo', array( 'sizes' => '(max-width: 767px) 100px, 160px' ) ); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if ( $expertise_heading ) : ?>
                                                            <div class="tick-text">
                                                                <?php echo esc_html( $expertise_heading ); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endwhile; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="video-advertising-bottom">
                                <?php if ( $icon_image ) : ?>
                                    <div class="youtube-img">
<?php echo di_infotech_image( $icon_image, 'di-logo', array( 'sizes' => '(max-width: 767px) 100px, 160px' ) ); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ( $express_this_service ) : ?>
                                    <div class="sub_pera">
                                        <p><?php echo esc_html( $express_this_service ); ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
 -->




<!-- 

<?php if ( have_rows( 'advertising_core_warp_section_bottom' ) ) : ?>
    <?php 
    $has_valid_content = false; 

    
    while ( have_rows( 'advertising_core_warp_section_bottom' ) ) : the_row();

        if ( have_rows( 'advertising_nav_section' ) ) {
            while ( have_rows( 'advertising_nav_section' ) ) : the_row();
                if ( have_rows( 'advertising_nav_details_section' ) ) {
                    $has_valid_content = true; 
                    break 2;
                }
            endwhile;
            reset_rows(); 
        }

    endwhile;

   
    if ( $has_valid_content ) : 
    ?>
        <section class="advertising-wrp bg_black margin_top padding_top_bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="advertising-nav-new advertising-nav nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <?php 
                            $first_tab = true; 
                            while ( have_rows( 'advertising_core_warp_section_bottom' ) ) : the_row();
                                while ( have_rows( 'advertising_nav_section' ) ) : the_row(); 
                            ?>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link <?php echo $first_tab ? 'active' : ''; ?>" id="pills-<?php echo get_row_index(); ?>-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-<?php echo get_row_index(); ?>" type="button" role="tab"
                                        aria-controls="pills-<?php echo get_row_index(); ?>"
                                        aria-selected="<?php echo $first_tab ? 'true' : 'false'; ?>">
                                        <?php the_sub_field( 'advertising_nav_heading' ); ?>
                                    </button>
                                </li>
                                <?php $first_tab = false; ?>
                                <?php endwhile; ?>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                    <div class="col-lg-12">
                        <div class="tab-content" id="pills-tabContent">
                            <?php 
                            $first_tab_content = true; 
                            while ( have_rows( 'advertising_core_warp_section_bottom' ) ) : the_row();
                                while ( have_rows( 'advertising_nav_section' ) ) : the_row(); 
                            ?>
                                <div class="tab-pane fade <?php echo $first_tab_content ? 'show active' : ''; ?>" id="pills-<?php echo get_row_index(); ?>" role="tabpanel"
                                    aria-labelledby="pills-<?php echo get_row_index(); ?>-tab">
                                    <div class="row align-items-center justify-content-center margin_top">
                                        <div class="col-lg-10 col-sm-10">
                                            <?php while ( have_rows( 'advertising_nav_details_section' ) ) : the_row(); ?>
                                                <div class="row align-items-center flex_direction">
                                                    <div class="col-lg-6 col-sm-6">
                                                        <div class="growth-img">
                                                            <?php $image = get_sub_field( 'image' ); ?>
                                                            <?php if ( $image ) : ?>
<?php echo di_infotech_image( $image, 'di-card', array(  ) ); ?>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6">
                                                        <div class="growth-text">
                                                            <div class="heading">
                                                                <h2><?php the_sub_field( 'heading' ); ?></h2>
                                                                <div class="sub_pera">
                                                                    <p><?php the_sub_field( 'advertising_nav_details' ); ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="main_btn">
                                                                <a class="bg_yellow" href="<?php the_sub_field( 'Details_page_url' ); ?>">Contact Us<i class="fa-solid fa-arrow-right"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endwhile; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php $first_tab_content = false;  ?>
                                <?php endwhile; ?>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?>



 -->



<!-- black -->

<!-- 
<?php if ( have_rows( 'service_growth_section' ) ) : ?>
    <?php while ( have_rows( 'service_growth_section' ) ) : the_row(); ?>
        <?php if ( get_sub_field( 'heading' ) || get_sub_field( 'description' ) || have_rows( 'service_growth_steps' ) ) : ?>
            <section class="support-wrp bg_black padding_top_bottom ">
                <div class="container">
                    <div class="row">
                        <?php if ( get_sub_field( 'heading' ) || get_sub_field( 'description' ) ) : ?>
                            <div class="col-lg-8 col-sm-8">
                                <div class="support-text">
                                    <div class="heading">
                                        <?php if ( get_sub_field( 'heading' ) ) : ?>
                                            <h2><?php the_sub_field( 'heading' ); ?></h2>
                                        <?php endif; ?>
                                        <?php if ( get_sub_field( 'description' ) ) : ?>
                                            <div class="sub_pera">
                                                <p><?php the_sub_field( 'description' ); ?></p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php if ( have_rows( 'service_growth_steps' ) ) : ?>
                        <div class="row">
                            <?php while ( have_rows( 'service_growth_steps' ) ) : the_row(); ?>
                                <div class="col-lg-2 col-sm-2 col-xs-6">
                                    <div class="support-icons-wrp">
                                        <?php $growth_step_image = get_sub_field( 'growth_step_image' ); ?>
                                        <?php if ( $growth_step_image ) : ?>
<?php echo di_infotech_image( $growth_step_image, 'di-card', array(  ) ); ?>
                                        <?php endif; ?>
                                        <div class="main-nav">
                                            <p class="bg_yellow"><?php the_sub_field( 'growth_step_name' ); ?></p>
                                        </div>
                                        <div class="sub_pera">
                                            <p><?php the_sub_field( 'short_description_about_growth_step' ); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>

 -->


<!-- seo content section start -->
<?php 
$seo_content = get_field('seo_content'); 
?>

<?php if ( $seo_content ) : ?>
<section class="brands">
    <div class="container">
        <div class="row justify-content-left">
            <div class="col-lg-12">
                <div class="heading text-left">

                    <?php if ( !empty($seo_content['main_heading']) ) : ?>
                        <h2><?php echo esc_html( $seo_content['main_heading'] ); ?></h2>
                    <?php endif; ?>

                    <?php if ( !empty($seo_content['sub_pera']) ) : ?>
                        <div class="sub-heading">
                            <?php echo wp_kses_post( $seo_content['sub_pera'] ); ?>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- seo content section start -->






<?php

if (!$di_embed_service_body) {
    get_footer();
}
