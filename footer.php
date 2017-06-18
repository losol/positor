<?php
/**
 * The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Positor
 */

?>

<footer class="footer pt-5 hidden-print">

<?php


if ( is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') ) :
	echo '<div class="bg-lightgray mt-5 py-3"><div class="container"><div class="row">';
	if (is_active_sidebar('footer-1')) :
		dynamic_sidebar('footer-1');
	endif;
		if (is_active_sidebar('footer-2')) :
		dynamic_sidebar('footer-2');
	endif;
	if (is_active_sidebar('footer-3')) :
		dynamic_sidebar('footer-3');
	endif;
	echo '</div></div></div>';
endif; // End of if sidebar heck
?>

<div class="bg-darkgray py-2">
	<div class="container">
		<div class="row">
			<div class="col-md-8 text-inverse">
				<?php get_template_part( 'components/footer/site', 'info' ); ?>
			</div>
			<div class="col-md-4 text-inverse text-right">
				<?php get_template_part( 'components/footer/site', 'social-links' ); ?>
			</div>
		</div>
	</div>
</div>

</footer>

<?php wp_footer(); ?>

</body>
</html>
