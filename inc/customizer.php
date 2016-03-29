<?php
/**
 * _foundation Theme Customizer.
 *
 * @package _foundation
 */

if( ! function_exists( '_foundation_customize_register' ) ) {
	/**
	 * Add postMessage support for site title and description for the Theme Customizer.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	function _foundation_customize_register( $wp_customize ) {

		$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	}
}
add_action( 'customize_register' , '_foundation_customize_register' );

if( ! function_exists( '_foundation_customize_preview_js' ) ) {
	/**
	 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
	 */
	function _foundation_customize_preview_js() {

		wp_enqueue_script( '_foundation_customizer' , get_template_directory_uri() . '/js/customizer.js' , array( 'customize-preview' ) , '20151215' , true );
	}
}
add_action( 'customize_preview_init' , '_foundation_customize_preview_js' );
