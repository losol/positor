 <?php
/**
 * Template Name: Blank
 * For use with page builders
 * 
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Positor
 */
 ?>

<?php get_header(); ?>
<div class="container-fluid fl-content-full" id="content">
	<div class="row">
			<main id="main" class="fl-content">
				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'components/page/content', 'page' );
					get_template_part( 'components/common/comments');

				endwhile; // End of the loop.
				?>
			</main>
	</div>
</div>

<?php
get_footer();