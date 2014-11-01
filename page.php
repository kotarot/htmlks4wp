<?php get_header(); ?>
<!-- page.php -->

<?php if (have_posts()) :
while (have_posts()) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<h1><a class="post-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
<?php if (is_front_page()) :
    the_content();
else : ?>
<div class="col_12 content content-post">
	<?php the_content(); ?>
</div><!-- /.col_12 .content .content-post -->
<?php endif; ?>

</div><!-- /#post-<?php the_ID(); ?> -->

<?php endwhile;
else : ?>

<h1>Page Not Found (&gt; &lt;)</h1>
<div class="col_12">
	<a href="<?php echo home_url('/'); ?>">Back to Top</a>
</div><!-- /.col_12 -->

<?php endif; ?>

<?php get_footer(); ?>
