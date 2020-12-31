<?php
/**
 * Displays post entry content
 *
 * @package WPEX Blogger
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$display = get_theme_mod( 'wpex_entry_content_excerpt', 'excerpt' );

?>

<div class="loop-entry-content entry clr">

	<?php
	switch ( $display ) :

		case 'the_excerpt':

			the_excerpt();

			break;

		case 'the_content':
		case 'content':

			the_content();

			break;

		default:

			$length = absint( get_theme_mod( 'wpex_excerpt_length', 50 ) );

			if ( ! empty( $length ) ) {
				wpex_excerpt( $length, get_theme_mod( 'wpex_blog_readmore', true ) );
			}

			break;

	endswitch;
	?>

</div><!-- .loop-entry-content -->