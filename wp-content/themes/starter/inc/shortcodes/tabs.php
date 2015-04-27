<?php 
function crown_create_tabs($params, $content = null){
	$content = preg_replace('/<br class="cr".\/>/', '', $content);
	global $tabs_id;
	$tabs_id = isset($params['id'])?$params['id']:'';
	global $tabs_item_count;
	global $tabs_head_count;
	$tabs_item_count[$tabs_id]=0;
	$tabs_head_count[$tabs_id]=0;
	ob_start(); ?>
    <div class="cr-tab-shortcode" id="tabs-<?php echo $tabs_id; ?>">
     <?php echo do_shortcode($content) ?>
  </div>
    <?php 
	//return
	$output_string=ob_get_contents();
	ob_end_clean();
	return $output_string;
}
add_shortcode('tabs', 'crown_create_tabs');

function crown_create_thead($params, $content = null){
	$content = preg_replace('/<br class="cr".\/>/', '', $content);
	ob_start(); ?>
    
    <ul id="myTab" class="nav nav-tabs">
      <?php echo do_shortcode($content);?>
    </ul>
    
    <?php 
	//return
	$output_string=ob_get_contents();
	ob_end_clean();
	return $output_string;
}
add_shortcode('thead', 'crown_create_thead');

function crown_create_tab($params, $content = null){
	$t_id = $params['id'];
	$t_title = $params['title'];
	$content = preg_replace('/<br class="cr".\/>/', '', $content);
	global $tabs_id;
	global $tabs_head_count;
	$tabs_head_count[$tabs_id]++;
	ob_start(); ?>
    
   	 <li class="<?php echo $tabs_head_count[$tabs_id]==1?'active':''?>"><a href="#<?php echo $t_id;?>" data-toggle="tab"><?php echo $t_title;?></a></li>
  
    <?php 
	//return
	$output_string=ob_get_contents();
	ob_end_clean();
	return $output_string;
}
add_shortcode('tab', 'crown_create_tab');

function crown_create_tcontents($params, $content = null){
	
	ob_start(); ?>
        
	<div class="tab-content">
      <?php echo do_shortcode($content);?>
    </div>
    
     <?php 
	//return
	$output_string=ob_get_contents();
	ob_end_clean();
	return $output_string;
}
add_shortcode('tcontents', 'crown_create_tcontents');

function crown_create_tcontent($params, $content = null){
	$ct_id = isset($params["id"])?$params["id"]:'';
	$content = preg_replace('/<br class="cr".\/>/', '', $content);
	global $tabs_id;
	global $tabs_item_count;
	$tabs_item_count[$tabs_id]++;
	ob_start(); ?>
    
	<div class="tab-pane fade <?php echo $tabs_item_count[$tabs_id]==1?'active in':''?> " id="<?php echo $ct_id;?>">
        <?php echo do_shortcode($content);?>
      </div>
      
	<?php 
	//return
	$output_string=ob_get_contents();
	ob_end_clean();
	return $output_string;
}
add_shortcode('tcontent', 'crown_create_tcontent');