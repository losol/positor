<nav id="site-navigation" role="navigation" class="navbar navbar-toggleable-md navbar-light bg-faded">
   <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="<?php esc_html_e( 'Toggle navigation', 'positor' ); ?>">
     <span class="navbar-toggler-icon"></span>
   </button>
   <a class="navbar-brand" href="#"><?php bloginfo( 'name' ); ?></a>
   <?php
   wp_nav_menu([
     'menu'            => 'top',
     'theme_location'  => 'menu-1',
     'container'       => 'div',
     'container_id'    => 'main-navbar',
     'container_class' => 'collapse navbar-collapse',
     'menu_id'         => 'top-menu',
     'menu_class'      => 'navbar-nav mr-auto',
     'depth'           => 2,
     'fallback_cb'     => 'bs4navwalker::fallback',
     'walker'          => new bs4navwalker()
   ]);
   ?>
 </nav>