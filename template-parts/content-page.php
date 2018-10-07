<?php
/**
 * The template part for page content
 *
 * @package WordPress
 * @subpackage SimpleRei
 * @since 1.0.0
 */
?>

<article <?php post_class( 'post-item' ); ?>>
<?php
if ( ! is_front_page() ) : ?>
	<header class="entry-header">
		<h1 class="entry-title"><span><?php the_title(); ?></span></h1>
	</header>

	<div class="entry-content">
<?php
else : ?>
	<div class="entry-content front-content">
<?php
endif;

	the_content();
	$args = array(
		'before' => '<div class="page-links">',
		'after' => '</div>',
		'link_before' => '<span class="page-number">',
		'link_after' => '</span>',
	);

	wp_link_pages( $args ); ?>
	</div>
</article>
