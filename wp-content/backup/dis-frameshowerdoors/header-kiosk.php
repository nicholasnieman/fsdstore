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
      
    
		
		<style type="text/css">
		#designtips .item{
  margin: 3px;
}
#designtips .item img{
  display: block;
  width: 480px;
  height: auto;
  margin-top:20px;
}
.owl-carousel{

  display: none;

  position: relative;

  width: 500px !important;

  -ms-touch-action: pan-y;

}


      #stepNavigation {display:none;}
       .single-tild-sect {background:#ffffff !important;} 
        .footer_top {display:none;}
		/*.single-tild-sect {height: 100vh;}*/
		.single-tild-sect {height: 123vh;}
		.builder-mode .single-tild-sect {
		    height: auto;
		}
		.builder_sect .builder-mode .single-tild-sect {height: auto;}
		html, body {height:100vh}
		
		.modal.fade .modal-dialog .kiosk{
  -webkit-transition: -webkit-transform .3s ease-out;
     -moz-transition:    -moz-transform .3s ease-out;
       -o-transition:      -o-transform .3s ease-out;
          transition:         transform .3s ease-out;
  -webkit-transform: translate(0, 10%) !important;
      -ms-transform: translate(0, 10%) !important;
          transform: translate(0, 10%) !important;
}
		.DYIcontent ul li {

    list-style:square; 
	margin-left:25px;
	font-size:14px;
	line-height:24px;
	font-family: "Open Sans",Arial,Helvetica,sans-serif;
	
 
}

.modal-content .kiosk{
  position: relative;
  top:0px !important;
  margin:0px; padding:0px;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #999;
  border: 1px solid rgba(0, 0, 0, .2);
  border-radius: 6px;
  outline: none;
  -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, .5);
          box-shadow: 0 3px 9px rgba(0, 0, 0, .5);
}


 
 .header_area .container{
    width: 100%;
 }
 .body {
    box-sizing: border-box;
    margin: 0;
	padding:0px;
  
}
#header-builder {
    background: rgb(76,175,179);
   padding-top: 27px; 
   padding-bottom: 27px; 
   color:#fff;
 }

 .header_area {
    background: rgb(76,175,179);
    padding-top: 27px;
    padding:15px;
	text-align:left
 }
 .header_logo p{
    color: #fff;
    font-size: 14px;
	text-align:left;
 }
 .header_menu_area{
  background:#026267 !important;

 }
 .header_menu{
    list-style: none;
    margin: 0;
    width: 100%; 
	background:#026267 !important;
 }
 
 #kiosk input {color:#333 !important;
 }
 

 
  #kiosk .custom-input-group input {color: black !important; font-weight:bold
 }
 
 
   #kiosk .custom-input-group textarea {color: black !important; font-weight:bold
 }
 
 ::-webkit-input-placeholder { /* Chrome */
  color: black;
  transition: opacity 250ms ease-in-out;
}
 
  #kiosk .custom-input-group::-ms-input-placeholder { /* IE 10+ */
   color: black !important;
  transition: opacity 250ms ease-in-out;}
 
::-moz-placeholder { /* Firefox 19+ */
   color: black  !important;
  opacity: 1;
  transition: opacity 250ms ease-in-out;
}

:-moz-placeholder { /* Firefox 4 - 18 */
   color: black !important;
  opacity: 1;
  transition: opacity 250ms ease-in-out;
}

.header_menu_main {background:#026267 !important;}
 .header_menu li img{
    display: block;
    margin: 10px auto 6px;
    height: 12px;
 }
 .header_menu li a{
    color: #fff;
    text-transform: uppercase;
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
    line-height: 20px;
 }
 .header_left{
    width: 40%;
    float: left;
 }
 .header_right{
    float: right;
    width: 40%;
    padding-top: 32px;
 }
 .header_txt{
    text-align: center;
 }
 .header_right .build_link {
    background: rgb(40, 40, 40) none repeat scroll 0 0;
    color: #fff;
    display: inline-block;
    margin: 0;
    padding: 10px 20px;
    margin-bottom: 10px;
}
.build_link > a{
    color: #fff;
    font-weight: 600;
    font-size: 17px;
}
.build_txt {
    font-size: 18px;
    color: #fff;
    margin: 0;

}
.build_txt span{
    font-weight: 600;
}

        </style>
        
        
	</head>
	<body id="kiosk" <?php body_class(); ?>>



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


/*Creating URL to redirect*/
if (is_page(11842) && is_page( 'kiosk' ) || $framework == "kiosk" || $framework == "kiosk/" ){
	$builddoor_url = '/index/kiosk/';
}else if( is_page(11801) && is_page( 'builder' ) || $framework == "builder" || $framework == "builder/" ){
	$builddoor_url = '/builder/';
}
/*Creating URL to redirect for Thnaku Page*/
if ($thnq_mode == "Kiosk" ){
	$builddoor_url = '/index/kiosk/';
}else if( $thnq_mode == "Builder" ){
	$builddoor_url = '/builder/';
}

?>

<div id="header-builder" class="<?php echo $class_name; ?>" >
		<div class="header_area">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<a href="https://www.framelessshowerdoors.com/index/"> <img src="<?php echo get_template_directory_uri(); ?>/images/FramelessShowerDoors_logo.gif" /></a>
				<p style="font-size:14px !important">America's only direct from the manufacturer frameless shower door company.</p>
			</div>
			<div class="col-md-4" style="margin-left:auto; padding-top: 15px;">
				<div style="width:80%;  margin:1px auto;  font-size:16px; text-align:center;  line-height:20px; background:#000; padding:15px;"><a style="color:#fff; font-weight:700; text-decoration:none;" href="/builder/">BUILD NEW DOOR</a></div>
				<div id="selected-layout" class="smalltext text-center" style="margin-top: 15px;">
                	<?php 
                		if(is_single()){
                			echo '<strong>Door Style: </strong> '.get_the_title();
                		}else{
                			$door_layout_nm 		= $_GET['door_layout'];
                			echo '<strong>Door Style: </strong> '.$door_layout_nm	;
                		}
                	?>
                
                </div>
                
			</div>
		</div>
        </div>
	</div>

