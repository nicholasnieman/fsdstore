<?php

/*Global Vaibles*/
	global $frame_breadcumb, $glass_sqft, $glass_sqft_img, $gls_formula, $glass_thickness, $glass_type, $hardware_finish, $hinge_style, $check_pull, $knob_style , $handle_size, $handle_style, $combo_handle_size, $combo_handle_towelbar_size, $combo_habdle_towelbar_style, $check_towelbar , $towelbar_size, $towelbar_style, $towelbar_side, $standard_door_opt, $standard_door_width, $standard_door_height, $install_kit, $door_angle , $header_length , $glassgroup, $resistant_coating, $discount_option, $discount_txt, $discount_description, $hide_discount_opt, $city_nm, $framework, $current_user_name;

/*Null Varibles*/
    $glass_type_html = $glass_thickness_html = $hardware_finish_html = $hinge_style_html = $knob_style_html = $handle_size_html = $handle_style_html = $towelbar_size_html = $combo_habdle_towelbar_style_html = $install_kit_html = $towelbar_size_html = $towelbar_side_html = $combo_towelbar_size_html = $combo_towelbar_style_html = NULL;

/*Getting Userrole*/

	if($framework == 'builder'){
		if(is_user_logged_in()) {
			$current_user = wp_get_current_user();

			if($current_user->roles[0] == 'sales_rep' || $current_user->roles[0] == 'administrator' ){
				$current_user_role = $current_user->roles[0];
			}
			else if($current_user->roles[1] == 'sales_rep' || $current_user->roles[1] == 'administrator' ){
				$current_user_role = $current_user->roles[1];
			}
			if($current_user_role == 'sales_rep' || $current_user_role == 'administrator'){
				
			}else{
				header("Location: ".site_url());
				exit();
			}
		}else{
			header("Location: ".site_url().'/wp-login.php');
			exit();
		}
		get_header('kiosk');
		$mode_type = 'Builder';
		$current_user = wp_get_current_user();
		$username = $current_user_name;
		$form_redirect_url =  site_url().'/builder-thank-you//';
	}
	$Path=$_SERVER['REQUEST_URI'];
	$cur_url =  home_url().$Path;
	

/*Html for Internal Builder Single*/	
	echo '<div class="builder-mode">';
	$title			= get_the_title();
	$userid 		= $current_user->ID;
	$username 		= $current_user->display_name;
	$userphone 		= get_user_meta( $userid, 'billing_phone', true );

	$userinfo 		= get_userdata( $userid );
	$usermail 		= $userinfo->user_email;

	$first_name = get_user_meta( $userid, 'first_name', true );
	$last_name = get_user_meta( $userid, 'last_name', true );
