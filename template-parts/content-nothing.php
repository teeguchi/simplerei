<?php
/**
 * The template part for notifying when there is nothing
 *
 * @package WordPress
 * @subpackage SimpleRei
 * @since 1.0.0
 */
?>

<div class="not-found">
<?php
if ( is_404() ) : ?>
	<p><?php esc_html_e( 'The specified page could not be found.', 'simplerei' ); ?></p>
<?php
else : ?>
	<p><?php esc_html_e( 'There was nothing to match.', 'simplerei' ); ?></p>
<?php
endif;

if ( simplerei_other_settings( 'display_searchform' ) ) {
	get_search_form();
} ?>
</div>
