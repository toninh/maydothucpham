<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package cactus
 */
get_header(); ?>


<div class="top_main">
	<div class="topbar-banner" style="margin-left: 2.7%;">
		<div class="top-banner-inner container">
					<ul class="top-banner-container">
									<li class="content1 content">
										<div class="content-inner">
										<a href="Skype:congbt?chat"><i class="fa fa-skype" style=" color: #268CEF;"></i></a>
										<div class="cms-title">Mr. Công</div> <br>
										<div class="cms-desc">Phone: 0963 637 999</div>
										</div>
									</li>
									<li class="content2 content">
										<div class="content-inner">
										<a href="Skype:hoc_lai?chat"><i class="fa fa-skype" style=" color: #268CEF;"></i></a>
										<div class="cms-title">Ms. Huyền</div> <br>
										<div class="cms-desc">Phone: 0963 637 999</div>
										</div>
									</li>
									<li class="content3 content">
										<div class="content-inner">
										<a href="Skype:buingoc9090?chat"><i class="fa fa-skype" style=" color: #268CEF;"></i></a>
										<div class="cms-title">Ms. Ngọc</div> <br>
										<div class="cms-desc">Phone: 0963 637 999</div>
										</div>
									</li>
					</ul>
		</div>	
	</div>
</div>

<div id="main" class="site-main extra">
<div class="main_inner">
			
<!-- Start main slider -->
<div class="home-slider-container">
	<div class="home-category-container"><?php get_sidebar(); ?></div>
	<div class="home-slider-container-inner">
						
		<?php include( TEMPLATEPATH.'/inc/slider.php' ); ?>

</div>
		<!-- End main slider -->
		
</div>
<div class="page_inner">


<!-- #masthead -->
<!-- Center -->
<div id="main" class="site-main extra">
<div class="main_inner">
			
<div class="main-content-inner-full">
<div id="main-content" class="main-content home-page full-width box-page">
    <div id="primary" class="content-area">
    <div id="content" class="site-content" role="main">
	  <article id="post-3663" class="post-3663 page type-page status-publish hentry">
    
  <div class="entry-content">
    <div id="pl-3663">
		<div class="panel-grid animated" id="pg-3663-0" data-animated="fadeInDown">
			<div class="panel-grid-cell" id="pgc-3663-0-0" >
				<div class="panel widget widget_black-studio-tinymce panel-first-child panel-last-child" id="panel-3663-0-0-0">
					<h3 class="widget-title">Subbanner1</h3>
					<div class="textwidget">
						<div class="main-container">
							<div class="inner-container">
								<?php 
									$banner_thirds = ot_get_option('banner2');
									$class = '';
									$k = 1;
									if($banner_thirds):
									foreach( $banner_thirds as $banner_third):
								?>
								<div class="one_third <?php if( $k == 3){ echo 'home_banner_3'; } ?>">
									<div class="one_third_inner content_inner left">
									<div class="tm_banner column1">
										<div class="tm_banner_inner">
											<a href="<?php echo $banner_third[link_banner]; ?>" target="_Blank">
												<img src="<?php echo $banner_third[imagebanner1]; ?>" alt="alt" />
											</a>
										</div>
									</div>
									</div>
								</div>
								<?php $k++; endforeach; endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<div class="panel-grid animated" id="pg-3663-1" data-animated="fadeInUp">
		<div class="panel-grid-cell" id="pgc-3663-1-0" >
			<div class="panel widget widget_black-studio-tinymce panel-first-child panel-last-child" id="panel-3663-1-0-0">
				<h3 class="widget-title">Tabs</h3>
				<div class="textwidget">
					<div class="main-container">
							<div class="inner-container">
								<div id="horizontalTab">
									<ul class="resp-tabs-list">
										<li class="hb-animate-element top-to-bottom">Sản phẩm</li>
									</ul>
									<div class="resp-tabs-container">
											<div id="woo-products" class="woo-content products_block shop">
												<div id="5_woo_carousel" class="woo-carousel">
													<div class="woocommerce columns-5">
														<ul class="products">
														<?php
															$args = array( 
																'posts_per_page' => 12,
																'post_type' => 'san_pham'
																);
															$loop = new WP_Query( $args );		
															if($loop->have_posts()):while( $loop->have_posts() ) : $loop->the_post(); 															
														?>
															<li class="post-3543 product" >
																<div class="container-inner">
																	<div>
																		<p class="price">
																			<span class="amount" style="color: rgb(197, 6, 6); border: 1px;font-family: Times new roman; font-size: 18px;">
																				<?php echo get_field('price').'VNĐ'; ?>
																			</span>
																		</p>
																	</div>
																	<a href="<?php the_permalink(); ?>">
																		
																		<?php if(has_post_thumbnail()){ the_post_thumbnail(); } ?>
																		
																		<h2><?php the_title(); ?></h2>
																	</a>
																</div>
															</li>
														<?php endwhile; endif; wp_reset_postdata(); ?>
														</ul>
													</div>
												</div>
											</div>
									</div>
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
		$slugcats = ot_get_option('category');
		if($slugcats):
		foreach($slugcats as $slugcat=>$value):		
		$term = get_term( $value, 'product-cat' );
		$count_product = $term->count;
		$slug = $term->slug;
		$name = $term->name;
		if($count_product != 0):
	?>
