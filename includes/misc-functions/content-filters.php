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
 * Filter Content Output for singletext, the "new" way.
 */
function mp_stacks_brick_content_output_secondtext($default_content_output, $mp_stacks_content_type, $post_id){
	
	//If this stack content type is set to be text	
	if ($mp_stacks_content_type == 'second_text'){
		
		//Set default value for $content_output to NULL
		$content_output = NULL;	
 		
		//Get text repeater
		$text_areas = get_post_meta($post_id, 'mp_stacks_second_singletext_content_type_repeater', true);
		
		//If nothing is saved in the repeater
		if ( empty( $text_areas ) ){
			return;	
		}
	
		//Counter
		$counter = 1;
		
		foreach( $text_areas as $text_area ){
			
			//The actual text
			$brick_text = do_shortcode( html_entity_decode( $text_area['brick_second_text'] ) );
			
			//Desired Font Size
			$brick_text_font_size = $text_area['brick_second_text_font_size'];
								
			//First Output
			$content_output .= !empty($brick_text) ? '<div class="mp-stacks-text-area mp-stacks-text-area-' . $counter . '">' : NULL;
			$content_output .= !empty($brick_text) ? '<div class="mp-brick-text">' . $brick_text . '</div>' : '';
			$content_output .= !empty($brick_text) ? '</div>' : NULL;
			
			//Increment Counter
			$counter = $counter + 1;
			
		}
		
		//Return
		return $content_output;
	}
	else{
		//Return
		return $default_content_output;
	}
}
add_filter('mp_stacks_brick_content_output', 'mp_stacks_brick_content_output_secondtext', 10, 3);

/**
 * Filter CSS Output text areas. This deals with the second "singletext", "new" style for text.
 */
function mp_stacks_second_singletext_styles($css_output, $post_id){
	
	//Get text repeater
	$text_areas_vars = get_post_meta($post_id, 'mp_stacks_second_singletext_content_type_repeater', true);	
	
	//If nothing is saved in the repeater
	if ( empty( $text_areas_vars ) ){
		return $css_output;	
	}
	
	//Create variable for css output
	$brick_text_areas_styles = NULL;
	
	//Counter
	$counter = 1;
	
	foreach( $text_areas_vars as $text_area_vars ){
		
		/**
		 * Filter CSS Output this text
		 */
		 
		//Text Color
		$brick_text_color = $text_area_vars['brick_second_text_color'];
		
		//Text Font Size
		$brick_text_font_size = $text_area_vars['brick_second_text_font_size'];
		
		//Text Line Height
		$brick_text_line_height = isset( $text_area_vars['brick_second_text_line_height'] ) ? $text_area_vars['brick_second_text_line_height'] : NULL;
		
		//Text Paragraph Spacing
		$brick_text_paragraph_margin_bottom = isset( $text_area_vars['brick_second_text_paragraph_margin_bottom'] ) ? $text_area_vars['brick_second_text_paragraph_margin_bottom'] : NULL;
		
		//Text Full Style
		$brick_text_style = !empty($brick_text_color) ? 'color: ' . $brick_text_color . '; '  : NULL;
		$brick_text_style .= !empty($brick_text_font_size) ? 'font-size:' . $brick_text_font_size . 'px; ' : NULL;
		$brick_text_style .= !empty($brick_text_line_height) ? 'line-height:' . $brick_text_line_height . 'px; ' : NULL;
		
		//Assemble css
		if ( !empty($brick_text_style) ) {
			$brick_text_areas_styles .= '#mp-brick-' . $post_id . ' .mp-stacks-text-area-' . $counter . ' .mp-brick-text *, ';
			$brick_text_areas_styles .= '#mp-brick-' . $post_id . ' .mp-stacks-text-area-' . $counter . ' .mp-brick-text a {' . $brick_text_style .'}';
		}
		
		//If there is a paragraph spacing variable
		if ( is_numeric( $brick_text_paragraph_margin_bottom ) ){
			$brick_text_areas_styles .= '#mp-brick-' . $post_id . ' .mp-stacks-text-area-' . $counter . ' .mp-brick-text p { margin-bottom:' . $brick_text_paragraph_margin_bottom .'px; }';
		}
				
		//Increment counter
		$counter = $counter + 1;
		
	}
		
	//Add new CSS to existing CSS passed-in
	$css_output .= $brick_text_areas_styles;
	
	//Return new CSS
	return $css_output;

}
add_filter('mp_brick_additional_css', 'mp_stacks_second_singletext_styles', 10, 2);