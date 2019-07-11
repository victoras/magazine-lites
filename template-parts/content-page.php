<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="page-single">

		<?php if ( has_post_thumbnail() ) : ?>
			<div class="page-thumb">
				<?php
					$thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
					$thumb_url = $thumb_url[0];
					$res_img = magazine_lite_aq_resize( $thumb_url, 825, 9999 );
					$img_alt = magazine_lite_get_attachment_alt( get_post_thumbnail_id() );
				?>
				<img src="<?php echo esc_url( $res_img ); ?>" alt="<?php echo esc_attr( $img_alt ); ?>" />
			</div><!-- .page-thumb -->
		<?php endif; ?>

		<div class="page-single-main">

			<h1 class="page-title"><?php the_title(); ?></h1>

			<div class="page-single-content clearfix">
				<?php the_content(); ?>
			</div><!-- .page-content -->

		</div><!-- .page-single-main -->

	</div><!-- .page-single -->

</article><!-- #post-## -->
