<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package     Blogger WordPress theme
 * @subpackage  Templates
 * @author      Alexander Clarke
 * @link        http://www.wpexplorer.com
 * @since       1.0.0
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<main id="content" class="site-content" role="main">

			<article id="error-page" class="boxed clr">	
				<h1 id="error-page-title">404</h1>			
				<p id="error-page-text">
				<?php _e( 'Unfortunately, the page you tried accessing could not be retrieved.', 'wpex' ); ?>
				</p>
			</article><!-- #error-page -->
			
		</main><!-- #content -->

	</div><!-- #primary -->

<?php get_footer(); ?>