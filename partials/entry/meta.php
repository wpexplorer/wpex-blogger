<?php
/**
 * The default template for displaying post content.
 *
 * @package     Blogger WordPress theme
 * @subpackage  Partials
 * @author      Alexander Clarke
 * @link        http://www.wpexplorer.com
 * @since       1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<ul class="post-meta clr">

	<li class="meta-date">
		<?php _e( 'Posted on', 'wpex' ); ?>
		<span class="meta-date-text"><?php echo get_the_date(); ?></span>
	</li>

	<?php if ( $terms = wpex_list_post_terms( 'category', false ) ) : ?>
		<li class="meta-category">
			<span class="meta-seperator">/</span><?php _e( 'Under', 'wpex' ); ?>
			<?php echo $terms; ?>
		</li>
	<?php endif; ?>

	<?php if ( comments_open() ) : ?>
		<li class="meta-comments comment-scroll">
			<span class="meta-seperator">/</span><?php _e( 'With', 'wpex' ); ?>
			<?php comments_popup_link( __( '0 Comments', 'wpex' ), __( '1 Comment',  'wpex' ), __( '% Comments', 'wpex' ), 'comments-link' ); ?>
		</li>
	<?php endif; ?>
	
</ul><!-- .post-meta -->