<?php
/**
 * Displays the post header.
 *
 * @package WPEX Blogger
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>

<header class="page-header clr">

	<h1 class="page-header-title"><?php the_title(); ?></h1>

	<?php get_template_part( 'partials/single/meta' ); ?>

</header><!-- #page-header -->