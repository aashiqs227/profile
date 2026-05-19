<?php
/**
 * Site footer.
 *
 * @package vcs
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$vcs_logo_dark = get_theme_file_uri( 'assets/images/logo-ondark.png' );
$vcs_phone     = '(437) 286-4637';
$vcs_email     = 'info@vcsolutions.ca';
?>
</main><!-- .vcs-main -->

<footer class="vcs-footer">
	<div class="vcs-footer-inner">
		<div class="vcs-footer-grid">
			<div>
				<div class="vcs-footer-brand-row">
					<img src="<?php echo esc_url( $vcs_logo_dark ); ?>" alt="" width="115" height="40">
					<span class="vcs-footer-wordmark">VIRTUCORE <span>SOLUTIONS</span></span>
				</div>
				<p class="vcs-footer-desc">
					IT management and applied AI for Canadian small and medium businesses. Proudly built in Toronto, working with businesses across the GTA and beyond.
				</p>
				<div class="vcs-cdn-badge">
					<?php echo vcs_maple( 14, '#d62729' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					<span><?php esc_html_e( 'Proudly Canadian', 'vcs' ); ?></span>
				</div>
			</div>

			<div>
				<div class="vcs-footer-col-title"><?php esc_html_e( 'Services', 'vcs' ); ?></div>
				<div class="vcs-footer-links">
					<?php
					$vcs_footer_services = array( 'managed-it', 'cloud', 'erp', 'custom-apps', 'ai-implementation', 'workflows-agents' );
					foreach ( $vcs_footer_services as $vcs_sid ) :
						$vcs_svc = vcs_service( $vcs_sid );
						if ( ! $vcs_svc ) {
							continue;
						}
						?>
						<a href="<?php echo esc_url( vcs_page_url( 'services' ) ); ?>"><?php echo esc_html( $vcs_svc['title'] ); ?></a>
					<?php endforeach; ?>
				</div>
			</div>

			<div>
				<div class="vcs-footer-col-title"><?php esc_html_e( 'Company', 'vcs' ); ?></div>
				<div class="vcs-footer-links">
					<a href="<?php echo esc_url( vcs_page_url( 'home' ) ); ?>"><?php esc_html_e( 'Home', 'vcs' ); ?></a>
					<a href="<?php echo esc_url( vcs_page_url( 'services' ) ); ?>"><?php esc_html_e( 'Our services', 'vcs' ); ?></a>
					<a href="<?php echo esc_url( vcs_page_url( 'blog' ) ); ?>"><?php esc_html_e( 'Blog', 'vcs' ); ?></a>
					<a href="<?php echo esc_url( vcs_page_url( 'contact' ) ); ?>"><?php esc_html_e( 'Schedule a consultation', 'vcs' ); ?></a>
				</div>
			</div>

			<div>
				<div class="vcs-footer-col-title"><?php esc_html_e( 'Contact', 'vcs' ); ?></div>
				<div class="vcs-footer-links">
					<a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $vcs_phone ) ); ?>"><?php echo esc_html( $vcs_phone ); ?></a>
					<a href="mailto:<?php echo esc_attr( $vcs_email ); ?>"><?php echo esc_html( $vcs_email ); ?></a>
					<a href="<?php echo esc_url( vcs_page_url( 'contact' ) ); ?>"><?php esc_html_e( 'Toronto, ON', 'vcs' ); ?></a>
				</div>
			</div>
		</div>

		<div class="vcs-footer-bottom">
			<div>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> VirtuCore Solutions. <?php esc_html_e( 'All rights reserved.', 'vcs' ); ?></div>
			<div class="vcs-footer-legal">
				<a href="<?php echo esc_url( home_url( '/privacy/' ) ); ?>"><?php esc_html_e( 'Privacy', 'vcs' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/terms/' ) ); ?>"><?php esc_html_e( 'Terms', 'vcs' ); ?></a>
			</div>
		</div>
	</div>
</footer>
</div><!-- .vcs-site -->

<?php wp_footer(); ?>
</body>
</html>
