<?php if ( magazine_lite_get_theme_mod( 'toolbar_display', 'yes' ) == 'yes' ) : ?>

<div id="top-bar">

	<div class="wrapper clearfix">

		<div id="top-bar-navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'top-bar', 'menu_id' => 'top-bar-menu', 'fallback_cb' => false ) ); ?>
		</div><!-- #top-bar-navigation -->

		<div id="top-bar-mobile-navigation">
			<span class="top-bar-mobile-nav-hook"><span class="fab fa-reorder"></span><?php magazine_lite_mobile_nav( 'top-bar' ); ?></span>
		</div><!-- #top-bar-navigation -->

		<?php if ( magazine_lite_get_theme_mod( 'toolbar_options', 'search-form' ) == 'search-form' ) : ?>
			<div id="top-bar-search">
				<?php get_search_form(); ?>
				<span class="fab fa-search"></span>
			</div><!-- #top-bar-search -->
		<?php else : ?>
			<div id="top-bar-social">

				<?php if ( magazine_lite_get_theme_mod( 'social_twitter', false ) ) : $has_icons = true; ?>
					<a class="social-link-twitter" href="<?php echo esc_attr( magazine_lite_get_theme_mod( 'social_twitter', false ) ); ?>" target="_blank"><span class="fab fa-twitter"></span></a>
				<?php endif; ?>
				<?php if ( magazine_lite_get_theme_mod( 'social_facebook', false ) ) : $has_icons = true; ?>
					<a class="social-link-facebook" href="<?php echo esc_attr( magazine_lite_get_theme_mod( 'social_facebook', false ) ); ?>" target="_blank"><span class="fab fa-facebook"></span></a>
				<?php endif; ?>
				<?php if ( magazine_lite_get_theme_mod( 'social_youtube', false ) ) : $has_icons = true; ?>
					<a class="social-link-youtube" href="<?php echo esc_attr( magazine_lite_get_theme_mod( 'social_youtube', false ) ); ?>" target="_blank"><span class="fab fa-youtube"></span></a>
				<?php endif; ?>
				<?php if ( magazine_lite_get_theme_mod( 'social_vimeo', false ) ) : $has_icons = true; ?>
					<a class="social-link-vimeo" href="<?php echo esc_attr( magazine_lite_get_theme_mod( 'social_vimeo', false ) ); ?>" target="_blank"><span class="fab fa-vimeo"></span></a>
				<?php endif; ?>
				<?php if ( magazine_lite_get_theme_mod( 'social_tumblr', false ) ) : $has_icons = true; ?>
					<a class="social-link-tumblr" href="<?php echo esc_attr( magazine_lite_get_theme_mod( 'social_tumblr', false ) ); ?>" target="_blank"><span class="fab fa-tumblr"></span></a>
				<?php endif; ?>
				<?php if ( magazine_lite_get_theme_mod( 'social_pinterest', false ) ) : $has_icons = true; ?>
					<a class="social-link-pinterest" href="<?php echo esc_attr( magazine_lite_get_theme_mod( 'social_pinterest', false ) ); ?>" target="_blank"><span class="fab fa-pinterest"></a>
				<?php endif; ?>
				<?php if ( magazine_lite_get_theme_mod( 'social_linkedin', false ) ) : $has_icons = true; ?>
					<a class="social-link-linkedin" href="<?php echo esc_attr( magazine_lite_get_theme_mod( 'social_linkedin', false ) ); ?>" target="_blank"><span class="fab fa-linkedin"></a>
				<?php endif; ?>
				<?php if ( magazine_lite_get_theme_mod( 'social_instagram', false ) ) : $has_icons = true; ?>
					<a class="social-link-instagram" href="<?php echo esc_attr( magazine_lite_get_theme_mod( 'social_instagram', false ) ); ?>" target="_blank"><span class="fab fa-instagram"></span></a>
				<?php endif; ?>
				<?php if ( magazine_lite_get_theme_mod( 'social_github', false ) ) : $has_icons = true; ?>
					<a class="social-link-github" href="<?php echo esc_attr( magazine_lite_get_theme_mod( 'social_github', false ) ); ?>" target="_blank"><span class="fab fa-github"></span></a>
				<?php endif; ?>
				<?php if ( magazine_lite_get_theme_mod( 'social_googleplus', false ) ) : $has_icons = true; ?>
					<a class="social-link-googleplus" href="<?php echo esc_attr( magazine_lite_get_theme_mod( 'social_googleplus', false ) ); ?>" target="_blank"><span class="fab fa-google-plus"></span></a>
				<?php endif; ?>
				<?php if ( magazine_lite_get_theme_mod( 'social_dribbble', false ) ) : $has_icons = true; ?>
					<a class="social-link-dribbble" href="<?php echo esc_attr( magazine_lite_get_theme_mod( 'social_dribbble', false ) ); ?>" target="_blank"><span class="fab fa-dribbble"></span></a>
				<?php endif; ?>
				<?php if ( magazine_lite_get_theme_mod( 'social_dropbox', false ) ) : $has_icons = true; ?>
					<a class="social-link-dropbox" href="<?php echo esc_attr( magazine_lite_get_theme_mod( 'social_dropbox', false ) ); ?>" target="_blank"><span class="fab fa-dropbox"></span></a>
				<?php endif; ?>
				<?php if ( magazine_lite_get_theme_mod( 'social_flickr', false ) ) : $has_icons = true; ?>
					<a class="social-link-flickr" href="<?php echo esc_attr( magazine_lite_get_theme_mod( 'social_flickr', false ) ); ?>" target="_blank"><span class="fab fa-flickr"></span></a>
				<?php endif; ?>
				<?php if ( magazine_lite_get_theme_mod( 'social_foursquare', false ) ) : $has_icons = true; ?>
					<a class="social-link-foursquare" href="<?php echo esc_attr( magazine_lite_get_theme_mod( 'social_foursquare', false ) ); ?>" target="_blank"><span class="fab fa-foursquare"></a>
				<?php endif; ?>
				<?php if ( magazine_lite_get_theme_mod( 'social_behance', false ) ) : $has_icons = true; ?>
					<a class="social-link-behance" href="<?php echo esc_attr( magazine_lite_get_theme_mod( 'social_behance', false ) ); ?>" target="_blank"><span class="fab fa-behance"></span></a>
				<?php endif; ?>
				<?php if ( magazine_lite_get_theme_mod( 'social_vine', false ) ) : $has_icons = true; ?>
					<a class="social-link-vine" href="<?php echo esc_attr( magazine_lite_get_theme_mod( 'social_vine', false ) ); ?>" target="_blank"><span class="fab fa-vine"></span></a>
				<?php endif; ?>
				<?php if ( magazine_lite_get_theme_mod( 'social_rss', false ) ) : $has_icons = true; ?>
					<a class="social-link-rss" href="<?php echo esc_attr( magazine_lite_get_theme_mod( 'social_rss', false ) ); ?>" target="_blank"><span class="fab fa-rss"></span></a>
				<?php endif; ?>
			</div><!-- #top-bar-search -->

		<?php endif; ?>




	</div><!-- .wrapper -->

</div><!-- #top-bar -->

<?php endif; ?>
