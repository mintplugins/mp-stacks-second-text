<?php
/**
 * This page contains functions for modifying the metabox for second text as a media type
 *
 * @link http://mintplugins.com/doc/
 * @since 1.0.0
 *
 * @package    MP Stacks Second Text
 * @subpackage Functions
 *
 * @copyright   Copyright (c) 2014, Mint Plugins
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @author      Philip Johnston
 */
 
/**
 * Add Second Text metabox controls
 *
 * @since    1.0.0
 * @link     http://mintplugins.com/doc/
 * @param    array $args See link for description.
 * @return   void
 */
/**
 * Function which creates new Meta Box
 *
 */
function mp_stacks_second_text_create_meta_box(){	
	/**
	 * Array which stores all info about the new metabox
	 *
	 */
	$mp_stacks_second_text_add_meta_box = array(
		'metabox_id' => 'mp_stacks_second_text_metabox', 
		'metabox_title' => __( '"Second Text" Content-Type', 'mp_stacks'), 
		'metabox_posttype' => 'mp_brick', 
		'metabox_context' => 'advanced', 
		'metabox_priority' => 'low' 
	);
	
	/**
	 * Array which stores all info about the options within the metabox
	 *
	 */
	$mp_stacks_second_text_items_array = array(
		array(
			'field_id'	 => 'brick_second_text_media_type_description',
			'field_title' => __( 'Description:', 'mp_stacks'),
			'field_description' => '<br />The "Text" Media-Type has 2 customizable text areas which sit on top of each other.',
			'field_type' => 'basictext',
			'field_value' => ''
		),
		array(
			'field_id'	 => 'brick_second_line_1_color',
			'field_title' => __( 'Text Color 1 (Optional)', 'mp_stacks'),
			'field_description' => '<br />Select the color of text area 1.',
			'field_type' => 'colorpicker',
			'field_value' => '',
			'field_container_class' => 'mp_brick_text_option'
		),
		array(
			'field_id'	 => 'brick_second_line_1_font_size',
			'field_title' => __( 'Text Size 1 (Optional)', 'mp_stacks'),
			'field_description' => '<br />Enter the size (in pixels).',
			'field_type' => 'number',
			'field_value' => '',
			'field_container_class' => 'mp_brick_text_option'
		),
		array(
			'field_id'	 => 'brick_second_text_line_1',
			'field_title' => __( 'Text Area 1', 'mp_stacks'),
			'field_description' => 'Enter the text to display on text area 1',
			'field_type' => 'wp_editor',
			'field_value' => '',
			'field_container_class' => 'mp_field_brick_text_line_1'
		),
		array(
			'field_id'	 => 'brick_second_line_2_color',
			'field_title' => __( 'Text Color 2 (Optional)', 'mp_stacks'),
			'field_description' => '<br />Select the color of text area 2',
			'field_type' => 'colorpicker',
			'field_value' => '',
			'field_container_class' => 'mp_brick_text_option'
		),
		array(
			'field_id'	 => 'brick_second_line_2_font_size',
			'field_title' => __( 'Text Size 2 (Optional)', 'mp_stacks'),
			'field_description' => '<br />Enter the size (in pixels).',
			'field_type' => 'number',
			'field_value' => '',
			'field_container_class' => 'mp_brick_text_option'
		),
		array(
			'field_id'	 => 'brick_second_text_line_2',
			'field_title' => __( 'Text Area 2', 'mp_stacks'),
			'field_description' => 'Enter the text to display on text area 2',
			'field_type' => 'wp_editor',
			'field_value' => '',
			'field_container_class' => 'mp_field_brick_text_line_1'
		),
		array(
			'field_id'	 => 'brick_second_content_type_help',
			'field_title' => 'Content Types',
			'field_description' => NULL,
			'field_type' => 'help',
			'field_value' => '',
			'field_select_values' => array(
				array( 
					'type' => 'oembed',
					'link' => 'https://mintplugins.com/embed/?post_id=3872',
					'link_text' => __( '"Text" Content-Type Tutorial', 'mp_stacks'),
					'target' => NULL
				),
			)
		),
	);
	
	
	/**
	 * Custom filter to allow for add-on plugins to hook in their own data for add_meta_box array
	 */
	$mp_stacks_second_text_add_meta_box = has_filter('mp_stacks_second_text_meta_box_array') ? apply_filters( 'mp_stacks_second_text_meta_box_array', $mp_stacks_second_text_add_meta_box) : $mp_stacks_second_text_add_meta_box;
	
	//Globalize the and populate mp_stacks_features_items_array (do this before filter hooks are run)
	global $global_mp_stacks_second_text_items_array;
	$global_mp_stacks_second_text_items_array = $mp_stacks_second_text_items_array;
	
	/**
	 * Custom filter to allow for add on plugins to hook in their own extra fields 
	 */
	$mp_stacks_second_text_items_array = has_filter('mp_stacks_second_text_items_array') ? apply_filters( 'mp_stacks_second_text_items_array', $mp_stacks_second_text_items_array) : $mp_stacks_second_text_items_array;
	
	/**
	 * Create Metabox class
	 */
	global $mp_stacks_second_text_meta_box;
	$mp_stacks_second_text_meta_box = new MP_CORE_Metabox($mp_stacks_second_text_add_meta_box, $mp_stacks_second_text_items_array);
}
add_action('plugins_loaded', 'mp_stacks_second_text_create_meta_box');