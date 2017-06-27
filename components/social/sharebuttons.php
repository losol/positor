<?php
/**
 * Template part for displaying sharing buttons for post/page.
 *
 * @package Positor
 */

?>
<h4 class="pt-5"><?php esc_html_e( 'Share if you like!', 'positor' ) ?></h4>
<div class="sharing-buttons pb-5">
    <?php
    get_template_part( 'components/social/sharebutton', 'facebook' );
    get_template_part( 'components/social/sharebutton', 'twitter' );
    ?>
</div>