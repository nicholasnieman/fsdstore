
jQuery(document).ready(function() {
	
	(function ($){

        /*Add active class to kiosk product layout listing page*/
        jQuery('#kiosk_dummy').find('.custom_left_tab_menu ul li:first-child a').addClass('active');

        var mndFileds=new Array('First Name','Last Name','Email','Phone');
        var fldLangVal=new Array('First Name','Last Name','Email','Phone');
        var name='';
        var email='';

        function checkMandatory2() {
          for(i=0;i<mndFileds.length;i++) {
            var fieldObj=document.forms['WebToLeads1429722000001420012'][mndFileds[i]];
            if(fieldObj) {
              if (((fieldObj.value).replace(/^\s+|\s+$/g, '')).length==0) {
               if(fieldObj.type =='file')
                { 
                 alert('Please select a file to upload'); 
                 fieldObj.focus(); 
                 return false;
                } 
              alert(fldLangVal[i] +' cannot be empty'); 
                      fieldObj.focus();
                      return false;
              }  else if(fieldObj.nodeName=='SELECT') {
                     if(fieldObj.options[fieldObj.selectedIndex].value=='-None-') {
                alert(fldLangVal[i] +' cannot be none'); 
                fieldObj.focus();
                return false;
                 }
              } else if(fieldObj.type =='checkbox'){
                   if(fieldObj.checked == false){
                alert('Please accept  '+fldLangVal[i]);
                fieldObj.focus();
                return false;
                 } 
               } 
               try {
                   if(fieldObj.name == 'Last Name') {
                name = fieldObj.value;
                      }
              } catch (e) {}
            }
          }
           return validateFileUpload();
        }

         function validateFileUpload(){
         var uploadedFiles = document.getElementById('theFile'); 
         var totalFileSize =0; 
         if(uploadedFiles.files.length >3){ 
           alert('You can upload a maximum of 3 files at a time.'); 
           return false; 
         } 
         if ('files' in uploadedFiles) { 
           if (uploadedFiles.files.length != 0) { 
             for (var i = 0; i < uploadedFiles.files.length; i++) { 
               var file = uploadedFiles.files[i]; 
               if ('size' in file) { 
                 totalFileSize = totalFileSize + file.size; 
               } 
             } 
             if(totalFileSize > 20971520){ 
               alert('Total File(s) size should not exceed 20 MB.'); 
               return false; 
             } 
           } 
         } 
       }

// jQuery('.testimonials_form_container .custom-int-grp .form-btn').attr("disabled","disabled");

// jQuery('.testimonials_form_container .custom-int-grp .form-btn').click(function(event){

//   alert(jQuery('.testimonials_form_container input[name="LEADCF109"]:checked'));
//   // if(this.checked){
//   //     jQuery('.testimonials_form_container .custom-int-grp .form-btn').removeAttr("disabled");
//   // }
//   // if(!this.checked){
    
//   //    jQuery('.testimonials_form_container .custom-int-grp .form-btn').attr("disabled","disabled");
    
//   // }
// });

function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

var catidd = getParameterByName('catidd');

jQuery('.rbs_gallery_button a').each(function(){
  var test = jQuery(this).attr('data-filter');
  var res = test.split("."); 
  if(catidd == res[1]){
    jQuery(this).addClass('active').attr('id',res[1]);
    jQuery('#'+res[1]).trigger('click')
  }
    
});

     if(jQuery('body').hasClass('woocommerce-cart')){
      jQuery('.woocommerce .cart_item').each(function() {
        jQuery(this).find('.product-thumbnail img').removeAttr('srcset');  
      });
      
     }

        jQuery('.my_li').on( "click", function() { 
            // alert(jQuery(this).attr('id'));
            var li_id = jQuery(this).attr('id');        
            jQuery('.common_class').css('display','none');
            jQuery('.'+li_id).css('display','block');
            jQuery('.my_li').removeClass("activeSlide");
            jQuery('#'+li_id).addClass("activeSlide");

        });
        // get started page tab section on click event
        jQuery('.custom_right_tab_content .tab-content:first-child').addClass('active');
        jQuery('.custom_left_tab_menu a').click(function(event){
            event.preventDefault();
             jQuery('.custom_left_tab_menu a').removeClass('active');
            jQuery(this).addClass('active');
            var rel_at= jQuery(this).attr('rel');
            //alert(rel_at);
            jQuery('.tab-content').removeClass('active');
            jQuery('body .custom_right_tab_content').find("#"+rel_at).addClass('active');
            
        });
        // get started page tab section on hover event
        jQuery('.custom_left_tab_menu a').hover(function(event){
            event.preventDefault();
             jQuery('.custom_left_tab_menu a').removeClass('active');
            jQuery(this).addClass('active');
            var rel_at= jQuery(this).attr('rel');
            //alert(rel_at);
            jQuery('.tab-content').removeClass('active');
            jQuery('body .custom_right_tab_content').find("#"+rel_at).addClass('active');
            
        });

  		 jQuery(".doorWidget img").each(function() {
  			 var current = jQuery(this).attr("src");
  			// console.log(current);
  			 var newimg = current.replace(".jpg", ".gif");
  			 jQuery(this).mouseover(function () {
  		 		 jQuery(this).attr("src", newimg);
  		 	 });
  		 	 jQuery(this).mouseout(function () {
  				jQuery(this).attr("src", current);
  		 	});
  		 });

       jQuery(".tab-content img").each(function() {
           var current2 = jQuery(this).attr("src");
           var current_animated = jQuery(this).attr("data-animated");
           if(current_animated){
             var newimg2 = current2.replace(".jpg", ".gif");
             jQuery(this).mouseover(function () {
                 jQuery(this).attr("src", newimg2);
             });
             jQuery(this).mouseout(function () {
                jQuery(this).attr("src", current2);
            });
           }
          // console.log(current);
           
       });

        jQuery("#menu-toggle").click(function(){
            jQuery("#header-main-menu #main-menu").slideToggle();
        });
        
        jQuery('#header-main-menu #main-menu .menu-item-has-children').append('<i class="fa fa-chevron-down" aria-hidden="true"></i>');
        
        jQuery('.fa.fa-chevron-down').click(function(){
            jQuery(this).parent().find('.sub-menu').slideToggle();
        });
          /* set breadcrum title for wocommerce single pages */
        var title= jQuery('.woocommerce .page_header_inner h2').text();
        jQuery('.woocommerce .container .breadcrumbs').find('.skt-breadcrumbs-separator').append(title) ;

        /* trigger click on view gallery button on galler page*/

        jQuery('.b4afterWrap .shop-now.btn-sm').click(function(){
           jQuery(this).next().find('.owl-wrapper .owl-item:first-child .item .fancy-img').trigger("click");
        });

         /* trigger click on view gallery button on our facility page*/

        jQuery('#ofGalLaunch').click(function(){
           jQuery(this).next().find('.fancyimg').trigger("click");
        });

        jQuery('.page-template-gallery-page').find('#main-header').removeClass('active-style');
        jQuery(".page-template-gallery-page  #b4QJ ul li a").click(function(){
            jQuery(this).parents().find('#main-header').addClass('active-style');
        });
        
      

         /* ========================================================================
        *  Sliders js
        * ========================================================================
        */
         // HOME SLIDER
        jQuery("#home-slider").owlCarousel({
          
         paginationNumbers: false,
            responsiveClass:true,
            stopOnHover : false,
            navigation: true, 
            pagination : true,
      			smartSpeed : 65000,
            goToFirstSpeed : 13500,
            singleItem : true,

            slideSpeed : 1200,
            paginationSpeed : 1000,
            rewindSpeed : 1000,
            autoPlay : 13000,
           //autoHeight : true,
            items:1,
            loop:true
			
           
		   });
		   
		   
		   

        jQuery("#testimonial-slider").owlCarousel({
            autoPlay : 3000,
            autoPlay : true,
            responsive : true,
            stopOnHover : true,
            navigation:false,
            pagination : false,
            paginationSpeed : 1000,
            goToFirstSpeed : 2000,
            singleItem : true,
            autoHeight : true,
            transitionStyle:"fade"
        });

        jQuery("#custom-shower-slider").owlCarousel({
            //autoPlay : 3000,
            autoPlay : true,
            responsive : true,
            stopOnHover : true,
            navigation:false,
            pagination : false,
            paginationSpeed : 500,
            //goToFirstSpeed : 2000,
            singleItem : true,
            autoHeight : true,
            transitionStyle:"fade",
            loop:true
        });

        jQuery("#tst-list").owlCarousel({
            autoPlay : 3000,
            autoPlay : true,
            responsive : true,
            stopOnHover : true,
            navigation:false,
            pagination : false,
            paginationSpeed : 1000,
            goToFirstSpeed : 2000,
            singleItem : true,
            autoHeight : true,
            transitionStyle:"fade"
        });

        jQuery(".b4as").owlCarousel({
            autoPlay : false,
            stopOnHover : false,
            navigation: true,
            pagination : false,
            paginationSpeed : 1000,
            goToFirstSpeed : 500,
            autoHeight : true,
            transitionStyle:"fade",
            items:3,
            responsiveClass:true,
            responsive:{
                  0:{
                      items:1
                     
                  },
                  990:{
                      items:2
                     
                  },
                  1024:{
                      items:3
                  }
              }
        });

        jQuery("#designtips").owlCarousel({
          autoPlay : false,
          responsive : true,
          stopOnHover : false,
          navigation: false, 
              pagination : true,
    paginationNumbers: true,
          slideSpeed : 200,
          paginationSpeed : 2000,
          singleItem : true,
          items:1,
          loop:false,
		  touchDrag: true
        });

         /* ========================================================================
        *  Sliders js End
        * ========================================================================
        */

        /*home slider navigation*/
    
        jQuery('body').find('#home-slider .item').each(function(){
          //alert('123');
          var datahash = jQuery(this).attr('data-hash');
          //alert(datahash);
          jQuery(this).parents().find('.owl-controls  .owl-page:nth-child('+datahash+') span').text(datahash);

        });

        /* ========================================================================
        *  FAQ js
        * ========================================================================
        */

        if( !! $("#faq-list").length)
          {
            $('#faq-list li').each(function(index){
              //var $this = $(this)
              var curVal =  $(this).find('div.faq-a').height();
              var isOpen = false;

              $(this).find('div.faq-q').click(function(){
                if (!isOpen) {
                  $(this).next('div.faq-a').animate({'height': curVal + 30 });
                  $(this).next('div.faq-a').find('span').text('Collapse [-]');
                  isOpen = true;
                } else {
                  $(this).next('div.faq-a').animate({'height': 92 });
                  $(this).next('div.faq-a').find('span').text('Expand [+]');
                  isOpen = false;
                }
              });

              $(this).find('div.faq-a').click(function(){
                if (!isOpen) {
                  $(this).animate({'height': curVal + 30 });
                  $(this).find('span').text('Collapse [-]');
                  isOpen = true;
                } else {
                  $(this).animate({'height': 92 });
                  $(this).find('span').text('Expand [+]');
                  isOpen = false;
                }
              });

              $(this).find('div.faq-a').animate({'height': 92});
             });
          }


        /* ========================================================================
        *  FAQ js End
        * ========================================================================
        */

        /* ============ *  Custom js *============ */
        jQuery(".owl-item").mouseenter(function(){ 
            jQuery(this).children(".item").children("a").children(".before").css("display","none");
            jQuery(this).children(".item").children("a").children(".after").css("display","block");
        });
        jQuery(".owl-item").mouseleave(function(){ 
            jQuery(this).children(".item").children("a").children(".after").css("display","none");
            jQuery(this).children(".item").children("a").children(".before").css("display","block");
        });
        /* ============ *  Custom js * ============ */

        jQuery(".prev").click(function(){
            jQuery("#dtpager").children(".activeSlide").removeClass("activeSlide").prev("a").addClass("activeSlide");
            var id=jQuery('#dtpager .activeSlide').attr('id');

            jQuery('.common_class').css('display','none');
            jQuery('.'+id).css('display','block');
        });

        jQuery(".next").click(function(){
            jQuery("#dtpager").children(".activeSlide").removeClass("activeSlide").next("a").addClass("activeSlide");
            var id=jQuery('#dtpager .activeSlide').attr('id');

            jQuery('.common_class').css('display','none');
            jQuery('.'+id).css('display','block');
        }); 

         /* add search icon to small header*/
        jQuery('.inner-header-search-icon  #main-menu .search-tild-sect a').append('<i class="fa fa-search"></i>');
        jQuery('.search-tild-sect a').click(function(event){
           event.preventDefault();
            jQuery('#search-form').bPopup({
                closeClass:'b-close'
            });
        }); 
          /* popup form for contact page*/
        jQuery('#btn_send_msg').click(function(event){
            event.preventDefault();
            jQuery('#send-msg').bPopup({
                closeClass:'b-close'
            });
        });
        /*facility and contact page slidetoggle*/
        jQuery('#locddc').click(function(){
           jQuery('#locdd').slideToggle();
        }); 
          
         /* get strated page nice Scroll*/ 
        jQuery(".scrollbar").niceScroll({
            cursorcolor: "#157c81",
            cursoropacitymin: 0.3,
            background: "#bbb",
            cursorborder: "0",
            autohidemode: false,
            cursorminheight: 30
        }); 

        
        /* ============ *  Custom js preety effect * ============ */
         if(jQuery('body').hasClass('.page-template-hardware-finishes')){
            xssOffset = 100;
            yssOffset = 20;
        }
        xssOffset = 350;
        yssOffset = 10;
         /* ============ *  Custom js preety effect * ============ */
       
        // these 2 variable determine popup's distance from the cursor
        // you might want to adjust to get the right result
       // var win_width=jQuery(window).width();
        //alert(win_width);
      if(jQuery(window).width()>768){
        jQuery(".atribut-preety-effect ul li a, .install_easy_wrapper .fl a").hover(function(e){
            //alert('hii');
            this.t = this.title;
            jQuery(this).removeAttr('title');
            var c = (this.t != "") ? "<br/>" + this.t : "";
            jQuery("body").append("<p id='screenshot'><img src='"+ this.rel +"' alt='url preview' /></p>");          //"+ c +"
            jQuery("#screenshot")
                .css("top",(e.pageY - xssOffset) + "px")
                .css("left",(e.pageX + yssOffset) + "px")
                .fadeIn("fast");                        
        },
        function(){
            this.title = this.t;    
            jQuery("#screenshot").remove();
        });

        jQuery(".attribute-preety ul li a").mousemove(function(e){
            jQuery("#screenshot")
            .css("top",(e.pageY - xssOffset) + "px")
            .css("left",(e.pageX + yssOffset) + "px");
        }); 
      }
        /* ============ *  Custom js preety effect end * ============ */



        /* ============ *  Glass type related to Hardwrfinish  * ============ */
        $("#download_pdf").click(function(ev) {
           ev.preventDefault();  
           alert('hi');
           var pdf = 'pdf_send';
           
           var data = {
               'action': 'internal_pdf',
               'pdf': pdf,
           };
           $.post(ajax_object.ajax_url, data, function(responsee) {
                var objj = $.parseJSON(responsee);
                //console.log(objj    );
                 $.each(objj, function(sub_key, sub_value) {
                    $('.attribute-glass_hardwrfinish').find('.bundle-tild-sect li a').each(function() {
                        var textvalue = $.trim( $(this).text() );
                        if(textvalue == sub_value){
                            $(this).parent().parent().addClass('active-tild-sect').fadeIn();
                        }
                    });
                });
                $('#'+ currentdiv).fadeOut();
                $('#'+ shownextdiv).fadeIn('slow'); 
          });
        });
        
	}(jQuery));

});// - document ready

