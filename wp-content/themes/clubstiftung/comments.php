<?php
/**
 *	The template for displaying comments.
 *
 *	This is the template that displays the area of the page that contains both the current comments
 *	and the comment form.
 *
 *	@link https://codex.wordpress.org/Template_Hierarchy
 *
 *	@package WordPress
 *	@subpackage clubstiftung
 */
?>
<?php
if ( post_password_required() ) {
	return;
}
?>

<div id="comments">
	<?php if ( have_comments() ): ?>
			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
				<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
					<h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'clubstiftung' ); ?></h2>
					<div class="nav-links">
						<div class="nav-previous"><?php previous_comments_link( __( 'Older Comments', 'clubstiftung' ) ); ?></div>
						<div class="nav-next"><?php next_comments_link( __( 'Newer Comments', 'clubstiftung' ) ); ?></div>
					</div><!-- .nav-links -->
				</nav><!-- #comment-nav-above -->
			<?php endif; ?>

			<div id="comments-list">
				<h3 class="medium"><?php printf( esc_html( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'clubstiftung' ) ), number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' ); ?></h3>
				<ul class="comments">
					<?php
					wp_list_comments( array(
						'callback'	=> 'clubstiftung_comment',
						'max_depth'	=> 5
					) );
					?>
				</ul><!--/.comments-->
			</div><!--/#comments-list-->

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
				<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
					<h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'clubstiftung' ); ?></h2>
					<div class="nav-links">

						<div class="nav-previous"><?php previous_comments_link( __( 'Older Comments', 'clubstiftung' ) ); ?></div>
						<div class="nav-next"><?php next_comments_link( __( 'Newer Comments', 'clubstiftung' ) ); ?></div>

					</div><!-- .nav-links -->
				</nav><!-- #comment-nav-below -->
			<?php endif; ?>
	<?php endif; ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'clubstiftung' ); ?></p>
	<?php endif; ?>

	<?php
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

	if($commenter['comment_author'] != '')
		$name = esc_attr($commenter['comment_author']);
	else
		$name = '';

	if($commenter['comment_author_email'] != '')
		$email = esc_attr($commenter['comment_author_email']);
	else
		$email = '';

	if($commenter['comment_author_url'] != '')
		$url = esc_attr($commenter['comment_author_url']);
	else
		$url = '';

	$fields =  array(
		'author'	=> '<div class="row"><div class="col-sm-4"><input class="input-full" placeholder="'. __( 'Name', 'clubstiftung' ) .'" name="author" type="text" value="' . esc_attr( $name ) . '" ' . $aria_req . ' /></div>',
		'email'		=> '<div class="col-sm-4"><input class="input-full" placeholder="'. __( 'Email', 'clubstiftung' ) .'" name="email" type="email" value="' . esc_attr( $email ) . '" ' . $aria_req . ' /></div>',
		'url'		=> '<div class="col-sm-4"><input class="input-full" placeholder="'. __( 'Website', 'clubstiftung' ) .'" name="url" type="url" value="' . esc_url( $url ) . '" /></div>'
	);

	if( is_user_logged_in() ) {
		$comment_textarea = '<div class="row"><div class="col-sm-12"><textarea placeholder="'. __( 'Message', 'clubstiftung' ) .'" name="comment" aria-required="true"></textarea></div><!--/.col-sm-12--></div><!--/.row-->';
	} else {
		$comment_textarea = '<div class="col-sm-12"><textarea placeholder="'. __( 'Message', 'clubstiftung' ) .'" name="comment" aria-required="true"></textarea></div><!--/.col-sm-12--></div><!--/.row-->';
	}
	?>
	<?php comment_form( array( 'fields' => $fields, 'comment_field' => $comment_textarea, 'id_submit' => 'input-submit', 'label_submit' => esc_attr__( 'Send', 'clubstiftung' ), 'title_reply' => esc_attr__( 'Leave a comment', 'clubstiftung' ), 'title_reply_to' => esc_attr__( 'Leave a comment to %s', 'clubstiftung' ) ) ); ?>
</div><!--/#comments-->