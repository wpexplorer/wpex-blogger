<?php
/**
 * General theme options
 *
 * @package     Blogger WordPress theme
 * @subpackage  Customizer
 * @author      Alexander Clarke
 * @link        http://www.wpexplorer.com
 * @since       2.0.0
 */

function wpex_customizer_general($wp_customize) {

	// Theme Settings Section
	$wp_customize->add_section( 'wpex_general' , array(
		'title'		=> __( 'Theme Settings', 'wpex' ),
		'priority'	=> 200,
	) );

	// Logo Image
	$wp_customize->add_setting( 'wpex_logo', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => false,
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wpex_logo', array(
		'label'		=> __( 'Image Logo', 'wpex' ),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_logo',
		'priority'	=> '1',
	) ) );

	// Enable/Disable Navigation
	$wp_customize->add_setting( 'wpex_nav', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => false,
		'default'           => '1',
	) );

	$wp_customize->add_control( 'wpex_nav', array(
		'label'		=> __( 'Top Navigation', 'wpex' ),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_nav',
		'type'		=> 'checkbox',
		'priority'	=> '3',
	) );

	// Enable/Disable Social
	$wp_customize->add_setting( 'wpex_header_social', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => false,
		'default'           => '1',
	) );

	$wp_customize->add_control( 'wpex_header_social', array(
		'label'		=> __( 'Social Links', 'wpex' ),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_header_social',
		'type'		=> 'checkbox',
		'priority'	=> '4',
	) );

	// Enable/Disable Readmore
	$wp_customize->add_setting( 'wpex_blog_readmore', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => false,
		'default'           => '1',
	) );

	$wp_customize->add_control( 'wpex_blog_readmore', array(
		'label'		=> __( 'Read More Link', 'wpex' ),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_blog_readmore',
		'type'		=> 'checkbox',
		'priority'	=> '5',
	) );

	// Enable/Disable Featured Images on Posts
	$wp_customize->add_setting( 'wpex_blog_post_thumb', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => false,
		'default'           => '1',
	) );

	$wp_customize->add_control( 'wpex_blog_post_thumb', array(
		'label'		=> __( 'Featured Image on Posts', 'wpex' ),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_blog_post_thumb',
		'type'		=> 'checkbox',
		'priority'	=> '6',
	) );

	// Display Excerpts
	$wp_customize->add_setting( 'wpex_entry_content_excerpt', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => false,
		'default'           => 'excerpt',
	) );

	$wp_customize->add_control( 'wpex_entry_content_excerpt', array(
		'label'		=> __( 'Entries Display?', 'wpex' ),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_entry_content_excerpt',
		'type'		=> 'select',
		'choices'	=> array(
			'excerpt' => __( 'The Excerpt', 'wpex' ),
			'content' => __( 'The Content', 'wpex' ),
		),
		'priority'	=> '8',
	) );

	// Excerpt lengths
	$wp_customize->add_setting( 'wpex_excerpt_length', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => false,
		'default'           => '50',
	) );

	$wp_customize->add_control( 'wpex_excerpt_length', array(
		'label'		=> __( 'Excerpt Length', 'wpex' ),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_excerpt_length',
		'type'		=> 'text',
		'priority'	=> '9',
	) );

	// Copyright
	$wp_customize->add_setting( 'wpex_copyright', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => false,
		'default'           => 'Powered by <a href=\"http://www.wordpress.org\" title="WordPress" target="_blank">WordPress</a> and <a href=\"http://themeforest.net/item/total-responsive-multipurpose-wordpress-theme/6339019?ref=WPExplorer" target="_blank" title="WPExplorer" rel="nofollow">WPExplorer Themes</a>',
	) );

	$wp_customize->add_control('wpex_copyright', array(
		'label'		=> __( 'Custom Copyright', 'wpex' ),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_copyright',
		'type'		=> 'textarea',
		'priority'	=> '10',
	) );

	// Theme Settings Section
	$wp_customize->add_section( 'wpex_social' , array(
		'title'		=> __( 'Social Options', 'wpex' ),
		'priority'	=> 201,
	) );

	// Social Options
	$social_options = wpex_social_links();
	$count=0;
	foreach ( $social_options as $social_option ) {
		$count++;
		$name = $social_option = str_replace('_', ' ', $social_option);
		$name = ucfirst($name);
		$wp_customize->add_setting( 'wpex_social_'. $social_option, array(
			'type'              => 'theme_mod',
			'sanitize_callback' => false,
			'default'           => '#',
		) );
		$wp_customize->add_control( 'wpex_social_'. $social_option, array(
			'label'		=> __( $name , 'wpex' ),
			'section'	=> 'wpex_social',
			'settings'	=> 'wpex_social_'. $social_option,
			'type'		=> 'text',
			'priority'	=> $count,
		) );
	}		
}
add_action( 'customize_register', 'wpex_customizer_general' );