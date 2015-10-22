<!doctype html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<title><?php wp_title('«', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	<div class="wrapper">
	<header>
	<div class="header_wrapper">
	<div class="logo">
	<a href="http://Kvar72.ru">
	<img src="/site/wp-content/themes/kvar72/images/log.png"/>
	</a>
	</div>
	<div id="phone">
	+7(3452)903-223
	</div>
	<nav class="main-navigation">
	<?php wp_nav_menu(array('menu' => 'top-menu', 'menu_class' => 'top-menu')); ?>
	</nav>
	</div>
	</header>