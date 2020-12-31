<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WPEX Blogger
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header(); ?>

	<div id="primary" class="content-area clr">

		<main id="content" class="site-content left-content clr" role="main">

			<?php get_template_part( 'partials/archive', 'header' ); ?>

			<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'partials/entry/layout' ); ?>

					<?php endwhile; ?>

				<?php wpex_pagination(); ?>

			<?php else : ?>

				<?php
				// Display no post found notice
				get_template_part( 'partials/none' ); ?>

			<?php endif; ?>

		</main><!-- #content -->

		<?php get_sidebar(); ?>

	</div><!-- #primary -->

<?php get_footer(); ?>