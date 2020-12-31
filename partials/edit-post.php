<?php
/**
 * Post edit link
 *
 * @package WPEX Blogger
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<footer class="entry-footer">
	<?php edit_post_link( __( 'Edit Post', 'wpex-blogger' ), '<span class="edit-link clr">', '</span>' ); ?>
</footer><!-- .entry-footer -->