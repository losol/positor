<?php
	$this_hide_navbar = get_post_meta($post->ID, 'positor_hide_navbar', true);
	if ( ! this_hide_navbar ) { ?>
<nav id="site-navigation" class="navbar navbar-toggleable-sm navbar-inverse bg-primary link-no-decoration">
   <div class="hidden-sm-down">
   <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="pull-xs-left"><?php positor_the_custom_logo(); ?></a>
   </div>

   <button class="btn-link text-white text-uppercase hidden-md-up" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
     <i class="fa fa-bars" aria-hidden="true"></i>&nbsp;<span><?php esc_html_e( 'Menu', 'positor' ); ?></span>
   </button>

   <a id="site-title" class="navbar-brand px-1 hidden-sm-down site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
   <?php
   wp_nav_menu([
     'menu'            => 'top',
     'theme_location'  => 'menu-1',
     'container'       => 'div',
     'container_id'    => 'bs4navbar',
     'container_class' => 'collapse navbar-collapse',
     'menu_id'         => 'top_menu',
     'menu_class'      => 'navbar-nav mr-auto',
     'depth'           => 2,
     'walker'          => new bs4navwalker(),
    'fallback_cb'     => 'bs4navwalker::fallback',
   ]);
   ?>

    <button class="btn-link text-uppercase text-white text-nowrap pull-xs-right" type="button" data-toggle="collapse" data-target="#searchform" aria-controls="searchform" aria-expanded="false" aria-label="Toggle navigation">
     <i class="fa fa-search" aria-hidden="true"></i>&nbsp;<span class="sr-only"><?php esc_html_e( 'Search', 'positor' ); ?></span>
   </button>
 </nav>

<div id="searchform" class="container-fluid collapse">
   <div class="row bg-inverse">
      <div class="container m-0 p-4 text-white">
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
  <?php } ?>