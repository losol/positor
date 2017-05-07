<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Positor
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'mt-5' ); ?>>
	<header class="">
		
		<h2 class="py-1 display-3">
		<?php
			the_title( '<a class="link-no-decoration" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
		 ?>
		 <small class="text-muted"><?php esc_html_e( 'Sticky ', 'positor' ); ?> </small>
		 </h2>
	</header>
	<?php if ( '' != get_the_post_thumbnail() ) : ?>
		<div class="post-thumbnail py-1 ml-auto">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'positor-featured-image', array( 'class' => 'mx-auto d-block' )); ?>
			</a>
		</div>
	<?php endif; ?>


	<div class="entry-content">
		<a href="<?php the_permalink(); ?>" class="link-no-decoration">
		
			<?php
			positor_the_excerpt();
			?>
		</a>
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