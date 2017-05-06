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
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/**
	* Adds a section for settings links to social media pages
	*/
	$wp_customize->add_section( 'positor_social_media_settings' , array(
		'title'      => __( 'Social media links', 'positor' ),
		'priority'   => 300,
	) );

	$wp_customize->add_setting( 'positor_facebook_link[url]', array(
		'default'       => '',
	) );

	$wp_customize->add_control( 'positor_facebook_link[url]', array(
		'label'         => __( 'Face page:', 'positor' ),
		'section'       => 'positor_social_media_settings',
		'type'          => 'text',
		'priority'      => 1,
	) );

	$wp_customize->add_setting( 'positor_twitter_link[url]', array(
		'default'       => '',
	) );

	$wp_customize->add_control( 'positor_twitter_link[url]', array(
		'label'         => __( 'Twitter page:', 'positor' ),
		'section'       => 'positor_social_media_settings',
		'type'          => 'text',
		'priority'      => 2,
	) );

		$wp_customize->add_setting( 'positor_linkedin_link[url]', array(
		'default'       => '',
	) );

	$wp_customize->add_control( 'positor_linkedin_link[url]', array(
		'label'         => __( 'LnkedIn page:', 'positor' ),
		'section'       => 'positor_social_media_settings',
		'type'          => 'text',
		'priority'      => 3,
	) );
}
add_action( 'customize_register', 'positor_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function positor_customize_preview_js() {
	wp_enqueue_script( 'positor_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'positor_customize_preview_js' );
