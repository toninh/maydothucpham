<?php 
function crown_create_collapse($params, $content = null){
	extract(shortcode_atts(array(
		'id'=>rand(10,9999)
 		), $params));
	$content = preg_replace('/<br class="cr".\/>/', '', $content);
	global $collapse_id;
	global $collapse_item_count;
	$collapse_item_count[$collapse_id]=0;
	$collapse_id = $id;
	ob_start(); ?>
		<div class="panel-group" id="accordion-<?php echo $id ?>">
          <?php echo do_shortcode($content) ?>
        </div>
	<?php
	//return
	$output_string=ob_get_contents();
	ob_end_clean();
	return $output_string;
}
add_shortcode('collapse', 'crown_create_collapse');


function crown_create_citem($params, $content = null){
	extract(shortcode_atts(array(
		'id'=>rand(10,9999),
		'title'=>'Collapse title'
 		), $params));
	$content = preg_replace('/<br class="cr".\/>/', '', $content);
	global $collapse_id;
	global $collapse_item_count;
	$collapse_item_count[$collapse_id]++;
	ob_start(); ?>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion-<?php echo $collapse_id ?>" href="#collapse<?php echo $id ?>">
                  <?php echo $title ?>
                </a>
              </h4>
            </div>
            <div id="collapse<?php echo $id ?>" class="panel-collapse collapse <?php echo $collapse_item_count[$collapse_id]==1?'in':'' ?>">
              <div class="panel-body">
                <?php echo do_shortcode($content) ?>
              </div>
            </div>
          </div>
	<?php
	//return
	$output_string=ob_get_contents();
	ob_end_clean();
	return $output_string;
}
add_shortcode('citem', 'crown_create_citem');