jQuery(window).load(function() {
    (function ($){

      
        /* fancybox for our facility page*/
        jQuery(".fancyimg").fancybox({
          showNavArrows: true,
            helpers: {
              overlay : {
                speedOut : 0
              }
            }
        });

        /*fancy box for gallery page*/

        jQuery(".fancy-img").fancybox({
          showNavArrows: true,
          helpers: {
            overlay : {
              speedOut : 0
            }
          }
        });

        /*fancy box for glasss option page*/
        
        jQuery(".glass-fancy-box").fancybox({
          showNavArrows: true,
          helpers: {
            overlay : {
              speedOut : 0
            }
          }
        });

    		/**
    		 * Align product image vertically middle on product category page
    		 */
    		$('body.tax-product_cat .category-products .product-image').each(function(){
    			var this_height = $(this).height();

    			var shop_thumb = $(this).find('img');
    			var image_height = shop_thumb.height();

    			if( shop_thumb.length && (this_height > image_height)){
    				var final_height = (this_height - image_height)/2;
    				$(this).find('img').css('margin-top', final_height);
    			}
    		});

        jQuery('#nmpd1 tr td button').on("click", function(){
          var msrmntval = jQuery('#nmpd1 tr td .nmpd-display').val();
          console.log(msrmntval);
          if(msrmntval){
            setTimeout(function(){ jQuery( 'body').find('.numpad-sect_1').attr('value', msrmntval ); }, 200);  
          }else{
            setTimeout(function(){ jQuery( 'body').find('.numpad-sect_1').attr('value', '' ); }, 200);
          }
        });

        jQuery('#nmpd2 tr td button').on("click", function(){
          var msrmntval = jQuery('#nmpd2 tr td .nmpd-display').val();
          if(msrmntval){
            setTimeout(function(){ jQuery( 'body').find('.numpad-sect_2').attr('value', msrmntval ); }, 200); 
          }else{
            setTimeout(function(){ jQuery( 'body').find('.numpad-sect_2').attr('value', '' ); }, 200);
          }
        });

        jQuery('#nmpd3 tr td button').on("click", function(){
          var msrmntval = jQuery('#nmpd3 tr td .nmpd-display').val();
          if(msrmntval){
            setTimeout(function(){ jQuery( 'body').find('.numpad-sect_3').attr('value', msrmntval ); }, 200);  
          }else{
            setTimeout(function(){ jQuery( 'body').find('.numpad-sect_3').attr('value', '' ); }, 200);
          }
          
        });




    }(jQuery));
});


