<?php

/*Template Name:Download PDF No CRM*/

			ob_start();

			echo $quote_id = $_REQUEST['quote_id'];

			if($quote_id){

				global $wpdb;

				$table_name    = $wpdb->prefix . 'internal_builder';
				$se = "select * from ".$wpdb->prefix."internal_builder where quote_id_req LIKE '%$quote_id%'";
				$re = $wpdb->get_results($se);
				$installation_kit_nm = $total_price = $builder = $return_configuration = $return_price = $return_string = '';

				foreach($re as $k => $rowe) // = mysql_fetch_object($re))
				{
					$quote_id_req 	= $rowe->quote_id_req;
					$userid 		= $rowe->userid;
					$product_id 	= $rowe->productid;
					$door_layout 	= $rowe->door_layout;
					$first_name 	= $rowe->first_name;
					$last_name 		= $rowe->last_name;
					$email 			= $rowe->email;
					$comments 		= $rowe->comments;
					$product_img 	= $rowe->product_img;
					$glass_sqft_img = $rowe->glass_sqft_img;
					$mode_type 		= $rowe->mode_type;
					$configuration 	= $rowe->configuration;
					$custom_hardware 	= $rowe->custom_hardware;
					$show_price_diff 	= $rowe->show_price_diff;
					$stayclean_option 			= $rowe->stayclean_option;
					$stayclean_before_discount 	= $rowe->stayclean_before_discount;
					$stayclean_discount_per 	= $rowe->stayclean_discount_per;
					$stayclean_discount_total 	= $rowe->stayclean_discount_total;
					$door_before_discount 	= $rowe->door_before_discount;
					$door_discount_per 		= $rowe->door_discount_per;
					$door_discount_total 	= $rowe->door_discount_total;
					$first_name_sales 		= $rowe->first_name_sales;
					$last_name_sales 		= $rowe->last_name_sales;
					$sales_email 			= $rowe->sales_email;
					$phone_number_sales 	= $rowe->phone_number_sales;
					$sales_shipping 		= $rowe->sales_shipping;
					$sales_crating 			= $rowe->sales_crating;
					$stayclean 		= $rowe->sqftclean;
					$installation_price 	= $rowe->installation_price;
					$outside_sales 	= $rowe->outside_sales;

					$configure = unserialize(base64_decode($configuration));
					$custom_hrdwr = unserialize($custom_hardware);
				}


				$username 		= 	get_user_meta( $userid, 'nickname', true );
				$userinfo 		= get_userdata( $userid );
				$usermail 		= $userinfo->user_email;
				$userphone 		= 	get_user_meta( $userid, 'billing_phone', true );
				$designation 	= 	get_user_meta( $userid, 'designtn', true );
				$glass_sqft_img   =   get_post_meta( $product_id, 'tinfini_gls_sqft_image', true );
				$product_image 	= 	get_post_meta( $product_id, '_product_image_gallery', true );
				if($product_image == ''){
					$product_image = '11971';
				}
				
				$gallery_id 	= 	get_post_meta( $product_id, '_internal_builder_gallery_id', true );
				if($gallery_id == ''){
					$gallery_id = 'category11969';
				}

				$image_link = wp_get_attachment_url( $product_image );

				if($configure){
					foreach ($configure as $config_key => $config_val) {
						$builder_value 	=  	explode("-",$config_val);
						$builder_val 	= 	str_replace(' ', '', $builder_value[0]);

						if($builder_val == 'browser' || $builder_val == 'DoorType' || $builder_val == 'OrderStatus' || $builder_val == 'Price'){
													
						}
						else if($builder_val == 'InstallationKit'){
							$installation_kit_nm = $builder_value[1];
						}
						else if($builder_val == 'StaycleanOption'){
							$StaycleanOption = $builder_value[1];
						}
						else{
							echo $return_configuration .= '<tr><td align="left" style="width:300px; font-size:11px;">'.$builder_value[0].'</td><td style="font-size:11px;">'.$builder_value[1].'</td></tr>';
						}

					}
				}
				
				
				// Sales Shipping
				if($sales_shipping){
					$shipping_price = '<tr><td align="left" style="width:300px; font-size:11px"><b>Shipping Price</b></td><td style="font-size:11px;"><b>$'.$sales_shipping.'</b></td></tr>';
				}
				// Slase Crating
				if($sales_crating){
					$crating_price = '<tr><td align="left" style="width:300px; font-size:11px;"><b>Crating Price</b></td><td style="font-size:11px;"><b>$'.$sales_crating.'</b></td></tr>';
				}
				// Custom Hradware
				foreach ($custom_hrdwr as $custom_hrdwr_key => $custom_hrdwr_val) {
					$cstm_hardware_price += $custom_hrdwr_val;
					$cstm_hardware .= '<tr><td align="left" style="width:300px; font-size:11px;"><b>'.$custom_hrdwr_key.'</b></td><td style="font-size:11px"><b>$'.$custom_hrdwr_val.'</b></td></tr>';
				}


				$coreprice = '';
				if(trim($StaycleanOption) == 'Yes'){
					$coreprice = (round($show_price_diff) - $stayclean) - $installation_price;
				}else if($installation_price){
					$coreprice = round($show_price_diff) - $installation_price;
				}
				if($coreprice == ''){
			 		$coreprice = round($show_price_diff);
			 	}
				// Door Discount
				if($door_before_discount){
					$price_configuration .= '<tr><td></td></tr><tr><td style="font-size:12px;color: #004044;"><b>Door discount</b></tr></td>';
					$price_configuration .= '<tr><td align="left" style="width:300px; font-size:11px;">Door Price</td><td style="font-size:11px;">'.$door_before_discount.'</td></tr>';
					$price_configuration .= '<tr><td align="left" style="width:300px; font-size:11px;">Door Discount</td><td style="font-size:11px;">'.$door_discount_per.'%</td></tr>';
					$price_configuration .= '<tr><td align="left" style="width:300px; font-size:11px;"><b>Door Total</b></td><td style="font-size:11px;"><b>$'.round($door_discount_total,2).'</b></td></tr>';
				}else{
					//$price_configuration .= '<tr><td align="left" style="width:300px; font-size:11px;">Door Price</td><td style="font-size:11px;">$'.$coreprice.'--------'.$quote_id.'</td></tr>';
					$price_configuration .= '<tr><td align="left" style="width:300px; font-size:11px;"><b>Door Price</b></td><td style="font-size:11px;"><b>$'.$coreprice.'</b></td></tr>';
				}

				// Staclean Discount
				if(trim($StaycleanOption) == 'Yes'){
					if($stayclean_discount_per){
						$price_configuration .= '<tr><td></td></tr><tr><td style="font-size:12px;color: #004044;"><b>Stayclean discount</b></tr></td>';
						$price_configuration .= '<tr><td align="left" style="width:300px; font-size:11px;">StayClean Price</td><td style="font-size:11px;">'.$stayclean_before_discount.'</td></tr>';
						$price_configuration .= '<tr><td align="left" style="width:300px; font-size:11px;">StayClean Discount</td><td style="font-size:11px;">'.$stayclean_discount_per.'%</td></tr>';
						$price_configuration .= '<tr><td align="left" style="width:300px; font-size:11px;"><b>StayClean Total</b></td><td style="font-size:11px;"><b>'.$stayclean_discount_total.'</b></td></tr><br/>';
					}else{
						//$price_configuration .= '<tr><td></td></tr><tr><td style="font-size:12px;color: #004044;"><b>Stayclean</b></tr></td>';
						$price_configuration .= '<tr><td align="left" style="width:300px; font-size:11px;"><b>Stayclean</b></td><td style="font-size:11px;"><b>'.$StaycleanOption.' $'.$stayclean.'</b></td></tr>';
					}
				}
				else if(trim($StaycleanOption) == 'No'){
					$price_configuration .= '<tr><td></td></tr><tr><td align="left" style="width:300px; font-size:11px;"><b>Stayclean</b></td><td style="font-size:11px;">'.$StaycleanOption.'</b></td></tr>';
				}

				//Installation Price;
				if($installation_price){
					$price_configuration .= '<tr><td></td></tr><tr><td align="left" style="width:300px; font-size:11px;"><b>Installation Kit Price</b></td><td style="font-size:11px;"><b>'.$installation_kit_nm.' $'.$installation_price.'</b></td></tr>';	
				}else{
					$price_configuration .= '<tr><td></td></tr><tr><td align="left" style="width:300px; font-size:11px;"><b>Installation Kit</b></td><td style="font-size:11px;">'.$installation_kit_nm.'</b></td></tr>';
				}

				if($outside_sales == 1){
					$cover_page_img = 'outsidepdf-coverpage.jpg';
				}else{
					$cover_page_img = 'pdf-cover-page.jpg';
				}

				$builder 		= 	round($show_price_diff);
				$sales_shipping = 	floatval($sales_shipping);
				$sales_crating = 	floatval($sales_crating);
				$builder  		= 	floatval($builder);
				$cstm_hardware_price  		= 	floatval($cstm_hardware_price);
				$total_price 	= 	$sales_shipping + $builder + $sales_crating + $cstm_hardware_price;
				$return_price .= '<tr><td align="left" style="font-size:15px; color: #004044;width:300px"><b>Total</b></td><td style="font-size:15px; color: #004044"><b>$'.$total_price.'</b></td></tr>';

				
				
				$return_string .='<div class="ex-door" >
									<div class="ex-img">
										<img src="'.get_template_directory().'/images/'.$cover_page_img.'">
										<div class="row foot clear" style="position:absolute;bottom:0; margin-top:-2px;background-color: #56BDC2; color: #ffffff; font-size: 15px; padding: 3px 0 38px; text-align: center;">
											<div class="footer" style="text-align:center;color:#fff;">
												<p>&nbsp;</p>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="container clear">
										<div class="head clear">
											<div class="logo" style="padding-top:0px;">
												<img src="'.get_template_directory().'/images/pdf_logo.jpg">
											</div>
													<div class="quotation">
														<h2>QUOTATION</h2>
														<span><b>Date:</b> '.date("m/d/Y").'</span>
													</div>
												</div>
											</div>
											<div class="qoute-detail clear">
												<span id="attention" style="font-size:16px; color:#004245"><b>For the attention of:</b> '.ucwords($first_name).' '.ucwords($last_name).'</span>
												  <h2 style="margin: 10px 0 5px -2px"><b>QUOTE DETAILS</b></h2>
												  <table style="width:930px; margin-left:-5px;" align="left">
													<tbody>
													<tr class="clear">
												    	<td style="font-size:14px"><b>Door Type</b></td>
												    	<td style="font-size:14px"><b>'.$door_layout.'</b></td>
												  	</tr>
												  	'.$return_configuration.'
												  	'.$price_configuration.'
												  	'.$shipping_price.'
												  	'.$crating_price.'
												  	'.$cstm_hardware.'
												   	</tbody>
												  </table>
												  <hr>
												  <table style="width:930px;margin-left:-5px;">
													<tbody>
												  	'.$return_price.'								  	
												 	</tbody>
												  </table>
											</div>
											<div class="door-image">
												<img id="door" style="width: auto; height: auto;" src="'.$glass_sqft_img.'">
											</div>
										</div>
									</div>
								</div>

								<div class="row example clear" style="background: #e9ebea none repeat scroll 0 0;padding:15px 20px;">
									<div class="container clear">
										<div class="ex-door1">
											<div class="ex-text" >
												<h3 style="margin:0 0 1px 0;font-size: 14px; font-weight:bold; color:#004245;">DOOR EXAMPLE</h3>
												<h4 style="margin:0 0 1px 0;font-size: 9px; font-weight:bold; color:#000;">Visit our gallery at:</h4>
												<h5 style="margin:0 0 10px 0;font-size: 10px; color:#000;"><a href="www.framelessshowerdoors.com/gallery/?catidd='.$gallery_id.'" style="font-size: 11px; text-decoration:none;color:#000;">www.framelessshowerdoors.com/gallery/?catidd='.$gallery_id.'</a></h5>
											</div>
											<div class="ex-img">
												<img style="height: 185px;" src="'.$image_link.'">
											</div>
										</div>
										<div class="note">
											<h3 style="font-size: 14px; font-weight:bold; color:#004245;">NOTES</h3>
											<div class="note-txt" style="height: 2.4cm; overflow-y:scroll;">
												<p style="margin:0; color:#000;">
													'.$comments.'
												</p>
											</div>
											<div class="info clear" style="padding: 5px;">
												<div id="do_hope clear">
													<p style="margin:0;">
														I do hope that you find the quote satisfactory. Should
														you require any further information please do not
														hesitate to contact me.
													</p>
												</div>
												<div class="thank">
													<h4 style="margin:7px 0 0 0;font-size: 10px;">Thank You,</h4>
													<p style="margin:0;">
														'.$first_name_sales.' '.$last_name_sales.'<br/>
														<p style="font-style: italic; margin:0;">'.$designation.'</p>
													</p>
												</div>
												<div class="contact">
													<h4 style="margin:7px 0 0 0;font-size: 10px;">Contact Info:</h4>
													<p style="margin:0;">
														'.$phone_number_sales.'<br/>
														'.$sales_email.'
													</p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row foot clear" style="position:absolute;bottom:0; background-color: #3b393a; color: #ffffff; font-size: 14px; padding: 0 0 4px; text-align: center;">
									<div class="footer" style="text-align:center;color:#fff;">
										<p style="color:#fff;margin:7px 0;"><b>The Original Frameless Shower Doors</b><br>We are changing the way buying a shower door is done.&#8482;</p>
									</div>
								</div>';

 				$stylesheet ='<style type="text/css">
					*{
						margin: 0;

					}
					body {
						background: #e9ebea none repeat scroll 0 0;
					    font-family: "Open Sans",Arial,Helvetica,sans-serif;
					    color: #333;
					    font-size: 13px;
					    line-height: 1.42857;
					}
					.row {
						background: #fff none repeat scroll 0 0;
					    box-sizing: border-box;
					    margin: 0 auto;
					    padding: 0 22px;
					    width: 100%;
					}
					ul {
					    padding: 0;
					}
					.container{
						width: 100%;
						padding: 5px;
					}
					.ex-door {
					    float: left;
					    width: 100%;
					    padding:0;
					}
					.ex-door1 {
					    float: left;
					    width: 49%;
					}
					.head{
						width: 100%;
						border-bottom: 2px solid #004044;
						padding-bottom: 5px;
						padding-top:5px !important;
					}
					.logo {
					    width: 50%;
					    float: left;
					}
					.quotation {
					    width: 50%;
					    float: left;
					    text-align: right;
					}
					.qoute-detail {
					    width: 60%;
					    float: left;
					}
					.clear{
						clear: both;
					}
					 .clear:after {
						clear: both;
					    content: ".";
					    display: block;
					    height: 0;
					    visibility: hidden;
					}
					.clear {
					    display: inline-block;
					}
					.clear {
					    display: block;
					}
					.main{

					    width: 100%;
					}
					
					.door-image {
					    width: 40%;
					    float: left;
					    padding-top: 27px;
					}
					#door {
					    padding-left: 55px;
					}
					#deatil-table{
						padding-top: 10px;
					}
					caption{
						padding-top: 10px;
						text-align: left;
					}
					.row.example {
					    background-color: #E8EAE9;
					}
					.ex-door.clear {
					    width: 50%;
					    float: left;
					}
					.note {
					    width: 46%;
						margin-top:-18px;
					    float: right;
					}
					.note-txt {
					    background-color: #ffffff;
					    border: 1px solid #707070;
					    font-size: 11px;
					    min-height: 4.4cm;
					    overflow-y: scroll;
					    padding: 9px;
					}
					.info {
					    background-color: #004044;
					    color: #ffffff;
					    font-size: 11px;
					    padding: 10px;
					    margin-top: 15px;
					}
					.thank {
					    width: 50%;
					    float: left;
					}
					.contact {
					    width: 50%;
					    float: left;
					}
					.row.foot.clear {
					    background-color: #3B393A;
					    color: #ffffff;
					    text-align: center;
					}
					ul li {
					    clear: both;
					    display: block;
					    float: left;
					    list-style: outside none none;
					    padding: 4px 0;
					    width: 100%;
					}
					li:last-child {
					    border-top: 1px solid #157C81; margin: 10px 0 0; padding: 10px 0 0;
					}
					ul li span:first-child {
					    float: left;
					    text-align: left;
					    font-size:14px;
					    width: 64%;

					}
					ul li span:last-child {
					    float: right;
					    text-align: left;
					    width: 17%;
					    font-size:14px;
					}
					li span b {
					    font-size: 15px;
					}
					h2 b {
					    font-size: 15px;
					}
					#attention > b {
					    font-size: 17px;
					}
					h2 {
					    margin: 8px 0 8px;
					}
					hr {
					    background: #004044 none repeat scroll 0 0;
					    border: medium none;
					    height: 2px;
					    margin: 2px;
					}
					table tr td{
						line-height:20px;
					}				
				</style>';


					// echo $stylesheet;
				 // echo $return_string;
				 // die();

				require(get_template_directory()."/mPDF/mpdf.php");
			    $mpdf=new mPDF('c','A4','','' , 0 , 0 , 0 , 0 , 0 , 0);  
			    $mpdf->SetDisplayMode('fullpage');
			    $mpdf->list_indent_first_level = 0; 
			    $mpdf->WriteHTML($stylesheet,1);
			    $mpdf->WriteHTML($return_string);

			    if(isset($_POST['print_pdf'])){
			    	ob_clean();
			    	$mpdf->Output();
			    }else{
			    	ob_clean();
			    	$mpdf->Output('door_layout.pdf', 'D');
			    }
			    

			}

//		}
?>
