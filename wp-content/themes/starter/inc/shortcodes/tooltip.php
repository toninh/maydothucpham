<?php 
function crown_create_tooltip($atts, $content = null) {
	$tooltipID =  rand(1, 999);	
	$id = isset($atts['id']) ? $atts['id'] : 'cr-tooltip-'.$tooltipID;
	$title = isset($atts['title']) ? $atts['title'] : 'This tooltip is on top!';
	$html = '';
	$html .='
	<a href="#" title="'.$title.'"'.($id?'id="'.$id.'"':'').' class="cactus_tooltip">'.$content.'</a>
	';
	return $html;
}
add_shortcode('tooltip', 'crown_create_tooltip');
