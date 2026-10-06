<?php
 /* Template Name: About */

get_header();
?>



<?php if ( have_rows( 'top_banner_section' ) ) : ?>
	<?php while ( have_rows( 'top_banner_section' ) ) : the_row(); ?>
<section class="marketing-wrp bg_black padding_top_bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 ">
                            <div class="marketing-text">
                                <div class="heading" data-aos="zoom-in" data-aos-delay=".3s"
                                data-aos-duration="1500">
                                    <h2><?php the_sub_field( 'heading' ); ?></h2>
                                    <div class="sub_pera  ">
                                        <p><?php the_sub_field( 'description' ); ?></p>
                                    </div>
                                </div>
                                <div class="main_btn " data-aos="zoom-in" data-aos-delay=".3s"
                                data-aos-duration="1500">
                                <?php $contact_page_url = get_sub_field( 'contact_page_url' ); ?>
		<?php if ( $contact_page_url ) : ?>
			<a class="bg_blue" href="<?php echo esc_url( $contact_page_url['url'] ); ?>" target="<?php echo esc_attr( $contact_page_url['target'] ); ?>"><?php echo esc_html( $contact_page_url['title'] ); ?></a>
		<?php endif; ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php endwhile; ?>
            <?php endif; ?>



            <?php if ( have_rows( 'our_key_to_excellence_section' ) ) : ?>
                <?php while ( have_rows( 'our_key_to_excellence_section' ) ) : the_row(); ?>
            <section class="excellence-wrp margin_top">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-9">
                            <div class="excellence-text text-center">
                                <div class="heading" >
                                    <h2 data-aos="fade-up" data-aos-delay=".3s"
                                    data-aos-duration="1500"><?php the_sub_field( 'heading' ); ?></h2>
                                    <div class="sub_pera  " data-aos="fade-up" data-aos-delay=".2s"
                                    data-aos-duration="2000">
                                        <p><?php the_sub_field( 'description' ); ?>
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-11">
                            <div class="row">
                            <?php if ( have_rows( 'key_to_excellence' ) ) : ?>
                                <?php while ( have_rows( 'key_to_excellence' ) ) : the_row(); ?>
                                <div class="col-lg-6 col-sm-6">
                                    <div class="key-feature-wrp " data-aos="fade-right" data-aos-delay=".3s"
                                    data-aos-duration="1500">
                                        <div class="key-feature-text">
                                            <h3><?php the_sub_field( 'key_excellence_heading' ); ?></h3>
                                            <p><?php the_sub_field( 'key_excellence_description' ); ?></p>
                                        </div>
                                        <div class="feature_icon">
                                        <?php $key_excellence_iconimage = get_sub_field( 'key_excellence_iconimage' ); ?>
				<?php if ( $key_excellence_iconimage ) : ?>
<?php echo di_infotech_image( $key_excellence_iconimage, 'di-logo', array( 'sizes' => '(max-width: 767px) 100px, 160px' ) ); ?>
				<?php endif; ?>
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






  <!-- brand section start  -->
  <?php if ( have_rows( 'our_valuable_brands', 'option' ) ) : ?>
	<?php while ( have_rows( 'our_valuable_brands', 'option' ) ) : the_row(); ?>
            <section class="brands margin_top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="heading text-center " data-aos="zoom-in" data-aos-delay=".3s"
                                data-aos-duration="1500">
                                <h2>Top Brands That Achieved Massive Growth with Us<!-- <?php the_sub_field( 'brand_heading' ); ?> --></h2>
                                <p>For years, DI Infotech has been the driving force behind skyrocketing sales and brand dominance for businesses across industries. We create profit-driven strategies that help brands scale faster, maximize revenue, and outperform competitors. Our expertise ensures high visibility, consistent lead generation, and unstoppable growth for every client.<?php the_sub_field( 'brands_description' ); ?></p>
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







            <!-- about us Section -->
            <?php if ( have_rows( 'about_section' ) ) : ?>
                <?php while ( have_rows( 'about_section' ) ) : the_row(); ?>
            <section class="strategic_creative padding_top_bottom grey-bg margin_top">
                <div class="container">
                    <div class="row flex_direction align-items-center">
                        <div class="col-lg-6 col-sm-6">
                            <div class="team" data-aos="fade-down" data-aos-delay=".3s"
                            data-aos-duration="1500">
                            <?php $image = get_sub_field( 'image' ); ?>
		<?php if ( $image ) : ?>
