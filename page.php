<?php get_header(); ?>
<!-- page.php -->

<?php if (have_posts()) :
while (have_posts()) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php if (!is_front_page()) : ?>
<div>
    <ul class="breadcrumbs">
        <li><a href="<?php echo home_url('/'); ?>">Top</a></li>
<?php
foreach (array_reverse(get_post_ancestors($post->ID)) as $parid) {
    $title = get_page($parid)->post_title;
    echo '<li><a href="' . get_page_link($parid) . '" title="' . $title . '">' . $title . '</a></li>';
} ?>
        <li><?php echo the_title(); ?></li>
    </ul>
</div>
<?php endif; ?>

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
