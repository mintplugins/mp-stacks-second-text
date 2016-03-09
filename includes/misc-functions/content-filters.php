<?php 
/**
 * This file contains the function which hooks to a brick's content output
 *
 * @since 1.0.0
 *
 * @package    MP Stacks Second Text
 * @subpackage Functions
 *
 * @copyright  Copyright (c) 2015, Mint Plugins
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
			$brick_second_text = do_shortcode( html_entity_decode( $text_area['brick_second_text'] ) );
			
			//Desired Font Size
			$brick_second_text_font_size = $text_area['brick_second_text_font_size'];
								
			//First Output
			$content_output .= !empty($brick_second_text) ? '<div class="mp-stacks-text-area mp-stacks-second-text-area mp-stacks-second-text-area mp-stacks-second-text-area-' . $counter . '">' : NULL;
			$content_output .= !empty($brick_second_text) ? '<div class="mp-brick-text">' . $brick_second_text . '</div>' : '';
			$content_output .= !empty($brick_second_text) ? '</div>' : NULL;
			
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
	$brick_second_text_areas_styles = NULL;
	
	//Counter
	$counter = 1;
	
	foreach( $text_areas_vars as $text_area_vars ){
		
		/**
		 * Filter CSS Output this text
		 */
		 
		//Text Color
		$default_brick_second_text_color = $text_area_vars['brick_second_text_color'];
		$tablet_brick_second_text_color = isset( $text_area_vars['brick_second_text_color_tablet'] ) ? $text_area_vars['brick_second_text_color_tablet'] : NULL;
		$mobile_brick_second_text_color = isset( $text_area_vars['brick_second_text_color_mobile'] ) ? $text_area_vars['brick_second_text_color_mobile'] : NULL;
		
		//Text Font Size
		$default_brick_second_text_font_size = $text_area_vars['brick_second_text_font_size'];
		$tablet_brick_second_text_font_size = isset( $text_area_vars['brick_second_text_font_size_tablet'] ) ? $text_area_vars['brick_second_text_font_size_tablet'] : NULL;
		$mobile_brick_second_text_font_size = isset( $text_area_vars['brick_second_text_font_size_mobile'] ) ? $text_area_vars['brick_second_text_font_size_mobile'] : NULL;
		
		//Text Line Height
		$default_brick_second_text_line_height = isset( $text_area_vars['brick_second_text_line_height'] ) ? $text_area_vars['brick_second_text_line_height'] : NULL;
		$tablet_brick_second_text_line_height = isset( $text_area_vars['brick_second_text_line_height_tablet'] ) ? $text_area_vars['brick_second_text_line_height_tablet'] : NULL;
		$mobile_brick_second_text_line_height = isset( $text_area_vars['brick_second_text_line_height_mobile'] ) ? $text_area_vars['brick_second_text_line_height_mobile'] : NULL;
		
		//Text Paragraph Spacing
		$default_brick_second_text_paragraph_margin_bottom = isset( $text_area_vars['brick_second_text_paragraph_margin_bottom'] ) ? $text_area_vars['brick_second_text_paragraph_margin_bottom'] : NULL;
		$tablet_brick_second_text_paragraph_margin_bottom = isset( $text_area_vars['brick_second_text_paragraph_margin_bottom_tablet'] ) ? $text_area_vars['brick_second_text_paragraph_margin_bottom_tablet'] : NULL;
		$mobile_brick_second_text_paragraph_margin_bottom = isset( $text_area_vars['brick_second_text_paragraph_margin_bottom_mobile'] ) ? $text_area_vars['brick_second_text_paragraph_margin_bottom_mobile'] : NULL;
		
		//Default Text Full Style
		$default_brick_second_text_style = !empty($default_brick_second_text_color) ? 'color: ' . $default_brick_second_text_color . '; '  : NULL;
		$default_brick_second_text_style .= !empty($default_brick_second_text_font_size) ? 'font-size:' . $default_brick_second_text_font_size . 'px; ' : NULL;
		$default_brick_second_text_style .= !empty($default_brick_second_text_line_height) ? 'line-height:' . $default_brick_second_text_line_height . 'px; ' : NULL;
		
		//Tablet Full Style
		$tablet_brick_second_text_style = !empty($tablet_brick_second_text_color) ? 'color: ' . $tablet_brick_second_text_color . '; '  : NULL;
		$tablet_brick_second_text_style .= !empty($tablet_brick_second_text_font_size) ? 'font-size:' . $tablet_brick_second_text_font_size . 'px; ' : NULL;
		$tablet_brick_second_text_style .= !empty($tablet_brick_second_text_line_height) ? 'line-height:' . $tablet_brick_second_text_line_height . 'px; ' : NULL;
		
		//Mobile Full Style
		$mobile_brick_second_text_style = !empty($mobile_brick_second_text_color) ? 'color: ' . $mobile_brick_second_text_color . '; '  : NULL;
		$mobile_brick_second_text_style .= !empty($mobile_brick_second_text_font_size) ? 'font-size:' . $mobile_brick_second_text_font_size . 'px; ' : NULL;
		$mobile_brick_second_text_style .= !empty($mobile_brick_second_text_line_height) ? 'line-height:' . $mobile_brick_second_text_line_height . 'px; ' : NULL;
		
		//Assemble Default (Desktop) CSS
		if ( !empty($default_brick_second_text_style) ) {
			
			//Desktop CSS
			$brick_second_text_areas_styles .= '#mp-brick-' . $post_id . ' .mp-stacks-second-text-area-' . $counter . ' .mp-brick-text *, ';
			$brick_second_text_areas_styles .= '#mp-brick-' . $post_id . ' .mp-stacks-second-text-area-' . $counter . ' .mp-brick-text a {' . $default_brick_second_text_style .'}';
			
			//If there is a paragraph spacing variable
			if ( is_numeric( $default_brick_second_text_paragraph_margin_bottom ) ){
				$brick_second_text_areas_styles .= '#mp-brick-' . $post_id . ' .mp-stacks-second-text-area-' . $counter . ' .mp-brick-text p { margin-bottom:' . $default_brick_second_text_paragraph_margin_bottom .'px; }';
			}
		
		}
		
		//Assemble Tablet CSS
		if ( !empty($tablet_brick_second_text_style) ) {
			
			//Tablet CSS
			$brick_second_text_areas_styles .= '@media (max-width: 961px) {';
				$brick_second_text_areas_styles .= '#mp-brick-' . $post_id . ' .mp-stacks-second-text-area-' . $counter . ' .mp-brick-text *, ';
				$brick_second_text_areas_styles .= '#mp-brick-' . $post_id . ' .mp-stacks-second-text-area-' . $counter . ' .mp-brick-text a {' . $tablet_brick_second_text_style .'}';
				
				//If there is a paragraph spacing variable
				if ( is_numeric( $tablet_brick_second_text_paragraph_margin_bottom ) ){
					$brick_second_text_areas_styles .= '#mp-brick-' . $post_id . ' .mp-stacks-second-text-area-' . $counter . ' .mp-brick-text p { margin-bottom:' . $tablet_brick_second_text_paragraph_margin_bottom .'px; }';
				}
			
			$brick_second_text_areas_styles .= '}';
			
		}
		//Assemble Mobile CSS
		if ( !empty($mobile_brick_second_text_style) ) {
			
			//Mobile CSS
			$brick_second_text_areas_styles .= '@media (max-width: 600px) {';
				$brick_second_text_areas_styles .= '#mp-brick-' . $post_id . ' .mp-stacks-second-text-area-' . $counter . ' .mp-brick-text *, ';
				$brick_second_text_areas_styles .= '#mp-brick-' . $post_id . ' .mp-stacks-second-text-area-' . $counter . ' .mp-brick-text a {' . $mobile_brick_second_text_style .'}';
				
				//If there is a paragraph spacing variable
				if ( is_numeric( $mobile_brick_second_text_paragraph_margin_bottom ) ){
					$brick_second_text_areas_styles .= '#mp-brick-' . $post_id . ' .mp-stacks-second-text-area-' . $counter . ' .mp-brick-text p { margin-bottom:' . $mobile_brick_second_text_paragraph_margin_bottom .'px; }';
				}
				
			$brick_second_text_areas_styles .= '}';
		}
				
		//Increment counter
		$counter = $counter + 1;
		
	}
		
	//Add new CSS to existing CSS passed-in
	$css_output .= $brick_second_text_areas_styles;
	
	//Return new CSS
	return $css_output;

}
add_filter('mp_brick_additional_css', 'mp_stacks_second_singletext_styles', 10, 2);