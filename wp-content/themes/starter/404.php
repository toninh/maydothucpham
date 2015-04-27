<?php
/**
 * The template for displaying 404 pages (Not Found).
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
				<h1 class="entry-title-main"><?php the_title(); ?></h1>
			  </div>
			</div>
						
		<div class="main-content-inner">

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<div style="margin-bottom:20px;" class="entry-main-content"><?php get_search_form(); ?></div>
			<img src="<?php bloginfo('template_directory');?>/images/404.png"  alt="Not found 404"/>
		</div>
		  <!-- #content -->
		</div>
		<!-- #primary -->

<div id="secondary">
     <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
		<aside id="recent-posts-2" class="widget widget_recent_entries">		
				<h1 class="widget-title">Tin mới</h1>
			<ul>
				<?php 
					$new_post = new WP_Query('post_type=post&posts_per_page=12');
					if($new_post->have_posts()):while($new_post->have_posts()):$new_post->the_post();
				?>			
				<li>
					<a href="<?php the_permalink90; ?>"><?php the_title(); ?></a>
				</li>
			<?php endwhile; endif; wp_reset_postdata(); ?>	
			</ul>
		</aside>
		
		<aside id="archives-2" class="widget widget_archive">
			<h1 class="widget-title">Lưu trữ</h1>		
			<ul>
							<?php $arg_archive = array(

											'type' => 'monthly',

											'limit' => '10',

											'format' => 'html', 

											'before' => '',

											'after'  => '',

											'show_post_count' => true,

											'echo' => 1,

											'order' => 'DESC'

										); 

							?>

							<?php wp_get_archives( $arg_archive ); ?> 
			</ul>
		</aside>
			<?php
				$banner3s = ot_get_option('banner3');
				$k1 = '';
				//$k2 = '';
				if( $banner3s ):
			?>
				<?php
					foreach($banner3s as $banner3):
				?>
			<aside id="categories-2" class="widget widget_categories">
				<img src="<?php echo $banner3[imagebanner2]; ?>" alt="banner" />
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