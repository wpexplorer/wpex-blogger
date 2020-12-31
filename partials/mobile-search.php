<?php
/**
 * The template for displaying a "No posts found" message.
 *
 * @package WPEX Blogger
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div id="mobile-search">
	<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search" id="mobile-search-form">
		<input type="search" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php esc_attr_e( 'To search type and hit enter', 'wpex-blogger' ); ?>" />
	</form>
</div>