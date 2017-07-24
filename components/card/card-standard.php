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
		'class' => 'card-img-top img-responsive',
	) );
	?>
	</a>
	<div class="card-block">
		<h4 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		<p class="card-text"><a class="link-no-decoration" href="<?php the_permalink(); ?>"><?php positor_the_post_intro(); ?></a></p>
	</div>
</div>
