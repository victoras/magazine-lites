<?php
	/* Outputs on a single post page */
?>

<div class="blog-post-single">


	<?php if ( has_post_thumbnail() ) { ?>

		<div class="blog-post-single-thumb">
			<?php
				$thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
				$thumb_url = $thumb_url[0];
				$res_img = magazine_lite_aq_resize( $thumb_url, 766, 9999 );
				$img_alt = magazine_lite_get_attachment_alt( get_post_thumbnail_id() );
			?>
			<img src="<?php echo esc_url( $res_img ); ?>" alt="<?php echo esc_attr( $img_alt ); ?>" />
		</div><!-- .blog-post-single-thumb -->

	<?php } ?>

	<div class="blog-post-single-main">

		<h1 class="blog-post-single-title"><?php the_title(); ?></h1>

		<div class="blog-post-single-meta">
			<span class="post-meta-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
			<span class="post-meta-cats"><?php the_category( ', ' ); ?></span>
			<span class="post-meta-comments"><a href="<?php comments_link(); ?>"><?php comments_number( esc_html__( 'No Comments', 'magazine-lites' ), esc_html__( 'One Comment', 'magazine-lites' ), esc_html__( '% Comments', 'magazine-lites' ) ); ?></a></span>
		</div><!-- .blog-post-single-meta -->

		<div class="blog-post-single-content">
			<?php the_content(); ?>
		</div><!-- .blog-post-single-content -->

		<div class="blog-post-single-pagination">
			<?php wp_link_pages(); ?>
		</div><!-- .blog-post-single-pagination -->

		<div class="blog-post-single-tags">
			<?php the_tags(); ?>
		</div><!-- .blog-post-single-tags -->

	</div><!-- .blog-post-single-main -->

</div><!-- .blog-post-single -->
