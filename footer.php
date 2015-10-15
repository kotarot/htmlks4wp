</div><!-- /.grid -->

<div class="clear"></div>
<footer>
&copy; Copyright <?php echo date('Y'); ?> <a href="<?php echo home_url(); ?>"><?php bloginfo('name') ?></a> All Rights Reserved.<br>
Main author: <span class="vcard author"><span class="fn"><?php the_author(); ?></span></span>.
WordPress theme: <a href="https://github.com/kotarot/htmlks4wp" target="_blank">htmlks4wp</a>.
This website is built with <a href="http://www.wordpress.org/" target="_blank">WordPress</a> and
<a href="https://github.com/kotarot/htmlks4wp" target="_blank">htmlks4wp</a> (based on <a href="http://www.99lime.com" target="_blank">HTML KickStart</a>).
</footer>

<?php wp_footer(); ?>

<script>
var menu_height = $('#navbar').height();
var start_pos = 0;
$(window).scroll(function() {
    var current_pos = $(this).scrollTop();
    if (current_pos > start_pos) {
        if (200 <= $(window).scrollTop()) {
            $('#navbar').css('top', '-' + menu_height + 'px');
        }
    } else {
        $('#navbar').css('top', '0');
    }
    start_pos = current_pos;
});
</script>

</body>
</html>
