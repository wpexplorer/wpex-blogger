<?php
/**
 * Displays the post entry thumbmnail.
 *
 * @package WPEX Blogger
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// REturn if disabled or there isn't a thumbnail defined
if ( ! has_post_thumbnail() || ! get_theme_mod( 'wpex_blog_entry_thumb', true ) ) {
	return;
}

?>

<div class="loop-entry-thumbnail">

	<a href="<?php the_permalink(); ?>" title="<?php wpex_esc_title(); ?>"><?php

		the_post_thumbnail( 'wpex-entry' );

	?></a>

</div><!-- .post-entry-thumbnail -->