<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DI_Infotech
 */

?>

            <!-- footer section start  -->

            <footer class="padding_top_bottom bg_black ">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="main_wrapper">
                                <div class="row align-items-center row_reverse">
                                    <div class="col-lg-4 col-sm-4 col-xs-6">
                                        <div class="download_btn">
                                            <a href="<?php echo esc_url( get_template_directory_uri() . '/assets/pdf/diinfotech_profile.pdf' ); ?>" target="_blank" rel="noopener noreferrer">
                                                <div class="download_arrow">
<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/down-arrow.png' ); ?>" alt="" loading="lazy" width="157" height="158" decoding="async">
                                                </div>
                                                Company profile
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-xs-6">
                                        <div class="footer_logo text-center">
                                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/logo.svg' ); ?>" alt="<?php esc_attr_e( 'DI Infotech', 'di-infotech' ); ?>" loading="lazy" width="261" height="72" decoding="async">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="back_top">
                                            <a href="#">
                                                <div class="up_arrow">
<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/up-arrow.png' ); ?>" alt="" loading="lazy" width="157" height="158" decoding="async">
                                                </div>
                                                Back to Top
                                            </a>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-lg-7 col-sm-7">

                            <div class="row">
                            <?php if ( have_rows( 'footer_1', 'option' ) ) : ?> 
    <?php while ( have_rows( 'footer_1', 'option' ) ) : the_row(); $footer_group_index = get_row_index(); $footer_accordion_id = 'footer-accordion-' . $footer_group_index; ?>
        <div class="col-lg-6 col-sm-6">
            <div class="footer_main_link">
                <div class="footer_heading">
                    <h2><?php echo esc_html( get_sub_field( 'heading' ) ); ?></h2>
                </div>
                <div class="accordion_wrp">
                    <div class="accordion" id="<?php echo esc_attr( $footer_accordion_id ); ?>">
                        <?php if ( have_rows( 'main_menus' ) ) : ?>
                            <?php 
                                $first_accordion = true; // Flag to track the first accordion
                                while ( have_rows( 'main_menus' ) ) : the_row(); 
                            ?>
                                <?php $footer_panel_id = 'footer-collapse-' . $footer_group_index . '-' . get_row_index(); ?>
                                <div class="accordion-item">
                                    <button class="accordion-button <?php echo $first_accordion ? '' : 'collapsed'; ?>" type="button"
                                        data-bs-toggle="collapse" 
                                        data-bs-target="#<?php echo esc_attr( $footer_panel_id ); ?>" 
                                        aria-expanded="<?php echo $first_accordion ? 'true' : 'false'; ?>" 
                                        aria-controls="<?php echo esc_attr( $footer_panel_id ); ?>">
                                        <?php echo esc_html( get_sub_field( 'manu_name' ) ); ?>
                                    </button>
                                    <div id="<?php echo esc_attr( $footer_panel_id ); ?>" class="accordion-collapse collapse <?php echo $first_accordion ? 'show' : ''; ?>"
                                        data-bs-parent="#<?php echo esc_attr( $footer_accordion_id ); ?>">
                                        <div class="footer_links">
                                            <ul>
                                                <?php if ( have_rows( 'submenus' ) ) : ?>
                                                    <?php while ( have_rows( 'submenus' ) ) : the_row(); ?>
                                                        <li>
                                                            <?php $menu_url = get_sub_field( 'menu_url' ); ?>
                                                            <?php if ( $menu_url ) : ?>
                                                                <?php $menu_target = $menu_url['target'] ?: '_self'; ?>
                                                                <a href="<?php echo esc_url( $menu_url['url'] ); ?>" target="<?php echo esc_attr( $menu_target ); ?>"<?php echo '_blank' === $menu_target ? ' rel="noopener noreferrer"' : ''; ?>>
                                                                    <?php echo esc_html( $menu_url['title'] ); ?>
                                                                </a>
                                                            <?php endif; ?>
                                                        </li>
                                                    <?php endwhile; ?>
                                                <?php else : ?>
                                                    <?php // No submenus found ?>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php $first_accordion = false; // Set to false after the first iteration ?>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <?php // No rows found ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>



                                <div class="col-lg-6 col-sm-6">
                                    <div class="footer_main_link">
                                    <?php if ( have_rows( 'footer2', 'option' ) ) : ?>
                                        <?php while ( have_rows( 'footer2', 'option' ) ) : the_row(); ?>
                                        <div class="footer_wrapper">
                                            <div class="footer_heading">
                                                <h2>	<?php the_sub_field( 'heading' ); ?></h2>
                                            </div>
                                            <div class="footer_links">
                                                <ul>
                                                <?php if ( have_rows( 'menus' ) ) : ?>
                                                    <?php while ( have_rows( 'menus' ) ) : the_row(); ?>
                                                    <li>
                                                    <?php $manu_name = get_sub_field( 'manu_name' ); ?>
				<?php if ( $manu_name ) : ?>
					<a href="<?php echo esc_url( $manu_name['url'] ); ?>" target="<?php echo esc_attr( $manu_name['target'] ); ?>"><?php echo esc_html( $manu_name['title'] ); ?></a>
				<?php endif; ?>
                                                    </li>
                                                    <?php endwhile; ?>
		<?php else : ?>
			<?php // no rows found ?>
		<?php endif; ?>
		<li><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">Blog</a>
				                                                    </li>
                                                   
                                                </ul>
                                            </div>
                                        </div>
                                        <?php endwhile; ?>
                                        <?php endif; ?> 

                                        <!-- OUR VENTURES -->

                                        <?php if ( have_rows( 'our_ventures', 'option' ) ) : ?>
                                            <?php while ( have_rows( 'our_ventures', 'option' ) ) : the_row(); ?>
                                        <div class="footer_wrapper">
                                            <div class="footer_heading">
                                                <h2><?php the_sub_field( 'heading' ); ?></h2>
                                            </div>
                                            <div class="footer_links">
                                                <ul>
                                                <?php if ( have_rows( 'our_ventures' ) ) : ?>
                                                    <?php while ( have_rows( 'our_ventures' ) ) : the_row(); ?>
                                                    <li>
                                                        <a href="<?php the_sub_field( 'ventures_url' ); ?>">
                                                        <?php the_sub_field( 'ventures_name' ); ?>
                                                        </a>
                                                    </li>
                                                    <?php endwhile; ?>
	                                            	<?php else : ?>
	                                            		<?php // no rows found ?>
	                                            	<?php endif; ?>

                                                </ul>
                                            </div>
                                        </div>
                                        <?php endwhile; ?>
                                        <?php endif; ?>
                                        <div class="footer_wrapper">
                                            <div class="footer_heading">
                                                <h2>Socialize with Us
                                                </h2>
                                            </div>
                                            <div class="social_media_icon">
                                                <ul>
                                                    <li>
                                                        <a href="https://www.facebook.com/diinfotech" target="_blank" rel="noopener noreferrer" aria-label="DI Infotech on Facebook">
                                                            <i class="fa-brands fa-square-facebook"></i>
                                                        </a>
                                                    </li>
                                                   
                                                    <li>
                                                        <a href="https://www.linkedin.com/company/diinfotech" target="_blank" rel="noopener noreferrer" aria-label="DI Infotech on LinkedIn">
                                                            <i class="fa-brands fa-linkedin"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.instagram.com/diinfotech/" target="_blank" rel="noopener noreferrer" aria-label="DI Infotech on Instagram">
                                                            <i class="fa-brands fa-square-instagram"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-sm-5">
                            <div class="form_wrp">
                               <?php echo do_shortcode( '[contact-form-7 id="74f8ced" title="footer from"]' );?>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="bottom_content">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="address_details">
                                            <ul>
                                                <li>
                                                    <div class="footer_icon">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/footer_call.png" alt="" width="180" height="202" loading="lazy" decoding="async">
                                                    </div>
                                                    <div class="footer_text">
                                                        <a href="tel:+919810052141">+91-9810052141
                                                        </a>
                                                        <br>
                                                        <a href="tel:01145620844"> +91-11-45620844</a>

                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="address_details">
                                            <ul>
                                                <li>
                                                    <div class="footer_icon">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/footer-mail.png" alt="" width="180" height="202" loading="lazy" decoding="async">
                                                    </div>
                                                    <div class="footer_text">
                                                        <a href="mailto:info@diinfotech.com">info@diinfotech.com
                                                        </a>

                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="address_details">
                                            <ul>
                                                <li>
                                                    <div class="footer_icon">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/footer-map.png" alt="" width="180" height="202" loading="lazy" decoding="async">
                                                    </div>
                                                    <div class="footer_text">
                                                        <a href="https://maps.app.goo.gl/X8UEjyHnX1LaoKYs6">301, G-27, Pankaj Tower - IV,
                                                            Commercial Complex
                                                            (Behind Sonia PVR Cinema),
                                                            Vikaspuri, New Delhi-110018
                                                        </a>

                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                      

                    </div>

                    
                </div>
            </footer>


            <section class="copy_right">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="copy_pera text-center">
                                <p>Copyright &copy; 2005-<?php $year = date("Y");  echo $year ?>. DI Infotech Leaders Pvt. Ltd. All Rights Reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <!-- footer section end  -->


        </div>
    </section>
    
    <?php $di_contact_hero_class = ! empty( $GLOBALS['di_theme_hero'] ) ? ' di-hero-contact' : ''; ?>
    <div class="whatsapp-button call_fix-button<?php echo esc_attr( $di_contact_hero_class ); ?>">
                <a href="<?php echo get_home_url(); ?>/contact">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/fix-call-112.webp" alt="Contact DI Infotech" width="112" height="112" loading="lazy" decoding="async">
                </a>
              </div>
    <div class="call-button<?php echo esc_attr( $di_contact_hero_class ); ?>">
                <a href="tel:+919810052141">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/call-112.webp" alt="Call DI Infotech" width="112" height="112" loading="lazy" decoding="async">
                </a>
              </div>

            <div class="whatsapp-button<?php echo esc_attr( $di_contact_hero_class ); ?>">
              <a href="https://api.whatsapp.com/send?l=en&amp;phone=+919810052141&amp;text=Hi..," target="_blank">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/whatsapp-112.webp" alt="Chat with DI Infotech on WhatsApp" width="112" height="112" loading="lazy" decoding="async">
              </a>
            </div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
