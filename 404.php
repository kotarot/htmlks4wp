<?php get_header(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<h2>Page Not Found (&gt; &lt;)</h2>
<div class="col_12">
	<p>The page you access has been deleted.</p>
	<p><a href="<?php echo home_url('/'); ?>">Back to Top</a></p>
</div><!-- /.col_12 -->
</div><!-- /#post-<?php the_ID(); ?> -->

<?php get_footer(); ?>
