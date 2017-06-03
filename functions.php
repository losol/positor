<?php

/**
* Positor functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Positor
 */

if ( ! function_exists( 'positor_setup' ) ) :

/**
* Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function positor_setup() {
	
	/*
	* Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on components, use a find and replace
	 * to change 'positor' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'positor', get_template_directory() . '/languages' );
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'positor-featured-image', 1200, 430, true );
    set_post_thumbnail_size( 1200, 430, true );
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Top', 'positor' ),
		) );
	/**
	 * Add support for core custom logo.
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 400,
		'flex-width'  => true,
		'flex-height' => true,
	) );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	/**
	* Register custom post formats supported.
	*
	* @link https://codex.wordpress.org/Post_Formats
	*/
	add_theme_support( 'post-formats', array( 'video') );
	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'positor_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
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
	* Return early if Custom Logos are not available.
	 *
	 * @todo Remove after WP 4.7
	 */
	function positor_the_custom_logo() {
		if ( ! function_exists( 'the_custom_logo' ) ) {
			return;
		}
		else {
			the_custom_logo();
		}
	}
	
	
	
	/**
	* Register widget area.
	 *
	 * @link https://d	eveloper.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
	 */
	function positor_widgets_init() {
		register_sidebar( array(
				'name'          => esc_html__( 'Sidebar', 'positor' ),
				'id'            => 'sidebar-1',
				'description'   => '',
				'before_widget' => '<section id="%1$s" class="widget %2$s my-5">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			) );
	}
	add_action( 'widgets_init', 'positor_widgets_init' );
	
	
	/**
	* Enqueue scripts and styles.
	 */
	function positor_scripts() {
		wp_enqueue_style( 'positor-bootstrap', get_template_directory_uri().'/assets/stylesheets/positor.min.css' );
		wp_enqueue_style( 'positor-style', get_stylesheet_uri() );
		wp_enqueue_script( 'positor-scripts', get_template_directory_uri() . '/assets/js/positor.min.js', array( 'jquery' ), '20170529', false );
		wp_enqueue_script( 'positor-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );
		
		wp_enqueue_script( 'positor-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );
		
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'positor_scripts' );
	
	
	
	/**
	* Sanitize Checkbox
	 * Accepts only "true" or "false" as possible values.
	
	*/
	
	function sanitize_checkbox( $input ) {
		return ( $input === true ) ? true : false;
	}
	
	
	
	/**
	* Hide Custom fields menu
	*/
	if( get_theme_mod( 'positor_hide_acf' ) == true) {
		if( class_exists('Acf') )
		{
			define( 'ACF_LITE' , true );
		}
	}
	
	
	
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
	* Load Jetpack compatibility file.
	 */
	require get_template_directory() . '/inc/jetpack.php';
	
	
	/**
	* Add Bootstrap 4 nav walker
	 */
	require get_template_directory() . '/inc/bs4navwalker.php';
	
	
	/**
	* Add WooCommerce support
	 */
	require get_template_directory() . '/inc/woocommerce.php';
	
	
	/**
	* Check for required plugins
	 */
	require_once get_template_directory() . '/inc/plugins.php';
	
	
	/**
	* Add responsive videos
	 */
	require get_template_directory() . '/inc/video-embed.php';
	
	
	/**
	* Add custom fields for post formats
	 */
	require get_template_directory() . '/inc/post-formats.php';
	
	