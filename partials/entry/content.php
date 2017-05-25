<?php
/**
 * Displays post entry content
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
} ?>

<div class="loop-entry-content entry clr">

	<?php
	// Display full content
	if ( 'content' == get_theme_mod( 'wpex_entry_content_excerpt', 'excerpt' ) ) {

		the_content();
	}
	// Display custom excerpt
	else {

		$length = intval( get_theme_mod( 'wpex_excerpt_length', 50 ) );
		$length = $length ? $length : '50';
		wpex_excerpt( $length, get_theme_mod( 'wpex_blog_readmore', true ) );
		
	} ?>

</div><!-- .loop-entry-content -->