<?php
/**
 * Presentational helpers — icons, the animated cable graphic and mock cards.
 *
 * @package vcs
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/* -------------------------------------------------------------------------
 * Inline SVG icons (stroked, 24x24 grid).
 * ---------------------------------------------------------------------- */
function vcs_icon( $name, $size = 20 ) {
	$paths = array(
		'Cog'        => '<circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.7 1.7 0 00.3 1.8l.1.1a2 2 0 11-2.8 2.8l-.1-.1a1.7 1.7 0 00-1.8-.3 1.7 1.7 0 00-1 1.5V21a2 2 0 01-4 0v-.1a1.7 1.7 0 00-1-1.5 1.7 1.7 0 00-1.8.3l-.1.1a2 2 0 11-2.8-2.8l.1-.1a1.7 1.7 0 00.3-1.8 1.7 1.7 0 00-1.5-1H3a2 2 0 010-4h.1a1.7 1.7 0 001.5-1 1.7 1.7 0 00-.3-1.8l-.1-.1a2 2 0 112.8-2.8l.1.1a1.7 1.7 0 001.8.3H9a1.7 1.7 0 001-1.5V3a2 2 0 014 0v.1a1.7 1.7 0 001 1.5 1.7 1.7 0 001.8-.3l.1-.1a2 2 0 112.8 2.8l-.1.1a1.7 1.7 0 00-.3 1.8V9a1.7 1.7 0 001.5 1H21a2 2 0 010 4h-.1a1.7 1.7 0 00-1.5 1z"/>',
		'Cloud'      => '<path d="M17.5 19a4.5 4.5 0 100-9 6 6 0 00-11.6 1.5A4 4 0 006.5 19h11z"/>',
		'Server'     => '<rect x="3" y="4" width="18" height="6" rx="1"/><rect x="3" y="14" width="18" height="6" rx="1"/><path d="M7 7h.01M7 17h.01"/>',
		'Workflow'   => '<rect x="3" y="3" width="6" height="6" rx="1"/><rect x="15" y="3" width="6" height="6" rx="1"/><rect x="9" y="15" width="6" height="6" rx="1"/><path d="M6 9v3a3 3 0 003 3M18 9v3a3 3 0 01-3 3"/>',
		'Database'   => '<ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M3 5v6c0 1.7 4 3 9 3s9-1.3 9-3V5M3 11v6c0 1.7 4 3 9 3s9-1.3 9-3v-6"/>',
		'Shield'     => '<path d="M12 2l8 4v6c0 5-3.5 9-8 10-4.5-1-8-5-8-10V6l8-4z"/><path d="M9 12l2 2 4-4"/>',
		'Sparkles'   => '<path d="M12 3l1.5 4.5L18 9l-4.5 1.5L12 15l-1.5-4.5L6 9l4.5-1.5L12 3z"/><path d="M19 16l.7 2 2 .7-2 .7-.7 2-.7-2-2-.7 2-.7.7-2zM5 14l.4 1.2L6.6 16l-1.2.4L5 17.6l-.4-1.2L3.4 16l1.2-.4L5 14z"/>',
		'Users'      => '<path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.9M16 3.1a4 4 0 010 7.8"/>',
		'Mail'       => '<rect x="2" y="4" width="20" height="16" rx="2"/><path d="M2 7l10 6 10-6"/>',
		'Phone'      => '<path d="M22 16.9v3a2 2 0 01-2.2 2 19.8 19.8 0 01-8.6-3 19.5 19.5 0 01-6-6A19.8 19.8 0 012.1 4.2 2 2 0 014.1 2h3a2 2 0 012 1.7c.1 1 .3 1.9.6 2.8a2 2 0 01-.5 2.1L8 9.7a16 16 0 006 6l1.1-1.1a2 2 0 012.1-.5c.9.3 1.8.5 2.8.6a2 2 0 011.7 2z"/>',
		'MapPin'     => '<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/>',
		'ArrowRight' => '<line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>',
		'Check'      => '<polyline points="20 6 9 17 4 12"/>',
		'ChevLeft'   => '<polyline points="15 18 9 12 15 6"/>',
		'Menu'       => '<line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/>',
		'Close'      => '<line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>',
	);

	if ( ! isset( $paths[ $name ] ) ) {
		$name = 'Sparkles';
	}
	$size = (int) $size;

	return sprintf(
		'<svg class="vcs-icon" width="%1$d" height="%1$d" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">%2$s</svg>',
		$size,
		$paths[ $name ]
	);
}

