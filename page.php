<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Positor
 */
 ?>

<?php get_header(); ?>
<div id="content" class="container px-0">
		<div class="row flex-grow">
		
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
					get_template_part( 'components/common/comments');

				endwhile; // End of the loop.
				?>

			</main>
			</div>
			<?php		
				if ( is_active_sidebar( 'sidebar-1' ) ) :
				echo '<div class="col-md-3 hidden-print">';
				get_sidebar();
				endif;
				echo '</div>';
			?>
		</div>
</div>

<?php
get_footer();