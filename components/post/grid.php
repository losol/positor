<div class="row no-gutters">
<?php
    // WP_Query arguments
    $args = array(
        'nopaging'               => true,
        'posts_per_page'         => '6',
        'tag'                    => 'featured',
        'meta_key'               => '_thumbnail_id', //only posts with featured images
        );

    // The Query
    $featured = new WP_Query( $args );
	
	//Set counter, and start the post loop
    $count = (int)0;
    if ($featured -> found_posts < 3) {
        while ($featured -> have_posts()) : $featured -> the_post();
            echo '<div class="col-12">';
            get_template_part( 'components/card/card-standard' );
            echo '</div>';
        endwhile;
    }
    else
    {
        while ($featured -> have_posts()) : $featured -> the_post();
            $count++;
            if($count == 1)
            { 
                echo '<div class="col-md-8 d-flex align-items-stretch">';
                get_template_part( 'components/card/card-standard' );
                echo '</div>';
            }
            if($count >= 2)
            { 
                echo '<div class="col-md-4 d-flex align-items-stretch">';
                get_template_part( 'components/card/card-standard' );
                echo '</div>';
            }
            
        endwhile; 
    }
 wp_reset_postdata();  
?>

</div>
