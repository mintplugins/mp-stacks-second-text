<?php 
/**
 * This file contains the function which hooks to a brick's content output
 *
 * @since 1.0.0
 *
 * @package    MP Stacks Second Text
 * @subpackage Functions
 *
 * @copyright  Copyright (c) 2014, Mint Plugins
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @author     Philip Johnston
 */
 
/**
 * Filter Content Output for Second Text
 */
function mp_stacks_brick_content_output_second_text($default_content_output, $mp_stacks_content_type, $post_id){
	
	//If this stack content type is set to be text	
	if ($mp_stacks_content_type == 'second_text'){
		
		//Set default value for $content_output to NULL
		$content_output = NULL;	
 
		//First line of text
		$brick_text_line_1 = do_shortcode( html_entity_decode( get_post_meta($post_id, 'brick_second_text_line_1', true) ) );
		
		//Second line of text
		$brick_text_line_2 = do_shortcode( html_entity_decode( get_post_meta($post_id, 'brick_second_text_line_2', true) ) );
				
		//Action hook to add changes to the text
		has_action('mp_stacks_second_text_action') ? do_action( 'mp_stacks_second_text_action', $post_id) : NULL;
		
		//First Output
		$content_output .= !empty($brick_text_line_1) || !empty($brick_text_line_2) ? '<div class="text">' : NULL;
		$content_output .= !empty($brick_text_line_1) ? '<div class="mp-brick-second-text mp-brick-text-line-1">' . $brick_text_line_1 . '</div>' : '';
		$content_output .= !empty($brick_text_line_2) ? '<div class="mp-brick-second-text mp-brick-text-line-2">' . $brick_text_line_2 . '</div>': NULL;
		$content_output .= !empty($brick_text_line_1) || !empty($brick_text_line_2) ? '</div>' : NULL;
		
		//Return
		return $content_output;
	}
	else{
		//Return
		return $default_content_output;
	}
}
add_filter('mp_stacks_brick_content_output', 'mp_stacks_brick_content_output_second_text', 10, 3);

/**
 * Filter CSS Output for Second Line 1
 */
function mp_stacks_second_text_line_1_style($css_output, $post_id){
	
	//Title Color
	$brick_line_1_color = get_post_meta($post_id, 'brick_second_line_1_color', true);
	
	//Title Font Size
	$brick_line_1_font_size = get_post_meta($post_id, 'brick_second_line_1_font_size', true);
	
	//Title Full Style
	$brick_line_1_style = !empty($brick_line_1_color) ? 'color: ' . $brick_line_1_color . '; '  : NULL;
	$brick_line_1_style .= !empty($brick_line_1_font_size) ? 'font-size:' . $brick_line_1_font_size . 'px; ' : NULL;
	
	//Full sized css
	$brick_line_1_style = !empty($brick_line_1_style) ? '#mp-brick-' . $post_id . ' .mp-brick-second-text.mp-brick-text-line-1, #mp-brick-' . $post_id . ' .mp-brick-second-text.mp-brick-text-line-1 a {' . $brick_line_1_style .'}' : NULL;
		
	//Add new CSS to existing CSS passed-in
	$css_output .= $brick_line_1_style;
	
	//Return new CSS
	return $css_output;

}
add_filter('mp_brick_additional_css', 'mp_stacks_second_text_line_1_style', 10, 2);


/**
 * Filter CSS Output for Second Line 2
 */
function mp_stacks_second_text_line_2_style($css_output, $post_id){
	
	//Text Color
	$brick_line_2_color = get_post_meta($post_id, 'brick_second_line_2_color', true);
	
	//Text Font Size
	$brick_line_2_font_size = get_post_meta($post_id, 'brick_second_line_2_font_size', true);
	
	//Text Style
	$brick_line_2_style = !empty($brick_line_2_color) ? 'color: ' . $brick_line_2_color . '; '  : NULL;
	$brick_line_2_style .= !empty($brick_line_2_font_size) ? 'font-size:' . $brick_line_2_font_size . 'px; ' : NULL;
	
	//Full sized css
	$brick_line_2_style = !empty($brick_line_2_style) ? '#mp-brick-' . $post_id . ' .mp-brick-second-text.mp-brick-text-line-2, #mp-brick-' . $post_id . ' .mp-brick-second-text.mp-brick-text-line-2 a{' . $brick_line_2_style .'}' : NULL;
			
	//Add new CSS to existing CSS passed-in
	$css_output .= $brick_line_2_style;
	
	//Return new CSS
	return $css_output;
		
}
add_filter('mp_brick_additional_css', 'mp_stacks_second_text_line_2_style', 10, 2);
