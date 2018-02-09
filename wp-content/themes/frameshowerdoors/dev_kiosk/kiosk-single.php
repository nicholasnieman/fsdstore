<?php

/*Global Vaibles*/
	global $frame_breadcumb, $glass_sqft, $glass_sqft_img, $gls_formula, $glass_thickness, $glass_type, $hardware_finish, $hinge_style, $check_pull, $knob_style , $handle_size, $handle_style, $combo_handle_size, $combo_handle_towelbar_size, $combo_habdle_towelbar_style, $check_towelbar , $towelbar_size, $towelbar_style, $towelbar_side, $standard_door_opt, $standard_door_width, $standard_door_height, $install_kit, $door_angle , $header_length , $glassgroup, $resistant_coating, $discount_option, $discount_txt, $discount_description, $hide_discount_opt, $FDLocation_nm, $framework, $current_user_name;

/*Null Varibles*/
	$glass_type_html = $glass_thickness_html = $hardware_finish_html = $hinge_style_html = $knob_style_html = $handle_size_html = $handle_style_html = $towelbar_size_html = $combo_habdle_towelbar_style_html = $install_kit_html = $towelbar_size_html = $towelbar_side_html = $combo_towelbar_size_html = $combo_towelbar_style_html = NULL;

/*Getting Username*/
	if($framework == 'dev_kiosk' || $framework == 'dev_kiosk/'){
		get_header('kiosk');
		$current_user = wp_get_current_user();
		$username = $$current_user_name;
		$mode_type = 'Kiosk';
		$form_redirect_url =  site_url().'/dev-kiosk-thankyou/';
	}
/*Get FDLocation name For Kiosk*/

	if($FDLocation_nm){
		$cur_url =  home_url().'/'.$FDLocation_nm;
	}else{
		$Path=$_SERVER['REQUEST_URI'];
		$cur_url =  home_url().$Path;
	}

	$FDLocation 	= 	$_REQUEST['FDLocation'];
	$discount_kiosk	=	$_REQUEST['56_temp'];
	
/*Html for Kiosk Single*/
	echo '<div class="kiosk-mode">';
	$title= get_the_title();
