<?php get_header(); ?>
<!-- index.php -->

<?php if (is_category()) : ?>
<div>
	<ul class="breadcrumbs">
		<li><a href="<?php echo home_url('/'); ?>">Top</a></li>
		<li><a href="<?php echo home_url('/') . 'blog/'; ?>">Blog</a></li>
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
            echo '<li><a href="' . home_url('/') . 'blog/category/' . $term->slug . '/">Category: "' . $term->name . '"</a></li>';
            $filtered_by = 'Filtered by Category: "' . $term->name . '".';
            break;
        }
    }
}
?>
	</ul>
</div>
<p><?php echo $filtered_by; ?></p>
<?php endif; ?>
<?php if (is_tag()) : ?>
<div>
	<ul class="breadcrumbs">
		<li><a href="<?php echo home_url('/'); ?>">Top</a></li>
		<li><a href="<?php echo home_url('/') . 'blog/'; ?>">Blog</a></li>
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
            echo '<li><a href="' . home_url('/') . 'blog/tag/' . $term->slug . '/">Tag: "' . $term->name . '"</a></li>';
            $filtered_by = 'Filtered by Tag: "' . $term->name . '".';
            break;
        }
    }
}
?>
	</ul>
</div>
<p><?php echo $filtered_by; ?></p>
<?php endif; ?>
<?php if (is_search()) : ?>
<p>Search results.</p>
<?php endif; ?>

<?php if (have_posts()) :
while (have_posts()) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<h1><a class="post-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
<div class="post-meta attributes">
	<span class="post-date"><i class="icon-calendar"></i> Posted on <?php echo get_the_date(); ?></span>,
	<span class="post-category"><i class="icon-folder-close"></i> Category: <?php the_category(' '); ?></span>,
	<span class="post-tags"><i class="icon-tags"></i> <?php the_tags('Tags: ', ' '); ?></span>,
	<span class="post-comments"><i class="icon-comments"></i> <?php comments_popup_link('0 comments', '1 comment', '% comments'); ?></span>
</div><!-- /.post-meta .attributes -->
<div class="col_12 content content-post content-post-index">
	<?php the_content('Read more &raquo;'); ?>
</div><!-- /.col_12 .content .content-post -->
</div><!-- /#post-<?php the_ID(); ?> -->

<?php endwhile;
else : ?>

<h1>Content Not Found (&gt; &lt;)</h1>
<div class="col_12">
	<a href="<?php echo home_url('/'); ?>">Back to Top</a>
</div><!-- /.col_12 -->

<?php endif; ?>

<?php if ($wp_query->max_num_pages > 1) : ?>
<div class="pager attributes">
	<?php previous_posts_link('&laquo; Next posts (newer)'); ?>
	<span class="delimiter"></span>
	<?php next_posts_link('Previous posts (older) &raquo;'); ?>
</div><!-- /.pager .attributes -->
<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