?>

	<script type="text/javascript">
		jQuery(document).ready(function(){
			var data = '<?php echo $title; ?>';
			jQuery('#selected-layout').html('<strong>Door Style: </strong> '+data);
		});
	</script>

	<!-- Show Pop Html On Click Hardware Finish -->
	<div id="get_modal" class="get_modal" style="display:none;">
	  	<center>
	      	<div class=" col-md-12">
	          	
	          	<h2> Protect your shower glass with our <span style="font-weight: 400;">STAY</span><span style="font-weight: bold;">CLEAN</span><span>&trade;</span> water and stain resistant coating </h2>
	          	<div id="stay_clean_glass" class="col-xs-12 stc-option">
	              	<div class="row option-text">
	                  	<span>
	                      	<span style="color:#e57207; font-weight:800;">For a LIMITED TIME ONLY, get up to 50% off our already discounted rate. This is a No Brainer! No more soap scum buildup or hard mineral deposits on your glass </span>
	                      	<br> Add
	                      	<span style="color: #035d62; font-weight:800;">DFI StayCLEAN&trade;</span>
	                      	water and stain resistant coating NOW for only $<span id="coating-price-defined"><?php echo $resistant_coating; ?></span>
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
	<div class="single-tild-sect" >
		<div id="stepNavigation">
			<div id="stepslr">
			   <!-- <div id="backNav" class="stepNav backNav btn btn-primary dark-btn">Back</div>
			   <div id="nextNav" class="stepNav nextNav btn btn-primary dark-btn">Next</div> -->
			   <div id="glass_sqft_formula" style="display: none;"><?php echo $gls_formula; ?></div>
			   <div class="browserinfo_" style="display:none;"><?php echo $_SERVER['HTTP_USER_AGENT']; ?></div>
			</div>
		<div class="container"><div class="col-md-12">	<div class="invalid range" id="thePrice">
			   <span class="placeholder">BUILD TO SEE YOUR QUOTE</span>
			</div></div></div>
		</div>

		<div class="container mysingle">
			<div class="row">
				<div class="mains col-md-12 page-content animated_glass doorbuilder">
					<div class="twoColbg" id="<?php echo get_the_id(); ?>">
						<!-- Left Section -->
						<div class="col-sm-8">
							<div id="selected_opt">
								<ol class="cd-breadcrumb triangle"></ol>
							</div>
		                 	<!-- Glass Sqft / Standard Door Section -->
		                  	<?php if($glass_sqft){ /*Measurement Option*/ ?>
		                  		<div id="attribute-option-1" class="attribute-glass_sqft build-showerdoor activebt"> 
				                    <h1>What are your measurements? </h1>
				                    <div style="font-size:14px; font-style:italic; padding-bottom:15px; color:#333333 !important">Please enter your approximate measurements rounded off to the nearest inch.<br>
	(measuring from arrow tip to arrow tip)</div>
				                   
			                    	<?php 
			                       	if(have_posts()) : 
			                       		while(have_posts()) : the_post(); 
											$html = '<div class="entry">';
											$html .= '<div class="col-sm-6 product-imgsqft">';
											$html .= '<img src="'.$glass_sqft_img.'" alt="second image"/>';
											$html .= '</div>';
											$html .= '<div class="col-sm-6 product-descipt">';
											$html .= '<h4>Input your approximate sizes</h4>';
											$html .= '<div class="row"><form>';
											 for ($i=0; $i < $glass_sqft; $i++) { 
											    $html .= '<p><label class="measurements">'.range('A','Z')[$i].'</label><input type="text" required="" data-rel="'.range('A','Z')[$i].'" name="option-qty" id="fsd-doorbuilder-option-21-qty-['.$i.']" onkeypress="return event.charCode >= 46 && event.charCode <= 57 && event.charCode != 47 || event.charCode <= 9" class="measurement"><span class="inches">inches</span><span class="error"></span></p>';
											 }
											$html .= '<a id="measuremnet-val" class="btn dark-btn btn-orange mnext" data-rel="attribute-option-2" dat-cur-rel="attribute-option-1" data-me_productid="'.get_the_ID().'" href="javascript:void(0)" data-show_keyname="Glass Sqft"><span>Next</span></a>';
											$html .= '</form> </div>';
											$html .= '</div>';
											$html .= '<div style="clear: both; display: block; padding-left: 55px;height: 200px;  width: 100%; font-size: 12px;  color: #035D62;font-weight: bold;    text-align: justify;">*Prices quoted do not include extra charges for double cuts, changes in size or unforeseen changes that were not included in the original diagram submitted. Your final size diagram will determine if any additional charges apply. The Original Frameless Shower Doors at its discretion, at any time, can change the type and/or placement of any hardware as they feel fit.</div>';
											$html .= '</div>';
											echo $html;

			                       		endwhile; 
			                       	endif;
		                        echo '</div>';
		                    }elseif($standard_door_opt == 'on'){ /*Standard Dorr Option Enable*/
		                        if($standard_door_width == 'on'){ ?>
		                          	<div id="attribute-option-1" class="field-_attribute_tag build-showerdoor attribute-std_dr_width atribut-pull_h">
		                           		<div class="col-xs-12">
		                              		<ul class="bundle-tild-sect">
												<li class="glass-type">
												<label>
												  <a data-re_keyname="standard_door_width" data-show_keyname="Door Width" data-show_keypara="54" rel="<?php echo get_template_directory_uri(); ?>/images/no_selection.gif" title="54" data-rel="attribute-option-2" dat-cur-rel="attribute-option-1" rel='54'>54" to 59 1/2"<img src="<?php echo get_template_directory_uri(); ?>/images/no_selection.gif" />
												  </a>
												  <a class="btn-v-tild" data-re_keyname="standard_door_width" data-show_keypara="54" data-show_keyname="Door Width" rel="<?php echo get_template_directory_uri(); ?>/images/no_selection.gif" title='54' data-rel="attribute-option-2" dat-cur-rel="attribute-option-1" rel='54'><span class="post-title-sect coName">54" to 59 1/2"</span></a>
												</label>
												</li>
		                              		</ul>
		                            	</div>
		                          	</div> <?php
		                        }
		                    } ?>
		                
		                <!-- Glass Sqft / Standard Door Section Ends -->

		                <!-- Glass Thickness / Door Height Section -->
			            <?php if($glass_thickness){ ?>
			                <div id="attribute-option-2" class="field-_attribute_tag attribute-glass_thickness build-showerdoor atribut-pull_h dependence">
			                    <div class="col-xs-12">
			                        <h1>Please Choose Your Glass Thickness </h1><div style="font-size:14px; font-style:italic; padding-bottom:15px; color:#333333 !important">Depending on your glass choice, ½" glass may not be available.</div>
			                      
			                        <ul class="bundle-tild-sect">
			                        	<?php
			                          	foreach ($glass_thickness as $key => $value) {
			                             	$src = str_replace("/","", strtolower( trim( preg_replace('/\s+/', '', $value ), '.') ) );

			                            	$glass_thickness_html .= '<li class="glass-thickness">
			                                <label>
			                                   <a data-re_keyname="glass_thickness" data-show_keyname="Glass Thickness" title="'.$value.'" data-me_nextrel="attribute-option-3" data-re_dependence="glass_type"  data-rel="attribute-option-3" dat-cur-rel="attribute-option-2" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" />
			                                   </a>
			                                  <a class="btn-v-tild" data-re_keyname="glass_thickness" data-show_keyname="Glass Thickness" title="'.$value.'" data-me_nextrel="attribute-option-3" data-re_dependence="glass_type"  data-rel="attribute-option-3" dat-cur-rel="attribute-option-2" rel="'.$value.'">
			                                   <span class="post-title-sect coName">'.$value.'</span></a>
			                                </label></li>';
			                          	}
										$glass_thickness_html .= '<div class=" col-md-12 glass-thckness-dfi">
											
											
											</div>';               
										echo $glass_thickness_html; ?>  
			                    	</ul>
			                 	</div>
			              	</div><?php
			            }
		                elseif($standard_door_height){
		                  	echo '<div id="attribute-option-2" class="field-_attribute_tag attribute-std_dr_height build-showerdoor atribut-pull_h dependence">
		                     <div class="col-xs-12">';
		                  	$standard_door_height_html = '';
		                  	foreach ($standard_door_height as $key => $value) {

		                    	$valuee = str_replace('-', '"', $value);
		                    	$src = str_replace("/","", strtolower( trim( preg_replace('/\s+/', '', $valuee ), '.') ) );

		                    	$standard_door_height_html .= '<li class="glass-type">
		                        <label>
		                           <a data-re_keyname="standard_door_height" data-show_keyname="Door Height" title="'.$valuee.'" data-rel="attribute-option-4" dat-cur-rel="attribute-option-2" rel="'.$valuee.'">'.$valuee.'<img src="'.get_template_directory_uri().'/images/no_selection.gif" />
		                           </a>
		                          <a class="btn-v-tild" data-re_keyname="standard_door_height" data-show_keyname="Door Height" title="'.$valuee.'" data-rel="attribute-option-4" dat-cur-rel="attribute-option-2" rel="'.$valuee.'">
		                           <span class="post-title-sect coName">'.$valuee.'</span></a>
		                        </label></li>';
		                  	}
		                  	echo $standard_door_height_html.'</div></div>';
		                } ?>
		                <!-- Glass Thickness / Door Height Section Ends -->

		                <!-- Glass type Section -->
		                <div id="attribute-option-3" class="field-_attribute_tag attribute-glass_type build-showerdoor atribut-gls_h">
		                    <div class="col-xs-12">
	     <h1 >Select Your Glass Type </h1>
				<div style="font-size:14px; font-style:italic; padding-bottom:15px; color:#333333 !important">Note: Clear Glass is the most commonly used and least expensive glass.Clear Low-Iron Glass, Colored Glass, or any Textured or Obscured Glass are more expensive than traditional clear glass. Rain, Bubbles, Aquaview and Crepe only come in 3/8" thickness.</div>				
		                        <ul class="bundle-tild-sect">
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
		                                <label>
		                                   <a data-re_keyname="glass_type" data-show_keyname="Glass Type" rel="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" title="'.$value.'" data-rel="attribute-option-4" dat-cur-rel="attribute-option-3" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" />
		                                   </a>
		                                   <a class="btn-v-tild" data-re_keyname="glass_type" data-show_keyname="Glass Type" rel="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" title="'.$value.'" data-rel="attribute-option-4" dat-cur-rel="attribute-option-3" rel="'.$value.'"><span class="post-title-sect coName">'.$value.'</span></a>
		                                </label></li>';

		                          	}
			                        echo $glass_type_html; 
			                        ?>
		                       	</ul> 
		                    </div>
		                 </div>
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
		                <div id="attribute-option-4" class="field-_attribute_tag <?php echo $ajax_class; ?> build-showerdoor atribut-gls_h dependence" data-re_attr="<?php echo $re_attr; ?>">
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
		                        	echo '<ul class="bundle-tild-sect"><h2>Standard Finishes</h2> <hr />';
		                            foreach ($standard_hf_order as $key => $value) {
		                                $src = strtolower( trim( preg_replace('/\s+/', '', $value ), '.') ); 

		                             	if($hinge_style){
											echo '<li class="glass-type">
											<label>
											<a data-re_keyname="hardware_finish" data-show_keyname="Hardware Finish" rel="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" title="'.$value.'" data-rel="attribute-option-5" dat-cur-rel="attribute-option-4" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" />
											</a>
											<a class="btn-v-tild" data-re_keyname="hardware_finish" data-show_keyname="Hardware Finish" rel="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" title="'.$value.'" data-rel="attribute-option-5" dat-cur-rel="attribute-option-4" rel="'.$value.'"><span class="post-title-sect coName">'.$value.'</span></a>
											</label></li>';
		                            	}
		                                else{
		                                  	if($check_towelbar == 'on'){
			                                   echo  '<li class="glass-type">
			                                      <label>
			                                         <a data-re_keyname="hardware_finish" data-show_keyname="Hardware Finish" rel="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" title="'.$value.'" data-rel="attribute-option-13a" dat-cur-rel="attribute-option-4" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" />
			                                         </a>
			                                          <a class="btn-v-tild" data-re_keyname="hardware_finish" data-show_keyname="Hardware Finish" rel="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" title="'.$value.'" data-rel="attribute-option-13a" dat-cur-rel="attribute-option-4" rel="'.$value.'"><span class="post-title-sect coName">'.$value.'</span></a>
			                                      </label></li>';
		                                	}else{
			                                   echo '<li class="glass-type">
			                                      <label>
			                                         <a data-re_keyname="hardware_finish" data-show_keyname="Hardware Finish" rel="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" title="'.$value.'" data-rel="attribute-option-13e" dat-cur-rel="attribute-option-4" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" />
			                                         </a>
			                                          <a class="btn-v-tild" data-re_keyname="hardware_finish" data-show_keyname="Hardware Finish" rel="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" title="'.$value.'" data-rel="attribute-option-13e" dat-cur-rel="attribute-option-4" rel="'.$value.'"> <span class="post-title-sect coName">'.$value.'</span></a>
			                                      </label></li>';
		                                	}
		                                }
		                        	}
		                        	echo '</ul><div class="clear"></div>';
		                        }	

		                        if($specialty_hf_order){
		                        	echo '<ul class="bundle-tild-sect">';
		                        	echo '<h2 class="hf_specialty">Specialty Finishes</h2> <hr />';
		                            foreach ($specialty_hf_order as $key => $value) {
		                                $src = strtolower( trim( preg_replace('/\s+/', '', $value ), '.') ); 

		                             	if($hinge_style){
											echo '<li class="glass-type">
											<label>
											<a data-re_keyname="hardware_finish" data-show_keyname="Hardware Finish" rel="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" title="'.$value.'" data-rel="attribute-option-5" dat-cur-rel="attribute-option-4" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" />
											</a>
											<a class="btn-v-tild" data-re_keyname="hardware_finish" data-show_keyname="Hardware Finish" rel="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" title="'.$value.'" data-rel="attribute-option-5" dat-cur-rel="attribute-option-4" rel="'.$value.'"><span class="post-title-sect coName">'.$value.'</span></a>
											</label></li>';
		                            	}
		                                else{
		                                  	if($check_towelbar == 'on'){
			                                    echo '<li class="glass-type">
			                                      <label>
			                                         <a data-re_keyname="hardware_finish" data-show_keyname="Hardware Finish" rel="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" title="'.$value.'" data-rel="attribute-option-13a" dat-cur-rel="attribute-option-4" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" />
			                                         </a>
			                                          <a class="btn-v-tild" data-re_keyname="hardware_finish" data-show_keyname="Hardware Finish" rel="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" title="'.$value.'" data-rel="attribute-option-13a" dat-cur-rel="attribute-option-4" rel="'.$value.'"><span class="post-title-sect coName">'.$value.'</span></a>
			                                      </label></li>';
		                                	}else{
			                                   echo '<li class="glass-type">
			                                      <label>
			                                         <a data-re_keyname="hardware_finish" data-show_keyname="Hardware Finish" rel="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" title="'.$value.'" data-rel="attribute-option-13e" dat-cur-rel="attribute-option-4" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" />
			                                         </a>
			                                          <a class="btn-v-tild" data-re_keyname="hardware_finish" data-show_keyname="Hardware Finish" rel="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" title="'.$value.'" data-rel="attribute-option-13e" dat-cur-rel="attribute-option-4" rel="'.$value.'"> <span class="post-title-sect coName">'.$value.'</span></a>
			                                      </label></li>';
		                                	}
		                                }
		                        	}
		                        	echo '</ul>';
		                        }
		                        	 ?>
		                      	
		                    </div>
		                </div>
		                 <!-- Hardware Finish Section Ends -->

		                 <!-- Hinge Style Section -->
		                <?php if($hinge_style){ ?>
		                  	<div id="attribute-option-5" class="field-_attribute_tag attribute-glass_hingestyle build-showerdoor atribut-gls_h" data-re_attr="hinge">
		                     	<div class="col-xs-12">
			                        <h1>What Style of Hardware Do You Prefer? </h1><div style="font-size:14px; font-style:italic; padding-bottom:15px; color:#333333 !important">Note: Header enclosures only come with a square header and hinges</div>
			                        
			                        <ul class="bundle-tild-sect">
		                            <?php
			                            if($hinge_style){
			                                foreach ($hinge_style as $key => $value) {
			                                    $src = strtolower( trim( preg_replace('/\s+/', '', $value ), '.') ); 
			                                    if($check_pull == 'on'){
			                                       $hinge_style_html .= '<li class="glass-type" style="display:none;">
			                                          <label>
			                                             <a data-re_keyname="hinge_style" data-show_keyname="Style" title="'.$value.'" data-rel="attribute-option-6" dat-cur-rel="attribute-option-5" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" />
			                                             </a>
			                                             <a class="btn-v-tild" data-re_keyname="hinge_style" data-show_keyname="Style" title="'.$value.'" data-rel="attribute-option-6" dat-cur-rel="attribute-option-5" rel="'.$value.'"><span class="post-title-sect coName">'.$value.'</span></a>
			                                          </label></li>';
			                                    }
			                                    else{
			                                        if($check_towelbar == 'on'){
														$hinge_style_html .= '<li class="glass-type" style="display:none;">
														<label>
														 <a data-re_keyname="hinge_style" data-show_keyname="Style" title="'.$value.'" data-rel="attribute-option-13a" dat-cur-rel="attribute-option-5" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" />
														 </a>
														<a class="btn-v-tild" data-re_keyname="hinge_style" data-show_keyname="Style" title="'.$value.'" data-rel="attribute-option-13a" dat-cur-rel="attribute-option-5" rel="'.$value.'"> <span class="post-title-sect coName">'.$value.'</span></a>
														</label></li>';
			                                        }
			                                        else{
														$hinge_style_html .= '<li class="glass-type" style="display:none;">
														<label>
														<a data-re_keyname="hinge_style" data-show_keyname="Style" title="'.$value.'" data-rel="attribute-option-13e" dat-cur-rel="attribute-option-5" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" />
														</a>
														<a class="btn-v-tild" data-re_keyname="hinge_style" data-show_keyname="Style" title="'.$value.'" data-rel="attribute-option-13e" dat-cur-rel="attribute-option-5" rel="'.$value.'"> <span class="post-title-sect coName">'.$value.'</span></a>
														</label></li>';
			                                        }    
			                                    }
			                                }
			                            echo $hinge_style_html; 
			                           	}
		                           	?>
		                        	</ul>
		                     	</div>
		                     	<div class="col-xs-12">
		                        	<div class="measurements-text">
	                           		  <img src="<?php  bloginfo('template_url'); ?>/images/Specs-2.jpg" class="img-big">
		                        	</div>
		                    	</div> 
		                  	</div> 
		                <?php } ?>
		                 <!-- Hinge Style Section Ends -->

		  				<?php if($check_pull == 'on'){ ?>
			                <!-- Pull Section -->
			                <div id="attribute-option-6" data-spec-id="attribute-option-6" class="field-_attribute_tag attribute-glass_pulltype build-showerdoor atribut-pull_h">
			                    <div class="col-xs-12">
			                       <h1>How Would You Like to Open Your Door?</h1>
			                     
			                       <ul class="bundle-tild-sect"> 
										<li class="pull-type">
											<label>
												<a data-rel-last="attribute-option-6" data-re_keyname="pull" data-show_keyname="Pull" title="" data-rel="attribute-option-7" dat-cur-rel="attribute-option-6" rel="" data-re_attr="knob"><img src="<?php echo get_template_directory_uri(); ?>/images/bundled/knob.png" id="knob-attribute-style"/>Knob
												</a>
												<a class="btn-v-tild" id="knob-attribute-style_a" class="btn-v-tild" data-rel-last="attribute-option-6" data-re_keyname="pull" data-show_keyname="Pull" title="" data-rel="attribute-option-7" dat-cur-rel="attribute-option-6" rel="" data-re_attr="knob">
												  	<span class="post-title-sect coName">Knob</span>
												</a>
											</label>
										</li>
										<li class="pull-type">
										 	<label>
										    	<a data-rel-last="attribute-option-6" data-re_keyname="pull" data-show_keyname="Pull" title="" data-rel="attribute-option-8" dat-cur-rel="attribute-option-6" rel=""><img src="<?php echo get_template_directory_uri(); ?>/images/bundled/handle.png" id="handle-attribute-style"/>Handle
										    	</a>
										    	<a class="btn-v-tild" data-rel-last="attribute-option-6" data-re_keyname="pull" data-show_keyname="Pull" title="" data-rel="attribute-option-8" dat-cur-rel="attribute-option-6" rel="">
										      		<span class="post-title-sect coName">Handle</span>
										    	</a>
										 	</label>
										</li>
										<li class="pull-type">
										 	<label>
										    	<a data-rel-last="attribute-option-6" data-re_keyname="pull" data-show_keyname="Pull" title="" data-rel="attribute-option-10" dat-cur-rel="attribute-option-6" rel=""><img src="<?php echo get_template_directory_uri(); ?>/images/bundled/towelbarcombo.png" id="towelbar-attribute-style" />Towel Bar
										   		</a>
										    	<a class="btn-v-tild" data-rel-last="attribute-option-6" data-re_keyname="pull" data-show_keyname="Pull" title="" data-rel="attribute-option-10" dat-cur-rel="attribute-option-6" rel="">
										    		<span class="post-title-sect coName">Towel Bar</span>
										    	</a>
										 	</label>
										</li>
		                          </ul>
			                    </div>
			                </div> 
			                 <!-- Pull Section Ends -->
						<?php } ?>

		                <!-- Pull Section knob -->
		                <div id="attribute-option-7" data-spec-id="attribute-option-6" class="atribut-pull_style field-_attribute_tag attribute-knob_style build-showerdoor atribut-pull_h knob_style" data-re_attr="knob">
		                    <div class="col-xs-12">
		                       <h1>Choose Your Knob Style</h1> <div style="font-size:14px; font-style:italic; padding-bottom:15px; color:#333333 !important">Some finishes displayed below may not appear to be the exact color you've chosen, rest assured all of your hardware and pull type will match the selected finish.</div>
		                       
		                       <ul class="bundle-tild-sect">
		                          	<?php
		                            foreach ($knob_style as $key => $value) {
		                              	$src = strtolower( trim( preg_replace('/\s+/', '', $value ), '.') ); 
		                              	if($check_towelbar == 'on'){
			                                $knob_style_html .= '<li class="knob_style" style="display:none;">
			                                <label>
			                                  <a data-re_keyname="knob_style" data-show_keyname="Knob Style" title="'.$value.'" data-rel="attribute-option-13a" dat-cur-rel="attribute-option-7" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" />
			                                  </a>
			                                  <a class="btn-v-tild" data-re_keyname="knob_style" data-show_keyname="Knob Style" title="'.$value.'" data-rel="attribute-option-13a" dat-cur-rel="attribute-option-7" rel="'.$value.'">
			                                    <span class="post-title-sect coName">'.$value.'</span>
			                                  </a>
			                                </label></li>';
		                              	}
		                              	else{
			                                $knob_style_html .= '<li class="knob_style" style="display:none;">
			                                <label>
			                                  <a data-re_keyname="knob_style" data-show_keyname="Knob Style" title="'.$value.'" data-rel="attribute-option-13e" dat-cur-rel="attribute-option-7" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" />
			                                  </a>
			                                  <a class="btn-v-tild" data-re_keyname="knob_style" data-show_keyname="Knob Style" title="'.$value.'" data-rel="attribute-option-13e" dat-cur-rel="attribute-option-7" rel="'.$value.'">
			                                    <span class="post-title-sect coName">'.$value.'</span>
			                                  </a>
			                                </label></li>';
		                              	}
		                            }
		                            echo $knob_style_html; 
		                            ?>
	                          </ul>
		                    </div>
		                 </div> 
		                 <!-- Pull Section knob Ends -->


		                 <!-- Pull Section Handle Size -->
		                 <div id="attribute-option-8" data-spec-id="attribute-option-6" class="atribut-pull_style field-_attribute_tag attribute-handle_size build-showerdoor atribut-pull_h handle_size">
		                    <div class="col-xs-12">
								<h1>Choose Your Handle Size</h1>
								
								<ul class="bundle-tild-sect">
		                        <?php
		                        foreach ($handle_size as $key => $value) {
		                            $src = strtolower( trim( preg_replace('/\s+/', '', $value ), '.') ); 

		                            $handle_size_html .= '<li class="handle_size">
		                            <label>
		                               <a data-re_keyname="handle_size" data-show_keyname="Handle Style" title="'.$value.'" data-rel="attribute-option-9" dat-cur-rel="attribute-option-8" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" />
		                               </a>
		                               <a class="btn-v-tild" data-re_keyname="handle_size" data-show_keyname="Handle Style" title="'.$value.'" data-rel="attribute-option-9" dat-cur-rel="attribute-option-8" rel="'.$value.'">
		                                <span class="post-title-sect coName">'.$value.'</span>
		                               </a>
		                            </label></li>';
		                        }
		                       	echo $handle_size_html; 
		                       	?>
		                      	</ul>
		                    </div>
		                 </div> 
		                 <!-- Pull Section Handle Size -->


		                 <!-- Pull Section Handle Style -->
		                 <div id="attribute-option-9" class="atribut-pull_style field-_attribute_tag attribute-handle_style build-showerdoor atribut-pull_h atribut-gls_h handle_style" data-re_attr="handle">
		                    <div class="col-xs-12">
		                       <h1>Choose Your Handle Style</h1><div style="font-size:14px; font-style:italic; padding-bottom:15px; color:#333333 !important">Some finishes displayed below may not appear to be the exact color you've chosen, rest assured all of your hardware and pull type will match the selected finish.</div>
		                       
		                       <ul class="bundle-tild-sect">
									<?php
									foreach ($handle_style as $key => $value) {
										$src = strtolower( trim( preg_replace('/\s+/', '', $value ), '.') ); 
										if($check_towelbar == 'on'){
									 		$handle_style_html .= '<li class="handle_style" style="display:none;">
										    <label>
										        <a data-re_keyname="handle_style" data-show_keyname="Handle Style" title="'.$value.'" data-rel="attribute-option-13a" dat-cur-rel="attribute-option-9" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" />
										        </a>
										        <a class="btn-v-tild" data-re_keyname="handle_style" data-show_keyname="Handle Style" title="'.$value.'" data-rel="attribute-option-13a" dat-cur-rel="attribute-option-9" rel="'.$value.'">
										          <span class="post-title-sect coName">'.$value.'</span>
										        </a>  
									    	</label></li>';
									  	}
										else{
									  		$handle_style_html .= '<li class="handle_style" style="display:none;">
										    <label>
										        <a data-re_keyname="handle_style" data-show_keyname="Handle Style" title="'.$value.'" data-rel="attribute-option-13e" dat-cur-rel="attribute-option-9" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/'.$src.'.png" />
										        </a>
										        <a class="btn-v-tild" data-re_keyname="handle_style" data-show_keyname="Handle Style" title="'.$value.'" data-rel="attribute-option-13e" dat-cur-rel="attribute-option-9" rel="'.$value.'">
										          <span class="post-title-sect coName">'.$value.'</span>
										        </a>  
										    </label></li>';
									  	}
									}
									echo $handle_style_html; 
									?>
	                          </ul>
		                    </div>
		                 </div> 
		                 <!-- Pull Section last Style -->

		                 <!-- Pull Section Handle Towelbar HandleSize -->
		                 <div id="attribute-option-10" data-spec-id="attribute-option-6" class="atribut-pull_style attribute-towelbar_size build-showerdoor atribut-pull_h atribut-gls_h towelbar_size">
		                    <div class="col-xs-12">
		                       <h3 class="underline-tild-sect"> Combo Handle Size</h3>
		                       <ul class="bundle-tild-sect">
		                            <?php
		                            $combo_handle_size_html = '';
		                            foreach ($combo_handle_size as $key => $value) {
		                               $src = strtolower( trim( preg_replace('/\s+/', '', $value ), '.') ); 

		                               $combo_handle_size_html .= '<li class="combo_handle_size">
		                                  <label>
		                                    <a data-re_keyname="combo_handle_size" data-show_keyname="Combo Handle Size" title="'.$value.'" data-rel="attribute-option-11" dat-cur-rel="attribute-option-10" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/towel-'.$src.'.png" />
		                                    </a>
		                                    <a class="btn-v-tild" data-re_keyname="combo_handle_size" data-show_keyname="Combo Handle Size" title="'.$value.'" data-rel="attribute-option-11" dat-cur-rel="attribute-option-10" rel="'.$value.'">
		                                      <span class="post-title-sect coName">'.$value.'</span>
		                                    </a>
		                                  </label></li>';
		                            }
		                            echo $combo_handle_size_html;
		                            ?>
	                          </ul>
		                    </div>
		                </div> 
		                 <!-- Pull Section Handle Towelbar HandleSize -->

		                 <!-- Pull Section Handle Towelbar TowelbarSize -->
		                 <div id="attribute-option-11" class="atribut-pull_style field-_attribute_tag attribute-towelbar_size build-showerdoor atribut-pull_h atribut-gls_h towelbar_size">
		                    <div class="col-xs-12">
		                       <h3 class="underline-tild-sect"> Combo Towelbar Size </h3>
		                       <ul class="bundle-tild-sect">
		                            <?php
		                            $combo_handle_towelbar_size_html = '';
		                            foreach ($combo_handle_towelbar_size as $key => $value) {
		                               $src = strtolower( trim( preg_replace('/\s+/', '', $value ), '.') ); 
		                               $combo_handle_towelbar_size_html .= '<li class="towelbar_size">
		                                  <label>
		                                    <a data-re_keyname="combo_towelbar_size" data-show_keyname="Combo Towelbar Size" title="'.$value.'" data-rel="attribute-option-12" dat-cur-rel="attribute-option-11" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/towel--'.$src.'.png" />
		                                    </a>
		                                    <a class="btn-v-tild" data-re_keyname="combo_towelbar_size" data-show_keyname="Combo Towelbar Size" title="'.$value.'" data-rel="attribute-option-12" dat-cur-rel="attribute-option-11" rel="'.$value.'">
		                                      <span class="post-title-sect coName">'.$value.'</span>
		                                    </a>
		                                  </label></li>';
		                            }
		                            echo $combo_handle_towelbar_size_html;
		                            ?>
		                       </ul>
		                    </div>
		                </div> 
		                <!-- Pull Section Handle Towelbar TowelbarSize -->


		                <!-- Pull Section Handle Towelbar TowelbarStyle -->
		                <div id="attribute-option-12" class="att-tild-sect atribut-pull_style field-_attribute_tag attribute-towelbar_style build-showerdoor atribut-pull_h atribut-gls_h towelbar_style" data-re_attr="handle-towelbar-combo">
		                    <div class="col-xs-12">
		                       <h1>Choose Your Combo Towelbar Style </h1><div style="font-size:14px; font-style:italic; padding-bottom:15px; color:#333333 !important">Some finishes displayed below may not appear to be the exact color you've chosen, rest assured all of your hardware and pull type will match the selected finish.</div>
		                 
		                        <ul class="bundle-tild-sect">
		                        	<?php
		                            foreach ($combo_habdle_towelbar_style as $key => $value) {
		                             	$src = strtolower( trim( preg_replace('/\s+/', '', $value ), '.') ); 
		                                if($check_towelbar == 'on'){
		                                  $combo_habdle_towelbar_style_html .= '<li class="glass-type" style="display:none;">
		                                    <label>
		                                        <a data-re_keyname="combo_style" data-show_keyname="Combo Style" title="'.$value.'" data-rel="attribute-option-13a" dat-cur-rel="attribute-option-12" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/towel-'.$src.'.png" />
		                                        </a>
		                                        <a class="btn-v-tild" data-re_keyname="combo_style" data-show_keyname="Combo Style" title="'.$value.'" data-rel="attribute-option-13a" dat-cur-rel="attribute-option-12" rel="'.$value.'">
		                                          <span class="post-title-sect coName">'.$value.'</span>
		                                        </a>
		                                    </label></li>';
		                                }
		                                else{
		                                  $combo_habdle_towelbar_style_html .= '<li class="glass-type" style="display:none;">
											<label>
											    <a data-re_keyname="combo_style" data-show_keyname="Combo Style" title="'.$value.'" data-rel="attribute-option-13e" dat-cur-rel="attribute-option-12" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/towel-'.$src.'.png" />
											    </a>
											    <a class="btn-v-tild" data-re_keyname="combo_style" data-show_keyname="Combo Style" title="'.$value.'" data-rel="attribute-option-13e" dat-cur-rel="attribute-option-12" rel="'.$value.'">
											    <span class="post-title-sect coName">'.$value.'</span>
											    </a>
											</label></li>';
		                                }
		                            }
		                          	echo $combo_habdle_towelbar_style_html; 
		                          	?>
		                        </ul>
		                    </div>
		                </div> 
		                 <!-- Pull Section Handle Towelbar TowelbarStyle -->


		                <!-- If Towelbar Enabled  -->
		                <?php if($check_towelbar == 'on'){ ?>

		                    <div id="attribute-option-13a" class="attribute-glass_installation build-showerdoor show-attribute-combo field-_attribute_tag atribut-pull_h atribut-gls_h">
		                       	<div class="col-xs-12">
		                         	<ul class="bundle-tild-sect">
										<li class="">
											<label>
										    	<a title="No" data-re_keyname="no_comboo" data-show_keyname="Towel Bar" title="No" data-rel="attribute-option-13e" dat-cur-rel="attribute-option-13a">
										        	<img alt="No" src="<?php echo get_template_directory_uri(); ?>/images/no.png" style="height: 320px;">No
										    	</a>
										    	<a class="btn-v-tild" title="No" data-re_keyname="no_comboo" data-show_keyname="Towel Bar" title="No" data-rel="attribute-option-13e" dat-cur-rel="attribute-option-13a">
										        	<span class="post-title-sect coName">No</span>
										     	</a>
										  	</label>
										</li> 
										<li class="active">
										 	<label>
										    	<a class="yes_towelbar_attr" title="Yes" data-re_keyname="no_comboo" data-show_keyname="Towel Bar" title="Yes" data-rel="attribute-option-13b" dat-cur-rel="attribute-option-13a">
										        	<img alt="Yes" src="<?php echo get_template_directory_uri(); ?>/images/yes.png" style="height: 320px;">Yes
										     	</a>
										    	<a class="yes_towelbar_attr btn-v-tild" title="Yes" data-re_keyname="no_comboo" data-show_keyname="Towel Bar" title="Yes" data-rel="attribute-option-13b" dat-cur-rel="attribute-option-13a">
										      		<span class="post-title-sect coName">Yes</span>
										    	</a>
										  	</label>
										</li>          
		                            	<div class="clear"></div>
		                          	</ul>
		                       	</div>   
		                    </div>

		                       <!--  Towelbar Size -->
		                      <div id="attribute-option-13b" class="attribute-glass_combo field-_attribute_tag attribute-handle-combo-towelbar_size build-showerdoor atribut-pull_h atribut-gls_h towelbar_size">
		                         <div class="col-xs-12">
		                            <h3 class="underline-tild-sect"> Towelbar Size </h3>
		                            <ul class="bundle-tild-sect">
		                                <?php
		                                if($towelbar_size){
		                                    foreach ($towelbar_size as $key => $value) {
		                                       $src = strtolower( trim( preg_replace('/\s+/', '', $value ), '.') ); 

		                                       $combo_towelbar_size_html .= '<li class="towelbar_size">
		                                          <label>
		                                             <a data-re_keyname="towelbar_size" data-show_keyname="Towel Bar Size" title="'.$value.'" data-rel="attribute-option-13c" dat-cur-rel="attribute-option-13b" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/towel--'.$src.'.png" />
		                                             </a>
		                                             <a class="btn-v-tild" data-re_keyname="towelbar_size" data-show_keyname="Towel Bar Size" title="'.$value.'" data-rel="attribute-option-13c" dat-cur-rel="attribute-option-13b" rel="'.$value.'">
		                                              <span class="post-title-sect coName">'.$value.'</span>
		                                             </a>
		                                          </label></li>';
		                                    }
		                                  echo $combo_towelbar_size_html;
		                                }
		                                  
		                                ?>
		                            </ul>
		                         </div>
		                      </div> 
		                      <!-- Towelbar Size -->

		                       <!-- Towelbar Sides -->
		                    <div id="attribute-option-13c" class="attribute-glass_combo field-_attribute_tag attribute-handle-combo-towelbar_side build-showerdoor atribut-pull_h atribut-gls_h towelbar_side">
		                        <div class="col-xs-12">
		                            <ul class="bundle-tild-sect"><?php
		                                if($towelbar_side){
		                                    foreach ($towelbar_side as $key => $value) {
		                                        $src = strtolower( trim( preg_replace('/\s+/', '', $value ), '.') ); 

		                                        $towelbar_side_html .= '<li class="towelbar_side">
		                                        <label>
		                                        <a data-re_keyname="towelbar_side" data-show_keyname="Sides" title="'.$value.'" data-rel="attribute-option-13d" dat-cur-rel="attribute-option-13c" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/side-'.$src.'.png" />
		                                         </a>
		                                        <a class="btn-v-tild" data-re_keyname="towelbar_side" data-show_keyname="Sides" title="'.$value.'" data-rel="attribute-option-13d" dat-cur-rel="attribute-option-13c" rel="'.$value.'">
		                                          <span class="post-title-sect coName">'.$value.'</span>
		                                        </a>  
		                              	        </label></li>';
		                                    }
		                                    echo $towelbar_side_html;
		                                } ?>
		                            </ul>
		                        </div>
		                    </div> 
		                    <!-- Towelbar Sides -->


		                    <!-- Towelbar Style -->
		                    <div id="attribute-option-13d" class="attribute-glass_combo field-_attribute_tag attribute-handle-combo-towelbar_style build-showerdoor atribut-pull_h atribut-gls_h towelbar_style" data-re_attr="towelbar">
		                      	<div class="col-xs-12">
									<h1>Choose your combo towelbar style </h1><div style="font-size:14px; font-style:italic; padding-bottom:15px; color:#333333 !important">Some finishes displayed below may not appear to be the exact color you've chosen, rest assured all of your hardware and pull type will match the selected finish.</div>
									<ul class="bundle-tild-sect"> <?php
										if($towelbar_style){
											foreach ($towelbar_style as $key => $value) {
												$src = strtolower( trim( preg_replace('/\s+/', '', $value ), '.') ); 

												$combo_towelbar_style_html .= '<li class="glass-type">
												<label>
												<a data-re_keyname="towelbar_style" data-show_keyname="Towelbar Style" title="'.$value.'" data-rel="attribute-option-13e" dat-cur-rel="attribute-option-13d" rel="'.$value.'">'.$value.'<img src="'.get_template_directory_uri().'/images/bundled/htowelbar_style-'.$src.'.png" />
												</a>
												<a class="btn-v-tild" data-re_keyname="towelbar_style" data-show_keyname="Towelbar Style" title="'.$value.'" data-rel="attribute-option-13e" dat-cur-rel="attribute-option-13d" rel="'.$value.'">
												<span class="post-title-sect coName">'.$value.'</span>
												</a>
												</label></li>';
											}
											echo $combo_towelbar_style_html; 
										} ?>
									</ul>
		                        </div>
		                    </div> 
		                   <!--Towelbar Style -->   

		                <?php } ?>              

		                <!-- Installation Kit Section Start -->
		            	<div id="attribute-option-13e" class="build-showerdoor attribute-glass_installation atribut-pull_h atribut-gls_h">
		                	<?php installation_kit(); ?>
		                </div>
						<!-- Installation Kit Section Ends -->

		                <!-- Final section -->
		                <div id="attribute-option-14" data-rel="recap" class="row setup-content_step recap build-showerdoor">
		                    <h1>Thank you for building your Installation Easy™ Shower Door.</h1>
		                    <div class="form-left">
		                        <div class="light-well well text-center">                      
		                          	<div id="starburst">
										<h1><nobr>Thank you for building your shower door today.</nobr>
										<span class="glasssqft-options">  Glass SQFT <small></small></span>
										</h1>
										
											<h2><nobr>Total Material Price: <b>$</b><b id="price_total"></b></nobr></h2>

											<h2 style="margin: 0px;"><nobr><a href="javascript:void(0)" rel="calci-dist" id="calci-dist" class="discount_section_attr">+</a></nobr></h2>

											<div class="calci-dist" style="display: none;">
												<div class="row dist-tild-sec">

													<div class="col-md-12">
														<div class="col-md-6 dist-stayclean-sec">
															<div class="custom-input-group custom-info">
																<input type="number" min="1" max="70" name="additiona_quote1" id="dfi_disocunt_txt" value="" placeholder="StayCLEAN" onkeypress="return event.charCode >= 46 && event.charCode <= 57 && event.charCode != 47 || event.charCode <= 9" />
															</div>
														</div>
														<div class="col-md-6 dist-door-sec">
															<div class="custom-input-group custom-info">
																<input type="number" min="1" max="70" name="Door" id="door_disocunt_txt" value="" placeholder="Door" onkeypress="return event.charCode >= 46 && event.charCode <= 57 && event.charCode != 47 || event.charCode <= 9"  />
															</div>
														</div>
													</div>

													<div class="col-md-12">
														<div class="col-md-12 dist-door-sec">
															<div class="custom-input-group custom-info">
																<a href="javascript:void(0)" class="coName" id="calculate-discount-door">Calculate</a>
															</div>
														</div>
													</div>

												</div>
											</div>

											<div class="calci-dist-door" style="display: none;">
												<div class="row">

													<div class="col-md-12">
														<div class="custom-input-group custom-info">
															<p id="staycln-dis-total" class="hide-tild-sect"> StayClean: <span></span></p>
															
															<p id="appr-disct" class="hide-tild-sect" style="color:red;"> StayClean Discount: <span></span></p>
															
															<p id="final-stayclean-dis" class="hide-tild-sect"> StayClean Total: <span></span></p>

															<p id="no-stayclean-dis" class="hide-tild-sect">DFI option not selected! </p>

														</div>
													</div>

													<div class="col-md-12">
														<div class="custom-input-group custom-info">
															<p id="door-dis-total" class="hide-tild-sect"> Door Price: <span></span></p>
															
															<p id="door-disct" class="hide-tild-sect" style="color:red;"> Door Discount: <span></span></p>
															
															<p id="final-door-dis" class="hide-tild-sect"> Door Total: <span></span></p>

														</div>
													</div>

													<div class="col-md-12" id="discount-total-price">
														<center>Discounted Door price <span></span></center>
													</div>

												</div>
											</div>
											

										

										<table id="discount-til-sect" style="display:none;">

											<tr>
												<td width="100" align="left"><span>Total Price: </span></td>
												<td width="100" align="left"><span class="total_price empty_sect">1200</span></td>
											</tr>

											<tr>
												<td width="100" align="left"><span>Discount: </span></td>
												<td width="520" align="left">
													<span class="discounted_amt empty_sect">200</span>
													<span class="discount_amt_val empty_sect">20</span>
													<span class="discount_description_val empty_sect">Testing</span>
												</td>
											</tr>

											<tr>
												<td width="100" align="left"><span>Final Price: </span></td>
												<td width="100" align="left"><span class="final_price empty_sect">1000</span></td>
											</tr>

										</table>
										
										<div class="install_easy_wrapper">
											
		                                  	<div class="install_form clearfix" id="form_secarea">
		                                      	<div class="install_sec">
		                                          	<div class="formLayout">
		                                           		<form action="<?php echo $form_redirect_url; ?>" method="get">
		                                           		
