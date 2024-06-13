<?php
/**
 * Theme functions and definitions.
 *
 * @package Blogger WordPress theme
 * @author  WPExplorer
 * @link    https://www.wpexplorer.com/
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'WPEX_Blogger_Theme' ) ) {

	class WPEX_Blogger_Theme {

		/**
		 * Main Theme Class Constructor
		 *
		 * @since 2.0.0
		 */
		public function __construct() {

			// Define Contstants
			$this->constants();

			// Load theme functions
			$this->includes();

			// Theme setup: Adds theme-support, image sizes, menus, etc.
			add_action( 'after_setup_theme', array( $this, 'setup' ) );

			// Load front-end scripts
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

			// Register sidebar widget areas
			add_action( 'widgets_init', array( $this, 'register_sidebars' ) );

			// Change more text
			add_filter( 'the_content_more_link', array( $this, 'excerpt_more' ) );

		}

		/**
		 * Define Constants
		 *
		 * @since 2.0.0
		 */
		public function constants() {
			define( 'WPEX_THEME_VERSION', $this->theme_version() );
			define( 'WPEX_INCLUDES_DIR', trailingslashit( get_template_directory() ) . 'inc/' );
			define( 'WPEX_CLASSES_DIR', WPEX_INCLUDES_DIR .'classes/' );
			define( 'WPEX_JS_DIR_URI', trailingslashit( get_template_directory_uri() ) . 'assets/js/' );
			define( 'WPEX_CSS_DIR_URI', trailingslashit( get_template_directory_uri() ) . 'assets/css/' );
		}

		/**
		 * Returns current theme version
		 *
		 * @since 2.0.0
		 */
		public function theme_version() {
			return wp_get_theme()->get( 'Version' );
		}

		/**
		 * Load required theme functions
		 *
		 * @since 2.0.0
		 */
		public function includes() {
			require_once WPEX_INCLUDES_DIR . 'helpers.php';
			require_once WPEX_INCLUDES_DIR . 'post-meta.php';
			require_once WPEX_INCLUDES_DIR . 'comments-callback.php';
			require_once WPEX_INCLUDES_DIR . 'customizer/general.php';
		}

		/**
		 * Theme Setup
		 *
		 * @since 2.0.0
		 */
		public function setup() {

			// Set content width variable
			global $content_width;
			if ( ! isset( $content_width ) ) {
				$content_width = 590;
			}

			// Register navigation menus
			register_nav_menus ( array(
				'main_menu'	=> esc_html__( 'Main', 'wpex-blogger' ),
			) );

			// Localization support
			load_theme_textdomain( 'wpex-blogger', get_template_directory() . '/languages' );

			// Add theme support
			add_theme_support( 'post-formats', array( 'video' ) );
			add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
			add_theme_support( 'post-thumbnails' );
			add_theme_support( 'title-tag' );
			add_theme_support( 'automatic-feed-links' );
			add_theme_support( 'custom-background' );
			add_theme_support( 'post-thumbnails' );

			// Add image sizes
			add_image_size(
				'wpex-entry',
				get_theme_mod( 'wpex_entry_thumbnail_width', 9999 ),
				get_theme_mod( 'wpex_entry_thumbnail_height', 9999 ),
				get_theme_mod( 'wpex_entry_thumbnail_crop', false )
			);

			add_image_size(
				'wpex-post',
				get_theme_mod( 'wpex_post_thumbnail_width', 9999 ),
				get_theme_mod( 'wpex_post_thumbnail_height', 9999 ),
				get_theme_mod( 'wpex_post_thumbnail_crop', false )
			);

		}

		/**
		 * Load front-end scripts
		 *
		 * @since 2.0.0
		 *
		 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/wp_enqueue_scripts
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
				'wpex-google-fonts',
				'https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,400;0,700;1,400;1,700&amp;family=Source+Sans+Pro:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&amp;display=swap'
			);

			// jQuery
			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}

			wp_enqueue_script(
				'superfish',
				WPEX_JS_DIR_URI . 'jquery.superfish.js',
				array( 'jquery' ),
				'1.7.4',
				true
			);

			wp_enqueue_script(
				'sidr',
				WPEX_JS_DIR_URI . 'jquery.sidr.js',
				array( 'jquery' ),
				'1.0',
				true
			);

			wp_enqueue_script(
				'wpex-blogger',
				WPEX_JS_DIR_URI . 'wpex-blogger.js',
				array( 'jquery', 'superfish', 'sidr' ),
				WPEX_THEME_VERSION,
				true
			);

		}

		/**
		 * Registers sidebars
		 *
		 * @since 2.0.0
		 */
		public function register_sidebars() {

			// Sidebar
			register_sidebar( array(
				'name'			=> esc_html__( 'Sidebar', 'wpex-blogger' ),
				'id'			=> 'sidebar',
				'description'	=> esc_html__( 'Widgets in this area are used in the sidebar region.', 'wpex-blogger' ),
				'before_widget'	=> '<div class="sidebar-widget %2$s clr">',
				'after_widget'	=> '</div>',
				'before_title'	=> '<h5 class="widget-title">',
				'after_title'	=> '</h5>',
			) );

			// Footers
			if ( get_theme_mod( 'wpex_footer_widgets', true ) ) {

				// Footer 1
				register_sidebar( array(
					'name'			=> esc_html__( 'Footer 1', 'wpex-blogger' ),
					'id'			=> 'footer-one',
					'description'	=> esc_html__( 'Widgets in this area are used in the first footer region.', 'wpex-blogger' ),
					'before_widget'	=> '<div class="footer-widget %2$s clr">',
					'after_widget'	=> '</div>',
					'before_title'	=> '<h6 class="widget-title">',
					'after_title'	=> '</h6>',
				) );

				// Footer 2
				register_sidebar( array(
					'name'			=> esc_html__( 'Footer 2', 'wpex-blogger' ),
					'id'			=> 'footer-two',
					'description'	=> esc_html__( 'Widgets in this area are used in the second footer region.', 'wpex-blogger' ),
					'before_widget'	=> '<div class="footer-widget %2$s clr">',
					'after_widget'	=> '</div>',
					'before_title'	=> '<h6 class="widget-title">',
					'after_title'	=> '</h6>',
				) );

				// Footer 3
				register_sidebar( array(
					'name'			=> esc_html__( 'Footer 3', 'wpex-blogger' ),
					'id'			=> 'footer-three',
					'description'	=> esc_html__( 'Widgets in this area are used in the third footer region.', 'wpex-blogger' ),
					'before_widget'	=> '<div class="footer-widget %2$s clr">',
					'after_widget'	=> '</div>',
					'before_title'	=> '<h6 class="widget-title">',
					'after_title'	=> '</h6>',
				) );

			}

		}

		/**
		 * Change the excerpt more text
		 *
		 * @since 2.0.0
		 */
		public function excerpt_more() {
			if ( get_theme_mod( 'wpex_blog_readmore', true ) ) {
				return '&hellip;<span class="wpex-readmore"><a href="' . esc_url( get_permalink() ) . '">' . esc_html__( 'continue reading', 'wpex-blogger' ) . ' &rarr;</a></span>';
			} else {
				return '&hellip;';
			}

		}

	}

	new WPEX_Blogger_Theme;

}