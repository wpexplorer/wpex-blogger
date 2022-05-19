<?php
/**
 * General theme options.
 *
 * @package WPEX Blogger
 * @since 2.0.0
 */

function wpex_customizer_general($wp_customize) {

	// Theme Settings Section
	$wp_customize->add_section( 'wpex_general' , array(
		'title' => esc_html__( 'Theme Settings', 'wpex-blogger' ),
	) );

	// Logo Image
	$wp_customize->add_setting( 'wpex_logo', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => 'esc_url',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wpex_logo', array(
		'label'		=> esc_html__( 'Image Logo', 'wpex-blogger' ),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_logo',
	) ) );

	// Logo Image Dimensions
	$wp_customize->add_setting( 'wpex_logo_dims', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'wpex_logo_dims', array(
		'label'		=> esc_html__( 'Image Logo Dimensions', 'wpex-blogger' ),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_logo_dims',
		'description' => esc_html__( 'Can be used to constrain a large image or SVG to a specific size. Use format WidthxHeight (Ex: 400x200)', 'wpex-blogger' ),
	) );

	// Enable/Disable Navigation
	$wp_customize->add_setting( 'wpex_nav', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => 'wp_validate_boolean',
		'default'           => true,
	) );

	$wp_customize->add_control( 'wpex_nav', array(
		'label'		=> esc_html__( 'Top Navigation', 'wpex-blogger' ),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_nav',
		'type'		=> 'checkbox',
	) );

	// Enable/Disable Footer Widgets
	$wp_customize->add_setting( 'wpex_footer_widgets', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => 'wp_validate_boolean',
		'default'           => true,
	) );

	$wp_customize->add_control( 'wpex_footer_widgets', array(
		'label'		=> esc_html__( 'Footer Widgets', 'wpex-blogger' ),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_footer_widgets',
		'type'		=> 'checkbox',
	) );

	// Enable/Disable Social
	$wp_customize->add_setting( 'wpex_header_social', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => 'wp_validate_boolean',
		'default'           => true,
	) );

	$wp_customize->add_control( 'wpex_header_social', array(
		'label'		=> esc_html__( 'Social Links', 'wpex-blogger' ),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_header_social',
		'type'		=> 'checkbox',
	) );

	// Enable/Disable Readmore
	$wp_customize->add_setting( 'wpex_blog_readmore', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => 'wp_validate_boolean',
		'default'           => true,
	) );

	$wp_customize->add_control( 'wpex_blog_readmore', array(
		'label'		=> esc_html__( 'Read More Link', 'wpex-blogger' ),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_blog_readmore',
		'type'		=> 'checkbox',
	) );

	// Enable/Disable Featured Images on Posts
	$wp_customize->add_setting( 'wpex_blog_post_thumb', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => 'wp_validate_boolean',
		'default'           => true,
	) );

	$wp_customize->add_control( 'wpex_blog_post_thumb', array(
		'label'		=> esc_html__( 'Featured Image on Posts', 'wpex-blogger' ),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_blog_post_thumb',
		'type'		=> 'checkbox',
	) );

	// Enable/Disable Pos Tags
	$wp_customize->add_setting( 'wpex_has_post_tags', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => 'wp_validate_boolean',
		'default'           => true,
	) );

	$wp_customize->add_control( 'wpex_has_post_tags', array(
		'label'		=> esc_html__( 'Display Post tags?', 'wpex-blogger' ),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_has_post_tags',
		'type'		=> 'checkbox',
	) );

	// Display Excerpts
	$wp_customize->add_setting( 'wpex_entry_content_excerpt', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => 'wpex_sanitize_entry_display',
		'default'           => 'excerpt',
	) );

	$wp_customize->add_control( 'wpex_entry_content_excerpt', array(
		'label'		=> esc_html__( 'Entries Display?', 'wpex-blogger' ),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_entry_content_excerpt',
		'type'		=> 'select',
		'choices'	=> array(
			'excerpt' => esc_html__( 'Custom Excerpt', 'wpex-blogger' ),
			'content' => esc_html__( 'Full Post Content', 'wpex-blogger' ),
			'the_excerpt' => esc_html__( 'WordPress Excerpt', 'wpex-blogger' ),
		),
	) );

	// Excerpt lengths
	$wp_customize->add_setting( 'wpex_excerpt_length', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => 'absint',
		'default'           => '50',
	) );

	$wp_customize->add_control( 'wpex_excerpt_length', array(
		'label'		=> esc_html__( 'Excerpt Length', 'wpex-blogger' ),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_excerpt_length',
		'type'		=> 'text',
	) );

	// Copyright
	$wp_customize->add_setting( 'wpex_copyright', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control('wpex_copyright', array(
		'label'		=> esc_html__( 'Custom Copyright', 'wpex-blogger' ),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_copyright',
		'type'		=> 'textarea',
	) );

	// Theme Settings Section
	$wp_customize->add_section( 'wpex_social' , array(
		'title' => esc_html__( 'Social Options', 'wpex-blogger' ),
	) );

	// Social Options
	$social_options = wpex_social_links();
	$count=0;
	foreach ( $social_options as $social_option ) {
		$count++;
		$social_key = 'wpex_social_' . sanitize_key( $social_option );
		$wp_customize->add_setting( $social_key, array(
			'type'              => 'theme_mod',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( $social_key, array(
			'label'		=> trim( wp_strip_all_tags( ucfirst( $social_option ) ) ),
			'section'	=> 'wpex_social',
			'settings'	=> $social_key,
			'type'		=> 'text',
		) );
	}

	// Image Sizes
	$wp_customize->add_section( 'wpex_image_sizes' , array(
		'title' => esc_html__( 'Image Sizes', 'wpex-blogger' ),
		'description' => esc_html__( 'You can define your image cropping settings for the theme from here. Note: You must use a regeneration plugin to crop old images on your site because WordPress only applies cropping to newly uploaded images.', 'wpex-blogger' ),
	) );

	$image_sizes = array(
		'wpex_entry' => esc_html__( 'Entry', 'wpex-blogger' ),
		'wpex_post'  => esc_html__( 'Post', 'wpex-blogger' ),
	);

	foreach( $image_sizes as $image_size => $image_size_location ) {

		$wp_customize->add_setting( $image_size . '_thumbnail_width', array(
			'type'              => 'theme_mod',
			'sanitize_callback' => 'absint',
			'default'           => 9999,
		) );

		$wp_customize->add_control( $image_size . '_thumbnail_width', array(
			'label'		=> $image_size_location . ' ' . esc_html__( 'Width', 'wpex-blogger' ),
			'section'	=> 'wpex_image_sizes',
			'settings'	=> $image_size . '_thumbnail_width',
			'type'		=> 'text',
		) );

		$wp_customize->add_setting( $image_size . '_thumbnail_height', array(
			'type'              => 'theme_mod',
			'sanitize_callback' => 'absint',
			'default'           => 9999,
		) );

		$wp_customize->add_control( $image_size . '_thumbnail_height', array(
			'label'		=> $image_size_location . ' ' . esc_html__( 'Height', 'wpex-blogger' ),
			'section'	=> 'wpex_image_sizes',
			'settings'	=> $image_size . '_thumbnail_height',
			'type'		=> 'text',
		) );

	}

}
add_action( 'customize_register', 'wpex_customizer_general' );

function wpex_sanitize_entry_display( $val = '' ) {
	if ( 'excerpt' === $val || 'content' === $val || 'the_excerpt' === $val ) {
		return $val;
	}
	return 'excerpt';
}