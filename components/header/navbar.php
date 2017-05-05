<nav id="site-navigation" role="navigation" class="navbar navbar-toggleable-sm navbar-inverse bg-primary link-no-decoration">
   
   <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-left"><?php positor_the_custom_logo(); ?></a>
   
   <button class="btn-link text-white text-uppercase text-nowrap hidden-md-up" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
     <i class="fa fa-bars" aria-hidden="true"></i>&nbsp;<span><?php esc_html_e( 'Menu', 'positor' ); ?></span>
   </button>

   
   <a class="navbar-brand site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
   <?php
   wp_nav_menu([
     'menu'            => 'top',
     'theme_location'  => 'menu-1',
     'container'       => 'div',
     'container_id'    => 'main-navbar',
     'container_class' => 'collapse navbar-collapse',
     'menu_id'         => 'bs4navbar',
     'menu_class'      => 'navbar-nav mr-auto',
     'depth'           => 2,
     'fallback_cb'     => 'bs4navwalker::fallback',
     'walker'          => new bs4navwalker()
   ]);
   ?>
 </nav>