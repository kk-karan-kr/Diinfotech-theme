<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package DI_Infotech
 */

get_header();
?>

	<main id="primary" class="site-main">

	<!--	<section class="error-404 not-found padding_top_bottom">
			<header class="page-header" style="padding:0px; box-shadow:none;z-index:0;">
				<h1 class="page-title text-center"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'di-infotech' ); ?></h1>
			</header><!-- .page-header 

		
		</section> .error-404 -->
		
		
		<section class="not_found padding_top_bottom grey-bg">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">

                            <div class="not_found_wrp">
                                <div class="not_found_heading">
                                    <h2 class="text_blue">OPPS! </h2>
                                </div>
                                <div class="heading">
                                    <h2>The Page Not Found</h2>
                                    <p>The Link You Folowed Probably Broken, or the page has been removed.
                                    </p>
                                </div>

                                <div class="not_found_img">
                                    <img src="<?php echo esc_url( content_url( '/uploads/2025/08/404-image.png' ) ); ?>" alt="<?php esc_attr_e( 'Page not found', 'di-infotech' ); ?>">
                                </div>
                                <div class="main_btn " 
                                    data-aos-duration="1500">
                                    <a class="bg_yellow" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Go To Home', 'di-infotech' ); ?></a>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </section>


	</main><!-- #main -->

<?php
get_footer();
