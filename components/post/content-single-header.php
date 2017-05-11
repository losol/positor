<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-12' ); ?>>
	<header>
            <?php
                the_title( '<h1 class=" display-2">', '</h1>' );
            ?>
            <?php if ( '' != get_the_post_thumbnail() ) : ?>
                <div class="post-thumbnail py-3 ml-auto">		
                        <?php the_post_thumbnail( 'positor-featured-image', array( 'class' => 'img-fluid' )); ?>
                        <p><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></p>
                </div>
            <?php endif; ?>
                <div><p class="lead">
                    <?php positor_the_excerpt(); ?>
					<?php // Get only the teaser first, by overriding more. 
						global $more; 
						$more = 0;
						echo strip_tags(get_the_content( '' ));
						$more = 1;
						?>
                </p></div>
            </div>
    </header>

