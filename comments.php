 <?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments and the comment
 * form. The actual display of comments is handled by a callback to
 * wpex_comment() which is located at functions/comments-callback.php
 *
 * @package WPEX Blogger
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Bail if password protected and user hasn't entered password
if ( post_password_required() ) {
	return;
}

// Comments are closed and empty, do nothing
if ( ! comments_open() && get_comment_pages_count() == 0 ) {
	return;
}

?>

<div id="comments" class="comments-area boxed">
	<?php if ( have_comments() ) { ?>
		<h2 id="comments-title" class="heading">
			<span>
				<?php
					printf( _nx( 'This article has 1 comment', 'This article has %1$s comments', number_format_i18n( get_comments_number() ), 'comments title', 'wpex-blogger' ),
						number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
				?>
			</span>
		</h2>
		<ol class="commentlist">
			<?php wp_list_comments( array(
				'callback'		=> 'wpex_comment',
			) ); ?>
		</ol><!-- .commentlist -->
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>
			<nav class="navigation comment-navigation row clr" role="navigation">
				<h4 class="assistive-text section-heading heading"><span><?php _e( 'Comment navigation', 'wpex-blogger' ); ?></span></h4>
				<div class="nav-previous span_12 col clr-margin"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'wpex-blogger' ) ); ?></div>
				<div class="nav-next span_12 col"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'wpex-blogger' ) ); ?></div>
			</nav>
		<?php } ?>
	<?php } // have_comments() ?>
	<?php comment_form( array(
		'title_reply'	=> '<div class="heading"><span>' . esc_html__( 'Leave a Comment', 'wpex-blogger' ) . '</span></div>',
	) ); ?>
</div><!-- #comments -->