<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area runner-comment-form">

	<?php if ( have_comments() ) : ?>
	<div class="comment-list p-10">
    <h3>Comments</h3>
    <ol class="">
      <?php
        wp_list_comments( array(
          'style'       => 'ol',
          'short_ping'  => false,
          'avatar_size' => 34,
        ) );
      ?>
    </ol>
  </div>

	<?php if ( ! comments_open() ) : ?>
	<p class="no-comments"><?php _e( 'Comments are closed.', 'twentyfourteen' ); ?></p>
	<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php comment_form( array( 'logged_in_as' => '','title_reply' => 'Leave a comment', 'label_submit' => 'Submit', 'comment_notes_after' => '' ) ); ?>

</div><!-- #comments -->

<style>
.runner-comment-form .comment-list {
	background: #e3e5e3 ;
}
.runner-comment-form .avatar,
.runner-comment-form .comment-metadata,
.runner-comment-form .reply,
.runner-comment-form .comment-form label {
  display: none;
}
.runner-comment-form .comment-list h3 {
	color: #1f9b22;
  border-bottom: 1px solid #1f9b22;
}
.runner-comment-form .comment-reply-title {
  color: #1f9b22;
}
.runner-comment-form .comment-body {
  border-bottom: 1px solid #fff;
  margin-bottom: 15px;
}
.runner-comment-form .comment-form #comment {
  background: #e3e5e3 none repeat scroll 0 0;
    width: 100%;	
}
.runner-comment-form .comment-form #submit {
  background: #1f9b22 none repeat scroll 0 0 !important;
	color: #fff;
	-moz-user-select: none;
	background-image: none;
	border: 1px solid transparent;
	border-radius: 4px;
	cursor: pointer;
	display: inline-block;
	font-size: 14px;
	font-weight: 400;
	line-height: 1.42857;
	margin-bottom: 0;
	padding: 6px 12px;
	text-align: center;
	vertical-align: middle;
	white-space: nowrap;	
}
</style>