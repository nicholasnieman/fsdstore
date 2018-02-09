<?php
/*Template Name: Dev Kiosk Thank You */

if( isset($_POST['contactSubmit']) && $_SERVER["REQUEST_METHOD"] == "POST" ){

	/*Customer Details*/

	$first_name 			= $_REQUEST['first_name'];
	$last_name 				= $_REQUEST['last_name'];
	
	/*Discount Price*/
	$before_dis_price 		= $_REQUEST['before_dis_price'];
	$discount_price 		= $_REQUEST['discount_price'];
	$discount_txt 			= $_REQUEST['discount_txt'];
	$discount_description 	= $_REQUEST['discount_description'];
	$final_price 			= $_REQUEST['final_price'];

	/*Other Details For Product*/
	//$builder_0 				= $_REQUEST['builder_0'];
	$builder 				= $_REQUEST['builder'];
	$builder_2 				= $_REQUEST['builder_2'];
	$product_img 			= $_REQUEST['product_img'];
	$show_price_diff 		= $_REQUEST['show_price_diff'];
	$door_layout_nm 		= $_REQUEST['door_layout'];
	$cur_url 				= $_REQUEST['cur_url'];
	$mode_type 				= $_REQUEST['mode_type'];

	$FDLocation 		= $_REQUEST['FDLocation'];
	if(!$FDLocation){
		$FDLocation = 'No city';
	}


	$final_array = $builder_val_1 = array();
	$final_value = $builder_val_2 = $builder_val_0 = $builder_value = '';

	foreach ($builder as $key => $builder_val) {
		$builder_value  .=  $builder_val. " \r\n";
	}

	//$builder_val_1 = array_merge($builder_0,$builder_2);
	$final_array = array_merge($builder,$builder_2);

	foreach ($final_array as $key => $final_arr_val) {
		$final_value .=  $final_arr_val. " \r\n";
	}		

	    $cleanPOST["xnQsjsdp"]   = 'f6675da4f5b64b7c54aeb859879a87ea594e8fefd20d5f521a0288b1f64c3ca9';
	    $cleanPOST["zc_gad"]     = '';
	    $cleanPOST["xmIwtLD"]    = '9d3bc3a95b188bcc05de1fdd4794542a66afe428213601b4db690c972dd36a91';
	    $cleanPOST["actionType"] = 'TGVhZHM=';
	    $cleanPOST['Lead Source'] = $_REQUEST['currentuser'];
	    $cleanPOST['Designation']  = $_REQUEST['mode_type'];
	    //doorbuilder
	    $cleanPOST['LEADCF2']     = $final_value;
	    //Displayed Price
	    $cleanPOST['LEADCF67']    = round($show_price_diff);
	    //QuotePrice
	    $cleanPOST['LEADCF66']    = round($show_price_diff);
	    //contractor
	    $cleanPOST['LEADCF3'] = 'No';
	     //i_doortype
	    $cleanPOST['LEADCF6'] = 'Frameless Shower Door - '.$_REQUEST['door_layout'];
	    $cleanPOST['Email']      = $_REQUEST['email'];
	    $cleanPOST['First Name'] = $_REQUEST['first_name'];
	    $cleanPOST['Last Name'] = $_REQUEST['last_name'];
	    $cleanPOST['State']      = $_REQUEST['state'];
	    $cleanPOST['Phone']      = $_REQUEST['phone'];
	    $cleanPOST['Website']      = $_REQUEST['website'];
	    $cleanPOST['LEADCF12'] = $FDLocation;
	    //message
	    $cleanPOST['LEADCF1']    = $_REQUEST['message'];
	    unset($cleanPOST['stayclean']);
	    $ch = curl_init("https://crm.zoho.com/crm/WebToLeadForm");
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    //curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");
	    curl_setopt($ch, CURLOPT_POST, 1);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $cleanPOST);
	    $r = curl_exec($ch);
	    curl_close($ch);

		get_header('kiosk');   

		mail('deepali.mahalde@techinfini.com', 'Test', $cleanPOST);

	global $frame_breadcumb;
	$hide_discount = get_option('hide_discount_option');
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
<div id="warranty" class="modal fade" style="display:none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close b-close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">LIFETIME WARRANTY</h4>
			</div>
			<div class="modal-body">
				<h2>CONTENT HERE</h2>
				<p>StayCLEAN&#8482; Protective Coating available for all of our InstallationEASY&#8482; glass shower doors.</p>
				<div class="modal-footer">
					<button type="button" class="btn btn-default b-close" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- #Container Area -->
<div class="container limit-tiled-sect" style="background:url(/newkiosk/images/flogo.png) no-repeat; 	background-position:bottom; 	background-size:cover; margin-top:30px;">
	<div class=""> <!-- row -->
		<div class="col-md-12 page-content" style="padding:0; padding-top:10px; text-align:center;  background-color:transparent !important;">
			<div class="row">
				<div id="5875" class="twoColbg">

					<div id="attribute-option-14" data-rel="recap" class="row recap">
					    <h1>Thank you for building your Installation Easy™ Shower Door.</h1>
					    <div class="col-sm-8">
						    <div class="row">
						        <div class="form-left">
						            <div class="light-well well text-center">                      
						                <div id="starburst">
  <style type="text/css">
									
#FDLOGO { display: none;}</style>                                      
                                        
