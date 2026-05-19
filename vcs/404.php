<?php
/**
 * 404 — page not found.
 *
 * @package vcs
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<section class="vcs-post-hero">
	<div class="vcs-container--text">
		<div class="vcs-post-hero-meta">
			<span class="vcs-badge vcs-badge--accent"><span class="vcs-badge-dot"></span> <?php esc_html_e( 'Error 404', 'vcs' ); ?></span>
		</div>
		<h1 class="vcs-post-title"><?php esc_html_e( 'We couldn&rsquo;t find that page.', 'vcs' ); ?></h1>
	</div>
</section>

<article class="vcs-post-article">
	<div class="vcs-container--text">
		<div class="vcs-post-content">
			<p><?php esc_html_e( 'The page you were looking for has moved or no longer exists. Let&rsquo;s get you back on track.', 'vcs' ); ?></p>
		</div>
		<div class="vcs-center-action" style="justify-content:flex-start;">
			<?php
			echo vcs_cta_button( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				array(
					'label' => 'Back to home',
					'url'   => home_url( '/' ),
					'size'  => 'lg',
				)
			);
			?>
		</div>
	</div>
</article>

<?php
get_footer();
