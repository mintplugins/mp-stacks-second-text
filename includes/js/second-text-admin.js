jQuery(document).ready(function($){
		
	/**
	 * When someone changes the "Screen Size" controller for the text Content-Type
	 *
	 * @since    1.0.0
	 * @link     http://mintplugins.com/doc/
	 */	
	$( document ).on( 'click', 'div[class*="brick_second_text_screen_size_controllerBBBBB"] .brick_screen_size', function(){
		
		var screen_size = $(this).attr( 'mp_stacks_textsize_device' );
		var repeat_num_array = $(this).parent().parent().parent().parent().parent().attr( 'class' ).split("AAAAA");		
		var repeat_num = repeat_num_array[1].split("BBBBB");
		repeat_num = repeat_num[0];
		
		//Show the other "device" icon buttons (desktop, tablet, mobile etc) when clicked
		if ( $(this).parent().attr('mp-area-active' ) == 'closed' ){
			
			//Show all the device icons
			$(this).parent().attr('mp-area-active', 'open' );
			$( this ).parent().find( '.brick_screen_size' ).css( 'display', 'inline-block' );
			
		}
		//Hide the other "device" icon buttons (desktop, tablet, mobile etc) when clicked
		else{
			$(this).parent().attr('mp-area-active', 'closed' );
		
			//Show only the icon the user just picked
			$( '.mp_field_mp_stacks_second_singletext_content_type_repeaterAAAAA' + repeat_num + 'BBBBBAAAAAbrick_second_text_screen_size_controllerBBBBB .brick_screen_size' ).css( 'display', 'none' );
		
			$( '.mp_field_mp_stacks_second_singletext_content_type_repeaterAAAAA' + repeat_num + 'BBBBBAAAAAbrick_second_text_screen_size_controllerBBBBB .' + screen_size ).css( 'display', 'inline-block' );
			
			
			//Hide all text options temporarily
			$( this ).parent().parent().parent().parent().parent().parent().find( '.mp_brick_text_option' ).css( 'display', 'none' );
		
			//If the screen size is "desktop", that's our default so it's a bit different
			if ( screen_size == 'desktop' ){
				
				//Show the text controls for the selected screen size
				$( '.mp_field_mp_stacks_second_singletext_content_type_repeaterAAAAA' + repeat_num + 'BBBBBAAAAAbrick_second_text_color' + 'BBBBB' ).css( 'display', 'inline-block' );
				$( '.mp_field_mp_stacks_second_singletext_content_type_repeaterAAAAA' + repeat_num + 'BBBBBAAAAAbrick_second_text_font_size' + 'BBBBB' ).css( 'display', 'inline-block' );
				$( '.mp_field_mp_stacks_second_singletext_content_type_repeaterAAAAA' + repeat_num + 'BBBBBAAAAAbrick_second_text_line_height' + 'BBBBB' ).css( 'display', 'inline-block' );
				$( '.mp_field_mp_stacks_second_singletext_content_type_repeaterAAAAA' + repeat_num + 'BBBBBAAAAAbrick_second_text_paragraph_margin_bottom' + 'BBBBB' ).css( 'display', 'inline-block' );
				
				//Highlight those controls
				$( '.mp_field_mp_stacks_second_singletext_content_type_repeaterAAAAA' + repeat_num + 'BBBBBAAAAAbrick_second_text_colorBBBBB, ' + 				
				   '.mp_field_mp_stacks_second_singletext_content_type_repeaterAAAAA' + repeat_num + 'BBBBBAAAAAbrick_second_text_font_sizeBBBBB, ' + 
				   '.mp_field_mp_stacks_second_singletext_content_type_repeaterAAAAA' + repeat_num + 'BBBBBAAAAAbrick_second_text_line_heightBBBBB, ' + 
				   '.mp_field_mp_stacks_second_singletext_content_type_repeaterAAAAA' + repeat_num + 'BBBBBAAAAAbrick_second_text_paragraph_margin_bottom' + 'BBBBB '
				).animate({
					'background-color': '#12ff00',
				}, 500, function() {
					// Animation complete.
					$(this).animate({
						'background-color': '',
					}, 1000);
				});
			
			}
			else{
					
				//Show the text controls for the selected screen size
				$( '.mp_field_mp_stacks_second_singletext_content_type_repeaterAAAAA' + repeat_num + 'BBBBBAAAAAbrick_second_text_color_' + screen_size + 'BBBBB' ).css( 'display', 'inline-block' );
				$( '.mp_field_mp_stacks_second_singletext_content_type_repeaterAAAAA' + repeat_num + 'BBBBBAAAAAbrick_second_text_font_size_' + screen_size + 'BBBBB' ).css( 'display', 'inline-block' );
				$( '.mp_field_mp_stacks_second_singletext_content_type_repeaterAAAAA' + repeat_num + 'BBBBBAAAAAbrick_second_text_line_height_' + screen_size + 'BBBBB' ).css( 'display', 'inline-block' );
				$( '.mp_field_mp_stacks_second_singletext_content_type_repeaterAAAAA' + repeat_num + 'BBBBBAAAAAbrick_second_text_paragraph_margin_bottom_' + screen_size + 'BBBBB' ).css( 'display', 'inline-block' );
				
			}
		
			//Highlight those controls
			$( '.mp_field_mp_stacks_second_singletext_content_type_repeaterAAAAA' + repeat_num + 'BBBBBAAAAAbrick_second_text_color_' + screen_size + 'BBBBB, ' + 				
			   '.mp_field_mp_stacks_second_singletext_content_type_repeaterAAAAA' + repeat_num + 'BBBBBAAAAAbrick_second_text_font_size_' + screen_size + 'BBBBB, ' + 
			   '.mp_field_mp_stacks_second_singletext_content_type_repeaterAAAAA' + repeat_num + 'BBBBBAAAAAbrick_second_text_line_height_' + screen_size + 'BBBBB, ' + 
			   '.mp_field_mp_stacks_second_singletext_content_type_repeaterAAAAA' + repeat_num + 'BBBBBAAAAAbrick_second_text_paragraph_margin_bottom_' + screen_size + 'BBBBB '
			).animate({
				'background-color': '#12ff00',
			}, 500, function() {
				// Animation complete.
				$(this).animate({
					'background-color': '',
				}, 1000);
			});
			
			
		}
		
	});
	
});