<script type="text/javascript">
 $(document).ready(function () {
  
  var FDLocation = getParameterByName("FDLocation");
  console.log(FDLocation);
   if(FDLocation = FSDShowroom) {
   document.getElementById("FDLOGO").style.display = "block";
  }
});
</script>
                                        
                                        
 <div id="FDLOGO">                                       
                                        <img src="https://www.framelessshowerdoors.com/wp-content/themes/frameshowerdoors/kiosk/images/FDTYLogo.png"  /></div>
						                    <h1>Thank you for building your <br>shower door today.
						                        <span class="glasssqft-options">  Glass SQFT <small></small></span>
						                    </h1>
						                       
						                    <h2 style="color:#000000 !important;text-align: center;"><nobr>Total Material Price: <b>$<?php echo round($show_price_diff);  ?></b></nobr></h2>
						                    <p style="margin-top:-25px; font-size:14px; color:#333333;"><em>Price does not include shipping, crating and installation.</em></p>
						                    

						                    <?php if($discount_txt){ ?>

						                        <table id="discount-til-sect" data-re_dist="<?php if($hide_discount == 'hide'){ echo 'dist-tild-opt'; } ?>">
						                            <tr>
						                                <td width="100" align="left"><span>Total Price: </span></td>
						                                <td width="100" align="left"><span class="total_price empty_sect"><?php echo $before_dis_price; ?></span></td>
						                            </tr>

						                            <tr>
						                                <td width="100" align="left"><span>Discount: </span></td>
						                                <td width="520" align="left">
						                                    <span class="discounted_amt empty_sect"><?php echo $discount_price; ?></span>
						                                    <span class="discount_amt_val empty_sect"> (<?php echo $discount_txt; ?> : </span>
						                                    <span class="discount_description_val empty_sect"><?php echo $discount_description; ?>)</span>
						                                </td>
						                            </tr>

						                            <tr>
						                                <td width="100" align="left"><span>Final Price: </span></td>
						                                <td width="100" align="left"><span class="final_price empty_sect"><?php echo $final_price; ?></span></td>
						                            </tr>

						                        </table>

						                    <?php } ?>

						                    <div class="install_easy_wrapper">
					                          	<div class="install_content">
													<div  style="text-align:center !important; font-size:14px; line-height:20px; margin-top:20px; margin-bottom:20px;" ><strong style="font-size:16px; line-height:24px;">NEXT STEPS</strong><BR>
												  Please check your email.<br>
												  Your personal technician will contact you to review your measurements <br>
												  and ensure that your custom enclosure is a perfect fit. <br><br> 
												  <strong style="font-size:16px; line-height:24px;">FASTEST TURNAROUND TIME</strong><br>
												  Most orders are fabricated in as little as 48hrs <br>
												  and ready to be shipped  within 5 business days. <br><br>

<?php

	$location_array = unserialize(get_option('location_options'));

    foreach ($location_array as $key => $value) {
    	if( strtoupper($FDLocation) == strtoupper($value['location_name']) ){
			$store_num =  $value['location_phone'];	
		}
    }

?>

<strong> If you have any questions, please contact us at</strong>
<div>
	<strong><?php echo $store_num; ?></strong>
</div>  

                                                  </div>	
                                                  
     <center style="margin-bottom:22px;">
														<b> We will be there for you every step of the way. <br>
														From measure to install "we've got your back"! </b>
													</center>
													<center>
														<p> Thank you for choosing The Original Frameless Shower Doors, the only “Direct from the manufacturer” shower door company!<br> <br>
														</p>
													</center>
						                        </div>
						                    </div>
						                </div>
						            </div>
						        </div>
						    </div>
					    </div>
					    <div class="col-sm-4 form-right">
						    <?php 
							    if(have_posts()) :
							        while(have_posts()) : the_post(); ?>
							            <div <?php post_class('single-post-listing'); ?> id="post_<?php the_ID(); ?>">
							              	<div class="post-tile clearfix">
							                  	<div class="entry-title">
							                      	<a class="previewTitle" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> <?php echo $door_layout_nm; ?> 
							                      	</a>
							                  	</div>
							              	</div>
							              	<div class="entry">
							                 	<?php 
							                      	echo '<img src="'.$product_img.'" alt="second image"/>';
							                  	?> 
							              	</div>

							            	<div class="total_vall">
								                <div id="priceItem" class="col-xs-12 recapItem priceItem">
								                    <div class="list-group recap-list">
								                        <div class="col-xs-12">
								                            <h4 class="list-group-item-heading count title" style="text-align:left !important; margin-left:-20px !important;">Your Shower Door Configuration</h4>
								                        </div>

								                    </div>
								                </div>
								                <div class="sqft_gls">
								                  	<ul>
									                    <?php
									                        foreach ($builder as $key => $builder_val) {
									                            $builder_value =  explode("-",$builder_val);
									                            $builder_val = stripslashes($builder_value[1]);
									                             ?>
								                                <li>
								                                    <span class="option_head"> <?php echo $builder_value[0]; ?></span> <span class="options_price"><?php echo $builder_val; ?> </span>
								                                </li> <?php
									                        }
									                    ?>
								                   
								                  	</ul>
								                </div>
								                <div class="price_info_gls">
								                  <ul>
								                     
								                  </ul>
								                </div>
							              	</div>
							          	</div><?php 
							        endwhile;
							    endif; ?> 
						  
					    </div>
					</div>
			    </div>
		    </div>
	    </div>
	</div>
</div>
<?php
get_footer("builder"); 
}else{

}
?>