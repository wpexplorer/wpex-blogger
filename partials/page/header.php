<?php
/**
 * Displays the page header.
 *
 * @package WPEX Blogger
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Not needed on the front-page
if ( is_front_page() ) {
	return;
}

?>

<header class="page-header clr">
	<h1 class="page-header-title"><?php the_title(); ?></h1>
</header><!-- #page-header -->