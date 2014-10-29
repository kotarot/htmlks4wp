<?php get_header(); ?>
<!-- index.php -->

<?php if (is_category()) : ?>
Filtered by Category.
<?php endif; ?>
<?php if (is_tag()) : ?>
Filtered by Tag.
<?php endif; ?>
<?php if (is_search()) : ?>
Search results.
<?php endif; ?>

<?php if (have_posts()) :
while (have_posts()) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<h2><a class="post-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
<div class="post-meta attributes">
	<span class="post-date"><i class="icon-calendar"></i> Posted on <?php echo get_the_date(); ?></span>,
	<span class="post-category"><i class="icon-folder-close"></i> Category: <?php the_category(' '); ?></span>,
	<span class="post-tags"><i class="icon-tags"></i> <?php the_tags('Tags: ', ' '); ?></span>,
	<span class="post-comments"><i class="icon-comments"></i> <?php comments_popup_link('0 comments', '1 comment', '% comments'); ?></span>
</div><!-- /.post-meta .attributes -->
<div class="col_12 content content-post">
	<?php the_content('Read more &raquo;'); ?>
</div><!-- /.col_12 .content .content-post -->
</div><!-- /#post-<?php the_ID(); ?> -->

<?php endwhile;
else : ?>

<h2>Content Not Found (&gt; &lt;)</h2>
<div class="col_12">
	<a href="<?php echo home_url('/'); ?>">Back to Top</a>
</div><!-- /.col_12 -->

<?php endif; ?>

<?php if ($wp_query->max_num_pages > 1) : ?>
<div class="pager attributes">
	<?php next_posts_link('&laquo; Previous posts (older)'); ?>
	<span class="delimiter"></span>
	<?php previous_posts_link(' Next posts (newer) &raquo;'); ?>
</div><!-- /.pager .attributes -->
<?php endif; ?>

<?php get_footer(); ?>
