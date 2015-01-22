<?php get_header(); ?>
<!-- single.php -->

<?php if (have_posts()) :
while (have_posts()) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div>
	<ul class="breadcrumbs">
		<li><a href="<?php echo home_url('/'); ?>">Top</a></li>
		<li><a href="<?php echo home_url('/') . 'blog/'; ?>">Blog</a></li>
		<li><a href="<?php the_permalink(); ?>">Article: <?php the_title(); ?></a></li>
	</ul>
</div>

<h1><a class="post-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
<div class="post-meta attributes">
	<span class="post-date"><i class="icon-calendar"></i> Posted on <?php echo get_the_date(); ?></span>,
	<span class="post-category"><i class="icon-folder-close"></i> Category: <?php the_category(' '); ?></span>,
	<span class="post-tags"><i class="icon-tags"></i> <?php the_tags('Tags: ', ' '); ?></span>,
	<span class="post-comments"><i class="icon-comments"></i> <?php comments_popup_link('0 comments', '1 comment', '% comments'); ?></span>
</div><!-- /.post-meta .attributes -->
<div class="col_12 content content-post">
	<?php the_content(); ?>
</div><!-- /.col_12 .content .content-post -->
<?php comments_template(); ?>
</div><!-- /#post-<?php the_ID(); ?> -->

<hr class="thin">

<div class="navigation">
<?php if(get_previous_post()) : ?>
	<div>&laquo;&laquo;&laquo; Previous post: <?php previous_post_link('%link', '%title'); ?></div>
<?php else : ?>
	<div>&laquo;&laquo;&laquo; Previous post: This is the first post.</div>
<?php endif; ?>
<?php if (get_next_post()) : ?>
	<div>&raquo;&raquo;&raquo; Next post: <?php next_post_link('%link', '%title'); ?></div>
<?php else : ?>
	<div>&raquo;&raquo;&raquo; Next post:  Coming soon.</div>
<?php endif; ?>
</div><!-- /.navigation -->

<?php endwhile;
else : ?>

<h1>The page not found (&gt; &lt;)</h1>
<div class="col_12 content content-post">
	<p>The page not found (&gt; &lt;)</p>
</div><!-- /.col_12 .content .content-post -->

<?php endif; ?>

<hr class="thin">

<?php get_sidebar(); ?>
<?php get_footer(); ?>
