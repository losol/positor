<?php
/**
 * The template for displaying all pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Positor
 */

?>

<?php get_header(); ?>
<div id="content" class="container flex-grow">
		<div class="row">
		
			<?php
			if ( is_active_sidebar( 'sidebar-1' ) ) {
				echo '<div class="col-md-9">';
			} else {
				echo '<div class="col-md-12">';
			};
			?>
			<main id="main">

				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'components/page/content', 'page' );
					get_template_part( 'components/common/comments' );

				endwhile; // End of the loop.
				?>

			</main>
			</div>
			<?php
			if ( is_active_sidebar( 'sidebar-1' ) ) :
				echo '<div class="col-md-3 d-print-none">';
				get_sidebar();
			endif;
			echo '</div>';
			?>
		</div>
</div>

<?php
get_footer();
