<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Positor
 */

if ( ! is_active_sidebar( 'sidebar-frontpage' ) ) {
	return;
} ?>

<?php
dynamic_sidebar( 'sidebar-frontpage' );
