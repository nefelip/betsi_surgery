<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package _tk
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php do_action( 'before' ); ?>

<header id="masthead" class="site-header" role="banner">
<?php // substitute the class "container-fluid" below if you want a wider content area ?>
<nav class="site-navigation container-fluid">
<?php // substitute the class "container-fluid" below if you want a wider content area ?>
<!--    <div class="row">-->
<!--        <div class="site-navigation-inner col-sm-12">-->
        <?php
            wp_nav_menu(
                array(
                    'theme_location' 	=> 'primary',
                    'depth'             => 5,
                    'container'         => 'div',
                    'container_id'      => 'main-nav',
                    'container_class'   => 'stellarnav',
                )
            );
            ?>
<!--        </div>-->
<!--	</div> .container -->
</nav><!-- .site-navigation -->

</header><!-- #masthead -->



<div class="main-content">
<?php // substitute the class "container-fluid" below if you want a wider content area ?>
	<div class="container">
		<div class="row">
			<div id="content" class="main-content-inner col-sm-12 col-md-8">

