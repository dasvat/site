<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kvar72
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site wrapper">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'kvar72' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="header_wrapper">
			<div class="logo">
				<a href="http://Kvar72.ru">
					<img src="/site/wp-content/themes/kvar72/images/log.png"/>
				</a>
			</div>
			<div id="phone">
				+7(3452)903-223
			</div>
	`		<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php wp_nav_menu(array('menu' => 'top-menu', 'menu_class' => 'top-menu')); ?>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
