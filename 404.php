<?php get_header(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<h2>Page Not Found (&gt; &lt;)</h2>
<div class="col_12">
	<p><?php _e('The page you access has been deleted or moved.', 'htmlks4wp'); ?></p>
	<p><a href="<?php echo home_url('/'); ?>"><?php _e('Back to Top', 'htmlks4wp'); ?></a></p>
</div><!-- /.col_12 -->
</div><!-- /#post-<?php the_ID(); ?> -->

<?php get_footer(); ?>
