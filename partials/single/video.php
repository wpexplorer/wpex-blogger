<?php
/**
 * Post single video
 *
 * @package WPEX Blogger
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$video = apply_filters( 'wpex_post_video', get_post_meta( get_the_ID(), 'wpex_post_video', true ) );

if ( ! empty( $video ) && is_string( $video ) ) { ?>

	<div class="loop-entry-video wpex-video-embed">
		<?php echo wp_oembed_get( $video ); ?>
	</div><!-- .loop-entry-video -->

<?php } else {

	get_template_part( 'partials/single/thumbnail' );

}