?>
	<script type="text/javascript">
		jQuery(document).ready(function(){
			var data = '<?php echo $title; ?>';
			jQuery('#selected-layout').html('<strong>Door Style: </strong> '+data);

			(function($){

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
	              // window.location.href = "https://www.framelessshowerdoors.com/fdkiosk/?FDLocation="+FDLocation
	               window.location.href = "https://www.framelessshowerdoors.com/fdkiosk/?FDLocation="+FDLocation+"&56_temp="+discount_kiosk
	          	});

				$('#kiosk_dummy').bind("active.idleTimer", function(){
				   	
				});


				$('#kiosk_dummy').idleTimer(timeout);
				

		    })(jQuery);

		});	
	</script>
	<script>
		$(function(){
			$('#form_secarea #first_name, #form_secarea #last_name, #form_secarea #email, #form_secarea #phone, #form_secarea #message').keyboard({
					layout: 'custom',
					tabNavigation : true,
			noFocus : true,
			usePreview : false,
			autoAccept : true,
				customLayout : {
				 'normal': [
      '1 2 3 4 5 6 7 8 9 0 {bksp}',
      '{tab} q w e r t y u i o p ',
      'a s d f g h j k l ',
      '{shift} z x c v b n m @ - .',
	  '.com @hotmail.com @gmail.com',
      ' {space} {accept} '
    ],
    'shift': [
    
      'Q W E R T Y U I O P ',
      'A S D F G H J K L ',
      '{shift} Z X C V B N M ',
      '{space} '

			]
			},

			css: {
				// add dark themed class to keyboard popup to use bright svg extender icon
				popup : 'ui-keyboard-dark-theme',
				
			},
			// this is added by the extension;
			// included here in case you want to modify the title
			display : {
				
				'clear'  : 'Clear:Clear',
				'accept' : 'Done:Accept (Shift-Enter)',
				'tab'    : 'Tab:Tab'
			}

		});
		$('#fsd-doorbuilder-option-21-qty-0,#fsd-doorbuilder-option-21-qty-1, #fsd-doorbuilder-option-21-qty-2,#fsd-doorbuilder-option-21-qty-3,#fsd-doorbuilder-option-21-qty-4,#fsd-doorbuilder-option-21-qty-5,#fsd-doorbuilder-option-21-qty-6,#fsd-doorbuilder-option-21-qty-7').keyboard({
			layout: 'custom',
			tabNavigation : true,
			noFocus : true,
			usePreview : false,
			autoAccept : true,
			
			customLayout : {
				 'normal' : [
    '7 8 9',
    '4 5 6',
    '1 2 3',
	'0 {clear}'
	]
				
			},
			
				

			css: {
				// add dark themed class to keyboard popup to use bright svg extender icon
				popup : 'ui-keyboard-dark-theme',
				
			},
			// this is added by the extension;
			// included here in case you want to modify the title
			display : {
				
				'clear'  : 'Clear:Clear',
				'accept' : 'Done:Accept (Shift-Enter)',
				'tab'    : '\u21e5 Next Measurement:Tab'
			}
		})
    	
	});
	</script>
	<!-- Show Pop Html On Click Hardware Finish -->
  
	<div id="get_modal" class="get_modal" style="display:none;">
	  	<center>
	      	<div class=" col-md-12">
	          <h1>STAY<strong>CLEAN</strong>&#8482;</h1>
	          	<h2> Protect your shower glass with our exclusive <span style="font-weight: 400;">STAY</span><span style="font-weight: bold;">CLEAN</span><span>&trade;</span> water and stain resistant Glass. </h2>
	          	<div class="stay_clean_glass" class="col-xs-12 stc-option" style="text-align:center">
	              	<div class="row option-text" style="text-align:center !important">
	                  	<span>
	                      	<span style="color:#e57207; font-weight:800;">Say No to soap scum buildup or hard mineral <br>deposits on your glass. </span>
	                      	<br>Add
	                      	water and stain resistant glass NOW for only $<span class="coating-price-defined"><?php echo $resistant_coating; ?></span>
	                      	<center>
	                         	<span><label>Yes</label></span>
	                         	<span><label>No</label></span>
	                      	</center>
	                  	</span>
	              	</div>
	          	</div>
	      	</div>
	  	</center>
	  	<div id="glass_thknss_value" style="display: none;">2</div>
	  	<div id="hardwrfinish_val" style="display: none;">2</div>
	</div>
	<!-- Show Pop Html On Click Hardware Finish End -->

	<!-- #Container Area -->
	<div class="selectionbk2">	<div class="single-tild-sect" >
	<div class="re-order-loader"></div>
		<div id="stepNavigation">
			<div id="stepslr">
			   <!-- <div id="backNav" class="stepNav backNav btn btn-primary dark-btn">Back</div>
			   <div id="nextNav" class="stepNav nextNav btn btn-primary dark-btn">Next</div> -->
			   <div id="glass_sqft_formula" style="display: none;"><?php echo $gls_formula; ?></div>
			   
			</div>
		<div class="container"><div class="col-md-12">	<div class="invalid range" id="thePrice">
			   <span class="placeholder">BUILD TO SEE YOUR QUOTE</span>
			</div></div></div>
		</div>

		<div class="mysingle" style="width:95%; margin:0px auto;">
			<div class="row">
				<div class="mains col-md-12 page-content animated_glass doorbuilder" style="padding-top:40px;">
					<div class="twoColbg" id="<?php echo get_the_id(); ?>">
						<!-- Left Section -->
						<div class="col-sm-8">
							<div id="selected_opt" class="clearfix">
								<h6 style="font-size:16px;"><span style="font-weight:bold; font-size:16px;">DOOR BUILDER STEPS</span> - To change your selection touch the links below.</h6>
								
								
								<div style="width: 1032px;">
									<div id="backNav" class="stepNav backNav btn btn-primary dark-btn">Back</div>
									<ol class="cd-breadcrumb triangle"></ol>
								</div>
							</div>
		                 	<!-- Glass Sqft / Standard Door Section -->
		                 <?php if($glass_sqft){ /*Measurement Option*/ ?>
		                  		<div id="A" class="attribute-glass_sqft build-showerdoor activebt" > 
		<div style="height:1076px !important; overflow:hidden !important;" >                 
      <div class="circlef"  style="height:0px; bottom:0px;"><img src="/wp-content/uploads/2016/08/F.png" /></div>                
                                    <h1 style="text-transform:uppercase; font-size:30px;">What are your measurements? </h1>
				                    <div style="font-size:14px; font-style:italic; padding-bottom:35px; color:#333333 !important">Please enter your approximate measurements rounded off to the nearest inch.<br>
	(measuring from arrow tip to arrow tip)</div>
				          
			                    	<?php 
			                       	if(have_posts()) : 
			                       		while(have_posts()) : the_post();
										$html .= ''; 
											$html = '<div class="entry">';
											$html .= '<div class="col-sm-6 product-imgsqft">';
											$html .= '<img src="'.$glass_sqft_img.'" alt="second image"/>';
											$html .= '</div>';
											$html .= '<div class="col-sm-6 product-descipt" id="kyboard">';
											$html .= '<h4><b>Input your approximate sizes</b></h4>';
											$html .= '<div class="row" ><form>';
											 for ($i=0; $i < $glass_sqft; $i++) { 
											 	$numpad_attr = ($i)+1;
											    $html .= '<p><label  style="background: #e8760a; padding:10px; margin-top:-2px; text-align:center;  width:50px; color:#ffffff !important">'.range('A','Z')[$i].'</label><input type="text" required="" data-rel="'.range('A','Z')[$i].'" name="option-qty" id="fsd-doorbuilder-option-21-qty-'.$i.'" onkeypress="return event.charCode >= 46 && event.charCode <= 57 && event.charCode != 47 || event.charCode <= 9" class="measurement numpad-sect_'.$numpad_attr.'" style="width:160px; margin-left:0px; border-radius:0px; height:41px;"><span class="inches">inches</span><span class="error"></span></p> ' ;
											 }
											$html .= '<a id="measuremnet-val" class="btn dark-btn btn-orange mnext" style="width:210px;" data-rel="B" dat-cur-rel="A" data-me_productid="'.get_the_ID().'" href="javascript:void(0)" data-show_keyname="Glass Sqft"><span>Next</span></a>';
											$html .= '</form> </div>';
											$html .= '</div>';
											$html .= '<div style="clear: both; display: block;  width: 90%; font-size: 12px;  color: #035D62; padding-top:30px; text-align: justify;">*Prices quoted do not include extra charges for double cuts, changes in size or unforeseen changes that were not included in the original diagram submitted. Your final size diagram will determine if any additional charges apply. The Original Frameless Shower Doors at its discretion, at any time, can change the type and/or placement of any hardware.</div>';
											$html .= '</div>';
											echo $html;

			                       		endwhile; 
			                       	endif;
		                        echo '</div>';
		                    }elseif($standard_door_opt == 'on'){ /*Standard Dorr Option Enable*/
		                        if($standard_door_width == 'on'){ ?>
		                          	<div id="A" class="field-_attribute_tag build-showerdoor attribute-std_dr_width atribut-pull_h">
		                           		<div class="col-xs-12">
		                              		<ul class="bundle-tild-sect">
												<li class="glass-type">
												<label>
												  <a data-re_keyname="standard_door_width" data-show_keyname="Door Width" data-show_keypara="54" rel="<?php echo get_template_directory_uri(); ?>/images/no_selection.gif" title="54" data-rel="B" dat-cur-rel="A" rel='54'>54" to 59 1/2"<img src="<?php echo get_template_directory_uri(); ?>/images/no_selection.gif" />
												  </a>
												  <a class="btn-v-tild" data-re_keyname="standard_door_width" data-show_keypara="54" data-show_keyname="Door Width" rel="<?php echo get_template_directory_uri(); ?>/images/no_selection.gif" title='54' data-rel="B" dat-cur-rel="A" rel='54'><span class="post-title-sect coName">54" to 59 1/2"</span></a>
												</label>
												</li>
		                              		</ul>
		                            	</div>
		                          	</div> <?php
		                        }
		                    }  ?>  	</div>
		               
		                <!-- Glass Sqft / Standard Door Section Ends -->

		                <!-- Glass Thickness / Door Height Section -->
			            <?php if($glass_thickness){ ?>
			                <div id="B" class="field-_attribute_tag attribute-glass_thickness build-showerdoor atribut-pull_h dependence" >
                            
   <div style="height:992px !important; overflow-y:hidden !important;">
                 <div class="circlef"  style="height:0px; bottom:0px;"><img src="/wp-content/uploads/2016/08/F.png" /></div> 
			                    <div class="col-xs-12">
			                        <h1>Please Choose Your Glass Thickness </h1><div style="font-size:14px; font-style:italic; padding-bottom:15px; color:#333333 !important">Depending on your door type, ½" glass may not be available.</div>
			                      
			                        <ul class="bundle-tild-sect">
			                        	<?php
			                          	foreach ($glass_thickness as $key => $value) {
			                             	$src = str_replace("/","", strtolower( trim( preg_replace('/\s+/', '', $value ), '.') ) );

			                            	$glass_thickness_html .= '<li class="glass-thickness">
			                                <label>
			                                   <a data-re_keyname="glass_thickness" data-show_keyname="Glass Thickness" title="'.$value.'" data-me_nextrel="C" data-re_dependence="glass_type"  data-rel="C" dat-cur-rel="B" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" style="width: 300px; padding:20px;" />
			                                   </a>
			                                  <a class="btn-v-tild" data-re_keyname="glass_thickness" data-show_keyname="Glass Thickness" title="'.$value.'" data-me_nextrel="C" data-re_dependence="glass_type"  data-rel="C" dat-cur-rel="B" rel="'.$value.'" style="width: 300px; padding:20px;">
			                                   <span class="post-title-sect coName">'.$value.'</span></a>
			                                </label></li>';
			                          	}
										             
										echo $glass_thickness_html; ?>  
			                    	</ul>
			                 	</div>
			              	</div></div><?php
			            }
		                elseif($standard_door_height){
		                  	echo '<div id="B" class="field-_attribute_tag attribute-std_dr_height build-showerdoor atribut-pull_h dependence">
		                     <div class="col-xs-12">';
		                  	$standard_door_height_html = '';
		                  	foreach ($standard_door_height as $key => $value) {

		                    	$valuee = str_replace('-', '"', $value);
		                    	$src = str_replace("/","", strtolower( trim( preg_replace('/\s+/', '', $valuee ), '.') ) );

		                    	$standard_door_height_html .= '<li class="glass-type">
		                        <label>
		                           <a data-re_keyname="standard_door_height" data-show_keyname="Door Height" title="'.$valuee.'" data-rel="D" dat-cur-rel="B" rel="'.$valuee.'">'.$valuee.'<img src="'.get_template_directory_uri().'/images/no_selection.gif" />
		                           </a>
		                          <a class="btn-v-tild" data-re_keyname="standard_door_height" data-show_keyname="Door Height" title="'.$valuee.'" data-rel="D" dat-cur-rel="B" rel="'.$valuee.'">
		                           <span class="post-title-sect coName">'.$valuee.'</span></a>
		                        </label></li>';
		                  	}
		                  	echo $standard_door_height_html.'</div></div>';
		                } ?>
		                <!-- Glass Thickness / Door Height Section Ends -->

		                <!-- Glass type Section -->
		                <div id="C" class="field-_attribute_tag attribute-glass_type build-showerdoor atribut-gls_h">
                        
                        <div style="height:1200px !important; ">
                        
                        
                 <div class="circlef"  style="height:0px; bottom:0px;"><img src="/wp-content/uploads/2016/08/F.png" /></div> 
                        
		                    <div class="col-xs-12">
	     <h1 >Select Your Glass Type </h1>
				<div style="font-size:14px; font-style:italic; padding-bottom:15px; color:#333333 !important">Note: Clear Glass is the most commonly used and least expensive. Clear Low-Iron Glass, Colored Glass, textured or Obscured Glass are more expensive. <strong style="color: #000000 !important">Rain, Bubbles, Aquaview and Crepe only come in 3/8" thickness.</strong></div>				
		                        <ul class="bundle-tild-sect" style="padding:0px !important">
		                       		<?php
		                       	
		                       		   	$gls_type_order = array();

		                       		   	if (in_array("Clear", $glass_type)) {
		                       			    $gls_type_order[] = "Clear";
		                       			}
		                       			if (in_array("Clear Low Iron", $glass_type)) {
		                       			    $gls_type_order[] = "Clear Low Iron";
		                       			}
		                       			
		                       			if (in_array("Mist", $glass_type)) {
		                       			    $gls_type_order[] = "Mist";
		                       			}
		                       			if (in_array("Low Iron Mist", $glass_type)) {
		                       			    $gls_type_order[] = "Low Iron Mist";
		                       			}
		                       			if (in_array("Rain", $glass_type)) {
		                       			    $gls_type_order[] = "Rain";
		                       			}
		                       			foreach ($glass_type as $key => $valuee) {
		                       				if($valuee == 'Clear' || $valuee == 'Clear Low Iron' || $valuee == 'Rain' || $valuee == 'Mist' || $valuee == 'Low Iron Mist'){
		                       				}
		                       				else{
		                       					$gls_type_order[] = $valuee;
		                       				}
		                       			}
		                       			$gls_type_order = array_filter($gls_type_order);
		                       		   	


		                          	foreach ($gls_type_order as $key => $value) {
		                          		$src = strtolower( trim( preg_replace('/\s+/', '', $value ), '.') ); 

		                            	$glass_type_html .= '<li class="glass-type" style="display:none;">
		                                <label >
		                                   <a data-re_keyname="glass_type" data-show_keyname="Glass Type" rel="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" title="'.$value.'" data-rel="D" dat-cur-rel="C" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/'.$src.'.png"  />
		                                   </a>
		                                   <a class="btn-v-tild" data-re_keyname="glass_type" data-show_keyname="Glass Type" rel="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" title="'.$value.'" data-rel="D" dat-cur-rel="C" rel="'.$value.'" style="width:100% !important; margin-left: -9px; margin-top:-4px;"><span class="post-title-sect coName">'.$value.'</span></a>
		                                </label></li>';

		                          	}
			                        echo $glass_type_html; 
			                        ?>
		                       	</ul> 
		                    </div>
		                </div> </div>
		                 <!-- Glass type Section Ends -->

		                 <!-- Hardware Finish Section -->
		                 <?php
		                    if($standard_door_opt == 'on'){
		                      $re_attr = 'standard-door';
		                      $ajax_class = 'attribute-std_door';

		                    }
		                    else{
		                      $re_attr = 'glass';
		                      $ajax_class = 'attribute-glass_hardwrfinish';
		                    }
		                 ?>
		                <div id="D" class="field-_attribute_tag <?php echo $ajax_class; ?> build-showerdoor atribut-gls_h dependence" data-re_attr="<?php echo $re_attr; ?>">
                        
                        <div style="height:1200px !important; ">
                        
                        
                 <div class="circlef"  style="height:0px; bottom:0px;"><img src="/wp-content/uploads/2016/08/F.png" /></div> 
                        
                        
                        
		                    <div class="col-xs-12">
		                       <h1>Select Your Hardware Finish</h1><div style="font-size:14px; font-style:italic; padding-bottom:15px; color:#333333 !important">Note: Some finishes may delay turnaround time.</div>

		                        
		                        <?php
	                        	   	$standard_temp = $specialty_hf_order = $standard_hf_order = array();
		                        	foreach ($hardware_finish as $key => $valuee) {
	                        			if($valuee == 'Chrome' || $valuee == 'Brushed Nickel' || $valuee == 'Oil Rubbed Bronze' || $valuee == 'Brass'){
	                        				$standard_temp[] = $valuee;
	                        			}
	                        			else{
	                        				$specialty_hf_order[] = $valuee;
	                        			}
	                        		}

	                    		   	if (in_array("Chrome", $standard_temp)) {
	                    			    $standard_hf_order[] = "Chrome";
	                    			}
	                    			if (in_array("Brushed Nickel", $standard_temp)) {
	                    			    $standard_hf_order[] = "Brushed Nickel";
	                    			}
	                    			
	                    			if (in_array("Oil Rubbed Bronze", $standard_temp)) {
	                    			    $standard_hf_order[] = "Oil Rubbed Bronze";
	                    			}
	                    			if (in_array("Brass", $standard_temp)) {
	                    			    $standard_hf_order[] = "Brass";
	                    			}

	                        		$standard_hf_order = array_filter($standard_hf_order);
	                        		$specialty_hf_order = array_filter($specialty_hf_order);

	                        		if($standard_hf_order){
		                        	echo '<ul class="bundle-tild-sect"><h2 style="color:#333333 !important;">Standard Finishes</h2> <hr />';
		                            foreach ($standard_hf_order as $key => $value) {
		                                $src = strtolower( trim( preg_replace('/\s+/', '', $value ), '.') ); 

		                             	if($hinge_style){
											echo '<li class="glass-type">
											<label>
											<a data-re_keyname="hardware_finish" data-show_keyname="Hardware Finish" rel="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" title="'.$value.'" data-rel="E" dat-cur-rel="D" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" />
											</a>
											<a class="btn-v-tild" data-re_keyname="hardware_finish" data-show_keyname="Hardware Finish" rel="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" title="'.$value.'" data-rel="E" dat-cur-rel="D" rel="'.$value.'"><span class="post-title-sect coName">'.$value.'</span></a>
											</label></li>';
		                            	}
		                                else{
		                                  	if($check_towelbar == 'on'){
			                                   echo  '<li class="glass-type">
			                                      <label>
			                                         <a data-re_keyname="hardware_finish" data-show_keyname="Hardware Finish" rel="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" title="'.$value.'" data-rel="N" dat-cur-rel="D" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" />
			                                         </a>
			                                          <a class="btn-v-tild" data-re_keyname="hardware_finish" data-show_keyname="Hardware Finish" rel="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" title="'.$value.'" data-rel="N" dat-cur-rel="D" rel="'.$value.'"><span class="post-title-sect coName">'.$value.'</span></a>
			                                      </label></li>';
		                                	}else{
			                                   echo '<li class="glass-type">
			                                      <label>
			                                         <a data-re_keyname="hardware_finish" data-show_keyname="Hardware Finish" rel="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" title="'.$value.'" data-rel="R" dat-cur-rel="D" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" />
			                                         </a>
			                                          <a class="btn-v-tild" data-re_keyname="hardware_finish" data-show_keyname="Hardware Finish" rel="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" title="'.$value.'" data-rel="R" dat-cur-rel="D" rel="'.$value.'"> <span class="post-title-sect coName">'.$value.'</span></a>
			                                      </label></li>';
		                                	}
		                                }
		                        	}
		                        	echo '</ul><div class="clear"></div>';
		                        }	

		                        if($specialty_hf_order){
		                        	echo '<ul class="bundle-tild-sect">';
		                        	echo '<h2 class="hf_specialty" style="color:#333333 !important;">Specialty Finishes</h2> <hr />';
		                            foreach ($specialty_hf_order as $key => $value) {
		                                $src = strtolower( trim( preg_replace('/\s+/', '', $value ), '.') ); 

		                             	if($hinge_style){
											echo '<li class="glass-type">
											<label>
											<a data-re_keyname="hardware_finish" data-show_keyname="Hardware Finish" rel="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" title="'.$value.'" data-rel="E" dat-cur-rel="D" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" />
											</a>
											<a class="btn-v-tild" data-re_keyname="hardware_finish" data-show_keyname="Hardware Finish" rel="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" title="'.$value.'" data-rel="E" dat-cur-rel="D" rel="'.$value.'"><span class="post-title-sect coName">'.$value.'</span></a>
											</label></li>';
		                            	}
		                                else{
		                                  	if($check_towelbar == 'on'){
			                                    echo '<li class="glass-type">
			                                      <label>
			                                         <a data-re_keyname="hardware_finish" data-show_keyname="Hardware Finish" rel="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" title="'.$value.'" data-rel="N" dat-cur-rel="D" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" />
			                                         </a>
			                                          <a class="btn-v-tild" data-re_keyname="hardware_finish" data-show_keyname="Hardware Finish" rel="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" title="'.$value.'" data-rel="N" dat-cur-rel="D" rel="'.$value.'"><span class="post-title-sect coName">'.$value.'</span></a>
			                                      </label></li>';
		                                	}else{
			                                   echo '<li class="glass-type">
			                                      <label>
			                                         <a data-re_keyname="hardware_finish" data-show_keyname="Hardware Finish" rel="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" title="'.$value.'" data-rel="R" dat-cur-rel="D" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" />
			                                         </a>
			                                          <a class="btn-v-tild" data-re_keyname="hardware_finish" data-show_keyname="Hardware Finish" rel="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" title="'.$value.'" data-rel="R" dat-cur-rel="D" rel="'.$value.'"> <span class="post-title-sect coName">'.$value.'</span></a>
			                                      </label></li>';
		                                	}
		                                }
		                        	}
		                        	echo '</ul>';
		                        }
		                        	 ?>
		                      	
		                    </div>
		               </div> </div>
		                 <!-- Hardware Finish Section Ends -->

		                 <!-- Hinge Style Section -->
		                <?php if($hinge_style){ ?>
		                  	<div id="E" class="field-_attribute_tag attribute-glass_hingestyle build-showerdoor atribut-gls_h" data-re_attr="hinge">
                            
                            
                            <div style="height:1045px !important;">
                 <div class="circlef"  style="height:0px; bottom:0px;"><img src="/wp-content/uploads/2016/08/F.png" /></div> 
                            
                            
		                     	<div class="col-xs-12">
			                        <h1>What Style of Hardware Do You Prefer? </h1>
			                        
			                        <ul class="bundle-tild-sect">
		                            <?php
			                            if($hinge_style){
			                                foreach ($hinge_style as $key => $value) {
			                                    $src = strtolower( trim( preg_replace('/\s+/', '', $value ), '.') ); 
			                                    if($check_pull == 'on'){
			                                       $hinge_style_html .= '<li class="glass-type" style="display:none;">
			                                          <label>
			                                             <a data-re_keyname="hinge_style" data-show_keyname="Style" title="'.$value.'" data-rel="F" dat-cur-rel="E" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" style="width: 100%; padding:20px;"  />
			                                             </a>
			                                             <a class="btn-v-tild" data-re_keyname="hinge_style" data-show_keyname="Style" title="'.$value.'" data-rel="F" dat-cur-rel="E" rel="'.$value.'" style="width:90% !important"><span class="post-title-sect coName" >'.$value.'</span></a>
			                                          </label></li>';
			                                    }
			                                    else{
			                                        if($check_towelbar == 'on'){
														$hinge_style_html .= '<li class="glass-type" style="display:none; width:400px !important">
														<label>
														 <a data-re_keyname="hinge_style" data-show_keyname="Style" title="'.$value.'" data-rel="N" dat-cur-rel="E" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/slidingdoorbundle/'.$src.'.png" style="width: 100%; padding:20px;" />
														 </a>
														<a class="btn-v-tild" data-re_keyname="hinge_style" data-show_keyname="Style" title="'.$value.'" data-rel="N" dat-cur-rel="E" rel="'.$value.'" style="width:90% !important"> <span class="post-title-sect coName">'.$value.'</span></a>
														</label></li>';
			                                        }
			                                        else{
														$hinge_style_html .= '<li class="glass-type" style="display:none;">
														<label>
														<a data-re_keyname="hinge_style" data-show_keyname="Style" title="'.$value.'" data-rel="R" dat-cur-rel="E" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" style="width: 100%; padding:20px;" />
														</a>
														<a class="btn-v-tild" data-re_keyname="hinge_style" data-show_keyname="Style" title="'.$value.'" data-rel="R" dat-cur-rel="E" rel="'.$value.'" style="width:90% !important"> <span class="post-title-sect coName">'.$value.'</span></a>
														</label></li>';
			                                        }    
			                                    }
			                                }
			                            echo $hinge_style_html; 
			                           	}
		                           	?>
		                        	</ul>
		                     	</div>
		                     	<div class="col-xs-12" style="margin-top:25px;">
		                        	
	                           		  <table width="100%" border="0" cellspacing="0" style="font-size:12px !important" >
  <tbody>
  <tr>
      <td  style="background:none; padding:10px !important;" colspan="3"><div style="color:#333333; font-weigh:bold;"><strong style="color:#333333 !important; font-size:14px !important; ">ALL WALL MOUNTED HINGES FOR 3/8" THICK GLASS</strong></div></td>
    
    </tr>
    <tr>
      <td style="background:#999999; padding:4px !important; font-weight:bold; color:#ffffff;">Maximum Capacities</td>
     <td style="background:#999999; padding:4px !important; font-weight:bold; color:#ffffff;">3/8" Glass</td>

        <td  style="background:#999999; padding:4px !important;  font-weight:bold; color:#ffffff;"></td>
    </tr>
    <tr>
      <td style="background:#666666; padding:4px !important; font-weight:bold; color:#ffffff;"></td>
     <td style="background:#666666; padding:4px !important; font-weight:bold; color:#ffffff;">WEIGHT</td>
      <td style="background:#666666; padding:4px !important; font-weight:bold; color:#ffffff;">DOOR WIDTH</td>
    </tr>
    <tr>
      <td style="color:#333333; background:#ffffff;padding:4px !important;  font-size:14px;">Using Two Hinges</td>
     <td style="color:#333333;background:#ffffff; padding:4px !important; font-size:14px;">80 lbs</td>
     <td style="color:#333333;background:#ffffff;padding:4px !important;  font-size:14px;">28"</td>
    </tr>
    <tr>
      <td style="color:#333333;padding:4px !important; background:#d2e2e3;  font-size:14px;">Using Three Hinges</td>
     <td style="color:#333333;padding:4px !important; background:#d2e2e3;  font-size:14px;">120 lbs</td>
     <td style="color:#333333; padding:4px !important; background:#d2e2e3; font-size:14px;">32"</td>
    </tr>
  </tbody>
</table>
<p><br></p>

<table width="100%" border="0" cellspacing="0" style="font-size:12px !important" >
  <tbody>
  <tr>
      <td  style="background:none; padding:10px !important;" colspan="5"><div style=" color:#333333; font-weigh:bold;"><strong style="color:#333333 !important; font-size:14px !important;">ALL WALL MOUNTED HINGES FOR 1/2" THICK GLASS AND OVERSIZE 3/8" THICK GLASS</strong></div></td>
    
    </tr>
    
    
    <tr>
      <td style="background:#999999; padding:4px !important; font-weight:bold; color:#ffffff;">Maximum Capacities</td>
     <td colspan="2" style="background:#999999; padding:4px !important; font-weight:bold; color:#ffffff;">1/2" Glass</td>

        <td  colspan="2" style="background:#999999; padding:4px !important;  font-weight:bold; color:#ffffff;">3/8" Glass - Oversize</td>
    </tr>
    
  
    <tr>
      <td style="background:#666666; padding:4px !important; font-weight:bold; color:#ffffff;"></td>
     <td style="background:#666666; padding:4px !important; font-weight:bold; color:#ffffff;">WEIGHT</td>
      <td style="background:#666666; padding:4px !important; font-weight:bold; color:#ffffff;">DOOR WIDTH</td>
       <td style="background:#666666; padding:4px !important; font-weight:bold; color:#ffffff;">WEIGHT</td>
      <td style="background:#666666; padding:4px !important; font-weight:bold; color:#ffffff;">DOOR WIDTH</td>
    </tr>
    <tr>
      <td style="color:#333333; background:#ffffff;padding:4px !important;  font-size:14px;">Using Two Hinges</td>
     <td style="color:#333333;background:#ffffff; padding:4px !important; font-size:14px;">110lbs</td>
     <td style="color:#333333;background:#ffffff;padding:4px !important;  font-size:14px;">36"</td>
     
     <td style="color:#333333;background:#ffffff;padding:4px !important;  font-size:14px;">110 lbs</td>
     <td style="color:#333333;background:#ffffff;padding:4px !important;  font-size:14px;">36"</td>
     
     
    </tr>
    <tr>
      <td style="color:#333333;padding:4px !important; background:#d2e2e3;  font-size:14px;">Using Three Hinges</td>
     <td style="color:#333333;padding:4px !important; background:#d2e2e3;  font-size:14px;">140 lbs</td>
     <td style="color:#333333; padding:4px !important; background:#d2e2e3; font-size:14px;">36"</td>
     <td style="color:#333333;padding:4px !important; background:#d2e2e3;  font-size:14px;">140 lbs</td>
     <td style="color:#333333; padding:4px !important; background:#d2e2e3; font-size:14px;">36"</td>
    </tr>
  </tbody>
</table>


<p><br></p>


<table width="100%" border="0" cellspacing="0" style="font-size:12px !important" >
  <tbody>
  <tr>
      <td  style="background:none; padding:10px !important;" colspan="5"><div style=" color:#333333; font-weigh:bold;"><strong style="color:#333333 !important; font-size:14px !important;">OUR EXCLUSIVE SUPER DUTY WALL MOUNT HINGE "GORDO" FOR 1/2" THICK GLASS AND OVERSIZE 3/8" THICK GLASS</strong><br>
        
      </div></td>
    
    </tr>
    
    
    <tr>
      <td style="background:#999999; padding:4px !important; font-weight:bold; color:#ffffff;">Maximum Capacities</td>
     <td colspan="2" style="background:#999999; padding:4px !important; font-weight:bold; color:#ffffff;">1/2" Glass</td>

        <td  colspan="2" style="background:#999999; padding:4px !important;  font-weight:bold; color:#ffffff;">3/8" Glass - Oversize</td>
    </tr>
    
  
    <tr>
      <td style="background:#666666; padding:4px !important; font-weight:bold; color:#ffffff;"></td>
     <td style="background:#666666; padding:4px !important; font-weight:bold; color:#ffffff;">WEIGHT</td>
      <td style="background:#666666; padding:4px !important; font-weight:bold; color:#ffffff;">DOOR WIDTH</td>
       <td style="background:#666666; padding:4px !important; font-weight:bold; color:#ffffff;">WEIGHT</td>
      <td style="background:#666666; padding:4px !important; font-weight:bold; color:#ffffff;">DOOR WIDTH</td>
    </tr>
    <tr>
      <td style="color:#333333; background:#ffffff;padding:4px !important;  font-size:14px;">Using Two Hinges</td>
     <td style="color:#333333;background:#ffffff; padding:4px !important; font-size:14px;">145 lbs</td>
     <td style="color:#333333;background:#ffffff;padding:4px !important;  font-size:14px;">40"</td>
     
     <td style="color:#333333;background:#ffffff;padding:4px !important;  font-size:14px;">145 lbs</td>
     <td style="color:#333333;background:#ffffff;padding:4px !important;  font-size:14px;">40"</td>
     
     
    </tr>
  </tbody>
</table>

<p><br></p>

 <table width="100%" border="0" cellspacing="0" style="font-size:12px !important">
  <tbody>
  
   
  <tr>
      <td  style="background:none; padding:10px !important;" colspan="3"><div style="color:#333333; font-weigh:bold;"><strong style="color:#333333 !important; font-size:14px !important; ">ALL PIVOT HINGES FOR 3/8" THICK GLASS</strong></div></td>
    
    </tr>
     <tr>
      <td style="background:#999999; padding:4px !important; font-weight:bold; color:#ffffff;">Maximum Capacities</td>
     <td colspan="2" style="background:#999999; padding:4px !important; font-weight:bold; color:#ffffff;">3/8" Glass</td>

       
    </tr>
    
    <tr>
      <td style="background:#666666; padding:4px !important; font-weight:bold; color:#ffffff;"></td>
     <td style="background:#666666; padding:4px !important; font-weight:bold; color:#ffffff;">WEIGHT</td>
      <td style="background:#666666; padding:4px !important; font-weight:bold; color:#ffffff;">DOOR WIDTH</td>
    </tr>
    <tr>
      <td style="color:#333333; background:#ffffff;padding:4px !important;  font-size:14px;">Using Two Hinges</td>
     <td style="color:#333333;background:#ffffff; padding:4px !important; font-size:14px;">100 lbs</td>
     <td style="color:#333333;background:#ffffff;padding:4px !important;  font-size:14px;">31" </td>
    </tr>
    
  </tbody>
</table></td>
      
 <p><br></p> 
      
     <table width="100%" border="0" cellspacing="0" style="font-size:12px !important">
  <tbody>
  
   
  <tr>
      <td  style="background:none; padding:10px !important;" colspan="3"><div style="color:#333333; font-weigh:bold;"><strong style="color:#333333 !important; font-size:14px !important; ">HEAVY DUTY PIVOT HINGES FOR 3/8" THICK GLASS</strong></div></td>
    
    </tr>
     <tr>
      <td style="background:#999999; padding:4px !important; font-weight:bold; color:#ffffff;">Maximum Capacities</td>
     <td colspan="2" style="background:#999999; padding:4px !important; font-weight:bold;  color:#ffffff;">1/2" Glass</td>

       
    </tr>
    
    <tr>
      <td style="background:#666666; padding:4px !important; font-weight:bold; color:#ffffff;"></td>
     <td style="background:#666666; padding:4px !important; font-weight:bold; color:#ffffff;">WEIGHT</td>
      <td style="background:#666666; padding:4px !important; font-weight:bold; color:#ffffff;">DOOR WIDTH</td>
    </tr>
    <tr>
      <td style="color:#333333; background:#ffffff;padding:4px !important;  font-size:14px;">Using Two Hinges</td>
     <td style="color:#333333;background:#ffffff; padding:4px !important; font-size:14px;">145 lbs/66 kg</td>
     <td style="color:#333333;background:#ffffff;padding:4px !important;  font-size:14px;">36"</td>
    </tr>
    
  </tbody>
</table>





		                    	</div> 
		                 </div> 	</div> 
		                <?php } ?>
		                 <!-- Hinge Style Section Ends -->

		  				<?php if($check_pull == 'on'){ ?>
			                <!-- Pull Section -->
			                <div id="F" data-spec-id="F" class="field-_attribute_tag attribute-glass_pulltype build-showerdoor atribut-pull_h">
                            
                                <div style="height:1090px !important; overflow-y:hidden !important;">
                 <div class="circlef"  style="height:0px; bottom:0px;"><img src="/wp-content/uploads/2016/08/F.png" /></div> 
                            <h1>How Would You Like to Open Your Door?</h1>
                            
			                    <div class="col-xs-6">
			                       
			                     
			                       <ul class="bundle-tild-sect" > 
										<li style="margin-top:30px !important;">
											<label style="width:100% !important">
												<a data-rel-last="F" data-re_keyname="pull" data-show_keyname="Pull" title="" data-rel="G" dat-cur-rel="F" rel="" data-re_attr="knob" style="text-align:center !important; margin-bottom:55px;"><img src="<?php echo get_template_directory_uri(); ?>/images/bundled/knobkiosk.png" id="knob-attribute-style" style="width:180px !important; height:auto;" />Knob 
												</a>
												<a class="btn-v-tild" id="knob-attribute-style_a" class="btn-v-tild" data-rel-last="F" data-re_keyname="pull" data-show_keyname="Pull" title="" data-rel="G" dat-cur-rel="F" rel="" data-re_attr="knob" style="width:250px !important">
												  	<span class="post-title-sect coName">Knob</span>
												</a>
											</label>
										</li>
										<li class="pull-type" style="margin-top:40px !important;">
										 	<label>
										    	<a data-rel-last="F" data-re_keyname="pull" data-show_keyname="Pull" title="" data-rel="H" dat-cur-rel="F" rel="" style="text-align:center !important; margin-bottom:55px;"><img src="<?php echo get_template_directory_uri(); ?>/images/bundled/handlekiosk.png" id="handle-attribute-style" style="width:200px !important; height:auto;"/>Handle
										    	</a>
										    	<a class="btn-v-tild" data-rel-last="F" data-re_keyname="pull" data-show_keyname="Pull" title="" data-rel="H" dat-cur-rel="F" rel="" style="width:250px !important">
										      		<span class="post-title-sect coName">Handle</span>
										    	</a>
										 	</label>
										</li>
										<li class="pull-type" style="margin-top:40px !important;" >
										 	<label>
										    	<a data-rel-last="F" data-re_keyname="pull" data-show_keyname="Pull" title="" data-rel="J" dat-cur-rel="F" rel="" style="text-align:center !important; margin-bottom:55px;"><img src="<?php echo get_template_directory_uri(); ?>/images/bundled/towelbarcomboKiosk.png" id="towelbar-attribute-style" style="width:320px !important; height:auto;" />Towel Bar
										   		</a>
										    	<a class="btn-v-tild" data-rel-last="F" data-re_keyname="pull" data-show_keyname="Pull" title="" data-rel="J" dat-cur-rel="F" rel="" style="width:250px !important">
										    		<span class="post-title-sect coName">Towel Bar & Handle Combo</span>
										    	</a>
										 	</label>
										</li>
		                          </ul>
			                    </div>
			               </div> </div> 
			                 <!-- Pull Section Ends -->
						<?php } ?>

		                <!-- Pull Section knob -->
		                <div id="G" data-spec-id="F" class="atribut-pull_style field-_attribute_tag attribute-knob_style build-showerdoor atribut-pull_h knob_style" data-re_attr="knob"><div style="height:965px !important; ">
                 <div class="circlef"  style="height:0px; bottom:0px;"><img src="/wp-content/uploads/2016/08/F.png" /></div> 
		                    <div class="col-xs-12">
		                       <h1>Choose Your Knob Style</h1> <div style="font-size:14px; font-style:italic; padding-bottom:15px; color:#333333 !important">Some finishes displayed below may not appear to be the exact color you've chosen, rest assured all of your hardware and pull type will match the selected finish.</div>
		                       
		                       <ul class="bundle-tild-sect">
		                          	<?php
		                            foreach ($knob_style as $key => $value) {
		                              	$src = strtolower( trim( preg_replace('/\s+/', '', $value ), '.') ); 
		                              	if($check_towelbar == 'on'){
			                                $knob_style_html .= '<li class="knob_style" style="display:none;">
			                                <label style="background:#ffffff; width:250px !important; padding-top:10px;">
			                                  <a  data-re_keyname="knob_style" data-show_keyname="Knob Style" title="'.$value.'" data-rel="N" dat-cur-rel="G" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" />
			                                  </a>
			                                  <a class="btn-v-tild" data-re_keyname="knob_style" data-show_keyname="Knob Style" title="'.$value.'" data-rel="N" dat-cur-rel="G" rel="'.$value.'" style="width:250px !important;">
			                                    <span class="post-title-sect coName">'.$value.'</span>
			                                  </a>
			                                </label></li>';
		                              	}
		                              	else{
			                                $knob_style_html .= '<li class="knob_style" style="display:none;">
			                                <label style="background:#ffffff; width:250px !important; padding-top:10px;">
			                                  <a data-re_keyname="knob_style" data-show_keyname="Knob Style" title="'.$value.'" data-rel="R" dat-cur-rel="G" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" />
			                                  </a>
			                                  <a class="btn-v-tild" data-re_keyname="knob_style" data-show_keyname="Knob Style" title="'.$value.'" data-rel="R" dat-cur-rel="G" rel="'.$value.'" style="width:250px !important;">
			                                    <span class="post-title-sect coName">'.$value.'</span>
			                                  </a>
			                                </label></li>';
		                              	}
		                            }
		                            echo $knob_style_html; 
		                            ?>
	                          </ul>
		                    </div>
		             </div>    </div> 
		                 <!-- Pull Section knob Ends -->


		                 <!-- Pull Section Handle Size -->
		                 <div id="H" data-spec-id="F" class="atribut-pull_style field-_attribute_tag attribute-handle_size build-showerdoor atribut-pull_h handle_size"><div style="height:975px !important; overflow-y:hidden !important;">
                 <div class="circlef"  style="height:0px; bottom:0px;"><img src="/wp-content/uploads/2016/08/F.png" /></div> 
		                    <div class="col-xs-12">
								<h1>Choose Your Handle Size</h1>
								
								<ul class="bundle-tild-sect">
		                        <?php
		                        foreach ($handle_size as $key => $value) {
		                            $src = strtolower( trim( preg_replace('/\s+/', '', $value ), '.') ); 

		                            $handle_size_html .= '<li class="handle_size" style="display:block; width:100% !important; ">
		                            <label>
		                               <a data-re_keyname="handle_size" data-show_keyname="Handle Style" title="'.$value.'" data-rel="I" dat-cur-rel="H" rel="'.$value.'" >'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/kiosk/'.$src.'.png" style="width:260px !important; max-height:400px !important;" />
		                               </a>
		                               <a class="btn-v-tild" data-re_keyname="handle_size" data-show_keyname="Handle Style" title="'.$value.'" data-rel="I" dat-cur-rel="H" rel="'.$value.'">
		                                <span class="post-title-sect coName">'.$value.'</span>
		                               </a>
		                            </label></li>';
		                        }
		                       	echo $handle_size_html; 
		                       	?>
		                      	</ul>
		                    </div>
		              </div>   </div> 
		                 <!-- Pull Section Handle Size -->


		                 <!-- Pull Section Handle Style -->
		                 <div id="I" class="atribut-pull_style field-_attribute_tag attribute-handle_style build-showerdoor atribut-pull_h atribut-gls_h handle_style" data-re_attr="handle">
                         
                        
                           <div style="height:965px !important; ">
                 <div class="circlef"  style="height:0px; bottom:0px;"><img src="/wp-content/uploads/2016/08/F.png" /></div> 
                         
                         
		                    <div class="col-xs-12">
		                       <h1>Choose Your Handle Style</h1><div style="font-size:14px; font-style:italic; padding-bottom:15px; color:#333333 !important">Some finishes displayed below may not appear to be the exact color you've chosen, rest assured all of your hardware and pull type will match the selected finish.</div>
		                       
		                       <ul class="bundle-tild-sect">
									<?php
									foreach ($handle_style as $key => $value) {
										$src = strtolower( trim( preg_replace('/\s+/', '', $value ), '.') ); 
										if($check_towelbar == 'on'){
									 		$handle_style_html .= '<li class="handle_style" style="display:none;">
										   <label style="background:#ffffff; width:240px !important; padding-top:10px;">
										        <a data-re_keyname="handle_style" data-show_keyname="Handle Style" title="'.$value.'" data-rel="N" dat-cur-rel="I" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" />
										        </a>
										        <a class="btn-v-tild" data-re_keyname="handle_style" data-show_keyname="Handle Style" title="'.$value.'" data-rel="N" dat-cur-rel="I" rel="'.$value.'" style="width:240px !important;">
										          <span class="post-title-sect coName">'.$value.'</span>
										        </a>  
									    	</label></li>';
									  	}
										else{
									  		$handle_style_html .= '<li class="handle_style" style="display:none;">
										    <label style="background:#ffffff; width:240px !important; padding-top:10px;">
										        <a data-re_keyname="handle_style" data-show_keyname="Handle Style" title="'.$value.'" data-rel="R" dat-cur-rel="I" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" />
										        </a>
										        <a class="btn-v-tild" data-re_keyname="handle_style" data-show_keyname="Handle Style" title="'.$value.'" data-rel="R" dat-cur-rel="I" rel="'.$value.'" style="width:240px !important;">
										          <span class="post-title-sect coName">'.$value.'</span>
										        </a>  
										    </label></li>';
									  	}
									}
									echo $handle_style_html; 
									?>
	                          </ul>
		                    </div>
		           </div>      </div> 
		                 <!-- Pull Section last Style -->

		                 <!-- Pull Section Handle Towelbar HandleSize -->
		                 <div id="J" data-spec-id="F" class="atribut-pull_style attribute-towelbar_size build-showerdoor atribut-pull_h atribut-gls_h towelbar_size">
		                   
                           
                           <div style="height:1120px !important; ">
                 <div class="circlef"  style="height:0px; bottom:0px;"><img src="/wp-content/uploads/2016/08/F.png" /></div> 
                           <h1>Combo Handle Size</h1>
                            <div class="col-xs-6" >
		                        
		                       <ul class="bundle-tild-sect">
		                            <?php
		                            $combo_handle_size_html = '';
		                            foreach ($combo_handle_size as $key => $value) {
		                               $src = strtolower( trim( preg_replace('/\s+/', '', $value ), '.') ); 

		                               $combo_handle_size_html .= '<li class="combo_handle_size" style="display:block; width:100%">
		                                  <label>
		                                    <a data-re_keyname="combo_handle_size" data-show_keyname="Combo Handle Size" title="'.$value.'" data-rel="K" dat-cur-rel="J" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/kiosk/towel-'.$src.'.png" width="56%" />
		                                    </a>
		                                    <a class="btn-v-tild" data-re_keyname="combo_handle_size" data-show_keyname="Combo Handle Size" title="'.$value.'" data-rel="K" dat-cur-rel="J" rel="'.$value.'">
		                                      <span class="post-title-sect coName">'.$value.'</span>
		                                    </a>
		                                  </label></li>';
		                            }
		                            echo $combo_handle_size_html;
		                            ?>
	                          </ul>
		                    </div>
		            </div>    </div> 
		                 <!-- Pull Section Handle Towelbar HandleSize -->

		                 <!-- Pull Section Handle Towelbar TowelbarSize -->
		                 <div id="K" class="atribut-pull_style field-_attribute_tag attribute-towelbar_size build-showerdoor atribut-pull_h atribut-gls_h towelbar_size">
                         
                         
                           <div style="height:938px !important; ">
                 <div class="circlef"  style="height:0px; bottom:0px;"><img src="/wp-content/uploads/2016/08/F.png" /></div> 
                         
                         
		                    <div class="col-xs-12" style="text-align:left">
		                       <h1> Combo Towelbar Size </h1>
		                       <ul class="bundle-tild-sect">
		                            <?php
		                            $combo_handle_towelbar_size_html = '';
		                            foreach ($combo_handle_towelbar_size as $key => $value) {
		                               $src = strtolower( trim( preg_replace('/\s+/', '', $value ), '.') ); 
		                               $combo_handle_towelbar_size_html .= '<li class="towelbar_size" style="display:block; width:100%">
		                                  <label>
		                                    <a data-re_keyname="combo_towelbar_size" data-show_keyname="Combo Towelbar Size" title="'.$value.'" data-rel="L" dat-cur-rel="K" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/towel--'.$src.'.png" />
		                                    </a>
		                                    <a class="btn-v-tild" data-re_keyname="combo_towelbar_size" data-show_keyname="Combo Towelbar Size" title="'.$value.'" data-rel="L" dat-cur-rel="K" rel="'.$value.'">
		                                      <span class="post-title-sect coName">'.$value.'</span>
		                                    </a>
		                                  </label></li>';
		                            }
		                            echo $combo_handle_towelbar_size_html;
		                            ?>
		                       </ul>
		                    </div>
		               </div> </div> 
		                <!-- Pull Section Handle Towelbar TowelbarSize -->


		                <!-- Pull Section Handle Towelbar TowelbarStyle -->
		                <div id="L" class="att-tild-sect atribut-pull_style field-_attribute_tag attribute-towelbar_style build-showerdoor atribut-pull_h atribut-gls_h towelbar_style" data-re_attr="handle-towelbar-combo" style="background: rgba(153, 215, 219, 0) none repeat scroll 0 0 !important; ">
                        
                        
                           <div style="height:940px !important; ">
                 <div class="circlef"  style="height:0px; bottom:0px;"><img src="/wp-content/uploads/2016/08/F.png" /></div> 
                        
                        
		                    <div class="col-xs-12">
		                       <h1>Choose Your Combo Towelbar Style </h1><div style="font-size:14px; font-style:italic; padding-bottom:15px; color:#333333 !important">Some finishes displayed below may not appear to be the exact color you've chosen, rest assured all of your hardware and pull type will match the selected finish.</div>
		                 
		                        <ul class="bundle-tild-sect"  >
		                        	<?php
		                            foreach ($combo_habdle_towelbar_style as $key => $value) {
		                             	$src = strtolower( trim( preg_replace('/\s+/', '', $value ), '.') ); 
		                                if($check_towelbar == 'on'){
		                                  $combo_habdle_towelbar_style_html .= '<li class="glass-type" style="display:none; ">
		                                    <label>
		                                        <a data-re_keyname="combo_style" data-show_keyname="Combo Style" title="'.$value.'" data-rel="N" dat-cur-rel="L" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/towel-'.$src.'.png" style="width:265px !important; height:auto !important"  />
		                                        </a>
		                                        <a class="btn-v-tild" data-re_keyname="combo_style" data-show_keyname="Combo Style" title="'.$value.'" data-rel="N" dat-cur-rel="L" rel="'.$value.'" style="width:265px !important; height:auto !important" >
		                                          <span class="post-title-sect coName">'.$value.'</span>
		                                        </a>
		                                    </label></li>';
		                                }
		                                else{
		                                  $combo_habdle_towelbar_style_html .= '<li class="glass-type" style="display:none;">
											<label >
											    <a data-re_keyname="combo_style" data-show_keyname="Combo Style" title="'.$value.'" data-rel="R" dat-cur-rel="L" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/towel-'.$src.'.png" style="width:265px !important; height:auto !important" />
											    </a>
											    <a class="btn-v-tild" data-re_keyname="combo_style" data-show_keyname="Combo Style" title="'.$value.'" data-rel="R" dat-cur-rel="L" rel="'.$value.'" style="width:265px !important; height:auto !important">
											    <span class="post-title-sect coName">'.$value.'</span>
											    </a>
											</label></li>';
		                                }
		                            }
		                          	echo $combo_habdle_towelbar_style_html; 
		                          	?>
		                        </ul>
		                    </div>
		               </div> </div> 
		                 <!-- Pull Section Handle Towelbar TowelbarStyle -->


		                <!-- If Towelbar Enabled  -->
		                <?php if($check_towelbar == 'on'){ ?>

		                    <div id="N" class="attribute-glass_installation build-showerdoor show-attribute-combo field-_attribute_tag atribut-pull_h atribut-gls_h">
                            
                            <div style="height:900px !important; ">
                 <div class="circlef"  style="height:0px; bottom:0px;"><img src="/wp-content/uploads/2016/08/F.png" /></div> 
		                       	 <h1>Do you want to add a towel bar? </h1><div class="col-xs-7">
                               
		                         	<ul class="bundle-tild-sect">
										<li >
											<label>
										    	<a title="No" data-re_keyname="no_comboo" data-show_keyname="Towel Bar" title="No" data-rel="R" dat-cur-rel="N">
										        	<img alt="No" src="<?php echo get_template_directory_uri(); ?>/images/no.png" style="height: 320px;">No
										    	</a>
										    	<a class="btn-v-tild" title="No" data-re_keyname="no_comboo" data-show_keyname="Towel Bar" title="No" data-rel="R" dat-cur-rel="N">
										        	<span class="post-title-sect coName">No</span>
										     	</a>
										  	</label>
										</li> 
										<li class="active">
										 	<label>
										    	<a class="yes_towelbar_attr" title="Yes" data-re_keyname="no_comboo" data-show_keyname="Towel Bar" title="Yes" data-rel="O" dat-cur-rel="N">
										        	<img alt="Yes" src="<?php echo get_template_directory_uri(); ?>/images/yes.png" style="height: 320px;">Yes
										     	</a>
										    	<a class="yes_towelbar_attr btn-v-tild" title="Yes" data-re_keyname="no_comboo" data-show_keyname="Towel Bar" title="Yes" data-rel="O" dat-cur-rel="N">
										      		<span class="post-title-sect coName">Yes</span>
										    	</a>
										  	</label>
										</li>          
		                            	<div class="clear"></div>
		                          	</ul>
		                       	</div>   
		                  </div>  </div>

		                       <!--  Towelbar Size -->
		                      <div id="O" class="attribute-glass_combo field-_attribute_tag attribute-handle-combo-towelbar_size build-showerdoor atribut-pull_h atribut-gls_h towelbar_size">
                              
                            <div style="height:920px !important; ">
                 <div class="circlef"  style="height:0px; bottom:0px;"><img src="/wp-content/uploads/2016/08/F.png" /></div> 
		                         <div class="col-xs-12">
		                            <h1> Towelbar Size </h1>
		                            <ul class="bundle-tild-sect">
		                                <?php
		                                if($towelbar_size){
		                                    foreach ($towelbar_size as $key => $value) {
		                                       $src = strtolower( trim( preg_replace('/\s+/', '', $value ), '.') ); 

		                                       $combo_towelbar_size_html .= '<li class="towelbar_size">
		                                          <label>
		                                             <a data-re_keyname="towelbar_size" data-show_keyname="Towel Bar Size" title="'.$value.'" data-rel="P" dat-cur-rel="O" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/towel--'.$src.'.png" />
		                                             </a>
		                                             <a class="btn-v-tild" data-re_keyname="towelbar_size" data-show_keyname="Towel Bar Size" title="'.$value.'" data-rel="P" dat-cur-rel="O" rel="'.$value.'">
		                                              <span class="post-title-sect coName">'.$value.'</span>
		                                             </a>
		                                          </label></li>';
		                                    }
		                                  echo $combo_towelbar_size_html;
		                                }
		                                  
		                                ?>
		                            </ul>
		                         </div>
		                     </div> </div> 
		                      <!-- Towelbar Size -->

		                       <!-- Towelbar Sides -->
		                    <div id="P" class="attribute-glass_combo field-_attribute_tag attribute-handle-combo-towelbar_side build-showerdoor atribut-pull_h atribut-gls_h towelbar_side">
                            <div style="height:945px !important; ">
                 <div class="circlef"  style="height:0px; bottom:0px;"><img src="/wp-content/uploads/2016/08/F.png" /></div> 
		                        <div class="col-xs-12">
		                            <ul class="bundle-tild-sect"><?php
		                                if($towelbar_side){
		                                    foreach ($towelbar_side as $key => $value) {
		                                        $src = strtolower( trim( preg_replace('/\s+/', '', $value ), '.') ); 

		                                        $towelbar_side_html .= '<li class="towelbar_side">
		                                        <label>
		                                        <a data-re_keyname="towelbar_side" data-show_keyname="Sides" title="'.$value.'" data-rel="Q" dat-cur-rel="P" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/side-'.$src.'.png" />
		                                         </a>
		                                        <a class="btn-v-tild" data-re_keyname="towelbar_side" data-show_keyname="Sides" title="'.$value.'" data-rel="Q" dat-cur-rel="P" rel="'.$value.'" style="margin-top:-7px;">
		                                          <span class="post-title-sect coName">'.$value.'</span>
		                                        </a>  
		                              	        </label></li>';
		                                    }
		                                    echo $towelbar_side_html;
		                                } ?>
		                            </ul>
		                        </div>
		                  </div> <div class="circlef"  style="height:0px; bottom:0px;"><img src="/wp-content/uploads/2016/08/F.png" /></div> </div> 
		                    <!-- Towelbar Sides -->


		                    <!-- Towelbar Style -->
		                      <div id="Q" class="attribute-glass_combo field-_attribute_tag attribute-handle-combo-towelbar_style build-showerdoor atribut-pull_h atribut-gls_h towelbar_style" data-re_attr="towelbar">
                              
                               
		                      	<div class="col-xs-12">
									<h1>Choose your combo towelbar style </h1><div style="font-size:14px; font-style:italic; padding-bottom:15px; color:#333333 !important">Some finishes displayed below may not appear to be the exact color you've chosen, rest assured all of your hardware and pull type will match the selected finish.</div>
									<ul class="bundle-tild-sect"> <?php
										if($towelbar_style){
											foreach ($towelbar_style as $key => $value) {
												$src = strtolower( trim( preg_replace('/\s+/', '', $value ), '.') ); 

												$combo_towelbar_style_html .= '<li class="glass-type">
												 <label >
												<a data-re_keyname="towelbar_style" data-show_keyname="Towelbar Style" title="'.$value.'" data-rel="R" dat-cur-rel="Q" rel="'.$value.'" style="background:#ffffff; width:240px !important; padding-top:10px;">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/htowelbar_style-'.$src.'.png" />
												</a>
												<a class="btn-v-tild" data-re_keyname="towelbar_style" data-show_keyname="Towelbar Style" title="'.$value.'" data-rel="R" dat-cur-rel="Q" rel="'.$value.'" style="width:240px !important; margin-top:-7px;">
												<span class="post-title-sect coName">'.$value.'</span>
												</a>
												</label></li>';
											}
											echo $combo_towelbar_style_html; 
										} ?>
									</ul>
		                        </div>
		             <div style="height:945px !important; ">
                 <div class="circlef"  style="height:0px; bottom:0px;" ><img src="/wp-content/uploads/2016/08/F.png" style="width:1075px !important; height:auto" /></div>  </div>  </div>     
		                   <!--Towelbar Style -->   

		                <?php } ?>              

		                <!-- Installation Kit Section Start -->
		            	<div id="R" class="build-showerdoor attribute-glass_installation atribut-pull_h atribut-gls_h">
		                	
                           <div style="height:945px !important; ">
                 <div class="circlef"  style="height:0px; bottom:0px;"><img src="/wp-content/uploads/2016/08/F.png" /></div> 
							
							
							
							<?php installation_kit_kiosk(); ?>
		            </div>    </div>

						<!-- Installation Kit Section Ends -->

		                <!-- Final section -->
		                <div id="S" data-rel="recap" class="row setup-content_step recap build-showerdoor">
		                   <div style="height:890px !important; ">
                 <div class="circlef"  style="height:0px; bottom:0px;"><img src="/wp-content/uploads/2016/08/F.png" /></div> 
		                        <div class="light-well well">                      
		                          	<div id="starburst">
                                    <style type="text/css">
									
