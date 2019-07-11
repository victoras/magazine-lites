<?php
/**
 * Page
 *
 * @package WordPress
 * @subpackage Magazine Lites
 * @since Magazine Lites 1.0.0
 */
?>

<?php
get_header(); ?>
	<div id="content" class="col col-8">
		<?php
			// loop posts
			while ( have_posts() ) : the_post();
				// output from template
				get_template_part( 'template-parts/content', 'page' );
				// comments
				if ( comments_open() || get_comments_number() ) { comments_template(); }
			endwhile;
		?>
	</div><!-- #content -->
	<?php get_sidebar(); ?>
<?php get_footer();
