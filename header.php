<?php
/**
 * The Header for our theme.
 *
 * @package    Blogger WordPress theme
 * @subpackage Templates
 * @author     Alexander Clarke
 * @link       http://www.wpexplorer.com
 * @since      2.0.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php get_template_part( 'partials/header/nav' ); ?>

<div id="header-wrap" class="clr">

    <header id="header" class="site-header container clr" role="banner">

        <?php
        // Header logo + site description
        get_template_part( 'partials/header/branding' ); ?>

        <?php
        // Header social links
        get_template_part( 'partials/header/social' ); ?>

    </header><!-- #header -->

</div><!-- #header-wrap -->
		
		<div id="main" class="site-main clr container">