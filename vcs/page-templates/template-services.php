<?php
/**
 * Template Name: VCS — Services
 * Template Post Type: page
 *
 * @package vcs
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$vcs_contact_url = vcs_page_url( 'contact' );
$vcs_order       = array( 'managed-it', 'ai-implementation', 'cloud', 'workflows-agents', 'erp', 'custom-apps', 'data-migration', 'support-consulting' );
?>

<section class="vcs-page-hero">
	<div class="vcs-page-hero-cables" aria-hidden="true">
		<?php echo vcs_cable_graphic( 'hero', array( 'intensity' => 0.6, 'vignette' => false, 'ambient_glow' => false ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	</div>
	<div class="vcs-page-hero-inner">
		<span class="vcs-badge vcs-badge--accent"><span class="vcs-badge-dot"></span> Our services</span>
		<h1 class="vcs-page-title">Specialized services designed to modernize your operations.</h1>
		<p class="vcs-lead">
			Explore our specialized services designed to modernize your operations, improve efficiency, and support long-term growth. From ERP systems and custom-built solutions to applied AI, VirtuCore Solutions is your partner in digital transformation.
		</p>
	</div>
</section>

<section class="vcs-services-section">
	<div class="vcs-container">
		<div class="vcs-section-head">
			<span class="vcs-kicker">Our comprehensive services</span>
			<h2 class="vcs-section-title vcs-section-title--sm">Two pillars. Eight services. One partner.</h2>
			<p>The IT services your business runs on, plus the AI workflows that quietly take manual work off your team&rsquo;s plate. Pick anything from either column.</p>
		</div>

		<div class="vcs-services-grid">
			<?php
			foreach ( $vcs_order as $vcs_sid ) :
				$vcs_s = vcs_service( $vcs_sid );
				if ( ! $vcs_s ) {
					continue;
				}
				$vcs_is_ai = ( 'AI' === $vcs_s['pillar'] );
				?>
				<div class="vcs-svc-card<?php echo $vcs_is_ai ? ' vcs-svc-card--ai' : ''; ?>">
					<div class="vcs-svc-icon"><?php echo vcs_icon( $vcs_s['icon'], 22 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
					<div class="vcs-svc-body">
						<div class="vcs-svc-top">
							<div class="vcs-svc-title"><?php echo esc_html( $vcs_s['title'] ); ?></div>
							<span class="vcs-svc-pillar"><?php echo esc_html( $vcs_s['pillar'] ); ?></span>
						</div>
						<div class="vcs-svc-text"><?php echo esc_html( $vcs_s['long'] ); ?></div>
						<a class="vcs-svc-link" href="<?php echo esc_url( $vcs_contact_url ); ?>">
							Get in touch for more details <?php echo vcs_icon( 'ArrowRight', 13 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php
get_template_part( 'template-parts/cta-band' );
get_footer();
