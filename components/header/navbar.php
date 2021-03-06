<?php
/**
 * The navigation meny usually placed in the header.
 *
 * @package Positor
 */

?>

<?php
// Checks if the navbar should be hidden for this post/page.
$hide_navbar = false;
if ( is_single() || is_page() ) {
	$hide_navbar = get_post_meta( get_the_ID(), '_positor_hide_navbar', true );
}

if ( ! $hide_navbar ) {
	?>

<nav id="site-navigation" class="header-compact navbar navbar-dark bg-dark link-no-decoration">

	<div class="navbar-nav">
	<button class="btn btn-link pull-left text-light text-uppercase font-weight-200" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
	<i class="material-icons align-middle">menu</i>&nbsp;<span><?php esc_html_e( 'Menu', 'positor' ); ?></span>
	</button>
	</div>

	<div id="site-branding" class="d-block text-light justify-content-md-center">
			<?php positor_the_small_custom_logo(); ?>
	</div>

	<button class="btn btn-link pull-right text-uppercase text-light" type="button" data-toggle="collapse" data-target="#navbar-searchform" aria-controls="searchform" aria-expanded="false" aria-label="Toggle navigation">
	<i class="material-icons align-middle">search</i>&nbsp;<?php esc_html_e( 'Search', 'positor' ); ?>
	</button>
	<?php

	wp_nav_menu(
		array(
			'menu'            => 'top',
			'theme_location'  => 'menu-1',
			'container'       => 'div',
			'container_id'    => 'navbar-menu',
			'container_class' => 'collapse navbar-collapse',
			'menu_id'         => 'top_menu',
			'menu_class'      => 'navbar-nav mr-auto',
			'depth'           => 2,
			'walker'          => new Bootstrap_Nav_Walker(),
			'fallback_cb'     => 'Bootstrap_Nav_Walker::fallback',
		)
	);

	?>

</nav>
<div id="navbar-searchform" class="container-fluid collapse">
	<div class="row bg-dark">
		<div class="container p-4 w-100">
		<form role="search" method="get" class="form search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<div class="input-group">
			<input name="s" type="text" class="form-control" placeholder="<?php esc_html_e( 'What are you searching for?', 'positor' ); ?>">
			<span class="input-group-btn">
				<button type="submit" value="Search" class="btn btn-danger"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;</button>
			</span>
			</div>
		</form>
	</div>
	</div>
</div>
	<?php
} // End if().
?>
