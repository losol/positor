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
<div class="container">
		
		<?php /* Grid with featured posts */
		if ( is_home() && is_front_page() && ! is_paged() ) {
			get_template_part( 'components/post/grid' );
		}
		?>
		<?php

		if ( have_posts() ) :

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'components/post/content', get_post_format() );

			endwhile;


			// Post navigation for prev/next index page.
			get_template_part( 'components/common/archive-navigation', get_post_format() );

		else :

			get_template_part( 'components/post/content', 'none' );

		endif; ?>
		</main>
		
	</div>


</div>
<?php
get_footer();
