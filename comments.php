<?php
/**
 * Comments
 *
 * @package WordPress
 * @subpackage Magazine Lites
 * @since Magazine Lites 1.0.0
 */
?>

<?php
	/* password protected and not supplied */
	if ( post_password_required() ) { return; }
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>

		<div class="comments-section-heading clearfix">
			<h4 class="comments-section-heading-title"><?php esc_html_e( 'Comments', 'magazine-lites' ); ?></h4>
		</div>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>

			<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
				<div class="nav-links">
					<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'magazine-lites' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'magazine-lites' ) ); ?></div>
				</div><!-- .nav-links -->
			</nav><!-- #comment-nav-above -->

		<?php endif; ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
					'callback'   => 'magazine_lite_comment_layout'
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>

			<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
				<div class="nav-links">
					<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'magazine-lites' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'magazine-lites' ) ); ?></div>
				</div><!-- .nav-links -->
			</nav><!-- #comment-nav-below -->

		<?php endif; // Check for comment navigation. ?>

	<?php endif; // Check for have_comments(). ?>

	<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<div class="comments-closed"><?php esc_html_e( 'Comments are closed.', 'magazine-lites' ); ?></div>
	<?php endif; ?>

	<?php
		comment_form(array(
			'comment_field' => '<div class="comment-form-comment"><textarea id="comment" name="comment" placeholder="' . esc_attr__( 'Comment', 'magazine-lites' ) . '" aria-required="true"></textarea></div>',
			'fields' => apply_filters( 'comment_form_default_fields', array(
				'author' => '<div class="comment-form-name col col-4"><input id="author" name="author" type=text value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" placeholder="' . esc_attr__( 'Name', 'magazine-lites' ) . ' *" aria-required="true" /></div>',
				'email' => '<div class="comment-form-email col col-4"><input id="email" name="email" type=text value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" placeholder="' . esc_attr__( 'Email', 'magazine-lites' ) . ' *" aria-required="true" /></div>',
				'url' => '<div class="comment-form-website col col-4 col-last"><input id="url" name="url" type=text value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" placeholder="' . esc_attr__( 'Website', 'magazine-lites' ) . '" /></div>'
			)),
		));
	?>

</div><!-- #comments -->
