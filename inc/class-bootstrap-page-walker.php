<?php
/**
 * Bootstrap Page Walker.
 *
 * @package positor
 */

/**
 * Class Name: Bootstrap_Page_Walker
 * Description: A custom WordPress page walker class to implement the Bootstrap 4 navigation style in a custom theme using the WordPress built in menu manager.
 * Author: Ole Kristian Losvik - @losol
 * Version: 2.0.5
 * Author URI: https://losol.io
 * GitHub Plugin URI: https://github.com/losol
 * GitHub Branch: master
 * License: GPL-3.0+
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 */
/* Check if Class Exists. */
if ( ! class_exists( 'Bootstrap_Page_Walker' ) ) {
	/**
	 * Bootstrap_Page_Walker class.
	 *
	 * @extends Walker_Page
	 */
	class Bootstrap_Page_Walker extends Walker_Page {

		/**
		* Outputs the beginning of the current level in the tree before elements are output.
		*
		* @since 2.1.0
		*
		* @see Walker::start_lvl()
		*
		* @param string $output Passed by reference. Used to append additional content.
		* @param int    $depth  Optional. Depth of page. Used for padding. Default 0.
		* @param array  $args   Optional. Arguments for outputting the next level.
		*                       Default empty array.
		*/
		public function start_lvl( &$output, $depth = 0, $args = array() ) {
			if ( isset( $args['item_spacing'] ) && 'preserve' === $args['item_spacing'] ) {
				$t = "\t";
				$n = "\n";
			} else {
				$t = '';
				$n = '';
			}
			$indent = str_repeat( $t, $depth );
			$output .= "{$n}{$indent}<ul class='dropdown-menu children'>{$n}";
		}

		/**
		* Outputs the end of the current level in the tree after elements are output.
		*
		* @since 2.1.0
		*
		* @see Walker::end_lvl()
		*
		* @param string $output Passed by reference. Used to append additional content.
		* @param int    $depth  Optional. Depth of page. Used for padding. Default 0.
		* @param array  $args   Optional. Arguments for outputting the end of the current level.
		*                       Default empty array.
		*/
		public function end_lvl( &$output, $depth = 0, $args = array() ) {
			if ( isset( $args['item_spacing'] ) && 'preserve' === $args['item_spacing'] ) {
				$t = "\t";
				$n = "\n";
			} else {
				$t = '';
				$n = '';
			}
			$indent = str_repeat( $t, $depth );
			$output .= "{$indent}</ul>{$n}";
		}

		/**
		* Outputs the beginning of the current element in the tree.
		*
		* @see Walker::start_el()
		* @since 2.1.0
		*
		* @param string  $output       Used to append additional content. Passed by reference.
		* @param WP_Post $page         Page data object.
		* @param int     $depth        Optional. Depth of page. Used for padding. Default 0.
		* @param array   $args         Optional. Array of arguments. Default empty array.
		* @param int     $current_page Optional. Page ID. Default 0.
		*/
		public function start_el( &$output, $page, $depth = 0, $args = array(), $current_page = 0 ) {
			if ( isset( $args['item_spacing'] ) && 'preserve' === $args['item_spacing'] ) {
				$t = "\t";
				$n = "\n";
			} else {
				$t = '';
				$n = '';
			}
			if ( $depth ) {
				$indent = str_repeat( $t, $depth );
			} else {
				$indent = '';
			}

			$css_class = array( 'nav-item', 'nav-item-' . $page->ID );
				

			if ( isset( $args['pages_with_children'][ $page->ID ] ) && $depth === 0 ) {
				$css_class[] = 'dropdown nav-item_has_children';
			}

			if ( ! empty( $current_page ) ) {
				$_current_page = get_post( $current_page );
				if ( $_current_page && in_array( $page->ID, $_current_page->ancestors ) ) {
					$css_class[] = 'active current_page_ancestor';
				}
				if ( $page->ID == $current_page ) {
					$css_class[] = 'active current_page_item';
				} elseif ( $_current_page && $page->ID == $_current_page->post_parent ) {
					$css_class[] = 'active current_page_parent';
				}
			} elseif ( get_option( 'page_for_posts' ) === $page->ID ) {
				$css_class[] = 'current_page_parent';
			}

			/**
			* Filters the list of CSS classes to include with each page item in the list.
			*
			* @since 2.8.0
			*
			* @see wp_list_pages()
			*
			* @param array   $css_class    An array of CSS classes to be applied
			*                              to each list item.
			* @param WP_Post $page         Page data object.
			* @param int     $depth        Depth of page, used for padding.
			* @param array   $args         An array of arguments.
			* @param int     $current_page ID of the current page.
			*/
			$css_classes = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );

			if ( '' === $page->post_title ) {
				/* translators: %d: ID of a post */
				$page->post_title = sprintf( __( '#%d (no title)' ), $page->ID );
			}

			$args['link_before'] = empty( $args['link_before'] ) ? '' : $args['link_before'];
			$args['link_after'] = empty( $args['link_after'] ) ? '' : $args['link_after'];

			$atts = array();
			$atts['href'] = get_permalink( $page->ID );
			$atts['class'] = 'nav-link';

			if ( $depth >= 1 ) {
				$atts['class'] = 'dropdown-item';
			}

			$atts['id'] = 'nav-link-' . $page->ID ;

			if ( isset( $args['pages_with_children'][ $page->ID ] ) && $depth === 0 ) {
				$atts['class'] = 'nav-link dropdown-toggle';
				$atts['data-toggle'] = 'dropdown';
				$atts['aria-haspopup'] = 'true';
				$atts['aria-expanded'] = 'false';
			}

			/**
			* Filters the HTML attributes applied to a page menu item's anchor element.
			*
			* @since 4.8.0
			*
			* @param array $atts {
			*     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
			*
			*     @type string $href The href attribute.
			* }
			* @param WP_Post $page         Page data object.
			* @param int     $depth        Depth of page, used for padding.
			* @param array   $args         An array of arguments.
			* @param int     $current_page ID of the current page.
			*/
			$atts = apply_filters( 'page_menu_link_attributes', $atts, $page, $depth, $args, $current_page );

			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value = esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}

			$output .= $indent . sprintf(
				'<li class="%s"><a%s>%s%s%s</a>',
				$css_classes,
				$attributes,
				$args['link_before'],
				/** This filter is documented in wp-includes/post-template.php */
				apply_filters( 'the_title', $page->post_title, $page->ID ),
				$args['link_after']
			);

			if ( ! empty( $args['show_date'] ) ) {
				if ( 'modified' == $args['show_date'] ) {
					$time = $page->post_modified;
				} else {
					$time = $page->post_date;
				}

				$date_format = empty( $args['date_format'] ) ? '' : $args['date_format'];
				$output .= " " . mysql2date( $date_format, $time );
			}
		}

		/**
		* Outputs the end of the current element in the tree.
		*
		* @since 2.1.0
		*
		* @see Walker::end_el()
		*
		* @param string  $output Used to append additional content. Passed by reference.
		* @param WP_Post $page   Page data object. Not used.
		* @param int     $depth  Optional. Depth of page. Default 0 (unused).
		* @param array   $args   Optional. Array of arguments. Default empty array.
		*/
		public function end_el( &$output, $page, $depth = 0, $args = array() ) {
			if ( isset( $args['item_spacing'] ) && 'preserve' === $args['item_spacing'] ) {
				$t = "\t";
				$n = "\n";
			} else {
				$t = '';
				$n = '';
			}
			$output .= "</li>{$n}";
		}

	}
}
