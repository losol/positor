<?php
/**
 * Sets up post formats.
 *
 * @link https://jetpack.me/
 *
 * @package Positor
 */

?> 
<?php

if ( function_exists( 'register_field_group' ) ) {
	register_field_group(
		array(
			'id'         => 'acf_video',
			'title'      => 'Video',
			'fields'     => array(
				array(
					'key'           => 'field_592f0e12087ae',
					'label'         => esc_html__( 'Video Url', 'positor' ),
					'name'          => 'video_url',
					'type'          => 'text',
					'instructions'  => esc_html__( 'Url for the video you want to embed. ', 'positor' ),
					'default_value' => '',
					'placeholder'   => 'https://youtube.com/...',
					'prepend'       => '',
					'append'        => '',
					'formatting'    => 'html',
					'maxlength'     => '',
				),
			),
			'location'   => array(
				array(
					array(
						'param'    => 'post_format',
						'operator' => '==',
						'value'    => 'video',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options'    => array(
				'position'       => 'acf_after_title',
				'layout'         => 'no_box',
				'hide_on_screen' => array(),
			),
			'menu_order' => 0,
		)
	);
} // End if().
