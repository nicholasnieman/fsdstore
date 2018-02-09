<?php
/*Template Name: Builder Thank You */

if(isset($_GET['show_price_diff']) && !empty($_GET['show_price_diff'])){
	
}	    
else{
	header("Location: ".site_url());
	exit();
}

	get_header('kiosk');

?>



<?php
	/*Customer Details*/
	$first_name 			= $_GET['first_name'];
	$last_name 				= $_GET['last_name'];
	$email 					= $_GET['email'];
	/*Discount Price*/
	$before_dis_price 		= $_GET['before_dis_price'];
	$discount_price 		= $_GET['discount_price'];
	$discount_txt 			= $_GET['discount_txt'];
	$discount_description 	= $_GET['discount_description'];
	$final_price 			= $_GET['final_price'];
	$userid 				= $_GET['userid'];
	$message 				= $_GET['message'];
	$pid 					= $_GET['oid'];
	$sqftclean 		= $_GET['sqftclean'];
	/*Other Details For Product*/
	//$builder_0 				= $_GET['builder_0'];
	$builder 				= $_GET['builder'];
	$builder_2 				= $_GET['builder_2'];
	$product_img 			= $_GET['product_img'];
	$show_price_diff 		= $_GET['show_price_diff'];
	$door_layout_nm 		= $_GET['door_layout'];
	$mode_type = $_GET['mode_type'];
	/*Sales info*/
	$first_name_sales 		= $_GET['first_name_sales'];	
	$last_name_sales 		= $_GET['last_name_sales'];	
	$sales_email 			= $_GET['sales_email'];	
	$phone_number_sales 	= $_GET['phone_number_sales'];	
	$sales_shipping 		= $_GET['sales_shipping'];
	$sales_crating 			= $_GET['sales_crating'];
	$outside_sale 			= $_GET['for_outsidesales'];
	if($outside_sale == 'on'){
	    $outside_sales = '1';
	}else{
	    $outside_sales = '0';
	}
	// Custom Hardware
	$custom_hardware1_label = $_GET['custom_hardware1_label'];
	$custom_hardware2_label = $_GET['custom_hardware2_label'];
	$custom_hardware3_label = $_GET['custom_hardware3_label'];
	$custom_hardware4_label = $_GET['custom_hardware4_label'];
	$custom_hardware1_val = $_GET['custom_hardware1_val'];
	$custom_hardware2_val = $_GET['custom_hardware2_val'];
	$custom_hardware3_val = $_GET['custom_hardware3_val'];
	$custom_hardware4_val = $_GET['custom_hardware4_val'];

	$custom_hardware_arr = array();
	for ($x = 1; $x <= 4; $x++) {
		if($_GET['custom_hardware'.$x.'_val']){
			$custom_hardware_arr[$_GET['custom_hardware'.$x.'_label']] = $_GET['custom_hardware'.$x.'_val'];
		}
	}
	/*Sales info End*/
	$installation_price 	= $_GET['installation_price'];
	$unique_id = uniqid().time();
	//Stayclean Discount
	$stayclean_option 	= $_GET['stayclean_option'];
	if($stayclean_option == 'Yes'){
		$stayclean_before_discount 	= $_GET['stayclean_before_discount'];
		$stayclean_discount_per 	= $_GET['stayclean_discount_per'];
		$stayclean_discount_total 	= $_GET['stayclean_discount_total'];
	}
	// Door Discount
	$door_before_discount 	= $_GET['door_before_discount'];
	$door_discount_per 		= $_GET['door_discount_per'];
	$door_discount_total 	= $_GET['door_discount_total'];
	if(isset($_GET['show_price_diff']) && !empty($_GET['show_price_diff'])){
		// Merge Vlues
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
	    $cleanPOST["xmIwtLD"]    = '9d3bc3a95b188bcc05de1fdd4794542a85874a9955dffae8b506d778e103da93';
	    $cleanPOST["actionType"] = 'TGVhZHM=';
	  
	    $cleanPOST['Lead Source'] = $_GET['currentuser'];
	    $cleanPOST['Designation']  = $_GET['mode_type'];
	    //doorbuilder
	    //$cleanPOST['LEADCF1']     = $builder_val_0;
	    $cleanPOST['LEADCF2']     = $final_value;
	    //$cleanPOST['LEADCF3']     = $builder_val_2;
	    //Displayed Price
	    $cleanPOST['LEADCF67']    = round($show_price_diff);
	    //QuotePrice
	    $cleanPOST['LEADCF66']    = round($show_price_diff);
	    //$cleanPOST['Address'] = $_GET['city'].' '.$_GET['state'].", ".$_GET['zip'];
	    //$cleanPOST['street'] = $_GET['city'].' '.$_GET['state'].", ".$_GET['zip'];
	    //contractor
	    $cleanPOST['LEADCF3'] = 'No';
	     //i_doortype
	    $cleanPOST['LEADCF6'] = 'Frameless Shower Door - '.$_GET['door_layout'];
	    $cleanPOST['Email']      = $_GET['email'];
	    $cleanPOST['First Name'] = $_GET['first_name'];
	    $cleanPOST['Last Name'] = $_GET['last_name'];
	    $cleanPOST['State']      = $_GET['state'];
	    /*$cleanPOST['Last Name']  = $_GET['last_name'];*/
	    $cleanPOST['Phone']      = $_GET['phone'];
	    $cleanPOST['Website']      = $_GET['website'];
		/*$cleanPOST['Zip Code']   = $_GET['zip'];
	    $cleanPOST['City']       = $_GET['city'];*/
	    //message
	    $cleanPOST['LEADCF1']    = $_GET['message'];
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
	}

	global $wpdb;
	$table_name    = $wpdb->prefix . 'internal_builder';
	$configuration = base64_encode(serialize($final_array));
	$custom_hardware = base64_encode(serialize($custom_hardware_arr));

 

	$wpdb->query("INSERT INTO ".$table_name." (quote_id_req, userid, productid, door_layout, first_name, last_name, email, comments, product_img, configuration, first_name_sales, last_name_sales, sales_email, phone_number_sales, sales_shipping,sqftclean, installation_price, show_price_diff, stayclean_option, stayclean_before_discount, stayclean_discount_per, stayclean_discount_total, sales_crating, door_before_discount,  door_discount_per, door_discount_total, custom_hardware, outside_sales) VALUES ('$unique_id', '$userid', '$pid', '$door_layout_nm', '$first_name', '$last_name', '$email', '$message', '$product_img', '$configuration', '$first_name_sales', '$last_name_sales', '$sales_email', '$phone_number_sales', '$sales_shipping', '$sqftclean', '$installation_price[0]','$show_price_diff', '$stayclean_option', '$stayclean_before_discount',  '$stayclean_discount_per', '$stayclean_discount_total', '$sales_crating','$door_before_discount'  ,'$door_discount_per' ,'$door_discount_total', '$custom_hardware', '$outside_sales')"  ); 

	global $frame_breadcumb;

	$hide_discount = get_option('hide_discount_option');
	$form_redirect_url =  site_url().'/download-pdf/';
