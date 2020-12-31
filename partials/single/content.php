<?php
/**
 * Post single content.
 *
 * @package WPEX Blogger
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div class="post-content entry clr">
	<?php the_content(); ?>
</div><!-- .entry -->