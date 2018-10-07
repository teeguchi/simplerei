<?php
/**
 * single.php for this theme
 *
 * @package WordPress
 * @subpackage SimpleRei
 * @since 1.0.0
 */

get_header(); ?>

<div class="content-area">
<?php
while ( have_posts() ) : the_post(); ?>
	<div class="post-main">
		<?php get_template_part( 'template-parts/content', 'single' ); ?>
	</div><!-- /post-main -->

	<?php
	if ( comments_open() || get_comments_number() ) : ?>
		<div class="post-comments">
			<?php comments_template(); ?>
		</div><!-- /post-comments -->
	<?php
	endif;

		$args = array(
			'prev_text' => __( 'Prev', 'simplerei' ) . ' : %title',
			'next_text' => __( 'Next', 'simplerei' ) . ' : %title',
		);
		the_post_navigation( $args );
endwhile; ?>
</div><!-- /content-area -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
