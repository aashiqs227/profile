/* VirtuCore Solutions — front-end behaviour. */
( function () {
	'use strict';

	var reduceMotion = window.matchMedia &&
		window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;

	/* ---------------------------------------------------------------
	 * Mobile navigation
	 * ------------------------------------------------------------- */
	function initNav() {
		var toggle = document.getElementById( 'vcs-nav-toggle' );
		var menu   = document.getElementById( 'vcs-mobile-menu' );
		if ( ! toggle || ! menu ) {
			return;
		}
		toggle.addEventListener( 'click', function () {
			var open = menu.classList.toggle( 'is-open' );
			toggle.setAttribute( 'aria-expanded', open ? 'true' : 'false' );
		} );
	}

	/* ---------------------------------------------------------------
	 * Live "Infrastructure" status card
	 * ------------------------------------------------------------- */
	var INFRA_SAMPLES = {
		m365: [
			'99.98% · 12 mailboxes', '99.99% · 12 mailboxes', '100.00% · 12 mailboxes',
			'99.97% · 13 mailboxes', '99.98% · 13 mailboxes', '99.99% · 13 mailboxes',
			'99.96% · 13 mailboxes', '99.98% · 14 mailboxes', '99.99% · 14 mailboxes',
			'99.97% · 14 mailboxes', '99.98% · 14 mailboxes', '99.99% · 15 mailboxes'
		],
		aws: [
			'4 EC2 · 1 RDS · 42 ms', '4 EC2 · 1 RDS · 38 ms', '4 EC2 · 1 RDS · 51 ms',
			'5 EC2 · 1 RDS · 44 ms', '5 EC2 · 1 RDS · 39 ms', '5 EC2 · 1 RDS · 47 ms',
			'4 EC2 · 1 RDS · 40 ms', '4 EC2 · 1 RDS · 36 ms', '4 EC2 · 2 RDS · 43 ms',
			'4 EC2 · 2 RDS · 49 ms', '5 EC2 · 2 RDS · 41 ms', '5 EC2 · 2 RDS · 38 ms'
		],
		backups: [
			'Last: 2h ago', 'Last: 1h ago', 'Last: 47m ago', 'Last: 23m ago',
			'Last: 12m ago', 'Last: 5m ago', 'Running now', 'Last: 1m ago',
			'Last: 3m ago', 'Last: 9m ago', 'Last: 16m ago', 'Last: 28m ago'
		],
		patch: [
			{ detail: '2 of 18 devices', state: 'Pending' },
			{ detail: '4 of 18 devices', state: 'Pending' },
			{ detail: '6 of 18 devices', state: 'Pending' },
			{ detail: '9 of 18 devices', state: 'Pending' },
			{ detail: '11 of 18 devices', state: 'Pending' },
			{ detail: '13 of 18 devices', state: 'Pending' },
			{ detail: '15 of 18 devices', state: 'Pending' },
			{ detail: '17 of 18 devices', state: 'Pending' },
			{ detail: '18 of 18 devices', state: 'Healthy' },
			{ detail: 'All up to date', state: 'Healthy' },
			{ detail: '1 of 18 devices', state: 'Pending' },
			{ detail: '3 of 18 devices', state: 'Pending' }
		]
	};
	var INFRA_INTERVALS = { m365: 1600, aws: 2100, backups: 1300, patch: 2400 };

	function initInfraRow( row ) {
		var key = row.getAttribute( 'data-vcs-infra-row' );
		var samples = INFRA_SAMPLES[ key ];
		if ( ! samples ) {
			return;
		}
		var detailEl = row.querySelector( '[data-vcs-detail]' );
		var stateEl  = row.querySelector( '[data-vcs-state]' );
		var dotEl    = row.querySelector( '[data-vcs-dot]' );
		var i = 0;

		window.setInterval( function () {
			i = ( i + 1 ) % samples.length;
			var sample = samples[ i ];

			if ( typeof sample === 'string' ) {
				if ( detailEl ) {
					detailEl.textContent = sample;
				}
				return;
			}
			if ( detailEl ) {
				detailEl.textContent = sample.detail;
			}
			var ok = ( 'Healthy' === sample.state );
			if ( stateEl ) {
				stateEl.textContent = sample.state;
				stateEl.className = 'vcs-infra-state vcs-infra-state--' + ( ok ? 'ok' : 'warn' );
			}
			if ( dotEl ) {
				dotEl.className = 'vcs-status-dot vcs-status-dot--' + ( ok ? 'ok' : 'warn' );
			}
		}, INFRA_INTERVALS[ key ] || 1700 );
	}

	function initInfra() {
		var cards = document.querySelectorAll( '[data-vcs-infra]' );
		for ( var c = 0; c < cards.length; c++ ) {
			var rows = cards[ c ].querySelectorAll( '[data-vcs-infra-row]' );
			for ( var r = 0; r < rows.length; r++ ) {
				initInfraRow( rows[ r ] );
			}
		}
	}

	/* ---------------------------------------------------------------
	 * Cinematic intro veil
	 *
	 * idle → connecting → reveal → docking → done.
	 * ------------------------------------------------------------- */
	function initVeil() {
		var veil = document.getElementById( 'vcs-veil' );
		if ( ! veil ) {
			return;
		}

		var emblem  = document.getElementById( 'vcs-veil-emblem' );
		var hint    = document.getElementById( 'vcs-veil-hint-text' );
		var navLogo = document.querySelector( '.vcs-header .vcs-logo-img' );
		var started = false;
		var listenerTimer = null;

		var HERO_H     = 220;
		var NAV_H      = 36;
		var DOCK_SCALE = NAV_H / HERO_H;

		function markSeen() {
			try {
				sessionStorage.setItem( 'vcs-veil-seen', '1' );
			} catch ( e ) {}
		}

		function removeVeil() {
			if ( veil && veil.parentNode ) {
				veil.parentNode.removeChild( veil );
			}
		}

		// Respect reduced-motion: skip the whole sequence.
		if ( reduceMotion ) {
			markSeen();
			removeVeil();
			return;
		}

		function onWheel( e ) {
			if ( Math.abs( e.deltaY ) > 6 ) {
				start();
			}
		}
		function onKey( e ) {
			if ( [ 'ArrowDown', 'ArrowUp', 'Space', 'Enter', 'PageDown' ].indexOf( e.code ) !== -1 ) {
				start();
			}
		}
		function onTouchStart( e ) {
			var t = e.touches[ 0 ];
			if ( ! t ) {
				return;
			}
			var y0 = t.clientY;
			function onMove( ev ) {
				var b = ev.touches[ 0 ];
				if ( b && Math.abs( b.clientY - y0 ) > 18 ) {
					window.removeEventListener( 'touchmove', onMove );
					start();
				}
			}
			window.addEventListener( 'touchmove', onMove, { passive: true } );
		}
		function addListeners() {
			window.addEventListener( 'wheel', onWheel, { passive: true } );
			window.addEventListener( 'keydown', onKey );
			window.addEventListener( 'touchstart', onTouchStart, { passive: true } );
		}
		function removeListeners() {
			window.removeEventListener( 'wheel', onWheel );
			window.removeEventListener( 'keydown', onKey );
			window.removeEventListener( 'touchstart', onTouchStart );
		}

		function start() {
			if ( started ) {
				return;
			}
			started = true;
			removeListeners();

			var target = { x: 76, y: 38 };
			if ( navLogo ) {
				var rect = navLogo.getBoundingClientRect();
				target = { x: rect.left + rect.width / 2, y: rect.top + rect.height / 2 };
			}

			veil.classList.add( 'is-connecting' );
			if ( hint ) {
				hint.textContent = 'Connecting…';
			}

			window.setTimeout( function () {
				veil.classList.remove( 'is-connecting' );
				veil.classList.add( 'is-reveal' );
			}, 1000 );

			window.setTimeout( function () {
				veil.classList.remove( 'is-reveal' );
				veil.classList.add( 'is-docking' );
				if ( navLogo ) {
					navLogo.style.transition = 'opacity .15s';
					navLogo.style.opacity = '0';
				}
				if ( emblem ) {
					var dx = target.x - window.innerWidth / 2;
					var dy = target.y - window.innerHeight / 2;
					emblem.style.transform =
						'translate(calc(-50% + ' + dx + 'px), calc(-50% + ' + dy + 'px)) scale(' + DOCK_SCALE + ')';
				}
			}, 2100 );

			window.setTimeout( function () {
				markSeen();
				removeVeil();
				if ( navLogo ) {
					window.requestAnimationFrame( function () {
						navLogo.style.transition = 'opacity .4s ease';
						navLogo.style.opacity = '1';
					} );
				}
			}, 3200 );
		}

		veil.addEventListener( 'click', start );
		veil.addEventListener( 'keydown', function ( e ) {
			if ( 'Enter' === e.key || ' ' === e.key || 'Spacebar' === e.key ) {
				e.preventDefault();
				start();
			}
		} );

		// Small delay so the entry animations get a moment before input is armed.
		listenerTimer = window.setTimeout( addListeners, 400 );
		window.addEventListener( 'beforeunload', function () {
			window.clearTimeout( listenerTimer );
			removeListeners();
		} );
	}

	/* --------------------------------------------------------------- */
	function ready( fn ) {
		if ( 'loading' !== document.readyState ) {
			fn();
		} else {
			document.addEventListener( 'DOMContentLoaded', fn );
		}
	}

	ready( function () {
		initNav();
		initInfra();
		initVeil();
	} );
} )();
