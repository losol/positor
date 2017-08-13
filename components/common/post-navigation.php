<?php
/**
 * Template for navigation to the previous or next post.
 *
 * @package Positor
 */

?>

<h4 class="pt-3"><?php esc_html_e( 'Read more?', 'positor' ) ?></h4>
<div class="post-navigation d-flex">
	<?php

	// Previous post.
	$prev_post = get_previous_post();
	if ( ! empty( $prev_post ) ) : ?>

	<a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" rel="prev" title="Navigate to the previous post" class="white-space-normal link-no-decoration btn btn-outline-primary m-1 col-6 d-flex align-items-stretch rounded-0">
	<span class="fa fa-lg fa-chevron-left d-flex align-items-center mx-2" aria-hidden="true"></span> 
	<?php echo esc_attr( $prev_post->post_title ); ?>
	</a>
	<?php endif; ?>

	<?php

	// Next post.
	$next_post = get_next_post();
	if ( ! empty( $next_post ) ) : ?>
																							
	<a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" rel="next" title="Navigate to the next post" class="white-space-normal link-no-decoration btn btn-outline-primary m-1 col-6 d-flex align-items-stretch flex-row-reverse">
		<span class="fa fa-lg fa-chevron-right d-flex align-items-center mx-2" aria-hidden="true"></span> 
		<?php echo esc_attr( $next_post->post_title ); ?>
	</a>
<?php endif; ?>
</div>




