<?php

/**
 * Table Of Contents
 *
 * magazine_lite_Aq_Resize ( Image resizing class )
 * magazine_lite_aq_resize ( Image resizing function )
 * magazine_lite_get_theme_mod ( Returns customizer option value )
 * magazine_lite_get_attachment_alt ( Returns the alt attribute for an attachment )
 * magazine_lite_set_post_vars ( Set global post vars )
 * magazine_lite_get_post_vars ( Get global post vars )
 */

if( ! class_exists('magazine_lite_Aq_Resize') ) {

	/**
	 * Image resizing class
	 *
	 * @since 1.0
	 */
	class magazine_lite_Aq_Resize {

		/**
		 * The singleton instance
		 */
		static private $instance = null;

		/**
		 * No initialization allowed
		 */
		private function __construct() {}

		/**
		 * No cloning allowed
		 */
		private function __clone() {}

		/**
		 * For your custom default usage you may want to initialize an Aq_Resize object by yourself and then have own defaults
		 */
		static public function getInstance() {
			if(self::$instance == null) {
				self::$instance = new self;
			}

			return self::$instance;
		}

		/**
		 * Run, forest.
		 */
		public function process( $url, $width = null, $height = null, $crop = null, $single = true, $upscale = true ) {

			// Validate inputs.
			if ( ! $url || ( ! $width && ! $height ) ) return false;

			$upscale = true;

			// Caipt'n, ready to hook.
			if ( true === $upscale ) add_filter( 'image_resize_dimensions', array($this, 'aq_upscale'), 10, 6 );

			// Define upload path & dir.
			$upload_info = wp_upload_dir();
			$upload_dir = $upload_info['basedir'];
			$upload_url = $upload_info['baseurl'];

			$http_prefix = "http://";
			$https_prefix = "https://";

			/* if the $url scheme differs from $upload_url scheme, make them match
			   if the schemes differe, images don't show up. */
			if(!strncmp($url,$https_prefix,strlen($https_prefix))){ //if url begins with https:// make $upload_url begin with https:// as well
				$upload_url = str_replace($http_prefix,$https_prefix,$upload_url);
			}
			elseif(!strncmp($url,$http_prefix,strlen($http_prefix))){ //if url begins with http:// make $upload_url begin with http:// as well
				$upload_url = str_replace($https_prefix,$http_prefix,$upload_url);
			}


			// Check if $img_url is local.
			if ( false === strpos( $url, $upload_url ) ) return false;

			// Define path of image.
			$rel_path = str_replace( $upload_url, '', $url );
			$img_path = $upload_dir . $rel_path;

			// Check if img path exists, and is an image indeed.
			if ( ! file_exists( $img_path ) or ! getimagesize( $img_path ) ) return false;

			// Get image info.
			$info = pathinfo( $img_path );
			$ext = $info['extension'];
			list( $orig_w, $orig_h ) = getimagesize( $img_path );

			// Get image size after cropping.
			$dims = image_resize_dimensions( $orig_w, $orig_h, $width, $height, $crop );
			$dst_w = $dims[4];
			$dst_h = $dims[5];

			// Return the original image only if it exactly fits the needed measures.
			if ( ! $dims && ( ( ( null === $height && $orig_w == $width ) xor ( null === $width && $orig_h == $height ) ) xor ( $height == $orig_h && $width == $orig_w ) ) ) {
				$img_url = $url;
				$dst_w = $orig_w;
				$dst_h = $orig_h;
			} else {
				// Use this to check if cropped image already exists, so we can return that instead.
				$suffix = "{$dst_w}x{$dst_h}";
				$dst_rel_path = str_replace( '.' . $ext, '', $rel_path );
				$destfilename = "{$upload_dir}{$dst_rel_path}-{$suffix}.{$ext}";

				if ( ! $dims || ( true == $crop && false == $upscale && ( $dst_w < $width || $dst_h < $height ) ) ) {
					// Can't resize, so return false saying that the action to do could not be processed as planned.
					return $url;
				}
				// Else check if cache exists.
				elseif ( file_exists( $destfilename ) && getimagesize( $destfilename ) ) {
					$img_url = "{$upload_url}{$dst_rel_path}-{$suffix}.{$ext}";
				}
				// Else, we resize the image and return the new resized image url.
				else {

					$editor = wp_get_image_editor( $img_path );

					if ( is_wp_error( $editor ) || is_wp_error( $editor->resize( $width, $height, $crop ) ) )
						return $url;

					$resized_file = $editor->save();

					if ( ! is_wp_error( $resized_file ) ) {
						$resized_rel_path = str_replace( $upload_dir, '', $resized_file['path'] );
						$img_url = $upload_url . $resized_rel_path;
					} else {
						return $url;
					}

				}
			}

			// Okay, leave the ship.
			if ( true === $upscale ) remove_filter( 'image_resize_dimensions', array( $this, 'aq_upscale' ) );

			// Return the output.
			if ( $single ) {
				// str return.
				$image = $img_url;
			} else {
				// array return.
				$image = array (
					0 => $img_url,
					1 => $dst_w,
					2 => $dst_h
				);
			}

			return $image;
		}

		/**
		 * Callback to overwrite WP computing of thumbnail measures
		 */
		function aq_upscale( $default, $orig_w, $orig_h, $dest_w, $dest_h, $crop ) {
			if ( ! $crop ) return null; // Let the WordPress default function handle this.

			// Here is the point we allow to use larger image size than the original one.
			$aspect_ratio = $orig_w / $orig_h;
			$new_w = $dest_w;
			$new_h = $dest_h;

			if ( ! $new_w ) {
				$new_w = intval( $new_h * $aspect_ratio );
			}

			if ( ! $new_h ) {
				$new_h = intval( $new_w / $aspect_ratio );
			}

			$size_ratio = max( $new_w / $orig_w, $new_h / $orig_h );

			$crop_w = round( $new_w / $size_ratio );
			$crop_h = round( $new_h / $size_ratio );

			$s_x = floor( ( $orig_w - $crop_w ) / 2 );
			$s_y = floor( ( $orig_h - $crop_h ) / 2 );

			return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );
		}

	}

}


