<div class="d-flex">
    <?php 
        $positor_social_link = get_theme_mod( 'positor_social_link' );
        if (strlen($positor_social_link["facebook"] > 4)) :
            echo '<div class="bg-circle-outline d-inline-block">';
            echo '<a href="' . $positor_social_link["facebook"] . '" class="text-white"><i class="fa fa-2x fa-fw fa-facebook"></i></a>';
            echo '</div>';
        endif;

        if (strlen($positor_social_link["twitter"] > 4)) :
            echo '<div class="bg-circle-outline d-inline-block">';
            echo '<a href="' . $positor_social_link["twitter"] . '" class="text-white"><i class="fa fa-2x fa-fw fa-twitter"></i></a>';
            echo '</div>';
        endif;

        if (strlen($positor_social_link["linkedin"] > 4)) :
            echo '<div class="bg-circle-outline d-inline-block">';
            echo '<a href="' . $positor_social_link["linkedin"] . '" class="text-white"><i class="fa fa-2x fa-fw fa-linkedin"></i></a>';
            echo '</div>';
        endif;
?>
</div>