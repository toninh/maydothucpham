<?php

/**
 * Initialize the meta boxes. See /option-tree/assets/theme-mode/demo-meta-boxes.php for reference
 *
 * @package cactus
 */
add_action( 'admin_init', 'cactus_meta_boxes' );

if ( ! function_exists( 'cactus_meta_boxes' ) ){
	function cactus_meta_boxes() {
		$meta_boxes = array();
		/*
		 * Sample meta box ==============
			  
		  $meta_boxes = array(
			'id'        => 'page_meta_box',
			'title'     => __('Page Settings','cactus'),
			'desc'      => '',
			'pages'     => array( 'page' ),
			'context'   => 'normal',
			'priority'  => 'high',
			'fields'    => array(
				array(	
					  'id'          => 'id',
					  'label'       => __('Background','cactus'),
					  'desc'        => __('Description','cactus'),
					  'std'         => '',
					  'type'        => 'text'
				)
			 )
		  );
		  
		*
		*/
	  ot_register_meta_box( $meta_boxes );

	}
}