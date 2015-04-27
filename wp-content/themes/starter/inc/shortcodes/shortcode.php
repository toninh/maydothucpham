<?php
require_once locate_template('/inc/shortcodes/dropcap.php');
require_once locate_template('/inc/shortcodes/tooltip.php');
require_once locate_template('/inc/shortcodes/button.php');
require_once locate_template('/inc/shortcodes/alert.php');
require_once locate_template('/inc/shortcodes/tabs.php');
require_once locate_template('/inc/shortcodes/collapse.php');
require_once locate_template('/inc/shortcodes/row-col.php');

if ( get_user_option('rich_editing') == 'true' ) {
	add_filter( 'mce_external_plugins', 'regplugins');
	add_filter( 'mce_buttons_3', 'regbtns' );
}
function regbtns($buttons){
	array_push($buttons, 'cactus_dropcap');
	array_push($buttons, 'cactus_tooltip');
	array_push($buttons, 'cactus_button');
	array_push($buttons, 'cactus_alert');
	array_push($buttons, 'cactus_tabs');
	array_push($buttons, 'cactus_collapse');
	array_push($buttons, 'cactus_row_col');
	return $buttons;
}
	
function regplugins($plgs){
	$plgs['cactus_dropcap'] = get_template_directory_uri().'/inc/shortcodes/js/dropcap.js';
	$plgs['cactus_tooltip'] = get_template_directory_uri().'/inc/shortcodes/js/tooltip.js';
	$plgs['cactus_button'] = get_template_directory_uri().'/inc/shortcodes/js/button.js';
	$plgs['cactus_alert'] = get_template_directory_uri().'/inc/shortcodes/js/alert.js';
	$plgs['cactus_tabs'] = get_template_directory_uri().'/inc/shortcodes/js/tabs.js';
	$plgs['cactus_collapse'] = get_template_directory_uri().'/inc/shortcodes/js/collapse.js';
	$plgs['cactus_row_col'] = get_template_directory_uri().'/inc/shortcodes/js/row-col.js';
	return $plgs;
}