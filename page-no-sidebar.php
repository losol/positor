 <?php
/**
 * Template Name: No sidebar
 * The template for displaying all pages with right sidebar
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Positor
 */
 ?>

<?php get_header(); ?>
<div class="container" id="content">
	<div class="row">
		<div class="col-md-12">
		<main id="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'components/page/content', 'page' );
				get_template_part( 'components/common/comments');

			endwhile; // End of the loop.
			?>

		</main>
		</div>
	</div>
</div>

<?php
get_footer();