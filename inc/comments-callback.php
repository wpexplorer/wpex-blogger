<?php
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments
 * template simply create your own wpex_comment(), and that function
 * will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @subpackage Blogger WPExplorer Theme
 * @since Blogger 1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'wpex_comment' ) ) {

	function wpex_comment( $comment, $args, $depth ) {

		$GLOBALS['comment'] = $comment; ?>

		<li id="li-comment-<?php comment_ID(); ?>">

			<article id="comment-<?php comment_ID(); ?>" <?php comment_class( 'clr' ); ?>>

				<div class="comment-author vcard">
					<?php echo get_avatar( $comment, 50 ); ?>
				</div><!-- .comment-author -->

				<div class="comment-details clr">

					<header class="comment-meta">

						<cite class="fn"><?php comment_author_link(); ?></cite>

						<span class="comment-date">
						<?php
							printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								sprintf( _x( '%1$s', '1: date', 'wpex-blogger' ), get_comment_date() )
							);
						?>
						</span><!-- .comment-date -->

						<span class="reply">
							<?php comment_reply_link( array_merge(
								$args,
								array(
									'reply_text' => esc_html__( 'Reply', 'wpex-blogger' ),
									'depth' => $depth,
									'max_depth' => $args['max_depth']
								)
							) ); ?>
						</span><!-- .reply -->

					</header><!-- .comment-meta -->

					<?php if ( '0' == $comment->comment_approved ) : ?>
						<p class="comment-awaiting-moderation"><?php
							esc_html_e( 'Your comment is awaiting moderation.', 'wpex-blogger' );
						?></p>
					<?php endif; ?>

					<div class="comment-content">
						<?php comment_text(); ?>
					</div><!-- .comment-content -->

				</div><!-- .comment-details -->

			</article><!-- #comment-## -->

		<?php

	}

}