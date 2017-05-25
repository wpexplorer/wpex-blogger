<?php
/**
 * Admin welcome screen
 *
 * @package     Blogger WordPress theme
 * @subpackage  Includes
 * @author      Alexander Clarke
 * @link        http://www.wpexplorer.com
 * @since       2.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WPEX_Welcome Class
 *
 * A general class for About and Credits page.
 *
 * @since 1.4
 */
class WPEX_Welcome {

	/**
	 * @var string The capability users should have to view the page
	 */
	public $minimum_capability = 'manage_options';

	/**
	 * Get things started
	 *
	 * @since 1.0
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menus' ) );
		add_action( 'admin_head', array( $this, 'admin_head' ) );
		add_action( 'admin_init', array( $this, 'welcome' ) );
	}

	/**
	 * Register the Dashboard Pages which are later hidden but these pages
	 * are used to render the Welcome and Credits pages.
	 *
	 * @access public
	 * @since 1.4
	 * @return void
	 */
	public function admin_menus() {
		// About
		add_dashboard_page(
			__( 'Theme Details', 'wpex' ),
			__( 'Theme Details', 'wpex' ),
			$this->minimum_capability,
			'wpex-about',
			array( $this, 'about_screen' )
		);

		// Recommended
		add_dashboard_page(
			__( 'Recommendations | Blogger Theme', 'wpex' ),
			__( 'Recommendations', 'wpex' ),
			$this->minimum_capability,
			'wpex-recommended',
			array( $this, 'recommended_screen' )
		);

	}

	/**
	 * Hide dashboard tabs from the menu
	 *
	 * @access public
	 * @since 1.0
	 * @return void
	 */
	public function admin_head() {
		remove_submenu_page( 'index.php', 'wpex-recommended' );
	}

	/**
	 * Navigation tabs
	 *
	 * @access public
	 * @since 1.0
	 * @return void
	 */
	public function tabs() {
		$selected = isset( $_GET['page'] ) ? $_GET['page'] : 'wpex-about'; ?>
		<h2 class="nav-tab-wrapper">
			<a class="nav-tab <?php echo $selected == 'wpex-about' ? 'nav-tab-active' : ''; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'wpex-about' ), 'index.php' ) ) ); ?>">
				<?php _e( "About", 'wpex' ); ?>
			</a>
			<a class="nav-tab <?php echo $selected == 'wpex-recommended' ? 'nav-tab-active' : ''; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'wpex-recommended' ), 'index.php' ) ) ); ?>">
				<?php _e( 'Recommended', 'wpex' ); ?>
			</a>
		</h2>
		<?php
	}

	/**
	 * Render About Screen
	 *
	 * @access public
	 * @since 1.4
	 * @return void
	 */
	public function about_screen() { ?>
		<div class="wrap about-wrap">
			<?php
			// Get theme version #
			$theme_data = wp_get_theme();
			$theme_version = $theme_data->get( 'Version' );
			$theme_name = $theme_data->get( 'Name' ); ?>

			<h1><?php echo $theme_name; ?> <?php _e( 'Theme', 'wpex' ); ?> v<?php echo $theme_version; ?></h1>
			<div class="about-text">
				<?php _e( 'Thank you for choosing this WordPress theme for your website.', 'wpex' ); ?>
			</div>

			<?php $this->tabs(); ?>

			<div>
				<div class="feature-section">

					<br />

					<div>
						<h4><?php _e( 'GPL License', 'wpex' ); ?></h4>
						<p><?php _e( 'This theme is licensed under the GPL license. This means you can use it for anything you like as long as it remains GPL.', 'wpex' ); ?></p>
					</div>

					<div>
						<h4><?php _e( 'Credits', 'wpex' ); ?></h4>
						<p>
						<?php _e( 'This theme was created by <a href="http://www.wpexplorer.com" target="_blank">WPExplorer.com</a>.', 'wpex' ); ?>
						<br />
						<?php _e( 'We work hard to develop and update this theme.', 'wpex' ); ?>
						<br />
						<?php _e( 'A back-link to our website is very much appreciated or you can follow us via our social media!', 'wpex' ); ?>
						</p>
					</div>

					<div>
						<h4><?php _e( 'Liability', 'wpex' ); ?></h4>
						<p>
						<?php _e( 'WPExplorer.com shall not be held liable for any damages, including, but not limited to, the loss of data or profit, arising from the use of, or inability to use, this theme.', 'wpex' ); ?>
						</p>
					</div>

					<div>
						<h4><?php _e( 'Getting Started', 'wpex' ); ?></h4>
						<p>
						<?php _e( 'Below you will find some useful links to get you started with this theme.', 'wpex' ); ?>
						</p>
						<a href="<?php echo wp_customize_url(); ?>" target="_blank" class="button button-secodary load-customize hide-if-no-customize"><?php _e( 'Customize Your Site', 'wpex' ); ?></a>
						<a href="http://www.wpexplorer.com/blogger-free-wordpress-theme/" target="_blank" class="button button-secodary"><?php _e( 'Theme Page', 'wpex' ); ?></a>
					</div>

				</div>
			</div>

		</div>
		<?php
	}

