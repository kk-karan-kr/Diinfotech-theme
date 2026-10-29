<?php
/**
 * Hero section for Modular Service Page V2.
 *
 * @package DI_Infotech
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow             = (string) get_sub_field( 'eyebrow' );
$heading             = (string) get_sub_field( 'heading' );
$highlighted_heading = (string) get_sub_field( 'highlighted_heading' );
$description         = (string) get_sub_field( 'description' );
$primary_button      = get_sub_field( 'primary_button' );
$secondary_button    = get_sub_field( 'secondary_button' );
$proof_items         = di_service_v2_rows( get_sub_field( 'proof_items' ) );
$right_panel_type    = (string) get_sub_field( 'right_panel_type' );
$hero_image          = get_sub_field( 'hero_image' );
$form_kicker         = (string) get_sub_field( 'form_kicker' );
$form_badge          = (string) get_sub_field( 'form_badge' );
$form_heading        = (string) get_sub_field( 'form_heading' );
$form_description    = (string) get_sub_field( 'form_description' );
$form_privacy_note   = (string) get_sub_field( 'form_privacy_note' );
$contact_form_shortcode = trim( (string) get_sub_field( 'contact_form_shortcode' ) );

if ( 'image' === $right_panel_type && ! $hero_image ) { $right_panel_type = 'none'; }
if ( 'enquiry_form' === $right_panel_type && '' === $contact_form_shortcode ) { $right_panel_type = 'none'; }
$has_right_panel = in_array( $right_panel_type, array( 'enquiry_form', 'image' ), true );
$hero_classes    = 'service-v2-hero__grid';
$hero_classes   .= $has_right_panel ? '' : ' service-v2-hero__grid--single';
if ( ! $eyebrow && ! $heading && ! $highlighted_heading && ! $description && ! $proof_items && ! $has_right_panel && empty( $primary_button['url'] ) && empty( $secondary_button['url'] ) ) { return; }
?>

<section class="service-v2-hero" aria-labelledby="service-v2-title-<?php echo esc_attr( get_the_ID() ); ?>">
	<span class="service-v2-hero__glow service-v2-hero__glow--one" aria-hidden="true"></span>
	<span class="service-v2-hero__glow service-v2-hero__glow--two" aria-hidden="true"></span>

	<div class="service-v2-container <?php echo esc_attr( $hero_classes ); ?>">
		<div class="service-v2-hero__content">
			<?php if ( $eyebrow ) : ?>
				<p class="service-v2-eyebrow"><span aria-hidden="true"></span><?php echo esc_html( $eyebrow ); ?></p>
			<?php endif; ?>

			<h1 class="service-v2-hero__heading" id="service-v2-title-<?php echo esc_attr( get_the_ID() ); ?>">
				<?php echo esc_html( $heading ); ?>
				<?php if ( $highlighted_heading ) : ?>
					<em><?php echo esc_html( $highlighted_heading ); ?></em>
				<?php endif; ?>
			</h1>

			<?php if ( $description ) : ?>
				<div class="service-v2-hero__description"><?php echo wp_kses_post( wpautop( $description ) ); ?></div>
			<?php endif; ?>

			<?php if ( $primary_button || $secondary_button ) : ?>
				<div class="service-v2-hero__actions">
					<?php if ( is_array( $primary_button ) && ! empty( $primary_button['url'] ) ) : ?>
						<a class="service-v2-button service-v2-button--primary" href="<?php echo esc_url( $primary_button['url'] ); ?>" target="<?php echo esc_attr( $primary_button['target'] ?: '_self' ); ?>"<?php echo '_blank' === ( $primary_button['target'] ?: '_self' ) ? ' rel="noopener noreferrer"' : ''; ?>>
							<?php echo esc_html( $primary_button['title'] ?: __( 'Get Started', 'di-infotech' ) ); ?><span aria-hidden="true">&rarr;</span>
						</a>
					<?php endif; ?>

					<?php if ( is_array( $secondary_button ) && ! empty( $secondary_button['url'] ) ) : ?>
						<a class="service-v2-button service-v2-button--secondary" href="<?php echo esc_url( $secondary_button['url'] ); ?>" target="<?php echo esc_attr( $secondary_button['target'] ?: '_self' ); ?>"<?php echo '_blank' === ( $secondary_button['target'] ?: '_self' ) ? ' rel="noopener noreferrer"' : ''; ?>>
							<?php echo esc_html( $secondary_button['title'] ?: __( 'Learn More', 'di-infotech' ) ); ?><span aria-hidden="true">&darr;</span>
						</a>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<?php if ( is_array( $proof_items ) && $proof_items ) : ?>
				<ul class="service-v2-hero__proof" aria-label="<?php esc_attr_e( 'Service highlights', 'di-infotech' ); ?>">
					<?php foreach ( $proof_items as $proof_item ) : ?>
						<?php if ( ! empty( $proof_item['value'] ) || ! empty( $proof_item['label'] ) ) : ?>
							<li>
								<?php if ( ! empty( $proof_item['value'] ) ) : ?><strong><?php echo esc_html( $proof_item['value'] ); ?></strong><?php endif; ?>
								<?php if ( ! empty( $proof_item['label'] ) ) : ?><span><?php echo esc_html( $proof_item['label'] ); ?></span><?php endif; ?>
							</li>
						<?php endif; ?>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>

		<?php if ( 'image' === $right_panel_type && $hero_image ) : ?>
			<div class="service-v2-hero__visual">
				<?php
				echo wp_get_attachment_image(
					(int) $hero_image,
					'di-content',
					false,
					array(
						'class'         => 'service-v2-hero__image',
						'loading'       => 'eager',
						'fetchpriority' => 'high',
						'data-no-lazy'  => '1',
						'sizes'         => '(max-width: 900px) 92vw, 46vw',
					)
				);
				?>
			</div>
		<?php elseif ( 'enquiry_form' === $right_panel_type ) : ?>
			<div class="service-v2-hero__form-wrap" id="service-v2-hero-form">
				<div class="service-v2-hero__form">
					<?php if ( $form_kicker || $form_badge ) : ?>
						<div class="service-v2-hero__form-topline">
							<?php if ( $form_kicker ) : ?><span class="service-v2-hero__form-kicker"><?php echo esc_html( $form_kicker ); ?></span><?php endif; ?>
							<?php if ( $form_badge ) : ?><span class="service-v2-hero__form-badge"><?php echo esc_html( $form_badge ); ?></span><?php endif; ?>
						</div>
					<?php endif; ?>

					<?php if ( $form_heading ) : ?><h2><?php echo esc_html( $form_heading ); ?></h2><?php endif; ?>
					<?php if ( $form_description ) : ?><div class="service-v2-hero__form-description"><?php echo wp_kses_post( wpautop( $form_description ) ); ?></div><?php endif; ?>

					<?php if ( shortcode_exists( 'contact-form-7' ) ) : ?>
						<div class="service-v2-hero__cf7">
							<?php $submit_text = (string) get_sub_field( 'form_submit_text' );
$submit_filter = static function ( $tag ) use ( $submit_text ) {
    $type = is_array( $tag ) ? ( $tag['type'] ?? '' ) : ( $tag->type ?? '' );
    if ( 'submit' === $type && '' !== trim( $submit_text ) ) {
        if ( is_array( $tag ) ) {
            $tag['values'] = array( $submit_text );
            $tag['raw_values'] = array( $submit_text );
        } else {
            $tag->values = array( $submit_text );
            $tag->raw_values = array( $submit_text );
        }
    }
    return $tag;
};
add_filter( 'wpcf7_form_tag', $submit_filter );
try { echo do_shortcode( $contact_form_shortcode ); } finally { remove_filter( 'wpcf7_form_tag', $submit_filter ); } // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</div>
					<?php elseif ( current_user_can( 'edit_post', get_the_ID() ) ) : ?>
						<p class="service-v2-hero__form-warning"><?php esc_html_e( 'Contact Form 7 is not active, so the hero form cannot be displayed.', 'di-infotech' ); ?></p>
					<?php endif; ?>

					<?php if ( $form_privacy_note ) : ?><small><?php echo esc_html( $form_privacy_note ); ?></small><?php endif; ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>
