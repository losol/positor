<?php
/**
 * Positor functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package Positor
 */

if ( ! function_exists( 'positor_setup' ) ) {

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function positor_setup() {

		// Make theme available for translation.
		load_theme_textdomain( 'positor', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Declares that the theme is using <title> tag from WordPress.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		// @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/.
		add_theme_support( 'post-thumbnails' );

		// Sets image sizes.
		add_image_size( 'positor-featured-image', 1920, 1080, true );
		set_post_thumbnail_size( 1280, 720, true );

		// Registers theme navigation menu.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Top', 'positor' ),
			)
		);

		// Declares support for custom logo.
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 300,
				'width'       => 1200,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/**
		* Register custom post formats supported.
		*
		* @link https://codex.wordpress.org/Post_Formats
		*/
		add_theme_support( 'post-formats', array( 'video' ) );

	}
} // End if().

add_action( 'after_setup_theme', 'positor_setup' );
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function positor_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'positor_content_width', 940 );
}
add_action( 'after_setup_theme', 'positor_content_width', 0 );



/**
 * Registers widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function positor_widgets_init() {
	// Sidebar for most pages.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'positor' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Sidebar widgets', 'positor' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s py-3">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	// Sidebar for front page, categories and archive pages.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar on frontpage', 'positor' ),
			'id'            => 'sidebar-frontpage',
			'description'   => esc_html__( 'Widgets for sidebars on frontpage, category and archive pages', 'positor' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s py-3">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	// Three column footer - left.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer (Left)', 'positor' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'First footer widget area', 'positor' ),
			'before_widget' => '<div class="footer-widget left">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>',
		)
	);

	// Three column footer - center.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer (Center)', 'positor' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Second footer widget area', 'positor' ),
			'before_widget' => '<div class="footer-widget center">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>',
		)
	);

	// Three column footer - right.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer (Right)', 'positor' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Third footer widget area', 'positor' ),
			'before_widget' => '<div class="footer-widget right">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'positor_widgets_init', 1000 );

/**
 * Enqueue  styles.
 */
function positor_styles() {
	wp_enqueue_style( 'positor-bootstrap', get_template_directory_uri() . '/assets/stylesheets/positor.min.css' );
	wp_enqueue_style( 'positor-style', get_stylesheet_uri() );

}
add_action( 'wp_enqueue_scripts', 'positor_styles' );

/**
 * Enqueue scripts.
 */
function positor_scripts() {
	wp_enqueue_script( 'positor-scripts', get_template_directory_uri() . '/assets/js/positor.js' );
	wp_enqueue_script( 'positor-navigation', get_template_directory_uri() . '/assets/js/navigation.js' );
	wp_enqueue_script( 'positor-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'positor_scripts' );

/**
 * Disable automatic adding of Jetpack related posts.
 */
function positor_jetpackme_remove_rp() {
	if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
		$jprp     = Jetpack_RelatedPosts::init();
		$callback = array( $jprp, 'filter_add_target_to_dom' );
		remove_filter( 'the_content', $callback, 40 );
	}
}
add_filter( 'wp', 'positor_jetpackme_remove_rp', 20 );


/**
 * Hide sticky posts from loop as they are shown in featured grid.
 */
function positor_exclude_sticky_posts( $query ) {

	if ( $query->is_home() && $query->is_main_query() ) {
		$query->set( 'ignore_sticky_posts', 1 );
		$query->set( 'post__not_in', get_option( 'sticky_posts' ) );
	}
}
add_action( 'pre_get_posts', 'positor_exclude_sticky_posts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Commentform customization.
 */
require get_template_directory() . '/inc/commentform.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Add Bootstrap 4 nav walker
 */
require get_template_directory() . '/inc/class-bootstrap-nav-walker.php';

/**
 * Add Bootstrap 4 comment walker
 */
require get_template_directory() . '/inc/class-bootstrap-comment-walker.php';

/**
 * Add Bootstrap 4 page menu walker
 */
require get_template_directory() . '/inc/class-bootstrap-page-walker.php';

/**
 * Add WooCommerce support
 */
require get_template_directory() . '/inc/woocommerce.php';

/**
 * Recommends plugins to be used with theme.
 */
require get_template_directory() . '/inc/plugin-recommender.php';

/**
 * Add metaboxes.
 */
require get_template_directory() . '/inc/metaboxes.php';

/**
 * Add responsive videos
 */
require get_template_directory() . '/inc/video-embed.php';


/**
 * Add custom fields for post formats
 */
require get_template_directory() . '/inc/post-formats.php';


/**
 * Default sidebar content
 */
require get_template_directory() . '/inc/default-sidebars.php';

