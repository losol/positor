<?php

 if(is_home() && !is_paged()) :
			$sticky = get_option( 'sticky_posts' );
			rsort( $sticky );

			$args = array(
				'post__in' => $sticky,
				'posts_per_page' => 10
				);

			$sticky_query = new WP_Query( $args );

			while ( $sticky_query->have_posts() ) : $sticky_query->the_post(); 
					get_template_part( 'components/post/content', 'sticky' );
			endwhile; 
endif;

             
?>