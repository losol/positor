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
	<div class="row">
	<p class="display-1">404<span class="text-muted">Fant ikke siden</span></p>
</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title pt-5"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'positor' ); ?></h1>
				</header>
				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'positor' ); ?></p>
					
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