/**
 * Maple-leaf mark used in trust badges.
 */
function vcs_maple( $size = 16, $color = 'currentColor' ) {
	$size = (int) $size;
	return sprintf(
		'<svg class="vcs-maple" width="%1$d" height="%1$d" viewBox="0 0 24 24" fill="%2$s" aria-hidden="true" focusable="false"><path d="M12 2l1.2 4.4 2.8-1.4-.5 3.4L19 8.5l-1.5 2.5 4.5 1.5-4 1 .5 2-3.5-.6L13 21h-2l-1.5-6-3.5.6.5-2-4-1L7 10.5 5.5 8 8.5 8.4 8 5l2.8 1.4z"/></svg>',
		$size,
		esc_attr( $color )
	);
}

/* -------------------------------------------------------------------------
 * Animated network-cable motion graphic.
 *
 * Each cable is a bezier path drawn three times (dark edge + light body +
 * pale highlight) with a stroke-dashoffset draw-on, plus glowing pulses that
 * ride the path. Layouts run edge-to-edge so the flow reads as continuous.
 * ---------------------------------------------------------------------- */
function vcs_cable_layouts() {
	return array(
		'hero'    => array(
			array( 'd' => 'M -40,140 C 360,180 560,520 820,460 C 1040,410 1180,260 1640,300', 'a' => array( -32, 140, 8 ), 'b' => array( 1632, 300, 180 ) ),
			array( 'd' => 'M -40,260 C 220,300 320,200 540,180 C 760,160 980,260 1180,200 C 1380,160 1500,200 1640,180', 'a' => array( -32, 260, 5 ), 'b' => array( 1632, 180, 180 ) ),
			array( 'd' => 'M -40,420 C 280,460 460,360 700,500 C 980,660 1240,580 1640,540', 'a' => array( -32, 420, 6 ), 'b' => array( 1632, 540, 180 ) ),
			array( 'd' => 'M -40,600 C 280,620 460,560 700,580 C 980,610 1240,640 1640,620', 'a' => array( -32, 600, -3 ), 'b' => array( 1632, 620, 180 ) ),
			array( 'd' => 'M -40,720 C 200,640 380,820 640,760 C 920,690 1160,860 1640,780', 'a' => array( -32, 720, 4 ), 'b' => array( 1632, 780, 180 ) ),
		),
		'contact' => array(
			array( 'd' => 'M -40,120 C 280,160 600,200 900,260 C 1180,310 1380,300 1640,280', 'a' => array( -32, 120, 6 ), 'b' => array( 1632, 280, 180 ) ),
			array( 'd' => 'M -40,320 C 360,340 720,400 1040,420 C 1260,432 1440,440 1640,440', 'a' => array( -32, 320, 2 ), 'b' => array( 1632, 440, 180 ) ),
			array( 'd' => 'M -40,540 C 320,520 700,500 1020,490 C 1240,484 1440,470 1640,460', 'a' => array( -32, 540, -3 ), 'b' => array( 1632, 460, 180 ) ),
			array( 'd' => 'M -40,740 C 360,700 720,600 1080,540 C 1300,508 1440,490 1640,500', 'a' => array( -32, 740, -5 ), 'b' => array( 1632, 500, 180 ) ),
		),
		'intro'   => array(
			array( 'd' => 'M -40,140 C 240,200 480,280 660,360', 'a' => array( -32, 140, 22 ), 'b' => array( 660, 360, 30 ) ),
			array( 'd' => 'M -40,440 C 240,440 460,450 600,450', 'a' => array( -32, 440, 0 ), 'b' => array( 600, 450, 0 ) ),
			array( 'd' => 'M -40,760 C 240,700 480,620 660,540', 'a' => array( -32, 760, -22 ), 'b' => array( 660, 540, -30 ) ),
			array( 'd' => 'M 1640,140 C 1360,200 1120,280 940,360', 'a' => array( 1632, 140, 158 ), 'b' => array( 940, 360, 210 ) ),
			array( 'd' => 'M 1640,440 C 1360,440 1140,450 1000,450', 'a' => array( 1632, 440, 180 ), 'b' => array( 1000, 450, 180 ) ),
			array( 'd' => 'M 1640,760 C 1360,700 1120,620 940,540', 'a' => array( 1632, 760, 202 ), 'b' => array( 940, 540, 150 ) ),
			array( 'd' => 'M 460,-40 C 560,160 660,260 720,320', 'a' => array( 460, -32, 108 ), 'b' => array( 720, 320, 130 ) ),
			array( 'd' => 'M 1140,-40 C 1040,160 940,260 880,320', 'a' => array( 1140, -32, 72 ), 'b' => array( 880, 320, 50 ) ),
			array( 'd' => 'M 460,940 C 560,720 660,620 720,560', 'a' => array( 460, 940, -108 ), 'b' => array( 720, 560, -130 ) ),
			array( 'd' => 'M 1140,940 C 1040,720 940,620 880,560', 'a' => array( 1140, 940, -72 ), 'b' => array( 880, 560, -50 ) ),
		),
	);
}

