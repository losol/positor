<?php

function positor_metabox( $meta_boxes ) {
	$prefix = 'positor_';

	$meta_boxes[] = array(
		'id' => 'positor-metabox-post_and_page',
		'title' => esc_html__( 'Metainformation', 'positor' ),
		'post_types' => array( 'post', 'page' ),
		'context' => 'advanced',
		'priority' => 'high',
		'autosave' => true,
		'fields' => array(
			array(
				'id' => $prefix . 'featured_hero',
				'name' => esc_html__( 'Large featured image/video', 'positor' ),
				'type' => 'checkbox',
				'desc' => esc_html__( 'Let the featured image/video cover the whole screen when opening this page/post.', 'positor' ),
			),
			array(
				'id' => $prefix . 'featured_video_url',
				'type' => 'oembed',
				'name' => esc_html__( 'Featured video', 'positor' ),
				'desc' => esc_html__( 'If you want to embed a video and feature it on the top of the article add it here.', 'positor' ),
				'placeholder' => esc_html__( 'https://youtube.com/...', 'positor' ),
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'positor_metabox' );