<?php
/**
 * Template part for displaying grid with featured_query posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Positor
 */

?>

<div class="row no-gutters d-flex align-items-stretch">
<?php

	// WP_Query arguments.
	$featured = array(
		'posts_per_page' => '4',
		'meta_key'       => '_positor_featured_post',
		'meta_value'     => '1',
	);

	// The Query.
	$featured_query = new WP_Query( $featured );

	// Sets counter, and start the post loop.
	$count = (int) 0;

	while ( $featured_query -> have_posts() ) :
		$featured_query -> the_post();
		$count++;
		if ( 1 === $count ) {
			echo '<div class="col-md-12 d-flex align-items-stretch">';
			get_template_part( 'components/card/card-standard' );
			echo '</div>';
		}
		if ( $count >= 2 ) {
			echo '<div class="col d-flex align-items-stretch">';
			get_template_part( 'components/card/card-standard' );
			echo '</div>';
		}
	endwhile;

	wp_reset_postdata();
?>

</div>
