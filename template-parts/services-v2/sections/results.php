<?php
$eyebrow = get_sub_field( 'eyebrow' ); $heading = get_sub_field( 'heading' ); $description = get_sub_field( 'description' );
$benefits = get_sub_field( 'benefits' ); $clients = get_sub_field( 'clients' ); $cta = get_sub_field( 'cta_button' ); $background = get_sub_field( 'background' );
if ( ! $heading && ! $clients ) { return; }
?>
<section class="service-v2-section service-v2-results <?php echo esc_attr( di_service_v2_background_class( $background ) ); ?>">
	<div class="service-v2-container service-v2-results__layout">
		<div class="service-v2-results__intro">
			<?php if ( $eyebrow ) : ?><p class="service-v2-kicker"><?php echo esc_html( $eyebrow ); ?></p><?php endif; ?>
			<?php if ( $heading ) : ?><h2><?php echo esc_html( $heading ); ?></h2><?php endif; ?>
			<?php if ( $description ) : ?><div class="service-v2-copy"><?php echo wp_kses_post( wpautop( $description ) ); ?></div><?php endif; ?>
			<?php if ( $benefits ) : ?><div class="service-v2-benefit-list"><?php foreach ( $benefits as $item ) : ?><article><?php echo di_service_v2_icon( $item['icon'] ?? '' ); // phpcs:ignore ?><div><h3><?php echo esc_html( $item['title'] ?? '' ); ?></h3><?php echo wp_kses_post( wpautop( $item['description'] ?? '' ) ); ?></div></article><?php endforeach; ?></div><?php endif; ?>
			<?php di_service_v2_link( $cta ); ?>
		</div>
		<?php if ( $clients ) : ?><div class="service-v2-result-cards service-v2-auto-grid">
			<?php foreach ( $clients as $client ) : ?><article class="service-v2-result-card">
				<?php if ( ! empty( $client['niche'] ) ) : ?><p class="service-v2-result-card__niche"><?php echo esc_html( $client['niche'] ); ?></p><?php endif; ?>
				<div class="service-v2-result-card__brand"><?php echo ! empty( $client['client_logo'] ) ? wp_get_attachment_image( (int) $client['client_logo'], 'medium', false, array( 'loading' => 'lazy' ) ) : ''; // phpcs:ignore ?><h3><?php echo esc_html( $client['client_name'] ?? '' ); ?></h3><?php if ( ! empty( $client['domain'] ) ) : ?><span><?php echo esc_html( $client['domain'] ); ?></span><?php endif; ?></div>
				<?php if ( ! empty( $client['keywords'] ) ) : ?><div class="service-v2-ranking-table"><div><strong><?php esc_html_e( 'Keyword', 'di-infotech' ); ?></strong><strong><?php esc_html_e( 'Ranking', 'di-infotech' ); ?></strong></div><?php foreach ( $client['keywords'] as $keyword ) : ?><div><span><?php echo esc_html( $keyword['keyword'] ?? '' ); ?></span><b><?php echo esc_html( $keyword['ranking'] ?? '' ); ?></b></div><?php endforeach; ?></div><?php endif; ?>
			</article><?php endforeach; ?>
		</div><?php endif; ?>
	</div>
</section>
