<?php
/**
 * The default Sidebar. It will display on archive
 *
 * @package WordPress
 * @subpackage Magazine Lites
 * @since Magazine Lites 1.0.0
 */
?>
<?php if ( is_active_sidebar( 'archive-1' ) ) : ?>
	<aside id="sidebar" class="col col-4 col-last">
		<div id="sidebar-inner">
			<?php dynamic_sidebar( 'archive-1' ); ?>
		</div><!-- #sidebar-inner -->
	</aside><!-- #sidebar -->
<?php endif; ?>
