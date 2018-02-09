jQuery(document).ready(function() {
	
	(function ($){
		$(".store-loctn-sect .update-stores-lct #location_num").keyup (function (e) {
			var locatn_num = $(this).val();
	        var data = {
	        	'action'	: 'get_locations_list',
	        	'locatn_num' 	: locatn_num
	        };
	        $.post(ajax_object.ajax_url, data, function(response) {
	        	console.log(response);
	        	var objj = $.parseJSON(response);

	        	$.each(objj, function(sub_key, sub_value) {

	        	  	if(sub_key == 'location_available'){
	        	  		$('.store-loctn-sect .update-stores-lct input[name="'+sub_key+'"]').prop('checked', true);
	        	  	}else if(sub_key == 'location_address'){
	        	  		$("textarea#address").val(sub_value);
	        	  	}else{
	        	  		$('.store-loctn-sect .update-stores-lct input[name="'+sub_key+'"]').attr('value', sub_value);	
	        	  	}
	        	  	
	        	});

	        	

	        });
		});

	}(jQuery));

});// - document ready