<?php
/**
 * The navigation meny usually placed in the header.
 *
 * @package Positor
 */

?>

<?php
// Checks if the navbar should be hidden for this post/page.
$this_hide_navbar = get_post_meta( $post->ID, '_positor_hide_navbar', true );
if ( ! ( $this_hide_navbar && is_single() ) ) { ?>

<nav id="site-navigation" class="navbar navbar-toggleable-sm navbar-inverse bg-primary link-no-decoration">
	<div class="hidden-sm-down">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="pull-xs-left"><?php positor_the_custom_logo(); ?></a>
	</div>

	<button class="btn btn-link d-flex align-middle nav-item pull-left text-white text-uppercase hidden-md-up" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
		<i class="fa fa-fw fa-1_2x fa-bars" aria-hidden="true"></i>&nbsp;<span><?php esc_html_e( 'Menu', 'positor' ); ?></span>
	</button>

	<button class="btn btn-link nav-item pull-right navbar-toggler-right text-uppercase text-white text-nowrap" type="button" data-toggle="collapse" data-target="#searchform" aria-controls="searchform" aria-expanded="false" aria-label="Toggle navigation">
		<i class="fa fa-fw fa-1_2x fa-search" aria-hidden="true"></i>&nbsp;<?php esc_html_e( 'Search', 'positor' ); ?>
	</button>

	
<a id="site-title" class="navbar-brand px-1 hidden-sm-down site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
	<?php

	wp_nav_menu( array(
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
<div id="searchform" class="container-fluid collapse">
	<div class="row bg-gray-800">
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
