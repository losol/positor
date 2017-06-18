 <?php
/**
 * Template Name: Full width
 * The template for displaying all pages without sidebar
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Positor
 */
 ?>

<?php get_header(); ?>
<div class="container fl-content-full px-0" id="content">
	<div class="row flex-grow">
		<div class="col-md-12 fl-content">
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