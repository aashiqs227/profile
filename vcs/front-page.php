<?php
/**
 * Home page — the full marketing layout.
 *
 * @package vcs
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$vcs_services_url = vcs_page_url( 'services' );
$vcs_it_services  = array_filter( vcs_services(), function ( $s ) { return 'IT' === $s['pillar']; } );
$vcs_ai_services  = array_filter( vcs_services(), function ( $s ) { return 'AI' === $s['pillar']; } );
?>

<section class="vcs-hero">
	<div class="vcs-hero-echo" aria-hidden="true">
		<?php echo vcs_cable_graphic( 'contact', array( 'intensity' => 0.5, 'vignette' => false, 'ambient_glow' => false ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	</div>
	<div class="vcs-hero-grid">
		<div>
			<div class="vcs-badge-row">
				<span class="vcs-badge vcs-badge--accent"><span class="vcs-badge-dot"></span> IT &middot; AI &middot; Managed services</span>
			</div>
			<h1 class="vcs-hero-title">Total IT Management, <span class="vcs-accent-text">simplified.</span></h1>
			<p class="vcs-lead vcs-hero-copy">
				We provide tailored IT management to keep your business efficient and secure — from infrastructure support and systems development to proactive monitoring. And where it makes sense, we help you put AI to work alongside the team you already have.
			</p>
			<div class="vcs-hero-actions">
				<?php echo vcs_cta_button( array( 'size' => 'lg' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				<a class="vcs-btn vcs-btn--secondary vcs-btn--lg" href="<?php echo esc_url( $vcs_services_url ); ?>">See our services</a>
			</div>
			<div class="vcs-trust-row">
				<span class="vcs-trust-item"><?php echo vcs_maple( 14, '#d62729' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> Proudly Canadian &middot; Toronto-based</span>
				<span class="vcs-trust-sep" aria-hidden="true"></span>
				<span class="vcs-trust-item">SME-focused</span>
				<span class="vcs-trust-sep" aria-hidden="true"></span>
				<span class="vcs-trust-item">Partner, not vendor</span>
			</div>
		</div>
		<div>
			<?php echo vcs_infra_status(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		</div>
	</div>
</section>

<section class="vcs-section vcs-section--soft">
	<div class="vcs-introblock-grid">
		<div>
			<span class="vcs-kicker">VirtuCore Solutions</span>
			<h2 class="vcs-section-title">Total IT Management, and the AI layer on top.</h2>
		</div>
		<div class="vcs-introblock-body">
			<p class="vcs-text">
				VirtuCore Solutions specializes in tailored systems development and infrastructure management services for small and medium businesses. From setting up ERP systems and data migration to building custom solutions focused on improving your business efficiency, we do it all.
			</p>
			<p class="vcs-text">
				And where it makes sense, we help you put AI to work — embedded inside your existing workflows, not bolted on. So your team can spend more time on the work only they can do.
			</p>
			<a class="vcs-btn vcs-btn--secondary vcs-btn--md" href="<?php echo esc_url( $vcs_services_url ); ?>">
				Learn more <?php echo vcs_icon( 'ArrowRight', 14 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</a>
		</div>
	</div>
</section>

<section class="vcs-section vcs-section--canvas">
	<div class="vcs-container">
		<div class="vcs-section-head">
			<span class="vcs-kicker">Our comprehensive services</span>
			<h2 class="vcs-section-title">From cloud to ERP — and now AI on top.</h2>
			<p>A range of services covering your business&rsquo;s specific IT needs, with applied AI where it earns its keep.</p>
		</div>
		<div class="vcs-cards-3">
			<?php
			foreach ( array( 'managed-it', 'cloud', 'workflows-agents' ) as $vcs_sid ) :
				$vcs_s = vcs_service( $vcs_sid );
				if ( ! $vcs_s ) {
					continue;
				}
				?>
				<div class="vcs-service-card">
					<div class="vcs-service-card-icon"><?php echo vcs_icon( $vcs_s['icon'], 22 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
					<div class="vcs-service-card-title"><?php echo esc_html( $vcs_s['title'] ); ?></div>
					<div class="vcs-service-card-text"><?php echo esc_html( $vcs_s['long'] ); ?></div>
					<a class="vcs-card-link" href="<?php echo esc_url( $vcs_services_url ); ?>">
						Learn more <?php echo vcs_icon( 'ArrowRight', 13 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</a>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="vcs-center-action">
			<a class="vcs-btn vcs-btn--secondary vcs-btn--md" href="<?php echo esc_url( $vcs_services_url ); ?>">
				View all services <?php echo vcs_icon( 'ArrowRight', 14 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</a>
		</div>
	</div>
</section>

<section class="vcs-section vcs-section--canvas">
	<div class="vcs-pillar-grid vcs-pillar-grid--it">
		<div>
			<span class="vcs-kicker">Pillar &middot; IT &amp; MSP</span>
			<h2 class="vcs-section-title">The IT foundation underneath your business.</h2>
			<p class="vcs-pillar-body">
				We come in as your partner to manage your entire IT infrastructure — proactive monitoring, maintenance, support, cloud, ERP, custom apps. The unglamorous services that decide whether your team has a good Monday morning.
			</p>
			<div class="vcs-pillar-list">
				<?php foreach ( $vcs_it_services as $vcs_s ) : ?>
					<div class="vcs-pillar-item">
						<div class="vcs-pillar-item-icon"><?php echo vcs_icon( $vcs_s['icon'], 16 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
						<div class="vcs-pillar-item-text">
							<div class="vcs-pillar-item-title"><?php echo esc_html( $vcs_s['title'] ); ?></div>
							<div class="vcs-pillar-item-sub"><?php echo esc_html( $vcs_s['short'] ); ?></div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<div>
			<?php echo vcs_infra_status(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		</div>
	</div>
</section>

<section class="vcs-section vcs-section--soft">
	<div class="vcs-pillar-grid vcs-pillar-grid--ai">
		<div>
			<?php echo vcs_ai_workflow_card(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		</div>
		<div>
			<span class="vcs-kicker vcs-kicker--accent">Pillar &middot; Applied AI</span>
			<h2 class="vcs-section-title">AI you can actually use, embedded in the work.</h2>
			<p class="vcs-pillar-body">
				We help you figure out where AI is worth implementing, then we ship it. Trigger-based automations, internal copilots, customer-facing agents, and team training — designed around your real workflows, not the latest hype cycle.
			</p>
			<div class="vcs-pillar-list">
				<?php foreach ( $vcs_ai_services as $vcs_s ) : ?>
					<div class="vcs-pillar-item vcs-pillar-item--ai">
						<div class="vcs-pillar-item-icon"><?php echo vcs_icon( $vcs_s['icon'], 16 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
						<div class="vcs-pillar-item-text">
							<div class="vcs-pillar-item-title"><?php echo esc_html( $vcs_s['title'] ); ?></div>
							<div class="vcs-pillar-item-sub"><?php echo esc_html( $vcs_s['short'] ); ?></div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>

<section class="vcs-section vcs-section--card">
	<div class="vcs-container">
		<div class="vcs-why-head">
			<span class="vcs-kicker">Why partner with VirtuCore</span>
			<h2 class="vcs-section-title">A reliable foundation. A real partnership.</h2>
			<p>Tailored solutions to boost productivity, safeguard your data, and support your growth — letting you focus on what you do best.</p>
		</div>
		<div class="vcs-cards-5">
			<?php foreach ( vcs_value_props() as $vcs_v ) : ?>
				<div class="vcs-value-card">
					<div class="vcs-value-top">
						<div class="vcs-value-icon"><?php echo vcs_icon( $vcs_v['icon'], 18 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
						<span class="vcs-value-num"><?php echo esc_html( $vcs_v['n'] ); ?></span>
					</div>
					<div class="vcs-value-title"><?php echo esc_html( $vcs_v['title'] ); ?></div>
					<div class="vcs-value-body"><?php echo esc_html( $vcs_v['body'] ); ?></div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php
get_template_part( 'template-parts/cta-band' );
get_footer();
