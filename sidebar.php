<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Positor
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<div class="col-md-3">
	<aside id="secondary" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside>
</div>

