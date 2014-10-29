<div id="sidebar" class="col_12">
<?php if (is_active_sidebar('sidebar-1')) :
dynamic_sidebar('sidebar-1');
else : ?>
<div class="widget">
<h4>No Widgets</h4>
<p>The widgets have not been set.</p>
</div><!-- /.widget -->
<?php endif; ?>
</div><!-- /#sidebar .col_12 -->
