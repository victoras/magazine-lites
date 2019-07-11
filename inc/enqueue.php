<?php
/**
 * CSS and JS includes
 *
 * @package WordPress
 * @subpackage My Journey
 * @since My Journey 1.0.0
 * @author WPlook Studio
 */

/*-----------------------------------------------------------------------------------*/
/*	Include CSS
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'magazine_lite_css_frontend' ) ) {

	function magazine_lite_css_frontend() {

		$theme = wp_get_theme();

		// Vendors
		wp_enqueue_style( 'vendors', get_template_directory_uri() . '/assets/styles/vendors.min.css' );

		// Main stylesheet
		wp_enqueue_style( 'magazine-lite-css', get_stylesheet_uri(), array(), $theme->get('Version') );

	}

	add_action( 'wp_enqueue_scripts', 'magazine_lite_css_frontend' );
}


/*-----------------------------------------------------------------------------------*/
/*	Include JavaScript
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'magazine_lite_js_frontend' ) ) {

	function magazine_lite_js_frontend() {

		// Theme
		$theme = wp_get_theme();
		$vendor = get_template_directory_uri() . '/assets/javascripts';


		// jQuery
		wp_enqueue_script( 'jquery' );

		// OWL Carousel
		wp_enqueue_script( 'owlcarousel', $vendor .  '/owl.carousel.min.js', array( 'jquery', 'jquery-effects-core' ), $theme->get( 'Version' ), true );

		// Google Fonts
		wp_enqueue_style( 'google-fonts', magazine_lite_fonts_url(), array(), $theme->get( 'Version' ) );


		// Comment reply
		if ( is_singular() && comments_open() && ( get_option( 'thread_comments' ) == 1 ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		wp_enqueue_script( 'jquery-masonry' );

		// Main JavaScript File - Custom Javascript
		wp_enqueue_script( 'main', $vendor . '/main.min.js', array( 'jquery' ), false, true );
	}

	add_action( 'wp_enqueue_scripts', 'magazine_lite_js_frontend' );

}

if ( ! function_exists( 'magazine_lite_fonts_url' ) ) {

	/**
	 * returns the google fonts URL
	 *
	 * @since 1.0
	 */
	function magazine_lite_fonts_url() {

		$font_url = '';

		/*
		Translators: If there are characters in your language that are not supported
		by chosen font(s), translate this to 'off'. Do not translate into your own language.
		*/
		$font_state = _x( 'on', 'Google fonts: on or off', 'magazine-lites' );
		if ( 'off' !== $font_state ) {
			$font_url = add_query_arg( 'family', urlencode( 'Roboto:300,400,500,700,900|Poppins:400,500,600,700|Montserrat:400,500,600,700&subset=latin,latin-ext' ), "//fonts.googleapis.com/css" );
		}

		return $font_url;
	}

} ?>
