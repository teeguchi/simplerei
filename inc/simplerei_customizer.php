<?php
/**
 * Theme Customizer for this theme
 *
 * @package WordPress
 * @subpackage SimpleRei
 * @since 1.0.0
 */

/* Customizer registration settings.
 */
function simplerei_customize_register( $wp_customize ) {

	/* Colors. */

	// Icon Color & Main Line Color
	$wp_customize->add_setting(	'icon_color', array(
		'default' => '#999999',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'icon_color', array(
		'label'    => __( 'Icon Color & Main Line Color', 'simplerei' ),
		'section'  => 'colors',
		'settings' => 'icon_color',
		'priority' => 10,
	) ) );

	// Line Color
	$wp_customize->add_setting( 'line_color', array(
		'default' => '#dcdcdc',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'line_color', array(
		'label'    => __( 'Line Color', 'simplerei' ),
		'section'  => 'colors',
		'settings' => 'line_color',
		'priority' => 14,
	) ) );

	// Link Color
	$wp_customize->add_setting( 'link_color', array(
		'default' => '#ffa500',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
		'label'    => __( 'Link Color', 'simplerei' ),
		'section'  => 'colors',
		'settings' => 'link_color',
		'priority' => 20,
	) ) );

	// Link Hover Color
	$wp_customize->add_setting( 'link_hover_color', array(
		'default' => '#fdd35c',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_hover_color', array(
		'label'    => __( 'Link Hover Color', 'simplerei' ),
		'section'  => 'colors',
		'settings' => 'link_hover_color',
		'priority' => 22,
	) ) );

	// Main Menu Text Color
	$wp_customize->add_setting( 'mainmenu_color', array(
		'default' => '#222222',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mainmenu_color', array(
		'label'    => __( 'Main Menu Text Color', 'simplerei' ),
		'section'  => 'colors',
		'settings' => 'mainmenu_color',
		'priority' => 30,
	) ) );

	// Dropdown Menu Background Color
	$wp_customize->add_setting( 'dropdown_bg_color', array(
		'default' => '#ffa500',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dropdown_bg_color', array(
		'label'    => __( 'Dropdown Menu Background Color', 'simplerei' ),
		'section'  => 'colors',
		'settings' => 'dropdown_bg_color',
		'priority' => 32,
	) ) );

	// Dropdown Menu Text Color
	$wp_customize->add_setting( 'dropdown_text_color', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dropdown_text_color', array(
		'label'    => __( 'Dropdown Menu Text Color', 'simplerei' ),
		'section'  => 'colors',
		'settings' => 'dropdown_text_color',
		'priority' => 34,
	) ) );

	// Title Text Color
	$wp_customize->add_setting( 'title_color', array(
		'default' => '#222222',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'title_color', array(
		'label'    => __( 'Title Text Color', 'simplerei' ),
		'section'  => 'colors',
		'settings' => 'title_color',
		'priority' => 42,
	) ) );

	// Text Color
	$wp_customize->add_setting( 'text_color', array(
		'default' => '#333333',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'text_color', array(
		'label'    => __( 'Text Color', 'simplerei' ),
		'section'  => 'colors',
		'settings' => 'text_color',
		'priority' => 44,
	) ) );

	/* Control order. */
	$wp_customize->get_control( 'header_textcolor' )->priority  = 40;
	$wp_customize->get_control( 'background_color' )->priority  = 0;

	/* Change control of custom logo. */
	$wp_customize->get_control( 'custom_logo' )->description = __( 'Suggested image dimensions: 140 by 140 pixels.', 'simplerei' );

	/* Change the transport value. */
	$wp_customize->get_setting( 'background_color' )->transport = 'refresh';

	/* Other settings section. */
	$wp_customize->add_section( 'other', array(
		'title' => __( 'Other Settings', 'simplerei' ),
		'priority' => 300,
	) );

	// Site description.
	$wp_customize->add_setting( 'site_description', array(
		'default' => true,
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'site_description', array(
		'label'    => __( 'Display tagline on all pages. If not checked Display only on the front page.', 'simplerei' ),
		'section'  => 'other',
		'settings' => 'site_description',
		'type'     => 'checkbox',
		'priority' => 10,
	) );

	// Display breadcrumbs.
	$wp_customize->add_setting( 'display_breadcrumbs', array(
		'default' => true,
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'display_breadcrumbs', array(
		'label'    => __( 'Display breadcrumbs.', 'simplerei' ),
		'section'  => 'other',
		'settings' => 'display_breadcrumbs',
		'type'     => 'checkbox',
		'priority' => 20,
	) );

	// Breadcrumbs Color
	$wp_customize->add_setting( 'breadcrumbs_color', array(
		'default' => '#777777',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'breadcrumbs_color', array(
		'label'    => __( 'Breadcrumbs Color', 'simplerei' ),
		'section'  => 'other',
		'settings' => 'breadcrumbs_color',
		'priority' => 22,
	) ) );

	// Display searchform.
	$wp_customize->add_setting( 'display_searchform', array(
		'default' => true,
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'display_searchform', array(
		'label'    => __( 'Displays the search form when search result or designated page can not be found.', 'simplerei' ),
		'section'  => 'other',
		'settings' => 'display_searchform',
		'type'     => 'checkbox',
		'priority' => 30,
	) );

	// Apply wide size to the first footer widget.
	$wp_customize->add_setting( 'apply_widesize', array(
		'default' => true,
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'apply_widesize', array(
		'label'    => __( 'Apply wide size to the first footer widget.', 'simplerei' ),
		'section'  => 'other',
		'settings' => 'apply_widesize',
		'type'     => 'checkbox',
		'priority' => 40,
	) );

	// Display post-thumbnail at post list.
	$wp_customize->add_setting( 'display_thumbnail_postlist', array(
		'default' => true,
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'display_thumbnail_postlist', array(
		'label'    => __( 'Display post-thumbnail at post list.', 'simplerei' ),
		'section'  => 'other',
		'settings' => 'display_thumbnail_postlist',
		'type'     => 'checkbox',
		'priority' => 50,
	) );

	// Display post-thumbnail at single post.
	$wp_customize->add_setting( 'display_thumbnail_singlepost', array(
		'default' => true,
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'display_thumbnail_singlepost', array(
		'label'    => __( 'Display post-thumbnail at single post.', 'simplerei' ),
		'section'  => 'other',
		'settings' => 'display_thumbnail_singlepost',
		'type'     => 'checkbox',
		'priority' => 60,
	) );
}
add_action( 'customize_register', 'simplerei_customize_register' );

/* Check other settings.
 */
if ( ! function_exists( 'simplerei_other_settings' ) ) {
	function simplerei_other_settings( $setting_name ) {
		$value = get_theme_mod( $setting_name );
		if ( $value === false ) {
			$value = 1;
		}

		return $value;
	}
}

/* Theme customizer styles.
 */
function simplerei_customize_css() {
	$simplerei_style = '';

	// Icon Color & Main Line Color
	if ( get_theme_mod( 'icon_color', '#999999' ) !== '#999999') {
		$icon_color = get_theme_mod( 'icon_color' );
		$rgb_color = simplerei_hex2rgb( $icon_color );
		$hsv_color = simplerei_rgb2hsv( $rgb_color );
		// Correct pale color.
		$correct_hsv_color = simplerei_correct_pale_color( $hsv_color );
		$correct_rgb_color = simplerei_hsv2rgb( $correct_hsv_color );
		$correct_hex_color = simplerei_rgb2hex( $correct_rgb_color );
		$simplerei_style .= '.menu-trigger button, .post-front .post-link a, .post-list .post-link a, .search-results .post-link a, .entry-meta time::before, .entry-meta span::before, .sticky .entry-meta::after, .footer-widget .widget table a, .social-navigation li a, #page-top a {color:' . $icon_color . ';} .search-form .search-submit {color:' . $correct_hex_color . ';} .heading, .main-navigation .menu > li:last-child, .copyright-cover {border-color:' . $icon_color . ';} @media screen and (min-width: 740px) {.heading-cover {border-color:' . $icon_color . ';}} ';
	}

	// Line Color
	if ( get_theme_mod( 'line_color', '#dcdcdc' ) !== '#dcdcdc') {
		$line_color = get_theme_mod( 'line_color' );
		$simplerei_style .= '.main-navigation .menu > li, .main-navigation .sub-menu li, .post-front .post-item, .post-list .post-item, .search-results .post-item, .search-form .search-field, form textarea, form input[type="text"], form input[type="email"], form input[type="url"], form input[type="password"], form input[type="submit"], .comment-list > li, .sidebar-area .widget > ul > li, .sidebar-area .widget > ul > li > ul li, .sidebar-area .widget table tbody tr, .page-main .post-item .entry-title span, .post-main .post-item .entry-title span, .page-main .entry-content h2::before, .post-main .entry-content h2::before, .page-main .entry-content h2::after, .post-main .entry-content h2::after, .page-main .entry-content hr, .post-main .entry-content hr, .comments-title, .comment-reply-title, .comment-body .comment-content h2::before, .comment-body .comment-content h2::after, .comment-body hr {border-color:' . $line_color . ';} .page-main .entry-content h3::before, .post-main .entry-content h3::before, .comment-body .comment-content h3::before {background-color:' . $line_color . ';} ';
	}

	// Link Color
	if ( get_theme_mod( 'link_color', '#ffa500' ) !== '#ffa500' ) {
		$link_color = get_theme_mod( 'link_color' );
		$simplerei_style .= '.nav-links a, .post-main .entry-meta .post-author a, .post-main .entry-meta .post-comment a, .post-main .entry-meta .post-edit a, .entry-content a, .post-main .entry-footer a, .post-main .entry-footer .cat-links, .post-main .entry-footer .tags-links, .comment-list a,.comments-area .logged-in-as, .comments-area .logged-in-as a, .sidebar-area a, .sidebar-area .tagcloud span, .bottom-widget .widget a {color:' . $link_color . ';} ';
	}

	// Link Hover Color
	if ( get_theme_mod( 'link_hover_color', '#fdd35c' ) !== '#fdd35c' ) {
		$link_hover_color = get_theme_mod( 'link_hover_color' );
		$simplerei_style .= '.sidebar-area .widget select, .bottom-widget .widget select {background-color:' . $link_hover_color . ';} @media screen and (min-width: 740px) {.main-navigation .menu > li > a:hover, .entry-title a:hover, .post-front .post-link a:hover, .post-list .post-link a:hover, .search-results .post-link a:hover, .footer-widget .widget a:hover, .footer-widget .tagcloud a:hover + span, .social-navigation li a:hover {color:' . $link_hover_color . ';} .main-navigation .sub-menu li:hover {background-color:' . $link_hover_color . ';}} ';
	}

	// Main Menu Text Color
	if ( get_theme_mod( 'mainmenu_color', '#222222' ) !== '#222222' ) {
		$mainmenu_color = get_theme_mod( 'mainmenu_color' );
		$simplerei_style .= '.main-navigation a {color:' . $mainmenu_color . ';} ';
	}

	// Dropdown Menu Background Color
	if ( get_theme_mod( 'dropdown_bg_color', '#ffa500' ) !== '#ffa500' ) {
		$dropdown_bg_color = get_theme_mod( 'dropdown_bg_color' );
		$simplerei_style .= '@media screen and (min-width: 740px) {.main-navigation .sub-menu li {background-color:' . $dropdown_bg_color . ';}} ';
	}

	// Dropdown Menu Text Color
	if ( get_theme_mod( 'dropdown_text_color', '#ffffff' ) !== '#ffffff' ) {
		$dropdown_text_color = get_theme_mod( 'dropdown_text_color' );
		$simplerei_style .= '.sidebar-area .widget select, .bottom-widget .widget select {color:' . $dropdown_text_color . ';} @media screen and (min-width: 740px) {.main-navigation .sub-menu li a {color:' . $dropdown_text_color . ';}} ';
	}

	// Title Text Color
	if ( get_theme_mod( 'title_color', '#222222' ) !== '#222222' ) {
		$title_color = get_theme_mod( 'title_color' );
		$simplerei_style .= '.entry-title, .entry-title a, .nav-links .current, .nav-links .dots, .entry-content .page-links, .sidebar-area .widget-title, .bottom-widget .widget-title {color:' . $title_color . ';} ';
	}

	// Text Color
	if ( get_theme_mod( 'text_color', '#333333' ) !== '#333333' ) {
		$text_color = get_theme_mod( 'text_color' );
		$simplerei_style .= 'body, .wp-block-image figcaption, .wp-block-embed figcaption, .wp-block-calendar table caption, .wp-block-calendar table tbody, .wp-block-code, .wp-block-preformatted pre, .wp-block-quote cite, form input[type="submit"], .footer-widget form input[type="submit"], .footer-widget .widget select, .footer-widget .widget a, .footer-widget .widget .search-submit {color:' . $text_color . ';} .footer-widget .widget select, .footer-widget .widget .search-field, .footer-widget form textarea, .footer-widget form input[type="text"], .footer-widget form input[type="email"], .footer-widget form input[type="url"], .footer-widget form input[type="password"], .footer-widget form input[type="submit"] {border-color:' . $text_color . ';} ';
	}

	// Breadcrumbs Color
	if ( get_theme_mod( 'breadcrumbs_color', '#777777' ) !== '#777777') {
		$breadcrumbs_color = get_theme_mod( 'breadcrumbs_color' );
		$simplerei_style .= '.breadcrumb li, .breadcrumb li a {color:' . $breadcrumbs_color . ';} ';
	}

	// Style without sidebar area.
	if ( !is_active_sidebar( 'sidebar-1' ) ) {
		$simplerei_style .='.content-area {float: none; width:100%; padding-right: 0;} @media screen and (min-width: 740px) {.wrapper, .wrap, .footer-wrap {max-width: 1000px;}} @media screen and (min-width: 1016px) {#page-top {margin-right: calc((100% - 1000px) / 2);}} ';
	}

	// Change width of first footer widget.
	if ( is_active_sidebar( 'sidebar-2' ) && get_theme_mod( 'apply_widesize' ) === 0 ) {
		$simplerei_style .='.footer-widget .widget:first-child {width: 50%;} @media screen and (min-width: 740px) {.footer-widget .widget:first-child {width: 33.33%; padding-right: 1em;}} ';
	}

	if ( $simplerei_style === '' ) {
		return;
	}

	echo '<style type="text/css" id="simplerei-customize-css">' . $simplerei_style . '</style>' . "\n";
}
add_action( 'wp_head', 'simplerei_customize_css' );

/* Custom Header callback.
 * Add header text color styles to Custom Header.
 */
if ( ! function_exists( 'simplerei_header_textcolor_cb' ) ) {
	function simplerei_header_textcolor_cb() {
		$header_textcolor = '#' . get_header_textcolor();

		if ( $header_textcolor !== '#222222' ) {
			echo '<style type="text/css">';
			echo '.site-title, .site-title a, .site-description {color:' . esc_attr( $header_textcolor ) . ';} ';
			echo '</style>' . "\n";
		} else {
			echo '';
		}
	}
}

/* Add color styles related to Custom Background.
 */
if ( ! function_exists( 'simplerei_add_custom_background' ) ) {
	function simplerei_add_custom_background() {
		$background_color = '#' . get_background_color();

		if ( $background_color === '#ffffff' ) {
			return;
		}

		$rgb_color = simplerei_hex2rgb( $background_color );
		$hsv_color = simplerei_rgb2hsv( $rgb_color );

		// Pale color.
		$pale_hsv_color = simplerei_pale_color_generator( $hsv_color );
		$pale_rgb_color = simplerei_hsv2rgb( $pale_hsv_color );
		$pale_hex_color = simplerei_rgb2hex( $pale_rgb_color );

		// Increase brightness.
		$dark_hsv_color = simplerei_increase_brightness( $hsv_color );
		$dark_rgb_color = simplerei_hsv2rgb( $dark_hsv_color );
		$dark_hex_color = simplerei_rgb2hex( $dark_rgb_color );

		echo '<style type="text/css" id="simplerei-custom-background-css">';
		echo '.site-main .entry-content th, .page-main .entry-content th, .post-main .entry-content th, .site-main .entry-content td, .page-main .entry-content td, .post-main .entry-content td, .comment-body th, .comment-body td, .site-main .entry-content pre, .page-main .entry-content pre, .post-main .entry-content pre, .comment-body pre {border-color:' . esc_attr( $dark_hex_color ) . ';} .site-main .entry-content blockquote::before, .page-main .entry-content blockquote::before, .post-main .entry-content blockquote::before, .site-main .entry-content blockquote::after, .page-main .entry-content blockquote::after, .post-main .entry-content blockquote::after, .comment-body blockquote::before, .comment-body blockquote::after {color:' . esc_attr( $dark_hex_color ) . ';} .site-main .entry-content blockquote, .page-main .entry-content blockquote, .post-main .entry-content blockquote, .site-main .entry-content table, .page-main .entry-content table, .post-main .entry-content table, .site-main .entry-content pre, .page-main .entry-content pre, .post-main .entry-content pre, .comment-body blockquote, .comment-body table, .comment-body pre, form input[type="submit"] {background-color:' . esc_attr( $pale_hex_color ) . ';} ';
		echo '</style>' . "\n";
	}
}
add_action('wp_head', 'simplerei_add_custom_background');
