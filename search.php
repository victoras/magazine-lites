<?php
/**
 * Search
 *
 * @package WordPress
 * @subpackage Magazine Lites
 * @since Magazine Lites 1.0.0
 */
?>
<?php get_header(); ?>

	<?php
		// style
		$style = 'classic-v1';
		if ( magazine_lite_get_theme_mod( 'search_layout', 'classic-v1' ) ) {
			$style = magazine_lite_get_theme_mod( 'search_layout', 'classic-v1' );
		}

		// has sidebar?
		$has_sidebar = false;
		if ( in_array( $style, array( 'classic-v1', 'classic-v2', 'grid-v1' ) ) ) {
			$has_sidebar = true;
		}

		// content class
		$content_class = '';
		if ( $has_sidebar ) {
			$content_class = 'col col-8';
		}

		// post style
		$post_style = 's1';
		if ( in_array( $style, array( 'grid-v1', 'grid-v2', 'grid-v3' ) ) ) {
			$post_style = 's2';
		}
	?>

	<h1 class="page-title"><?php esc_html_e( 'Search Results For:', 'magazine-lites' ); ?> <?php echo get_search_query(); ?></h2>
	<div id="content" class="<?php echo esc_attr( $content_class ); ?>">
		<?php
			// if there are posts
			if ( have_posts() ) :
				?><div class="blog-posts-listing <?php echo esc_attr( 'layout-' . $style ); ?>"><?php
					?><div class="blog-posts-listing-inner clearfix"><?php
						// count
						$count = 0;
						$real_count = 0;

						// loop posts
						while ( have_posts() ) : the_post();

							// increment
							$count++;
							$real_count++;

							// reset post class
							$post_class = '';
							$thumb_crop = true;

							// thumb size v2
							if ( $style == 'classic-v1' ) {

								$columns_max = 1;

								// thumbnail sizes
								$thumb_width = 240;
								$thumb_height = $thumb_width / 1;
								$mobile_thumb_height = 480 / 1;

							} elseif ( $style == 'classic-v2' ) {

								$columns_max = 1;

								// thumbnail sizes
								$thumb_width = 766;
								$thumb_height = 99999;
								$thumb_crop = false;
								$mobile_thumb_height = 480 / 1;

							} elseif ( $style == 'grid-v1' ) {

								// post class
								$post_class = 'col col-6 ';
								$columns_max = 2;

								// thumb size
								$thumb_width = 370;
								$thumb_height = $thumb_width / 1.77;
								$mobile_thumb_height = 480 / 1;

							} elseif ( $style == 'grid-v2' ) {

								// post class
								$post_class = 'col col-4 ';
								$columns_max = 3;

								// thumb size
								$thumb_width = 363;
								$thumb_height = $thumb_width / 1.77;
								$mobile_thumb_height = 480 / 1;

							} elseif ( $style == 'grid-v3' ) {

								// post class
								$post_class = 'col col-6 ';
								$columns_max = 2;

								// thumb size
								$thumb_width = 564;
								$thumb_height = $thumb_width / 1.77;
								$mobile_thumb_height = 480 / 1;

							}

							// last col
							if ( $count == $columns_max ) {
								$post_class .= 'col-last ';
								$count = 0;
							}

							// set post vars
							magazine_lite_set_post_vars(array(
								'post_class' => $post_class,
								'thumb_width' => $thumb_width,
								'thumb_height' => $thumb_height,
								'thumb_crop' => $thumb_crop,
								'mobile_thumb_height' => $mobile_thumb_height,
							));

							// output from template
							get_template_part( 'template-parts/listing/post-' . $post_style );

						endwhile;

					?></div><!-- .blog-posts-listing-inner --><?php

					// post pagination
					magazine_lite_posts_pagination();

				?></div><!-- .blog-posts-listing --><?php

			// if no posts found
			else :
				// output from template
				get_template_part( 'template-parts/content', 'none' );

			// finish if posts
			endif;
		?>
	</div><!-- #content -->
	<?php if ( $has_sidebar ) get_sidebar('archive'); ?>
<?php get_footer();
