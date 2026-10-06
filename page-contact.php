<?php
 /* Template Name: Contact */

get_header();
?>



            <!-- Contact Us section start  -->
            <?php if ( have_rows( 'contact_section' ) ) : ?>
                <?php while ( have_rows( 'contact_section' ) ) : the_row(); ?>

            <section class="contact_us padding_top_bottom bg_black">
                <div class="container">
                    <div class="contact_circle">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/contact_circle.png" alt="" width="1211" height="606" loading="lazy" decoding="async">
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-sm-5">
                            <div class="heading text-center" data-aos="zoom-in" data-aos-delay=".5s" data-aos-duration="2300">
                                <h2><?php the_sub_field( 'heading' ); ?></h2>
                                <p>	<?php the_sub_field( 'description' ); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                        <?php

echo do_shortcode( get_sub_field( 'contact_form_shortcode' ) );
?>

                        </div>
                    </div>
                </div>
            </section>

            <!-- Contact Us section end  -->


            <!-- Address section start  -->

            <section class="address padding_top_bottom">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="heading text-center" data-aos="zoom-in" data-aos-delay=".1s" data-aos-duration="1500">
                                <h2 class="text-white"><?php the_sub_field( 'main_heading' ); ?></h2>
                            </div>
                        </div>
                    </div>
                    <?php if ( have_rows( 'our_address_or_locations' ) ) : ?>
                        <?php while ( have_rows( 'our_address_or_locations' ) ) : the_row(); ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="state_heading text-center" data-aos="zoom-in" data-aos-delay=".3s" data-aos-duration="1500">
                                <h4>	<?php the_sub_field( 'location_heading' ); ?> </h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6" data-aos="fade-right" data-aos-delay=".5s" data-aos-duration="2000">

                            <div class="address_details_wrp">
                                <div class="address_flex">
                                    <div class="address_icon">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/address_icon.png" alt="" width="277" height="277" loading="lazy" decoding="async">
                                    </div>
                                    <div class="address_text">
                                        <p><?php the_sub_field( 'office_address' ); ?></p>
                                    </div>
                                </div>
                                <div class="address_flex">
                                    <div class="address_icon">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/mail_icon.png" alt="" width="277" height="277" loading="lazy" decoding="async">
                                    </div>
                                    <div class="address_text">
                                    <?php if ( have_rows( 'mail_ids' ) ) : ?>
                                        <?php while ( have_rows( 'mail_ids' ) ) : the_row(); ?>
                                        <a href="mailto:<?php the_sub_field( 'enter_email' ); ?>"><?php the_sub_field( 'enter_email' ); ?></a><br>
                                        <?php endwhile; ?>
			                        	<?php else : ?>
			                        		<?php // no rows found ?>
			                        	<?php endif; ?>
                                       
                                    </div>
                                </div>
                                <div class="address_flex">
                                    <div class="address_icon">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/call_icon.png" alt="" width="277" height="277" loading="lazy" decoding="async">
                                    </div>
                                    <div class="address_text">
                                    <?php if ( have_rows( 'phone_numbers' ) ) : ?>
                                        <?php while ( have_rows( 'phone_numbers' ) ) : the_row(); ?>
                                        <a href="tel:<?php the_sub_field( 'enter_phone_number' ); ?>"><?php the_sub_field( 'enter_phone_number' ); ?></a><br>
                                        <?php endwhile; ?>
			                            <?php else : ?>
			                            	<?php // no rows found ?>
			                            <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6" data-aos="fade-left" data-aos-delay=".5s" data-aos-duration="2000">

                            <div class="map ">
                                <iframe
                                    src="<?php the_sub_field( 'loccation_url' ); ?>"
                                    allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>

                    <?php endwhile; ?>
		<?php else : ?>
			<?php // no rows found ?>
		<?php endif; ?>

                  
                </div>
            </section>

            <!-- Address section end  -->

            <?php endwhile; ?>
            <?php endif; ?>

<?php get_footer();
