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
		'posts_per_page' => '5',
		'meta_key'       => '_positor_featured_post',
		'meta_value'     => '1',
	);

	// The Query.
	$featured_query = new WP_Query( $featured );

	// Sets counter, and start the post loop.
	$count = (int) 0;

	if ( $featured_query -> found_posts <= 3 ) {
		while ( $featured_query -> have_posts() ) :
			$featured_query -> the_post();
			echo '<div class="col-md-12">';
			get_template_part( 'components/card/card-standard' );
			echo '</div>';
		endwhile;
	} else {
		while ( $featured_query -> have_posts() ) :
			$featured_query -> the_post();
			$count++;
			if ( 1 === $count ) {
				echo '<div class="col-md-8 d-flex align-items-stretch">';
				get_template_part( 'components/card/card-standard' );
				echo '</div>';
			}
			if ( $count >= 2 ) {
				echo '<div class="col-md-4 d-flex align-items-stretch">';
				get_template_part( 'components/card/card-standard' );
				echo '</div>';
			}
		endwhile;
	}
	 wp_reset_postdata();
?>

</div>
