<?php
/**
 * The default template for displaying post content.
 *
 * @package WPEX Blogger
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<ul class="post-meta clr">

	<li class="meta-date">
		<?php esc_html_e( 'Posted on', 'wpex-blogger' ); ?>
		<span class="meta-date-text"><?php echo get_the_date(); ?></span>
	</li>

	<?php if ( $terms_escaped = wpex_list_post_terms( 'category', false ) ) : ?>
		<li class="meta-category">
			<span class="meta-seperator">/</span><?php esc_html_e( 'Under', 'wpex-blogger' ); ?>
			<?php echo $terms_escaped; ?>
		</li>
	<?php endif; ?>

	<?php if ( comments_open() ) : ?>
		<li class="meta-comments comment-scroll">
			<span class="meta-seperator">/</span><?php esc_html_e( 'With', 'wpex-blogger' ); ?>
			<?php comments_popup_link( esc_html__( '0 Comments', 'wpex-blogger' ), esc_html__( '1 Comment',  'wpex-blogger' ), esc_html__( '% Comments', 'wpex-blogger' ), 'comments-link' ); ?>
		</li>
	<?php endif; ?>

</ul><!-- .post-meta -->