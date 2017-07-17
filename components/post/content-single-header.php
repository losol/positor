<?php 
$this_hide_intro = get_post_meta($post->ID, 'positor_hide_intro_section', true);
if ( ! this_hide_intro ) { ?>

<header>
    <div class="bg-gray-light">
    <?php 
    $this_featured_hero = get_post_meta($post->ID, 'positor_featured_hero', true);
                if ($this_featured_hero) {
                    echo '<div class="">';
                }
                else {
                    echo '<div class="container py-3">';
                }
                ?>
            <?php
            // Find of if there is video or image to use as featured
            // Get the featured video variable. 
            $this_video_url = get_post_meta($post->ID, 'positor_featured_video_url', true);

            if (strpos($this_video_url, 'facebook.com')) {

                    echo '<div class="embed-responsive py-3">';
                    echo wp_oembed_get( $this_video_url );
                    echo '</div>';
                    
                }
            elseif ($this_video_url) {

                    echo '<div class="embed-responsive embed-responsive-16by9">';
                    echo wp_oembed_get( $this_video_url );
                    echo '</div>';
                    
                }
            // No video, any image?
            elseif (get_the_post_thumbnail()) {
                ?> 
                <figure class="post-thumbnail figure image w-100">
                        <?php the_post_thumbnail( 'positor-featured-image', array( 'class' => 'figure-img img-responsive w-100' ));?>
                        <figcaption class="figure-caption text-right text-muted px-3"><?php echo get_post(get_post_thumbnail_id())->post_excerpt;?>
                        </figcaption>
                </figure>
            <?php 
            } //endof elseif
            ?>
        </div>
        <div class="container">
            <?php // Show the title
            the_title( '<h1 class="py-1 my-1">', '</h1>' ); ?>

            <?php // Show the intro text ?>
            <div>
                <p class="lead py-3"><?php positor_the_post_intro();?></p></div>
            </div>
    </div>
</div>
</header>
<?php
} // End of if ! this_hide_intro