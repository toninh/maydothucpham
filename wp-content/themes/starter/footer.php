<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package cactus
 */
?>

	
<footer id="colophon" class="site-footer" role="contentinfo">
  <div class="footer_inner">
  <!--
   <div class="footer-block">
		<div class="footer-block-inner">
		
<div id="follow_us" class="follow-us">	

<h2 class="title">  </h2>
	<div class="follow_us_inner">
			<a href="#" title="Facebook" class="facebook icon"><i class="fa fa-facebook"></i></a>
				<a href="#" title="Twitter" class="twitter icon"><i class="fa fa-twitter"></i></a>
		
			<a href="#" title="Linkedin" class="linkedin icon"><i class="fa fa-linkedin"></i></a>
				<a href="#" title="RSS" class="rss icon"><i class="fa fa-rss"></i></a>
			
				</div>
</div>
 <div class="textwidget"><p><div class="main-container  " style="padding:0;margin:0;border-top:1px solid #;overflow:hidden;);"><div class="inner-container"><div class="newslettercontainer"><div class="newslettercontainerinner"><div class="border-top"> </div><h1 class="simple-type small-title">Sign Up for Newsletter</h1><div class="text2">Lorem Ipsum, you need to be sure there isn't anything.</div><div class="newsletter-text-content"></div></div></div>



<div class="newsletter newsletter-subscription">
<form method="post" action="/woo/WCM01/WCM010020/WP1/wp-content/plugins/newsletter/do/subscribe.php" onsubmit="return newsletter_check(this)">

<input type='hidden' name='nr' value='page'>
<table cellspacing="0" cellpadding="3" border="0">

<!-- email
<tr>
	<th>Email</th>
	<td align="left"><input class="newsletter-email" type="email" name="ne" size="30" required></td>
</tr>

<tr>
	<td colspan="2" class="newsletter-td-submit">
		<input class="newsletter-submit" type="submit" value="Subscribe"/>
	</td>
</tr>

</table>
</form>
</div>
</div></div></p>
</div> 		</div>
	</div>
	-->
    <div id="footer-widget-area">
		<div id="first" class="first-widget footer-widget animated" data-animated="fadeInLeft">
			<aside id="footeraboutwidget-2" class="widget widgets-about">		
				<div class="home-about-me hb-animate-element left-to-right"> 		 
					<div class="tm-about-text">								 
						<a href="<?php echo get_option('home'); ?>"> 
							<img alt="Branchy" src="<?php echo  ot_get_option('logo'); ?>" />
						</a> 				 				 
						<div class="tm-about-description">					
							<p><?php echo ot_get_option('text_footer'); ?></p>
						</div>
					</div>								
				</div>
			</aside> 
		</div>
		<!-- #first .widget-area -->
    <div id="second" class="second-widget footer-widget animated" data-animated="fadeInDown">
			<aside id="woocommerce_top_rated_products-2" class="widget woocommerce widget_top_rated_products">
				<h3 class="widget-title">Sản phẩm xem nhiều</h3>
				<ul class="product_list_widget">
				<?php
					$args_sp = array(  
						'meta_key' => 'post_views_count',
						'orderby' => 'meta_value_num',
						'posts_per_page' => 4,
						'order'        => 'DESC',
						'post_type'    => 'san_pham',
						'post_status'  => 'publish'
					);
					$sp = new WP_Query( $args_sp );		
					if($sp->have_posts()):while( $sp->have_posts() ) : $sp->the_post(); 	
				?>
					<li>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php if(has_post_thumbnail()){ the_post_thumbnail(); }?>
							<span class="product-title"><?php the_title(); ?></span>
						</a>
					</li>
				<?php endwhile; endif; wp_reset_postdata(); ?>
				</ul>
			</aside>
	</div>
  <!-- #second .widget-area -->
    <div id="third" class="third-widget footer-widget animated" data-animated="fadeInUp">
		<aside id="staticlinkswidget-2" class="widget widgets-static-links">
			<h3 class="widget-title">Tin tức xem nhiều</h3> 
			<ul>
				<li>
					<div class="static-links-list">
						<?php
							$args_post = array(  
								'meta_key' => 'post_views_count',
								'orderby' => 'meta_value_num',
								'posts_per_page' => 4,
								'order'        => 'DESC',
								'post_type'    => 'post',
								'post_status'  => 'publish'
							);
							$showpost = new WP_Query($args_post);		
							if($showpost->have_posts()):while( $showpost->have_posts() ) : $showpost->the_post(); 	
						?>					
						<span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
						<?php endwhile; endif; wp_reset_postdata(); ?>						
					</div>
				</li>
			</ul>
		</aside> 
	</div>
	<!-- #third .widget-area -->
		<div id="fourth" class="fourth-widget footer-widget animated" data-animated="fadeInRight">
				<aside id="footercontactuswidget-2" class="widget widgets-footercontact"><h3 class="widget-title">Thông tin liên hệ</h3> 
					<ul>
						<li>
							<div class="contact_wrapper">
							<?php
								$infomations = ot_get_option('infocompany');
								if($infomations):foreach($infomations as $infomation):
							?>
								<div class="address">
									<i class="fa fa-map-marker"></i>	
										<div class="address_content">
														
											<div class="contact_title">
												<?php echo $infomation[name]; ?>							
											</div>
											<div class="contact_address">
												<?php echo $infomation[address]; ?>
											</div>
												
										</div>
								</div>
								<div class="phone">
									<i class="fa fa-mobile"></i>
										<div class="contact_phone"><?php echo $infomation[phone]; ?></div>	
								</div>
								<div class="email">
									<i class="fa fa-envelope "></i>
									<div class="contact_email">
										<a href="mailTo:<?php echo $infomation[email]; ?>" target="_blank"><?php echo $infomation[email]; ?></a>
									</div>
								</div>
							<?php endforeach; endif; ?>
							</div>
						</li>
					</ul>
					</aside> 
		</div>
		<!-- #fourth .widget-area -->
    </div>	<!-- .footer-bottom -->
