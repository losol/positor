<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Positor
 */

?>
<?php get_header(); ?>
<div class="bg-gray-300 py-3">
			<header class="container page-header">
				<?php
					the_archive_title( '<h1 class="page-title display-2">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description lead">', '</div>' );
				?>
			</header>
</div>
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
