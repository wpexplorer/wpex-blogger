<?php
/**
 * Header social links
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

// Return if disabled
if ( ! get_theme_mod( 'wpex_header_social', true ) ) {
	return;
}

// Get social settings
$social_options = wpex_social_links(); ?>


<aside id="header-aside" class="clr">

	<?php
	// Loop through social settings
	foreach ( $social_options as $social_option ) : ?>

		<?php
		// Define social icon and name
		$icon = ( 'googleplus' == $social_option ) ? $icon = 'google-plus' : $social_option;
		$name = str_replace('-', ' ', $social_option);
		$name = ucfirst( $name ); ?>

		<?php
		// Display social link if link is added in the customizer
		if ( get_theme_mod( 'wpex_social_'. $social_option, '#' ) ) : ?>

			<a href="<?php echo get_theme_mod( 'wpex_social_'. $social_option ); ?>" title="<?php echo $name; ?>"><span class="fa fa-<?php echo $icon; ?>"></span></a>

		<?php endif; ?>

	<?php endforeach; ?>

</aside><!-- .header-aside -->