<input type="hidden" value="<?php echo get_the_ID(); ?>" name="oid">
<input type="hidden" value="Frameless Shower Door - <?php echo get_the_title(); ?>" id="description" name="description">
<input type="hidden" value="" id="i_doortype" name="i_doortype">
<input type="hidden" value="Door Builder" name="lead_source">
<input type="hidden" name="price" id="priceinput" value="">
<input type="hidden" name="sqft" id="sqftinput" value="">
<input type="hidden" name="sqftclean" id="sqftclean" value="">


<input type="hidden" value="0" id="stayclean" name="stayclean" class="staycleaninput">
<input type="hidden" name="userid" value="<?php echo $userid; ?>">

<div class="row">
	<div class="col-md-12">
		<div class="custom-input-group build-showerdoor custom-info">
			<h4 style="color: #333;">Sales Member Information</h4>
		</div>
	</div>	
</div>

<div class="row">
	<div class="col-md-6">
		<div class="custom-input-group custom-info">
			<label>First Name</label>
			<input type="text" name="first_name_sales" id="first_name_sales" placeholder="First Name" value="<?php echo $first_name; ?>" required="required">
		</div>
	</div>
	<div class="col-md-6">
		<div class="custom-input-group custom-info">
			<label>Last Name</label>
			<input type="text" name="last_name_sales" id="last_name_sales" placeholder="Last Name" value="<?php echo $last_name; ?>" required="required">
		</div>
	</div>
