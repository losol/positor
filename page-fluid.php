<?php
/**
 * Template Name: Fluid page
 * The template for displaying pages stretching over the whole width of the screen.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Positor
 */

?>

<?php get_header(); ?>
<div class="container-fluid flex-grow" id="content">
	<div class="row">
		<main id="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'components/page/content', 'page' );
				get_template_part( 'components/common/comments' );

			endwhile; // End of the loop.
			?>

		</main>
	</div>
</div>

<?php
get_footer();
