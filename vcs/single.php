<?php
/**
 * Single blog post.
 *
 * @package vcs
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

while ( have_posts() ) :
	the_post();
	$vcs_cats = get_the_category();
	$vcs_tag  = ! empty( $vcs_cats ) ? $vcs_cats[0]->name : 'Guide';
	?>

	<section class="vcs-post-hero">
		<div class="vcs-container--text">
			<a class="vcs-back-link" href="<?php echo esc_url( vcs_page_url( 'blog' ) ); ?>">
				<?php echo vcs_icon( 'ChevLeft', 14 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> All posts
			</a>
			<div class="vcs-post-hero-meta">
				<span class="vcs-badge"><?php echo esc_html( $vcs_tag ); ?></span>
				<span class="vcs-post-hero-date"><?php echo esc_html( get_the_date() ); ?> &middot; <?php echo esc_html( vcs_reading_time() ); ?> min read</span>
			</div>
			<h1 class="vcs-post-title"><?php the_title(); ?></h1>
		</div>
	</section>

	<article <?php post_class( 'vcs-post-article' ); ?>>
		<div class="vcs-container--text">
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="vcs-post-thumb"><?php the_post_thumbnail( 'large' ); ?></div>
			<?php endif; ?>

			<div class="vcs-post-content">
				<?php the_content(); ?>
			</div>

			<?php
			wp_link_pages(
				array(
					'before' => '<div class="vcs-text">' . esc_html__( 'Pages:', 'vcs' ),
					'after'  => '</div>',
				)
			);
			?>

			<div class="vcs-post-cta">
				<div class="vcs-post-cta-title">Want a walkthrough of this for your business?</div>
				<div class="vcs-post-cta-text">We&rsquo;ll review your current setup and send back a one-page plan. Free, no commitment.</div>
				<?php echo vcs_cta_button( array( 'size' => 'lg' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</div>
		</div>
	</article>

	<?php
endwhile;

get_footer();
