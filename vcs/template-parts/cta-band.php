<?php
/**
 * Dark call-to-action band with the animated cable graphic.
 *
 * @package vcs
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$vcs_cta_title = ! empty( $args['title'] ) ? $args['title'] : 'Ready to elevate your IT infrastructure?';
$vcs_cta_body  = ! empty( $args['body'] ) ? $args['body'] : 'Take the first step toward seamless IT management. Tell us what you are running today — we will come back with a one-page plan and a price.';
?>
<section class="vcs-cta-band">
	<div class="vcs-container">
		<div class="vcs-cta-card">
			<div class="vcs-cta-bg">
				<?php echo vcs_cable_graphic( 'contact', array( 'intensity' => 0.6, 'vignette' => true, 'ambient_glow' => true ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</div>
			<div class="vcs-cta-content">
				<h2 class="vcs-cta-title"><?php echo esc_html( $vcs_cta_title ); ?></h2>
				<p class="vcs-cta-text"><?php echo esc_html( $vcs_cta_body ); ?></p>
			</div>
			<div class="vcs-cta-actions">
				<?php echo vcs_cta_button( array( 'variant' => 'on-dark', 'size' => 'lg' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</div>
		</div>
	</div>
</section>
