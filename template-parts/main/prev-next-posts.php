<?php
	$thumb_width = 370;
	$thumb_height = $thumb_width / 1.77;
?>
<div class="blog-post-single-nav">
	<?php
		$prev_post = get_adjacent_post( false, '', false );
			if ( is_a( $prev_post, 'WP_Post' ) ) {
			$custompost_ID = $prev_post->ID;
			?>
			<div class="blog-post-single-nav-prev col col-6">

				<div class="post-s2 init-animation">
					<a href="<?php echo get_permalink( $custompost_ID ); ?>" class="blog-post-single-nav-button"><span class="fas fa-chevron-left"></span><?php esc_html_e( 'Previous Post', 'magazine-lites' ); ?></a>
				</div><!-- .post-s2 -->

			</div><!-- .blog-post-single-nav-prev -->
			<?php
			wp_reset_postdata();
		} else { echo '<div class="col col-6">&nbsp;</div>'; }
	?>
	<?php
		$next_post = get_adjacent_post( false, '', true );
		if ( is_a( $next_post, 'WP_Post' ) ) {
			$custompost_ID = $next_post->ID;
			?>
			<div class="blog-post-single-nav-next col col-6 col-last">

				<div class="post-s2 init-animation">
					<a href="<?php echo get_permalink( $custompost_ID ); ?>" class="blog-post-single-nav-button"><?php esc_html_e( 'Next Post', 'magazine-lites' ); ?><span class="fas fa-chevron-right"></span></a>
				</div><!-- .post-s2 -->

			</div><!-- .blog-post-single-nav-next -->
			<?php
			wp_reset_postdata();
		}
	?>
</div><!-- .blog-post-single-nav -->
