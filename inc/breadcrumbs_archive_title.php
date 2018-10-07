<?php
/**
 * Title display of breadcrumbs for archive type page
 *
 * @package WordPress
 * @subpackage SimpleRei
 * @since 1.0.0
 */

/* Breadcrumbs archive title.
 */
if ( ! function_exists( 'simplerei_breadcrumbs_archive_title' ) ) {
	function simplerei_breadcrumbs_archive_title() {
		if ( is_year() ) {
			echo get_the_date( __( 'Y', 'simplerei' ) );
		} elseif ( is_month() ) {
			echo get_the_date( __( 'Y-m', 'simplerei' ) );
		} elseif ( is_day() ) {
			echo get_the_date( __( 'Y-m-d', 'simplerei' ) );
		} elseif ( is_author() ) {
			the_author();
		} elseif ( is_category() ) {
			single_cat_title();
		} elseif ( is_tag() ) {
			single_tag_title();
		} elseif ( is_tax() ) {
			single_term_title();
		} elseif ( is_post_type_archive() ) {
			post_type_archive_title();
		}
	}
}
