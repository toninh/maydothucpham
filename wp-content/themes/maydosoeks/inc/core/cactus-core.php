<?php

/**
 * Core features for all themes
 *
 * @package cactus
 * @version 1.0 - 2014/13/05
 */

/**
 * Mobile Detector 
 *
 */
require get_template_directory() . '/inc/core/classes/mobile-detect.php'; 

$mobile_detector = new Mobile_Detect;
global $_device_, $_device_name_, $_is_retina_;
$_device_ = $mobile_detector->isMobile() ? ($mobile_detector->isTablet() ? 'tablet' : 'mobile') : 'pc';
$_device_name_ = $mobile_detector->mobileGrade();
$_is_retina_ = $mobile_detector->isRetina();

/**
 * Option Tree integration
 */
 
 /**
 * Optional: set 'ot_show_pages' filter to false.
 * This will hide the settings & documentation pages.
 */
add_filter( 'ot_show_pages', '__return_true' );

/**
 * Optional: set 'ot_show_new_layout' filter to false.
 * This will hide the "New Layout" section on the Theme Options page.
 */
add_filter( 'ot_show_new_layout', '__return_false' );

/**
 * Required: set 'ot_theme_mode' filter to true.
 */
add_filter( 'ot_theme_mode', '__return_true' );

/**
 * Required: include OptionTree Framework.
 */
load_template( trailingslashit( get_template_directory() ) . '/option-tree/ot-loader.php' );

/** 
 * end Option Tree integration 
 * To get options, use this code
 * $test_input = ot_get_option( 'test_input', 'default value');
 * $test_array = ot_get_option( 'test_array', array('value 1','value 2')); or 
 * $test_array = ot_get_option( 'test_array', array());
 */

require get_template_directory() . '/inc/core/utility-functions.php'; 

/* Enable oEmbed in Text/HTML Widgets */
add_filter( 'widget_text', array( $wp_embed, 'run_shortcode' ), 8 );
add_filter( 'widget_text', array( $wp_embed, 'autoembed'), 8 );


/* Add Custom Variation field to all widgets */
global $wl_cl_options;
if((!$wl_cl_options = get_option('cactusthemes')) || !is_array($wl_cl_options) ) $wl_cl_options = array();

add_action( 'sidebar_admin_setup', 'ct_expand_control');
// adds in the admin control per widget, but also processes import/export
function ct_expand_control(){
	global $wp_registered_widgets, $wp_registered_widget_controls, $wl_cl_options;
	
	// ADD EXTRA CUSTOM FIELDS TO EACH WIDGET CONTROL
	// pop the widget id on the params array (as it's not in the main params so not provided to the callback)
	foreach ( $wp_registered_widgets as $id => $widget )
	{	// controll-less widgets need an empty function so the callback function is called.
		if (!$wp_registered_widget_controls[$id])
			wp_register_widget_control($id,$widget['name'], 'ct_empty_control');
		
		$wp_registered_widget_controls[$id]['callback_ct_redirect']=$wp_registered_widget_controls[$id]['callback'];
		$wp_registered_widget_controls[$id]['callback']='ct_widget_add_custom_fields';
		array_push($wp_registered_widget_controls[$id]['params'],$id);	
	}
	
	// UPDATE CUSTOM FIELDS OPTIONS (via accessibility mode?)
	if ( 'post' == strtolower($_SERVER['REQUEST_METHOD']) )
	{	foreach ( (array) $_POST['widget-id'] as $widget_number => $widget_id )
			if (isset($_POST[$widget_id.'-cactusthemes']))
				$wl_cl_options[$widget_id]=trim($_POST[$widget_id.'-cactusthemes']);
	}
	
	update_option('cactusthemes', $wl_cl_options);
}

/* Empty function for callback - DO NOT DELETE!!! */
function ct_empty_control() {}

function ct_widget_add_custom_fields() {
	global $wp_registered_widget_controls, $wl_cl_options;

	$params=func_get_args();
	
	$id=array_pop($params);
	// go to the original control function
	$callback=$wp_registered_widget_controls[$id]['callback_ct_redirect'];
	if (is_callable($callback))
		call_user_func_array($callback, $params);	
	$value = !empty( $wl_cl_options[$id ] ) ? htmlspecialchars( stripslashes( $wl_cl_options[$id ] ),ENT_QUOTES ) : '';
	//var_dump(get_option('cactusthemes'));
	
	// dealing with multiple widgets - get the number. if -1 this is the 'template' for the admin interface
	$number=$params[0]['number'];
	if ($number==-1) {$number="__i__"; $value="";}
	$id_disp=$id;
	if (isset($number)) $id_disp=$wp_registered_widget_controls[$id]['id_base'].'-'.$number;
	
	// output our extra widget logic field
	echo "<p><label for='".$id_disp."-cactusthemes'>".__('Custom Variation', 'cactusthemes').": <input class='widefat' type='text' name='".$id_disp."-cactusthemes' id='".$id_disp."-cactusthemes' value='".$value."' /></label></p>";
}