<?php echo di_infotech_image( $image, 'di-card', array(  ) ); ?>
		<?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6" data-aos="fade-up" data-aos-delay=".3s"
                        data-aos-duration="1500">
                            <div class="heading">
                                <h2><?php the_sub_field( 'heading' ); ?></h2>

                                <?php the_sub_field( 'description' ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php endwhile; ?>
            <?php endif; ?>








            <?php if ( have_rows( 'business_growth_section' ) ) : ?>
                <?php while ( have_rows( 'business_growth_section' ) ) : the_row(); ?>
            <section class="business-growth-wrp margin_top">
                <div class="container">
                    <div class="row">

                    <?php if ( have_rows( 'business_growth_list' ) ) : ?>
                        <?php while ( have_rows( 'business_growth_list' ) ) : the_row(); ?>
                        <div class="col-lg-3 col-sm-3">

                            <div class="business-growth" data-aos="fade-up" data-aos-delay=".1s"
                            data-aos-duration="1500">
                                <div class="growth">
                                <?php $image_icon = get_sub_field( 'image_icon' ); ?>
				<?php if ( $image_icon ) : ?>
<?php echo di_infotech_image( $image_icon, 'di-logo', array( 'sizes' => '(max-width: 767px) 100px, 160px' ) ); ?>
				<?php endif; ?>
                                </div>

                                <div class="heading">

                                    <h3><?php the_sub_field( 'heading' ); ?></h3>
                                    <div class="sub_pera">
                                        <p><?php the_sub_field( 'description' ); ?>
                                        </p>

                                    </div>
                                </div>

                            </div>



                        </div>
                        <?php endwhile; ?>
		<?php else : ?>
			<?php // no rows found ?>
		<?php endif; ?>



                      
                        <div class="col-lg-3 col-sm-3">

                            <div class="business-growth" data-aos="fade-up" data-aos-delay=".4s"
                            data-aos-duration="3000">

                                <div class="heading">

                                    <h2><?php the_sub_field( 'heading' ); ?></h2>
                                    <?php the_sub_field( 'business_growth_support_description' ); ?>
                                    <div class="main_btn">
                                    <?php $contact_url = get_sub_field( 'contact_url' ); ?>
		<?php if ( $contact_url ) : ?>
			<a class="bg_yellow" href="<?php echo esc_url( $contact_url['url'] ); ?>" target="<?php echo esc_attr( $contact_url['target'] ); ?>"><?php echo esc_html( $contact_url['title'] ); ?></a>
		<?php endif; ?>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>



                </div>

            </section>
            <?php endwhile; ?>
            <?php endif; ?>




<!-- Why Di -->
            <?php if ( have_rows( 'why_choose_us' ) ) : ?>
                <?php while ( have_rows( 'why_choose_us' ) ) : the_row(); ?>
            <section class="visitors-wrp margin_top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-sm-7" data-aos="fade-right" data-aos-delay=".3s"
                        data-aos-duration="1500">
                            <div class="visitors-text">
                                <div class="heading">
                                    <h2><?php the_sub_field( 'why_choose_us_heading' ); ?></h2>
                                </div>
                                <div class="visitor-pera-wrp ">
                                <?php if ( have_rows( 'why_choose_us_list' ) ) : ?>
                                    <?php while ( have_rows( 'why_choose_us_list' ) ) : the_row(); ?>
                                    <div class="visitor-pera why-di-mb">

                                        <div class="circle-arrow-blue">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </div>
                                        <div class="heading">

                                            <h3><?php the_sub_field( 'why_choose_heading' ); ?></h3>

                                            <p><?php the_sub_field( 'why_choose_description' ); ?>
                                            </p>

                                        </div>


                                    </div>

                                    <?php endwhile; ?>
	                                	<?php else : ?>
	                                		<?php // no rows found ?>
	                                	<?php endif; ?>


                               




                                </div>

                            </div>
                        </div>
                        <div class="col-lg-5 col-sm-5">
                            <div class="team" data-aos="fade-left" data-aos-delay=".3s"
                            data-aos-duration="1500">
                            <?php $why_choose_image = get_sub_field( 'why_choose_image' ); ?>
		<?php if ( $why_choose_image ) : ?>
<?php echo di_infotech_image( $why_choose_image, 'di-card', array(  ) ); ?>
		<?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>

            </section>
            <?php endwhile; ?>
            <?php endif; ?>







            <!-- consultant  -->
            <?php if ( have_rows( 'digital_consultants_section' ) ) : ?>
                <?php while ( have_rows( 'digital_consultants_section' ) ) : the_row(); ?>
            <section class="consultant-wrp padding_top_bottom bg_black margin_top">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="heading text-center">
                                <h2><?php the_sub_field( 'heading' ); ?></h2>
                                
                            </div>

                        </div>
                    </div>
                    <div class="row  justify-content-center">
                        <div class="col-lg-11">
                            <div class="row">


                            <?php if ( have_rows( 'why_digital_consultants' ) ) : ?>
                                <?php while ( have_rows( 'why_digital_consultants' ) ) : the_row(); ?>


                                <div class="col-lg-6 col-sm-6" data-aos="fade-up" data-aos-delay=".1s"
                                data-aos-duration="1000">
                                    <div class="consultant-content-wrp">

                                        <div class="consultant-content">
                                            <div class="heading">
                                                <h3><?php the_sub_field( 'heading' ); ?> </h3>
                                            </div>
                                            <div class="consultant-img">
                                            <?php $icon = get_sub_field( 'icon' ); ?>
				<?php if ( $icon ) : ?>
<?php echo di_infotech_image( $icon, 'di-logo', array( 'sizes' => '(max-width: 767px) 100px, 160px' ) ); ?>
				<?php endif; ?>

                                            </div>

                                        </div>
                                        <div class="sub_pera grey-text">
                                            <p><?php the_sub_field( 'description' ); ?>
                                            </p>

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






           

            
            <!-- our clients section start  -->
            <?php if ( have_rows( 'our_testimonials', 'option' ) ) : ?>
                <?php while ( have_rows( 'our_testimonials', 'option' ) ) : the_row(); ?>
            <section class="our_clients grey-bg padding_top_bottom ">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="heading" data-aos="fade-right" data-aos-delay=".5s" data-aos-duration="1500">
                                <h2><?php the_sub_field( 'heading' ); ?></h2>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="client_slider owl-carousel">
                <?php if ( have_rows( 'valuable_testimonials' ) ) : ?>
                    <?php while ( have_rows( 'valuable_testimonials' ) ) : the_row(); ?>
                    <div class="client_wrp" data-aos="fade-right" data-aos-delay=".5s" data-aos-duration="1500">
                        <div class="client_heading">
                            <h3><?php the_sub_field( 'heading' ); ?></h3>
                            <p><?php the_sub_field( 'description' ); ?></p>
                        </div>
                        <div class="clients_details">
                            <div class="user_img">
                            <?php $user_image = get_sub_field( 'user_image' ); ?>
				                <?php if ( $user_image ) : ?>
<?php echo di_infotech_image( $user_image, 'di-card', array(  ) ); ?>
				                <?php endif; ?>
                            </div>
                            <div class="user_name">
                                <p><?php the_sub_field( 'user_name' ); ?></p>
                                <span><?php the_sub_field( 'user_designation' ); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
	                	<?php else : ?>
	                		<?php // no rows found ?>
	                	<?php endif; ?>
                 
                </div>

            </section>
            <?php endwhile; ?>
            <?php endif; ?>
            <!-- our clients section end  -->





<?php get_footer();
