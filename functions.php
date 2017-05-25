<?php
/**
 * Theme functions and definitions.
 *
 * Sets up the theme and provides some helper functions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package    Blogger WordPress theme
 * @subpackage Templates
 * @author     Alexander Clarke
 * @link       http://www.wpexplorer.com
 * @since      2.0.0
 */

class WPEX_Theme_Class {

	/**
	 * Main Theme Class Constructor
	 *
	 * @since  2.0.0
	 * @access public
	 */
	public function __construct() {

		// Define Contstants
		add_action( 'after_setup_theme', array( &$this, 'constants' ), 0 );

		// Load theme functions
		add_action( 'after_setup_theme', array( &$this, 'functions' ), 1 );

		// Load premium theme functions
		add_action( 'after_setup_theme', array( &$this, 'premium' ), 2 );

		// Load Classes
		add_action( 'after_setup_theme', array( &$this, 'classes' ), 3 );

		// Theme setup: Adds theme-support, image sizes, menus, etc.
		add_action( 'after_setup_theme', array( &$this, 'setup' ), 10 );

		// Flush rewrite rules on theme switch
		add_action( 'after_switch_theme', array( &$this, 'flush_rewrite_rules' ) );

		// Load front-end scripts
		add_action( 'wp_enqueue_scripts', array( &$this, 'enqueue_scripts' ) );

		// Register sidebar widget areas
		add_action( 'widgets_init', array( &$this, 'register_sidebars' ) );

		// Change more text
		add_filter( 'the_content_more_link', array( &$this, 'excerpt_more' ) );

		// Add html5.js to wp_head
		add_filter( 'wp_head', array( &$this, 'html5_js' ) );

	}

	/**
	 * Define Constants
	 *
	 * @since  2.0.0
	 * @access public
	 */
	public function constants() {
		define( 'WPEX_THEME_VERSION', $this->theme_version() );
		define( 'WPEX_INCLUDES_DIR', get_template_directory() .'/inc/' );
		define( 'WPEX_CLASSES_DIR', WPEX_INCLUDES_DIR .'classes/' );
		define( 'WPEX_JS_DIR_URI', get_template_directory_uri(). '/js/' );
		define( 'WPEX_CSS_DIR_URI', get_template_directory_uri(). '/css/' );
	}

	/**
	 * Returns current theme version
	 *
	 * @since  2.0.0
	 * @access public
	 */
	public function theme_version() {

		// Get theme data
		$theme = wp_get_theme();

		// Return theme version
		return $theme->get( 'Version' );

	}

	/**
	 * Load required theme functions
	 *
	 * @since  2.0.0
	 * @access public
	 */
	public function functions() {

		// Configures post meta via cmb_meta_boxes filter
		require_once ( WPEX_INCLUDES_DIR .'meta-config.php' );

		// Include Customizer functions
		require_once ( WPEX_INCLUDES_DIR .'customizer/general.php' );

		// Helper functions
		require_once ( WPEX_INCLUDES_DIR .'helpers.php' );

		// Adds classes to post entries
		require_once ( WPEX_INCLUDES_DIR .'post-classes.php' );

		// Comments output
		require_once ( WPEX_INCLUDES_DIR .'comments-callback.php' );

		// MCE Editor tweaks
		if ( is_admin() ) {
			require_once( WPEX_INCLUDES_DIR .'mce-tweaks.php' );
		}

		// Import / Export
		require_once ( WPEX_INCLUDES_DIR .'import-export.php' );

	}

	/**
	 * Load premium theme functions and non-premium functions
	 *
	 * @since  2.0.0
	 * @access public
	 */
	public function premium() {

		// Check for premium files
		$files = glob( get_template_directory() .'/premium/*.php' );

		// Load premium files if they exist
		if ( $files ) {
			foreach ( $files as $file ) {
				require_once( $file );
			}
		}

		// Otherwise load dashboard feed and welcome message for non-premium users
		else {
			require_once( WPEX_INCLUDES_DIR .'dashboard-feed.php');
			require_once( WPEX_INCLUDES_DIR .'welcome.php');
		}

	}

	/**
	 * Load theme classes
	 *
	 * @since  2.0.0
	 * @access public
	 */
	public function classes() {

		// Metaboxes
		if ( ! class_exists( 'cmb_Meta_Box' ) ) {
			require_once ( WPEX_CLASSES_DIR .'custom-metaboxes-and-fields/init.php' );
		}

	}

	/**
	 * Theme Setup
	 *
	 * @since  2.0.0
	 * @access public
	 */
	public function setup() {

		// Set content width variable
		global $content_width;
		if ( ! isset( $content_width ) ) {
			$content_width = 590;
		}

		// Register navigation menus
		register_nav_menus (
			array(
				'main_menu'	=> __( 'Main', 'wpex' ),
			)
		);
		
		// Localization support
		load_theme_textdomain( 'wpex', get_template_directory() .'/languages' );
		
		// Enable some useful post formats for the blog
		add_theme_support( 'post-formats', array( 'video' ) );
			
		// Add theme support
		add_theme_support( 'title-tag' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'custom-background' );
		add_theme_support( 'post-thumbnails' );

		// Add image sizes
		add_image_size( 'wpex-entry', 590, 9999, false );
		add_image_size( 'wpex-post', 590, 9999, false );

	}

