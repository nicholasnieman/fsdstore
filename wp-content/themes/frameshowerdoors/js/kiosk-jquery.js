jQuery(document).ready(function(){

	(function($){

		$('.poplinks a').click(function(event){
		   event.preventDefault();
		   var popup = $(this).attr('rel');
		    $(popup).bPopup({
		        closeClass:'b-close'
		    });
		    $('body').find(".button-flat.active").trigger('click');
		}); 

		$('.bar').hide();
		$('.bar2').hide(); 

		$('#loadform').submit(function() {
			$('.bar').show(); 
			return true;
		});

		$('.topbutton').click(function() {
			$('.bar2').show(); 
			return true;
		});


		/*Kiosk Single*/

		/*Kiosk Product*/
		

		jQuery('.custom_left_tab_menu a').hover(function(event){
			event.preventDefault();
	        jQuery('#selected-layout').empty();
	        var text_html = jQuery(this).text();
	        jQuery('#selected-layout').html('<strong>Door Style: </strong> '+text_html);
	 	});
		
		jQuery('.custom_left_tab_menu a').html(function(index, content) {
			var wordsToBold=["Single Shower","Hydroslide","Sebastian","Cottage","Inline","90 Degree","Neo Angle","Steam","Fixed"];
		    return content.replace(new RegExp('(\\b)(' + wordsToBold.join('|') + ')(\\b)','ig'), '$1<b>$2</b>$3');
		});

		jQuery('.door-title').html(function(index, content) {
			var wordsToBold=["Single","Hydroslide","Sebastian","Cottage","Inline","90 Degree","Neo Angle","Steam","Splash Guard"];
		    return content.replace(new RegExp('(\\b)(' + wordsToBold.join('|') + ')(\\b)','ig'), '$1<b>$2</b>$3');
		});	 

		jQuery('.monkey').css('display','block');  
		jQuery('.buttonSH').css('display','none');  	  
		jQuery('.doorreturn').click(function(e){
		    e.preventDefault();
			jQuery('.buttonSH').css('display','block');
			jQuery('.monkey').css('display','none');     
		});

		jQuery('#steam_cont-btn').click(function(e){
		    e.preventDefault();
			jQuery('.buttonSH').css('display','block');
			jQuery('.monkey').css('display','none');     
		});

		function getParameterByName(name, url) {
		    if (!url) url = window.location.href;
		    name = name.replace(/[\[\]]/g, "\\$&");
		    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
		        results = regex.exec(url);
		    if (!results) return null;
		    if (!results[2]) return '';
		    return decodeURIComponent(results[2].replace(/\+/g, " "));
		}

		var FDLocation = getParameterByName('FDLocation');
		var discount_kiosk = getParameterByName('56_temp');
		console.log(FDLocation);
		var timeout = 300000;
		$('#kiosk_dummy').bind("idle.idleTimer", function(){
           window.location.href = "https://www.framelessshowerdoors.com/fdkiosk/?FDLocation="+FDLocation+"&56_temp="+discount_kiosk
      	});
		$('#kiosk_dummy').bind("active.idleTimer", function(){
		   	
		});
		$('#kiosk_dummy').idleTimer(timeout);


		var mndFileds 	= 	new Array('Last Name');
		var fldLangVal 	= 	new Array('Last Name');
		var name 	=	'';
		var email 	=	'';

	  /* Do not remove this code. */
		function reloadImg() {
		if(document.getElementById('imgid').src.indexOf('&d') !== -1 ) {
			  	document.getElementById('imgid').src=document.getElementById('imgid').src.substring(0,document.getElementById('imgid').src.indexOf('&d'))+'&d'+new Date().getTime();
			}else {
			  	document.getElementById('imgid').src = document.getElementById('imgid').src+'&d'+new Date().getTime();
			}
		}

		function checkMandatory() {
			for(i=0;i<mndFileds.length;i++) {
				var fieldObj=document.forms['WebToLeads1429722000002827799'][mndFileds[i]];
				if(fieldObj) {
					if (((fieldObj.value).replace(/^\s+|\s+$/g, '')).length==0) {
						if(fieldObj.type =='file'){ 
							alert('Please select a file to upload'); 
							fieldObj.focus(); 
							return false;
						} 
						alert(fldLangVal[i] +' cannot be empty'); 
						fieldObj.focus();
						return false;
					}else if(fieldObj.nodeName=='SELECT') {
						if(fieldObj.options[fieldObj.selectedIndex].value=='-None-') {
							alert(fldLangVal[i] +' cannot be none'); 
							fieldObj.focus();
							return false;
					   }
					}else if(fieldObj.type =='checkbox'){
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
					}catch (e) {}
				}
			}
		}
		
    })(jQuery);
});