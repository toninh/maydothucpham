<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package cactus
 */
?>

	<aside id="woocommerce_product_categories-7" class="widget woocommerce widget_product_categories">
		<h3 class="widget-title">Tin mới</h3>
			<div class="sidebar-category">
				<ul class="product-categories">
				<?php
					$showpost = new WP_Query('post_type=post&showposts=8&cat=1');
					if($showpost->have_posts()):while($showpost->have_posts()):$showpost->the_post();
				?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					<?php				
						endwhile; endif;wp_reset_postdata();
					?>
				</ul>
			</div>
	</aside>	