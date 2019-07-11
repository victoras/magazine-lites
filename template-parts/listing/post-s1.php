<?php $post_vars = magazine_lite_get_post_vars(); ?>
<div <?php post_class( 'blog-post post-s1 clearfix ' ); ?>>

	<?php if ( has_post_thumbnail() ) : ?>

		<div class="post-s1-thumb">
			<?php
				$thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
				$thumb_url = $thumb_url[0];
				$res_img = magazine_lite_aq_resize( $thumb_url, $post_vars['thumb_width'], $post_vars['thumb_height'], $post_vars['thumb_crop'] );
				$img_alt = magazine_lite_get_attachment_alt( get_post_thumbnail_id() );
			?>
			<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url( $res_img ); ?>" alt="<?php echo esc_attr( $img_alt ); ?>" /></a>
		</div><!-- .post-s1-thumb -->

	<?php endif; ?>

	<div class="post-s1-main">

		<div class="post-s1-meta clearfix">
			<span class="post-meta-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
			<span class="post-meta-cats"><?php the_category( ', ' ); ?></span>
			<span class="post-meta-comments"><a href="<?php comments_link(); ?>"><?php comments_number( esc_html__( 'No Comments', 'magazine-lites' ), esc_html__( 'One Comment', 'magazine-lites' ), esc_html__( '% Comments', 'magazine-lites' ) ); ?></a></span>
		</div><!-- .post-s1-meta -->

		<h2 class="post-s1-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

		<div class="post-s1-excerpt">
			<?php the_excerpt(); ?>
		</div><!-- .post-s1-excerpt -->

		<div class="post-s1-read-more">
			<a href="<?php the_permalink(); ?>"><?php esc_html_e( 'Continue Reading', 'magazine-lites' ); ?></a>
		</div><!-- .post-s1-read-more -->

	</div><!-- .post-s1-main -->

</div><!-- .post-s1 -->
