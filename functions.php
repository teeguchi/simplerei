<?php
/**
 * SimpleRei functions and definitions
 *
 * @package WordPress
 * @subpackage SimpleRei
 * @since 1.0.0
 */

/* Load scripts and styles.
 */
function simplerei_scripts() {
	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'fontawesome', get_theme_file_uri( '/fontawesome/css/fontawesome-all.min.css' ), array(), '5.0.10', 'all' );
	wp_enqueue_style( 'simplerei-style', get_theme_file_uri( '/css/style.min.css' ), array(), $theme_version, 'all' );
	wp_enqueue_script( 'jquery-com', get_theme_file_uri( '/js/jquery-3.7.1.min.js' ), array(), '3.7.1', true );
	wp_enqueue_script( 'simplerei-script', get_theme_file_uri( '/js/script.min.js' ), array(), $theme_version, true );
}
add_action( 'wp_enqueue_scripts', 'simplerei_scripts' );

/* Including files.
 */
include 'inc/breadcrumbs_archive_title.php'; // Title display of the breadcrumbs list of the archive type page.
include 'inc/generate_convert_color.php'; // Color conversion functions.
include 'inc/simplerei_customizer.php'; // Customizer additions.
include 'inc/simplerei_customfields.php'; // Customize customfields.

/* Set up theme.
 */
if ( ! function_exists( 'simplerei_setup' ) ) {
	function simplerei_setup() {
		// Load translation files.
		load_theme_textdomain( 'simplerei', get_template_directory() . '/languages' );
		
		// Supports block styles.
		add_theme_support( 'wp-block-styles' );
		
		// Supports editor styles.
		add_theme_support( 'editor-styles' );
		
		// Load editor stylesheets.
		add_editor_style( '/css/editor-style.css' );

		// Supports title tag.
		add_theme_support( 'title-tag' );

		// Enable Automatic Feed Links with this feature.
		add_theme_support( 'automatic-feed-links' );

		// Supports Post Thumbnails.
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'simplerei-featured-image', 1600, 900, true );

		// Apply HTML5 markup.
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Supports Post Formats.
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'audio',
		) );

		// Supports Custom Header.
		add_theme_support( 'custom-header', array(
			'width' => 1400,
			'height' => 440,
			'flex-height' => true,
			'header-text' => true,
			'default-text-color' => '222222',
			'wp-head-callback' => 'simplerei_header_textcolor_cb',
		) );

		// Supports Custom Background.
		add_theme_support( 'custom-background', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) );

		// Supports Custom Logo.
		add_theme_support( 'custom-logo', array(
			'height'      => 140,
			'width'       => 140,
			'flex-height' => true,
			'flex-width'  => true,
		) );

		// Register navigation menu locations.
		register_nav_menus( array(
			'mainmenu' => __( 'Header Main Menu', 'simplerei' ),
			'socialmenu' => __( 'Bottom Social Menu', 'simplerei' ),
		) );
		
		// Supports responsive embeds.
		add_theme_support( 'responsive-embeds' );
	}
}
add_action( 'after_setup_theme', 'simplerei_setup' );

/* Set the content width.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 725;
}

/* Add a pingback url auto-discovery header.
 */
function simplerei_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'simplerei_pingback_header' );

/* Register widget area.
 */
function simplerei_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar Widget', 'simplerei' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget', 'simplerei' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<section id="%1$s" class="widget %2$s"><div>',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Bottom Widget', 'simplerei' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'simplerei_widgets_init' );

/* Modifie archive title.
 */
function simplerei_archive_title( $title ) {
	if ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_category() ) {
		$title = single_term_title( ': ', false );
	}

	return $title;
}
add_filter( 'get_the_archive_title', 'simplerei_archive_title' );

/* Modifie comment form.
 */
function simplerei_exchange_commentform( $args ) {
	$req = get_option( 'require_name_email' );
	$required_text = sprintf( ' ' . __( 'Required fields are marked %s', 'simplerei' ), '<span class="required">*</span>' );
	$args['comment_notes_before'] = '<p class="comment-notes"><span id="email-notes">' . __( 'Your email address will not be published.', 'simplerei' ) . '</span><br>' . ( $req ? $required_text : '' ) . '</p>';

	return $args;
}
add_filter( 'comment_form_defaults', 'simplerei_exchange_commentform' );

/* Add social menu class.
 */
function simplerei_social_menuclass( $classes, $item ) {
	$classes[] = 'social-' . $item->title;

	return $classes;
}
add_filter( 'nav_menu_css_class', 'simplerei_social_menuclass', 10, 2 );

/* Get the first post year.
 */
function simplerei_first_post_year() {
	$first_post_year = '';
	$args = array(
		'post_type' => 'any',
		'posts_per_page' => 1,
		'orderby' => 'date',
		'order' => 'ASC',
	);
	$first_post_query = new WP_Query( $args );
	if ( $first_post_query->have_posts() ) : while ( $first_post_query->have_posts() ) : $first_post_query->the_post();
		$first_post_year = get_the_date( 'Y' );
	endwhile;
		wp_reset_postdata();
	endif;

	return $first_post_year;
}