<div class="panel-grid animated" id="pg-3663-3" data-animated="fadeInUp">
	<div class="panel-grid-cell" id="pgc-3663-3-0" >
	<div class="panel widget widget_black-studio-tinymce panel-first-child panel-last-child" id="panel-3663-3-0-0">
	<h3 class="widget-title"><?php echo $name; ?></h3>
	<div class="textwidget">
	<div class="main-container  new_products" style="padding:35px 0 25px;margin:0;border-top:1px solid #;overflow:hidden;);">
	<div class="inner-container">
	<div class="shortcode-title ">
	<h1 class="simple-type small-title"><?php echo $name; ?></h1>
	</div>
	<div id="woo-products" class="woo-content products_block shop">
	<div id="5_woo_carousel" class="woo-carousel">
	<div class="woocommerce columns-5">
	
		<ul class="products">
			<?php
				$args_cat = array( 
					'post_type' => 'san_pham', 
					'posts_per_page' => -1, 
					'product-cat' => $slug, 
					'orderby' => 'rand' 
				);
				$loop_cat = new WP_Query( $args_cat );		
				if($loop_cat->have_posts()):while( $loop_cat->have_posts() ) : $loop_cat->the_post(); 															
			?>
			<li class="post-3543 product" >
				<div class="container-inner">
					<a href="<?php the_permalink(); ?>">
																		
						<?php if(has_post_thumbnail()){ the_post_thumbnail(); } ?>
																		
						<h3><?php the_title(); ?></h3>
					</a>
				</div>
			</li>
			<?php endwhile; endif; wp_reset_postdata(); ?>
		</ul>
	
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
</div>
<?php endif; endforeach; endif; ?>	
	<?php
		$banner3s = ot_get_option('banner3');
		$banner4s = ot_get_option('banner4');
		$k1 = 1;
		//$k2 = '';
		if( $banner3s || $banner4s ):
	?>
	<div class="panel-grid animated" id="pg-3663-2" data-animated="fadeInUp">
		<div class="panel-grid-cell" id="pgc-3663-2-0" >
			<div class="panel widget widget_black-studio-tinymce panel-first-child panel-last-child" id="panel-3663-2-0-0">
				<h3 class="widget-title">CMS Banner</h3>
				<div class="textwidget">
					<div class="main-container">
						<div class="inner-container">
							<div class="tm_sub_banner sub_1">
							<?php
								foreach($banner3s as $banner3):
							?>
								<div class="tm_banner column1 sub_1_<?php if($k1 == 1){ echo 'first'; } else echo 'second'; ?>">
									<div class="tm_banner_inner">
										<a href="<?php echo $banner3[link_banner2]; ?>" target="_Blank"><img src="<?php echo $banner3[imagebanner2]; ?>" alt="" /></a>
									</div>
								</div>
							<?php $k1++; endforeach; ?>
							</div>
							
							<div class="tm_sub_banner sub_2">
								<?php
									foreach($banner4s as $banner4):
								?>
								<div class="tm_banner column1 sub_2_<?php if($k1 == 1){ echo 'first'; } else echo 'second'; ?>">
									<div class="tm_banner_inner">
							
											<?php echo $banner4[imagebanner2]; ?>
										
									</div>
								</div>
								<?php $k1++; endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
		<div class="panel-grid animated" id="pg-3663-4" data-animated="fadeInUp">
		<div class="panel-grid-cell" id="pgc-3663-4-0" >
		<div class="panel widget widget_black-studio-tinymce panel-first-child panel-last-child" id="panel-3663-4-0-0">
		<h3 class="widget-title">Tin tức</h3>
		<div class="textwidget">
		<div class="main-container">
		<div class="inner-container">
		<div class="inner-container">
			<div id="horizontalTab">
				<ul class="resp-tabs-list">
					<li class="hb-animate-element top-to-bottom resp-tab-item resp-tab-active" aria-controls="tab_item-0" role="tab">Tin tức</li>
				</ul>
			</div> 
		</div>
		<div id="blog-posts-products" class="blog-posts-content posts-content main-ul">
			<div id="3_blog_carousel" class="slider blog-carousel">
			<?php 
				$class = '';
				$i= 1;
				$new_post = new WP_Query('post_type=post&posts_per_page=12&cat=1');
				if($new_post->have_posts()):while($new_post->have_posts()):$new_post->the_post();
					if( $i%3 == 0){ $class = 'last'; }
					if(($i +2)%3 == 0){ $class = 'first'; }
			?>
				<div class="item container  <?php echo $class; ?>">
					<div class="container-inner">
					<div class="post-image">
						<?php if(has_post_thumbnail()){ the_post_thumbnail(); } ?>
						<a href="<?php the_permalink(); ?>" class="block_hover"></a>
						<div class="post-date">
							<div class="day"><?php the_time('d'); ?></div>
							<div class="month"><?php the_time('F'); ?></div>
							<div class="year"><?php the_time('Y'); ?></div>
						</div>
						<div class="post-image-hover"></div>
					</div>
					<div class="post-author">
					<div class="comments-link"><?php comments_popup_link('0', '1', '%',''); ?>, comment</div>
					</div>
					<div class="post-content-inner">
						<div class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
						<div class="post-description" style="text-align: justify"><?php the_excerpt(); ?></div>
					</div>
					</div>
				</div>
			<?php $i++; endwhile; endif; wp_reset_postdata(); ?>
			</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		
		<div class="panel-grid animated" id="pg-3663-4" data-animated="fadeInUp">
		<div class="panel-grid-cell" id="pgc-3663-4-0" >
		<div class="panel widget widget_black-studio-tinymce panel-first-child panel-last-child" id="panel-3663-4-0-0">
		<h3 class="widget-title">Nhận xét khách hàng</h3>
		<div class="textwidget">
		<div class="main-container">
		<div class="inner-container">
		<div class="inner-container">
			<div id="horizontalTab">
				<ul class="resp-tabs-list">
					<li class="hb-animate-element top-to-bottom resp-tab-item resp-tab-active" aria-controls="tab_item-0" role="tab">Nhận xet khách hàng</li>
				</ul>
			</div> 
		</div>
		<div id="blog-posts-products" class="blog-posts-content posts-content main-ul">
			<div id="3_blog_carousel" class="slider blog-carousel">
			<?php 
 				$class = '';
				$i= 1;
				$new_post = new WP_Query('post_type=post&posts_per_page=3&cat=26');
				if($new_post->have_posts()):while($new_post->have_posts()):$new_post->the_post(); 
					if( $i%3 == 0){ $class = 'last'; }
					if(($i +2)%3 == 0){ $class = 'first'; } 
			?>
				<div class="item container  <?php echo $class; ?>">
					<div id="khachhang" class="container-inner">
						<div class="post-image">
							<?php if(has_post_thumbnail()){ the_post_thumbnail(); } ?>
							<a href="<?php the_permalink(); ?>" class="block_hover"></a>
							<div class="post-image-hover"></div>
						</div>
						<div class="post-content-inner">
							<div class="post-title"><p style="color: rgb(47, 185, 145);"title="<?php the_title(); ?>"><?php the_title(); ?></p></div>
							<div class="post-description"><?php the_content(); ?></div>
						</div>
					</div>
				</div>
			<?php $i++; endwhile; endif; wp_reset_postdata(); ?>
			</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
</div>
    <div class="inner-container"></div>
    <!-- .inner-container -->
  </div>
  <!-- .entry-content -->
</article>
<!-- #post-## -->
          </div>
    <!-- #content -->
  </div>
  <!-- #primary -->
</div>
<!-- #main-content -->
</div>
<!-- .main-content-inner -->
</div>
<!-- .main_inner -->
</div>
<!-- #main -->
</div>
	
<?php get_footer(); ?>
