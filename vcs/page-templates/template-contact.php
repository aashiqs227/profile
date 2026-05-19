<?php
/**
 * Template Name: VCS — Contact
 * Template Post Type: page
 *
 * @package vcs
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$vcs_status = isset( $_GET['vcs_contact'] ) ? sanitize_key( wp_unslash( $_GET['vcs_contact'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended

$vcs_interests = array(
	'Managed IT Services',
	'Cloud Solutions',
	'ERP Implementation',
	'Custom Business Solutions',
	'Data Migration & Integration',
	'Support Consulting',
	'AI Implementation & Consulting',
	'Workflow Automation & AI Agents',
	'Not sure yet',
);

$vcs_contact_lines = array(
	array( 'icon' => 'Phone', 'text' => '(437) 286-4637' ),
	array( 'icon' => 'Mail', 'text' => 'info@vcsolutions.ca' ),
	array( 'icon' => 'MapPin', 'text' => 'Toronto, ON · Serving GTA + remote' ),
);

$vcs_promises = array(
	'We reply within one business day.',
	'A written plan after the first call.',
	'No NDA needed to talk.',
	'Canadian SMEs — IT and AI.',
);
?>

<section class="vcs-contact-hero">
	<div class="vcs-contact-hero-cables" aria-hidden="true">
		<?php echo vcs_cable_graphic( 'contact', array( 'intensity' => 1.1, 'vignette' => true, 'ambient_glow' => true ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	</div>
	<div class="vcs-contact-hero-inner">
		<div class="vcs-contact-tag"><span class="vcs-contact-tag-dot"></span> Contact</div>
		<h1 class="vcs-contact-title">Specialized IT Support for Small Businesses.</h1>
		<p class="vcs-contact-sub">
			At VirtuCore Solutions, we&rsquo;re here to support your IT needs. We allow small businesses to focus on what they do best while we manage their entire IT infrastructure. Based in the GTA — a truly Canadian IT support service here to help Canadian businesses grow.
		</p>
	</div>
</section>

<section class="vcs-contact-body" id="vcs-form">
	<div class="vcs-contact-grid">

		<div class="vcs-panel vcs-contact-info">
			<h2>Speak to a specialist.</h2>
			<p class="vcs-contact-info-lead">
				Connect with VirtuCore Solutions for your IT and AI needs. Fill out the form, or reach us directly by phone or email. We&rsquo;re here to support your success.
			</p>
			<div class="vcs-contact-lines">
				<?php foreach ( $vcs_contact_lines as $vcs_line ) : ?>
					<div class="vcs-contact-line">
						<span style="color:var(--vcs-accent)"><?php echo vcs_icon( $vcs_line['icon'], 18 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
						<span><?php echo esc_html( $vcs_line['text'] ); ?></span>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="vcs-contact-promises">
				<?php foreach ( $vcs_promises as $vcs_promise ) : ?>
					<div class="vcs-promise">
						<span style="color:var(--vcs-accent)"><?php echo vcs_icon( 'Check', 16 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
						<?php echo esc_html( $vcs_promise ); ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<?php if ( 'sent' === $vcs_status ) : ?>

			<div class="vcs-panel vcs-contact-success">
				<div class="vcs-success-icon"><?php echo vcs_icon( 'Check', 28 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
				<h3>Got it — thank you.</h3>
				<p>We&rsquo;ll reply within one business day with two or three time options.</p>
				<a class="vcs-btn vcs-btn--secondary vcs-btn--md" href="<?php echo esc_url( vcs_page_url( 'contact' ) ); ?>#vcs-form">Send another</a>
			</div>

		<?php else : ?>

			<form class="vcs-panel vcs-contact-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
				<input type="hidden" name="action" value="vcs_contact">
				<?php wp_nonce_field( 'vcs_contact', 'vcs_contact_nonce' ); ?>
				<div class="vcs-hp" aria-hidden="true">
					<label>Leave this field empty<input type="text" name="vcs_website" tabindex="-1" autocomplete="off"></label>
				</div>

				<div class="vcs-form-head">
					<div class="vcs-form-kicker">Schedule a consultation</div>
					<div class="vcs-form-title">Tell us what you&rsquo;re working on.</div>
				</div>

				<?php if ( 'error' === $vcs_status ) : ?>
					<div class="vcs-form-error" role="alert">
						Something didn&rsquo;t go through — please check your name, company and a valid email, then try again.
					</div>
				<?php endif; ?>

				<div class="vcs-form-grid">
					<label class="vcs-field">
						<span class="vcs-field-label">Name</span>
						<input class="vcs-input" type="text" name="vcs_name" required placeholder="Jane Patel">
					</label>
					<label class="vcs-field">
						<span class="vcs-field-label">Company</span>
						<input class="vcs-input" type="text" name="vcs_company" required placeholder="Your business">
					</label>
					<label class="vcs-field">
						<span class="vcs-field-label">Email</span>
						<input class="vcs-input" type="email" name="vcs_email" required placeholder="you@company.ca">
					</label>
					<label class="vcs-field">
						<span class="vcs-field-label">Phone (optional)</span>
						<input class="vcs-input" type="tel" name="vcs_phone" placeholder="(416) 555-0102">
					</label>
					<label class="vcs-field vcs-field--full">
						<span class="vcs-field-label">What&rsquo;s the focus?</span>
						<select class="vcs-select" name="vcs_interest">
							<?php foreach ( $vcs_interests as $vcs_option ) : ?>
								<option value="<?php echo esc_attr( $vcs_option ); ?>"><?php echo esc_html( $vcs_option ); ?></option>
							<?php endforeach; ?>
						</select>
					</label>
					<label class="vcs-field vcs-field--full">
						<span class="vcs-field-label">Tell us a little more</span>
						<textarea class="vcs-textarea" name="vcs_message" rows="4" placeholder="What&rsquo;s the IT or workflow challenge you&rsquo;d most love to solve?"></textarea>
					</label>
				</div>

				<div class="vcs-form-footer">
					<div class="vcs-form-note">We reply within 1 business day.</div>
					<button class="vcs-btn vcs-btn--primary vcs-btn--lg" type="submit">
						Schedule consultation <?php echo vcs_icon( 'ArrowRight', 16 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</button>
				</div>
			</form>

		<?php endif; ?>

	</div>
</section>

<?php
get_footer();
