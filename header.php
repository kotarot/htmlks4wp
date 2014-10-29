<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=0.8">
<title><?php wp_title('-', true, 'right'); bloginfo('name'); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/kickstart/css/kickstart.css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" media="all">
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
wp_nav_menu(array(
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
		<div class="col_8">
			<div class="callout">
				<h1><a class="nocolor" href="<?php echo home_url('/'); ?>">terabo.net</a></h1>
				<div class="sub-header">Just another personal website.</div>
			</div>
		</div><!-- /.col_8 -->
		<div class="col_4" style="text-align:right;">
			<?php get_search_form(); ?>
		</div><!-- /.col_8 -->
	</div><!-- /.col_12 -->

