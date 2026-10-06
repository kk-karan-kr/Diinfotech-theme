<?php
/* Template Name: Portfolio */
get_header();
$categories = array(
    'website' => array( 'label' => 'Website', 'field' => 'website_portfolio', 'prefix' => 'website', 'columns' => 'col-lg-6' ),
    'landing' => array( 'label' => 'Landing Page', 'field' => 'landing_page', 'prefix' => 'landing_page', 'columns' => 'col-lg-6' ),
    'email' => array( 'label' => 'Email', 'field' => 'our_emailers', 'prefix' => 'emailer', 'columns' => 'col-lg-4' ),
    'creative' => array( 'label' => 'Creatives', 'field' => 'our_creatives', 'prefix' => 'creatives', 'columns' => 'col-lg-4' ),
);
$selected = isset( $_GET['portfolio_type'] ) && is_string( $_GET['portfolio_type'] ) ? sanitize_key( wp_unslash( $_GET['portfolio_type'] ) ) : 'website';
$selected = isset( $categories[ $selected ] ) ? $selected : 'website';
$config = $categories[ $selected ];
$rows = function_exists( 'get_field' ) ? (array) get_field( $config['field'], 'option' ) : array();
$rows = array_values( array_filter( $rows, 'is_array' ) );
$per_page = 8;
$total_pages = max( 1, (int) ceil( count( $rows ) / $per_page ) );
$page_number = isset( $_GET['portfolio_page'] ) && is_scalar( $_GET['portfolio_page'] ) ? min( $total_pages, max( 1, absint( $_GET['portfolio_page'] ) ) ) : 1;
$base_url = get_permalink();
?>
<section class="portfolio-wrp padding_top_bottom" id="portfolio-projects">
    <div class="container-fluid"><div class="row"><div class="col-lg-12">
        <nav aria-label="Portfolio categories"><ul class="nav nav-pills mb-3">
        <?php foreach ( $categories as $key => $category ) : ?>
            <li class="nav-item"><a class="nav-link<?php echo $selected === $key ? ' active' : ''; ?>" <?php echo $selected === $key ? 'aria-current="page"' : ''; ?> href="<?php echo esc_url( add_query_arg( 'portfolio_type', $key, $base_url ) . '#portfolio-projects' ); ?>"><?php echo esc_html( $category['label'] ); ?></a></li>
        <?php endforeach; ?>
        </ul></nav>
        <div class="row">
        <?php foreach ( array_slice( $rows, ( $page_number - 1 ) * $per_page, $per_page ) as $item ) :
            $prefix = $config['prefix'];
            $url = $item[ $prefix . '_url' ] ?? '';
            $image = $item[ $prefix . '_image' ] ?? null;
        ?>
            <div class="<?php echo esc_attr( $config['columns'] ); ?>">
                <div class="animation">
                    <div class="portfolio-img-wrp">
                        <?php if ( $url ) : ?><a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer" class="panel"><?php endif; ?>
                        <?php echo di_infotech_image( $image, 'di-card', array( 'sizes' => 'col-lg-6' === $config['columns'] ? '(max-width: 991px) 100vw, 50vw' : '(max-width: 991px) 100vw, 33vw' ) ); ?>
                        <?php if ( $url ) : ?></a><?php endif; ?>
                    </div>
                    <?php if ( ! empty( $item[ $prefix . '_title' ] ) || ! empty( $item['we_did'] ) ) : ?>
                    <div class="portfolio-text-wrp">
                        <h4><?php echo esc_html( $item[ $prefix . '_title' ] ?? '' ); ?></h4>
                        <div class="portfolio-icon-wrp">
                        <?php foreach ( (array) ( $item['we_did'] ?? array() ) as $service ) : ?>
                            <div class="portfolio-icon">
                                <?php echo di_infotech_image( $service['service_icon'] ?? null, 'di-logo', array( 'sizes' => '48px' ) ); ?>
                                <p><?php echo esc_html( $service['service_name'] ?? '' ); ?></p>
                            </div>
                        <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
        <?php if ( $total_pages > 1 ) : ?>
        <nav aria-label="Portfolio pages" class="main_btn">
            <?php if ( $page_number > 1 ) : ?><a class="bg_yellow" rel="prev" href="<?php echo esc_url( add_query_arg( array( 'portfolio_type' => $selected, 'portfolio_page' => $page_number - 1 ), $base_url ) . '#portfolio-projects' ); ?>">Previous projects</a><?php endif; ?>
            <span>Page <?php echo esc_html( $page_number . ' of ' . $total_pages ); ?></span>
            <?php if ( $page_number < $total_pages ) : ?><a class="bg_yellow" rel="next" href="<?php echo esc_url( add_query_arg( array( 'portfolio_type' => $selected, 'portfolio_page' => $page_number + 1 ), $base_url ) . '#portfolio-projects' ); ?>">More projects</a><?php endif; ?>
        </nav>
        <?php endif; ?>
    </div></div></div>
</section>
<?php get_footer();
