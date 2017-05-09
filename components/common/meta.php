
<div class="pt-4 pl-2">
    <?php // Show author_alias if assigned
    if (get_post_meta(get_the_ID(), 'author_alias', true) != "") :
        echo '<div class="pl-4 m-2">';
        echo '<p class="position-absolute left"><i class="fa fa-2x fa-fw fa-pencil" aria-hidden="true"></i></p>';
        echo '<span class="sr-only">' . __( 'Author: ', 'positor' ) . '</span>'. get_post_meta(get_the_ID(), 'author_alias', true); 
        if (get_post_meta(get_the_ID(), 'author_bio', true) != "") : 
            echo '<span class="text-muted">&nbsp;' . get_post_meta(get_the_ID(), 'author_bio', true) . '</span>';
        endif;
        echo '</p></div>';
    endif;
    ?>

    <?php // Show photographer_alias if assigned
    if (get_post_meta(get_the_ID(), 'photographer_alias', true) != "") :
        echo '<div class="pl-4 m-2">';
        echo '<p class="position-absolute left"><i class="fa fa-2x fa-fw fa-camera-retro" aria-hidden="true"></i></p>';
        echo '<span class="sr-only">' . __( 'Image: ', 'positor' ) . '</span>'. get_post_meta(get_the_ID(), 'photographer_alias', true); 
        echo '</p></div>';
    endif;
    ?>
    <?php // Show published date
        echo '<div class="pl-4 m-2"><p class="position-absolute left"><i class="fa fa-2x fa-fw fa-calendar" aria-hidden="true"></i></p>'. __( 'Published: ', 'positor' ) . get_the_date('j.n.Y');	
        // If updated date is different, show this as well
        if ( get_the_date( 'j.n.Y' ) !== get_the_modified_date( 'j.n.Y' ) ) {
                echo __( ', updated: ', 'positor' ) . get_the_modified_date('j.n.Y')  ;
            }

        echo '</small></p></div>';
        ?>
    
    <?php // Show categories
    if (has_category()) :
        echo '<div class="pl-4 m-2">';
        echo '<p class="position-absolute left"><i class="fa fa-2x fa-fw fa-bookmark-o" aria-hidden="true"></i></p>';
        echo '<span class="sr-only">' . __( 'Posted in: ', 'positor' ) . '</span>'. positor_the_categories(); 
        echo '</p></div>';
    endif;
    ?>

    <?php // Show categories
    if (has_tag()) :
        echo '<div class="pl-4 m-2">';
        echo '<p class="position-absolute left"><i class="fa fa-2x fa-fw fa-tag" aria-hidden="true"></i></p>';
        echo '<span class="sr-only">' . __( 'Posted in: ', 'positor' ) . '</span>'. positor_the_tags(); 
        echo '</p></div>';
    endif;
    ?>

 </div>
