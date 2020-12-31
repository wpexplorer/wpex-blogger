<?php
/**
 * Header branding: Logo & Site Description
 *
 * @package WPEX Blogger
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$logo_img = get_theme_mod( 'wpex_logo' );

$logo_w = '';
$logo_h = '';
$logo_style_escaped = '';

$logo_dims = get_theme_mod( 'wpex_logo_dims', null );
if ( $logo_dims && is_string( $logo_dims ) ) {

    preg_match_all( '/\d+/', $logo_dims, $logo_dims_matches );

    if ( isset( $logo_dims_matches[0] ) ) {
        $logo_size = array();
        $count = count( $logo_dims_matches[0] );
        if ( $count > 1 ) {
            $logo_w = $logo_dims_matches[0][0];
            $logo_h = $logo_dims_matches[0][1];
        } elseif ( 1 === $count ) {
            $logo_w = $logo_dims_matches[0][0];
            $logo_h = $logo_dims_matches[0][0];
        }
    }

}

?>

<div class="site-branding">

    <div id="logo">

        <?php if ( ! empty( $logo_img ) && is_string( $logo_img ) ) : ?>

            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img src="<?php echo esc_url( $logo_img ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" height="<?php echo esc_attr( $logo_h ); ?>" width="<?php echo esc_attr( $logo_w ); ?>"<?php echo $logo_style_escaped; ?> />
            </a>

        <?php else : ?>

            <div class="site-text-logo">

                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>

                <?php if ( ! empty( get_bloginfo( 'description' ) ) ) : ?>

                    <div class="site-description"><?php echo wp_kses_post( get_bloginfo( 'description' ) ); ?></div>

                <?php endif; ?>

            </div><!-- .site-text-logo -->

        <?php endif; ?>

    </div><!-- #logo -->

</div><!-- .site-branding -->