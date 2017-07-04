<?php
function positor_get_meta_box( $meta_boxes ) {
	$prefix = 'positor_';

	$meta_boxes[] = array(
		'id' => 'positor-post-metabox',
		'title' => esc_html__( 'Metadata', 'positor' ),
		'post_types' => array( 'post', 'page' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => true,
		'fields' => array(
			array(
				'id' => $prefix . 'video_url',
				'type' => 'url',
				'name' => esc_html__( 'Video URL', 'positor' ),
				'placeholder' => esc_html__( 'https://youtube.com....', 'positor' ),
			),
			array(
				'id' => $prefix . 'fieldset_text_2',
				'type' => 'fieldset_text',
				'name' => esc_html__( 'Fieldset Text', 'positor' ),
				'desc' => esc_html__( 'fieldeset', 'positor' ),
				'rows' => 2,
                				'options' => array(
					'name'    => __( 'Name', 'your-prefix' ),
					'address' => __( 'Address', 'your-prefix' ),
					'email'   => __( 'Email', 'your-prefix' ),
				),
				'clone' => true,
			),
			array(
				'id' => $prefix . 'autocomplete_3',
				'type' => 'autocomplete',
				'name' => esc_html__( 'Auto Complete', 'positor' ),
				'placeholder' => '',
			),
			array(
				'id' => $prefix . 'text_list_4',
				'type' => 'text_list',
				'name' => esc_html__( 'Text List', 'positor' ),
			),
			array(
				'id' => $prefix . 'oembed_5',
				'type' => 'oembed',
				'name' => esc_html__( 'oEmbed', 'positor' ),
				'desc' => esc_html__( 'oEmbed description', 'positor' ),
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'positor_get_meta_box' );