</div>



<div class="row">
	<div class="col-md-6">
		<div class="custom-input-group custom-info">
			<label>Email Address</label>
			<input type="text" name="sales_email" id="sales_email" placeholder="Email Address" value="<?php echo $usermail; ?>" required="required">
		</div>
	</div>
	<div class="col-md-6">
		<div class="custom-input-group custom-info">
			<label>Phone Number</label>
			<input type="text" name="phone_number_sales" id="phone_number_sales" placeholder="Phone Number" value="<?php echo $userphone; ?>" required="required">
		</div>
	</div>
</div>


<div class="row">
	<div class="col-md-12">
		<div class="custom-input-group build-showerdoor custom-info">
			<h4 style="color: #333;">Custom Information</h4>
		</div>
	</div>	
</div>


<div class="row">
	<div class="col-md-6">
		<div class="custom-input-group">
			<input type="text" name="first_name" id="first_name" placeholder="First Name" required="required" class="input-filed">
		</div>
	</div>
	<div class="col-md-6">
		<div class="custom-input-group">
			<input type="text" name="last_name" id="last_name" placeholder="Last Name" required="required" class="input-filed">
		</div>
	</div>
</div>


<div class="row">
	<div class="col-md-6">
		<div class="custom-input-group">
			<input type="email" name="email" id="email" placeholder="Email" required="required" class="input-filed">
		</div>
	</div>
	<div class="col-md-6">
		<div class="custom-input-group">
			<input type="text" name="phone" id="phone" placeholder="Phone" required="required" class="input-filed">
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="custom-input-group">
			<select name="state" id="state" required>
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
		</div>
	</div>
	<div class="col-md-6">
		<div class="custom-input-group">
			<input type="text" name="sales_shipping" placeholder="Shipping" id="sales_shipping">
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="custom-input-group">
			<input type="text" name="sales_crating" placeholder="Crating" id="sales_crating">
		</div>
	</div>	
