<?php
/**
 * index.php for this theme
 *
 * @package WordPress
 * @subpackage SimpleRei
 * @since 1.0.0
 */

get_header(); ?>

<div class="content-area">
<?php
if ( have_posts() ) :
	if ( is_home() && ! is_front_page() ) :
		$page_title = single_post_title( '', false ); ?>
		<header>
			<h1 class="page-title"><?php echo $page_title; ?></h1>
		</header>
	<?php
	elseif ( is_archive() ) : ?>
		<header>
			<h1 class="page-title"><?php the_archive_title( '<span>', '</span>' ); ?></h1>
		</header>
	<?php
	endif;

	while ( have_posts() ) : the_post(); ?>
		<article <?php post_class( 'site-main post-item' ); ?>>
		<?php
		if ( is_singular() && ! is_front_page() ) : ?>
			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>
		<?php
		else : ?>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php
		endif; ?>
			<div class="entry-content">
			<?php
				if ( is_singular() ) {
					the_content();
					wp_link_pages();
				} else {
					the_excerpt();
				}
			?>
			</div>
			<?php
			if ( is_archive() ) : ?>
				<div class="post-link"><a href="<?php the_permalink(); ?>"></a></div>
			<?php
			endif; ?>
		</article>
	<?php
	endwhile;
		the_posts_navigation();

else :

	if ( is_404() ) : ?>
		<h2 class="page-title">404 Not Found.</h2>

		<p><?php esc_html_e( 'The specified page could not be found.', 'simplerei' ); ?></p>
	<?php
	else : ?>
		<p><?php esc_html_e( 'There were no posts.', 'simplerei' ); ?></p>
	<?php
	endif;
endif; ?>
</div><!-- /content-area -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
