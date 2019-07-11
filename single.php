<?php
/**
 * Single
 *
 * @package WordPress
 * @subpackage Magazine Lites
 * @since Magazine Lites 1.0.0
 */
?>

<?php get_header(); ?>
	<div id="content" class="col col-8">
		<?php
			// loop posts
			while ( have_posts() ) : the_post();
				// main content
				get_template_part( 'template-parts/content-single', get_post_format() );
				// prev next posts
				get_template_part( 'template-parts/main/prev-next-posts' );
				// comments
				if ( comments_open() || get_comments_number() ) { comments_template(); }
			// end loop
			endwhile;
		?>
	</div><!-- #content -->
	<?php get_sidebar('post'); ?>
<?php get_footer();
