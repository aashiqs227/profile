<?php
/**
 * Site header — opening markup, navigation and (on the home page) the
 * cinematic intro veil.
 *
 * @package vcs
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$vcs_logo = get_theme_file_uri( 'assets/images/logo-main.png' );
$vcs_nav  = array(
	'home'     => array( 'label' => 'Home', 'url' => vcs_page_url( 'home' ) ),
	'services' => array( 'label' => 'Services', 'url' => vcs_page_url( 'services' ) ),
	'contact'  => array( 'label' => 'Contact', 'url' => vcs_page_url( 'contact' ) ),
);
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="vcs-site">
<a class="vcs-skip-link" href="#vcs-content"><?php esc_html_e( 'Skip to content', 'vcs' ); ?></a>

<?php if ( is_front_page() ) : ?>
	<?php
	// --- Intro veil ---------------------------------------------------
	$vcs_logo_white = get_theme_file_uri( 'assets/images/logo-white.png' );
	$vcs_logo_color = get_theme_file_uri( 'assets/images/logo-main.png' );
	?>
	<div class="vcs-veil" id="vcs-veil" role="button" tabindex="0"
		aria-label="<?php esc_attr_e( 'Intro — scroll or click to enter the site', 'vcs' ); ?>">
		<div class="vcs-veil-backdrop"></div>
		<div class="vcs-veil-cables" id="vcs-veil-cables" aria-hidden="true">
			<?php echo vcs_cable_graphic( 'intro', array( 'intensity' => 1.2, 'vignette' => false, 'ambient_glow' => false ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		</div>

		<div class="vcs-veil-stamp vcs-veil-stamp--left">EST · TORONTO · CANADA</div>
		<div class="vcs-veil-stamp vcs-veil-stamp--right">v · 2026</div>

		<div class="vcs-veil-ambient">
			<div class="vcs-veil-tagline">Your Partner for <em>Digital Solutions.</em></div>
			<div class="vcs-veil-subtag">Managed IT, custom systems, and applied AI for Canadian small and medium businesses.</div>
			<div class="vcs-veil-cdn"><?php echo vcs_maple( 13, '#9bb7d8' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> Proudly Canadian · Toronto, ON</div>
		</div>

		<div class="vcs-veil-hint">
			<div class="vcs-veil-hint-text" id="vcs-veil-hint-text">Scroll or click to enter</div>
			<div class="vcs-veil-hint-mouse" aria-hidden="true">
				<svg width="14" height="22" viewBox="0 0 14 22" fill="none">
					<rect x="0.5" y="0.5" width="13" height="21" rx="6.5" stroke="#7c93b1"/>
					<rect x="6" y="5" width="2" height="6" rx="1" fill="#9bb7d8"/>
				</svg>
			</div>
		</div>

		<div class="vcs-veil-emblem" id="vcs-veil-emblem">
			<img class="vcs-veil-emblem-white" src="<?php echo esc_url( $vcs_logo_white ); ?>" alt="" aria-hidden="true">
			<img class="vcs-veil-emblem-color" src="<?php echo esc_url( $vcs_logo_color ); ?>" alt="" aria-hidden="true">
		</div>
	</div>
	<script>
		/* Skip the intro if it has already played this session — runs before paint. */
		(function () {
			try {
				if (sessionStorage.getItem('vcs-veil-seen') === '1') {
					var v = document.getElementById('vcs-veil');
					if (v) { v.parentNode.removeChild(v); }
				}
			} catch (e) {}
		})();
	</script>
<?php endif; ?>

<header class="vcs-header">
	<nav class="vcs-nav" aria-label="<?php esc_attr_e( 'Primary', 'vcs' ); ?>">
		<a class="vcs-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img class="vcs-logo-img" src="<?php echo esc_url( $vcs_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" width="206" height="72">
			<span class="vcs-wordmark">VIRTUCORE <span>SOLUTIONS</span></span>
		</a>

		<div class="vcs-nav-links">
			<?php foreach ( $vcs_nav as $key => $item ) : ?>
				<a class="vcs-nav-link<?php echo vcs_is_current( $key ) ? ' is-active' : ''; ?>"
					href="<?php echo esc_url( $item['url'] ); ?>"
					<?php echo vcs_is_current( $key ) ? 'aria-current="page"' : ''; ?>><?php echo esc_html( $item['label'] ); ?></a>
			<?php endforeach; ?>
		</div>

		<div class="vcs-nav-spacer"></div>

		<?php
		echo vcs_cta_button( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			array(
				'size'  => 'sm',
				'label' => 'Schedule a consultation',
			)
		);
		?>

		<button class="vcs-nav-toggle" id="vcs-nav-toggle" type="button"
			aria-expanded="false" aria-controls="vcs-mobile-menu"
			aria-label="<?php esc_attr_e( 'Toggle menu', 'vcs' ); ?>">
			<?php echo vcs_icon( 'Menu', 22 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		</button>
	</nav>

	<div class="vcs-mobile-menu" id="vcs-mobile-menu">
		<?php foreach ( $vcs_nav as $key => $item ) : ?>
			<a href="<?php echo esc_url( $item['url'] ); ?>"><?php echo esc_html( $item['label'] ); ?></a>
		<?php endforeach; ?>
		<a href="<?php echo esc_url( vcs_page_url( 'blog' ) ); ?>"><?php esc_html_e( 'Blog', 'vcs' ); ?></a>
		<?php
		echo vcs_cta_button( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			array( 'size' => 'md' )
		);
		?>
	</div>
</header>

<main class="vcs-main" id="vcs-content">
