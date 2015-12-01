<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package cactus
 */

get_header(); ?>

	<div class="page_inner">


	<!-- #masthead -->
	<!-- Center -->
	<div id="main" class="site-main extra">
	<div class="main_inner">
				
	<div class="main-content-inner-full">
	<div class="main-content-inner left-sidebar box-page">
		<div class="page-title">
				<div class="page-title-inner">
					<?php 
						$term = get_queried_object();	
						$id_cat = $term->term_id;
					?>
					<h1 class="entry-title-main"><?php echo $term->name; ?></h1>
				</div>
		</div>
	<div id="primary">
		
		<div id="content" role="main">
					<nav class="woocommerce-breadcrumb" >
						<?php if(function_exists('wp_breadcrumbs')) wp_breadcrumbs();?>
					</nav>		
		
			<ul class="products">		
				<?php $k =0; if(have_posts()):while(have_posts()):the_post(); ?>
					<li class="post-2921 product type-product status-publish has-post-thumbnail columns-4 <?php if($k%4 == 0){ echo 'first';} if(($k+1)%4 == 0){ echo 'last'; } ?> sale featured shipping-taxable purchasable product-type-simple product-cat-baby-and-kids product-cat-books-media product-cat-cam product-cat-clothing product-cat-dresses-skirts product-cat-electronics product-cat-jeans-baby-and-kids product-cat-jeans-shorts product-cat-women instock" >
						<div class="container-inner">
							<a href="<?php the_permalink(); ?>">
								<?php if(has_post_thumbnail()){ the_post_thumbnail(); }?>
								<h3><?php the_title(); ?></h3>
							</a>
						</div>
					</li>	
				<?php $k++; endwhile; else: echo 'Tạm thời chưa cập nhật sản phẩm cho mục này'; endif; ?>
			</ul>	

			<!-- Pagination -->	
			<nav class="woocommerce-pagination">
				<?php if (function_exists("pagination")) {
					pagination($additional_loop->max_num_pages);
				} ?>	
			</nav>
			
		</div>

	</div>	
	<div id="secondary">
		<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
			<?php get_sidebar(); ?>
			
			<aside id="woocommerce_products-2" class="widget woocommerce widget_products">
				<h1 class="widget-title">Sẩn phẩm</h1>
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
					<?php endwhile; endif; wp_reset_postdata(); ?>
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
					<a href="<?php echo $banner4[link_banner2]; ?>"> 
						<img src="<?php echo $banner4[imagebanner2]; ?>" alt="banner" />
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
	</div>
	<!-- .main-content-inner -->
	</div>
	<!-- .main_inner -->
	</div>
	<!-- #main -->
	</div>

<?php get_footer(); ?>
