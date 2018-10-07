<?php
/**
 * search.php for this theme
 *
 * @package WordPress
 * @subpackage SimpleRei
 * @since 1.0.0
 */

get_header(); ?>

<div class="content-area">
	<div class="search-results">
		<header>
			<h1 class="page-title"><?php esc_html_e( 'Search Results', 'simplerei' ); ?>: <span><?php echo get_search_query(); ?></span></h1>
		</header>
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();
		// In the loop.
			get_template_part( 'template-parts/content', 'postlist' );

		endwhile; ?>
	</div><!-- /search-results -->

	<?php
		$args = array(
			'mid_size' => 2,
			'prev_text' => '<span class="screen-reader-text">Previous</span>',
			'next_text' => '<span class="screen-reader-text">Next</span>',
		);
		the_posts_pagination( $args );

	else :
	// Not found.
		get_template_part( 'template-parts/content', 'nothing' ); ?>

	</div><!-- /search-results -->
	<?php
	endif; ?>
</div><!-- /content-area -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
