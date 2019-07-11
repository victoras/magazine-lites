<?php
/**
 * Index
 *
 * @package WordPress
 * @subpackage Magazine Lites
 * @since Magazine Lites 1.0.0
 */
?>
<?php get_header(); ?>

	<div id="content" class="col col-8">

		<?php
			// if there are posts
			if ( have_posts() ) :
				?><div class="blog-posts-listing"><?php
					?><div class="blog-posts-listing-inner clearfix"><?php
						// loop posts
						while ( have_posts() ) : the_post();
							// thumbnail sizes
							$thumb_width = 240;
							$thumb_height = $thumb_width / 1;

							// set post data
							magazine_lite_set_post_vars( array(
								'thumb_width' => $thumb_width,
								'thumb_height' => $thumb_height,
								'thumb_crop' => true,
							));

							// output from template
							get_template_part( 'template-parts/listing/post-s1' );
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
	<?php get_sidebar(); ?>
<?php get_footer();
