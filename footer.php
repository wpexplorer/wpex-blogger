<?php
/**
 * The template for displaying the footer.
 *
 * @package     Blogger WordPress theme
 * @subpackage  Templates
 * @author      Alexander Clarke
 * @link        http://www.wpexplorer.com
 * @since       1.0.0
 */
?>

	</div><!-- #main-content -->

	<div id="footer-wrap" class="site-footer clr">

		<div id="footer" class="clr container">

			<?php get_template_part( 'partials/footer/widgets' ); ?>

		</div><!-- #footer -->

	</div><!-- #footer-wrap -->

	<?php get_template_part( 'partials/footer/copyright' ); ?>

</div><!-- #wrap -->

<?php get_template_part( 'partials/mobile-search' ); ?>

<?php wp_footer(); ?>
</body>
</html>