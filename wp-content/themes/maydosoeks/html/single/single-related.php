<?php
/**
 * The Template for displaying all related posts by Category & tag.
 *
 * @package cactus
 */
?>
<?php
	
	$show_related_post = ot_get_option('show_related_post');
		
	if($show_related_post == 'off') return;
		
	$related_items = cactus_get_related_posts();
	
	if(!$related_items->have_posts()) return;
	
?>
	<section class="related-posts">
		<header class="section-header"> <?php echo __('Related Posts','cactus');?> </header>
<?php

	while ( $related_items->have_posts() ) : $related_items->the_post();
	
		get_template_part('content','related');
	
	endwhile;
?>
	</section>
<?php
    wp_reset_postdata(); 