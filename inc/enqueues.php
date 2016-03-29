<?php
/**
 * _foundation Theme Enqueues and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _foundation
 */

if( ! function_exists( '_foundation_scripts' ) ) {
	/**
	 * Enqueue scripts.
	 */
	function _foundation_scripts() {

		wp_enqueue_script( '_foundation-script' , get_stylesheet_directory_uri() . '/js/app' . (WP_DEBUG ? '' : '.' . _FOUNDATION_VERSION . '.min' ) . '.js' , [ 'jquery' ] , _FOUNDATION_VERSION , true );

		if( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}
add_action( 'wp_enqueue_scripts' , '_foundation_scripts' );

if( ! function_exists( '_foundation_styles' ) ) {
	/**
	 * Enqueue styles.
	 */
	function _foundation_styles() {

		wp_enqueue_style( '_foundation-style' , get_stylesheet_directory_uri() . '/css/app.' . _FOUNDATION_VERSION . '.min.css' , [ ] , _FOUNDATION_VERSION , 'all' );

	}
}
add_action( 'wp_enqueue_scripts' , '_foundation_styles' );
