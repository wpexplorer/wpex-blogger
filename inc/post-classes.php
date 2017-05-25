<?php
/**
 * Adds classes to entries
 *
 * @package     Blogger WordPress theme
 * @subpackage  Includes
 * @author      Alexander Clarke
 * @link        http://www.wpexplorer.com
 * @since       2.0.0
 */

if ( ! function_exists( 'wpex_post_entry_classes' ) ) {

	function wpex_post_entry_classes( $classes ) {
		
		// Post Data
		global $post, $wpex_count;
		$post_id   = $post->ID;
		$post_type = get_post_type( $post_id );

		// Search results
		if ( ! has_post_thumbnail() ) {
			$classes[] = 'no-featured-image';
		}

		// Custom class for non standard post types
		if ( $post_type != 'post' && ! is_singular() ) {
			$classes[] = $post_type .'-entry';
		}

		// All other posts
		if ( ! is_singular() ) {
			$classes[] = 'loop-entry clr boxed';
		}

		// Return classes
		return $classes;
		
	} // End function
	
}
add_filter('post_class', 'wpex_post_entry_classes');