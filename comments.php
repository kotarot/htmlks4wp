<div id="comment-area">
<?php if (have_comments()) : ?>
<h3 id="comments">Comments</h3>
<ol class="comments-list">
<?php
wp_list_comments(array(
    'callback'    => 'comments_list_cb',
    'avatar_size' => 24,
    'format'      => 'html5'
));
?>
</ol>
<?php endif; ?>
<?php
$aria_req = ( $req ? " aria-required='true'" : '' );
comment_form(array(
    'fields' => array(
        'author' =>
        '<p class="comment-form-author"><label for="author" class="col_1">' . __('Name', 'domainreference') .
        ( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
        '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) .
        '" size="30"' . $aria_req . ' /></p>',
        'email' =>
        '<p class="comment-form-email"><label for="email" class="col_1">' . __('Email', 'domainreference') .
        ( $req ? '<span class="required">*</span> ' : ' ' ) . '</label>' .
        '<input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) .
        '" size="30"' . $aria_req . ' /></p>'),
    'comment_field' =>  '<p class="comment-form-comment"><label for="comment" class="col_1">' . _x('Comment', 'noun') .
                        '</label><textarea id="comment" name="comment" cols="30" rows="8" aria-required="true">' .
                        '</textarea></p>',
    'comment_notes_after' => '<p class="form-allowed-tags">' .
                             sprintf(__('You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s'),
                                     allowed_tags_with_code()) . '</p>'
));
?>
</div><!-- /#comment-area -->
