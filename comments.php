<?php
/**
 * comments.php for this theme
 *
 * @package WordPress
 * @subpackage SimpleRei
 * @since 1.0.0
 */

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
<?php
if ( have_comments() ) : ?>
	<h2 class="comments-title"><?php esc_html_e( 'Comments', 'simplerei' ); ?>: <span><?php comments_number(); ?></span></h2>

	<ol class="comment-list">
	<?php wp_list_comments( array( 'style' => 'ol', 'avatar_size' => 50, 'short_ping' => true ) ); ?>
	</ol>
	<?php the_comments_navigation(); ?>
<?php
endif;
comment_form(); ?>
</div><!-- /comments-area -->
