<?php
/**
 * Blog index.
 *
 * @package vcs
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<section class="vcs-blog-hero">
	<div class="vcs-container">
		<span class="vcs-badge vcs-badge--accent"><span class="vcs-badge-dot"></span> Blog</span>
		<h1 class="vcs-page-title">Notes on IT, AI, and running a business in 2026.</h1>
		<p class="vcs-lead">Practical guides for Canadian SMEs — written by the same people doing the implementations.</p>
	</div>
</section>

<section class="vcs-blog-list">
	<div class="vcs-blog-grid">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				$vcs_cats = get_the_category();
				$vcs_tag  = ! empty( $vcs_cats ) ? $vcs_cats[0]->name : 'Guide';
				?>
				<a class="vcs-post-card" href="<?php the_permalink(); ?>">
					<div class="vcs-post-card-meta">
						<span class="vcs-badge"><?php echo esc_html( $vcs_tag ); ?></span>
						<span class="vcs-post-card-date"><?php echo esc_html( get_the_date() ); ?> &middot; <?php echo esc_html( vcs_reading_time() ); ?> min read</span>
					</div>
					<h2 class="vcs-post-card-title"><?php the_title(); ?></h2>
					<p class="vcs-post-card-excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 32, '…' ) ); ?></p>
					<span class="vcs-post-card-cta">Read article <?php echo vcs_icon( 'ArrowRight', 14 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
				</a>
				<?php
			endwhile;
		endif;
		?>

		<div class="vcs-post-card vcs-post-card--soon">
			<div class="vcs-soon-kicker">Coming soon</div>
			<h3>Where AI actually pays off for small business.</h3>
			<p>A practical breakdown of the AI projects we are recommending — and quietly declining — in 2026.</p>
		</div>
	</div>

	<?php
	the_posts_pagination(
		array(
			'class'              => 'vcs-pagination',
			'mid_size'           => 1,
			'prev_text'          => __( 'Previous', 'vcs' ),
			'next_text'          => __( 'Next', 'vcs' ),
			'screen_reader_text' => __( 'Posts navigation', 'vcs' ),
		)
	);
	?>
</section>

<?php
get_footer();
