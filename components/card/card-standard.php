<div class="card border-0 m-1 shadow curved">
	<a class="" href="<?php the_permalink(); ?>">
 	<?php the_post_thumbnail( 'positor-featured-image', array( 'class' => 'card-img-top' )); ?>
	</a>
    <div class="card-block">
        <h4 class="card-title"><?php the_title(); ?></h4>
        <p class="card-text"><?php positor_the_excerpt(); ?></p>
    </div>
</div>