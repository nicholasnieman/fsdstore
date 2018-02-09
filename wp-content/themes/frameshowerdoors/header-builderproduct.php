<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en"><head>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/bootstrap.css"  />
		<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
       <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<meta name="googlebot" content="noindex">  
 
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<?php wp_get_archives('type=monthly&format=link'); ?>
		<meta name="viewport" content="initial-scale=1, maximum-scale=1">
		<link href='//fonts.googleapis.com/css?family=Cardo:400,700,400italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link href='//fonts.googleapis.com/css?family=Lato:400,300,700,900' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
		<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/fav/favicon.ico" type="image/vnd.microsoft.icon"/>
		<link rel="icon" href="<?php bloginfo('template_url'); ?>/images/fav/favicon.ico" type="image/x-ico"/>
        <link rel="stylesheet" type="text/css" href="/wp-content/themes/frameshowerdoors/css/owl.theme.css" />
          <link rel="stylesheet" type="text/css" href="/wp-content/themes/frameshowerdoors/css/owl.carousel.css" />
          <script src="/wp-content/themes/frameshowerdoors/js/owl.carousel.js"></script>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script> 
       
		
		<style type="text/css">
	
html, body {height:100vh; 
background:#439ca1;

}
      #stepNavigation {display:none;}
       .single-tild-sect {background:#ffffff !important;} 
        .footer_top {display:none;}
		/*.single-tild-sect {height: 100vh;}*/
		/*.single-tild-sect {height: 123vh;}*/
		
		.builder_sect .builder-mode .single-tild-sect {height: auto;}
		
		.DYIcontent ul li {

    list-style:square; 
	margin-left:25px;
	font-size:14px;
	line-height:24px;
	font-family: "Open Sans",Arial,Helvetica,sans-serif;
	
 
}

.header_area .container{
    width: 100%;
 }
#builder-mode  .door_type_menu li a {
	background: transparent none repeat scroll 0 0;
	color: #1e2223;
	font-size: 16px;
	text-decoration: none;
	padding: 30px;
	text-shadow: none;
	text-align:left;
}


 .header_area{
    background: rgb(76,175,179);
    padding-top: 27px;
    padding: 15px;
	text-align:left;
	border-bottom:8px solid #026267;
 }
 .header_logo p{
    color: #fff;
    font-size: 18px;
	text-align:left;
 }
 
 
 .twoColbg {height: 100vh !important; background:none !important;  width: 100%; }
.mains .twoColbg {
	background:none !important;
	overflow: hidden;
}
        </style>
        
        
	</head>
	<body <?php body_class(); ?> >
	<?php wp_head(); ?>

<?php

/*For Builder and Kiosk Page*/
if( isset($_GET['mode'])){
	$framework =  $_GET["mode"];	
}
/*For Thankyou Page*/
if( isset($_GET['mode_type'])){
	$thnq_mode =  $_GET["mode_type"];	
}
/*Add class on Builder header*/
if($framework == 'builder' || $thnq_mode == 'Builder'){
	$class_name = 'builder_sect';
}

$FDLocation=$_REQUEST['FDLocation'];
$discount_kiosk = $_REQUEST['56_temp'];

/*Creating URL to redirect*/
if (is_page(11842) && is_page( 'kiosk' ) || $framework == "kiosk" || $framework == "kiosk/" ){
	if($FDLocation){
		$builddoor_url = '/index/kiosk/?FDLocation='.$FDLocation.'&56_temp='.$discount_kiosk;
		//$builddoor_url = '/index/kiosk/?FDLocation='.$FDLocation;
	}else{
		$builddoor_url = '/index/kiosk/';
	}
	
}else if( is_page(11801) && is_page( 'builder' ) || $framework == "builder" || $framework == "builder/" ){
	$builddoor_url = '/builder/';
}
/*Creating URL to redirect for Thnaku Page*/
if ($thnq_mode == "Kiosk" ){
	if($FDLocation){
		$builddoor_url = '/index/kiosk/?FDLocation='.$FDLocation.'&56_temp='.$discount_kiosk;
		//$builddoor_url = '/index/kiosk/?FDLocation='.$FDLocation;
	}else{
		$builddoor_url = '/index/kiosk/';
	}
}else if( $thnq_mode == "Builder" ){
	$builddoor_url = '/builder/';
}



?>

<header class="header" id="header1">
		<div class="header_area">
			<div class="container"> <div class="col-md-8">
					<div class="header_main">
						<div class="header_logo" >
							<a href="#">
								<img src="<?php echo get_template_directory_uri(); ?>/images/FramelessShowerDoors_logo.gif" alt="Logo">
							</a>
							<p>America's only direct from the manufacturer frameless shower door company.</p>
						</div>
					</div>
				
                </div>
                
                
                <div class="col-md-4">
                
               <div  style="width:50%;  margin:25px auto;  font-size:16px; text-align:center;  line-height:20px; background:#000; padding:15px;"> <a href="https://www.framelessshowerdoors.com/gallery" target="_blank" style="color:#fff; font-weight:700; text-decoration:none;">SHOWER DOOR GALLERY</a>  </div>
               
               
               
					<div  style="width:50%;  margin:25px auto;  font-size:16px; text-align:center;  line-height:20px; background:#000; padding:15px;"> <a href="https://www.framelessshowerdoors.com/about-stayclean/" target="_blank" style="color:#fff; font-weight:700; text-decoration:none;">STAYCLEAN<sup style="font-size: 10px; ">SM</sup></a>  </div>
               
               
                
        <div class="buttonSH" style="width:50%;  margin:25px auto;  font-size:16px; text-align:center;  line-height:20px; background:#000; padding:15px;">
        
              
        	<?php
        		echo '<a href="'.site_url().$builddoor_url.'" style="color:#fff; font-weight:700; text-decoration:none;">CHANGE DOOR SELECTION</a>';
        	?>
        </div>
     </div>
                
			</div>
		</div>
		
       
	</header>
