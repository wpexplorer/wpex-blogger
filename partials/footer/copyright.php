<?php
/**
 * The default template for displaying the footer copyright
 *
 * @package     Blogger WordPress theme
 * @subpackage  Partials
 * @author      Alexander Clarke
 * @link        http://www.wpexplorer.com
 * @since       1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Get copyright text
$copy = get_theme_mod( 'wpex_copyright', 'Blogger <a href="http://www.wordpress.org" title="WordPress" target="_blank">WordPress</a> Theme Designed &amp; Developed by <a href="http://www.wpexplorer.com/" target="_blank" title="WPExplorer">WPExplorer</a>' ); ?>

<footer id="copyright-wrap" class="clr">

	<div id="copyright" role="contentinfo" class="clr">

		<?php
		// Display custom copyright
		if ( $copy ) : ?>
			<?php echo do_shortcode( $copy ); ?>
		<?php
		// Copyright fallback
		else : ?>
			&copy; <?php _e( 'Copyright', 'wpex' ); ?> <?php the_date( 'Y' ); ?> &middot; <a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a>
		<?php endif; ?>

	</div><!-- #copyright -->

</footer><!-- #footer-wrap -->