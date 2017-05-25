<?php
/**
 * Displays next/previous links
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

<ul class="single-post-pagination clr">
	<?php next_post_link( '<li class="post-prev">%link</li>', '<i class="fa fa-arrow-left"></i>%title' ); ?>
	<?php previous_post_link( '<li class="post-next">%link</li>', '%title<i class="fa fa-arrow-right"></i>' ); ?>
</ul><!-- .post-post-pagination -->