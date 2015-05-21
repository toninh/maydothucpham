<?php
/**
 * The Template for displaying all single posts.
 *
 * @package cactus
 */

get_header(); ?>
<div class="page_inner">


<!-- #masthead -->
<!-- Center -->
<div id="main" class="site-main extra">

<div class="main_inner">
	<div class="page-title">
	  <div class="page-title-inner">
		<div class="entry-title-main"></div>		
	  </div>
	</div>
				
<div class="main-content-inner">

<div id="primary">
	<div id="content">
		<nav class="woocommerce-breadcrumb">
			<?php if(function_exists('wp_breadcrumbs')) wp_breadcrumbs();?>
		</nav>
		
<div id="product-2600" class="post-2600 product type-product status-publish has-post-thumbnail shipping-taxable purchasable product-type-variable product-cat-clothing product-cat-desktop product-cat-electronics product-cat-health product-cat-featured product-tag-quot instock">
	<?php
		if(have_posts()):while(have_posts()):the_post();
	?>
	<?php setPostViews(get_the_ID()); ?>
	<div class="images">

		<a href="#" class="yith_magnifier_zoom woocommerce-main-image" title="<?php the_title(); ?>">
			<?php if(has_post_thumbnail()){ the_post_thumbnail(); }?>
		</a>
	</div>

	<div class="summary entry-summary">

		<h1 class="product_title entry-title"><?php the_title(); ?></h1>
		<div>
			<p class="price"><span class="amount" style="color: rgb(197, 6, 6); border: 1px;font-family: Times new roman; font-size: 28px;"><?php echo get_field('price').' VNĐ'; ?></span></p>
		</div>
		<div class="description">
			<p>
				<?php the_excerpt(); ?>
			</p>
		</div>
		<div>
					<ul class="top-banner-container">
									<li class="content1 content">
										<div class="content-inner">
										<div class="cms-title" style="padding-top: inherit;">Mr. Quang</div>
										<div style="color:#ff0000;font-weight:bold; padding-top:inherit; padding-bottom:inherit;">Phone: 0963 637 999</div>
										<a href="ymsgr:sendim?quangbv3891"><img src="http://opi.yahoo.com/online?u=daretowin0511&amp;m=g&amp;t=2&amp;l=us&amp;opi.jpg"></a>					
										</div>
									</li>
									<li class="content2 content">
										<div class="content-inner">
										<a href="Skype:congbt?chat"><i class="fa fa-skype" style=" color: #268CEF;"></i></a>
										<div class="cms-title">Liên hệ với chúng tôi</div> <br>
										<div class="cms-desc">Phone: (04) 22 66 44 88</div>
										</div>
									</li>
									
					</ul>
		</div>

	</div><!-- .summary -->	
		<div class="woocommerce-tabs">
			<ul class="tabs">
				<li class="description_tab">
					<a class="active" href="#tab-description">Mô tả chi tiết</a>
				</li>
				<li class="additional_information_tab">
					<a href="#tab-additional_information">Bình luận</a>
				</li>
			</ul>
		
			<div class="panel entry-content" id="tab-description">
				
				<h2><b>Mô tả chi tiết sản phẩm</b></h2>

				<div id="idTab1">
					<?php the_content(); ?>
				</div>
			</div>

			<div class="panel entry-content" id="tab-additional_information">
				<?php
					comments_template( '', true );
				?>
			</div>
		</div>
<?php endwhile; endif; ?>
	<div class="related products">

		<h2 style="font-weight: bold;">Sản phẩm liên quan</h2>

		<ul class="products">
					<?php
						// get the custom post type's taxonomy terms
						$custom_taxterms = wp_get_object_terms( $post->ID, 'product-cat', array('fields' => 'ids') );
						// arguments
						$args = array(
						'post_type' => 'san_pham',
						'post_status' => 'publish',
						'posts_per_page' => 12, // you may edit this number
						'orderby' => 'rand',
						'tax_query' => array(
							array(
								'taxonomy' => 'product-cat',
								'field' => 'id',
								'terms' => $custom_taxterms
							)
						),
						'post__not_in' => array ($post->ID)
						);
						$related_items = new WP_Query( $args );
						//echo $custom_taxterms;
						// loop over query
						 $k =0;
						if ($related_items->have_posts()) :while ( $related_items->have_posts() ) : $related_items->the_post();
						?>				
			<li class="post-2369 product type-product status-publish has-post-thumbnail columns-4 <?php if($k%4 == 0){ echo 'first';} if(($k+1)%4 == 0){ echo 'last'; } ?> shipping-taxable purchasable product-type-simple product-cat-books-media product-cat-jewellery product-cat-featured product-cat-sports product-cat-watches instock" >
				<div class="container-inner">
					<a href="<?php the_permalink(); ?>">
						<?php if(has_post_thumbnail()){ the_post_thumbnail(); }?>
						<h3><?php the_title(); ?></h3>
					</a>
				</div>
			</li>
			<?php $k++; endwhile;endif;wp_reset_postdata(); ?>
		</ul>
</div>

</div><!-- #product-2600 -->


		
	</div>
</div>
		<div id="secondary">
		<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
			<?php get_sidebar(); ?>
			
			<aside id="woocommerce_products-2" class="widget woocommerce widget_products">
				<div class="widget-title">Sẩn phẩm</div>
				<ul class="product_list_widget">
					<?php
						$args = array( 
							'posts_per_page' => 5,
							'post_type' => 'san_pham'
						);
							$loop = new WP_Query( $args );		
							if($loop->have_posts()):while( $loop->have_posts() ) : $loop->the_post(); 															
					?>
						<li>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php if(has_post_thumbnail()){ the_post_thumbnail(); }?>	
								<span class="product-title"><?php the_title(); ?></span>
							</a>

						</li>
					<?php endwhile; endif; wp_reset_postdata();  ?>
				</ul>
			</aside>
				<?php
				$banner4s = ot_get_option('banner4');
				if( $banner4s ):
			?>
				<?php
					foreach($banner4s as $banner4):
				?>
			<aside id="leftbannerwidget-2" class="widget widgets-leftbanner">		
				<div class="left-banner">
					<a href="<?php echo $banner4[link_banner3]; ?>"> 
					</a> 
				</div>
			</aside>  
			<?php endforeach; ?>
			<?php endif; ?>
		</div>
	  <!-- #primary-sidebar -->
	  </div>
<!-- #secondary -->

</div>
<!-- .main-content-inner -->
</div>
<!-- .main_inner -->
</div>
<!-- #main -->
</div>
<?php get_footer(); ?>