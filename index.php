<?php
/**
 * The main template file
 *
 * It is used to display a page when nothing more specific matches a query.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Positor
 */

?>
<?php get_header(); ?>

<!-- Featured grid -->
<div class="bg-featured-grid">
	<div class="container">
			<?php
			/**
			 * Grid with featured posts.
			 * Show only if it is a non-paged front page
			 */
			if ( is_home() && is_front_page() && ! is_paged() ) {
				get_template_part( 'components/frontpage/featured-grid' );
			}
			?>
		</div>
	</div>
</div>
<!-- End of featured grid -->
<div class="container">
	<div class="row">
<!-- Loop -->
		<?php

		if ( have_posts() ) :
			// Check if there should be place for a sidebar.
			if ( is_active_sidebar( 'sidebar-frontpage' ) ) {
				echo '<div class="col-md-8">';
			} else {
				echo '<div class="col">';
			}

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				echo '<div class="py-3">';
				get_template_part( 'components/card/card-standard', get_post_format() );
				echo '</div>';
			endwhile;
			echo '</div>';

			// Show sidebar.
			if ( is_active_sidebar( 'sidebar-frontpage' ) ) {
				echo '<div class="col-md-4 py-5">';
				dynamic_sidebar( 'sidebar-frontpage' );
				echo '</div>';
			}

			// Post navigation for prev/next index page.
			echo '<div class="container">';
			get_template_part( 'components/common/archive-navigation', get_post_format() );
			echo '</div>';
		else :

			get_template_part( 'components/post/content', 'none' );

endif;
		?>
	</div>
</div>
<!-- End of Loop -->

<?php
get_footer();
