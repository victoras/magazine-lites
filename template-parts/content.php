<div <?php post_class( 'blog-post post-s1 grid-sizer masonry-item clearfix ' ); ?>>

	<?php if ( has_post_thumbnail() ) { ?>
		<div class="post-s1-thumb">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'full' ); ?></a>
		</div><!-- .post-s1-thumb -->
	<?php } ?>

	<div class="post-s1-main">

		<h4 class="post-s1-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

		<div class="post-s1-excerpt">
			<?php the_excerpt(); ?>
		</div><!-- .post-s1-excerpt -->

		<div class="post-s1-read-more">
			<a href="<?php the_permalink(); ?>"><?php esc_html_e( 'Continue Reading', 'magazine-lites' ); ?></a>
		</div><!-- .post-s1-read-more -->

	</div><!-- .post-s1-main -->

	<div class="post-s1-meta-bottom clearfix">
		<span class="post-meta-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
		<span class="post-meta-comments"><a href="<?php comments_link(); ?>"><?php comments_number( esc_html__( 'No Comments', 'magazine-lites' ), esc_html__( 'One Comment', 'magazine-lites' ), esc_html__( '% Comments', 'magazine-lites' ) ); ?></a></span>
	</div><!-- .post-s1-meta-bottom -->

</div><!-- .post-s1 -->