if ( ! function_exists('magazine_lite_aq_resize') ) {

	/**
	 * Resize an image using magazine_lite_Aq_Resize Class
	 *
	 * @since 1.0
	 *
	 * @param string $url     The URL of the image
	 * @param int    $width   The new width of the image
	 * @param int    $height  The new height of the image
	 * @param bool   $crop    To crop or not to crop, the question is now
	 * @param bool   $single  If true only returns the URL, if false returns array
	 * @param bool   $upscale If image not big enough for new size should it upscale
	 * @return mixed If $single is true return new image URL, if it is false return array
	 *               Array contains 0 = URL, 1 = width, 2 = height
	 */
	function magazine_lite_aq_resize( $url, $width = null, $height = null, $crop = null, $single = true, $upscale = false ) {

		 if( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'photon' ) ) {

			$args = array(
				'resize' => "$width,$height"
			);
			if ( $single == true ) {
				return jetpack_photon_url( $url, $args );
			} else {
				$image = array (
					0 => $img_url,
					1 => $width,
					2 => $height
				);
				return jetpack_photon_url( $url, $args );
			}

		} else {

			$aq_resize = magazine_lite_Aq_Resize::getInstance();
			return $aq_resize->process( $url, $width, $height, $crop, $single, $upscale );

		}

	}

}

/**
 * returns customizer option value
 *
 * @since 1.0
 */
function magazine_lite_get_theme_mod( $option_id, $default = '' ) {

	$return = get_theme_mod( 'magazine_lite_' . $option_id, $default );
	if ( $return == '' ) { $return = $default; }

	return $return;

}


/**
 * returns the ALT attribute for an attachment
 *
 * @since 1.0
 *
 * @param string   $attachment_ID The ID of the attachment
 * @return string  The ALT attribute text
 */
function magazine_lite_get_attachment_alt( $attachment_ID ) {

	// Get ALT
	$thumb_alt = trim( strip_tags( get_post_meta( $attachment_ID, '_wp_attachment_image_alt', true) ) );

	// No ALT supplied get attachment info
	if ( empty( $thumb_alt ) )
		$attachment = get_post( $attachment_ID );

	// Use caption if no ALT supplied
	if ( empty( $thumb_alt ) )
		$thumb_alt = trim(strip_tags( $attachment->post_excerpt ));

	// Use title if no caption supplied either
	if ( empty( $thumb_alt ) )
		$thumb_alt = trim(strip_tags( $attachment->post_title ));

	// Return ALT
	return esc_attr( $thumb_alt );

}

/**
 * set global post vars
 *
 * @since 1.0
 */
function magazine_lite_set_post_vars( $post_vars ) {
	global $magazine_lite_post_vars;
	$magazine_lite_post_vars = $post_vars;
}

/**
 * get global post vars
 *
 * @since 1.0
 */
function magazine_lite_get_post_vars() {
	global $magazine_lite_post_vars;
	return $magazine_lite_post_vars;
}