</div>


<div class="row">
	<div class="col-md-6">
		<div class="custom-input-group">
			<textarea wrap="soft" placeholder="Comment" type="text" rows="2" id="message" name="message" class="form-control input input-filed"></textarea>
		</div>
	</div>	
</div>

<div class="row">
	<div class="col-md-12">
		<div class="custom-input-group build-showerdoor custom-info">
			<h4 style="color: #111;">Custom Hardware</h4>
		</div>
	</div>	
</div>

<div class="row">
	<div class="col-md-6">
		<div class="custom-input-group">
			<input type="text" style="background:#cccccc;" name="custom_hardware1_label" placeholder="Label" id="custom_hardware1_label">
		</div>
	</div>
	<div class="col-md-6">
		<div class="custom-input-group">
			<input type="text" name="custom_hardware1_val" placeholder="Price" id="custom_hardware1_val">
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="custom-input-group">
			<input type="text"  style="background:#cccccc;" name="custom_hardware2_label" placeholder="Label" id="custom_hardware2_label">
		</div>
	</div>
	<div class="col-md-6">
		<div class="custom-input-group">
			<input type="text" name="custom_hardware2_val" placeholder="Price" id="custom_hardware2_val">
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="custom-input-group">
			<input type="text"  style="background:#cccccc;" name="custom_hardware3_label" placeholder="Label" id="custom_hardware3_label">
		</div>
	</div>
	<div class="col-md-6">
		<div class="custom-input-group">
			<input type="text" name="custom_hardware3_val" placeholder="Price" id="custom_hardware3_val">
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="custom-input-group">
			<input type="text"  style="background:#cccccc;" name="custom_hardware4_label" placeholder="Label" id="custom_hardware4_label">
		</div>
	</div>
	<div class="col-md-6">
		<div class="custom-input-group">
			<input type="text" name="custom_hardware4_val" placeholder="Price" id="custom_hardware4_val">
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="custom-input-group for_outsidesales custom-info">
			<label for="for_outsidesales">Outside Sales</label>
			<input type="checkbox"  name="for_outsidesales" id="for_outsidesales"/>
		</div>
	</div>	
