<?php
/**
 * Shows meta inforation about post/page.
 *
 * @package Positor
 */

?>

<div class="pt-4 pl-2">
	<?php // Show author_alias if assigned.
		echo '<div class="pl-4 m-2">';
		echo '<p class="position-absolute left"><i class="fa fa-2x fa-fw fa-pencil" aria-hidden="true"></i></p>';
		echo '<span class="sr-only">' . esc_html_e( 'Author: ', 'positor' ) . '</span>' . positor_the_author() . '<br>'; // WPCS: XSS OK.
		echo '<span class="text-muted">' . positor_the_author_bio() . '</span>'; // WPCS: XSS OK.
		echo '</p></div>';
	?>

	<?php // Show photographer_alias if assigned.
	if ( get_post_meta( get_the_ID(), 'photographer_alias', true ) !== "" ) :
		echo '<div class="pl-4 m-2 pt-2">';
		echo '<p class="position-absolute left"><i class="fa fa-2x fa-fw fa-camera-retro" aria-hidden="true"></i></p>';
		echo '<span class="sr-only">' . esc_html_e( 'Image: ', 'positor' ) . '</span>'. get_post_meta(get_the_ID(), 'photographer_alias', true); 
		echo '</p></div>';
	endif;
	?>
	<?php // Show published date.
	echo '<div class="pl-4 m-2"><p class="position-absolute left"><i class="fa fa-2x fa-fw fa-calendar" aria-hidden="true"></i></p>'. __( 'Published: ', 'positor' ) . get_the_date('');	
	// If updated date is different, show this as well.
	if ( get_the_date( '' ) !== get_the_modified_date( '' ) ) {
		echo esc_html_e( ', updated: ', 'positor' ) . get_the_modified_date( '' ); // WPCS: XSS OK.
	}

	echo '</small></p></div>';
		?>
	
	<?php // Show categories if has_category, and it is not the "uncategorized" category.
	$categories = wp_get_post_categories( $post->ID );
	if (has_category() && !( count( $categories ) == 1 && in_array( 1, $categories ))) :
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
