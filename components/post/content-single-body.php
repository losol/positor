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
			<?php // The content without the teaser
			the_content( '', $strip_teaser = true)
			?> 
	</div>
		<footer class="entry-footer">
	</footer><!-- .entry-footer -->
</article>