#pricing { display: none;}</style>
                                   
								   
								    <script type="text/javascript">
 $(document).ready(function () {
   if(window.location.href.indexOf("testies") > -1) {
   document.getElementById("pricing").style.display = "block";
  }
});
</script>
                                    
<div id="pricing">
		                          	<h1 style="text-align:center" ><nobr>Thank you for building your <br>
	                          	    shower door today.</nobr>
		                          	<span class="glasssqft-options">  Glass SQFT <small></small></span>
		                          	</h1>
		                          	
		                          		<h2 style="color:#333333; text-align:center">Frameless Shower Door Price: <b>$</b><b id="price_total"></b></h2>
</div>
		                          	<div class="kiosk-dist-door">
		                          			<div class="row">

		                          				<div class="col-md-12">
		                          					<div class="custom-input-group custom-info">
		                          						<p id="kiosk-dis-total" class="hide-tild-sect kioskdist-tilde-sect"> Door Price: <span></span></p>
		                          						
		                          						<p id="kiosk-disct-per" class="hide-tild-sect kioskdist-tilde-sect" style="color:red;"> Door Discount: <span></span></p>
		                          						
		                          						<p id="kiosk-wthout_installtion" class="hide-tild-sect kioskdist-tilde-sect"> Door Total: <span></span></p>

		                          					</div>
		                          				</div>
		                          			</div>
		                          		</div>	
										
										<p style="text-align:center"><br>
										</p>										
		                                  	<div class="install_form clearfix" id="form_secarea" style="border:none !important;">
		                                      	<div class="install_sec" style="border:none !important;">
	                                          	  <div class="formLayout">
		                                           		<form action="<?php echo $form_redirect_url; ?>" method="post" id="loadform"> 
															<input type="hidden" value="<?php echo get_the_ID(); ?>" name="oid">
															<input type="hidden" value="Frameless Shower Door - <?php echo get_the_title(); ?>" id="description" name="description">
															<input type="hidden" value="" id="i_doortype" name="i_doortype">
															<input type="hidden" value="Door Builder" name="lead_source">
															<input type="hidden" name="price" id="priceinput" value="">
															<input type="hidden" name="sqft" id="sqftinput" value="">
															<input type="hidden" name="sqftclean" id="sqftclean" value="">
															<input type="hidden" value="0" id="stayclean" name="stayclean" class="staycleaninput">
															<input type="hidden" id="city_name" name="FDLocation" value="<?php echo $FDLocation; ?>">
															<input type="hidden" id="56_temp" name="56_temp" value="<?php echo $discount_kiosk; ?>">
															<input type="hidden" id="discount_kiosk" name="discount_kiosk" value="<?php echo $discount_kiosk; ?>">
														

							<input type="text" name="first_name"  id="first_name" style="background:#E4E4E4; border:1px solid #A2A1A1; height:40px !important; color:#000 !important;" placeholder="First Name" required="required"><br>
								<input type="text" name="last_name"  id="last_name" style="background:#E4E4E4; border:1px solid #A2A1A1; height:40px !important; color:#000 !important;"  placeholder="Last Name" required="required"><br>
								<input type="text" name="phone" id="phone" placeholder="Phone" style="background:#E4E4E4; border:1px solid #A2A1A1; height:40px !important; color:#000 !important;" required="required">
								<input type="email" name="email"  id="email" placeholder="Email" style="background:#E4E4E4; border:1px solid #A2A1A1; height:40px !important; color:#000 !important;" required="required"><br>
								

															<select name="state" id="state" style="background:#E4E4E4 !important; width:100%;border:1px solid #A2A1A1; height:40px !important; color:#000000 !important;" required>
															<option> Select State </option>
															<option value="Alabama">Alabama</option>
															<option value="Alaska">Alaska</option>
															<option value="Arizona">Arizona</option>
															<option value="Arkansas">Arkansas</option>
															<option value="California">California</option>
															<option value="Colorado">Colorado</option>
															<option value="Connecticut">Connecticut</option>
															<option value="Delaware">Delaware</option>
															<option value="District of Columbia">District of Columbia</option>
															<option value="Florida">Florida</option>
															<option value="Georgia">Georgia</option>
															<option value="Hawaii">Hawaii</option>
															<option value="Idaho">Idaho</option>
															<option value="Illinois">Illinois</option>
															<option value="Indiana">Indiana</option>
															<option value="Iowa">Iowa</option>
															<option value="Kansas">Kansas</option>
															<option value="Kentucky">Kentucky</option>
															<option value="Louisiana">Louisiana</option>
															<option value="Maine">Maine</option>
															<option value="Maryland">Maryland</option>
															<option value="Massachusetts">Massachusetts</option>
															<option value="Michigan">Michigan</option>
															<option value="Minnesota">Minnesota</option>
															<option value="Mississippi">Mississippi</option>
															<option value="Missouri">Missouri</option>
															<option value="Montana">Montana</option>
															<option value="Nebraska">Nebraska</option>
															<option value="Nevada">Nevada</option>
															<option value="New Hampshire">New Hampshire</option>
															<option value="New Jersey">New Jersey</option>
															<option value="New Mexico">New Mexico</option>
															<option value="New York">New York</option>
															<option value="North Carolina">North Carolina</option>
															<option value="North Dakota">North Dakota</option>
															<option value="Ohio">Ohio</option>
															<option value="Oklahoma">Oklahoma</option>
															<option value="Oregon">Oregon</option>
															<option value="Pennsylvania">Pennsylvania</option>
															<option value="Rhode Island">Rhode Island</option>
															<option value="South Carolina">South Carolina</option>
															<option value="South Dakota">South Dakota</option>
															<option value="Tennessee">Tennessee</option>
															<option value="Texas">Texas</option>
															<option value="Utah">Utah</option>
															<option value="Vermont">Vermont</option>
															<option value="Virginia">Virginia</option>
															<option value="Washington">Washington</option>
															<option value="West Virginia">West Virginia</option>
															<option value="Wisconsin">Wisconsin</option>
															<option value="Wyoming">Wyoming</option>
															</select>

															<textarea  style="background:#E4E4E4 !important; border:1px solid #A2A1A1; height:70px !important; color:#000 !important;" placeholder="Comment" type="text" rows="2" id="message" name="message" class="form-control"></textarea>

															<p class="thumbnails measurement_values"></p>
															<p class="thumbnails image_picker_selector"></p>

															<input type="hidden" value="<?php echo $username; ?>" id="stayclean" name="currentuser">
															<input type="hidden" value="<?php echo $mode_type; ?>" id="stayclean" name="mode_type">
															<input type="hidden" value="<?php echo $cur_url; ?>" id="cur_url" name="website">
															
															



															<input type="submit" name="contactSubmit" value="Get Your Quote" id="bun_submit" style="border-radius:0px !important">
														</form>
                                                       
		                                          	</div>  
		                                        </div>
		                                      
										 <div class="bar"><div class="bartext">Calculating Your Quote</div></div>
		                                    </div>

											<div class="install_content" style="height:100px;">
                                         
												<!--<center style="margin-bottom:22px;">
													<b> We will be there for you every step of the way. 
													From measure to install "we've got your back"! </b>
												</center>
