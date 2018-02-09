<?php
/*Template Name: Kiosk Thank You */
	get_header('kiosk2');

if(isset($_GET['show_price_diff']) && !empty($_GET['show_price_diff'])) {
?>
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
	/*Other Details For Product*/
	$builder_0 				= $_GET['builder_0'];
	$builder 				= $_GET['builder'];
	$builder_2 				= $_GET['builder_2'];
	$product_img 			= $_GET['product_img'];
	echo $show_price_diff 		= $_GET['show_price_diff'];
	$door_layout_nm 		= $_GET['door_layout'];
	$FDLocation 		= $_GET['FDLocation'];
	if(!$FDLocation){
		$FDLocation = 'No city';
	}
	$unique_id = uniqid().$final_price;

	//$door_layout = $door_layout_nm.' - Door Builder';
    $mode_type = 'kiosk';

	if(isset($_GET['show_price_diff']) && !empty($_GET['show_price_diff'])){

		$final_array = $builder_val_1 = array();
		$final_value = $builder_val_2 = $builder_val_0 = $builder_value = '';

		foreach ($builder as $key => $builder_val) {
			$builder_value  .=  $builder_val. " \r\n";
		}

		$builder_val_1 = array_merge($builder_0,$builder_2);
		$final_array = array_merge($builder,$builder_val_1);

		foreach ($final_array as $key => $final_arr_val) {
			$final_value .=  $final_arr_val. " \r\n";
		}		

	    $cleanPOST["xnQsjsdp"]   = 'f6675da4f5b64b7c54aeb859879a87ea594e8fefd20d5f521a0288b1f64c3ca9';
	    $cleanPOST["zc_gad"]     = '';
	    $cleanPOST["xmIwtLD"]    = '9d3bc3a95b188bcc05de1fdd4794542a66afe428213601b4db690c972dd36a91';
	    $cleanPOST["actionType"] = 'TGVhZHM=';
	  
	    $cleanPOST['Lead Source'] = $_GET['currentuser'];
	    $cleanPOST['Designation']  = $mode_type;
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
	    $cleanPOST['LEADCF12'] = $FDLocation;
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
	global $frame_breadcumb;
	$hide_discount = get_option('hide_discount_option');
?>

<!-- #Container Area -->

<div class="container limit-tiled-sect" style="background:url(/newkiosk/images/flogo.png) no-repeat; 	background-position:bottom; 	background-size:cover; margin-top:30px;">
	<div class=""> <!-- row -->
		<div class="col-md-12 page-content" style="padding:0; padding-top:10px; text-align:center;  background-color:transparent !important;">
			<div class="row">
				<div id="5875" class="twoColbg">

					<div id="attribute-option-14" data-rel="recap" class="row setup-content_step recap build-showerdoor">
					    <h1>Thank you for building your Installation Easy™ Shower Door.</h1>
					    <div class="col-sm-8">
						    <div class="row">
						        <div class="form-left">
						            <div class="light-well well text-center">                      
						                <div id="starburst"><img src="https://www.framelessshowerdoors.com/wp-content/uploads/2016/06/flooranddecor.jpg" width="80%" />
						                    <h1>Thank you for building your <br>shower door today.
						                        <span class="glasssqft-options">  Glass SQFT <small></small></span>
						                    </h1>
						                       
						                    <h2 style="color:#000000 !important;"><nobr>Total Material Price: <b>$<?php echo round($show_price_diff);  ?></b></nobr></h2>
						                    

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
						                        
												<div class="install_easy">
												<img src="<?php bloginfo('template_url'); ?>/images/Fragile_Box-logo_13_Final.png">
											</div>

						                            <center style="margin-bottom:22px;">
													<b> We will be there for you every step of the way. <br>
													From measure to install "we've got your back"! </b>
												</center>
												<center>
													<p> Thank you for choosing The Original Frameless Shower Doors, the only “Direct from the manufacturer” shower door company!<br>
													<br> <span style="font-size: 26px; font-weight:bold">(855) 372 6537</span>												</p>
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
<?php }else{
	$FDLocation_name =  $_GET["FDLocation"];
	$discount_kiosk	=	$_REQUEST['56_temp']; 
?>

<div class="container limit-tiled-sect steam-contact-thanku" style="background:url(/newkiosk/images/flogo.png) no-repeat; 	background-position:bottom; 	background-size:cover; margin-top:30px;">
	<div class=""> <!-- row -->
		<div class="col-md-12 page-content" style="padding:0; padding-top:10px; text-align:center;  background-color:transparent !important;">
			<div class="row">
				<div id="thankyou-info">
					<h1></h1>
					<h1></h1>
					<h1 style="text-align: center;">Thank you.</h1>
					<h1></h1>
					<h4 style="text-align: center;">We'll get back to you soon</h4>
					<div style="text-align: center;" class="row">
						<a href="<?php echo site_url();?>/fdkiosk/kiosk/?FDLocation=<?php echo $FDLocation_name; ?>&56_temp=<?php echo $discount_kiosk;?>" style="float: none; margin-top: 20px;" class="btn">Build Door</a>
						</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<?php get_footer('builder');  ?>