	<header>
            <?php
                the_title( '<h1 class=" display-2 pt-5">', '</h1>' );
?>
            <?php    
            // Get the featured video variable. 
            $this_video_url = get_post_meta($post->ID, 'positor_featured_video_url', true);

if ($this_video_url) {
		echo '<div class="embed-responsive">';
		echo wp_oembed_get( $this_video_url );
		echo '</div>';
		
	}
else {
	if ( '' != get_the_post_thumbnail() ) : ?>
                <figure class="post-thumbnail figure image py-3">
                        <?php the_post_thumbnail( 'positor-featured-image', array( 'class' => 'figure-img img-fluid' ));
?>
                        <figcaption class="figure-caption text-right text-muted"><?php echo get_post(get_post_thumbnail_id())->post_excerpt;
?></figcaption>
                </figure>
            <?php endif;
?>
            <?php
}
//end of other post formats
            ?>
                <div><p class="lead py-3">
                    <?php positor_the_post_intro();
?>
                </p></div>
            </div>
    </header>
