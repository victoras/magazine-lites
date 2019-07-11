<?php
/**
 * Header
 *
 * @package WordPress
 * @subpackage Magazine Lites
 * @since Magazine Lites 1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Meta -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Link -->
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!-- WP Head -->
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="page" class="site">
		<div id="page-inner">
			<?php get_template_part( 'template-parts/header/top-bar' ); ?>
			<header id="header" class="site-header">
				<div class="wrapper clearfix">
					<?php get_template_part( 'template-parts/header/logo' ); ?>
					<div class="header_banner">
						<?php if ( magazine_lite_get_theme_mod( 'header_banner', false ) ) : ?>
							<?php if ( magazine_lite_get_theme_mod( 'header_banner_url', false ) ) : ?>
								<a target="_blank" href="<?php echo ( magazine_lite_get_theme_mod( 'header_banner_url', false ) ); ?>">
							<?php endif; ?>
								<img src="<?php echo ( magazine_lite_get_theme_mod( 'header_banner', false ) ); ?>" alt="">
							<?php if ( magazine_lite_get_theme_mod( 'header_banner_url', false ) ) : ?>
								</a>
							<?php endif; ?>
						<?php endif; ?>
					</div>
				</div><!-- .wrapper -->
				<div class="menu-color">
					<div class="wrapper clearfix">
						<?php get_template_part( 'template-parts/header/navigation' ); ?>
						<?php get_template_part( 'template-parts/header/mobile-navigation' ); ?>
					</div>
				</div>
			</header><!-- #header -->
			<?php if ( is_front_page() || is_home() ) {
				get_template_part( 'template-parts/header/teaser' );
			} ?>
			<div id="main" class="site-content">
				<div class="wrapper clearfix">
