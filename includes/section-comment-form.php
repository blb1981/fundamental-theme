<?php
  $req = get_option( 'require_name_email' );
  $commenter = wp_get_current_commenter();
  // $html5 = 'html5' === $args['format'];
  $comment_args = array(
    'class_submit' => 'btn btn-primary submit',
    'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment *', 'noun' ) . '</label> <textarea id="comment" name="comment" class="form-control" cols="45" rows="4" aria-required="true" required="required"></textarea></p>',
    'fields' => array(
      
      'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
      '<input id="author" name="author" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . 'aria-required="true"' . "required" . ' /></p>',
      
      'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
      '<input id="email" name="email" class="form-control" ' . ( 'type="email"') . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . 'aria-required="true"' . "required"  . ' /></p>',
      
      'url'    => '<p class="comment-form-url"><label for="url">' . __( 'Website' ) . '</label> ' .
      '<input id="url" name="url" class="form-control" ' . ( 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
      )
  );
  comment_form($comment_args);
?>