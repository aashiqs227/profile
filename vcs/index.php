<?php
/**
 * Fallback template — used for archives and search results.
 *
 * @package vcs
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

if ( is_search() ) {
	/* translators: %s: search query. */
	$vcs_title = sprintf( __( 'Search results for &ldquo;%s&rdquo;', 'vcs' ), get_search_query() );
	$vcs_sub   = __( 'Posts and guides matching your search.', 'vcs' );
} elseif ( is_archive() ) {
	$vcs_title = wp_strip_all_tags( get_the_archive_title() );
	$vcs_sub   = wp_strip_all_tags( get_the_archive_description() );
	if ( '' === $vcs_sub ) {
		$vcs_sub = __( 'Notes on IT, AI, and running a business.', 'vcs' );
	}
} else {
	$vcs_title = __( 'From the blog', 'vcs' );
	$vcs_sub   = __( 'Practical guides for Canadian SMEs.', 'vcs' );
}
?>

<section class="vcs-blog-hero">
	<div class="vcs-container">
		<span class="vcs-badge vcs-badge--accent"><span class="vcs-badge-dot"></span> <?php esc_html_e( 'Blog', 'vcs' ); ?></span>
		<h1 class="vcs-page-title"><?php echo esc_html( $vcs_title ); ?></h1>
		<p class="vcs-lead"><?php echo esc_html( $vcs_sub ); ?></p>
	</div>
</section>

<section class="vcs-blog-list">
	<?php if ( have_posts() ) : ?>
		<div class="vcs-blog-grid">
			<?php
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
					<span class="vcs-post-card-cta"><?php esc_html_e( 'Read article', 'vcs' ); ?> <?php echo vcs_icon( 'ArrowRight', 14 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
				</a>
				<?php
			endwhile;
			?>
		</div>

		<?php
		the_posts_pagination(
			array(
				'class'     => 'vcs-pagination',
				'mid_size'  => 1,
				'prev_text' => __( 'Previous', 'vcs' ),
				'next_text' => __( 'Next', 'vcs' ),
			)
		);
		?>
	<?php else : ?>
		<p class="vcs-empty"><?php esc_html_e( 'Nothing here yet — check back soon.', 'vcs' ); ?></p>
	<?php endif; ?>
</section>

<?php
get_footer();
