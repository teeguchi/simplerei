<?php
/**
 * page.php for this theme
 *
 * @package WordPress
 * @subpackage SimpleRei
 * @since 1.0.0
 */

get_header(); ?>

<?php
if ( has_post_thumbnail() ) : ?>
	<!-- Featured-image for page.php. -->
	<div class="featured-image-cover">
		<?php the_post_thumbnail( 'simplerei-featured-image' ); ?>
	</div>
<?php
endif; ?>

<div class="content-area">
<?php
while ( have_posts() ) : the_post(); ?>
	<div class="page-main">
		<?php get_template_part( 'template-parts/content', 'page' ); ?>
	</div><!-- /page-main -->

	<?php
	if ( comments_open() || get_comments_number() ) : ?>
		<div class="page-comments">
			<?php comments_template(); ?>
		</div><!-- /page-comments -->
	<?php
	endif;
endwhile; ?>
</div><!-- /content-area -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
