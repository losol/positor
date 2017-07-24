<?php
/**
 * WooCommerce support
 *
 * @link https://woocommerce.com/
 *
 * @package Positor
 */

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

add_action( 'woocommerce_before_main_content', 'my_theme_wrapper_start', 10 );
add_action( 'woocommerce_after_main_content', 'my_theme_wrapper_end', 10 );

/**
 * Add theme wrapper start.
 */
function my_theme_wrapper_start() {
	echo '<main id="main">';
}

/**
 * Add theme wrapper end.
 */
function my_theme_wrapper_end() {
	echo '</main>';
}

add_action( 'after_setup_theme', 'woocommerce_support' );
/**
 * Add theme support for woocommerce.
 */
function woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
