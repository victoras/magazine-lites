<?php
/**
 * 404 Error Page
 *
 * @package WordPress
 * @subpackage Magazine Lites
 * @since Magazine Lites 1.0.0
 */
?>

<?php get_header(); ?>
	<div id="content" class="col col-12">
		<div class="page-single">
			<div class="page-single-main">
				<h1 class="page-title"><span><?php esc_html_e( 'Sorry, Nothing Found!', 'magazine-lites' ); ?></span></h1>
				<p><?php esc_html_e( 'Unfortunately the page you are trying to view seems to no longer exists. You may try the search form below to find it.', 'magazine-lites' ); ?></p>
				<?php get_search_form(); ?>
			</div><!-- .page-single-main -->
		</div><!-- .page-single -->
	</div><!-- #content -->
<?php get_footer();
