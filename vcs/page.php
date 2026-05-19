<?php
/**
 * Generic page template (used for pages without a dedicated template,
 * e.g. Privacy and Terms).
 *
 * @package vcs
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

while ( have_posts() ) :
	the_post();
	?>

	<section class="vcs-post-hero">
		<div class="vcs-container--text">
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
		</div>
	</article>

	<?php
endwhile;

get_footer();
