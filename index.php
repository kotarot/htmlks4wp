<?php get_header(); ?>
<!-- index.php -->

<?php if (is_home()) : ?>
<div>
	<ul class="breadcrumbs">
		<li><a href="<?php echo home_url('/'); ?>">Top</a></li>
		<li><a href="<?php echo home_url('/blog/'); ?>">Blog</a></li>
	</ul>
</div>
<?php endif; ?>
<?php if (is_category()) : ?>
<div>
	<ul class="breadcrumbs">
		<li><a href="<?php echo home_url('/'); ?>">Top</a></li>
		<li><a href="<?php echo home_url('/blog/'); ?>">Blog</a></li>
<?php
$terms = get_terms(
    'category',
    array(
        'orderby' => 'count',
        'hide_empty' => 'true'
    ));
if (!empty($terms) && !is_wp_error($terms)) {
    foreach ($terms as $term) {
        if (is_category($term->term_id)) {
            echo '<li><a href="' . home_url('/') . 'blog/category/' . $term->slug . '/">Category: ' . $term->name . '</a></li>';
            break;
        }
    }
}
?>
	</ul>
</div>
<?php endif; ?>
<?php if (is_tag()) : ?>
<div>
	<ul class="breadcrumbs">
		<li><a href="<?php echo home_url('/'); ?>">Top</a></li>
		<li><a href="<?php echo home_url('/blog/'); ?>">Blog</a></li>
<?php
$terms = get_terms(
    'post_tag',
    array(
        'orderby' => 'count',
        'hide_empty' => 'true'
    ));
if (!empty($terms) && !is_wp_error($terms)) {
    foreach ($terms as $term) {
        if (is_tag($term->term_id)) {
            echo '<li><a href="' . home_url('/') . 'blog/tag/' . $term->slug . '/">Tag: ' . $term->name . '</a></li>';
            break;
        }
    }
}
?>
	</ul>
</div>
<?php endif; ?>
<?php if (is_search()) : ?>
<div>
	<ul class="breadcrumbs">
		<li><a href="<?php echo home_url('/'); ?>">Top</a></li>
		<li><a href="<?php echo home_url('/blog/'); ?>">Blog</a></li>
		<li><?php _e('Search Result', 'htmlks4wp'); ?></li>
	</ul>
</div>
<?php endif; ?>

<?php if (have_posts()) :
while (have_posts()) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<h1><a class="post-title entry-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
<div class="post-meta attributes">
	<span class="post-date date updated"><i class="fa fa-calendar"></i> Posted on <?php echo get_the_date(); ?></span>,
	<span class="post-category"><i class="fa fa-folder"></i> Category: <?php the_category(' '); ?></span>,
	<span class="post-tags"><i class="fa fa-tags"></i> <?php the_tags('Tags: ', ' '); ?></span>,
	<span class="post-comments"><i class="fa fa-comments"></i> <?php comments_popup_link('0 comments', '1 comment', '% comments'); ?></span>
</div><!-- /.post-meta .attributes -->
<div class="col_12 content content-post content-post-index">
	<?php the_content('<p>Read more &raquo;</p>'); ?>
</div><!-- /.col_12 .content .content-post -->
</div><!-- /#post-<?php the_ID(); ?> -->

<?php endwhile;
else : ?>

<h1>Content Not Found (&gt; &lt;)</h1>
<div class="col_12">
	<a href="<?php echo home_url('/'); ?>"><?php _e('Back to Top', 'htmlks4wp'); ?></a>
</div><!-- /.col_12 -->

<?php endif; ?>

<?php if ($wp_query->max_num_pages > 1) : ?>
<div class="pager">
<?php
global $wp_rewrite;
$paginate_base = get_pagenum_link(1);
if (strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()) {
    // for search results etc.
    $paginate_format = '';
    $paginate_base = add_query_arg('paged', '%#%');
} else {
    // for blog post etc.
    $paginate_format = (substr($paginate_base, -1, 1) == '/' ? '' : '/') . user_trailingslashit('page/%#%/', 'paged');
    $paginate_base .= '%_%';
}
echo $pager = paginate_links(array(
    'base'      => $paginate_base,
    'format'    => $paginate_format,
    'total'     => $wp_query->max_num_pages,
    'mid_size'  => 3,
    'current'   => ($paged ? $paged : 1),
    'prev_text' => '<i class="fa fa-caret-left"></i>',
    'next_text' => '<i class="fa fa-caret-right"></i>',
    'type'      => 'list'
));
/*if ($paged == 0 || $paged == 1) {
    $next = array_pop($pager);
}
if ($paged == $wp_query->max_num_pages) { // Note: type of $wp_query->max_num_pages is "float"
    $prev = array_shift($pager);
}
foreach ($pager as $p) {
    echo '<li>' . $p . '</li>';
}*/
?>
</div>
<div class="pager attributes"></div><!-- /.pager .attributes -->
<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
