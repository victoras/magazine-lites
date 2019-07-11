<?php

/**
 * register options
 *
 * @since 1.0
 */
function magazine_lite_customizer_register_options( $options ) {

	$prefix = 'magazine_lite_';

	// Social
	$options[] = array(
		'type'	=> 'section',
		'id'	=> 'magazine_lite_social',
		'title' => esc_html__( '- Social', 'magazine-lites' ),
	);

		$options[] = array(
			'type'	=> 'option_text',
			'title' => esc_html__( 'Twitter URL', 'magazine-lites' ),
			'id'	=> $prefix . 'social_twitter',
			'def'	=> '',
		);

		$options[] = array(
			'type'	=> 'option_text',
			'title' => esc_html__( 'Facebook URL', 'magazine-lites' ),
			'id'	=> $prefix . 'social_facebook',
			'def'	=> '',
		);

		$options[] = array(
			'type'	=> 'option_text',
			'title' => esc_html__( 'Youtube URL', 'magazine-lites' ),
			'id'	=> $prefix . 'social_youtube',
			'def'	=> '',
		);

		$options[] = array(
			'type'	=> 'option_text',
			'title' => esc_html__( 'Vimeo URL', 'magazine-lites' ),
			'id'	=> $prefix . 'social_vimeo',
			'def'	=> '',
		);

		$options[] = array(
			'type'	=> 'option_text',
			'title' => esc_html__( 'Tumblr URL', 'magazine-lites' ),
			'id'	=> $prefix . 'social_tumblr',
			'def'	=> '',
		);

		$options[] = array(
			'type'	=> 'option_text',
			'title' => esc_html__( 'Pinterest URL', 'magazine-lites' ),
			'id'	=> $prefix . 'social_pinterest',
			'def'	=> '',
		);

		$options[] = array(
			'type'	=> 'option_text',
			'title' => esc_html__( 'LinkedIn URL', 'magazine-lites' ),
			'id'	=> $prefix . 'social_linkedin',
			'def'	=> '',
		);

		$options[] = array(
			'type'	=> 'option_text',
			'title' => esc_html__( 'Instagram URL', 'magazine-lites' ),
			'id'	=> $prefix . 'social_instagram',
			'def'	=> '',
		);

		$options[] = array(
			'type'	=> 'option_text',
			'title' => esc_html__( 'Github URL', 'magazine-lites' ),
			'id'	=> $prefix . 'social_github',
			'def'	=> '',
		);

		$options[] = array(
			'type'	=> 'option_text',
			'title' => esc_html__( 'Google Plus URL', 'magazine-lites' ),
			'id'	=> $prefix . 'social_googleplus',
			'def'	=> '',
		);

		$options[] = array(
			'type'	=> 'option_text',
			'title' => esc_html__( 'Dribbble URL', 'magazine-lites' ),
			'id'	=> $prefix . 'social_dribbble',
			'def'	=> '',
		);

		$options[] = array(
			'type'	=> 'option_text',
			'title' => esc_html__( 'Dropbox URL', 'magazine-lites' ),
			'id'	=> $prefix . 'social_dropbox',
			'def'	=> '',
		);

		$options[] = array(
			'type'	=> 'option_text',
			'title' => esc_html__( 'Flickr URL', 'magazine-lites' ),
			'id'	=> $prefix . 'social_flickr',
			'def'	=> '',
		);

		$options[] = array(
			'type'	=> 'option_text',
			'title' => esc_html__( 'Foursquare URL', 'magazine-lites' ),
			'id'	=> $prefix . 'social_foursquare',
			'def'	=> '',
		);

		$options[] = array(
			'type'	=> 'option_text',
			'title' => esc_html__( 'Behance URL', 'magazine-lites' ),
			'id'	=> $prefix . 'social_behance',
			'def'	=> '',
		);

		$options[] = array(
			'type'	=> 'option_text',
			'title' => esc_html__( 'Vine URL', 'magazine-lites' ),
			'id'	=> $prefix . 'social_vine',
			'def'	=> '',
		);

		$options[] = array(
			'type'	=> 'option_text',
			'title' => esc_html__( 'RSS URL', 'magazine-lites' ),
			'id'	=> $prefix . 'social_rss',
			'def'	=> '',
		);


	// Toolbar
	$options[] = array(
		'type'	=> 'section',
		'id'	=> 'magazine_toolbar',
		'title' => esc_html__( '- Toolbar', 'magazine-lites' ),
	);

		$options[] = array(
			'type'	=> 'option_select',
			'title' => esc_html__( 'Display Toolbar', 'magazine-lites' ),
			'id'	=> $prefix . 'toolbar_display',
			'def'	=> 'yes',
			'opts'  => array(
				'yes' => esc_html__( 'Yes', 'magazine-lites' ),
				'no' => esc_html__( 'No', 'magazine-lites' ),
			),
		);

		$options[] = array(
			'type'	=> 'option_select',
			'title' => esc_html__( 'Toolbar Options', 'magazine-lites' ),
			'id'	=> $prefix . 'toolbar_options',
			'def'	=> 'yes',
			'opts'  => array(
				'search-form' => esc_html__( 'Display Search Form', 'magazine-lites' ),
				'social-icons' => esc_html__( 'Display Social Icons', 'magazine-lites' ),
			),
		);

	// footer
	$options[] = array(
		'type'	=> 'section',
		'id'	=> 'magazine_footer',
		'title' => esc_html__( '- Footer', 'magazine-lites' ),
	);

		$options[] = array(
			'type'	=> 'option_text',
			'title' => esc_html__( 'Copyright Text', 'magazine-lites' ),
			'id'	=> $prefix . 'footer_copy_text',
			'def'	=> 'Copyright 2019.',
		);



	// other
	$options[] = array(
		'type'	=> 'section',
		'id'	=> 'magazine_other',
		'title' => esc_html__( '- Other', 'magazine-lites' ),
	);

		$options[] = array(
			'type'	=> 'option_select',
			'opts'  => array(
				'classic-v1' => esc_html__( 'Classic [ Small Thumbnails ]', 'magazine-lites' ),
				'classic-v2' => esc_html__( 'Classic [ Big Thumbnails ]', 'magazine-lites' ),
				'grid-v1' => esc_html__( 'Column Grid [ 2 Col + Sidebar ]', 'magazine-lites' ),
				'grid-v2' => esc_html__( 'Column Grid [ 3 Col ]', 'magazine-lites' ),
				'grid-v3' => esc_html__( 'Column Grid [ 2 Col ]', 'magazine-lites' ),
			),
			'title' => esc_html__( 'Post Layout', 'magazine-lites' ),
			'id'	=> $prefix . 'post_layout',
			'def'	=> 'classic-v1',
		);

		$options[] = array(
			'type'	=> 'option_select',
			'opts'  => array(
				'classic-v1' => esc_html__( 'Classic [ Small Thumbnails ]', 'magazine-lites' ),
				'classic-v2' => esc_html__( 'Classic [ Big Thumbnails ]', 'magazine-lites' ),
				'grid-v1' => esc_html__( 'Column Grid [ 2 Col + Sidebar ]', 'magazine-lites' ),
				'grid-v2' => esc_html__( 'Column Grid [ 3 Col ]', 'magazine-lites' ),
				'grid-v3' => esc_html__( 'Column Grid [ 2 Col ]', 'magazine-lites' ),
			),
			'title' => esc_html__( 'Archive Layout', 'magazine-lites' ),
			'id'	=> $prefix . 'archive_layout',
			'def'	=> 'classic-v1',
		);

		$options[] = array(
			'type'	=> 'option_select',
			'opts'  => array(
				'classic-v1' => esc_html__( 'Classic [ Small Thumbnails ]', 'magazine-lites' ),
				'classic-v2' => esc_html__( 'Classic [ Big Thumbnails ]', 'magazine-lites' ),
				'grid-v1' => esc_html__( 'Column Grid [ 2 Col + Sidebar ]', 'magazine-lites' ),
				'grid-v2' => esc_html__( 'Column Grid [ 3 Col ]', 'magazine-lites' ),
				'grid-v3' => esc_html__( 'Column Grid [ 2 Col ]', 'magazine-lites' ),
			),
			'title' => esc_html__( 'Search Layout', 'magazine-lites' ),
			'id'	=> $prefix . 'search_layout',
			'def'	=> 'classic-v1',
		);

		$options[] = array(
			'type'	=> 'option_image',
			'title' => esc_html__( 'Header Banner', 'magazine-lites' ),
			'id'	=> $prefix . 'header_banner',
			'def'	=> '',
		);

		$options[] = array(
			'type'	=> 'option_text',
			'title' => esc_html__( 'Banner URL', 'magazine-lites' ),
			'id'	=> $prefix . 'header_banner_url',
			'def'	=> '',
		);

	return $options;

} add_filter( 'magazine_lite_customizer_register', 'magazine_lite_customizer_register_options', 10, 1 );

