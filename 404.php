<?php
/**
 * 404.php for this theme
 *
 * @package WordPress
 * @subpackage SimpleRei
 * @since 1.0.0
 */

get_header(); ?>

<div class="content-area">
	<div class="error-404">
		<header>
			<h1 class="page-title">404 Not Found.</h1>
		</header>

		<?php // Not found.
			get_template_part( 'template-parts/content', 'nothing' );
		?>
		</div>
	</div><!-- /error-404 -->
</div><!-- /content-area -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
