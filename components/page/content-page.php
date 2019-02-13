<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Positor
 */


$this_hide_intro = get_post_meta( get_the_ID(), '_positor_hide_intro_section', true );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( '' ); ?>>
	<?php

	if ( ! $this_hide_intro ) {
		?>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title pt-5">', '</h1>' ); ?>
	</header>
	<?php } // End if(). ?>
	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'positor' ),
					'after'  => '</div>',
				)
			);
			?>
	</div>
	<footer class="entry-footer">
	</footer>
</article><!-- #post-## -->
