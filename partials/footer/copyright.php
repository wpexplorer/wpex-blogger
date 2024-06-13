<?php
/**
 * The default template for displaying the footer copyright
 *
 * @package WPEX Blogger
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$copy = get_theme_mod( 'wpex_copyright' );
$copy = $copy ? $copy : '<a href="https://www.wpexplorer.com/blogger-free-wordpress-theme/" title="Blogger WordPress Theme">Blogger Theme</a> by <a href="https://www.wpexplorer.com">WPExplorer</a> Powered by <a href="https://wordpress.org" title="WordPress">WordPress</a>';  ?>

<footer id="copyright-wrap" class="clr">

	<div id="copyright" role="contentinfo" class="clr"><?php

		echo wp_kses_post( do_shortcode( $copy ) );

	?></div><!-- #copyright -->

</footer><!-- #footer-wrap -->