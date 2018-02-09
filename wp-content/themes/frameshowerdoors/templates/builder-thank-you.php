<?php
/*Template Name: Builder Thank You */

foreach($_REQUEST AS $key => $value){
    //echo $key." = ".$value."<br>";
}

if ( isset( $_POST['contactSubmit'] ) && $_SERVER["REQUEST_METHOD"] == "POST" ) {

	//$url = get_template_directory();
	//echo $url; exit;
	require_once( get_template_directory() . "/class/dragon_object.php" );

	$dragon = new dragon_object();

	$job_id = $dragon->createJobId();

	get_header( 'builder' );

	/*Customer Details*/
	$first_name = $_REQUEST['first_name'];
	$last_name  = $_REQUEST['last_name'];
	$email      = $_REQUEST['email'];
	/*Discount Price*/
	$before_dis_price     = $_REQUEST['before_dis_price'];
	$discount_price       = $_REQUEST['discount_price'];
	$discount_txt         = $_REQUEST['discount_txt'];
	$discount_description = $_REQUEST['discount_description'];
	$final_price          = $_REQUEST['final_price'];
	$userid               = $_REQUEST['userid'];
	$message              = $_REQUEST['message'];
	$pid                  = $_REQUEST['oid'];
	$sqftclean            = $_REQUEST['sqftclean'];
	/*Other Details For Product*/
	//$builder_0 				= $_REQUEST['builder_0'];
	$builder         = $_REQUEST['builder'];
	$builder_2       = $_REQUEST['builder_2'];
	$product_img     = $_REQUEST['product_img'];
	$show_price_diff = $_REQUEST['show_price_diff'];
	$door_layout_nm  = $_REQUEST['door_layout'];
	$mode_type       = $_REQUEST['mode_type'];
	/*Sales info*/
	$first_name_sales   = $_REQUEST['first_name_sales'];
	$last_name_sales    = $_REQUEST['last_name_sales'];
	$sales_email        = $_REQUEST['sales_email'];
	$phone_number_sales = $_REQUEST['phone_number_sales'];
	$sales_shipping     = $_REQUEST['sales_shipping'];
	$sales_crating      = $_REQUEST['sales_crating'];
	$outside_sale       = $_REQUEST['for_outsidesales'];
	$additional_charge  = $_REQUEST['additional_sectt'];
	$replace_strings = array();

	// Radio
	if ( $outside_sale == 'outsidesale' ) {
		$outside_sales = '1';
	} else if ( $outside_sale == 'texassale' ) {
		$outside_sales = '2';
	} else {
		$outside_sales = '0';
	}

	// Custom Hardware
	$custom_hardware1_label = $_REQUEST['custom_hardware1_label'];
	$custom_hardware2_label = $_REQUEST['custom_hardware2_label'];
	$custom_hardware3_label = $_REQUEST['custom_hardware3_label'];
	$custom_hardware4_label = $_REQUEST['custom_hardware4_label'];
	$custom_hardware1_val   = $_REQUEST['custom_hardware1_val'];
	$custom_hardware2_val   = $_REQUEST['custom_hardware2_val'];
	$custom_hardware3_val   = $_REQUEST['custom_hardware3_val'];
	$custom_hardware4_val   = $_REQUEST['custom_hardware4_val'];

	$custom_hardware_arr = array();
	for ( $x = 1; $x <= 4; $x ++ ) {
		if ( $_REQUEST[ 'custom_hardware' . $x . '_val' ] ) {
			$custom_hardware_arr[ $_REQUEST[ 'custom_hardware' . $x . '_label' ] ] = $_REQUEST[ 'custom_hardware' . $x . '_val' ];
		}
	}
	/*Sales info End*/
	$installation_price = $_REQUEST['installation_price'];
	$unique_id          = uniqid() . time();
	//Stayclean Discount
	$stayclean_option = $_REQUEST['stayclean_option'];
	if ( $stayclean_option == 'Yes' ) {
		$stayclean_before_discount = $_REQUEST['stayclean_before_discount'];
		$stayclean_discount_per    = $_REQUEST['stayclean_discount_per'];
		$stayclean_discount_total  = $_REQUEST['stayclean_discount_total'];
	}
	// Door Discount
	$door_before_discount = $_REQUEST['door_before_discount'];
	$door_discount_per    = $_REQUEST['door_discount_per'];
	$door_discount_total  = $_REQUEST['door_discount_total'];
	if ( isset( $_REQUEST['show_price_diff'] ) && ! empty( $_REQUEST['show_price_diff'] ) ) {
		// Merge Vlues
		$final_array = $builder_val_1 = array();
		$final_value = $builder_val_2 = $builder_val_0 = $builder_value = '';
		foreach ( $builder as $key => $builder_val ) {
			$builder_value .= $builder_val . " \r\n";
		}
//$builder_val_1 = array_merge($builder_0,$builder_2);
		$measurments_value = "";
		$final_array = array_merge( $builder, $builder_2 );
		foreach ( $final_array as $key => $final_arr_val ) {
		    //echo $key. " = ". $final_arr_val. "<br>";
			$m = strpos(strtolower($final_arr_val), "measurement");
			if($m >= 1){
				$measurments_value.=$final_arr_val . " \r\n";
			}
			$gt = strpos(strtolower($final_arr_val), "glass thickness");
			if($gt >= 1){
				$glass_thickness_value.=$final_arr_val . " \r\n";
			}
			$gtp = strpos(strtolower($final_arr_val), "glass type");
			if($gtp >= 1){
				$glass_type_value.=$final_arr_val . " \r\n";
			}
			$hf = strpos(strtolower($final_arr_val), "hardware finish");
			if($hf >= 1){
				$hardware_finish_value.=$final_arr_val . " \r\n";
			}
			$chs = strpos(strtolower($final_arr_val), "combo handle size");
			if($chs >= 1){
				$combo_handle_size_value.=$final_arr_val . " \r\n";
			}
			$cts = strpos(strtolower($final_arr_val), "combo towelbar size");
			if($cts >= 1){
				$combo_towelbar_size_value.=$final_arr_val . " \r\n";
			}
			$cs = strpos(strtolower($final_arr_val), "combo style");
			if($cs >= 1){
				$combo_style_value.=$final_arr_val . " \r\n";
			}
			$hs = strpos(strtolower($final_arr_val), "handle style");
			if($hs >= 1){
				$hsv = strpos(strtolower($final_arr_val), "in.");
				if($hsv >= 1){
					$handle_size_value.=$final_arr_val . " \r\n";
				}
			}
			$s = strpos(strtolower($final_arr_val), "style");
			$k = strpos(strtolower($final_arr_val), "knob");
			$h = strpos(strtolower($final_arr_val), "handle");
			if($s >= 1){
			    if($k >= 1 || $h >= 1){
			        $knob_style_value = $final_arr_val;
                }else{
				    $hardware_style_value.=$final_arr_val . " \r\n";
                }
			}
			$tb = strpos(strtolower($final_arr_val), "towel");
			if($tb >= 1){
				$towel_bar_value.=$final_arr_val . " \r\n";
			}
			$ik = strpos(strtolower($final_arr_val), "installation");
			if($ik >= 1){
				$installation_kit_value.=$final_arr_val . " \r\n";
			}

			$skip = array(
				"price",
				"browser",
				"status",
			);
			foreach ( $skip AS $s ) {
				$p = strpos( strtolower( $final_arr_val ), $s );
				//echo "SKIP: ".$s." = ".$p."<br>";
				if ( $p >= 1 ) {
					$replace_strings[] = $final_arr_val;
				}
			}

			$final_value .= $final_arr_val . " \r\n";
//echo "<hr>".$final_arr_val."<hr>";
		}
		$cleanPOST['job_id']     = $job_id;
		$cleanPOST["xnQsjsdp"]   = 'f6675da4f5b64b7c54aeb859879a87ea594e8fefd20d5f521a0288b1f64c3ca9';
		$cleanPOST["zc_gad"]     = '';
		$cleanPOST["xmIwtLD"]    = '9d3bc3a95b188bcc05de1fdd4794542a85874a9955dffae8b506d778e103da93';
		$cleanPOST["actionType"] = 'TGVhZHM=';

		$cleanPOST['Lead Source'] = $_REQUEST['currentuser'];
		$cleanPOST['Designation'] = $_REQUEST['mode_type'];
		//doorbuilder
		//$cleanPOST['LEADCF1']     = $builder_val_0;
		$cleanPOST['LEADCF2'] = $final_value;
		//$cleanPOST['LEADCF3']     = $builder_val_2;
		//Displayed Price
		$cleanPOST['LEADCF67'] = round( $show_price_diff );
		//QuotePrice
		$cleanPOST['LEADCF66'] = round( $show_price_diff );
		//$cleanPOST['Address'] = $_REQUEST['city'].' '.$_REQUEST['state'].", ".$_REQUEST['zip'];
		//$cleanPOST['street'] = $_REQUEST['city'].' '.$_REQUEST['state'].", ".$_REQUEST['zip'];
		//contractor
		$cleanPOST['LEADCF3'] = 'No';
		//i_doortype
		$cleanPOST['LEADCF6']    = 'Frameless Shower Door - ' . $_REQUEST['door_layout'];
		$cleanPOST['Email']      = $_REQUEST['email'];
		$cleanPOST['First Name'] = $_REQUEST['first_name'];
		$cleanPOST['Last Name']  = $_REQUEST['last_name'];
		$cleanPOST['State']      = $_REQUEST['state'];
		/*$cleanPOST['Last Name']  = $_REQUEST['last_name'];*/
		$cleanPOST['Phone']   = $_REQUEST['phone'];
		$cleanPOST['Website'] = $_REQUEST['website'];
		/*$cleanPOST['Zip Code']   = $_REQUEST['zip'];
	    $cleanPOST['City']       = $_REQUEST['city'];*/
		//message
		$cleanPOST['LEADCF1']  = $_REQUEST['message'];
		$cleanPOST['LEADCF43'] = $_SERVER['REMOTE_ADDR'];
		$cleanPOST['LEADCF45'] = $job_id;
		unset( $cleanPOST['stayclean'] );

/*
		$ch = curl_init( "https://crm.zoho.com/crm/WebToLeadForm" );
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1 );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
		//curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");
		curl_setopt( $ch, CURLOPT_POST, 1 );
		curl_setopt( $ch, CURLOPT_POSTFIELDS, $cleanPOST );
		$r = curl_exec( $ch );
		curl_close( $ch );
*/
		// VALUES FOR NEW ZOHO WEBSERVICE
		$cleanPOST['doorbuilder'] = $final_value;
		$cleanPOST['Door Calculator ID'] = $job_id;
		$cleanPOST['message'] = $_REQUEST['message'];
		$cleanPOST['doortype'] = 'Frameless Shower Door - ' . $_REQUEST['door_layout'];
		$cleanPOST['displayed price'] = round( $show_price_diff );
		$cleanPOST['QuotePrice'] = round( $show_price_diff );
		$cleanPOST['Door Calculator URL'] = "www.fsdresourcecenter.com/?job_id=".$job_id;

		$cleanPOST['Door Layout'] = 'Frameless Shower Door - ' . $_REQUEST['door_layout'];
		$cleanPOST['Measurements'] = $measurments_value;
		$cleanPOST['Glass SQFT'] = $_REQUEST['sqft'];
		$cleanPOST['StayCLEAN'] = $_REQUEST['stayclean_option'];
		$cleanPOST['Glass Thickness'] = $glass_thickness_value;
		$cleanPOST['Glass Type'] = $glass_type_value;
		$cleanPOST['Hardware Finish'] = $hardware_finish_value;
		$cleanPOST['Hardware Style'] = $hardware_style_value;
		$cleanPOST['Handle Size'] = $handle_size_value;
		$cleanPOST['Towel Bar'] = $towel_bar_value;
		$cleanPOST['Combo Handle Size'] = $combo_handle_size_value;
		$cleanPOST['Combo Towelbar Size'] = $combo_towelbar_size_value;
		$cleanPOST['Combo Style'] = $combo_style_value;
		$cleanPOST['Installation Kit'] = $installation_kit_value;
		$cleanPOST['Lead Type'] = "Door Designer";
		$cleanPOST['Knob Style'] = $knob_style_value;

		$dragonURL = "http://www.fsdresourcecenter.com/?job_id=".$job_id;

		if ( is_user_logged_in() ) {

			$current_user = wp_get_current_user();
			if ( $current_user->roles[0] == 'sales_rep' || $current_user->roles[0] == 'administrator' || $current_user->roles[0] == 'franchisee' ) {
				$current_user_role = $current_user->roles[0];
			} else if ( $current_user->roles[1] == 'sales_rep' || $current_user->roles[1] == 'administrator' || $current_user->roles[1] == 'franchisee' ) {
				$current_user_role = $current_user->roles[1];
			}

			//echo "Current User Role: ".$current_user_role."<hr>";exit;

			if ( $current_user_role == 'franchisee' ) {
                // VONIGO WEB SERVICE
				// Values for VONIGO API
				$cleanPOST['Type'] = "59";
				$cleanPOST['Status'] = "61";
				$name = $last_name . ", " . $first_name;
				$cleanPOST['Name'] = $name;
				$cleanPOST['Door Calculator Link'] = "http://www.fsdresourcecenter.com/?job_id=".$job_id;
				$cleanPOST['Stage'] = "64";
				$cleanPOST['builderNotes'] = $cleanPOST['doortype'] . "\r\n" . $cleanPOST['doorbuilder'];


				$vonigo = ARRAY();
				$vonigoClient = ARRAY();

				foreach($replace_strings AS $S){
					$cleanPOST['doorbuilder'] = str_replace($S, "", $cleanPOST['doorbuilder']);
                }

				$vonigo['Zoho ID'] = "";
				$vonigo['Type'] = "59";
				$vonigo['Status'] = "61";
				$vonigo['Name'] = $name;
				$vonigo['Door Calculator Link'] = "http://www.fsdresourcecenter.com/?job_id=".$job_id;
				$vonigo['Stage'] = "64"; // 64 = Lead, 65 = Account
				$vonigo['Marketing Campaign'] = "10318"; // 10158 = Internet, 10317 = Floor & Decor, 10318 = Door Builder
				$vonigo['builderNotes'] = $cleanPOST['doortype'] . "\r\n" . $cleanPOST['doorbuilder'];
				$vonigo['Contact Number'] = $_REQUEST['phone'];
				$vonigo['Contact Email'] = $_REQUEST['email'];
				$vonigo['Main Address'] = $_REQUEST['city'].' '.$_REQUEST['state'].", ".$_REQUEST['zip'];
				$vonigo['zip'] = $_REQUEST['zip'];
				$vonigo['quote'] = round( $show_price_diff );
				$vonigo['doorType'] = $cleanPOST['doortype'];

				$vonigoClient[96] = $_REQUEST['phone']; //Phone 2
				$vonigoClient[97] = $_REQUEST['email']; //Email
				$vonigoClient[125] = '71'; //Status
				$vonigoClient[127] = $first_name; //First Name
				$vonigoClient[128] = $last_name; //Last Name
				$vonigoClient[134] = '75'; //Salutation
				$vonigoClient[211] = ''; //Job Title
				$vonigoClient[1088] = $_REQUEST['phone']; //Phone
				$vonigoClient[1090] = $_REQUEST['email']; //Notes
				$vonigoClient[9795] = $name; //Account Name

				require_once( get_template_directory() . "/class/vonigo.php" );
				$tovonigo = new vonigo_class();
				//$info = $tovonigo->getInfo($vonigo);
				$insertQuote = $tovonigo->insertQuote($vonigo);

				//$insertLead = $tovonigo->insertLeadItem($vonigo);

				//$vonigoClient['clientID'] = $insertLead;
				//$cleanPOST['vonigoID'] = $insertLead;
				$cleanPOST['vonigoID'] = "Vonigo";

				//$insertClient = $tovonigo->insertContact($insertLead,$vonigoClient);

			}else{

				// NEW INSERT WEB SERVICE
				require_once( get_template_directory() . "/class/zoho.php" );
				$zoho = new fsd_zoho();
				$sales_email = $_REQUEST['sales_email'];
                $userID = $zoho->get_admin_id($sales_email);
                if($userID > 0 || strlen($userID) > 2){
	                $cleanPOST['SMOWNERID']= $userID;
                }
				$xml = $zoho->create_xml($cleanPOST);
				$insert = $zoho->insertLead($xml);
				$zohoID = $zoho->getLeadID($insert);
				$cleanPOST['zohoID'] = $zohoID;
            }

		}

		//print_r($cleanPOST);

		// insert into Door Builder (Dragon)
		$dragon->createJob( $cleanPOST );
	}

	global $wpdb;
	$table_name      = $wpdb->prefix . 'internal_builder';
	$configuration   = base64_encode( serialize( $final_array ) );
	$custom_hardware = base64_encode( serialize( $custom_hardware_arr ) );


	$wpdb->query( "INSERT INTO " . $table_name . " (quote_id_req, userid, productid, door_layout, first_name, last_name, email, comments, product_img, configuration, first_name_sales, last_name_sales, sales_email, phone_number_sales, sales_shipping,sqftclean, installation_price, show_price_diff, stayclean_option, stayclean_before_discount, stayclean_discount_per, stayclean_discount_total, sales_crating, door_before_discount,  door_discount_per, door_discount_total, custom_hardware, outside_sales, additional_charge) VALUES ('$unique_id', '$userid', '$pid', '$door_layout_nm', '$first_name', '$last_name', '$email', '$message', '$product_img', '$configuration', '$first_name_sales', '$last_name_sales', '$sales_email', '$phone_number_sales', '$sales_shipping', '$sqftclean', '$installation_price[0]','$show_price_diff', '$stayclean_option', '$stayclean_before_discount',  '$stayclean_discount_per', '$stayclean_discount_total', '$sales_crating','$door_before_discount'  ,'$door_discount_per' ,'$door_discount_total', '$custom_hardware', '$outside_sales', '$additional_charge')" );

	global $frame_breadcumb;

	$hide_discount     = get_option( 'hide_discount_option' );
	$form_redirect_url = site_url() . '/download-pdf/';

	?>

    <!-- #Container Area -->
    <div style="background:#ffffff !important; width:100%">
        <div class="container">
            <div class=""> <!-- row -->
                <div class="col-md-12 page-content"
                     style="padding:0; padding-top:10px; text-align:center;  background-color:transparent !important;">
                    <div class="row">
                        <div id="5875" class="twoColbg">

                            <div id="attribute-option-14" data-rel="recap"
                                 class="row setup-content_step recap build-showerdoor">
                                <h1 style="color:#333333 !important;">Thank you for building your Installation Easy™
                                    Shower Door.</h1>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="form-left">
                                            <div class="light-well well text-center">
                                                <div id="starburst">
                                                    <h1 style="color:#333333 !important;">
                                                        <nobr>Thank you for building your shower door today.</nobr>
                                                        <span class="glasssqft-options">  Glass SQFT <small></small></span>
                                                    </h1>

                                                    <h2>
                                                        <nobr>Total Material Price:
                                                            <b>$<?php echo round( $show_price_diff ); ?></b></nobr>
                                                    </h2>

													<?php if ( $discount_txt ) { ?>

                                                        <table id="discount-til-sect"
                                                               data-re_dist="<?php if ( $hide_discount == 'hide' ) {
															       echo 'dist-tild-opt';
														       } ?>">
                                                            <tr>
                                                                <td width="100" align="left"><span>Total Price: </span>
                                                                </td>
                                                                <td width="100" align="left"><span
                                                                            class="total_price empty_sect"><?php echo $before_dis_price; ?></span>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td width="100" align="left"><span>Discount: </span>
                                                                </td>
                                                                <td width="520" align="left">
                                                                    <span class="discounted_amt empty_sect"><?php echo $discount_price; ?></span>
                                                                    <span class="discount_amt_val empty_sect"> (<?php echo $discount_txt; ?>
                                                                        : </span>
                                                                    <span class="discount_description_val empty_sect"><?php echo $discount_description; ?>
                                                                        )</span>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td width="100" align="left"><span>Final Price: </span>
                                                                </td>
                                                                <td width="100" align="left"><span
                                                                            class="final_price empty_sect"><?php echo $final_price; ?></span>
                                                                </td>
                                                            </tr>

                                                        </table>

													<?php } ?>

													<?php if ( $mode_type == 'Builder' ) { ?>
                                                        <form class="dwnld_pdf"
                                                              action="<?php echo $form_redirect_url; ?>" method="post">
                                                            <input type="hidden" name="quote_id"
                                                                   value="<?php echo $unique_id; ?>"/>
                                                            <input type="submit" value="Download" name="download_pdf"
                                                                   class="form-input" style="color: #ffffff !important;"/>
                                                        </form>

                                                        <form class="print_pdf"
                                                              action="<?php echo $form_redirect_url; ?>" method="post">
                                                            <input type="hidden" name="quote_id"
                                                                   value="<?php echo $unique_id; ?>"/>
                                                            <input type="submit" value="Print" name="print_pdf"
                                                                   class="form-input" style="color: #ffffff !important;"/>
                                                        </form>
													<?php } ?>

                                                    <div class="install_easy_wrapper">
                                                        <div class="install_easy">
                                                            <img src="/wp-content/themes/frameshowerdoors/images/Fragile_Box-logo_13_Final.png">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12"><a href="<?php echo $dragonURL; ?>" style="border: 1px solid black; padding: 20px; border-radius: 5px; font-size: 2em; background:#D4D3D3">Measure Your Door Now</a></div>
                                                    </div>
                                                    <!--<p style="margin: 20px 0px 20px 0px; padding: 20px;">
                                                        <button class="js-textareacopybtn" style="vertical-align:top;">Copy the Door Builder Link and Email it to the Customer</button>
                                                        <textarea class="js-copytextarea">< ?php /*echo $dragonURL; */?></textarea>
                                                    </p>
                                                    <script>
                                                        var copyTextareaBtn = document.querySelector('.js-textareacopybtn');

                                                        copyTextareaBtn.addEventListener('click', function(event) {
                                                            var copyTextarea = document.querySelector('.js-copytextarea');
                                                            copyTextarea.select();

                                                            try {
                                                                var successful = document.execCommand('copy');
                                                                var msg = successful ? 'successful' : 'unsuccessful';
                                                                console.log('Copying text command was ' + msg);
                                                            } catch (err) {
                                                                console.log('Oops, unable to copy');
                                                            }
                                                        });
                                                    </script>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 form-right">
                                    <div class="row"> <?php
										if ( have_posts() ) :
											while ( have_posts() ) : the_post(); ?>
                                            <div <?php post_class( 'single-post-listing' ); ?>
                                                    id="post_<?php the_ID(); ?>">
                                                <div class="post-tile clearfix">
                                                    <div class="entry-title">
                                                        <a class="previewTitle" href="<?php the_permalink(); ?>"
                                                           title="<?php the_title(); ?>"> <?php echo $door_layout_nm; ?>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="entry">
													<?php
													echo '<img src="' . $product_img . '" alt="second image"/>';
													?>
                                                </div>

                                                <div class="total_vall">
                                                    <div id="priceItem" class="col-xs-12 recapItem priceItem">
                                                        <div class="list-group recap-list">
                                                            <div class="col-xs-12">
                                                                <h4 class="list-group-item-heading count title">Your
                                                                    Shower Door Configuration</h4>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="sqft_gls">
                                                        <ul>
															<?php
															foreach ( $builder as $key => $builder_val ) {
																$builder_value = explode( "-", $builder_val );
																$builder_val   = stripslashes( $builder_value[1] );
																?>
                                                                <li>
                                                                    <span class="option_head"> <?php echo $builder_value[0]; ?></span>
                                                                    <span class="options_price"><?php echo $builder_val; ?> </span>
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
    </div>

	<?php
	get_footer( 'builder' );
} else {
	header( "Location: " . site_url() );
	exit();
}
?>