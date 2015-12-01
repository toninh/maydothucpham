<?php
function crown_create_button($atts, $content){	
	$btnID =  rand(1, 999);
	$id = isset($atts['id']) ? $atts['id'] : 'cr-btn-'.$btnID;
	$size = isset($atts['size']) ? $atts['size'] : '';	
	$href = isset($atts['href']) ? $atts['href'] : '';
	$icon = isset($atts['icon']) ? $atts['icon'] : '';	
	$bg_color = isset($atts['bg_color']) ? $atts['bg_color'] : '';
	$html = '';
	$html .= '<a href="'.$href.'" title="' . $content . '"'. 'id="'.$id.'"'. ($bg_color != ''? 'style="background:'.$bg_color.'"':''). ' class="button"' .">" .$content.'</a>';
		
	return $html;	
}
add_shortcode( 'button', 'crown_create_button' );