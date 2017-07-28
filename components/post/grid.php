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
	$posts_count = $featured_query -> found_posts();

	$level_2_css_class = 'col-md-12';
	switch ( $posts_count ) {
		case 3:
			$level_2_css_class = 'col-md-6';
			break;
		case 4:
			$level_2_css_class = 'col-md-4';
			break;
	}

	while ( $featured_query -> have_posts() ) :
		$featured_query -> the_post();
		$count++;

		if ( 1 === $count ) {
			echo '<div class="col-md-12 d-flex align-items-stretch story-level-1">';
			get_template_part( 'components/card/card-standard' );
			echo '</div>';
		}
		if ( $count >= 2 ) {
			echo '<div class="' . esc_html( $level_2_css_class ) . ' d-flex align-items-stretch story-level-2">';
			get_template_part( 'components/card/card-standard' );
			echo '</div>';
		}
	endwhile;

	wp_reset_postdata();
?>

</div>
