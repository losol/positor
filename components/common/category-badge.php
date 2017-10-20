	<?php // Show categories badges if has_category, and it is not the "uncategorized" category.
	$categories = wp_get_post_categories( $post->ID );
	if ( has_category() && ! ( count( $categories ) === 1 && in_array( 1, $categories, true )) ) :
		echo '<div class="py-1"><p>';
		echo '<span class="sr-only">' . esc_html_e( 'Category: ', 'positor' ) . '</span>' . positor_the_categories(); // WPCS: XSS OK.
		echo '</p></div>';
	endif;
	?>
