<?php
/**
 * Single post layout.
 *
 * @package WPEX Blogger
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>


<article class="boxed clr">
	<?php get_template_part( 'partials/single/media' ); ?>
	<?php get_template_part( 'partials/single/header' ); ?>
	<?php get_template_part( 'partials/single/content' ); ?>
	<?php get_template_part( 'partials/single/post-tags' ); ?>
	<?php get_template_part( 'partials/link-pages' ); ?>
	<?php get_template_part( 'partials/edit-post' ); ?>
</article>

<?php get_template_part( 'partials/single/author-bio' ); ?>

<?php comments_template(); ?>