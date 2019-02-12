<?php
/**
 * Adds classes to embedded videos to get them bootstrap responsive
 *
 * @link https://lorut.no/responsive-youtube-vimeo-embed-bootstrap-roots-io-wordpress/
 *
 * @package Positor
 */

/**
 * Adds classes to embedded videos to get them bootstrap responsive
 *
 * @param string $html Oembed html to filter.
 */
function bootstrap_wrap_oembed( $html ) {
	// Strip width and height #1.
	$html = preg_replace( '/(width|height)="\d*"\s/', '', $html );

	// Wrap in div element and return #3 and #4.
	return'<div class="embed-responsive embed-responsive-16by9 my-2">' . $html . '</div>';
}
add_filter( 'embed_oembed_html', 'bootstrap_wrap_oembed', 10, 1 );
