<?php
/**
 * _foundation Theme Widgets and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _foundation
 */


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
if( !function_exists( '_foundation_widgets_init' ) ) {
	function _foundation_widgets_init() {
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', '_foundation' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', '_foundation' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}
	add_action( 'widgets_init', '_foundation_widgets_init' );
}
