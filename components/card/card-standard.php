<?php
/**
 * Will generate a card layout of the current post.
 *
 * @package Positor
 */

?>
<div class="bg-white m-1 shadow curved flex-grow">
	<a href="<?php the_permalink(); ?>">
	<?php
	the_post_thumbnail( 'positor-featured-image', array(
		'class' => 'card-img-top img-fluid w-100',
	) );
	?>
	</a>
	<div class="card-block">
		<h3 class="card-title display-3"><a class="link-no-decoration" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		<div class="card-text lead">
			<a class="link-no-decoration" href="<?php the_permalink(); ?>">
			<?php positor_the_post_intro(); ?>
			</a>
		</div>
	</div>
</div>