jQuery(document).ready(function() {
    var mndFileds=new Array('Last Name');
    var fldLangVal=new Array('Last Name');
    var name='';
    var email='';

    function checkMandatory() {
        for(i=0;i<mndFileds.length;i++) {
          var fieldObj=document.forms['WebToLeads1429722000002041873'][mndFileds[i]];
          if(fieldObj) {
          if (((fieldObj.value).replace(/^\s+|\s+$/g, '')).length==0) {
           if(fieldObj.type =='file')
            { 
             alert('Please select a file to upload'); 
             fieldObj.focus(); 
             return false;
            } 
          alert(fldLangVal[i] +' cannot be empty'); 
                    fieldObj.focus();
                    return false;
          }  else if(fieldObj.nodeName=='SELECT') {
                 if(fieldObj.options[fieldObj.selectedIndex].value=='-None-') {
            alert(fldLangVal[i] +' cannot be none'); 
            fieldObj.focus();
            return false;
             }
          } else if(fieldObj.type =='checkbox'){
             if(fieldObj.checked == false){
            alert('Please accept  '+fldLangVal[i]);
            fieldObj.focus();
            return false;
             } 
           } 
           try {
               if(fieldObj.name == 'Last Name') {
            name = fieldObj.value;
                }
          } catch (e) {}
            }
        }
    }

});