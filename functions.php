<?php

// Setups
load_theme_textdomain( 'htmlks4wp', get_template_directory() . '/languages' );

remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');

// Remove some lines in <head>
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_shortlink_wp_head');

add_theme_support('automatic-feed-links');
add_theme_support('menus');
add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));

// For post-thumbnails
add_theme_support('post-thumbnails');
set_post_thumbnail_size(320, 320, true);

// More images
add_image_size('thumb-150', 150, 150, true);
add_image_size('small-150', 150, 150, false);
add_image_size('small-300', 300, 300, false);
add_image_size('small-320', 320, 320, false);
add_image_size('medium-600', 600, 600, false);
add_image_size('medium-640', 640, 640, false);
add_image_size('large-800', 800, 800, false);
add_image_size('large-1024', 1024, 1024, false);

// Customize of inserting images.
add_filter('image_send_to_editor', 'htmlks4wp_image_send_to_editor');
function htmlks4wp_image_send_to_editor($html, $id = '', $caption = '', $title = '', $align = '', $url = '', $size = '', $alt = '') {
    $html = str_replace('><img', '><div class="wp-image-wrapper"><img', $html);
    $html = str_replace('/></a>', '/></div></a>', $html);
    return $html;
}

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

// Mobile-Detect
require_once(dirname(__FILE__) . '/Mobile-Detect-2.8.12/Mobile_Detect.php');
$md = new Mobile_Detect;
$md_is_mobile = $md->isMobile();
$md_is_tablet = $md->isTablet();
$md_is_mobile_strict = ($md_is_mobile && !$md_is_tablet);
$md_is_pc = !$md_is_mobile;

// http://themeshaper.com/2010/06/03/sample-theme-options/
// Load up our awesome theme options
require_once ( get_stylesheet_directory() . '/theme-options.php' );

// User-specified functions (e.g. shortcodes)
require_once ( get_template_directory() . '/functions-userspecified.inc.php' );

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

// Remove "tag" class from classes of body-tag,
// to avoid butting class-names (wordpress and google-code-pretiffy)
function remove_classes_from_body_class($wp_classes, $extra_classes) {
    if ( ($key = array_search('tag', $wp_classes)) !== false ) {
        unset($wp_classes[$key]);
    }
    return array_merge($wp_classes, (array)$extra_classes);
}
add_filter('body_class', 'remove_classes_from_body_class', 10, 2);

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

// Jump to the beginning of the content, if READ MORE pressed
function remove_more_jump_link($link) {
    $offset = strpos($link, '#more-');
    if ($offset) {
        $end = strpos($link, '"',$offset);
    }
    if ($end) {
        $link = substr_replace($link, '', $offset, $end-$offset);
    }
    return $link;
}
add_filter('the_content_more_link', 'remove_more_jump_link');

?>
