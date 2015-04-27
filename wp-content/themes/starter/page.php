<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
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
		  	<nav class="woocommerce-breadcrumb">
				<?php if(function_exists('wp_breadcrumbs')) wp_breadcrumbs();
				?>
			</nav>
			<?php if(have_posts()):while(have_posts()):the_post(); 
				$custom_taxterms = wp_get_object_terms( $post->ID, 'category', array('fields' => 'all') );
			?>
			<article id="post-1" class="post-1 post type-post status-publish format-standard has-post-thumbnail hentry category-uncategorized">
		  
				<div class="entry-main-content">
					<div class="entry-content-other">
						<div class="entry-content-inner"> 
							<div class="entry-main-header">
								<header class="entry-header ">
									<h1 class="entry-title"> <?php the_title(); ?> </h1>				
								</header>
							</div>
						</div>

					  <!-- .entry-header -->
						<div class="entry-content">
							<?php the_content(); ?>
						 </div>
						<!-- .entry-content -->
					</div>
						<!-- entry-content-other -->
				</div>
			</article>
		<!-- #post -->
		<?php endwhile; endif; ?>
		
		</div>
		  <!-- #content -->
		</div>
		<!-- #primary -->

<div id="secondary">
     <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
		<aside id="recent-posts-2" class="widget widget_recent_entries">		
				<div class="widget-title">Tin mới</div>
			<ul>
				<?php
					$showpost = new WP_Query('post_type=post&showposts=8&cat=1');
					if($showpost->have_posts()):while($showpost->have_posts()):$showpost->the_post();
				?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					<?php				
						endwhile; endif;wp_reset_postdata();
					?>
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