/**
 * add options to customizer
 *
 * @since 1.0
 */
function magazine_lite_customizer_register( $wp_customize ) {

	$customizer_options = apply_filters( 'magazine_lite_customizer_register', array() );

	$section_priority = 200;
	$setting_priority = 5;
	$current_section_id = '';
	$current_setting_id = '';

	foreach ( $customizer_options as $customizer_option ) {

		if ( ! isset( $customizer_option['descr'] ) ) {
			$customizer_option['descr'] = '';
		}

		if( $customizer_option['type'] == 'section' ){

			/* New Section */

			$section_priority += 50;
			$setting_priority = 5;
			$current_section_id = $customizer_option['id'];

			if ( ! isset( $customizer_option['descr'] ) )
				$customizer_option['descr'] = '';

			$wp_customize->add_section( $current_section_id, array(
				'title' => $customizer_option['title'],
				'priority' => $section_priority,
				'description' => $customizer_option['descr'],
			) );

		} elseif ( $customizer_option['type'] == 'option_color' ) {

			/* New Option (COLOR) */

			$current_setting_id = $customizer_option['id'];
			$setting_priority += 5;

			$wp_customize->add_setting( $current_setting_id, array(
				'default' => $customizer_option['def'],
				'type' => 'theme_mod',
				'sanitize_callback' => 'esc_html',
			) );

				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $current_setting_id, array(
					'label' => $customizer_option['title'],
					'section' => $current_section_id,
					'priority' => $setting_priority,
					'description' => $customizer_option['descr'],
				) ) );

		} elseif ( $customizer_option['type'] == 'option_text' ) {

			/* New Option (TEXT) */

			$current_setting_id = $customizer_option['id'];
			$setting_priority += 5;

			$wp_customize->add_setting( $current_setting_id, array(
				'default'	=> $customizer_option['def'],
				'type'		=> 'theme_mod',
				'sanitize_callback' => 'wp_kses',
			) );

				$wp_customize->add_control( $current_setting_id, array(
					'label'		=> $customizer_option['title'],
					'section' 	=> $current_section_id,
					'type'		=> 'text',
					'priority'	=> $setting_priority,
					'description' => $customizer_option['descr'],
				));

		} elseif ( $customizer_option['type'] == 'option_textarea' ) {

			/* New Option (TEXT) */

			$current_setting_id = $customizer_option['id'];
			$setting_priority += 5;

			$wp_customize->add_setting( $current_setting_id, array(
				'default'	=> $customizer_option['def'],
				'type'		=> 'theme_mod',
				'sanitize_callback' => 'esc_html',
			) );

				$wp_customize->add_control( $current_setting_id, array(
					'label'		=> $customizer_option['title'],
					'section' 	=> $current_section_id,
					'type'		=> 'textarea',
					'priority'	=> $setting_priority,
					'description' => $customizer_option['descr'],
				));

		} elseif ( $customizer_option['type'] == 'option_select' ) {

			/* New Option (SELECT) */

			$current_setting_id = $customizer_option['id'];
			$setting_priority += 5;

			$wp_customize->add_setting( $current_setting_id, array(
				'default'	=> $customizer_option['def'],
				'type'		=> 'theme_mod',
				'sanitize_callback' => 'esc_html',
			) );

				$wp_customize->add_control( $current_setting_id, array(
					'label'		=> $customizer_option['title'],
					'section' 	=> $current_section_id,
					'type'		=> 'select',
					'choices'	=> $customizer_option['opts'],
					'priority'	=> $setting_priority,
					'description' => $customizer_option['descr'],
				));

		} elseif ( $customizer_option['type'] == 'option_checkbox' ) {

			/* New Option (checkbox) */

			$current_setting_id = $customizer_option['id'];
			$setting_priority += 5;

			$wp_customize->add_setting( $current_setting_id, array(
				'default'	=> $customizer_option['def'],
				'type'		=> 'theme_mod',
				'sanitize_callback' => 'esc_html',
			) );

				$wp_customize->add_control( $current_setting_id, array(
					'label'		=> $customizer_option['title'],
					'section' 	=> $current_section_id,
					'type'		=> 'checkbox',
					'priority'	=> $setting_priority,
					'description' => $customizer_option['descr'],
				));

		} elseif ( $customizer_option['type'] == 'option_image' ) {

			/* New Option (image) */

			$current_setting_id = $customizer_option['id'];
			$setting_priority += 5;

			$wp_customize->add_setting( $current_setting_id, array(
				'default'	=> $customizer_option['def'],
				'type'		=> 'theme_mod',
				'sanitize_callback' => 'esc_url_raw',
			) );

				$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $current_setting_id, array(
					'label'		=> $customizer_option['title'],
					'section' 	=> $current_section_id,
					'priority'	=> $setting_priority,
					'description' => $customizer_option['descr'],
				) ) );

		}

	}

} add_action( 'customize_register', 'magazine_lite_customizer_register' );
