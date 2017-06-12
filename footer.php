<?php
/**
 * The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Positor
 */

?>

<footer class="mt-5 hidden-print">

<div class="container-fluid bg-inverse mt-5 py-3">
	<div class="container">
		<div class="row">
			<div class="col-md-8 text-white">
				<?php get_template_part( 'components/footer/site', 'info' ); ?>
			</div>
			<div class="col-md-4 text-right">
				<?php get_template_part( 'components/footer/site', 'social-links' ); ?>
			</div>
		</div>
	</div>
</div>


<div class="container-fluid bg-darkgray py-2 m-0">
	<div class="container text-center">
		<p class="text-white"><?php get_template_part( 'components/footer/site', 'copyright' ); ?></p>
	</div>
</div>

</footer>

<?php wp_footer(); ?>

</body>
</html>
