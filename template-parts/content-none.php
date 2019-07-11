<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

	<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'magazine-lites' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

<?php elseif ( is_search() ) : ?>

	<h2 class="page-single-title"><?php esc_html_e( 'Sorry, Nothing Found!', 'magazine-lites' ); ?></h2>
	<p><?php esc_html_e( 'Nothing matched your search terms. Please try again with some different keywords.', 'magazine-lites' ); ?></p>
	<?php get_search_form(); ?>

<?php else : ?>

	<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'magazine-lites' ); ?></p>
	<?php get_search_form(); ?>

<?php endif; ?>
