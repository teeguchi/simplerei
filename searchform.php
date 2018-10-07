<?php
/**
 * The search form for this theme
 *
 * @package WordPress
 * @subpackage SimpleRei
 * @since 1.0.0
 */
?>

<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="s"><?php esc_html_e( 'Search', 'simplerei' ); ?></label>
	<input type="search" id="s" class="search-field" name="s" placeholder="<?php esc_attr_e( 'Search &hellip;', 'simplerei' ); ?>" value="<?php echo get_search_query(); ?>">
	<input type="submit" class="search-submit" value="&#xF002;">
</form>
