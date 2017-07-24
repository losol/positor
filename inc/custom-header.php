<?php
/**
 * Implementation of the Custom Header feature.
 *
 * @link http://codex.wordpress.org/Custom_Headers
 * @package Positor
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses positor_header_style()
 */
function positor_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'positor_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 2000,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'positor_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'positor_custom_header_setup' );

if ( ! function_exists( 'positor_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog
	 *
	 * @see positor_custom_header_setup()
	 */
	function positor_header_style() {
		$header_text_color = get_header_textcolor();

		/*
		* If no custom options for text are set, use backup.
		*/
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( 'blank' === $header_text_color ) :
		?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php
			// If the user has set a custom color for the text use that.
			else :
		?>
			.site-title a,
			.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
		<?php endif; ?>
		</style>
		<?php
	}
endif; // positor_header_style.
