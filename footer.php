<?php
/**
 * The template for displaying the footer.
 *
 * @package WPEX Blogger
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>

	</div><!-- #main-content -->

	<?php if ( get_theme_mod( 'wpex_footer_widgets', true ) ) { ?>

		<div id="footer-wrap" class="site-footer clr">

			<div id="footer" class="clr container">

				<?php get_template_part( 'partials/footer/widgets' ); ?>

			</div><!-- #footer -->

		</div><!-- #footer-wrap -->

	<?php } ?>

	<?php get_template_part( 'partials/footer/copyright' ); ?>

</div><!-- #wrap -->

<?php get_template_part( 'partials/mobile-search' ); ?>

<?php wp_footer(); ?>
</body>
</html>