<?php
/**
 * Shows social links.
 *
 * @package Positor
 */

?>

<div>
	<?php
	$positor_social_link = get_theme_mod( 'positor_social_link' );
	if ( strlen( $positor_social_link['facebook'] ) > 4 ) :
		echo '<div class="d-inline-block p-2">';
		echo '<a href="' . esc_url( $positor_social_link['facebook'] ) . '" class="text-white"><i class="fa fa-2x fa-fw fa-facebook"></i></a>';
		echo '</div>';
	endif;

	if ( strlen( $positor_social_link['twitter'] ) > 4 ) :
		echo '<div class="d-inline-block p-2">';
		echo '<a href="' . esc_url( $positor_social_link['twitter'] ) . '" class="text-white"><i class="fa fa-2x fa-fw fa-twitter"></i></a>';
		echo '</div>';
	endif;

	if ( strlen( $positor_social_link['linkedin'] ) > 4 ) :
		echo '<div class="d-inline-block p-2">';
		echo '<a href="' . esc_url( $positor_social_link['linkedin'] ) . '" class="text-white"><i class="fa fa-2x fa-fw fa-linkedin"></i></a>';
		echo '</div>';
	endif;
?>
</div>
