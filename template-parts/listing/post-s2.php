<?php $post_vars = magazine_lite_get_post_vars(); ?>
<div <?php post_class( 'post-s2 clearfix ' . $post_vars['post_class'] ); ?>>

	<?php if ( has_post_thumbnail() ) : ?>

		<div class="post-s2-thumb">

			<?php
				$thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
				$thumb_url = $thumb_url[0];
				$res_img = magazine_lite_aq_resize( $thumb_url, $post_vars['thumb_width'], $post_vars['thumb_height'], $post_vars['thumb_crop'] );
				$img_alt = magazine_lite_get_attachment_alt( get_post_thumbnail_id() );
			?>
			<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url( $res_img ); ?>" alt="<?php echo esc_attr( $img_alt ); ?>" /></a>

			<div class="post-s2-cats">
				<?php the_category( ' ' ); ?>
			</div><!-- .post-s2-cats -->

		</div><!-- .post-s2-thumb -->

	<?php endif; ?>

	<div class="post-s2-main">

		<h2 class="post-s2-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

		<div class="post-s2-meta clearfix">
			<span class="post-meta-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
			<span class="post-meta-comments"><a href="<?php comments_link(); ?>"><?php comments_number( esc_html__( 'No Comments', 'magazine-lites' ), esc_html__( 'One Comment', 'magazine-lites' ), esc_html__( '% Comments', 'magazine-lites' ) ); ?></a></span>
		</div><!-- .post-s2-meta -->

	</div><!-- .post-s2-main -->

</div><!-- .post-s2 -->
