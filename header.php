<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Positor
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<a class="skip-link sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'positor' ); ?></a>

	<div class="container ad top-banner text-center py-1">
		<?php 
		if( function_exists('the_ad_placement') ) { the_ad_placement('top-banner'); }
		?>
	</div>
	
	<header id="header" class="site-header d-print-none">

	<?php
	/**
	 * Choose large or compact header.
	 * Shows large header on front page if enabled.
	 */
	if ( is_home() && is_front_page() && get_theme_mod( 'positor_header_large_on_front' )) {
		get_template_part( 'components/header/navbar-large' );
	} else {
		get_template_part( 'components/header/navbar' );
	}
	?>

	
	</header>
