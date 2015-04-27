<?php
/**
 * The template for displaying Search Results pages.
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
		<h1 class="entry-title-main"><?php printf( __( 'Kết quả tìm kiếm cho từ khóa: %s', 'cactus' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
	  </div>
	</div>
				
<div class="main-content-inner">

<div id="main-content" class="main-content blog-page blog-list right-sidebar">
  	
  <div id="primary" class="content-area">
 	<div id="content" class="site-content" role="main">
						<nav class="woocommerce-breadcrumb" >
						<?php if(function_exists('wp_breadcrumbs')) wp_breadcrumbs();?>
					</nav>	
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-562" class="post-562 post type-post status-publish format-chat has-post-thumbnail hentry category-uncategorized tag-chat tag-post-formats">
			  
				<div class="entry-main-content">
					<div class="entry-thumbnail">
							<?php if(has_post_thumbnail()){ the_post_thumbnail(); }?>
							<div class="block_hover">
								<div class="links">
										
									  <a href="<?php the_permalink(); ?>" title="Click to view Read More" class="icon readmore"><i class="fa fa-share"></i></a> 
									 
								</div>
							</div>
								
					</div>		
					<div class="entry-content-other">
						<div class="entry-content-inner"> 		
														<div class="entry-main-header">
											  <header class="entry-header ">
													<h1 class="entry-title"> <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a> </h1>
													
									 </header>
								</div>
							<div class="entry-meta-inner">    
								<div class="entry-content-date">
									<div class="entry-date"><div class="day"><?php the_time('d'); ?></div><div class="month"><?php the_time('F'); ?></div></div>	
								</div>
								<div class="entry-meta">
										<span class="categories-links"><i class="fa fa-folder-o"></i><a href="<?php echo get_category_link($id_cat); ?>" rel="category tag"><?php echo $term->name; ?></a></span>                 
										<span class="author vcard"><i class="fa fa-user"></i><a class="url fn n" href="#" title="View all posts by admin" rel="author"><?php the_author(); ?></a></span>                        
								</div>	
								<!-- .entry-meta -->
							</div>
						</div>
					
						<!-- .entry-header -->
						<div class="entry-summary">
							<div class="excerpt"> 
								<?php the_excerpt(); ?>
								<div class="read-more"><a class="read-more-link" href="<?php the_permalink(); ?>">Read More</a></div>
							</div>
						</div>
						<!-- .entry-summary -->
					</div>
				<!-- entry-content-other -->
			  </div>
			</article>
			<!-- #post -->

			<?php endwhile; ?>

		<?php else : ?>

			<?php get_template_part( 'html/loop/content', 'none' ); ?>

		<?php endif; ?>
		<nav class="navigation paging-navigation" role="navigation">
			<h1 class="screen-reader-text">Posts navigation</h1>
			<div class="pagination loop-pagination">
				<?php if (function_exists("paginations")) {
					paginations($additional_loop->max_num_pages);
				} ?>	
			</div><!-- .pagination -->
		</nav><!-- .navigation -->
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
</div><!-- #main-content -->
</div>
<!-- .main-content-inner -->
</div>
<!-- .main_inner -->
</div>
<!-- #main -->
</div>	

<?php get_sidebar(); ?>
<?php get_footer(); ?>
