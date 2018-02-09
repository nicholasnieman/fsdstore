<?php
/*Template Name: Thank You */

$dir = get_template_directory()."/class/geo_object.php";
//require_once($dir);
//$geo = new geo_object();
//$isFL = $geo->isFL();
$isFL = true;
foreach($_REQUEST AS $key => $value){
    //echo $key." = ".$value."<br>";
}
	if( isset($_POST['contactSubmit']) && $_SERVER["REQUEST_METHOD"] == "POST" ){
		/*Customer Details*/
		$first_name 			= explode(' ', $_REQUEST['first_name']);
		$last_name 				= explode(' ', $_REQUEST['last_name']);
		/*Discount Price*/
		$before_dis_price 		= $_REQUEST['before_dis_price'];
		$discount_price 		= $_REQUEST['discount_price'];
		$discount_txt 			= $_REQUEST['discount_txt'];
		$discount_description 	= $_REQUEST['discount_description'];
		$final_price 			= $_REQUEST['final_price'];
		$builder 				= $_REQUEST['builder'];
		$builder_2 				= $_REQUEST['builder_2'];
		$product_img 			= $_REQUEST['product_img'];
		$show_price_diff 		= $_REQUEST['show_price_diff'];
		$door_layout_nm 		= $_REQUEST['door_layout'];
		$cur_url 		= $_REQUEST['cur_url'];
		$mode_type = $_REQUEST['mode_type'];
		/*Quote Request*/
		$quote_sqft 				= 	$_REQUEST['quote_sqft'];
		$glass_sku 					= 	$_REQUEST['glass_sku'];
		$glass_price 				= 	$_REQUEST['glass_price'];
		$hinge_sku 					= 	$_REQUEST['hinge_sku'];
		$hinge_price 				= 	$_REQUEST['hinge_price'];
		$knob_sku 					= 	$_REQUEST['knob_sku'];
		$knob_price 				= 	$_REQUEST['knob_price'];
		$handle_sku 				= 	$_REQUEST['handle_sku'];
		$handle_price 				= 	$_REQUEST['handle_price'];
		$handle_towelbar_sku 		= 	$_REQUEST['handle_towelbar_sku'];
		$handle_towelbar_price 		= 	$_REQUEST['handle_towelbar_price'];
		$towelbar_sku 				= 	$_REQUEST['towelbar_sku'];
		$towelbar_price 			= 	$_REQUEST['towelbar_price'];
		$standard_sku 				= 	$_REQUEST['standard_sku'];
		$standard_price 			= 	$_REQUEST['standard_price'];
		$installation_sku 			= 	$_REQUEST['installation_sku'];
		$installation_price 		= 	$_REQUEST['installation_price'];
		$clamp_sku 					= 	$_REQUEST['clamp_sku'];
		$clamp_price 				= 	$_REQUEST['clamp_price'];
		$header_sku 				= 	$_REQUEST['header_sku'];
		$header_price 				= 	$_REQUEST['header_price'];
		$basic_sku 					= 	$_REQUEST['basic_sku'];
		$basic_price 				= 	$_REQUEST['basic_price'];
		$door_part_sku 				= 	$_REQUEST['door_part_sku'];
		$door_part_price 			= 	$_REQUEST['door_part_price'];
		$shelf_clamp_sku 			= 	$_REQUEST['shelf_clamp_sku'];
		$shelf_clamp_price 			= 	$_REQUEST['shelf_clamp_price'];
		$sleevover_clamp_sku 		= 	$_REQUEST['sleevover_clamp_sku'];
		$sleevover_clamp_price 		= 	$_REQUEST['sleevover_clamp_price'];
		$uchannel_sku 				= 	$_REQUEST['uchannel_sku'];
		$uchannel_price 			= 	$_REQUEST['uchannel_price'];
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

		if( $_REQUEST['first_name'] && $_REQUEST['first_name'] != NULL){ $first_name = $_REQUEST['first_name']; }else{ $first_name = ''; }
		if( $_REQUEST['last_name'] && $_REQUEST['last_name'] != NULL){ $last_name = $_REQUEST['last_name']; }else{ $last_name = ''; }
		if( $_REQUEST['email'] && $_REQUEST['email'] != NULL){ $email = $_REQUEST['email']; }else{ $email = ''; }
		if( $_REQUEST['phone'] && $_REQUEST['phone'] != NULL){ $phone = $_REQUEST['phone']; }else{ $phone = ''; }
		if( $_REQUEST['website'] && $_REQUEST['website'] != NULL){ $website = $_REQUEST['website']; }else{ $website = ''; }
		if( $_REQUEST['message'] && $_REQUEST['message'] != NULL){ $message = $_REQUEST['message']; }else{ $message = ''; }
		if( $_REQUEST['door_layout'] && $_REQUEST['door_layout'] != NULL){ $door_layout = $_REQUEST['door_layout']; }else{ $door_layout = ''; }
		if( $_REQUEST['final_price'] && $_REQUEST['final_price'] != NULL){ $final_price = $_REQUEST['final_price']; }else{ $final_price = ''; }
		if( $_REQUEST['product_img'] && $_REQUEST['product_img'] != NULL){ $product_img = $_REQUEST['product_img']; }else{ $product_img = ''; }
		if( $_REQUEST['currentuser'] && $_REQUEST['currentuser'] != NULL){ $currentuser = $_REQUEST['currentuser']; }else{ $currentuser = ''; }
		if( $_REQUEST['mode_type'] && $_REQUEST['mode_type'] != NULL){ $mode_type = $_REQUEST['mode_type']; }else{ $mode_type = ''; }
		if( $_REQUEST['state'] && $_REQUEST['state'] != NULL){ $state = $_REQUEST['state']; }else{ $state = ''; }

	 	/*Inserting Data into DB*/
	    global $wpdb;
	    $table_name  = $wpdb->prefix . 'quote_request';

	    $blogtime = current_time( 'timestamp', 0 ); 
	    $leadtime =  date('M-d, Y H:i:s', $blogtime);
	    
		$arr =	array(
			"quote_id_req"			=>		$unique_id,
			"leadtime"				=>		$leadtime,
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
		echo $ch=$wpdb->row_affeected;

		if($show_price_diff){
			$final_array = $builder_val_1 = array();
			$final_value = $builder_val_2 = $builder_val_0 = $builder_value = '';
			foreach ($builder as $key => $builder_val) {
				$builder_value  .=  $builder_val. " \r\n";
			}
			$omit = array(
                'price',
                'browser',
                'order status',
            );
			$final_array = array_merge($builder,$builder_2);
			foreach ($final_array as $key => $final_arr_val) {
			    $pos = 0;
			    foreach($omit AS $key){
				    $pos = strpos(strtolower($final_arr_val), strtolower($key));
				    if($pos > 0){
				        break;
                    }
                }
                if($pos < 1){
	                $final_value .=  $final_arr_val. " \r\n";
                }

				/*
			    if($isFL){
			        if(strpos($final_arr_val, "Price")<1 || strpos($final_arr_val, "browser")<1){

                    }
                }else{
				    $final_value .=  $final_arr_val. " \r\n";
                }
				*/
			}
			//echo $final_value."<hr>";

			//array of emails to NOT send confirmations to
            $blacklist = array(
                'lancer.sandra@gmail.com',
            );

		    $cleanPOST["xnQsjsdp"]   = 'f6675da4f5b64b7c54aeb859879a87ea594e8fefd20d5f521a0288b1f64c3ca9';
		    $cleanPOST["zc_gad"]     = $_REQUEST['zc_gad'];
		    $cleanPOST["xmIwtLD"]    = '9d3bc3a95b188bcc05de1fdd4794542a66afe428213601b4db690c972dd36a91';
		    $cleanPOST["actionType"] = 'TGVhZHM=';
		    $cleanPOST['Lead Source'] = $_REQUEST['currentuser'];
		    $cleanPOST['Designation']  = $_REQUEST['mode_type'];
		    $cleanPOST['LEADCF2']     = $final_value;
		    $cleanPOST['LEADCF67']    = round($show_price_diff);
		    $cleanPOST['LEADCF66']    = round($show_price_diff);
		    $cleanPOST['LEADCF3'] = 'No';
		    $cleanPOST['LEADCF6'] = 'Frameless Shower Door - '.$_REQUEST['door_layout'];
		    $cleanPOST['Email']      = $_REQUEST['email'];
		    $cleanPOST['First Name'] = $_REQUEST['first_name'];
		    $cleanPOST['Last Name'] = $_REQUEST['last_name'];
		    $cleanPOST['State']      = $_REQUEST['state'];
		    $cleanPOST['Phone']      = $_REQUEST['phone'];
		    $cleanPOST['Website']      = $_REQUEST['website'];
			$cleanPOST['Zip Code']   = $_REQUEST['zip'];
		    $cleanPOST['LEADCF1']    = $_REQUEST['message'];
		    $cleanPOST['LEADCF42'] = $_REQUEST['LEADCF42'];
            $cleanPOST['LEADCF43'] = $_SERVER['REMOTE_ADDR'];
		    unset($cleanPOST['stayclean']);
		    $ch = curl_init("https://crm.zoho.com/crm/WebToLeadForm");
		    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		    curl_setopt($ch, CURLOPT_POST, 1);
		    curl_setopt($ch, CURLOPT_POSTFIELDS, $cleanPOST);
		    session_start();
		    if($_SESSION['processed'] != "y" && $_SESSION['commencing'] == 'y' && !in_array($cleanPOST['Email'], $blacklist)){
                $r = curl_exec($ch);
                $_SESSION['processed'] = "y";
            }
		    curl_close($ch);
		}
		else{
			header("Location: ".site_url());
			exit();
		}
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
                                            <?php
                                            if(!$isFL){
                                                ?>
                                                <h2><nobr>Total Material Price: <b>$<?php echo round($show_price_diff);  ?></b></nobr></h2> <p style="margin-top:-25px; text-align:center; font-size:14px; color:#333333;"><em>Price does not include shipping, crating and installation.</em></p>
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
                                                <?php
                                            }
                                            ?>
						                    <div class="install_easy_wrapper">
						                        <div class="install_easy">
							                        <?php
							                        if(!$isFL) {
								                        ?>
                                                        <div style="text-align:center !important; font-size:14px; line-height:20px; margin-top:20px; margin-bottom:20px;">
                                                            <strong style="font-size:16px; line-height:24px;">NEXT
                                                                STEPS</strong><BR>
                                                            Please check your email.<br>
                                                            Your personal technician will contact you to review your
                                                            measurements <br>
                                                            and ensure that your custom enclosure is a perfect fit. <br><br>
                                                            <strong style="font-size:16px; line-height:24px;">FASTEST
                                                                TURNAROUND TIME</strong><br>
                                                            Most orders are fabricated in as little as 48hrs <br>
                                                            and ready to be shipped within 5 business days. <br>
                                                        </div>
								                        <?php
							                        }else{
							                            ?>
                                                        <div style="text-align:center !important; font-size:14px; line-height:20px; margin-top:20px; margin-bottom:20px;">
                                                            <strong style="font-size:18px; line-height:24px;">NEXT STEPS</strong><BR>
															<span style="font-size:16px; line-height: 22px;"> One of our design experts with contact you shortly to provide you with your custom build quote and options. Please feel free to call us with any questions that you may have.</span><br>
                                                        </div>  

                                                        <div style="text-align:center !important; font-size:14px; line-height:20px; margin: 20px auto; width:60%;">
                                                            <strong style="font-size:18px; line-height:24px;">FASTEST TURNAROUND TIME</strong><BR>
															<span style="font-size:16px; line-height: 22px;"> Most orders are fabricated in as little as 48hr and ready to be shipped and installed.</span><br>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
						                        </div>
                                                <?php
                                                $dir = get_template_directory() . "/class/geo_object.php";
                                                require_once( $dir );
                                                $geo  = new geo_object();
                                                $move = $geo->isFL();
	                                                ?>

                                                    <div class="install_content">
                                                        <?php
                                                        if ( !$move ) {
                                                        ?>
                                                        <center>
                                                            <b style="font-size: 18px;">ZERO ON-SITE FABRICATION
                                                                LIGHTNING FAST AND SUPER EASY INSTALLATION<br>
                                                            </b>
                                                            <img src="<?php bloginfo( 'template_url' ); ?>/images/Fragile_Box-logo_13_Final.png"
                                                                 style="width: 90%;">
                                                        </center>

                                                        <center>
                                                            <p><b> From measure to install &quot;we've got your back&quot;! </b>
                                                            </p>
	                                                        <?php
	                                                        }else{ echo "<center>";}
	                                                        ?>
                                                            <p> Thank you for choosing The Original Frameless Shower
                                                                Doors, the only &quot;Direct from the manufacturer&quot;
                                                                shower door company!<br> <span style="font-size: 26px;">(855) 372 6537</span>
                                                            </p>
                                                            <!-- <p> LOW FLAT RATE SHIPPING FOR MOST AREAS IN THE CONTINENTAL U.S.<br> *See shipping under services for details </p>-->
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
    <!-- Google Code for Instant Quote (Quote-Saved) Conversion Page -->
    <script type="text/javascript">
        /* <![CDATA[ */
        var google_conversion_id = 986686799;
        var google_conversion_language = "en";
        var google_conversion_format = "2";
        var google_conversion_color = "ffffff";
        var google_conversion_label = "dZwoCKC3nFkQz8q-1gM";
        var google_remarketing_only = false;
        /* ]]> */
    </script>
    <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
    </script>
    <noscript>
        <div style="display:inline;">
            <img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/986686799/?label=dZwoCKC3nFkQz8q-1gM&amp;guid=ON&amp;script=0"/>
        </div>
    </noscript>
<?php testiominal_code();  ?>
<?php  pages_link_section(); ?>
<?php get_footer("home"); ?>