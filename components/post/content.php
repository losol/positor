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
		<?php if (is_sticky() && is_home() && !is_paged()) : ?>
			<span class="h3 badge badge-info">
				<?php _e('Featured', 'positor'); ?>
			</span>
		<?php endif; ?>
		<?php
			the_title( '<h2 class="py-1 display-3"><a class="link-no-decoration" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		 ?>
	</header>
	<?php if ( '' != get_the_post_thumbnail() ) : ?>
		<div class="post-thumbnail py-1 ml-auto">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'positor-featured-image', array( 'class' => 'mx-auto d-block' )); ?>
			</a>
		</div>
	<?php endif; ?>


	<div class="entry-content">
		<a href="<?php the_permalink(); ?>" class="link-no-decoration lead">
		
			<?php
			positor_the_excerpt();
			?>
		</a>
		<a href="<?php the_permalink(); ?>" class="">

			<?php
				esc_html_e( 'Read ', 'positor' ); 
				the_title();
			?>
		</a>
	</div>
		<footer class="entry-footer">
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->