<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width">
        <title><?php wp_title(); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
        <?php wp_head(); ?>
		<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
		<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
		<![endif]-->
		<?php wp_head(); ?>
    </head>
<body>
	<div id="wrapper">
		<header class="site-header clearfix">
			<div id="masthead" class="container">
				<a class="site-title" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
				<h2 class="site-description">Summer Camp with a Conscience</h2>
				<h3 class="site-description-year">Since 1923</h3>
				<?php /* Getting the permalinks for donate & register pages */
					$donate = get_page_by_title('Donate')->ID;
					$donatelink = get_permalink($donate);
					$register = get_page_by_title('Register')->ID;
					$registerlink = get_permalink($register); ?>
				<a class="action-button donate circle" href="<?php echo $donatelink; ?>">Donate</a>
				<a class="action-button register circle" href="<?php echo $registerlink; ?>">Register</a>
			</div><!-- #masthead -->

			<nav id="site-navigation" class="clearfix">
				<div class="container">
				<?php  $args = array(
						'menu_class' => 'menu horizontal',
						);
				wp_nav_menu( $args ); ?>
				</div> <!-- .container -->
			</nav><!-- #site navigation -->
		</header> <!-- header -->
	<div id="page">
		<div id="main" class="clearfix">