<center>
						  <p> Thank you for choosing The Original Frameless Shower Doors, the only “Direct from the manufacturer” shower door company!												</p>
												</center>-->
											</div>
										
									</div>
								</div>
							
					</div>	</div>
		                 <!-- Final section Ends -->

		            </div>
		              <!-- Left section Ends -->

		              <!-- Right section -->
		                <div class="col-sm-4 form-right">
	                		
		                	<?php 
							if(have_posts()) :
								while(have_posts()) : the_post(); ?>
								  	<div <?php post_class('single-post-listing'); ?> id="post_<?php the_ID(); ?>">
										<div class="post-tile clearfix">
											<div class="entry-title">
												<a class="previewTitle" href="javascript:void(0)" title="<?php the_title(); ?>"> <?php the_title(); ?> </a>
											</div>
										</div>

										<div class="entry">
										  <?php 
										      $thumbnail_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full');
										      echo '<img src="'.$thumbnail_image[0].'" alt="second image" style="width:500px !important; height:auto"/>';
										  ?>
										</div>

										<div class="total_vall">
											<div id="priceItem" class="col-xs-12 recapItem priceItem" style="display: none;">
											    <div class="list-group recap-list">
											        <div class="col-xs-12">
											            <h4 class="list-group-item-heading count title" style="text-align:left !important; margin-left:-20px !important;">Your Shower Door Configuration</h4>
											        </div>
											    </div>
											    <div id="door_txt" style="display: none;" data-re_atr="<?php echo $discount_txt; ?>">4</div>
											    <div id="door_description" style="display: none;" data-re_atr="<?php echo $discount_description; ?>">2</div>
											    <div id="door_button_dis" style="display: none;" data-re_atr="<?php echo $hide_discount_opt; ?>">2</div>
											</div>

											<div class="sqft_gls">
												<ul>
													<li class="galss_sqft_calci"><span class="option_head"></span><span class="options_price"></span></li>
												</ul>
											</div>
											<!-- Do not remove this code -->
											<div class="price_info_gls">
											  <ul>
											     
											  </ul>
											</div>
										</div>
								  	</div><?php 
								endwhile;
							endif; ?> 

								<!--<div class="stay_clean_glass" class="col-xs-12 stc-option" style="text-align:center">
							    	<div class="row option-text" style="text-align:center !important">
							        	<span>
							            	<span style="color:#e57207; font-weight:800;">Say No to soap scum buildup or hard mineral <br>deposits on your glass. </span>
							            	<br>Add
							            	water and stain resistant glass NOW for only $<span class="coating-price-defined"></span>
							            	<center>
							               	<span><label>Yes</label></span>
							               	<span><label>No</label></span>
							            	</center>
							        	</span>
							    	</div>
								</div>-->
								
		                </div>  
		              	<!-- Right section Ends -->
		              
						</div>   
					</div>
				</div>
			</div> </div>
		</div></div>
  