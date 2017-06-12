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
<?php
	while ( have_posts() ) : the_post(); ?>

<div class="bg-lightgray">
	<div class="container pt-5">
		<div class="row">
			<?php get_template_part( 'components/post/content-single-header', get_post_format() ); ?>
		</div>
	</div>
</div>
<div class="container">
	<div class="row pt-3">
		<div class="col-md-8">
		<?php

				get_template_part( 'components/post/content-single-body', get_post_format() );
				wp_link_pages();

				get_template_part( 'components/common/issue-published', get_post_format() );
				get_template_part( 'components/common/related-posts', get_post_format() );
				get_template_part( 'components/common/social-sharing', get_post_format() );
?>


			</main>
		</div>
	<div class="col-md-3 offset-md-1 hidden-print">
		<aside id="secondary" role="complementary">
			<?php 
			get_template_part( 'components/common/meta', get_post_format() );
  			get_template_part( 'sidebar', get_post_format() );
			
			?>
		</aside>
	</div>

<?php

?>

</div>

</div>

<?php	
endwhile; // End of the loop.
get_footer();

