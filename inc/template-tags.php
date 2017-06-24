<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Positor
 */

if ( ! function_exists( 'positor_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function positor_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'positor' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'positor' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'positor_the_author' ) ) :
/**
 * Gets author from custom field if exists, otherwise the_author
 */
function positor_the_author() {

			if ( get_post_meta(get_the_ID(), 'author_alias', true) ) :
					echo get_post_meta(get_the_ID(), 'author_alias', true);
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

			if ( get_post_meta(get_the_ID(), 'author_bio', true) ) :
					echo get_post_meta(get_the_ID(), 'author_bio', true);
			else :
				the_author_meta();
			endif;
		}
endif;


if ( ! function_exists( 'positor_the_excerpt' ) ) :
/**
 * Gets excerpt if defined, otherwise the teaser (text over the more tag).
 */
function positor_the_excerpt() {

			// Choose the manual excerpt if exists
			if ( has_excerpt() ) :
					the_excerpt();

			// Is there a more tag? Then use the teaser. ()
			elseif ( get_the_content('', false) != get_the_content('', true)  ) :
				global $more; 
				$more = 0;
				echo strip_tags(get_the_content( '', false ));
				$more = 1;
			
			// Otherwise make an automatic excerpt
			else :
				the_excerpt(40);

			endif;
		}
endif;

if ( ! function_exists( 'positor_the_post_intro' ) ) :
/**
 * Gets excerpt if defined, otherwise the teaser (text over the more tag).
 */
function positor_the_post_intro() {

			// Choose the manual excerpt if exists
			if ( has_excerpt() ) :
					the_excerpt();

			// Is there a more tag? Then use the teaser.
			elseif ( get_the_content('', false) != get_the_content('', true)  ) :
				global $more; 
				$more = 0;
				echo strip_tags(get_the_content( '', false ));
				$more = 1;

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
			echo '<div class="entry-categories"><span class="sr-only">'. esc_html__( 'Posted in ', 'positor' ) . '</span>';
			
			foreach ($categories_list as $category) {
				echo '<a href="' . get_category_link($category->term_id) . '" class="badge badge-primary mr-1">';
				echo $category->name;
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
			echo '<div class="entry-tags"><span class="sr-only">'. esc_html__( 'Tagged with ', 'positor' ) . '</span>';
			
			foreach ($tags_list as $tag) {
				echo '<a href="' . get_category_link($tag->tag_id) . '" class="badge badge-warning mr-1">';
				echo $tag->name;
				echo '</a>';
			
			}
			echo '</div>';
			}
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

if ( ! function_exists( 'positor_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function positor_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'positor' ) );
		if ( $categories_list && positor_categorized_blog() ) {
			printf( '<span class="cat-links"><span class="sr-only">' . esc_html__( 'Posted in ', 'positor' ) . '</span>' . '%1$s' . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'positor' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'positor' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

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
	if ( false === ( $all_the_cool_cats = get_transient( 'positor_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'positor_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so positor_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so positor_categorized_blog should return false.
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
