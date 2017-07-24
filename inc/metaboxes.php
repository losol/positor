<?php
/**
 * Register metaboxes to show when editing posts.
 *
 * @package Positor
 */

?>

<?php
/**
 * Register metaboxes.
 *
 * @param array $meta_boxes Array of metaboxes.
 */
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
				'id' => $prefix . 'featured_post',
				'name' => esc_html__( 'Feature this on front page', 'positor' ),
				'type' => 'checkbox',
				'desc' => esc_html__( 'Place this on the top of the front page.', 'positor' ),
			),
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
			array(
				'id' => $prefix . 'hide_navbar',
				'type' => 'checkbox',
				'name' => esc_html__( 'Hide navigation bar', 'positor' ),
				'desc' => esc_html__( 'Will hide the navigation bar from this page/post.', 'positor' ),
			),
			array(
				'id' => $prefix . 'hide_intro_section',
				'type' => 'checkbox',
				'name' => esc_html__( 'Hide title, featured image, and intro text', 'positor' ),
				'desc' => esc_html__( 'This will hide the title, image and intro text.', 'positor' ),
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'positor_metabox' );
