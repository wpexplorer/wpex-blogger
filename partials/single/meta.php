<?php
/**
 * Post single meta
 *
 * @package WPEX Blogger
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<ul class="post-meta clr">

	<li class="meta-date">
		<?php _e( 'Posted on', 'wpex-blogger' ); ?>
		<span class="meta-date-text"><?php echo get_the_date(); ?></span>
	</li>

	<?php if ( $terms = wpex_list_post_terms( 'category', false ) ) : ?>
		<li class="meta-category">
			<span class="meta-seperator">/</span><?php _e( 'Under', 'wpex-blogger' ); ?>
			<?php echo $terms; ?>
		</li>
	<?php endif; ?>

	<?php if ( comments_open() ) : ?>
		<li class="meta-comments comment-scroll">
			<span class="meta-seperator">/</span><?php _e( 'With', 'wpex-blogger' ); ?>
			<?php comments_popup_link( __( '0 Comments', 'wpex-blogger' ), __( '1 Comment',  'wpex-blogger' ), __( '% Comments', 'wpex-blogger' ), 'comments-link' ); ?>
		</li>
	<?php endif; ?>

</ul><!-- .post-meta -->