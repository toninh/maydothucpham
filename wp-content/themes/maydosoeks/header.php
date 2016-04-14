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
<link rel="shortcut icon" href="favicon.ico">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel='stylesheet' id='opensans-user-css'  href='http://fonts.googleapis.com/css?family=Open+Sans&#038;ver=4.1.1' type='text/css' media='all' />
	<link rel='stylesheet' id='IstokWeb-user-css'  href='http://fonts.googleapis.com/css?family=Istok+Web&#038;ver=4.1.1' type='text/css' media='all' />
	<link rel='stylesheet' id='ArchivoNarrow-user-css'  href='http://fonts.googleapis.com/css?family=Archivo+Narrow%3A300%2C400%2C500%2C600%2C700&#038;ver=4.1.1' type='text/css' media='all' />
	<link rel='stylesheet' id='ArchivoNarrow-user-css'  href='http://fonts.googleapis.com/css?family=Archivo+Narrow%3A300%2C400%2C500%2C600%2C700&#038;ver=4.1.1' type='text/css' media='all' />

<?php wp_head(); ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-62589862-1', 'auto');
  ga('send', 'pageview');

</script>
<script>(function() {
  if (!_fbq.loaded) {
  var _fbq = window._fbq || (window._fbq = []);
    var fbds = document.createElement('script');
    fbds.async = true;
    fbds.src = '//connect.facebook.net/en_US/fbds.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(fbds, s);
    _fbq.loaded = true;
  }
  _fbq.push(['addPixelId', '441354832709948']);
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', 'PixelInitialized', {}]);
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?id=441354832709948&amp;ev=PixelInitialized" /></noscript>
<link rel="author" href="https://plus.google.com/u/0/+M%C3%A1y%C4%91oAnto%C3%A0nth%E1%BB%B1cph%E1%BA%A9m/posts"/>

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','//connect.facebook.net/en_US/fbevents.js');

fbq('init', '326540540850442');
fbq('track', "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=326540540850442&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

</head>
	
<body <?php body_class('woocommerce'); ?>>
<script lang="javascript">(function() {var _h1= document.getElementsByTagName('title')[0] || false;var product_name = ''; if(_h1){product_name= _h1.textContent || _h1.innerText;}var ga = document.createElement('script'); ga.type = 'text/javascript';ga.src = '//live.vnpgroup.net/js/web_client_box.php?hash=d297c42afce5c2173ace585f70b46fb6&data=eyJzc29faWQiOjI2MzYzNzUsImhhc2giOiI2NDJjOGY1YmEwNjZjNzBlZjYzY2E1NGFmYmIyN2M1OCJ9&pname='+product_name;var s = document.getElementsByTagName('script');s[0].parentNode.insertBefore(ga, s[0]);})();</script>	


<!--<div class="home-slider-inner banner-loading"></div>-->
<div id="page" class="hfeed site">
<!-- Header -->
<header id="masthead" class="site-header header2 full-width" role="banner">
    <div class="site-header-main"> 
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
							<ul id="menu-menu" class="mega menuphone" >
								<li><span style="color:#fff;">Đặt hàng 1:</span></li>
								<li style="margin-left:5px;font-weight:bold;">096 36 37 999</li>
								<li style="color:#FFF;">|</li>
								<li><span style="color:#fff;">Đặt hàng 2:</span></li>
								<li style="margin-left:5px;font-weight:bold;">04 22 66 44 88</li>
								<li style="color:#FFF;">|</li>
								<li><span style="color:#fff;">KV Tây Nguyên:</span></li>
								<li style="margin-left:5px;font-weight:bold;">0919 220 559</li>
							</ul>
						</div>
							
		</div><!-- End header-bottom #navbar -->	
	</div>
  <!-- End site-main -->	
  </div>							
</header>					
	  
    </div>
