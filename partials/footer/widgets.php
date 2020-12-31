<?php
/**
 * Footer widgets.
 *
 * @package WPEX Blogger
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( is_active_sidebar( 'footer-one' ) || is_active_sidebar( 'footer-two' ) || is_active_sidebar( 'footer-three' )  ) :

?>

	<div id="footer-widgets" class="wpex-row clr">

		<div class="footer-box span_1_of_3 col col-1">
			<?php dynamic_sidebar( 'footer-one' ); ?>
		</div><!-- .footer-box -->

		<div class="footer-box span_1_of_3 col col-2">
			<?php dynamic_sidebar( 'footer-two' ); ?>
		</div><!-- .footer-box -->

		<div class="footer-box span_1_of_3 col col-3">
			<?php dynamic_sidebar( 'footer-three' ); ?>
		</div><!-- .footer-box -->

	</div><!-- #footer-widgets -->

<?php endif; ?>