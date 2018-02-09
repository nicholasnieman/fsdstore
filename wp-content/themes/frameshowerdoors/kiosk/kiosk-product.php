<?php

	get_header('kioskproduct');
	
	if( isset($_GET['FDLocation']) && $_SERVER["REQUEST_METHOD"] == "GET" ){
		$FDLocation_name =  $_REQUEST["FDLocation"];
		$discount_kiosk	=	$_REQUEST['56_temp'];
	}else{
		$FDLocation_name = 'null';
		$discount_kiosk	=	$_REQUEST['56_temp'];
	}
	//echo $FDLocation_name.' :test'
?>	

<script type="text/javascript">
	jQuery(document).ready(function(){
		(function($){

			jQuery('.custom_left_tab_menu a').hover(function(event){
				event.preventDefault();
		        jQuery('#selected-layout').empty();
		        var text_html = jQuery(this).text();
		        jQuery('#selected-layout').html('<strong>Door Style: </strong> '+text_html);
		 	});
			
			jQuery('.custom_left_tab_menu a').html(function(index, content) {
				var wordsToBold=["Single Shower","Hydroslide","Sebastian","Cottage","Inline","90 Degree","Neo Angle","Steam","Fixed", "Olexis"];
			    return content.replace(new RegExp('(\\b)(' + wordsToBold.join('|') + ')(\\b)','ig'), '$1<b>$2</b>$3');
			});

			jQuery('.door-title').html(function(index, content) {
				var wordsToBold=["Single","Hydroslide","Sebastian","Cottage","Inline","90 Degree","Neo Angle","Steam","Splash Guard", "Olexis"];
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

	    })(jQuery);
});
	   
</script>


<script>
	var mndFileds=new Array('Last Name');
	var fldLangVal=new Array('Last Name');
	var name='';
	var email='';

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
	   
</script>

	<script>
		$(function(){

			$('#crmWebToEntityForm #steam-firstname, #crmWebToEntityForm #steam-lastname, #crmWebToEntityForm #steam-phonenum, #crmWebToEntityForm #steam-email, #crmWebToEntityForm #steam-message').keyboard({
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
	
    	
	});
	</script>

<?php
	$return_string ='<div id="crmWebToEntityForm" style="width:600px;margin:auto;>
	   <META HTTP-EQUIV ="content-type" CONTENT="text/html;charset=UTF-8">
	   <div style="width:100%; text-align:center; font-size:16px; margin-top:-25px; margin-bottom: 15px; font-weight:bold; line-height:24px; color:#ffffff;">Fill out the form below and a design technician will contact you to discuss your custom shower design. </div>
	   <form action="https://crm.zoho.com/crm/WebToLeadForm" name=WebToLeads1429722000010903457 method="POST" onSubmit="javascript:document.charset="UTF-8"; return checkMandatory()" accept-charset="UTF-8">

	   <!-- Do not remove this code. -->
	  <input type="text" style="display:none;" name="xnQsjsdp" value="f6675da4f5b64b7c54aeb859879a87ea594e8fefd20d5f521a0288b1f64c3ca9"/>
	  <input type="hidden" name="zc_gad" id="zc_gad" value=""/>
	  <input type="text" style="display:none;" name="xmIwtLD" value="9d3bc3a95b188bcc05de1fdd4794542a5819e590deb5fc3617c0605ff63d5e5b"/>
	  <input type="text" style="display:none;"  name="actionType" value="TGVhZHM="/>

	  <input type="text" style="display:none;" name="returnURL" value="https&#x3a;&#x2f;&#x2f;www.framelessshowerdoors.com&#x2f;main-thank-yo/?FDLocation='.$FDLocation_name.'&56_temp='.$discount_kiosk.'" />
		
		 <!-- Do not remove this code. -->
		<div class="row" class="kiosk-steam"> 
				<div class="col-md-12">
					<label>First Name</label>
					<input type="text" style="width:250px;" id="steam-firstname" class="form-control" placeholder="First Name"  maxlength="40" name="First Name" required="required"/>
				</div> 
			</div>
			<div class="row" class="kiosk-steam"> 
				<div class="col-md-12">
					<label>Last Name</label> 
					<input type="text" style="width:250px;" id="steam-lastname" class="form-control" placeholder="Last Name"  maxlength="80" name="Last Name" required="required"/>
				</div> 
			</div>
			<div class="row" class="kiosk-steam"> 
				<div class="col-md-12"> 
					<label>Phone</label>
					<input type="text" style="width:250px;" id="steam-phonenum" class="form-control"  maxlength="30" name="Phone" placeholder="Phone Number" required="required" />
				</div> 
			</div>
			
<div class="row" class="kiosk-steam"> 
				<div class="col-md-12"> 
					<label>Email Address</label>
					<input type="email" style="width:250px;" id="steam-email" class="form-control" placeholder="Email Address" maxlength="100" name="Email" required="required" />
				</div> 
			</div>
			<div class="row"> 
				<div class="col-md-12">
					<label>Message</label> 
					<input type="text" style="width:250px;" id="steam-message" class="form-control"  maxlength="255" name="LEADCF1" placeholder="Message" required="required" />
				</div> 
			</div>

			

			<div class="row" style="display:none;" class="kiosk-steam"> 
				<div class="col-md-12"> 
					<label>F&DLocation</label>
					<input type="text" style="width:250px;" id="steam-locationm" class="form-control"  maxlength="250" name="LEADCF12" value="'.$FDLocation_name.'" required="required">
				</div> 
			</div>
			
			<div class="row" style="display:none;" class="kiosk-steam"> 
				<div class="col-md-12"> 
					<select name="LEADCF6">
						<option selected value="Custom&#x20;Steam">Custom Steam</option>
					</select>
				</div> 
			</div>

			<div class="row" class="kiosk-steam"> 
				<div class="col-md-12"> 
					
					    <input type="reset" style="font-size:12px;color:#131307" value="Reset" /><input style="font-size:12px;color:#131307" type="submit" value="Submit" />
				</div> 
			</div>
			
			<input type="hidden" name="LEADCF43" value="'.$_SERVER['REMOTE_ADDR'].'">

		</form>
	  <!-- Do not remove this code. -->
	     <iframe name="captchaFrame" style="display:none;"></iframe>
	</div>';
	$return_string="<iframe style='width:100%;height:560px;border-width:0px;' src='https://crm.zoho.com/crm/WebFormServeServlet?rid=9d3bc3a95b188bcc05de1fdd4794542a194834cb6b00a4f05671b24c8825670fgidf6675da4f5b64b7c54aeb859879a87ea594e8fefd20d5f521a0288b1f64c3ca9'></iframe>";

	$return_string = "<iframe style='width:100%;height:560px;border-width:0px;' src='".get_template_directory_uri()."/includes/kiosk_steam_form.php?FDLocation=".$FDLocation_name."&56_temp=".$discount_kiosk."'></iframe>";

	?>



<!-- #Container Area -->
<div class="selectionbk">			

		<div class="twoColbg">
			<div class="">
			   <div class="doorbuilder">

			   		
	   				<div class="get_started clearfix builder-layout" style="border-bottom:none !important;  border-bottom-color: #ffffff !important;">
	   					<div class="custom_left_tab_menu">
	   						<ul class="door_type_menu" >
								<li style="padding-left: 15px;
height: 50px;
padding-top: 13px;
background: #ffaf14;
color: #000000;
font-size:15px; 
font-weight: bold;">SELECT DOOR TYPE BELOW <i class="fa fa-arrow-down" aria-hidden="true"></i>

</li>
		   				  	<?php 
		   						$category= get_queried_object();
		   						$cat_id = $category->term_id; 
		   						$wcatTerms = get_terms('product_cat',
		   							array(
		   								'hide_empty' => false,
		   								'orderby' => 'ID',
										'order' => 'ASC',
		   								'parent' => 0,
		   								'include'	 => array(66, 99, 102, 92, 100, 101, 320, 333, 323, 326)
		   							)
		   						);
		   						foreach($wcatTerms as $wcatTerm){
		   							$t_id = $wcatTerm->term_id;
		   							$bundled_product_category = get_field('kiosk_image', 'product_cat_'.$t_id);
$thumbnail_id = get_woocommerce_term_meta( $wcatTerm->term_id, 'thumbnail_id', true );
	   			  			$image = wp_get_attachment_url( $thumbnail_id );
		   							echo '<li><a rel="'.$wcatTerm->slug.'" class="list-group-item text-center" href="javascript:void(0)"><div class="title">'.$wcatTerm->name.'</div></a></li>';
		   						}
		   					?>
		   					</ul></div><div class="get-started-tab-menu" style="height:1694px; background:#fff;" >
                       
                           
	   		  			</div>
	   			  		<div class="custom_right_tab_content"><?php  
	   			  			foreach($wcatTerms as $wcatTerm){ 
	   			  				$args = array(
										'post_type' => 'product',
										'post_status' => 'publish',
										'posts_per_page' => -1,
										'tax_query' => array(array('taxonomy' => 'product_cat', 'field' => 'id', 'terms' => $wcatTerm->term_id, ) )
	   							);
	   							$count = 0;
	   							$the_queryy = new WP_Query( $args );
	   							if ( $the_queryy->have_posts() ) {
	   								while ( $the_queryy->have_posts() ) {
	   									$the_queryy->the_post(); 
	   									$count++;
	   								}
	   					
	   							} 
	   							wp_reset_postdata(); 		
	   			  			$wsubargs = array(
	   			  				'hierarchical' => 1,
	   			  				'show_option_none' => '',
	   			  				'hide_empty' => false,
	   			  				'parent' => $wcatTerm->term_id,
	   			  				'taxonomy' => 'product_cat',
	   			  				'order' => 'DESC'	   			  				
	   			  			);
	   			  			$wsubcats = get_categories($wsubargs);
	   			  			$t_id = $wcatTerm->term_id;
	   			  			$variable = get_field('kiosk_image', 'product_cat_'.$t_id);
							$variable2 = get_field('kiosk_thumbnail', 'product_cat_'.$t_id);
	   			  			$bundled_product_category = get_field('kiosk_image', 'product_cat_'.$t_id);
	   			  			$thumbnail_id = get_woocommerce_term_meta( $wcatTerm->term_id, 'thumbnail_id', true );
	   			  			$image = wp_get_attachment_url( $thumbnail_id );

	   			  			if($count==0){
	  							$img_html = '<a id="steam_cont-btn" data-re_cat="'.$wcatTerm->term_id.'-layout" href="https://www.framelessshowerdoors.com" class=" btn dark-btn custom_orange_btn  btn-v4 fullwidth inline align-center">Contact Us </a>';
	  						}
							else{
								$img_html = '<a data-re_cat="'.$wcatTerm->term_id.'-layout" href="javascript:void(0)" class="doorreturn btn custom_orange_btn  btn-v4 fullwidth inline align-center">View All '.$count.' Layouts</a>';
							}

	   			  				echo '
								
								<div class="tab-content clearfix" id="'.$wcatTerm->slug.'" >
<div class="doordescription"><img src='.$variable2['url'].' /><div class="doordescriptiontxt">
<b style="color:#333333; text-transform:uppercase">'.$wcatTerm->name.'</b><br />'.$wcatTerm->description.'</div></div>
<div class="showshower">
		   			  				
									<div class="sectionbackground">&nbsp;</div>
									<div class="section_text"> <h2>'.$wcatTerm->name.'</h2>
		   								'.$img_html.'</div>
										
		   			  				
									
		   								<div class="custom_renderContainer" style="background:url('.$variable['url'].') no-repeat; background-size:cover;background-position:top right">&nbsp;
		   									
		   								</div>
	   								</div>

	   								
	   							</div>';
	   			  			} ?>
	   			  		</div>
	   			  	</div>
					<?php 

					
						/*Archive*/
						
						echo '<div class="col-md-12 page-content doorWidget animated_glass doorbuilder" >
						
						 
					
						<div id="layout-listing" >';


						echo '<h4 class="get_template-sect" style="display:none;">Select your Installation<strong>Easy</strong>&#8482; design</h4>';
							foreach($wcatTerms as $wcatTerm){
								$args = array(
									'post_type' => 'product',
									'post_status' => 'publish',
									'posts_per_page' => -1,
									//'orderby' => 'term_order',
									//'order' => 'ASC',
									'tax_query' => array(array('taxonomy' => 'product_cat', 'field' => 'id', 'terms' => $wcatTerm->term_id, ) )
								);
							
								$thumbnail_id = get_woocommerce_term_meta( $wcatTerm->term_id, 'thumbnail_id', true );
								$image = wp_get_attachment_url( $thumbnail_id );
								
								$location_array = unserialize(get_option('location_options'));

							    foreach ($location_array as $key => $value) {
							    	if( strtoupper($FDLocation_name) == strtoupper($value['location_name']) ){
										$store_num =  $value['location_phone'];	
									}
							    }


									echo '<div id="'.$wcatTerm->term_id.'-layout" class="product-layout_section" > ';
								
									
									echo '<div class="section_text2"> <h2><b>'.$wcatTerm->name.'</b></h2><div style="margin-top:-30px;margin-bottom:35px; width:100%; text-align:center;color:#ffffff; font-size:14px; line-height:20px;">If you don&#8216;t see a layout that is similar to your shower/bathtub opening below, <br>please contact our in house designers and they will create the shower door of your dreams.<br><strong>There is not a design we can&#8216;t create.</strong> | <strong>'.$store_num.'</strong></div></div>';
									if($wcatTerm->term_id == 101){
										echo '<div class="steam_cont_form">'.$return_string.'</div>';
									}

										$the_queryy = new WP_Query( $args );
										if ( $the_queryy->have_posts() ) {
											while ( $the_queryy->have_posts() ) { 
													$the_queryy->the_post();
													$feat_image_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID()) );

													if( $FDLocation_name != '' && $FDLocation_name != 'null' && $FDLocation_name != 'index'){
														$href= ''.get_permalink().'?mode=kiosk&FDLocation='.$FDLocation_name.'&56_temp='.$discount_kiosk;
													}else if($FDLocation_name == '' && $discount_kiosk != ''){
														$href= ''.get_permalink().'?mode=kiosk&56_temp='.$discount_kiosk;
													}else{
														$href= ''.get_permalink().'?mode=kiosk/';
													}
										      
										   	echo '<div class="col-md-4 margin-bottom-30 ">
									   		   <div class="bar"><div class="bartext">LOADING...</div></div>	
									   		 <div class="kioskproduct">  <div class="img-kiosk">
<a href="'.$href.'" data-re_layout="'.get_the_ID().'-single-layout"><img src="'.$feat_image_url.'" data-animated="images/product/single_1_5.gif"></a>
									   		   </div>
									   		   
									   		   <div class="door-title">
									   		 		<p>  '.get_the_title().'</p>
									   		   </div>
									   		   
									   		   <div class="align-center doorbtn">
									   		  <a href="'.$href.'" data-re_layout="'.get_the_ID().'-single-layout" class="productlink" >
									   		   		Start Building
									   		   	</a>
									   		   </div>
</div>
									   		</div>';
										      
											}
										}
									wp_reset_postdata(); 
								echo '</div>';
							}
						echo '</div></div>';
					?>

			</div>	 
	    </div>
	</div>

</div>

<?php get_footer('kioskproduct'); ?>