</div>



<p class="thumbnails measurement_values"></p>
<p class="thumbnails image_picker_selector"></p>
<p class="thumbnails stayclean_discount_attr"></p>
<p class="thumbnails door_discount_attr"></p>

<p class="thumbnails quote_sqft"></p>
<p class="thumbnails quote_glass"></p>
<p class="thumbnails quote_hinge"></p>
<p class="thumbnails quote_knob"></p>
<p class="thumbnails quote_handle"></p>
<p class="thumbnails quote_htc"></p>
<p class="thumbnails quote_towelbar"></p>
<p class="thumbnails quote_standarddoor"></p>
<p class="thumbnails quote_installation"></p>
<p class="thumbnails quote_clamp"></p>
<p class="thumbnails quote_header"></p>
<p class="thumbnails quote_basic"></p>
<p class="thumbnails quote_doorpart"></p>
<p class="thumbnails quote_shelfclamp"></p>
<p class="thumbnails quote_sleevoverclamp"></p>
<p class="thumbnails quote_uchannel"></p>

<p id="quote-return" style="display: none;"></p>

<input type="hidden" value="<?php echo $username; ?>" id="stayclean" name="currentuser">
<input type="hidden" value="<?php echo $mode_type; ?>" id="stayclean" name="mode_type">
<input type="hidden" value="<?php echo $cur_url; ?>" id="cur_url" name="website">


