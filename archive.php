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
<div class="bg-gray-light py-3">
			<header class="container page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description lead">', '</div>' );
				?>
			</header>
</div>
<div class="container flex-grow">
	<div class="row">
		<div class="col-md-12">
			<main id="main" class="site-main" role="main">

				<?php
				if ( have_posts() ) : ?>


					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						* Include the Post-Format-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Format name) and that will be used instead.
						*/
						get_template_part( 'components/post/content', get_post_format() );

					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'components/post/content', 'none' );

				endif; ?>

			</main>
		</div>
	</div>
</div>
<?php
get_footer();
