<?php get_header(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<h2>Page Not Found (&gt; &lt;)</h2>
<div class="col_12">
	<a href="<?php echo home_url('/'); ?>">Back to Top</a>
</div><!-- /.col_12 -->
</div><!-- /#post-<?php the_ID(); ?> -->

<?php get_footer(); ?>
