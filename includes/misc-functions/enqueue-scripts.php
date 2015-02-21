<?php
/**
 * Enqueue stylesheet used for shortcode
 */
function mp_stacks_second_text_admin_enqueue(){
	
	//css
	wp_enqueue_style( 'mp_stacks_second_text_admin_style', plugins_url('css/second-text-admin.css', dirname(__FILE__)), MP_STACKS_SECOND_TEXT_VERSION );
	
}
add_action('admin_enqueue_scripts', 'mp_stacks_second_text_admin_enqueue');