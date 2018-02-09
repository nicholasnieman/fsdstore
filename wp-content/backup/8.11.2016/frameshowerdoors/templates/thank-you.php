<?php
/*Template Name: Thank You */

?>


<?php

	
	
	
	/*Customer Details*/
	$first_name 			= explode(' ', $_GET['first_name']);
	$last_name 				= explode(' ', $_GET['last_name']);
	
	/*Discount Price*/
	$before_dis_price 		= $_GET['before_dis_price'];
	$discount_price 		= $_GET['discount_price'];
	$discount_txt 			= $_GET['discount_txt'];
	$discount_description 	= $_GET['discount_description'];
	$final_price 			= $_GET['final_price'];

	/*Other Details For Product*/
	//$builder_0 				= $_GET['builder_0'];
	$builder 				= $_GET['builder'];
	$builder_2 				= $_GET['builder_2'];
	$product_img 			= $_GET['product_img'];
	$show_price_diff 		= $_GET['show_price_diff'];
	$door_layout_nm 		= $_GET['door_layout'];
	$cur_url 		= $_GET['cur_url'];
	$mode_type = $_GET['mode_type'];

	/*Quote Request*/
		$quote_sqft 				= 	$_GET['quote_sqft'];
		$glass_sku 					= 	$_GET['glass_sku'];
		$glass_price 				= 	$_GET['glass_price'];
		$hinge_sku 					= 	$_GET['hinge_sku'];
		$hinge_price 				= 	$_GET['hinge_price'];
		$knob_sku 					= 	$_GET['knob_sku'];
		$knob_price 				= 	$_GET['knob_price'];
		$handle_sku 				= 	$_GET['handle_sku'];
		$handle_price 				= 	$_GET['handle_price'];
		$handle_towelbar_sku 		= 	$_GET['handle_towelbar_sku'];
		$handle_towelbar_price 		= 	$_GET['handle_towelbar_price'];
		$towelbar_sku 				= 	$_GET['towelbar_sku'];
		$towelbar_price 			= 	$_GET['towelbar_price'];
		$standard_sku 				= 	$_GET['standard_sku'];
		$standard_price 			= 	$_GET['standard_price'];
		$installation_sku 			= 	$_GET['installation_sku'];
		$installation_price 		= 	$_GET['installation_price'];
		$clamp_sku 					= 	$_GET['clamp_sku'];
		$clamp_price 				= 	$_GET['clamp_price'];
		$header_sku 				= 	$_GET['header_sku'];
		$header_price 				= 	$_GET['header_price'];
		$basic_sku 					= 	$_GET['basic_sku'];
		$basic_price 				= 	$_GET['basic_price'];
		$door_part_sku 				= 	$_GET['door_part_sku'];
		$door_part_price 			= 	$_GET['door_part_price'];
		$shelf_clamp_sku 			= 	$_GET['shelf_clamp_sku'];
		$shelf_clamp_price 			= 	$_GET['shelf_clamp_price'];
		$sleevover_clamp_sku 		= 	$_GET['sleevover_clamp_sku'];
		$sleevover_clamp_price 		= 	$_GET['sleevover_clamp_price'];
		$uchannel_sku 				= 	$_GET['uchannel_sku'];
		$uchannel_price 			= 	$_GET['uchannel_price'];
		$unique_id = uniqid().$product_id;

		$message_html = '<h1>Door Configurations</h1>';
		$message_html .= '<p>Quote Id: <span>'.$unique_id.'</span></p>';	
		$message_html .= '<p>Glass Sqft: <span>'.$quote_sqft.'</span></p>';	

		$glass_arr = $hinge_arr = $knob_arr = $handle_arr = $htc_arr = $towelbar_arr = $standard_arr = $installation_arr = $clamp_arr = $header_arr = $basic_arr = $doorpart_arr = $shelfclamp_arr = $sleevover_arr = $uchannel_arr = array();

		if($glass_sku){	
			foreach ($glass_sku as $key => $value) {
				$message_html .= '<p>Glass: <span>'.$glass_sku[$key].' :'.$glass_price[$key].'</span></p>';
				$glass_arr[$glass_sku[$key]] = $glass_price[$key];
			}
		}

		if($hinge_sku){
			foreach ($hinge_sku as $key => $value) {
				$message_html .= '<p>Hinge: <span>'.$hinge_sku[$key].' :'.$hinge_price[$key].'</span></p>';	
				$hinge_arr[$hinge_sku[$key]] = $hinge_price[$key];
			}
		}

		if($knob_sku){
			foreach ($knob_sku as $key => $value) {
				$message_html .= '<p>Knob: <span>'.$knob_sku[$key].' :'.$knob_price[$key].'</span></p>';	
				$knob_arr[$knob_sku[$key]] = $knob_price[$key];
			}
		}
			
		if($handle_sku){
			foreach ($handle_sku as $key => $value) {
				$message_html .= '<p>Handle: <span>'.$handle_sku[$key].' :'.$handle_price[$key].'</span></p>';
				$handle_arr[$handle_sku[$key]] = $handle_price[$key];
			}
		}
			
		if($handle_towelbar_sku){
			foreach ($handle_towelbar_sku as $key => $value) {
				$message_html .= '<p>Handle Toewlbar combo: <span>'.$handle_towelbar_sku[$key].' :'.$handle_towelbar_price[$key].'</span></p>';
				$htc_arr[$handle_towelbar_sku[$key]] = $handle_towelbar_price[$key];
			}
		}
			
		if($towelbar_sku){
			foreach ($towelbar_sku as $key => $value) {
				$message_html .= '<p>Towelbar: <span>'.$towelbar_sku[$key].' :'.$towelbar_price[$key].'</span></p>';
				$towelbar_arr[$towelbar_sku[$key]] = $towelbar_price[$key];
			}
		}
			
		if($standard_sku){
			foreach ($standard_sku as $key => $value) {
				$message_html .= '<p>Standard: <span>'.$standard_sku[$key].' :'.$standard_price[$key].'</span></p>';
				$standard_arr[$standard_sku[$key]] = $standard_price[$key];
			}
		}
			
		if($installation_sku){
			foreach ($installation_sku as $key => $value) {
				$message_html .= '<p>Installation: <span>'.$installation_sku[$key].' :'.$installation_price[$key].'</span></p>';
				$installation_arr[$installation_sku[$key]] = $installation_price[$key];
			}
		}
			
		if($clamp_sku){
			foreach ($clamp_sku as $key => $value) {
				$message_html .= '<p>Clamp: <span>'.$clamp_sku[$key].' :'.$clamp_price[$key].'</span></p>';
				$clamp_arr[$clamp_sku[$key]] = $clamp_price[$key];
			}
		}
			
		if($header_sku){
			foreach ($header_sku as $key => $value) {
				$message_html .= '<p>Header: <span>'.$header_sku[$key].' :'.$header_price[$key].'</span></p>';
				$header_arr[$header_sku[$key]] = $header_price[$key];
			}
		}
			

		if($basic_sku){
			foreach ($basic_sku as $key => $value) {
				$message_html .= '<p>Basic: <span>'.$basic_sku[$key].' :'.$basic_price[$key].'</span></p>';
				$basic_arr[$basic_sku[$key]] = $basic_price[$key];
			}
		}
		
		if($door_part_sku){
			foreach ($door_part_sku as $key => $value) {
				$message_html .= '<p>Door Part: <span>'.$door_part_sku[$key].' :'.$door_part_price[$key].'</span></p>';
				$doorpart_arr[$door_part_sku[$key]] = $door_part_price[$key];
			}
		}
			

		if($shelf_clamp_sku){
			foreach ($shelf_clamp_sku as $key => $value) {
				$message_html .= '<p>Shelf Clamp: <span>'.$shelf_clamp_sku[$key].' :'.$shelf_clamp_price[$key].'</span></p>';
				$shelfclamp_arr[$shelf_clamp_sku[$key]] = $shelf_clamp_price[$key];
			}
		}
			

		if($sleevover_clamp_sku){
			foreach ($sleevover_clamp_sku as $key => $value) {
				$message_html .= '<p>Sleev Over Clamp: <span>'.$sleevover_clamp_sku[$key].' :'.$sleevover_clamp_price[$key].'</span></p>';
				$sleevover_arr[$sleevover_clamp_sku[$key]] = $sleevover_clamp_price[$key];
			}
		}
			

		if($uchannel_sku){
			foreach ($uchannel_sku as $key => $value) {
				$message_html .= '<p>Uchannel: <span>'.$uchannel_sku[$key].' :'.$uchannel_price[$key].'</span></p>';
				$uchannel_arr[$uchannel_sku[$key]] = $hinge_price[$key];
			}
		}

		$message_html .= $final_price;

		

		if( $_GET['first_name'] && $_GET['first_name'] != NULL){ $first_name = $_GET['first_name']; }else{ $first_name = ''; }
		if( $_GET['last_name'] && $_GET['last_name'] != NULL){ $last_name = $_GET['last_name']; }else{ $last_name = ''; }
		if( $_GET['email'] && $_GET['email'] != NULL){ $email = $_GET['email']; }else{ $email = ''; }
		if( $_GET['phone'] && $_GET['phone'] != NULL){ $phone = $_GET['phone']; }else{ $phone = ''; }
		if( $_GET['website'] && $_GET['website'] != NULL){ $website = $_GET['website']; }else{ $website = ''; }
		if( $_GET['message'] && $_GET['message'] != NULL){ $message = $_GET['message']; }else{ $message = ''; }
		if( $_GET['door_layout'] && $_GET['door_layout'] != NULL){ $door_layout = $_GET['door_layout']; }else{ $door_layout = ''; }
		if( $_GET['final_price'] && $_GET['final_price'] != NULL){ $final_price = $_GET['final_price']; }else{ $final_price = ''; }
		if( $_GET['product_img'] && $_GET['product_img'] != NULL){ $product_img = $_GET['product_img']; }else{ $product_img = ''; }
		if( $_GET['currentuser'] && $_GET['currentuser'] != NULL){ $currentuser = $_GET['currentuser']; }else{ $currentuser = ''; }
		if( $_GET['mode_type'] && $_GET['mode_type'] != NULL){ $mode_type = $_GET['mode_type']; }else{ $mode_type = ''; }
		if( $_GET['state'] && $_GET['state'] != NULL){ $state = $_GET['state']; }else{ $state = ''; }

	 	/*Inserting Data into DB*/
		    global $wpdb;
		    $table_name  = $wpdb->prefix . 'quote_request';
		    
		    $arr =	array(
		    			"quote_id_req"				=>		$unique_id,
		    			"firstnm"				=>		$first_name,
		    			"last_name"				=>		$last_name,
		    			"email"					=>		$email,
		    			"phone"					=>		$phone,
		    			"website"				=>		$website,
		    			"message"				=>		$message,
		    			"door_layout"			=>		$door_layout,
		    			"price"					=>		$final_price,
		    			"product_img"			=>		$product_img,
		    			"currentuser"			=>		$currentuser,
		    			"mode_type"				=>		$mode_type,
		    			"state"					=>		$state,

			    		"glass_sqft"			=>		$quote_sqft,
			    		"glass_arr"				=>		serialize($glass_arr),
			    		"hinge_arr"				=>		serialize($hinge_arr),
			    		"knob_arr"				=>		serialize($knob_arr),
			    		"handle_arr"			=>		serialize($handle_arr),
			    		"htc_arr"				=>		serialize($htc_arr),
			    		"towelbar_arr"			=>		serialize($towelbar_arr),
			    		"standard_arr"			=>		serialize($standard_arr),
			    		"installation_arr"		=>		serialize($installation_arr),
			    		"clamp_arr"				=>		serialize($clamp_arr),
			    		"header_arr"			=>		serialize($header_arr),
			    		"basic_arr"				=>		serialize($basic_arr),
			    		"doorpart_arr"			=>		serialize($doorpart_arr),
			    		"shelfclamp_arr"		=>		serialize($shelfclamp_arr),
			    		"sleevover_arr"			=>		serialize($sleevover_arr),
			    		"uchannel_arr"			=>		serialize($uchannel_arr)

			    		
		    		);

		$wpdb->insert($table_name,$arr);
		$ch=$wpdb->row_affeected;
		
		$admin_email = get_bloginfo('admin_email');
		$subject = $first_name.', New Quote Inquiry';

		 $header = "From: <$email>\r\n";
		//$header = "From: Original Frameless Shower Doors "."\r\n";
		$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$header .= "Reply-To: <$admin_email>\r\n";

