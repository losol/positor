<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Positor
 */

?>

<?php get_header(); ?> 
<div class="container-fluid bg-warning">
	<div class="row py-3"><div class="container">
	<p class="pt-5 display-1 text-white">404 - <?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'positor' ); ?></span></p>
</div>
</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<div class="page-content">
					<p class="lead pt-5"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'positor' ); ?></p>
					<?php
						get_search_form();
						?>
				</div>
			</section>
		</main>
	</div>
</div>

</div>
<?php
get_footer();
