<?php
/**
 * The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Positor
 */

?>

<footer class="footer hidden-print">
<?php
if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ) :
	echo '<div class="bg-gray-light mt-5 py-3"><div class="container"><div class="row">';
	if ( is_active_sidebar( 'footer-1' ) ) :
		echo '<div class="col-md-4 align-self-start">';
		dynamic_sidebar( 'footer-1' );
		echo '</div>';
	endif;
	if ( is_active_sidebar( 'footer-2' ) ) :
		echo '<div class="col-md-4 d-block mx-auto">';
		dynamic_sidebar( 'footer-2' );
		echo '</div>';
	endif;
	if ( is_active_sidebar( 'footer-3' ) ) :
		echo '<div class="col-md-4 ml-auto">';
		dynamic_sidebar( 'footer-3' );
		echo '</div>';
	endif;
	echo '</div></div></div>';
endif;
?>

<div class="bg-gray-dark py-2">
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

<div class="bg-gray-dark py-2">
	<div class="container">
			<p class="text-inverse text-muted text-center ">
				<?php get_template_part( 'components/footer/site', 'bottom-line' ); ?>
			</p>
	</div>
</div>

</footer>

<?php wp_footer(); ?>

</body>
</html>
