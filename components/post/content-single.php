<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Positor
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( '' ); ?>>
	<header>
		<div class="col-md-12 py-3">
			<?php
				the_title( '<h1 class=" display-2">', '</h1>' );
			?>
			<?php if ( '' !== get_the_post_thumbnail() ) : ?>
				<div class="post-thumbnail py-1 ml-auto">		
						<?php
						the_post_thumbnail(
							'positor-featured-image',
							array(
								'class' => '',
							)
						);
						?>
						<p><?php echo esc_html( get_post( get_post_thumbnail_id() )->post_excerpt ); ?></p>
				</div>
			<?php endif; ?>
				<div><p class="lead">

						<?php positor_the_post_intro(); ?>

				</p></div>
			</div>
		</div>
	</header>


<article id="post-<?php the_ID(); ?>" <?php post_class( '' ); ?>>
	<header class="">
		<?php
			the_title( '<h1 class=" display-2">', '</h1>' );
		?>
		<?php if ( '' !== get_the_post_thumbnail() ) : ?>
			<div class="post-thumbnail py-1 ml-auto">		
					<?php
					the_post_thumbnail(
						'positor-featured-image',
						array(
							'class' => 'mx-auto d-block',
						)
					);
					?>
					<?php echo esc_html( get_post( get_post_thumbnail_id() )->post_excerpt ); ?>
			</div>
		<?php endif; ?>
</header>
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
</article>
