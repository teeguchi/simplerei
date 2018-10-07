<?php
/**
 * home.php for this theme
 *
 * @package WordPress
 * @subpackage SimpleRei
 * @since 1.0.0
 */

get_header(); ?>

<div class="content-area">
<?php
if ( have_posts() ) :
	if ( is_home() && ! is_front_page() ) : ?>
		<header class="blog-header">
			<h1 class="page-title"><?php echo single_post_title( '', false ); ?></h1>
		</header>

		<div class="post-list">
	<?php
	else : ?>
		<div class="post-front">
	<?php
	endif;

	while ( have_posts() ) : the_post();
	// In the loop.
		get_template_part( 'template-parts/content', 'postlist' );

	endwhile; ?>
		</div><!-- /post-list or post-front -->

		<?php
			$args = array(
				'mid_size' => 3,
				'prev_text' => '<span class="screen-reader-text">Previous</span>',
				'next_text' => '<span class="screen-reader-text">Next</span>',
			);
			the_posts_pagination( $args );

else : ?>
	<p><?php esc_html_e( 'There were no posts.', 'simplerei' ); ?></p>
<?php
endif; ?>
</div><!-- /content-area -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