	/**
	 * Flush rewrite rules on theme switch to prevent 404 errors on built-in post types
	 *
	 * @since  2.0.0
	 * @access public
	 */
	public function flush_rewrite_rules() {
		if ( function_exists( 'flush_rewrite_rules' ) ) {
			flush_rewrite_rules();
		}
	}

	/**
	 * Load front-end scripts
	 *
	 * @since  2.0.0
	 * @access public
	 *
	 * @link	https://codex.wordpress.org/Plugin_API/Action_Reference/wp_enqueue_scripts
	 */
	public function enqueue_scripts() {

		// CSS
		wp_enqueue_style(
			'wpex-style',
			get_stylesheet_uri(),
			false,
			WPEX_THEME_VERSION
		);
		wp_enqueue_style(
			'wpex-responsive',
			WPEX_CSS_DIR_URI .'responsive.css',
			array( 'wpex-style' ),
			WPEX_THEME_VERSION
		);
		wp_enqueue_style(
			'wpex-font-awesome',
			WPEX_CSS_DIR_URI .'font-awesome.min.css',
			false,
			'4.3.0'
		);
		wp_enqueue_style(
			'wpex-google-font-noto-serif',
			'http://fonts.googleapis.com/css?family=Noto+Serif:400,700,400italic,700italic'
		);
		wp_enqueue_style(
			'wpex-google-font-source-sans-pro',
			'http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,400italic,600italic,700italic&subset=latin,vietnamese,latin-ext'
		);

		// jQuery
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		wp_enqueue_script(
			'wpex-plugins',
			WPEX_JS_DIR_URI .'plugins.js',
			array( 'jquery' ),
			WPEX_THEME_VERSION,
			true
		);
		wp_enqueue_script(
			'wpex-global',
			WPEX_JS_DIR_URI .'global.js',
			array( 'jquery', 'wpex-plugins' ),
			WPEX_THEME_VERSION,
			true
		);

	}

	/**
	 * Registers sidebars
	 *
	 * @since  2.0.0
	 * @access public
	 */
	public function register_sidebars() {

		// Sidebar
		register_sidebar( array(
			'name'			=> __( 'Sidebar', 'wpex' ),
			'id'			=> 'sidebar',
			'description'	=> __( 'Widgets in this area are used in the sidebar region.', 'wpex' ),
			'before_widget'	=> '<div class="sidebar-widget %2$s clr">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<h5 class="widget-title">',
			'after_title'	=> '</h5>',
		) );

		// Footer 1
		register_sidebar( array(
			'name'			=> __( 'Footer 1', 'wpex' ),
			'id'			=> 'footer-one',
			'description'	=> __( 'Widgets in this area are used in the first footer region.', 'wpex' ),
			'before_widget'	=> '<div class="footer-widget %2$s clr">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<h6 class="widget-title">',
			'after_title'	=> '</h6>',
		) );

		// Footer 2
		register_sidebar( array(
			'name'			=> __( 'Footer 2', 'wpex' ),
			'id'			=> 'footer-two',
			'description'	=> __( 'Widgets in this area are used in the second footer region.', 'wpex' ),
			'before_widget'	=> '<div class="footer-widget %2$s clr">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<h6 class="widget-title">',
			'after_title'	=> '</h6>',
		) );

		// Footer 3
		register_sidebar( array(
			'name'			=> __( 'Footer 3', 'wpex' ),
			'id'			=> 'footer-three',
			'description'	=> __( 'Widgets in this area are used in the third footer region.', 'wpex' ),
			'before_widget'	=> '<div class="footer-widget %2$s clr">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<h6 class="widget-title">',
			'after_title'	=> '</h6>',
		) );

	}

	/**
	 * Change the excerpt more text
	 *
	 * @since  2.0.0
	 * @access public
	 */
	public function excerpt_more() {
		global $post;
		if ( get_theme_mod( 'wpex_blog_readmore', true ) ) {
			return '&hellip;<span class="wpex-readmore"><a href="'. get_permalink( $post->ID ) .'" title="'. __( 'Read More', 'wpex' ) .'" rel="bookmark">'. __( 'continue reading', 'wpex' ) .' &rarr;</a></span>';
		} else {
			return '&hellip;';
		}

	}

	/**
	 * Add html5 script to header for IE browsers
	 *
	 * @since  2.0.0
	 * @access public
	 */
	public function html5_js() {
		echo '<!--[if lt IE 9]><script src="'. WPEX_JS_DIR_URI .'html5.js"></script><![endif]-->';
	}

}
$blogger_theme_setup = new WPEX_Theme_Class;