<div class="row">
	<div class="col-md-12">
		<div class="custom-input-group build-showerdoor" style="display:block!important;">
			<a href="javascript:void(0)" id="download_pdf_crm" class="coName" >Download (No CRM)</a>
			<input type="submit" name="contactSubmit" value="Submit" id="bun_submi" class="coName">
		</div>
	</div>	
</div>

															
														</form>
		                                          	</div>  
		                                        </div>
		                                    </div>
		                                    <div class="install_easy">
		                                    	<img src="<?php bloginfo('template_url'); ?>/images/Fragile_Box-logo_13_Final.png">
		                                    </div>
										</div>
									</div>
								</div>
							</div>
						</div>
		                 <!-- Final section Ends -->

		            </div>
		              <!-- Left section Ends -->

		              <!-- Right section -->
		                <div class="col-sm-4 form-right"><?php 
							if(have_posts()) :
								while(have_posts()) : the_post(); ?>
								  	<div <?php post_class('single-post-listing'); ?> id="post_<?php the_ID(); ?>">
										<div class="post-tile clearfix">
											<div class="entry-title">
												<a class="previewTitle" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> <?php the_title(); ?> </a>
											</div>
										</div>

										<div class="entry">
										  <?php 
										      $thumbnail_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full');
										      echo '<img src="'.$thumbnail_image[0].'" alt="second image"/>';
										  ?>
										</div>

										<div class="total_vall">
											<div id="priceItem" class="col-xs-12 recapItem priceItem" style="display: none;">
											    <div class="list-group recap-list">
											        <div class="col-xs-12">
											            <h4 class="list-group-item-heading count title">Your Shower Door Configuration</h4>
											        </div>
											    </div>
											    <div id="door_txt" style="display: none;" data-re_atr="<?php echo $discount_txt; ?>">4</div>
											    <div id="door_description" style="display: none;" data-re_atr="<?php echo $discount_description; ?>">2</div>
											    <div id="door_button_dis" style="display: none;" data-re_atr="<?php echo $hide_discount_opt; ?>">2</div>
											</div>

											<div class="sqft_gls">
												<ul>
													<li><span class="option_head"></span><span class="options_price"></span></li>
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
		                </div>  
		              	<!-- Right section Ends -->
		              
						</div>   
					</div>
				</div>
			</div> 
		</div>
<?php
echo '</div>';
get_footer('builder');
?>