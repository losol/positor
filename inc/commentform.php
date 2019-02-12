<?php
/**
 * Template part for comment form.
 *
 * @package Positor
 */

?>
<?php

add_filter( 'comment_form_default_fields', 'bootstrap4_comment_form_fields' );

/**
 * Bootstrap comment form fields.
 *
 * @param array $fields Form fields.
 */
function bootstrap4_comment_form_fields( $fields ) {
	$commenter = wp_get_current_commenter();

	$req      = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;

	$fields = array(
		'author' => '<div class="form-group comment-form-author"><label for="author">' . esc_html( 'Name', 'positor' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
					'<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
		'email'  => '<div class="form-group comment-form-email"><label for="email">' . esc_html( 'Email', 'positor' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
					'<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
		'url'    => '<div class="form-group comment-form-url"><label for="url">' . esc_html( 'Website', 'positor' ) . '</label> ' .
					'<input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>',
	);

	return $fields;
}

add_filter( 'comment_form_defaults', 'bootstrap4_comment_form' );

/**
 * Comment form fields.
 *
 * @param array $args Form arguments.
 */
function bootstrap4_comment_form( $args ) {
	$args['comment_field'] = '<div class="form-group comment-form-comment">
			<label for="comment">' . _x( 'Comment', 'noun', 'positor' ) . '</label> 
			<textarea class="form-control" id="comment" name="comment" cols="45" rows="6" aria-required="true"></textarea>
		</div>';
	$args['class_submit']  = 'btn btn-default';

	return $args;
}
