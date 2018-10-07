<?php
/**
 * Customize the default customfields
 *
 * @package WordPress
 * @subpackage SimpleRei
 * @since 1.0.0
 */

/* Add customfield of last modified date display.
 */

/* Add meta boxes. */
function simplerei_add_last_modified_meta_form() {
	add_meta_box( 'simplerei_last_modified_meta_form', __( 'Last Modified', 'simplerei' ), 'simplerei_last_modified_meta_box' , 'post', 'normal', 'high' );
}
function simplerei_last_modified_meta_box() {
	if ( ! $postmeta = get_post_meta( get_the_ID(), 'simplerei_last_modified', true ) ) {
		$postmeta = 'true';
	}
	if ( $postmeta === 'false' ) {
		$check_value = 'checked';
	} elseif ( $postmeta === 'true' ) {
		$check_value = '';
	}
	echo '<label><input type="checkbox" name="simplerei_last_modified" value="false" ' . esc_attr( $check_value ) . '> ' . __( 'Do not display.', 'simplerei' ) . '</label><br>' . __( 'This setting uses a customfields, but please do not set it from a customfields.', 'simplerei' ) . '<br>(' . __( 'After changing the theme, you can delete the saved value', 'simplerei' ) . ')';
}
add_action( 'add_meta_boxes', 'simplerei_add_last_modified_meta_form' );

/* Registers a meta key. */
function simplerei_regi_last_modified() {
	$args = array(
		'type' => 'string',
		'description' => 'simplerei_display_last_modified',
		'single' => true,
		'sanitize_callback' => 'simplerei_regi_last_modified_callback',
	);
	register_meta( 'post', 'simplerei_last_modified', $args );
}
function simplerei_regi_last_modified_callback( $mete_value ) {
	$mete_value = 'false';

	return $mete_value;
}
add_action( 'init', 'simplerei_regi_last_modified' );

/* Save customfield value. */
function simplerei_display_last_modified_meta( $post_id ) {
	if ( ! isset( $_POST['simplerei_last_modified'] ) ) {
		delete_post_meta( $post_id, 'simplerei_last_modified' );

		return;
	}
	$last_modified_data = sanitize_text_field( $_POST['simplerei_last_modified'] );
	update_post_meta( $post_id, 'simplerei_last_modified', $last_modified_data );
}
add_action( 'save_post', 'simplerei_display_last_modified_meta' );

/* Check the value of the custom field. */
if ( ! function_exists( 'simplerei_display_last_modified' ) ) {
	function simplerei_display_last_modified() {
		$last_modified_value = get_post_meta( get_the_ID(), 'simplerei_last_modified', true );
		if ( $last_modified_value === 'false' ) {
			$value = false;
		} else {
			$value = true;
		}

		return $value;
	}
}
