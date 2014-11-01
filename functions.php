<?php
remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');

add_theme_support('automatic-feed-links');
add_theme_support('menus');
add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));

register_nav_menu('Header Nav', __('Nav bar', 'htmlks4wp'));

register_sidebar(array(
    'name'          => 'Sidebar 1',
    'id'            => 'sidebar-1',
    'description'   => 'Widget area of Sidebar 1',
    'before_widget' => '<div id="%1$s" class="col_4 widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="widgettitle">',
    'after_title'   => '</h4>'
));

function comments_list_cb($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
    <li id="li-comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
        <div id="comment-<?php comment_ID(); ?>" class="comment-callout">
            <div>
                <span class="comment-author vcard">
                    <?php echo get_avatar($comment, $size = $args['avatar_size']); ?>
                    <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()); ?>
                </span><!-- /.comment-author .vcard -->
                <span class="comment-meta commentmetadata">
                    <a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()); ?></a>
                    <?php edit_comment_link(__('(Edit)'), '  ', ''); ?>
                </span><!-- /.comment-meta commentmetadata -->
                <span class="reply">
                    <i class="icon-reply"></i><?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                </span><!-- /.reply -->
            </div>
            <?php if ($comment->comment_approved === '0') : ?>
            <em><?php _e('Your comment is awaiting moderation.'); ?></em>
            <br>
            <div style="color:#999;"><?php comment_text(); ?></div>
            <?php else :
            comment_text();
            endif; ?>
        </div><!-- /#comment-<?php comment_ID(); ?> -->
<?php
}

// Alternative function of allowed_tags().
function allowed_tags_with_code() {
    global $allowedtags;
    $allowed = '';
    foreach ((array)$allowedtags as $tag => $attrs) {
        $onetag = '<' . $tag;
        if (0 < count($attrs)) {
            foreach ($attrs as $attr => $limits) {
                $onetag .= ' ' . $attr . '=""';
            }
        }
        $onetag .= '>';
        $allowed .= '<code>' . htmlentities($onetag) . '</code> ';
    }
    return $allowed;
}

?>
