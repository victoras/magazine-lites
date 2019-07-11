<div id="footer-bottom">

	<div class="wrapper clearfix">

		<div id="footer-copyright">

			<?php
				$copyright = magazine_lite_get_theme_mod( 'footer_copy_text', 'Copyright 2019.' );
				$copyright = wp_kses( $copyright, array(
					'a' => array(
						'href' => true
					),
					'em' => true,
					'strong' => true,
				) );
			?>
			<?php echo $copyright; // treated with wp_kses above ( allows anchors, em and strong ) ?>
			<?php if ( get_theme_mod('wpl_copy') ){ echo esc_html(get_theme_mod('wpl_copy') ); } ?> <?php _e('Designed by', 'magazine-lites'); ?> <a href="https://wplook.com/" title="<?php _e('WPlook Themes', 'magazine-lites'); ?>" rel="nofollow" target="_blank">WPlook Themes</a>

		</div><!-- #footer-copyright -->

		<div id="footer-navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu', 'fallback_cb' => false ) ); ?>
		</div><!-- #footer-navigation -->

	</div><!-- .wrapper -->

</div><!-- #footer-bottom -->
