<?php
/**
 * Post author bio.
 *
 * @package WPEX Blogger
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Only display for standard posts
if ( 'post' !== get_post_type() ) {
	return;
}

?>

<div class="author-info boxed">

	<h4 class="heading"><span><?php

		echo wp_kses( sprintf( __( 'Written by %s', 'wpex-blogger' ), get_the_author() ), array() );

	?></span></h4>

	<div class="author-info-inner">

		<?php if( get_avatar( get_current_user_id() ) ) { ?>
			<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author" class="author-avatar">
				<?php echo get_avatar( get_current_user_id(), apply_filters( 'wpex_author_bio_avatar_size', 75 ) ); ?>
			</a>
		<?php } ?>

		<div class="author-description">
			<p><?php echo wp_kses_post( get_the_author_meta( 'description' ) ); ?></p>
		</div><!-- .author-description -->

	</div><!-- .author-info-inner -->

</div><!-- .author-info -->