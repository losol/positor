<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both
 * the existing comments and the comment form.
 *
 * @package Positor
 * @link    https://codex.wordpress.org/Template_Hierarchy
 */

// Check if the post is protected by a password.
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area my-3 d-print-none">

	<?php
	if ( have_comments() ) :
		?>
		<h3 class="comments-title py-3">
		<?php
		$comment_count = get_comments_number();
		if ( 1 === $comment_count ) {
			printf(
				/* translators: 1: title. */
				esc_html_e( 'One thought on &ldquo;%1$s&rdquo;', 'positor' ),
				'<span>' . get_the_title() . '</span>'
			);
		} else {
			printf( // WPCS: XSS OK.
				/* translators: 1: comment count number, 2: title. */
				esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $comment_count, 'comments title', 'positor' ) ),
				number_format_i18n( $comment_count ),
				'<span>' . get_the_title() . '</span>'
			);
		}
		?>
		</h3>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h3 class="screen-reader-text sr-only"><?php esc_html_e( 'Comment navigation', 'positor' ); ?></h3>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'positor' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'positor' ) ); ?></div>

			</div>
		</nav>
		<?php endif; // Check for comment navigation. ?>

		<div class="py-5">
		<?php
		wp_list_comments(
			array(
				'style'       => 'ol',
				'max_depth'   => '',
				'short_ping'  => true,
				'avatar_size' => '75',
				'walker'      => new Bootstrap_Comment_Walker(),
			)
		);
		?>

		</div><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h3 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'positor' ); ?></h3>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'positor' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'positor' ) ); ?></div>

			</div>
		</nav>
			<?php
		endif; // Check for comment navigation.

	endif; // Check for have_comments().


	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'positor' ); ?></p>
		<?php
	endif;

	comment_form();
	?>

</div>
