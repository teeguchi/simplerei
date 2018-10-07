<?php
/**
 * The template part for single posts
 *
 * @package WordPress
 * @subpackage SimpleRei
 * @since 1.0.0
 */
?>

<article <?php if ( is_sticky() ) post_class( 'post-item sticky' ); else post_class( 'post-item' ); ?>>
	<header class="entry-header">
		<div class="entry-meta">
		<?php
		// Check the post format.
		if ( has_post_format() ) : ?>
			<span class="screen-reader-text"><?php echo 'Format for ' . esc_html( get_post_format() ); ?></span>
		<?php
		endif; ?>
			<time class="post-date" datetime="<?php echo get_the_date( DATE_W3C ); ?>"><?php the_date(); ?></time>
		<?php
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) && simplerei_display_last_modified() ) : ?>
			<time class="post-modified" datetime="<?php echo get_the_modified_date( DATE_W3C ); ?>"><?php the_modified_date(); ?></time>
		<?php
		endif; ?>
			<span class="post-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );?>"><?php the_author(); ?></a></span>
		<?php
		if ( comments_open() || get_comments_number() ) : ?>
			<span class="post-comment"><?php comments_popup_link( __( 'Comments:0', 'simplerei' ), __( 'Comments:1', 'simplerei' ), __( 'Comments:%', 'simplerei' ) ); ?></span>
		<?php
		endif; ?>
			<span class="post-edit"><?php edit_post_link(); ?></span>
		</div><!-- /entry-meta -->
		<?php
		// Featured-image for single.php.
		if ( has_post_thumbnail() && simplerei_other_settings( 'display_thumbnail_singlepost' ) ) {
			the_post_thumbnail( 'simplerei-featured-image' );
		} ?>

		<h1 class="entry-title"><span><?php the_title(); ?></span></h1>
	</header><!-- /entry-header -->

	<div class="entry-cover">
		<div class="entry-content">
			<?php
				the_content();

				$args = array(
					'before' => '<div class="page-links">',
					'after' => '</div>',
					'link_before' => '<span class="page-number">',
					'link_after' => '</span>',
				);
				wp_link_pages( $args );
			?>
		</div><!-- /entry-content -->
	</div><!-- /entry-cover -->

	<footer class="entry-footer">
	<?php
	if ( get_the_category() ) : ?>
		<p class="post-cat"><span class="cat-text"><?php esc_html_e( 'Categories', 'simplerei' ); ?> / </span><span class="cat-links"><?php the_category( ', ' ); ?></span></p>
	<?php
	endif;

	the_tags( '<p class="post-tags"><span class="tags-text">' . __( 'Tags', 'simplerei' ) . ' / </span><span class="tags-links">', ', ', '</span></p>' );

	// Also display custom taxonomies.
	if ( !get_the_category() && !get_the_tags() ) :
		$args = array(
			'template' => '<p><span class="tax-text">%s /</span> <span class="tax-links">%l</span></p>',
		);
		the_taxonomies( $args );
	endif; ?>
	</footer><!-- /entry-footer -->
</article>
