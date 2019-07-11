<?php
/**
 * Table of Contents
 *
 * magazine_lite_posts_pagination ( pagination )
 * magazine_lite_comment_layout ( comment layout )
 * magazine_lite_mobile_nav ( mobile navigation )
 * magazine_lite_custom_logo ( custom image logo )
 */

if ( ! function_exists( 'magazine_lite_posts_pagination' ) ) :

	/**
	 * Output post pagination
	 *
	 * @since 1.0
	 */
	function magazine_lite_posts_pagination( $atts = false ) {

		// The output will be stored here
		$output = '';

		if ( is_integer( get_query_var( 'paged' ) ) ) {
			$paged = get_query_var( 'paged' );
		} elseif ( is_integer( get_query_var( 'page' ) ) ) {
			$paged = get_query_var( 'page' );
		}

		if ( ! isset( $atts['force_number'] ) ) $force_number = false; else $force_number = $atts['force_number'];
		if ( ! isset( $atts['pages'] ) ) $pages = false; else $pages = $atts['pages'];
		if ( ! isset( $atts['type'] ) ) $type = 'numbered'; else $type = $atts['type'];
		$range = 2;

		$showitems = ($range * 2)+1;

		if ( empty ( $paged ) ) { $paged = 1; }

		if ( $pages == '' ) {
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if( ! $pages ) {
				$pages = 1;
			}
		}

		if( 1 != $pages ) {

			?>
			<div class="pagination pagination-type-<?php echo esc_attr( $type ); ?>">
				<ul class="clearfix">
					<?php

						if ( $type == 'numbered' ) {

							if($paged > 2 && $paged > $range+1 && $showitems < $pages) { echo "<li class='inactive'><a href='".get_pagenum_link(1)."'>&laquo;</a></li>"; }
							if($paged > 1 && $showitems < $pages) { echo "<li class='inactive'><a href='".get_pagenum_link($paged - 1)."' >&lsaquo;</a></li>"; }

							for ($i=1; $i <= $pages; $i++){
								if (1 != $pages &&(!($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems)){
									echo ($paged == $i)? "<li class='active'><a href='".get_pagenum_link($i)."'>".$i."</a></li>":"<li class='inactive'><a class='inactive' href='".get_pagenum_link($i)."'>".$i."</a></li>";
								}
							}

							if ($paged < $pages && $showitems < $pages) { echo "<li class='inactive'><a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a></li>"; }
							if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) { echo "<li class='inactive'><a href='".get_pagenum_link($pages)."'>&raquo;</a></li>"; }

						} elseif ( $type == 'prevnext' ) {

							if($paged > 1 ) { echo "<li class='inactive fl'><a href='".get_pagenum_link($paged - 1)."' >" . esc_html__( 'Newer', 'magazine-lites' ) . "</a></li>"; }
							if ($paged < $pages ) { echo "<li class='inactive fr'><a href='".get_pagenum_link($paged + 1)."'>" . esc_html__( 'Older', 'magazine-lites' ) . "</a></li>"; }

						} elseif ( $type == 'default' ) {

							posts_nav_link();

						}

						if ( $type == 'loadmore' ) {
							if ($paged < $pages ) {
								echo "<li class='pagination-load-more active'><span class='pagination-load-more-line'></span><a href='".get_pagenum_link($paged + 1)."'><span class='fa fa-refresh'></span>" . esc_html__( 'LOAD MORE', 'magazine-lites' ) . "</a></li>";
							} else {
								echo "<li class='pagination-load-more inactive'><span class='pagination-load-more-line'></span><a href='#'>" . esc_html__( 'NO MORE POSTS', 'magazine-lites' ) . "</a></li>";
							}
						}

					?>
				</ul>

				<?php if ( $type == 'loadmore' ) : ?>
					<div class="load-more-temp"></div>
				<?php endif; ?>

			</div><!-- .pagination --><?php
		}

	}

endif;  // End if mdrt_posts_slider exists

if ( ! function_exists( 'magazine_lite_comment_layout' ) ) :

	/**
	 * Template for comments and pingbacks.
	 *
	 * @since 1.0
	 */
	function magazine_lite_comment_layout( $comment, $args, $depth ) {

		switch ( $comment->comment_type ) :

			case 'pingback' :
			case 'trackback' :
				?>
				<li class="comments-pingback">
					<p><?php esc_html_e( 'Pingback:', 'magazine-lites' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( '(Edit)', 'magazine-lites' ), ' ' ); ?></p>
				<?php
			break;
			default :

				?>

					<li <?php comment_class( 'comment' ); ?> id="comment-<?php comment_ID(); ?>">

						<div class="comment-inner">

							<span class="comment-author-avatar"><?php echo get_avatar( $comment, 65 ); ?></span>

							<div class="comment-info clearfix">

								<ul class="comment-meta clearfix">
									<li class="comment-meta-author"><?php echo get_comment_author_link(); ?></li>
									<li class="comment-meta-date"><?php echo get_comment_date(); ?></li>
								</ul>

								<span class="comment-reply">
									<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
								</span>

							</div><!-- .comment-info -->

							<div class="comment-main clearfix">

								<?php if ( $comment->comment_approved == '0' ) : ?>
									<p><em><?php esc_html_e( 'Your comment is awaiting moderation.', 'magazine-lites' ); ?></em></p>
								<?php endif; ?>
								<?php comment_text(); ?>

							</div><!-- .comment-main -->

						</div><!-- .comment-inner -->

					<?php

				break;
		endswitch;

	}

endif; // End if magazine_lite_comment_layout

if ( ! function_exists( 'magazine_lite_mobile_nav' ) ) :

	/**
	 * Handles output of mobile nav
	 *
	 * @since 1.0
	 */
	function magazine_lite_mobile_nav( $location = 'primary' ) {

		$mobile_nav_output = '';
		if( has_nav_menu($location) ) {

			$locations = get_nav_menu_locations();
			$menu = wp_get_nav_menu_object($locations[$location]);
			$menu_items = wp_get_nav_menu_items($menu->term_id);
			$mobile_nav_output = '';

			?>

			<select>
				<option><?php esc_html_e( '- Select Page -', 'magazine-lites' ); ?></option>
				<?php foreach ( $menu_items as $key => $menu_item ) : ?>
					<?php
						$title = $menu_item->title;
						$url = $menu_item->url;
						$nav_selected = '';
					?>
					<?php if($menu_item->post_parent !== 0) : ?>
						<option value="<?php echo esc_url( $url ); ?>"> - <?php echo esc_html( $title ); ?></option>
					<?php else : ?>
						<option value="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $title ); ?></option>
					<?php endif; ?>
				<?php endforeach; ?>
			</select>
			<?php

		}

	}

endif; // End if magazine_lite_mobile_nav

if ( ! function_exists( 'magazine_lite_custom_logo' ) ) :

	/**
	 * Displays custom logo
	 *
	 * @since 1.0
	 */
	function magazine_lite_custom_logo() {
		if ( function_exists( 'the_custom_logo' ) ) {
			echo '<div itemscope itemtype="http://schema.org/Organization">';
				the_custom_logo();
			echo '</div>';
		}
	}

endif; // End if magazine_lite_custom_logo exists
