<?php
/**
 * The sidebar for this theme
 *
 * @package WordPress
 * @subpackage SimpleRei
 * @since 1.0.0
 */

if ( is_active_sidebar( 'sidebar-1' ) ) : ?>

<div class="sidebar-area">
	<aside>
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside>
</div><!-- /sidebar-area -->
<?php
endif; ?>
