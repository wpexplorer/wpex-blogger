<?php
/**
 * Header Search
 *
 * @package WPEX Blogger
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Return if disabled or menu isn't defined
if ( ! get_theme_mod( 'wpex_nav', true ) || ! has_nav_menu( 'main_menu' ) ) {
	return;
}

?>

<div id="site-navigation-wrap">

	<div id="sidr-close"><a href="#sidr-close" class="toggle-sidr-close"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/></svg></a></div>

	<nav id="site-navigation" class="navigation main-navigation clr container" role="navigation">

		<a href="#sidr-main" id="navigation-toggle"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/></svg><?php echo __( 'Menu', 'wpex-blogger' ); ?></a>

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