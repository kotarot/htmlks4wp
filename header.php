<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php
if (is_front_page()) :
    echo 'Top of '; bloginfo('name');
else :
    wp_title('--', true, 'right'); bloginfo('name');
endif; ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/kickstart/css/kickstart.css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" media="all">
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<?php include 'header_meta.php'; ?>
<?php wp_head(); ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/kickstart/js/kickstart.js"></script>
</head>
<body <?php body_class(); ?>>

<?php
wp_nav_menu(array(
    'theme_location' => 'Header Nav',
    'menu' => 'header-navi',
    'container' => 'nav',
    'container_class' => '',
    'container_id' => 'navbar',
    'menu_class' => '',
    'menu_id' => '',
    'items_wrap' => ' <ul>%3$s</ul>'
));
?>

<div class="grid">

	<div class="col_12">
		<div class="col_7">
			<div class="callout">
				<div id="header-logo">
					<a href="<?php echo home_url('/'); ?>"><img src="<?php echo get_template_directory_uri() . '/header_logo.png' ?>" width="64" height="64" /></a>
					<span id="header-text">
						<span id="header-main"><a class="nocolor" href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a></span><br>
						<span id="header-sub"><?php bloginfo('description'); ?></span>
					</span>
				</div>
			</div>
		</div><!-- /.col_7 -->
		<div class="col_5" style="text-align:right;">
			<?php get_search_form(); ?>
		</div><!-- /.col_5 -->
	</div><!-- /.col_12 -->