</div>
    
  <!--. Footer inner -->
</footer>
<!--
<div class="footer-bottom">
	<div class="footer-bottom-container">
	<div class="footer-bottom-left">
      <div class="footer-menu-links">
        <ul id="menu-menu-1" class="footer-menu"><li class="first-menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-3663 current_page_item menu-item-3762"><a href="/woo/WCM01/WCM010020/WP1/">Home</a></li>
<li class="last-menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-3728"><a href="/woo/WCM01/WCM010020/WP1/blog-2/">Blog</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-3755"><a href="/woo/WCM01/WCM010020/WP1/products-page/">Shop</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2689"><a href="#">Shortcodes</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2691"><a href="#">Media</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-3742"><a href="/woo/WCM01/WCM010020/WP1/features/">Features</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-3761"><a href="/woo/WCM01/WCM010020/WP1/about-us/">About Us</a></li>
</ul>      </div>
      <!-- #footer-menu-links
	  
      <div class="site-info">   &copy; 2015 <a href="https://www.google.co.in/" title="Demo Store" target="_blank" rel="home">Templatemela.        </a>
              </div>
	 </div>
	 <div class="footer-bottom-right">
	  <div id="fifth" class="fifth-widget footer-widget animated" data-animated="fadeInRight">
    	<aside id="accepted_payment_methods-2" class="widget widget_accepted_payment_methods"><ul class="accepted-payment-methods"><li class="american-express"><span>American Express</span></li><li class="google"><span>Google</span></li><li class="maestro"><span>Maestro</span></li><li class="mastercard"><span>MasterCard</span></li></ul></aside>  	  </div>
	 </div>
	  
	        <!-- .site-info 
	  </div>
    </div>
<!-- #colophon -->
	
</div>
<!-- #page -->
<div class="backtotop"><a id="to_top" href="#"></a></div>

<?php if(is_single()): ?>
	<script type='text/javascript' src="<?php bloginfo('template_directory'); ?>/js/tabs.js"></script>
<?php endif; ?>
<?php wp_footer(); ?>

</body>
</html>
