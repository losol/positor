<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Positor
 */

?>
	<div class="entry-content">		
			<?php
			// The content without the teaser.
			the_content( '', true );

			$this_hide_footer = get_post_meta( $post->ID, 'positor_hide_footer', true );
			if ( ! $this_hide_footer ) {
				// Multipage post pagination.
				wp_link_pages();

				// Social sharing.
				get_template_part( 'components/social/sharebuttons' );

				// Post navigation for prev/next posts.
				get_template_part( 'components/common/post-navigation', get_post_format() );
			}
			// Comments.
			get_template_part( 'components/common/comments' );
		?>
	</div>