function vcs_cable_plug( $x, $y, $rot, $delay ) {
	$delay = $delay + 0.4;
	$out   = sprintf(
		'<g transform="translate(%s, %s) rotate(%s)" style="animation: vcs-plug-pop .5s ease-out %ss both;">',
		$x,
		$y,
		$rot,
		$delay
	);
	$out .= '<rect x="-22" y="-9" width="26" height="18" rx="3" fill="#0e1a2a" stroke="#2d4360" stroke-width="1"/>';
	$out .= '<g fill="#afc1d0">';
	$out .= '<rect x="-18" y="-7" width="1.6" height="6"/><rect x="-14" y="-7" width="1.6" height="6"/>';
	$out .= '<rect x="-10" y="-7" width="1.6" height="6"/><rect x="-6" y="-7" width="1.6" height="6"/>';
	$out .= '</g>';
	$out .= '<rect x="4" y="-7" width="6" height="14" rx="2" fill="#1c3046"/>';
	$out .= '</g>';
	return $out;
}

function vcs_cable_graphic( $variant = 'hero', $args = array() ) {
	$layouts = vcs_cable_layouts();
	$cables  = isset( $layouts[ $variant ] ) ? $layouts[ $variant ] : $layouts['hero'];

	$args = wp_parse_args(
		$args,
		array(
			'intensity'    => 1,
			'vignette'     => true,
			'ambient_glow' => true,
			'class'        => '',
		)
	);

	static $seq = 0;
	$seq++;
	$uid = 'vcsc' . $seq;

	$svg  = sprintf(
		'<svg class="vcs-cable-svg %s" viewBox="0 0 1600 900" preserveAspectRatio="xMidYMid slice" aria-hidden="true" focusable="false">',
		esc_attr( $args['class'] )
	);

	// --- defs ---------------------------------------------------------
	$svg .= '<defs>';
	$svg .= sprintf( '<filter id="glow-%s" x="-50%%" y="-50%%" width="200%%" height="200%%"><feGaussianBlur stdDeviation="6" result="b"/><feMerge><feMergeNode in="b"/><feMergeNode in="SourceGraphic"/></feMerge></filter>', $uid );
	$svg .= sprintf( '<radialGradient id="vign-%s" cx="50%%" cy="50%%" r="65%%"><stop offset="0%%" stop-color="rgba(0,0,0,0)"/><stop offset="70%%" stop-color="rgba(0,0,0,0.35)"/><stop offset="100%%" stop-color="rgba(0,0,0,0.85)"/></radialGradient>', $uid );
	foreach ( $cables as $i => $cable ) {
		$svg .= sprintf( '<path id="cbl-%s-%d" d="%s" fill="none"/>', $uid, $i, esc_attr( $cable['d'] ) );
	}
	$svg .= '</defs>';

	// --- ambient glow -------------------------------------------------
	if ( $args['ambient_glow'] ) {
		$svg .= '<ellipse cx="800" cy="460" rx="520" ry="220" fill="#1c3f60" opacity="0.45" style="filter: blur(80px);"/>';
	}

	// --- cables -------------------------------------------------------
	foreach ( $cables as $i => $cable ) {
		$delay = $i * 0.18;
		$svg  .= sprintf( '<g style="animation: vcs-cable-draw 1.6s cubic-bezier(.65,.05,.36,1) %ss both;">', $delay );
		$svg  .= sprintf( '<path d="%s" fill="none" stroke="#1c3046" stroke-width="8" stroke-linecap="round" style="stroke-dasharray:2400;stroke-dashoffset:2400;animation: vcs-cable-stroke 1.6s cubic-bezier(.65,.05,.36,1) %ss both;"/>', esc_attr( $cable['d'] ), $delay );
		$svg  .= sprintf( '<path d="%s" fill="none" stroke="#6a8db0" stroke-width="5.5" stroke-linecap="round" style="stroke-dasharray:2400;stroke-dashoffset:2400;animation: vcs-cable-stroke 1.6s cubic-bezier(.65,.05,.36,1) %ss both;"/>', esc_attr( $cable['d'] ), $delay );
		$svg  .= sprintf( '<path d="%s" fill="none" stroke="#cdd9e6" stroke-width="1.3" stroke-linecap="round" stroke-opacity="0.7" style="stroke-dasharray:2400;stroke-dashoffset:2400;animation: vcs-cable-stroke 1.6s cubic-bezier(.65,.05,.36,1) %ss both;"/>', esc_attr( $cable['d'] ), $delay + 0.1 );
		$svg  .= '</g>';
	}

	// --- plugs --------------------------------------------------------
	foreach ( $cables as $i => $cable ) {
		$delay = $i * 0.18;
		$svg  .= vcs_cable_plug( $cable['a'][0], $cable['a'][1], $cable['a'][2], $delay );
		$svg  .= vcs_cable_plug( $cable['b'][0], $cable['b'][1], $cable['b'][2], $delay + 0.3 );
	}

	// --- pulses -------------------------------------------------------
	$pulse_count = max( 1, (int) round( $args['intensity'] * 2 ) );
	$svg        .= sprintf( '<g style="filter: url(#glow-%s);">', $uid );
	foreach ( $cables as $i => $cable ) {
		for ( $p = 0; $p < $pulse_count; $p++ ) {
			$delay    = fmod( $i * 0.6 + $p * 3, 6 );
			$duration = 5.6 + ( $i % 3 ) * 0.7;
			$path_id  = sprintf( 'cbl-%s-%d', $uid, $i );

			$svg .= '<circle r="10" fill="#ffffff" opacity="0.28">';
			$svg .= sprintf( '<animateMotion dur="%ss" repeatCount="indefinite" begin="%ss" rotate="auto"><mpath href="#%s"/></animateMotion>', $duration, $delay, $path_id );
			$svg .= sprintf( '<animate attributeName="opacity" values="0;0.28;0.28;0" keyTimes="0;.05;.95;1" dur="%ss" repeatCount="indefinite" begin="%ss"/>', $duration, $delay );
			$svg .= '</circle>';

			$svg .= '<circle r="3" fill="#ffffff">';
			$svg .= sprintf( '<animateMotion dur="%ss" repeatCount="indefinite" begin="%ss" rotate="auto"><mpath href="#%s"/></animateMotion>', $duration, $delay, $path_id );
			$svg .= sprintf( '<animate attributeName="opacity" values="0;1;1;0" keyTimes="0;.05;.95;1" dur="%ss" repeatCount="indefinite" begin="%ss"/>', $duration, $delay );
			$svg .= '</circle>';
		}
	}
	$svg .= '</g>';

	// --- vignette -----------------------------------------------------
	if ( $args['vignette'] ) {
		$svg .= sprintf( '<rect width="1600" height="900" fill="url(#vign-%s)"/>', $uid );
	}

	$svg .= '</svg>';

	return $svg;
}

