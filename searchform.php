<?php
/**
 * The search form for searching the website.
 *
 * @package Positor
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 * @since   1.0.0
 */
?>

<div>
	<form role="search" method="get" class="form search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div class="input-group">
			<span class="screen-reader-text"><?php esc_html_e( 'Search for?', 'positor' ); ?></span>
			<input name="s" type="text" class="form-control" placeholder="<?php esc_html_e( 'What are you searching for?', 'positor' ); ?>">
				<span class="input-group-btn">
					<button type="submit" value="Search" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;</button>
				</span>
			</input>
		</div>
	</form>
</div>
