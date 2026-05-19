<?php
/**
 * VirtuCore Solutions theme — setup, assets, content data and form handling.
 *
 * @package vcs
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'VCS_VERSION', '1.0.0' );

require get_template_directory() . '/inc/template-helpers.php';

/* -------------------------------------------------------------------------
 * Theme setup
 * ---------------------------------------------------------------------- */
function vcs_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);
}
add_action( 'after_setup_theme', 'vcs_setup' );

if ( ! isset( $content_width ) ) {
	$content_width = 760;
}

/* -------------------------------------------------------------------------
 * Styles & scripts
 * ---------------------------------------------------------------------- */
function vcs_assets() {
	wp_enqueue_style(
		'vcs-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap',
		array(),
		null
	);
	wp_enqueue_style( 'vcs-main', get_theme_file_uri( 'assets/css/vcs.css' ), array( 'vcs-fonts' ), VCS_VERSION );

	wp_enqueue_script( 'vcs-script', get_theme_file_uri( 'assets/js/vcs.js' ), array(), VCS_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'vcs_assets' );

/* -------------------------------------------------------------------------
 * Content — services & value props (single source of truth)
 *
 * Real services from the existing vcsolutions.ca site plus two consolidated
 * AI offerings. No fabricated case studies, testimonials or statistics.
 * ---------------------------------------------------------------------- */
function vcs_services() {
	return array(
		array(
			'id'     => 'managed-it',
			'icon'   => 'Cog',
			'title'  => 'Managed IT Services',
			'pillar' => 'IT',
			'short'  => 'Proactive monitoring, maintenance, and support — your IT, quietly handled.',
			'long'   => 'We continue to offer reliable IT infrastructure support, including proactive monitoring, maintenance, and troubleshooting — so your systems stay secure and efficient while your team focuses on the work only they can do.',
		),
		array(
			'id'     => 'cloud',
			'icon'   => 'Cloud',
			'title'  => 'Cloud Solutions',
			'pillar' => 'IT',
			'short'  => 'Cloud storage, backup, and migration tailored to how your team works.',
			'long'   => 'Our cloud solutions are designed to streamline your business processes and enhance collaboration. Whether you need storage, backup, or migration across Microsoft 365, Google Workspace, AWS, or Azure, we have the expertise to optimize your cloud environment.',
		),
		array(
			'id'     => 'erp',
			'icon'   => 'Server',
			'title'  => 'ERP Implementation',
			'pillar' => 'IT',
			'short'  => 'Scalable ERP systems, planned and rolled out without breaking the day-to-day.',
			'long'   => 'We help businesses streamline operations by implementing scalable ERP systems tailored to their workflows. From planning and setup to data migration and training, we ensure a smooth transition and lasting impact.',
		),
		array(
			'id'     => 'custom-apps',
			'icon'   => 'Workflow',
			'title'  => 'Custom Business Solutions',
			'pillar' => 'IT',
			'short'  => 'Custom applications and integrations built around your real processes.',
			'long'   => 'Need a solution that fits your unique processes? We design and develop custom applications and integrations that solve real business challenges — enhancing productivity and decision-making.',
		),
		array(
			'id'     => 'data-migration',
			'icon'   => 'Database',
			'title'  => 'Data Migration & Integration',
			'pillar' => 'IT',
			'short'  => 'Upgrade or consolidate platforms with accuracy, security, and minimal disruption.',
			'long'   => 'Whether you are upgrading systems or consolidating platforms, our data migration services ensure accuracy, security, and minimal disruption. We handle complex data workflows with precision.',
		),
		array(
			'id'     => 'support-consulting',
			'icon'   => 'Shield',
			'title'  => 'Support Consulting',
			'pillar' => 'IT',
			'short'  => 'IT strategy, compliance, and project management — guidance when you need it.',
			'long'   => 'Our support consulting services are designed to provide you with expert guidance and assistance. Whether you need help with IT strategy, compliance, or project management, we are here to support your business every step of the way.',
		),
		array(
			'id'     => 'ai-implementation',
			'icon'   => 'Sparkles',
			'title'  => 'AI Implementation & Consulting',
			'pillar' => 'AI',
			'short'  => 'Find the highest-leverage places AI can take work off your plate — then build them.',
			'long'   => 'We start with a discovery workshop, map the manual hours across your team, and identify where AI delivers a clear return. From there we design the roadmap, build the solution, and train your team to run it day to day — so the value sticks long after we hand it over.',
		),
		array(
			'id'     => 'workflows-agents',
			'icon'   => 'Workflow',
			'title'  => 'Workflow Automation & AI Agents',
			'pillar' => 'AI',
			'short'  => 'We come in and build the workflows and agents that quietly run your business.',
			'long'   => 'Trigger-based automations for approvals, customer messages, and internal handoffs. Customer-facing chatbots and internal copilots trained on your documents, your tone, and your edge cases. We come in, build the workflows and agents for your organization, and integrate them into the tools your team already uses.',
		),
	);
}

function vcs_service( $id ) {
	foreach ( vcs_services() as $service ) {
		if ( $service['id'] === $id ) {
			return $service;
		}
	}
	return null;
}

function vcs_value_props() {
	return array(
		array(
			'n'     => '01',
			'icon'  => 'Users',
			'title' => 'Dedicated to small & medium business.',
			'body'  => 'We specialize in IT and AI for SMEs. Your team gets the same attention and senior eyes you would only find as a much bigger client elsewhere.',
		),
		array(
			'n'     => '02',
			'icon'  => 'Cog',
			'title' => 'Proactive, not reactive.',
			'body'  => 'Proactive maintenance and monitoring designed to prevent issues before they reach your team. Less downtime, more uptime, fewer fire drills.',
		),
		array(
			'n'     => '03',
			'icon'  => 'Workflow',
			'title' => 'Tailored to how you work.',
			'body'  => 'Every business has unique IT and AI requirements. We align solutions to your specific workflows so the technology fits the team, not the other way around.',
		),
		array(
			'n'     => '04',
			'icon'  => 'Shield',
			'title' => 'Security as a default.',
			'body'  => 'Security is a top priority on every engagement. Robust safeguards protect your infrastructure and data from threats and vulnerabilities from day one.',
		),
		array(
			'n'     => '05',
			'icon'  => 'Sparkles',
			'title' => 'Guidance and consultation.',
			'body'  => 'From adopting new technologies — including AI — to optimizing existing systems, our team offers practical insights to support real business decisions.',
		),
	);
}

/* -------------------------------------------------------------------------
 * Routing helpers
 * ---------------------------------------------------------------------- */
function vcs_page_url( $which ) {
	if ( 'home' === $which ) {
		return home_url( '/' );
	}
	if ( 'blog' === $which ) {
		$blog_id = (int) get_option( 'page_for_posts' );
		return $blog_id ? get_permalink( $blog_id ) : home_url( '/' );
	}

	$opt_id = (int) get_option( 'vcs_page_' . $which );
	if ( $opt_id && 'publish' === get_post_status( $opt_id ) ) {
		return get_permalink( $opt_id );
	}
	$page = get_page_by_path( $which );
	if ( $page ) {
		return get_permalink( $page );
	}
	return home_url( '/' );
}

function vcs_is_current( $which ) {
	if ( 'home' === $which ) {
		return is_front_page();
	}
	if ( 'blog' === $which ) {
		return ( is_home() && ! is_front_page() ) || is_singular( 'post' ) || is_archive() || is_search();
	}

	$opt_id = (int) get_option( 'vcs_page_' . $which );
	if ( is_page() && $opt_id && get_queried_object_id() === $opt_id ) {
		return true;
	}
	return is_page( $which );
}

/* -------------------------------------------------------------------------
 * Contact form handler — posts to admin-post.php, emails the site admin.
 * ---------------------------------------------------------------------- */
function vcs_handle_contact() {
	$redirect = wp_get_referer();
	if ( ! $redirect ) {
		$redirect = vcs_page_url( 'contact' );
	}

	$fail = function ( $status ) use ( $redirect ) {
		wp_safe_redirect( add_query_arg( 'vcs_contact', $status, $redirect ) . '#vcs-form' );
		exit;
	};

	if ( ! isset( $_POST['vcs_contact_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['vcs_contact_nonce'] ), 'vcs_contact' ) ) {
		$fail( 'error' );
	}

	// Honeypot — silently treat bot submissions as "sent".
	if ( ! empty( $_POST['vcs_website'] ) ) {
		$fail( 'sent' );
	}

	$name     = isset( $_POST['vcs_name'] ) ? sanitize_text_field( wp_unslash( $_POST['vcs_name'] ) ) : '';
	$company  = isset( $_POST['vcs_company'] ) ? sanitize_text_field( wp_unslash( $_POST['vcs_company'] ) ) : '';
	$email    = isset( $_POST['vcs_email'] ) ? sanitize_email( wp_unslash( $_POST['vcs_email'] ) ) : '';
	$phone    = isset( $_POST['vcs_phone'] ) ? sanitize_text_field( wp_unslash( $_POST['vcs_phone'] ) ) : '';
	$interest = isset( $_POST['vcs_interest'] ) ? sanitize_text_field( wp_unslash( $_POST['vcs_interest'] ) ) : '';
	$message  = isset( $_POST['vcs_message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['vcs_message'] ) ) : '';

	if ( '' === $name || '' === $company || ! is_email( $email ) ) {
		$fail( 'error' );
	}

	$to      = get_option( 'admin_email' );
	$subject = sprintf( '[%s] Consultation request — %s', wp_specialchars_decode( get_bloginfo( 'name' ) ), $company );
	$body    = "A consultation request was submitted from the website.\n\n"
		. "Name:    {$name}\n"
		. "Company: {$company}\n"
		. "Email:   {$email}\n"
		. "Phone:   " . ( $phone ? $phone : '—' ) . "\n"
		. "Focus:   " . ( $interest ? $interest : '—' ) . "\n\n"
		. "Message:\n" . ( $message ? $message : '—' ) . "\n";
	$headers = array( 'Reply-To: ' . $name . ' <' . $email . '>' );

	wp_mail( $to, $subject, $body, $headers );

	wp_safe_redirect( add_query_arg( 'vcs_contact', 'sent', $redirect ) . '#vcs-form' );
	exit;
}
add_action( 'admin_post_nopriv_vcs_contact', 'vcs_handle_contact' );
add_action( 'admin_post_vcs_contact', 'vcs_handle_contact' );

/* -------------------------------------------------------------------------
 * First-run setup — create the pages the theme expects so the site works
 * straight after the theme is activated.
 * ---------------------------------------------------------------------- */
function vcs_ensure_page( $slug, $title, $template = '' ) {
	$existing = get_page_by_path( $slug );
	if ( $existing ) {
		$id = $existing->ID;
	} else {
		$id = wp_insert_post(
			array(
				'post_title'  => $title,
				'post_name'   => $slug,
				'post_status' => 'publish',
				'post_type'   => 'page',
			)
		);
	}
	if ( ! $id || is_wp_error( $id ) ) {
		return 0;
	}
	if ( $template ) {
		update_post_meta( $id, '_wp_page_template', $template );
	}
	return (int) $id;
}

function vcs_after_switch_theme() {
	$home_id = vcs_ensure_page( 'home', 'Home' );
	$blog_id = vcs_ensure_page( 'blog', 'Blog' );

	if ( $home_id ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $home_id );
	}
	if ( $blog_id ) {
		update_option( 'page_for_posts', $blog_id );
	}

	$services_id = vcs_ensure_page( 'services', 'Services', 'page-templates/template-services.php' );
	$contact_id  = vcs_ensure_page( 'contact', 'Contact', 'page-templates/template-contact.php' );

	if ( $services_id ) {
		update_option( 'vcs_page_services', $services_id );
	}
	if ( $contact_id ) {
		update_option( 'vcs_page_contact', $contact_id );
	}

	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'vcs_after_switch_theme' );

/* -------------------------------------------------------------------------
 * Misc
 * ---------------------------------------------------------------------- */
function vcs_excerpt_more() {
	return '…';
}
add_filter( 'excerpt_more', 'vcs_excerpt_more' );

function vcs_reading_time( $post_id = null ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	$words   = str_word_count( wp_strip_all_tags( get_post_field( 'post_content', $post_id ) ) );
	return max( 1, (int) ceil( $words / 200 ) );
}
