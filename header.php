<?php
/**
 * The header for this theme
 *
 * @package WordPress
 * @subpackage SimpleRei
 * @since 1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="description" content="<?php bloginfo( 'description' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header id="top" class="site-header">
		<div class="heading-cover">
			<div class="wrap">
				<div class="heading">
				<?php
				if ( has_custom_logo() ) : ?>
					<div class="logo-cover">
						<?php the_custom_logo(); ?>
					</div><!-- /logo-cover -->
				<?php
				endif;
				
				if ( display_header_text() ) : ?>
					<div class="title-cover">
					<?php
					if ( is_front_page() || simplerei_other_settings( 'site_description' ) ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>

						<p class="site-description"><?php bloginfo( 'description' ); ?></p>
					<?php
					else: ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
					endif; ?>
					</div><!-- /title-cover -->
				<?php
				endif;

				if ( has_nav_menu( 'mainmenu' ) ) : ?>
					<div class="menu-trigger">
						<button><span class="screen-reader-text">MENU</span></button>
					</div><!-- /menu-trigger -->
				<?php
				endif; ?>
				</div><!-- /heading -->
			</div><!-- /wrap -->
		</div><!-- /heading-cover -->

		<?php
		if ( has_nav_menu( 'mainmenu' ) ) : ?>
			<nav class="main-navigation">
				<div class="wrap">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'mainmenu',
						'menu_id'        => 'header-main-menu',
					) );
				?>
				</div><!-- /wrap -->
			</nav><!-- /main-navigation -->
		<?php
		endif; ?>

		<?php
		if ( get_header_image() && is_front_page() ) : ?>
			<div class="header-img-wrap">
				<div class="header-img-cover">
					<img src="<?php header_image(); ?>" alt="<?php bloginfo('name'); ?> header image" class="header-img">
				</div>
			</div><!-- /header-img-wrap -->
		<?php
		endif; ?>
	</header><!-- /site-header -->

	<div class="site-content">
		<div class="wrapper">
		<?php
		if ( simplerei_other_settings( 'display_breadcrumbs' ) ) :
			if ( ! is_front_page() && ! is_search() && ! is_404() ) : ?>
				<div class="breadcrumb">
					<?php get_template_part( 'template-parts/breadcrumbs' ); ?>
				</div>
			<?php
			endif;
		endif; ?>
