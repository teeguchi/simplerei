<?php
/**
 * The template part for post list content
 *
 * @package WordPress
 * @subpackage SimpleRei
 * @since 1.0.0
 */
?>

<article <?php post_class( 'post-item' ); ?>>
	<div class="entry-header">
	<?php
	if ( is_home() || is_post_type_archive() ) : ?>
		<div class="entry-meta">
			<time datetime="<?php echo get_the_date( DATE_W3C ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>
		</div>
	<?php
	endif; ?>
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	</div>

	<div class="entry-cover">
	<?php
	if ( has_post_thumbnail() && simplerei_other_settings( 'display_thumbnail_postlist' ) ) : ?>
		<div class="postlist-featured-image">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'thumbnail' ); ?></a>
		</div>

		<div class="entry-content has-thumbnail">
	<?php
	else : ?>
		<div class="entry-content">
	<?php
	endif;
			the_excerpt(); ?>
		</div><!-- /entry-content -->
	</div><!-- / entry-cover -->

	<div class="post-link"><a href="<?php the_permalink(); ?>"></a></div>
</article>
