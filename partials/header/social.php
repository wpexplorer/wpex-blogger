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

// Return if disabled
if ( ! get_theme_mod( 'wpex_header_social', true ) ) {
	return;
}

// Get social settings
$social_options = wpex_social_links();

?>


<aside id="header-aside">

	<?php
	// Loop through social settings
	foreach ( $social_options as $social_option ) : ?>

		<?php
		// Define social icon and name
		$icon = ( 'googleplus' == $social_option ) ? $icon = 'google-plus' : $social_option;
		$name = str_replace('-', ' ', $social_option);
		$name = ucfirst( $name );

		$link = get_theme_mod( 'wpex_social_' . $social_option, '#' );
		?>

		<?php
		// Display social link if link is added in the customizer
		if ( ! empty( $link ) ) : ?>

			<a href="<?php echo esc_url( $link ); ?>"><span class="fa fa-<?php echo sanitize_html_class( $icon ); ?>" aria-hidden="true"></span><span class="screen-reader-text"><?php echo esc_html( $name ); ?></span></a>

		<?php endif; ?>

	<?php endforeach; ?>

</aside><!-- .header-aside -->