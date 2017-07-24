<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Positor
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'bg-white my-5' ); ?>>
	
	<?php if ( '' !== get_the_post_thumbnail() ) : ?>
		<div class="post-thumbnail m-0">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'positor-featured-image', array(
					'class' => 'card-img-top img-fluid w-100',
					)
				); ?>
			</a>
		</div>
		<div class="bg-white p-3">
	<?php endif; ?>
	<div class="card-block">
		

			<h2 class="pt-3 display-3">
			<?php
			// The title.
			the_title( '<a class="link-no-decoration" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );

			// Featured badge if sticky.
			if ( is_sticky() && is_home() && ! is_paged() ) {
				echo ' <small class="text-muted pl-2"><span class="badge badge-info">' . esc_html( 'Featured', 'positor' ) . '</span></small>';
			}
			?>	
			</h2>

		<a href="<?php the_permalink(); ?>" class="link-no-decoration lead">
		
			<?php
			positor_the_post_intro();
			?>
		</a>
		<a href="<?php the_permalink(); ?>" class="btn btn-outline-primary link-no-decoration white-space-normal">

			<?php
				esc_html_e( 'Read', 'positor' );
			?>
		</a>
	</div>
</article><!-- #post-## -->
