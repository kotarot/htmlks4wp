<?php get_header(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<h2>Page Not Found (&gt; &lt;)</h2>
<div class="col_12">
	<p>アクセスしたページは削除されたかURLが変更されています．<br>
	上部メニューまたは右上の検索フォームより目的のページをお探しください．</p>
	<p><a href="<?php echo home_url('/'); ?>">トップページへ戻る</a></p>
</div><!-- /.col_12 -->
</div><!-- /#post-<?php the_ID(); ?> -->

<?php get_footer(); ?>
