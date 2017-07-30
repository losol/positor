<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Positor
 */

?>
<?php

if ( ! function_exists( 'the_post_thumbnail_caption' ) ) :
	/**
	 * Gets the post thumbnail caption.
	 *
	 * Note that this will be replaced by WordPress Core function,
	 * which exists in WordPress >= 4.6.0
	 */
	function the_post_thumbnail_caption() {
		global $post;

		$thumbnail_post_id = get_post_thumbnail_id( $post->ID );
		$thumbnail_image = new WP_Query( array(
			'p' => $thumbnail_post_id,
			)
		);

		if ( $thumbnail_image && isset( $thumbnail_image[0] ) ) {
			return '<figcaption class="figure-caption">' . $thumbnail_image[0]->post_excerpt . '</figcaption>';
		} else {
			return;
		}
	}
endif;

if ( ! function_exists( 'positor_the_author' ) ) :
	/**
	 * Gets author from custom field if exists, otherwise the_author
	 */
	function positor_the_author() {
		if ( get_post_meta( get_the_ID(), 'author_alias', true ) ) :
			$author_alias = get_post_meta( get_the_ID(), 'author_alias', true );
			echo esc_html( $author_alias );
		else :
			the_author();
		endif;
	}
endif;

if ( ! function_exists( 'positor_the_author_bio' ) ) :
	/**
	 * Gets author bio from custom field if exists, otherwise the_author_meta
	 */
	function positor_the_author_bio() {

		if ( get_post_meta( get_the_ID(), 'author_bio', true ) ) :
			$author_bio = get_post_meta( get_the_ID(), 'author_bio', true );
			echo esc_html( $author_bio );
		else :
			the_author_meta();
		endif;
	}
endif;

if ( ! function_exists( 'positor_the_photographer' ) ) :
	/**
	 * Gets author bio from custom field if exists, otherwise the_author_meta
	 */
	function positor_the_photographer() {

		if ( get_post_meta( get_the_ID(), 'photographer_alias', true ) ) :
			$photographer_alias = get_post_meta( get_the_ID(), 'photographer_alias', true );
			echo esc_html( $photographer_alias );
		endif;
	}
endif;

if ( ! function_exists( 'positor_get_the_photographer' ) ) :
	/**
	 * Gets author bio from custom field if exists, otherwise the_author_meta
	 */
	function positor_get_the_photographer() {

		if ( get_post_meta( get_the_ID(), 'photographer_alias', true ) ) :
			$photographer_alias = get_post_meta( get_the_ID(), 'photographer_alias', true );
			return $photographer_alias;
		endif;
	}
endif;

if ( ! function_exists( 'positor_the_post_intro' ) ) :
	/**
	 * Gets excerpt if defined, otherwise the teaser (text over the more tag).
	 */
	function positor_the_post_intro() {

		if ( has_excerpt() ) :
			// Shows the manual excerpt if defined.
			echo esc_html( strip_tags( get_the_excerpt() ) );

		elseif ( get_the_content( '', false ) !== get_the_content( '', true ) ) :

			// Showing the teaser if the more tag exists.
			$content = get_post_field( 'post_content', get_the_ID() );
			$content_parts = get_extended( $content );
			echo esc_html( strip_tags( $content_parts['main'] ) );

			// Otherwise make an automatic excerpt.
		else :
			echo esc_html( strip_tags( get_the_excerpt() ) );

		endif;
	}
endif;

if ( ! function_exists( 'positor_the_categories' ) ) :
	/**
	 * Prints HTML with the categories, formatted as Bootstrap 4 badges.
	 */
	function positor_the_categories() {
		$categories_list = get_the_category();
		if ( $categories_list && positor_categorized_blog() ) {
			echo '<div class="entry-categories"><span class="sr-only">' . esc_html__( 'Posted in ', 'positor' ) . '</span>';

			foreach ( $categories_list as $category ) {
				echo '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" class="badge badge-primary mr-1">';
				echo esc_html( $category->name );
				echo '</a>';

			}
			echo '</div>';
		}
	}
endif;

if ( ! function_exists( 'positor_the_tags' ) ) :
	/**
	 * Prints HTML with the categories, formatted as Bootstrap 4 badges.
	 */
	function positor_the_tags() {
		$tags_list = get_the_tags();
		if ( $tags_list ) {
			echo '<div class="entry-tags"><span class="sr-only">' . esc_html__( 'Tagged with ', 'positor' ) . '</span>';

			foreach ( $tags_list as $tag ) {
				$tag_id = $tag->term_id;
				echo '<a href="' . esc_url( get_tag_link( $tag_id ) ) . '" class="badge badge-warning mr-1">';
				echo esc_html( $tag->name );
				echo '</a>';
			}
			echo '</div>';
		}
	}
endif;

if ( ! function_exists( 'positor_the_footer_bottom_text' ) ) :
	/**
	 * Prints HTML with the categories, formatted as Bootstrap 4 badges.
	 */
	function positor_the_footer_bottom_text() {
		$bottom_line = get_theme_mod( 'positor_footer_bottom_text' );

		if ( '' === $bottom_line ) {
			$bottom_line = 'Copyright <a href="' . esc_url( home_url() ) . '">' . get_bloginfo( 'name' ) . '</a>';
			$bottom_line .= ' &nbsp;&nbsp;&#124;&nbsp;&nbsp; Design <a href="https://losol.io/projects/positor/">losol.io</a>';
		}

		$allowed_html = array(
			'a' => array(
				'href' => array(),
				'title' => array(),
			),
			'br' => array(),
			'em' => array(),
			'strong' => array(),
		);

		// Returns stripped html.
		echo wp_kses( $bottom_line, $allowed_html );
	}
endif;


if ( ! function_exists( 'positor_the_comments' ) ) :
	/**
	 * Prints HTML with the categories, formatted as Bootstrap 4 badges.
	 */
	function positor_the_comments() {
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( esc_html__( 'Leave a comment', 'positor' ), esc_html__( '1 Comment', 'positor' ), esc_html__( '% Comments', 'positor' ) );
			echo '</span>';
		}
	}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function positor_categorized_blog() {
	$blog_categories_count = get_transient( 'positor_categories' );

	// Transient found?
	if ( empty( $blog_categories_count ) ) {

		// Create an array of all the categories that are attached to posts.
		$blog_categories_count = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$blog_categories_count = count( $blog_categories_count );

		set_transient( 'positor_categories', $blog_categories_count );

	}

	if ( $blog_categories_count > 1 ) {
		// This blog has more than 1 category.
		return true;
	} else {
		// This blog has only 1 category.
		return false;
	}
}

/**
 * Flush out the transients used in positor_categorized_blog.
 */
function positor_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'positor_categories' );
}
add_action( 'edit_category', 'positor_category_transient_flusher' );
add_action( 'save_post',     'positor_category_transient_flusher' );