	/**
	 * Render Recommended Screen
	 *
	 * @access public
	 * @since 1.4
	 * @return void
	 */
	public function recommended_screen() { ?>
		<div class="wrap about-wrap">

			<h1><?php _e( 'Recommendations', 'wpex' ); ?></h1>
			<div class="about-text">
				<?php _e( 'Below are some of the resources we love and recommend.', 'wpex' ); ?>
			</div>

			<?php $this->tabs(); ?>

			<div>
				<div class="feature-section">
					<br />

					<div>
					<h4><?php _e( 'Plugins', 'wpex' ); ?></h4>
					<p><?php _e( 'Below you will find links to plugins we (WPExplorer.com staff) personally like and recommend. None of these plugins are required for your theme to work, they simply add additional functionality.', 'wpex' ); ?></p>

						<ul style="list-style: disc;margin: 20px 0 0 20px;">
							<li><span style="font-weight:bold">Backups:</span> <a href="https://vaultpress.com/" target="_blank">VaultPress</a></li>
							<li><span style="font-weight:bold">Shortcodes:</span> <a href="http://www.wpexplorer.com/symple-shortcodes/" target="_blank">Symple Shortcodes</a></li>
							<li><span style="font-weight:bold">Contact Forms:</span> <a href="http://wordpress.org/plugins/contact-form-7/" target="_blank">Contact Form 7</a> or <a href="http://www.wpexplorer.com/gravity-forms-plugin/" target="_blank">Gravity Forms</a></li>
							<li><span style="font-weight:bold">Page Builder:</span> <a href="http://www.wpexplorer.com/visual-composer-guide/" target="_blank">Visual Composer</a></li>
							<li><span style="font-weight:bold">Image Sliders:</span class> <a href="http://www.wpexplorer.com/revolution-slider-review-guide/" target="_blank">Slider Revolution</a></li>
							<li><span style="font-weight:bold">Other:</span> <a href="http://jetpack.me/" target="_blank">JetPack</a></li>
						</ul>
					</div>

					<div>
						<h4><?php _e( 'Total Theme', 'wpex' ); ?></h4>
						<p><?php _e( 'Check out our most advanced (yet easy to use) and flexible theme to date.', 'wpex' ); ?></p>
						<a href="http://wpexplorer-themes.com/total/" class="button button-primary" target="_blank">Total WordPress Theme</a>
					</div>

					<div>
						<h4><?php _e( 'WordPress Hosting', 'wpex' ); ?></h4>
						<p><?php _e( 'If you need fast and reliable hosting we recommend the same host we use and love WPEngine.', 'wpex' ); ?></p>
						<a href="http://www.wpexplorer.com/hosting/wpengine/" class="button button-secondary" target="_blank">Learn About WPEngine</a>
					</div>

					<div>
						<h4><?php _e( 'Deals & Coupons', 'wpex' ); ?></h4>
						<p><?php _e( 'Check out our coupons page for great deals on WordPress resources.', 'wpex' ); ?></p>
						<a href="http://www.wpexplorer.com/coupons/" class="button button-secondary" target="_blank">View Deals/Coupons</a>
					</div>

				</div>
			</div>
		</div>
		<?php
	}

	/**
	 * Sends user to the Welcome page on theme activation
	 *
	 * @access public
	 * @since 1.0
	 * @return void
	 */
	public function welcome() {
		global $pagenow;
		if ( is_network_admin() || isset( $_GET['activate-multi'] ) ) {
			return;
		}
		if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) {
			wp_safe_redirect( admin_url( 'admin.php?page=wpex-about' ) ); exit;
			exit;
		}
	}
	
}
new WPEX_Welcome();