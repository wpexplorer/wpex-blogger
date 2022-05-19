<?php
/**
 * The Header for our theme.
 *
 * @package WPEX Blogger
 * @since 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wpex-blogger' ); ?></a>

<?php get_template_part( 'partials/header/nav' ); ?>

<div id="header-wrap">

    <header id="header" class="site-header container" role="banner">

        <?php
        // Header logo + site description
        get_template_part( 'partials/header/branding' ); ?>

        <?php
        // Header social links
        get_template_part( 'partials/header/social' ); ?>

    </header><!-- #header -->

</div><!-- #header-wrap -->

	<div id="main" class="site-main clr container">