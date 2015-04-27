<?php
	/*
	Custom breadcrumbs
	*/
	function wp_breadcrumbs(){
		$delimiter = '&raquo;';
		$name = 'Trang chủ';
		$currentBefore = '<span class="current-page"">';
		$currentAfter = '</span>';
		 
		if(!is_home() && !is_front_page() || is_paged()){
		 
		global $post;
		$home = get_bloginfo('url');
		echo '<span><a href="' . $home . '">' . $name . '</a></span> ' . $delimiter . ' ';
		 
		if(is_tax()){
		$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
		echo $currentBefore . $term->name . $currentAfter;
		 
		} elseif (is_category()){
		global $wp_query;
		$cat_obj = $wp_query->get_queried_object();
		$thisCat = $cat_obj->term_id;
		$thisCat = get_category($thisCat);
		$parentCat = get_category($thisCat->parent);
		if($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
		echo $currentBefore . '';
		single_cat_title();
		echo '' . $currentAfter;
		 
		} elseif (is_day()){
		echo '<span><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></span> ' . $delimiter . ' ';
		echo '<span><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a></span> ' . $delimiter . ' ';
		echo $currentBefore . get_the_time('d') . $currentAfter;
		 
		} elseif (is_month()){
		echo '<span><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></span> ' . $delimiter . ' ';
		echo $currentBefore . get_the_time('F') . $currentAfter;
		 
		} elseif (is_year()){
		echo $currentBefore . get_the_time('Y') . $currentAfter;
		 
		} elseif (is_single()){
		$postType = get_post_type();
		if($postType == 'post'){
		$cat = get_the_category(); $cat = $cat[0];
		echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
		} elseif($postType == 'san_pham'){
		$terms = get_the_term_list($post->ID, 'product-cat', '', '###', '');
		$terms = explode('###', $terms);
		echo $terms[0]. ' ' . $delimiter . ' ';
		}
		echo $currentBefore;
		the_title();
		echo $currentAfter;
		 
		} elseif (is_page() && !$post->post_parent){
		echo $currentBefore;
		the_title();
		echo $currentAfter;
		 
		} elseif (is_page() && $post->post_parent){
		$parent_id = $post->post_parent;
		$breadcrumbs = array();
		while($parent_id){
		$page = get_page($parent_id);
		$breadcrumbs[] = '<span><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></span>';
		$parent_id = $page->post_parent;
		}
		$breadcrumbs = array_reverse($breadcrumbs);
		foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
		echo $currentBefore;
		the_title();
		echo $currentAfter;
		 
		} elseif (is_search()){
		echo $currentBefore . __('Kết quả tìm kiếm cho từ khóa:', 'wpinsite'). ' &quot;' . get_search_query() . '&quot;' . $currentAfter;
		 
		} elseif (is_tag()){
		echo $currentBefore . __('Bài viết đã được tags với:', 'wpinsite'). ' &quot;';
		single_tag_title();
		echo '&quot;' . $currentAfter;
		 
		} elseif (is_author()) {
		global $author;
		$userdata = get_userdata($author);
		echo $currentBefore . __('Tác giả', 'wpinsite') . $currentAfter;
		 
		} elseif (is_404()){
		echo $currentBefore . __('Không tìm thấy trang', 'wpinsite') . $currentAfter;
		 
		}
		 
		if(get_query_var('paged')){
		if(is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
		echo ' ' . __('Trang') . ' ' . get_query_var('paged');
		if(is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		}
		 
		}
	}
?>