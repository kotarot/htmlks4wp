<?php
// is_single()     : Single page
// is_page()       : Page
// is_home()       : Top of blog
// is_front_page() : Top page

// 1. meta keywords
if (is_single()) {
    $categories = get_the_category();
    $keywords_cat = array();
    foreach ($categories as $cat) {
        $keywords_cat[] = $cat->name;
    }
    $tags = get_the_tags();
    $keywords_tag = array();
    foreach ($tags as $tag) {
        $keywords_tag[] = $tag->name;
    }
    $keywords = array_unique(array_merge(array('Blog'), $keywords_cat, $keywords_tag));
    echo '<meta name="keywords" content="' . implode(',', $keywords) . '">' . "\n";
}

// 2. meta description
$post_summary = get_bloginfo('description');
if (is_single() && $post->post_excerpt) {
    $post_summary = strip_tags($post->post_excerpt);
    $post_summary = str_replace("\n", "", $post_summary);
    $post_summary = str_replace("\r", "", $post_summary);
    $post_summary = htmlspecialchars( mb_substr($post_summary, 0, 100) ) . '...';
}
if (!is_single()) {
    $post_summary = $title . 'ÅD' . $post_summary;
}
echo '<meta name="description" content="' . $post_summary . '">' . "\n";

// 3. OGP
$og_type = 'article';
$og_title = wp_title('--', false, 'right') . get_bloginfo('name');
$og_url = 'http://yourdomain' . $_SERVER['REQUEST_URI']; // NO GOOD ><
$upload_dir = wp_upload_dir();
$og_image = $upload_dir['url'] . '/default_thumbnail.png';
if (is_home()) {
    $og_type = 'blog';
} else if (is_front_page()) {
    $og_type = 'website';
    $og_title = 'Top of ' . get_bloginfo('name');
} else if (is_page()) {
    $og_url = get_permalink();
} else if (is_single()) {
    $og_url = get_permalink();
    if (has_post_thumbnail()) {
        $image_id = get_post_thumbnail_id();
        $image = wp_get_attachment_image_src($image_id, 'full');
        $og_image = $image[0];
    }
}
echo '<meta property="og:locale" content="ja_JP">' . "\n"; // Change this to your locale.
echo '<meta property="og:type" content="' . $og_type . '">' . "\n";
echo '<meta property="og:title" content="' . $og_title . '">' . "\n";
echo '<meta property="og:url" content="' . $og_url . '">' . "\n";
echo '<meta property="og:description" content="' . $post_summary . '">' . "\n";
echo '<meta property="og:site_name" content="'; bloginfo('name'); echo '">' . "\n";
echo '<meta property="og:image" content="' . $og_image . '">' . "\n";

?>
