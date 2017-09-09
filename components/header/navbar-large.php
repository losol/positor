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

if ( ! $hide_navbar ) { ?>
<div class="header-large bg-dark bg-navbar bg-inverse">
	<div class="container">
		<div class="row py-2">
			<div class="col-12 text-inverse text-center">
				<?php
					positor_the_custom_logo();
				?>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
			
			<nav id="site-navigation" class="navbar navbar-expand-lg navbar-dark link-no-decoration">			
				<button class="d-lg-none btn btn-link pull-left text-light text-uppercase font-weight-200" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
					<i class="fa fa-fw fa-1_2x fa-bars " aria-hidden="true"></i>&nbsp;<span><?php esc_html_e( 'Menu', 'positor' ); ?></span>
				</button>
			
				<div id="nav-centered" class="d-none d-md-block mr-auto text-light">
				<?php
					wp_nav_menu( array(
						'menu'            => 'top',
						'theme_location'  => 'menu-1',
						'container'       => 'div',
						'container_id'    => 'navbar-menu',
						'container_class' => 'navbar-collapse',
						'menu_id'         => 'top_menu',
						'menu_class'      => 'navbar-nav mr-auto',
						'depth'           => 2,
						'walker'          => new Bootstrap_Nav_Walker(),
						'fallback_cb'     => 'Bootstrap_Nav_Walker::fallback',
						)
					);
				
					?>
				</div>
			
				<button class="btn btn-link pull-right text-uppercase text-light" type="button" data-toggle="collapse" data-target="#navbar-searchform" aria-controls="searchform" aria-expanded="false" aria-label="Toggle navigation">
					<i class="fa fa-fw fa-1_2x fa-search" aria-hidden="true"></i>&nbsp;<?php esc_html_e( 'Search', 'positor' ); ?>
				</button>
			
				
			
			</div>
			</nav>
			</div>
		</div>
	</div>


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
