<?php
/*Create Dropcaps*/
function crown_create_dropcaps($dr, $dr_content){
	$drcID =  rand(1, 999);
	$id = isset($atts['id']) ? $atts['id'] : 'cr-drc-'.$drcID;
	$html ='<div class="dropcaps" id="'.$id.'"><p>'.$dr_content.'</p></div>';
	return $html;
}
add_shortcode('dropcap','crown_create_dropcaps');
/*Create Dropcaps END*/