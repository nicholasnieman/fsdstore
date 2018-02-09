 jQuery(document).ready(function() {
	
	(function ($){

		

		var bundled = jQuery('input[name="tinfini_checkbox_bundled"]:checked').val();
		var stored = jQuery('input[name="tinfini_storemetabox"]:checked').val();

		if(bundled == 'on'){
			$('body #poststuff').find('#tinfini_glassmetabox, #tinfini_othermetabox, #tinfini_knobmetabox, #tinfini_towelbarmetabox, #tinfini_handlemetabox, #tinfini_combobarmetabox, #acf_6407, #tinfini_product_options_').show(0);
			$('body #poststuff').find('#tinfini_block_storemetabox, #acf_9108').hide(0);
		}
		else if(stored == 'on'){
			$('body #poststuff').find('#tinfini_glassmetabox, #tinfini_othermetabox, #tinfini_knobmetabox, #tinfini_towelbarmetabox, #tinfini_handlemetabox, #tinfini_combobarmetabox, #acf_6407').hide(0);
			$('body #poststuff').find('#tinfini_block_storemetabox, #acf_9108, #tinfini_product_options_').show(0);
		}	

		$("#tinfini_checkbox_bundled").click(function(e){
			var bundled = $('input[name="tinfini_checkbox_bundled"]:checked').val();
			$('input[name="tinfini_storemetabox').attr('checked', false);
			if(bundled == 'on'){
				$('body #poststuff').find('#tinfini_block_storemetabox, #tinfini_othermetabox, #tinfini_knobmetabox, #tinfini_towelbarmetabox, #tinfini_handlemetabox, #tinfini_combobarmetabox, #acf_6407, #tinfini_product_options_').show(0);
				$('body #poststuff').find('#tinfini_block_storemetabox, #acf_9108').hide(0);
			}
			else{
				$('body #poststuff').find('#tinfini_block_storemetabox, #tinfini_othermetabox, #tinfini_knobmetabox, #tinfini_towelbarmetabox, #tinfini_handlemetabox, #tinfini_combobarmetabox, #acf_6407').hide(0);
			}
			
		});

		$("#tinfini_storemetabox").click(function(e){
			var stored = $('input[name="tinfini_storemetabox"]:checked').val();
			$('input[name="tinfini_checkbox_bundled').attr('checked', false);
			if(stored == 'on'){
				$('body #poststuff').find('#tinfini_glassmetabox, #tinfini_othermetabox, #tinfini_knobmetabox, #tinfini_towelbarmetabox, #tinfini_handlemetabox, #tinfini_combobarmetabox, #acf_6407').hide(0);
				$('body #poststuff').find('#tinfini_block_storemetabox, #acf_9108, #tinfini_product_options_').show(0);
			}
			else{
				$('body #poststuff').find('#tinfini_block_storemetabox, #acf_9108').hide(0);
			}
			
		});


/*Door Builder Discount*/
		$('.product_discount').each(function(index){
			var catid = $(this).find('a').attr('data-re_attrid');

			var isOpen = false;

		  	$(this).find('.'+catid+'-door-title').click(function(){
		  		console.log(catid + '->' + isOpen);
			    if (!isOpen) {
					$(this).parent().find('span').text('-');
					$(this).parent().find('span').addClass('show-detailed');
					$(this).next('#'+catid).slideDown();
					$(this).next('#'+catid+'-hide').slideDown();
					isOpen = true;
			    } else {
			    	$(this).parent().find('span').text('+');
			    	$(this).parent().find('span').addClass('hide-detailed');
			    	
					$(this).next('#'+catid).slideUp();
					$(this).next('#'+catid+'-hide').slideUp();
					isOpen = false;
		    	}
		  	});
		});
		
/*Show Form On selection*/
		var check_attr = $('input[name=dis_opt]:checked', '#discount_mode').val();
		$('body').find('.discount_form').hide(0);
		$('#'+check_attr+'_discount').show(0);

		$('#discount_mode input').on('change', function() {
		   var check_attr = $('input[name=dis_opt]:checked', '#discount_mode').val(); 
		   $('body').find('.discount_form').hide(0);
		   $('#'+check_attr+'_discount').show(0);
		});


		//	var person = jQuery('.check_option input[name="cat_disount_66":checked').val();
			var person = jQuery('input[name="cat_disount_66"]:checked').val();
		// 	alert(person);
		// 	if (person =="Same Discount"){
		// 		jQuery('#66.product_discount_options').find('p').fadeOut(0);
		// 		jQuery(this).parent().parent().addClass('active-tild-sect');
		// 		jQuery(this).parent('.check_option').next('p').addClass('active-category').fadeIn(0);
		// 		jQuery('.active-category').find('label').text('Single Layout');
		// 	}

		// jQuery('.check_option input').on('change', function() {
		//    	var check_attr = jQuery('input[name=cat_disount_66]:checked').val(); 
		// 	if(check_attr == 'Same Discount'){
		// 		jQuery('#66.product_discount_options').find('p').fadeOut(0);
		// 		jQuery(this).parent().parent().addClass('active-tild-sect');
		// 		jQuery(this).parent('.check_option').next('p').addClass('active-category').fadeIn(0);
		// 		jQuery('.active-category').find('label').text('Single Layout');

				
		// 	}
		// 	else{
		// 		jQuery(this).parent().parent().removeClass('active-tild-sect');
		// 		jQuery('.active-category').find('label').text('Single Layout 1:');
		// 		jQuery('#66.product_discount_options').find('p').removeClass('active-category').fadeIn(0);
		// 	}
		// });


		// jQuery('.product_discount_options.active-tild-sect p input').live('keyup', function() {
		// 	var discount_val = jQuery(this).val();
		//   	jQuery('#66.product_discount_options p input').attr('value',discount_val);
		// });


		
    }(jQuery));
});