/* -------------------------------------------------------------------------
 * Mock product cards.
 * ---------------------------------------------------------------------- */
function vcs_infra_status() {
	$rows = array(
		array( 'key' => 'm365',    'name' => 'Microsoft 365',  'detail' => '99.98% · 12 mailboxes', 'state' => 'Healthy' ),
		array( 'key' => 'aws',     'name' => 'AWS · prod',     'detail' => '4 EC2 · 1 RDS · 42 ms', 'state' => 'Healthy' ),
		array( 'key' => 'backups', 'name' => 'Backups',        'detail' => 'Last: 2h ago',          'state' => 'Healthy' ),
		array( 'key' => 'patch',   'name' => 'Endpoint patch', 'detail' => '2 of 18 devices',       'state' => 'Pending' ),
	);

	$out  = '<div class="vcs-mock vcs-infra" data-vcs-infra>';
	$out .= '<div class="vcs-infra-head"><div class="vcs-infra-head-l">';
	$out .= '<div class="vcs-infra-title">Infrastructure</div>';
	$out .= '<span class="vcs-live-badge"><span class="vcs-live-dot"></span> Live</span>';
	$out .= '</div><span class="vcs-infra-by">Monitored by VCS</span></div>';

	foreach ( $rows as $row ) {
		$ok       = ( 'Healthy' === $row['state'] );
		$dot_mod  = $ok ? 'ok' : 'warn';
		$state_md = $ok ? 'ok' : 'warn';
		$out     .= sprintf( '<div class="vcs-infra-row" data-vcs-infra-row="%s">', esc_attr( $row['key'] ) );
		$out     .= sprintf( '<span class="vcs-status-dot vcs-status-dot--%s" data-vcs-dot></span>', $dot_mod );
		$out     .= '<div>';
		$out     .= sprintf( '<div class="vcs-infra-name">%s</div>', esc_html( $row['name'] ) );
		$out     .= sprintf( '<div class="vcs-infra-detail" data-vcs-detail>%s</div>', esc_html( $row['detail'] ) );
		$out     .= '</div>';
		$out     .= sprintf( '<span class="vcs-infra-state vcs-infra-state--%s" data-vcs-state>%s</span>', $state_md, esc_html( $row['state'] ) );
		$out     .= '</div>';
	}

	$out .= '<div class="vcs-infra-disclaimer">For illustration only. Actual client data is never shared externally.</div>';
	$out .= '</div>';
	return $out;
}

