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
		'brick_second_text_media_type_description' => array(
			'field_id'	 => 'brick_second_text_media_type_description',
			'field_title' => __( 'Text Area:', 'mp_stacks_second_text'),
			'field_description' => __( 'Add as many Text Areas as you want. Each new text area can have its own font, text-size, color, and spacing.', 'mp_stacks_second_text' ),
			'field_type' => 'basictext',
			'field_value' => ''
		),
		'brick_second_text_color' => array(
			'field_id'	 => 'brick_second_text_color',
			'field_title' => __( 'Text Color (Optional)', 'mp_stacks'),
			'field_description' => 'Select the color for this text.',
			'field_type' => 'colorpicker',
			'field_value' => '',
			'field_container_class' => 'mp_brick_text_option',
			'field_repeater' => 'mp_stacks_second_singletext_content_type_repeater'
		),
		'brick_second_text_font_size' => array(
			'field_id'	 => 'brick_second_text_font_size',
			'field_title' => __( 'Text Size (Optional)', 'mp_stacks'),
			'field_description' => 'Enter the size (in pixels).',
			'field_type' => 'number',
			'field_value' => '35',
			'field_container_class' => 'mp_brick_text_option',
			'field_repeater' => 'mp_stacks_second_singletext_content_type_repeater'
		),
		'brick_second_text_line_height' => array(
			'field_id'	 => 'brick_second_text_line_height',
			'field_title' => __( 'Line-Height', 'mp_stacks'),
			'field_description' => 'Enter the line-height in pixels. By default this matches the Text Size.',
			'field_type' => 'number',
			'field_value' => '',
			'field_container_class' => 'mp_brick_text_option',
			'field_repeater' => 'mp_stacks_second_singletext_content_type_repeater'
		),
		'brick_second_text_paragraph_margin_bottom' => array(
			'field_id'	 => 'brick_second_text_paragraph_margin_bottom',
			'field_title' => __( 'Paragraph Spacing', 'mp_stacks'),
			'field_description' => 'Enter the number of pixels separating each paragraph. Default: 15px',
			'field_type' => 'number',
			'field_value' => '15',
			'field_container_class' => 'mp_brick_text_option',
			'field_repeater' => 'mp_stacks_second_singletext_content_type_repeater'
		),
		'brick_second_text' => array(
			'field_id'	 => 'brick_second_text',
			'field_title' => __( 'Text Area 1', 'mp_stacks'),
			'field_description' => 'Enter the text',
			'field_type' => 'wp_editor',
			'field_value' => '',
			'field_repeater' => 'mp_stacks_second_singletext_content_type_repeater'
		),
	
	);
	
	
	/**
	 * Custom filter to allow for add-on plugins to hook in their own data for add_meta_box array
	 */
	$mp_stacks_second_text_add_meta_box = has_filter('mp_stacks_second_text_meta_box_array') ? apply_filters( 'mp_stacks_second_text_meta_box_array', $mp_stacks_second_text_add_meta_box) : $mp_stacks_second_text_add_meta_box;
		
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
add_action('mp_brick_metabox', 'mp_stacks_second_text_create_meta_box');