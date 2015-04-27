<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package cactus
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel='stylesheet' id='opensans-user-css'  href='http://fonts.googleapis.com/css?family=Open+Sans&#038;ver=4.1.1' type='text/css' media='all' />
	<link rel='stylesheet' id='IstokWeb-user-css'  href='http://fonts.googleapis.com/css?family=Istok+Web&#038;ver=4.1.1' type='text/css' media='all' />
	<link rel='stylesheet' id='ArchivoNarrow-user-css'  href='http://fonts.googleapis.com/css?family=Archivo+Narrow%3A300%2C400%2C500%2C600%2C700&#038;ver=4.1.1' type='text/css' media='all' />
	<link rel='stylesheet' id='ArchivoNarrow-user-css'  href='http://fonts.googleapis.com/css?family=Archivo+Narrow%3A300%2C400%2C500%2C600%2C700&#038;ver=4.1.1' type='text/css' media='all' />

<?php wp_head(); ?>
</head>
	
<body <?php body_class('woocommerce'); ?>>
<!--<div class="home-slider-inner banner-loading"></div>-->
<div id="page" class="hfeed site">
<!-- Header -->
<header id="masthead" class="site-header header2 full-width" role="banner">
    <div class="site-header-main">
		<div class="header-main">
			<div class="header-main-inner">
				<div class="header_left">
						<a href="<?php echo get_option('home'); ?>" title="<?php echo bloginfo('name'); ?>" rel="home">
							<img alt="Branchy" src="<?php echo  ot_get_option('logo'); ?>" />   
						</a>
				</div>
					  
				<div class="header_right">
					<img src="<?php echo ot_get_option('banner'); ?>" alt="banner" title="banner" />
				</div>
			</div>
	   </div>
	
  
  <div class="topbar-main">
      
		<div id="navbar" class="header-bottom navbar default">
						<nav id="site-navigation" class="navigation main-navigation" role="navigation">
							<h3 class="menu-toggle">Menu</h3>
		  				    <a class="screen-reader-text skip-link" href="#content" title="Skip to content">Skip to content</a>	
							<div class="mega-menu">
								<div class="menu-menu-container">
									<ul id="menu-menu" class="mega">
									<?php
										if (has_nav_menu('main-menu')) {
											wp_nav_menu(array(
													'theme_location' => 'main-menu', 
													'container' => false, 
													'items_wrap' => '%3$s'
												)
											);
										} 									
									?>
										
									</ul>
								</div>					
							</div>	
													
						</nav><!-- #site-navigation -->
						<div class="header-search">
							<?php get_search_form(); ?> 	
						</div>
							
		</div><!-- End header-bottom #navbar -->	
	</div>
  <!-- End site-main -->	
  </div>							
</header>
	<!--	<div class="site-top">
				<div class="top_main">
								  <div class="topbar-banner">
					<div class="top-banner-inner container"><ul class="top-banner-container"><li class="content1 content"><div class="content-inner"><i class="fa fa-usd"></i><div class="cms-title">UP TO 5% REWARD</div> <div class="cms-desc">At vero eos et accusamus et iusto odio dignis</div></div></li><li class="content2 content"><div class="content-inner"><i class="fa fa-calendar"></i><div class="cms-title">DELIVERY SCHEDULE</div> <div class="cms-desc">At vero eos et accusamus et iusto odio dignis</div></div></li><li class="content3 content"><div class="content-inner"><i class="fa fa-gift"></i><div class="cms-title">SAME DAY SHIPPING</div> <div class="cms-desc">At vero eos et accusamus et iusto odio dignis</div></div></li></ul></div>				  </div>
						
				</div>	
			</div>
	
    <!-- End header-main -->							
	  
    </div>