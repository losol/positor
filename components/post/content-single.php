<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Positor
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'mt-5' ); ?>>
	<header class="">
		<?php
			the_title( '<h1 class="py-1 display-2">', '</h1>' );
		 ?>
	</header>
	<?php if ( '' != get_the_post_thumbnail() ) : ?>
		<div class="post-thumbnail py-1 ml-auto">		
				<?php the_post_thumbnail( 'positor-featured-image', array( 'class' => 'mx-auto d-block' )); ?>
				<?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?>
		</div>
	<?php endif; ?>


	<div class="entry-content">		
			<?php
			the_content();
			?>
		<a href="<?php the_permalink(); ?>" class="link-no-decoration sr-only">
			<?php
				esc_html_e( 'Read ', 'positor' ); 
				the_title();
			?>
		</a>
	</div>
		<footer class="entry-footer">
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