function vcs_ai_workflow_card() {
	$nodes = array(
		array( 'label' => 'Trigger', 'sub' => 'New customer message',  'icon' => 'Mail',     'accent' => false ),
		array( 'label' => 'AI step', 'sub' => 'Classify · summarize',  'icon' => 'Sparkles', 'accent' => true ),
		array( 'label' => 'Route',   'sub' => 'Right team · auto-reply', 'icon' => 'Workflow', 'accent' => false ),
		array( 'label' => 'Log',     'sub' => 'CRM · dashboard',       'icon' => 'Database', 'accent' => false ),
	);

	$out  = '<div class="vcs-mock">';
	$out .= '<div class="vcs-flow-head"><div>';
	$out .= '<div class="vcs-flow-kicker">Workflow · example</div>';
	$out .= '<div class="vcs-flow-title">An AI step inside the daily flow</div>';
	$out .= '</div>';
	$out .= '<span class="vcs-flow-tag">' . vcs_icon( 'Sparkles', 12 ) . ' Live</span>';
	$out .= '</div>';

	$out .= '<div class="vcs-flow-grid">';
	$last = count( $nodes ) - 1;
	foreach ( $nodes as $i => $node ) {
		$mod  = $node['accent'] ? ' vcs-flow-node--accent' : '';
		$out .= '<div class="vcs-flow-node' . $mod . '">';
		$out .= '<div class="vcs-flow-icon">' . vcs_icon( $node['icon'], 15 ) . '</div>';
		$out .= '<div class="vcs-flow-node-label">' . esc_html( $node['label'] ) . '</div>';
		$out .= '<div class="vcs-flow-node-sub">' . esc_html( $node['sub'] ) . '</div>';
		if ( $i < $last ) {
			$out .= '<div class="vcs-flow-arrow" aria-hidden="true">&rsaquo;</div>';
		}
		$out .= '</div>';
	}
	$out .= '</div>';

	$out .= '<div class="vcs-flow-foot">';
	$out .= '<div class="vcs-flow-foot-icon">' . vcs_icon( 'Sparkles', 12 ) . '</div>';
	$out .= '<div>The AI step does the boring part — reading, summarizing, deciding. Your team owns the judgment calls.</div>';
	$out .= '</div>';
	$out .= '</div>';
	return $out;
}

/**
 * Primary call-to-action button (markup shared across templates).
 */
function vcs_cta_button( $args = array() ) {
	$args = wp_parse_args(
		$args,
		array(
			'label'   => 'Schedule a consultation',
			'url'     => vcs_page_url( 'contact' ),
			'variant' => 'primary',
			'size'    => 'md',
			'arrow'   => true,
			'class'   => '',
		)
	);

	$icon = $args['arrow'] ? ' ' . vcs_icon( 'ArrowRight', 'lg' === $args['size'] ? 16 : 14 ) : '';

	return sprintf(
		'<a class="vcs-btn vcs-btn--%s vcs-btn--%s %s" href="%s">%s%s</a>',
		esc_attr( $args['variant'] ),
		esc_attr( $args['size'] ),
		esc_attr( $args['class'] ),
		esc_url( $args['url'] ),
		esc_html( $args['label'] ),
		$icon
	);
}