if(isset($_GET['show_price_diff']) && !empty($_GET['show_price_diff'])){
		//mail('himanshu@techinfini.com', $subject, $message , $header);
		//mail('himanshu@techinfini.com', $subject, $message_html , $header);
		//mail('deepali.mahalde@techinfini.com', $subject, $message_html , $header);

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
	    //$cleanPOST['Lead Source'] = $mode_type.': '.$_GET['currentuser'].'Lead Source';
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
	   // $cleanPOST['labelTD_WEBSITE']      = $_GET['website'];
	    //$cleanPOST['website']      = $_GET['website'];
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
	else{
		header("Location: ".site_url());
		exit();
	}

		get_header();    
	global $frame_breadcumb;

	$hide_discount = get_option('hide_discount_option');
?>

<!-- #Container Area -->
<div id="container">
	<div class="mwrap">
	    <div class="container">
		   	<div id="main-header">
				<h2> <?php the_title();?> </h2>
				<div id="buying-guide"><a href="<?php bloginfo('url'); ?>/buying-guide/">Buying Guide</a></div>
				<div id="need-help"><a href="<?php bloginfo('url'); ?>/contact/">Need Help?</a></div> 
	      	</div>

            <div class="breadcrumbs">
				<ul>									
					<li class="cms_page">
						<?php 
							if ((class_exists('frame_breadcrumb_class'))) {$frame_breadcumb->custom_breadcrumb();}
						?>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class=""> <!-- row -->
		<div class="col-md-12 page-content" style="padding:0; padding-top:10px; text-align:center;">
			<div class="row">
				<div id="5875" class="twoColbg">

					<div id="attribute-option-14" data-rel="recap" class="row setup-content_step recap build-showerdoor">
					    <h1>Thank you for building your Installation Easy™ Shower Door.</h1>
					    <div class="col-sm-8">
						    <div class="row">
						        <div class="form-left">
						            <div class="light-well well text-center">                      
						                <div id="starburst">
						                    <h1><nobr>Thank you for building your shower door today.</nobr>
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

						                    <div class="install_easy_wrapper">
						                        <div class="install_easy">
						                        <img src="<?php bloginfo('template_url'); ?>/images/Fragile_Box-logo_13_Final.png">
						                        </div>


						                        <div class="install_content">
						                            <p> Your personal technician will contact you to review your quote and answer any questions you may have. Once you’ve placed your order, we will send you an easy to follow measuring and installation video with printable instructions custom tailored to your shower door enclosure. We will be there for you every step of the way. </p>

						                            <center style="margin-bottom:22px;">
						                                <b> From measure to install &quot;we've got your back&quot;! </b>
						                            </center>
						                                <center>
						                                <b style="font-size: 18px;">ZERO ON-SITE FABRICATION LIGHTNING FAST AND EASY INSTALLATION</b>
						                            </center>

						                            <center>
						                                <p> Thank you for choosing The Original Frameless Shower Doors, the only &quot;Direct from the manufacturer&quot; shower door company!<br> <span style="font-size: 26px;">(855) 372 6537</span></p>
						                                <p> LOW FLAT RATE SHIPPING FOR MOST AREAS IN THE CONTINENTAL U.S.<br> *See shipping under services for details </p>
						                            </center>
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
</div>
<?php testiominal_code();  ?>
<?php  pages_link_section(); ?>
<?php get_footer("home"); ?>