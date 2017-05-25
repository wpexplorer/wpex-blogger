<?php
/**
 * Configures meta options via cmb_meta_boxes filter
 *
 * @package     Blogger WordPress theme
 * @subpackage  Includes
 * @author      Alexander Clarke
 * @link        http://www.wpexplorer.com
 * @since       2.0.0
 */

/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function wpex_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'wpex_';

	// Posts
	$meta_boxes[] = array(
		'id'			=> 'wpex-post-meta',
		'title'			=> __( 'Post Settings', 'wpex' ),
		'pages'			=> array( 'post' ),
		'context'		=> 'normal',
		'priority'		=> 'high',
		'show_names'	=> true,
		'fields'		=> array(
			array(
				'name'	=> __( 'Video URL', 'wpex' ),
				'desc'	=>  __( 'Enter in a video URL that is compatible with WordPress\'s built-in oEmbed feature.', 'wpex' ) .' <a href="http://codex.wordpress.org/Embeds" target="_blank">'. __( 'Learn More', 'wpex' ),
				'id'	=> $prefix . 'post_video',
				'type'	=> 'text',
				'std'	=> '',
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'wpex_metaboxes' );