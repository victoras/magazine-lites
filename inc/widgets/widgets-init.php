<?php
/**
 * Register widget areas and widgets
 *
 * @package WordPress
 * @subpackage Magazine
 * @since Magazine 1.0
 * @author WPlook Studio
 */

/*-----------------------------------------------------------
	Register widget areas
-----------------------------------------------------------*/

if( !function_exists( 'wplook_widgets_init' ) ) {

	function wplook_widgets_init() {


		// sidebar
		register_sidebar( array(
			'name'          => esc_html__( 'Homepage - Widget Area', 'magazine-lites' ),
			'id'            => 'home-1',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-main">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		// sidebar
		register_sidebar( array(
			'name'          => esc_html__( 'Page - Widget Area', 'magazine-lites' ),
			'id'            => 'page-1',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-main">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		// sidebar
		register_sidebar( array(
			'name'          => esc_html__( 'Posts - Widget Area', 'magazine-lites' ),
			'id'            => 'post-1',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-main">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		// sidebar
		register_sidebar( array(
			'name'          => esc_html__( 'Contact - Widget Area', 'magazine-lites' ),
			'id'            => 'contact-1',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-main">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		// sidebar
		register_sidebar( array(
			'name'          => esc_html__( 'Custom - Widget Area', 'magazine-lites' ),
			'id'            => 'custom-1',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-main">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		// sidebar
		register_sidebar( array(
			'name'          => esc_html__( 'Archive - Widget Area', 'magazine-lites' ),
			'id'            => 'archive-1',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-main">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		// footer
		register_sidebar( array(
			'name'          => esc_html__( 'Footer - Widget Area', 'magazine-lites' ),
			'id'            => 'footer-1',
			'before_widget' => '<div id="%1$s" class="widget col col-4 %2$s"><div class="widget-main">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

	}

	add_action( 'widgets_init', 'wplook_widgets_init' );

}


?>
