jQuery(document).ready(function() {
  
  (function ($){

	/* ============ *  Builder Product js * ============ */

		$('.crmWebToEntityForm button#go-next').click(function(ev) {
			ev.preventDefault();
			$('.crmWebToEntityForm').hide(0);
			$('.get_started').show(0);
		});


		$('.doorbuilder .builder-layout .custom_right_tab_content a').click(function(ev) {
			ev.preventDefault();
			var re_cat_show = $(this).attr('data-re_cat');
			$('.builder-layout').hide(0);

			$('#header-builder #layout-listing h4.get_template-sect').show(0);
			$('#layout-listing #'+re_cat_show).show(0);
		});


	
		jQuery('.container-fluid .poplinks a').click(function(event){
		    event.preventDefault();
		    var re_href = $(this).attr('href');
		    jQuery(re_href).bPopup({
		        closeClass:'b-close'
		    });
		});	

	// $('.container-fluid .poplinks a').click(function(ev) {
	// 	ev.preventDefault();
	// 	var re_href = $(this).attr('href');
	// 	$(re_href).fadeIn(0);
	// 	$(re_href).css('opacity',1);		
	// 	$('#header-builder .modal-content').css('height','675px !important');		
	// 	$('#header-builder .modal').css('top','30%');		
	// });


	// $('.page-builder .btn.btn-default').click(function(ev) {
	// 	ev.preventDefault();
	// 	var re_href = $(this).attr('href');
	// 	$('.modal.fade').fadeOut(0);
	// 	$('.modal.fade').css('opacity',0);
	// });



		

	/* ============ *  Builder Product js End * ============ */

  }(jQuery));

});// - document ready