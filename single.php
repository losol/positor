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

<article id="post-<?php the_ID(); ?>" <?php post_class( '' ); ?>>
<?php get_template_part( 'components/post/content-single-header', get_post_format() ); ?>

<div class="container">
	<div class="row">
		<div class="col-md-8">
		<?php

		get_template_part( 'components/post/content-single-body', get_post_format() );

		$this_hide_footer = (bool) get_post_meta( $post->ID, '_positor_hide_footer_section', true );
		if ( ! $this_hide_footer ) {
			get_template_part( 'components/common/related-posts', get_post_format() );
			get_template_part( 'components/common/social-sharing', get_post_format() );

			// Social sharing.
			get_template_part( 'components/social/sharebuttons' );

			// Post navigation for prev/next posts.
			get_template_part( 'components/common/post-navigation', get_post_format() );

			// Comments.
			get_template_part( 'components/common/comments' );

			// Multipage post pagination.
			wp_link_pages();
		}
?>

			</main>
		</div>
	<?php
	$this_hide_sidebar = (bool) get_post_meta( $post->ID, '_positor_hide_sidebar', true );
	if ( ! $this_hide_sidebar ) { ?>
	<div class="col-md-3 offset-md-1 hidden-print">
		<aside id="secondary" role="complementary">
			<?php
				get_template_part( 'components/common/meta', get_post_format() );
				get_template_part( 'sidebar', get_post_format() );
			?>
		</aside>
	</div>
	<?php } ?>

<?php

?>

</div>

</div>
</article>
<?php
endwhile; // End of the loop.
get_footer();

