<?php
/**
 * Header Search
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
}

// Return if disabled or menu isn't defined
if ( ! get_theme_mod( 'wpex_nav', true ) || ! has_nav_menu( 'main_menu' ) ) {
	return;
} ?>

<div id="site-navigation-wrap">

	<div id="sidr-close"><a href="#sidr-close" class="toggle-sidr-close"></a></div>

	<nav id="site-navigation" class="navigation main-navigation clr container" role="navigation">

		<a href="#sidr-main" id="navigation-toggle"><span class="fa fa-bars"></span><?php echo __( 'Menu', 'wpex' ); ?></a>

		<?php
		// Display main menu
		wp_nav_menu( array(
			'theme_location' => 'main_menu',
			'sort_column'    => 'menu_order',
			'menu_class'     => 'dropdown-menu sf-menu',
			'fallback_cb'    => false,
		) ); ?>

	</nav><!-- #site-navigation -->

</div><!-- #site-navigation-wrap -->