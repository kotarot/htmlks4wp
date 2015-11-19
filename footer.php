<?php
$options = get_option('htmlks4wp_theme_options');
?>

</div><!-- /.grid -->

<div class="clear"></div>
<footer>
&copy; Copyright <?php echo ( !isset( $options['copyrightyear'] ) || $options['copyrightyear'] === '' ) ? date('Y') : $options['copyrightyear']; ?>
 <a href="<?php echo home_url(); ?>"><?php echo ( !isset( $options['copyrightname'] ) || $options['copyrightname'] === '' ) ? get_bloginfo('name') : $options['copyrightname']; ?></a>
all rights reserved.<br>
This website is build with WordPress and <a href="https://github.com/kotarot/htmlks4wp" target="_blank">htmlks4wp</a> theme.
<!-- Author is <span class="vcard author"><span class="fn"><?php the_author(); ?></span></span>. -->
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

<?php
include ( get_template_directory() . '/footer-user-specified.inc.php' );
?>

</body>
</html>
