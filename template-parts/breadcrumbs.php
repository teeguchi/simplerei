<?php
/**
 * Template part of breadcrumb list of this theme
 *
 * @package WordPress
 * @subpackage SimpleRei
 * @since 1.0.0
 */

$home_id = get_option( 'page_on_front' );

if ( is_single() ) : ?>
	<ul>
		<li class="home"><?php echo '<a href="' . esc_url( home_url() ) . '">' . ( ( $home_id == 0 ) ? 'HOME' : get_the_title( $home_id ) ) . '</a>'; ?></li>
		<?php
		if ( get_the_category() ) : ?>
			<li class="cat"><?php the_category( ', ' ); ?></li>
		<?php
		// Display for custom taxonomy.
		elseif ( get_the_taxonomies() ) : ?>
			<li class="tax">
			<?php
				$taxonomies = get_taxonomies( array( '_builtin' => false ), 'objects' );
				foreach ( $taxonomies as $tax ) {
					if ( is_taxonomy_hierarchical( $tax->name ) ) {
						echo get_the_term_list( get_the_ID(), $tax->name, '', ', ' );
					}
				}
			?>
			</li>
		<?php
		endif; ?>
			<li class="current"><span class="screen-reader-text"><?php the_title(); ?></span></li>
	</ul>

<?php
elseif ( is_archive() ) : ?>
	<ul>
		<li class="home"><?php echo '<a href="' . esc_url( home_url() ) . '">' . ( ( $home_id == 0 ) ? 'HOME' : get_the_title( $home_id ) ) . '</a>'; ?></li>
		<?php
		// It also supports custom taxonomies.
		if ( $term_id = get_queried_object_id() ) {
			$cat_obj = get_term( $term_id );
			$cat_type = $cat_obj->taxonomy;
			if ( $cat_parents = get_ancestors( $term_id, $cat_type ) ) {
				foreach ( array_reverse( $cat_parents ) as $id ) {
					$parent = get_term( $id );
		?>
		<li class="parent"><?php echo '<a href="' . esc_url( get_term_link( $id ) ) . '">' . $parent->name . '</a>'; ?></li>
		<?php }	} } ?>
		<li class="current"><span class="screen-reader-text"><?php simplerei_breadcrumbs_archive_title(); ?></span></li>
	</ul>

<?php
elseif ( is_page() ) : ?>
	<ul>
		<li class="home"><?php echo '<a href="' . esc_url( home_url() ) . '">' . ( ( $home_id == 0 ) ? 'HOME' : get_the_title( $home_id ) ) . '</a>'; ?></li>
		<?php
			if ( $parents_id = array_reverse( get_post_ancestors( get_the_ID() ) ) ) {
				foreach ( $parents_id as $id ) {
		?>
		<li class="parent"><?php echo '<a href="' . esc_url( get_page_link( $id ) ) .'">' . get_the_title( $id ) . '</a>'; ?></li>
		<?php } } ?>
		<li class="current"><span class="screen-reader-text"><?php the_title(); ?></span></li>
	</ul>

<?php
elseif ( is_home() ) : ?>
	<ul>
		<li class="home"><?php echo '<a href="' . esc_url( home_url() ) . '">' . get_the_title( $home_id ) . '</a>'; ?></li>
		<li class="current"><span class="screen-reader-text"><?php single_post_title(); ?></span></li>
	</ul>
<?php
endif; ?>
