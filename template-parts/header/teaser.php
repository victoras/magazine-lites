<?php

// vars used
$count = 0;
$real_count = 0;
$post_columns = 6;
$max_columns = 12 / $post_columns;

// output storage
$primary_output = '';
$secondary_output = '';


$tag_id_to_show  = get_post_meta( get_the_ID(), 'wpl_featured_layout_tag', true );

// query args
$args = array(
	'posts_per_page' => 3,
	'post__in'  => get_option( 'sticky_posts' ),
	'ignore_sticky_posts' => 1
);

// query posts
$magazine_lite_query = new WP_Query( $args );

// if there are posts
if ( $magazine_lite_query->have_posts() ) :

	?>

	<div id="featured-2" class="featured">

		<div id="featured-2-inner" class="clearfix">

			<?php

				// start posts loop
				while ( $magazine_lite_query->have_posts() ) : $magazine_lite_query->the_post();

					// reset vars
					$post_class_append = '';
					$column_class = '';

					// increase counts
					$count++;
					$real_count++;

					// thumbnail sizes
					$thumb_width = 1170;
					if ( $real_count > 1 ) {
						$thumb_width = 581;
					}
					$thumb_height = $thumb_width / 2;
					$mobile_thumb_height = 480 / 1;

					// reset count on max
					if ( $count >= $max_columns )
						$count = 0;

					// post class
					$post_class = '';

					// set post data
					magazine_lite_set_post_vars( array(
						'post_class' => $post_class,
						'thumb_width' => $thumb_width,
						'thumb_height' => $thumb_height,
						'thumb_crop' => true,
						'mobile_thumb_height' => $mobile_thumb_height,
					));

					// start output buffer
					ob_start();

						// post template
						get_template_part( 'template-parts/listing/post-s3' );

					// end output buffer
					$output = ob_get_contents();
					ob_end_clean();

					// append the HTML
					if ( $real_count == 1 ) {
						$primary_output .= $output;
					} else {
						$secondary_output .= $output;
					}

				// end posts loop
				endwhile;

			?>

			<div id="featured-2-primary">
				<?php echo wp_kses_post( $primary_output ); ?>
			</div><!-- #featured-2-primary -->

			<div id="featured-2-secondary">
				<?php echo wp_kses_post( $secondary_output ); ?>
			</div><!-- #featured-2-secondary -->

		</div><!-- #featured-2-inner -->

	</div><!-- #featured-2 -->

<?php

// finish if statement
endif;

// reset query
wp_reset_postdata();

?>
