<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-12' ); ?>>
	<header>
            <?php
                the_title( '<h1 class=" display-2 py-3">', '</h1>' );
            ?>
            <?php
            // Post format: video
            if ( has_post_format( 'video' )) {
                // Get the video URL and put it in the $video variable
                $this_video_url = get_post_meta($post->ID, 'video_url', true);

                if ($this_video_url != '') {
                    // If from facebook embed video via oEmbed
                    if (strpos($this_video_url, 'facebook.com/')) {
                        // Add  wrapper and embed video via oEmbed
                        echo '<div class="embed-responsive">';
                        echo wp_oembed_get( $this_video_url ); 
                        echo '</div>';
                    
                    }
                    else {
                        // Add responsive wrapper and embed video via oEmbed
                        echo '<div class="embed-responsive embed-responsive-16by9">';
                        echo wp_oembed_get( $this_video_url ); 
                        echo '</div>';
                    }
                }
            }
            // Post format: other
            else {
            if ( '' != get_the_post_thumbnail() ) : ?>
                <div class="post-thumbnail py-3 ml-auto">		
                        <?php the_post_thumbnail( 'positor-featured-image', array( 'class' => 'img-fluid' )); ?>
                        <p><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></p>
                </div>
            <?php endif; ?>
            <?php
            } //end of other post formats
            ?>

                <div><p class="lead py-3">
                    <?php positor_the_post_intro(); ?>
                </p></div>
            </div>
    </header>

