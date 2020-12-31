<?php
/**
 * Configures meta options via cmb_meta_boxes filter
 *
 * @package WPEX Blogger
 * @since 2.1
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function wpex_add_post_video_metabox() {
	$screens = array( 'post' );
	foreach ( $screens as $screen ) {
		add_meta_box(
			'wpex_post_video_metabox',
			__( 'Post Video', 'wpex-blogger' ),
			'wpex_post_video_metabox_html',
			$screen
		);
	}
}
add_action( 'add_meta_boxes', 'wpex_add_post_video_metabox' );

function wpex_post_video_metabox_html( $post ) {

	$val = get_post_meta( $post->ID, 'wpex_post_video', true );

	wp_nonce_field( 'wpex_post_video_nonce_action', 'wpex_post_video_nonce' );
	?>

	<p><label for="wpex_post_video"><?php esc_html_e( 'oEmbed Compatible Video URL:', 'wpex-blogger' ); ?></label>
	<input type="text" name="wpex_post_video" id="wpex_post_video_field" style="width:99%" value="<?php echo esc_attr( $val ); ?>"></p>

<?php }

function wpex_save_post_video_field( $post_id ) {

	$nonce_name = isset( $_POST['wpex_post_video_nonce'] ) ? $_POST['wpex_post_video_nonce'] : '';
	$nonce_action = 'wpex_post_video_nonce_action';

	if ( ! wp_verify_nonce( $nonce_name, $nonce_action ) ) {
		return;
	}

	// Check if user has permissions to save data.
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	// Check if not an autosave.
	if ( wp_is_post_autosave( $post_id ) ) {
		return;
	}

	// Check if not a revision.
	if ( wp_is_post_revision( $post_id ) ) {
		return;
	}

	if ( array_key_exists( 'wpex_post_video', $_POST ) ) {
		update_post_meta(
			$post_id,
			'wpex_post_video',
			$_POST['wpex_post_video']
		);
	}
}
add_action( 'save_post', 'wpex_save_post_video_field' );