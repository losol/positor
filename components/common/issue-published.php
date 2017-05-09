<?php // If issue publisShow which issue this was published in
if (get_post_meta(get_the_ID(), 'issue_published', true) != "") :
    echo '<p class="card-text text-small my-3">';
    echo esc_html_e( 'This article was published in issue ', 'positor' ) . get_post_meta(get_the_ID(), 'issue_published', true); 
    echo '</p>';
endif;
?>