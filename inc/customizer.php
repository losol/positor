<?php
/**
 * Positor Theme Customizer
 *
 * @package Positor
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function positor_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	/**
	 * Sanitize Checkbox.
	 *
	 * Accepts only "true" or "false" as possible values.
	 *
	 * @param string $input The checkbox to sanitize.
	 */
	function positor_sanitize_checkbox( $input ) {
		// Returns the checkbox as int.
		return filter_var( $input, FILTER_SANITIZE_NUMBER_INT );
	}

	/**
	* Adds admin settings
	*/
	$wp_customize->add_section( 'positor_admin_settings' , array(
		'title'      => __( 'Admin settings', 'positor' ),
		'priority'   => 300,
	) );

	// Simplify editor styles?
	$wp_customize->add_setting( 'positor_simplify_editor', array(
		'default'           => false,
		'sanitize_callback' => 'positor_sanitize_checkbox',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'positor_simplify_editor', array(
		'label'       => esc_html__( 'Show only common styles in editor', 'positor' ),
		'description' => esc_html__( 'Check this to show fewer paragraph styles in the post editor', 'positor' ),
		'section'     => 'positor_admin_settings',
		'settings'    => 'positor_simplify_editor',
		'type'        => 'checkbox',
		'priority'    => 10,
	) ) );

	/**
	* SECTION: Social media pages
	*/
	$wp_customize->add_section( 'positor_social_media_settings' , array(
		'title'      => __( 'Social media links', 'positor' ),
		'priority'   => 300,
	) );

	$wp_customize->add_setting( 'positor_social_link[facebook]', array(
		'default' => '',
		'sanitize_callback' => 'esc_attr',
	));
	$wp_customize->add_setting( 'positor_social_link[twitter]', array(
		'default' => '',
		'sanitize_callback' => 'esc_attr',
	));
	$wp_customize->add_setting( 'positor_social_link[linkedin]', array(
		'default' => '#',
		'sanitize_callback' => 'esc_attr',
	));

	$wp_customize->add_control('facebook', array(
		'label'      => esc_html( 'Facebook URL', 'positor' ),
		'section'    => 'positor_social_media_settings',
		'settings'   => 'positor_social_link[facebook]',
	));
	$wp_customize->add_control('twitter', array(
		'label'      => esc_html( 'Twitter URL', 'positor' ),
		'section'    => 'positor_social_media_settings',
		'settings'   => 'positor_social_link[twitter]',
	));
	$wp_customize->add_control('linkedin', array(
		'label'      => esc_html( 'LinkedIn URL', 'positor' ),
		'section'    => 'positor_social_media_settings',
		'settings'   => 'positor_social_link[linkedin]',
	));

}
add_action( 'customize_register', 'positor_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function positor_customize_preview_js() {
	wp_enqueue_script( 'positor_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'positor_customize_preview_js' );



