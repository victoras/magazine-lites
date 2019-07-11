<?php

// include TGM_Plugin_Activation class.
require_once get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';

/**
 * register required plugins
 *
 * @since 1.0
 */
function magazine_lite_tgm_init() {

	// plugins
	$plugins = array(
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => false,
		),
	);

	// configuration
	$config = array(
		'id'           => 'tgmpa',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'parent_slug'  => 'themes.php',
		'capability'   => 'edit_theme_options',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => true,
		'message'      => '',
	);

	// call
	tgmpa( $plugins, $config );

} add_action( 'tgmpa_register', 'magazine_lite_tgm_init' );
