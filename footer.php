<?php
/**
 * The footer for this theme
 *
 * @package WordPress
 * @subpackage SimpleRei
 * @since 1.0.0
 */
?>

</div><!-- /wrapper -->
</div><!-- /site-content -->


<footer class="site-footer">
	<div class="footer-cover">
	<?php
	if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
		<div class="footer-wrap">
			<aside class="footer-widget">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</aside>
		</div><!-- /footer-wrap -->
	<?php
	endif; ?>
		<div class="footer-bottom">
		<?php
		if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
			<div class="footer-wrap">
				<aside class="bottom-widget">
					<?php dynamic_sidebar( 'sidebar-3' ); ?>
				</aside>
			</div><!-- /footer-wrap -->
		<?php
		endif; 
		
		if ( has_nav_menu( 'socialmenu' ) ) : ?>
			<nav class="social-navigation">
				<div class="footer-wrap">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'socialmenu',
						'menu_id'        => 'bottom-social-menu',
						'link_before'    => '<span class="screen-reader-text">',
						'link_after' => '</span>',
					) );
				?>
				</div><!-- /footer-wrap -->
			</nav><!-- /social-navigation -->
		<?php
		endif; ?>
			<div class="copyright-cover">
				<div class="footer-wrap">
					<p class="copyright"><small>&copy; <?php echo esc_html( simplerei_first_post_year() ); ?> <span class="blog-name"><?php bloginfo( 'name' ); ?></span></small></p>

					<div id="page-top">
						<a href="#top"><span class="screen-reader-text">TOP</span></a>
					</div>
				</div><!-- /footer-wrap -->
			</div><!-- /copyright-cover -->
		</div><!-- /footer-bottom -->
	</div><!-- /footer-cover -->
</footer><!-- /site-footer -->

<?php wp_footer(); ?>

</body>
</html>