?>

<!-- #Container Area -->
<div style="background:#ffffff !important; width:100%">
<div class="container">
	<div class=""> <!-- row -->
		<div class="col-md-12 page-content" style="padding:0; padding-top:10px; text-align:center;  background-color:transparent !important;">
			<div class="row">
				<div id="5875" class="twoColbg">

					<div id="attribute-option-14" data-rel="recap" class="row setup-content_step recap build-showerdoor">
					    <h1 style="color:#333333 !important;">Thank you for building your Installation Easy™ Shower Door.</h1>
					    <div class="col-sm-8">
						    <div class="row">
						        <div class="form-left">
						            <div class="light-well well text-center">                      
						                <div id="starburst">
						                  <h1 style="color:#333333 !important;"><nobr>Thank you for building your shower door today.</nobr>
					                          <span class="glasssqft-options">  Glass SQFT <small></small></span>
						                    </h1>
						                       
						                    <h2><nobr>Total Material Price: <b>$<?php echo round($show_price_diff);  ?></b></nobr></h2>

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

						                    <?php if($mode_type == 'Builder'){ ?>
												<form class="dwnld_pdf" action="<?php echo $form_redirect_url; ?>" method="post">
													<input type="hidden" name="quote_id" value="<?php echo $unique_id; ?>"/>
													<input type="submit" value="Download" name="download_pdf" class="form-input" />
												</form>

												<form class="print_pdf" action="<?php echo $form_redirect_url; ?>" method="post">
													<input type="hidden" name="quote_id" value="<?php echo $unique_id; ?>"/>
													<input type="submit" value="Print" name="print_pdf" class="form-input" />
												</form>
											<?php } ?>

						                    <div class="install_easy_wrapper">
						                        <div class="install_easy">
						                        <img src="/wp-content/themes/frameshowerdoors/images/Fragile_Box-logo_13_Final.png">
						                        </div>
						                    </div>
						                </div>
						            </div>
						        </div>
						    </div>
					    </div>
					    <div class="col-sm-4 form-right">
						    <div class="row"> <?php 
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
								                            <h4 class="list-group-item-heading count title">Your Shower Door Configuration</h4>
								                        </div>

								                    </div>
								                </div>
								                <div class="sqft_gls">
								                  	<ul>
									                    <?php
									                        foreach ($builder as $key => $builder_val) {
									                            $builder_value 	=  	explode("-",$builder_val);
									                            $builder_val 	= 	stripslashes($builder_value[1]);
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
</div></div>

<?php get_footer('builder'); ?>