<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Positor
 */
?>

<?php get_header(); ?>

<div class="container">
	<div class="row">
	
		<?php
		if ( is_active_sidebar( 'sidebar-1' ) ) {
			echo '<div class="col-md-9">';
		} else {
			echo '<div class="col-md-12">';
		};
		?>
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'components/post/content', get_post_format() );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main>
	</div>

<?php
get_sidebar();
?>

</div>

</div>
<?php
get_footer();

