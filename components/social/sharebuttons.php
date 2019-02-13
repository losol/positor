<?php
/**
 * Template part for displaying sharing buttons for post/page.
 *
 * @package Positor
 */

?>
<h4 class="pt-5"><?php esc_html_e( 'Share if you like!', 'positor' ); ?></h4>
<div class="sharing-buttons pb-5">
	<a class="btn btn-outline-primary link-no-decoration m-1" target="_blank" role="button" href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>"><i class="fa fa-facebook" aria-hidden="true"></i>&nbsp;Facebook</a>
	<a class="btn btn-outline-primary link-no-decoration m-1" target="_blank" role="button" href="https://twitter.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-twitter" aria-hidden="true"></i>&nbsp;Twitter</a>
</div>
