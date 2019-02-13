<?php
/**
 * Shows related posts if Jetpack is installed, and Related posts is enabled.
 *
 * @package Positor
 */

?>

<?php
if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
	echo do_shortcode( '[jetpack-related-posts]' );
}
