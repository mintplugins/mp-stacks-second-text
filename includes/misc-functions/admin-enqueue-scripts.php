<?php
/**
 * JS and CSS enqueues for the second text addon for MP Stacks.
 *
 * @link http://mintplugins.com/doc/
 * @since 1.0.0
 *
 * @package    MP Stacks + Second Text
 * @subpackage Functions
 *
 * @copyright  Copyright (c) 2015, Mint Plugins
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @author     Philip Johnston
 */

/**
 * Enqueue Admin JS for Ajax
 *
 * @since    1.0.0
 * @link     http://mintplugins.com/doc/
 * @see      function_name()
 * @param  	 array $scripts An array containing the urls for each script as a key>value pair. Each key is what you'd use as the 'handle' in a wp_enqueue_scripts
 * @return   array $scripts The incoming array with our additional scripts added. These will be added to the Brick Editor footer upon ajax completion.
 */
function mp_stacks_second_text_ajax_admin_scripts( $scripts, $metabox_id ){
	
	if ( $metabox_id != 'mp_stacks_second_text_metabox' ){
		return $scripts;	
	}

	//Enqueue Admin JS
	$scripts['mp_stacks_second_text_admin_js'] = plugins_url( 'js/second-text-admin.js?ver=' . MP_STACKS_SECOND_TEXT_VERSION, dirname( __FILE__ ) );
	
	return $scripts;

}
add_filter( 'mp_core_metabox_ajax_admin_js_scripts', 'mp_stacks_second_text_ajax_admin_scripts', 10, 2 );

/**
 * Enqueue Admin CSS for Ajax
 *
 * @since    1.0.0
 * @link     http://mintplugins.com/doc/
 * @see      function_name()
 * @param  	 array $stylesheets An array containing the urls for each stylesheet as a key>value pair. Each key is what you'd use as the 'handle' in a wp_enqueue_scripts
 * @return   array $stylesheets The incoming array with our additional stylesheet urls added. These will be added to the Brick Editor <head> upon ajax completion.
 */
function mp_stacks_second_text_ajax_admin_css( $stylesheets, $metabox_id ){
	
	if ( $metabox_id != 'mp_stacks_second_text_metabox' ){
		return $stylesheets;	
	}
	
	//Enqueue Admin CSS
	$stylesheets['mp_stacks_second_text_admin_style'] = plugins_url('css/second-text-admin.css?ver=' . MP_STACKS_SECOND_TEXT_VERSION, dirname(__FILE__) );
	
	return $stylesheets;

}
add_filter( 'mp_core_metabox_ajax_admin_css_stylesheets', 'mp_stacks_second_text_ajax_admin_css', 10, 2 );