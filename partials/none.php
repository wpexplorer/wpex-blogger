<?php
/**
 * The template for displaying a "No posts found" message.
 *
 * @package WPEX Blogger
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div class="page-content content-none boxed clr">
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) { ?>
		<p><?php esc_html_e( 'No posts found.', 'wpex-blogger' ); ?></p>
	<?php } elseif ( is_search() ) { ?>
		<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'wpex-blogger' ); ?></p>
	<?php } elseif ( is_category() ) { ?>
		<p><?php esc_html_e( 'There aren\'t any posts currently published in this category.', 'wpex-blogger' ); ?></p>
	<?php } elseif ( is_tax() ) { ?>
		<p><?php esc_html_e( 'There aren\'t any posts currently published under this taxonomy.', 'wpex-blogger' ); ?></p>
	<?php } elseif ( is_tag() ) { ?>
		<p><?php esc_html_e( 'There aren\'t any posts currently published under this tag.', 'wpex-blogger' ); ?></p>
	<?php } else { ?>
		<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'wpex-blogger' ); ?></p>
	<?php } ?>
</div><!-- .page-content -->