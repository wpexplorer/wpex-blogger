<?php
/**
 * The template for displaying a "No posts found" message.
 *
 * @package     Blogger WordPress theme
 * @subpackage  Templates
 * @author      Alexander Clarke
 * @link        http://www.wpexplorer.com
 * @since       1.0.0
 */
?>

<div class="page-content content-none boxed clr">
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) { ?>
		<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'wpex' ), admin_url( 'post-new.php' ) ); ?></p>
	<?php } elseif ( is_search() ) { ?>
		<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'wpex' ); ?></p>
	<?php } elseif ( is_category() ) { ?>
		<p><?php _e( 'There aren\'t any posts currently published in this category.', 'wpex' ); ?></p>
	<?php } elseif ( is_tax() ) { ?>
		<p><?php _e( 'There aren\'t any posts currently published under this taxonomy.', 'wpex' ); ?></p>
	<?php } elseif ( is_tag() ) { ?>
		<p><?php _e( 'There aren\'t any posts currently published under this tag.', 'wpex' ); ?></p>
	<?php } else { ?>
		<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'wpex' ); ?></p>
	<?php } ?>
</div><!-- .page-content -->