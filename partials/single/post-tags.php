<?php
/**
 * Post tags.
 *
 * @package WPEX Blogger
 * @since 2.1
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! get_theme_mod( 'wpex_has_post_tags', true ) ) {
	return;
}

the_tags( '<div id="post-tags">' . esc_html__( 'Tagged:', 'wpex-blogger' ) . ' ', ', ', '</div>' );