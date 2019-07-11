<?php
/**
 * Functions
 *
 * magazine_lite_setup ( sets up theme defaults and registers support for various WordPress features )
 * magazine_lite_content_width ( set the content width global variable )
 * include other files
 */

if ( ! function_exists( 'magazine_lite_setup' ) ) {

	/**
	 * theme setup
	 *
	 * @since 1.0
	 */
	function magazine_lite_setup() {

		// text domain
		load_theme_textdomain( 'magazine-lites', get_template_directory() . '/languages' );

		// theme support
		add_theme_support( 'custom-logo', array(
			'width' => 185,
			'height' => 26,
			'flex-width' => true,
			'flex-height' => true,
			'header-text' => array( 'site-title', 'site-description' ),
		));
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

		// register menus
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'magazine-lites' ),
			'top-bar' => esc_html__( 'Top Bar', 'magazine-lites' ),
			'footer' => esc_html__( 'Footer', 'magazine-lites' ),
		) );


		wp_create_nav_menu( 'Primary', array( 'slug' => 'primary') );
		wp_create_nav_menu( 'Top Bar', array( 'slug' => 'top-bar') );
		wp_create_nav_menu( 'Footer', array( 'slug' => 'footer') );

	}

} add_action( 'after_setup_theme', 'magazine_lite_setup' );

if ( ! function_exists( 'magazine_lite_content_width' ) ) {

	/**
	 * content width global
	 *
	 * @since 1.0
	 * @global int $content_width
	 */
	function magazine_lite_content_width() {

		$GLOBALS['content_width'] = apply_filters( 'magazine_lite_content_width', 1170 );

	}

} add_action( 'after_setup_theme', 'magazine_lite_content_width', 0 );






/*-----------------------------------------------------------------------------------*/
/*  Archive functionality
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'magazine_lite_posts_by_year' ) ) {
	function magazine_lite_posts_by_year() {
		// array to use for results
		$years = array();

		// get posts from WP
		$posts = get_posts(array(
			'numberposts' => -1,
			'orderby' => 'post_date',
			'order' => 'ASC',
			'post_type' => 'post',
			'post_status' => 'publish'
		));

		// loop through posts, populating $years arrays
		foreach($posts as $post) {
			$years[date('Y', strtotime($post->post_date))][] = $post;
		}

		// reverse sort by year
		krsort($years);

		return $years;
	}
}

/*-----------------------------------------------------------
	Get Date
-----------------------------------------------------------*/

if ( ! function_exists( 'magazine_lite_get_dates' ) ) {

	function magazine_lite_get_dates() {
		the_time('M j');
	}

}

/* -------------------------------------------------------------
 * Enable svg support
 * ============================================================*/
if ( ! function_exists( 'magazine_lite_add_svg_mime_types' ) ) {
	/**
	 * @param $mimes - MIME file type
	 * @return mixed
	 */
	function magazine_lite_add_svg_mime_types( $mimes ) {
		if ( is_super_admin() ) {
			$mimes['svg'] = 'image/svg+xml';
		}
		return $mimes;
	}
	add_filter( 'upload_mimes', 'magazine_lite_add_svg_mime_types' );
}


// tgm plugin activation
include get_template_directory() . '/inc/tgm/tgm-init.php';

// Include frontend and admin scripts
require_once( get_template_directory() . '/inc/enqueue.php' );

include get_template_directory() . '/inc/theme-options.php';

// functions
include get_template_directory() . '/inc/logic.php';
include get_template_directory() . '/inc/display.php';

// Include widgets
require_once( get_template_directory() . '/inc/widgets/widgets-init.php' );
