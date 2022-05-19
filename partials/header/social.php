<?php
/**
 * Header social links
 *
 * @package WPEX Blogger
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! get_theme_mod( 'wpex_header_social', true ) ) {
	return;
}

$social_options = wpex_social_links();

if ( empty( $social_options ) || ! is_array( $social_options ) ) {
	return;
}

?>


<aside id="header-aside">

	<?php foreach ( $social_options as $social_option ) :

		$link = get_theme_mod( 'wpex_social_' . sanitize_key( $social_option ) );

		if ( ! empty( $link ) ) : ?>

			<a href="<?php echo esc_url( $link ); ?>"><?php echo wpex_get_social_icon_svg( $social_option ); ?><span class="screen-reader-text"><?php echo esc_html( ucfirst( trim( $name ) ) ); ?></span></a>

		<?php endif; ?>

	<?php endforeach; ?>

</aside><!-- .header-aside -->