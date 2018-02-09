<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
        <head>
       <title><?php wp_title( '|', true, 'right' ); ?></title>
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/bootstrap.css"  />
		<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
       <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<meta name="googlebot" content="noindex">  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/kiosk/kioskfonts/css/font-awesome.min.css"  />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<?php wp_get_archives('type=monthly&format=link'); ?>
		<meta name="viewport" content="initial-scale=1, maximum-scale=1">
		<link href='//fonts.googleapis.com/css?family=Cardo:400,700,400italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link href='//fonts.googleapis.com/css?family=Lato:400,300,700,900' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
		<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/fav/favicon.ico" type="image/vnd.microsoft.icon"/>
		<link rel="icon" href="<?php bloginfo('template_url'); ?>/images/fav/favicon.ico" type="image/x-ico"/>
        
  
        <style type="text/css">
html, body {
	background: #439ca1;
}
html {
	-ms-content-zooming: none;
	touch-action: pan-y;
	-ms-touch-action: pan-y;
}
#designtips .item {
	margin: 3px;
	width: 650px !important;
}
#designtips .item img {
	display: block;
	width: 650px;
	height: auto;
	margin-top: 20px;
}
.owl-carousel {
	display: none;
	position: relative;
	width: 650px !important;
	touch-action: pan-y;
	-ms-touch-action: pan-y;
}


#kiosk_dummy  .owl-theme .owl-controls .owl-buttons div{
	color: #FFF;
	display: inline-block;
	zoom: 1;
	*display: inline;/*IE7 life-saver */
	margin: 5px;
	padding: 40px 10px important;
	font-size: 12px;
	-webkit-border-radius: 30px;
	-moz-border-radius: 30px;
	border-radius: 30px;
	background: #869791;
	filter: Alpha(Opacity=50);/*IE7 fix*/
	opacity: 0.5;
	width:300px;
	Height:100px;
	padding-top: 20px;
font-size: 50px;
}


#stepNavigation {
	display: none;
}
.footer_top {
	display: none;
}
/*.single-tild-sect {height: 100vh;}*/
	/*	.single-tild-sect {height: 123vh;}*/
.builder_sect .builder-mode .single-tild-sect {
	height: auto;
}

.modal.fade .modal-dialog .kiosk {
	-webkit-transition: -webkit-transform .3s ease-out;
	-moz-transition: -moz-transform .3s ease-out;
	-o-transition: -o-transform .3s ease-out;
	transition: transform .3s ease-out;
	-webkit-transform: translate(0, 10%) !important;
	-ms-transform: translate(0, 10%) !important;
	transform: translate(0, 10%) !important;
}
.DYIcontent ul li {
	list-style: square;
	margin-left: 25px;
	font-size: 14px;
	line-height: 24px;
	font-family: 'Open Sans', sans-serif;
}
.modal-content .kiosk {
	position: relative;
	top: 0px !important;
	margin: 0px;
	padding: 0px;
	background-color: #fff;
	background-clip: padding-box;
	border: 1px solid #999;
	border: 1px solid rgba(0, 0, 0, .2);
	border-radius: 6px;
	outline: none;
	-webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, .5);
	box-shadow: 0 3px 9px rgba(0, 0, 0, .5);
}
body.blog, body.page-template-contractor, body.page-template-get-started {
	font-family: 'Open Sans', sans-serif;
	background-color: transparent;
}
#kiosk_dummy {
	font-family: 'Open Sans', sans-serif;
	font-size: 14px;
}
.twoColbg {
	
	background: none !important;
	width: 100%;
}
.mains .twoColbg {
	background: none !important;
	overflow: hidden;
}
/*...............................................................................*/
 /*Header*/

 
 
.header_area .container {
	width: 100%;
}
.body {
	box-sizing: border-box;
	margin: 0;
	padding: 0px;
}
.header_area {
	background: #026267; /* Old browsers */
	background: -moz-linear-gradient(left, #026267 0%, #65b4b8 100%); /* FF3.6-15 */
	background: -webkit-linear-gradient(left, #026267 0%, #65b4b8 100%); /* Chrome10-25,Safari5.1-6 */
	background: linear-gradient(to right, #026267 0%, #65b4b8 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#026267', endColorstr='#65b4b8', GradientType=1 ); /* IE6-9 */
	padding-top: 27px;
	padding: 0 15px;
	text-align: left
}
.header_logo p {
	color: #fff;
	font-size: 14px;
	line-height: 18px !important;
	text-align: left;
}
.header_menu_area {
	background: #333333 !important;
}
.header_menu {
	list-style: none;
	margin: 0;
	width: 100%;
	background: #333333 !important;
}
.header_menu_main {
	background: #333333 !important;
}
.header_menu li img {
	display: block;
	margin: 10px auto 6px;
	height: 32px;
}
.header_menu li a {
	color: #fff;
	text-transform: uppercase;
	text-decoration: none;
	font-size: 14px;
	font-weight: 500;
	line-height: 20px;
}
.header_left {
	width: 40%;
	float: left;
}
.header_right {
	float: right;
	width: 40%;
	padding-top: 32px;
}
.header_txt {
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
.build_link > a {
	color: #fff;
	font-weight: 600;
	font-size: 17px;
}
.build_txt {
	font-size: 18px;
	color: #fff;
	margin: 0;
}
.build_txt span {
	font-weight: 600;
}
/*Body Section*/
.door_type_row .col-md-3, .door_type_row .col-md-9 {
	padding-left: 0;
	padding-right: 0;
}
.doorbuilder h2 {
	font-family: "Open Sans", sans-serif;
}
/*SECTION LEFT*/
.door_type_menu {
	list-style: none;
	margin-top: 285px;
	text-align: center;
}

.door_type_menu li.active a {
	background:#000000;
	color:#ffffff;
	height:200px;
	width:100%
}
 
/*SECTION RIGHT*/
.right_section_main {
	position: relative;
	height: 100%;
}
.door_type_logo {
	bottom: 46px;
	left: -225px;
	position: absolute;
}
.section_heading {
	text-align: center;
	color: #fff;
	background: rgb(102,101,99);
}
.section_heading h1 {
	font-weight: 500;
	margin: 0;
	padding: 31px 0;
}
.section_heading h1 span {
	font-weight: 600;
}
.section_heading > p {
	background: rgb(251,128,7);
	display: inline-block;
	padding: 15px 30px;
	margin-bottom: 25px;
}
.section_heading a {
	text-decoration: none;
	color: #fff;
	font-size: 17px;
	font-weight: 600;
}
/*Page2*/
.content_area2 {
/*    background: rgb(233,239,239);*/

}
.modal {
	position: fixed;
	z-index: 10000 !important;
	display: none;
	overflow: auto;
	overflow-y: scroll;
	-webkit-overflow-scrolling: touch;
	outline: 0
}
</style>
        </head>
        <body id="kiosk_dummy">
<div id="contractor" class="modal fade" style="display:none;">
          <div class="modal-dialog">
    <div class="kiosk">
              <div class="modal-content ">
        <div class="modal-header">
                  <button type="button" class="close b-close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h2 class="modal-title">Buying <strong>Process</strong></h2>
                </div>
        <div class="modal-body"> <img src="/wp-content/uploads/2016/08/buyingprocess.png" /> </div>
        <div class="modal-footer">
                  <button type="button" class="btn btn-default b-close" data-dismiss="modal">Close</button>
                </div>
      </div>
            </div>
  </div>
        </div>
<div id="clean" class="modal fade" style="display:none;">
          <div class="modal-dialog">
    <div class="kiosk">
              <div class="modal-content">
        <div class="modal-header">
                  <button type="button" class="close b-close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h2 class="modal-title">STAY<span style="font-weight:700">CLEAN</span>&#8482; GLASS</h2>
                </div>
        <div class="modal-body">
                  <div  class="text-left">
            <h2>Say <strong>NO</strong> to soap scum and hard mineral deposits! </h2>
            <div class="col-md-7">
                      <p>Stay<strong>CLEAN</strong>&#8482; Protective glass is available for all of our Installation<strong>EASY</strong>&#8482; glass shower doors.</p>
                    </div>
            <div class="col-md-5"> <img src="https://www.framelessshowerdoors.com/wp-content/uploads/2016/06/kioskDFI.jpg" width="100%"></div>
            <div class="row">
                      <div class="col-md-12">
                <h3> Glass treated with Stay<strong>CLEAN</strong>&#8482; becomes water and oil repellant resulting in:</h3>
                <div class="DYIcontent">
                          <ul>
                    <li>Stain resistance</li>
                    <li>Scratch resistance</li>
                    <li>Impact resistance</li>
                    <li>20% more brilliance</li>
                    <li> No need for harsh chemical cleaners</li>
                    <li>90% less frequent cleanings</li>
                    <li>Reduction in mold and bacteria</li>
                    <li>Lifetime warranty</li>
                  </ul>
                        </div>
                <hr>
                <div class="col-md-12">
                          <p>Simply put, it’s the finest permanent coating that can be applied to a glass shower door or enclosure. Nowhere else can you get direct from the manufacturer pricing, 48 hour fabrication time and Stay<strong>CLEAN</strong>&#8482; Water & Stain Resistant Coating. It’s our way of saying thank you for helping us become the nation’s largest truly frameless shower door manufacturer.</p>
                        </div>
              </div>
                    </div>
          </div>
                </div>
        <div class="modal-footer">
                  <button type="button" class="btn btn-default b-close" data-dismiss="modal">Close</button>
                </div>
      </div>
            </div>
  </div>
        </div>
<div id="warranty" class="modal fade" style="display:none;">
          <div class="modal-dialog">
    <div class="kiosk">
              <div class="modal-content">
        <div class="modal-header">
                  <button type="button" class="close b-close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h2 class="modal-title">PERSONAL TECHNICIAN</h2>
                </div>
        <div class="modal-body">
                  <div style="text-align:left;"> <img src="https://www.framelessshowerdoors.com/wp-content/uploads/2016/06/kioskdan.png" style="float:right; padding-left:15px;">
            <h2>You don't always know what you need. <strong>That's why Dan comes free with every order.</strong></h2>
            <p>Once you purchase, you will receive your step by step measuring and installation videos along with easy to follow printable instructions based on the style you chose. Your personal technician will be available anytime you need them, from measure to install... <strong>we've got your back. </strong></p>
          </div>
                  <div class="modal-footer">
            <button type="button" class="btn btn-default b-close" data-dismiss="modal">Close</button>
          </div>
                </div>
      </div>
            </div>
  </div>
        </div>
<div id="design" class="modal fade" style="display:none;">
          <div class="modal-dialog">
    <div class="kiosk">
              <div class="modal-content">
        <div class="modal-header">
                  <button type="button" class="close b-close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h2 class="modal-title">DESIGN TIPS</h2>
                </div>
        <div class="modal-body">
                  <div class="container">
            <p class="text-left" style="margin-bottom:15px; color:#1f8f96"><em>Swipe left to view next tip</em></p>
            <div class="owl-carousel owl-theme text-left" id="designtips">
                      <div class="item">
                <p>For over 25 years we have been in business designing custom frameless shower enclosures, in that time we have come across just about everything. From design flaws, to Do-it-Yourself disasters that are just too dreadful to even mention. So, we created design tips to help guide you, as well as illustrate for you what to avoid when preparing your opening for a Frameless Shower Door.</p>
                <img src="/wp-content/uploads/2016/03/881x418xstart.png.pagespeed.ic_.PxBYBJ0lOl.png"></div>
                      <div class="item">
                <h3><strong>DESIGN TIP #1</strong></h3>
                <p>Never design a curb (the sill that is under the door area) on an angle. This applies to 135 degree standard angle enclosures, 90 degree enclosures, as well as custom angle enclosure openings. Always design a curb so the door can swing freely in and out. The only way to do this is by making the curb hit the return knee wall or angle sill at 90 degrees (square).</p>
                <img src="/wp-content/uploads/2016/03/881x248x1.png.pagespeed.ic_.mtn8bCR9m_.png" ></div>
                      <div class="item">
                <h3><strong>DESIGN TIP #2</strong></h3>
                <p>Always pitch seats and shower floor pans so the water drains properly to the drain area. You do not want water to be stagnant or puddling will occur. Always pitch the curb sill under the door, on knee walls, and under all fixed panels approximately 3/16” in towards the interior of the shower enclosure to ensure proper drainage with no stagnant water buildup. Always try and use a continuous piece of marble or granite to minimize grout joints under the glass.</p>
                <img src="https://www.framelessshowerdoors.com/wp-content/uploads/2016/03/881x346x2.jpg.pagespeed.ic_.PeRym7kQdY.jpg" ></div>
                      <div class="item">
                <h3><strong>DESIGN TIP #3</strong></h3>
                <p>There is nothing standard about a frameless shower enclosure, but you should always work off of standard angles when possible.90 degree, 135 degree, 180 degree angles are your standard in the industry.</p>
                <img src="https://www.framelessshowerdoors.com/wp-content/uploads/2016/03/880x555x3.png.pagespeed.ic_.3AE74Tca4z.png" ></div>
                      <div class="item">
                <h3><strong>DESIGN TIP #4</strong></h3>
                <p>For best results the soffits must be plumb to the lower curbs. The will ensure satisfaction on your design and give a perfect reveal.</p>
                <img src="https://www.framelessshowerdoors.com/wp-content/uploads/2016/03/881x347x4.png.pagespeed.ic_.ZQDG0zWMjF.png" ></div>
                      <div class="item">
                <h3><strong>DESIGN TIP #5</strong></h3>
                <p>For best results, all body sprays should be directed towards the tile wall or fixed panels. Keep direct water spray away from the door. Never install body sprays directly opposite an enclosure door or opening. The only vulnerable area of a frameless shower enclosure is the door! So try to always keep direct water spray away (body jets and shower heads) from the door to ensure less water from escaping.</p>
                <img src="https://www.framelessshowerdoors.com/wp-content/uploads/2016/03/880x342x5-1.png.pagespeed.ic_.uM5RTgREvS.png" ></div>
                      <div class="item">
                <h3><strong>DESIGN TIP #6</strong></h3>
                <p>Due to polishing and tempering procedures a 4 ½” minimum width is required for glass panels.</p>
                <img src="https://www.framelessshowerdoors.com/wp-content/uploads/2016/03/881x851x6.png.pagespeed.ic_.PPfiQzuJxc.png" ></div>
                      <div class="item">
                <h3><strong>DESIGN TIP #7</strong></h3>
                <p>If you are planning to use a decorative listello raised border or any border for that matter, always use one that is flush or flat with the other tile in the shower door area. If you choose to use one that sticks out past the wall tile, make sure it stops before the door area. Nothing should be protruding out that would interfere with the door swing.</p>
                <img src="https://www.framelessshowerdoors.com/wp-content/uploads/2016/03/880x419x7-1.png.pagespeed.ic_.9EqFQAfFij.png" ></div>
                      <div class="item">
                <h3><strong>DESIGN TIP #8</strong></h3>
                <p>Never use glass tiles! When considering a frameless design that would require drilling into the tile. Inevitable the glass will crack during the drilling process, or over time.</p>
                <img src="https://www.framelessshowerdoors.com/wp-content/uploads/2016/03/881x368x8.png.pagespeed.ic_.Ls5ZNJPaUh.png" ></div>
                      <div class="item">
                <h3><strong>DESIGN TIP #9</strong></h3>
                <p>Any overhangs near the door opening may cause problems, such as gaps, that will result in serious leaking issues. Always run the tile flush with the vertical rise tile.</p>
                <img src="https://www.framelessshowerdoors.com/wp-content/uploads/2016/03/881x368x9.png.pagespeed.ic_.IolKtIiAIW.png" ></div>
                      <div class="item">
                <h3><strong>DESIGN TIP #10</strong></h3>
                <p>Pitch guidelines for shower curb. See below.</p>
                <img src="https://www.framelessshowerdoors.com/wp-content/uploads/2016/03/880x361x10-1.png.pagespeed.ic_.aRGkBuqTbQ.png" ></div>
                      <div class="item">
                <h3><strong>DESIGN TIP #11</strong></h3>
                <p>Always level the rise where the door closes this is most important; otherwise a costly custom double cut door is required.</p>
                <img src="https://www.framelessshowerdoors.com/wp-content/uploads/2016/03/881x415x11.png.pagespeed.ic_.SdkbOkozsV.png" ></div>
                      <div class="item">
                <h3><strong>DESIGN TIP #12</strong></h3>
                <p>When a return panel of glass that sits on a knee wall or a tub deck requires the glass to be notched, make sure the “leg” is no smaller than 4 ½” or a separate piece will need to be added creating another seam that can be avoided.</p>
                <img src="https://www.framelessshowerdoors.com/wp-content/uploads/2016/03/881x369x12.png.pagespeed.ic_.-LkCokjrP9.png" ></div>
                      <div class="item">
                <h3><strong>DESIGN TIP #13</strong></h3>
                <p>When designing your enclosure, try to never leave your tile, marble, granite, tub decks, etc. overhang anywhere. If it does, a notch can be made with a diamond saw. Make the notch 1/8” wider than the glass and no more than ¾” deep to minimize breakage.</p>
                <img src="https://www.framelessshowerdoors.com/wp-content/uploads/2016/03/881x369x13.png.pagespeed.ic_.6xXsTakrPz.png" ></div>
                      <div class="item">
                <h3><strong>DESIGN TIP #14</strong></h3>
                <p>Always install a vertical wood stud where the door hinges will be placed or fixed panels are to be clipped too. Never run wires or pipes through or in front of the studs where the anchoring will be done. If you already did put pipes or wires where they shouldn’t be, make sure you tell us and we will manufacture the glass to ensure the screws miss them when the installation takes place.</p>
                <img src="https://www.framelessshowerdoors.com/wp-content/uploads/2016/03/880x390x14-1.png.pagespeed.ic_.WBWZa0h2a5.png" ></div>
                      <div class="item">
                <h3><strong>DESIGN TIP #15</strong></h3>
                <p>If you are designing an enclosure that has a knee wall, always allow enough of a ledge for a small panel to join the 90 degree return panel that goes on top of the knee wall. This not only creates a small shelf and more room in the shower area, it secures the larger return panel eliminating almost all the flex from the 90 degree return piece.</p>
                <img src="https://www.framelessshowerdoors.com/wp-content/uploads/2016/03/881x493x15.png.pagespeed.ic_.VRbsHAyNU3.png" ></div>
                      <div class="item">
                <h3><strong>DESIGN TIP #16</strong></h3>
                <p><strong>Wall Problems</strong><br>
                          Walls which meet a door or a glass panel DO NOT need to be exactly vertical or “plumb” in order to prevent gaps, uneven joints, etc. Here at Frameless, we specialize in custom cutting your glass in house to conform to out of plumb walls (not level or perfectly straight). Other companies will tell you that this is not possible. We are telling you it is! It is very rare that we cannot configure a frameless shower door or enclosure to accommodate even the worst of openings.<br>
                          <br>
                          <strong>The Images Below.</strong> <br>
                          Yes mean we can use a wall mounted hinge. The ones that say “need header” simply means we can cut the glass to the belly or bow or even high points of tiles that stick out, we would just have to use a header to offset the hinges to accommodate a bad tile job. </p>
                <img src="https://www.framelessshowerdoors.com/wp-content/uploads/2016/03/x16.png.pagespeed.ic_.h8_f0hoCCo.png" ></div>
                      <div class="item">
                <h3><strong>DESIGN TIP #17</strong></h3>
                <p>Be careful where you place your towel bar! Remember, we are here to help. If you have a question or concern, please let us know and we will make sure issues like this one does not happen to you. </p>
                <img src="https://www.framelessshowerdoors.com/wp-content/uploads/2016/03/880x343x17-1-1.jpg.pagespeed.ic_.ZwjPPTuxrJ-1.jpg" ></div>
                    </div>
          </div>
                  <div class="modal-footer">
            <button type="button" class="btn btn-default b-close" data-dismiss="modal">Close</button>
          </div>
                </div>
      </div>
            </div>
  </div>
        </div>
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
    $builddoor_url = '/fdkiosk/kiosk/?FDLocation='.$FDLocation.'&56_temp='.$discount_kiosk;
	}else{
		$builddoor_url = '/fdkiosk/kiosk/';
	}
}else if( is_page(11801) && is_page( 'builder' ) || $framework == "builder" || $framework == "builder/" ){
	$builddoor_url = '/builder/';
}
else if($FDLocation){
	$builddoor_url = '/fdkiosk/kiosk/?FDLocation='.$FDLocation.'&56_temp='.$discount_kiosk;
}

/*Creating URL to redirect for Thnaku Page*/
if ($thnq_mode == "Kiosk" ){
	if($FDLocation){
    $builddoor_url = '/fdkiosk/kiosk/?FDLocation='.$FDLocation.'&56_temp='.$discount_kiosk;
	}else{
		$builddoor_url = '/fdkiosk/kiosk/';
	}
}else if( $thnq_mode == "Builder" ){
	$builddoor_url = '/builder/';
}
else if($FDLocation){
	$builddoor_url = '/fdkiosk/kiosk/?FDLocation='.$FDLocation.'&56_temp='.$discount_kiosk;
}

?>
<header class="header" id="header1">
          <div class="header_area">
    <div class="container">
              <div class="col-md-6">
        <div class="header_main">
                  <div class="header_logo" ><img src="/wp-content/uploads/2016/08/KioskFrameless_logo.png" width="70%" alt="Logo" >
            <p style="margin-top:15px;">America's only direct from the manufacturer frameless <br>
                      shower door company.</p>
          </div>
                </div>
      </div>
              <div class="col-md-6" style="margin-left:auto; padding-top: 27px;">
        <div class="monkey" style="width:85%; float:right"><img src="/wp-content/uploads/2016/06/InstallationEASY.png" style="width:80% !important" />
                  <p style="font-size:14px; line-height:18px; margin-top:15px; color:#ffffff;"><strong>From measure to install, we've got your back.</strong><br>
            Our Installation<strong>EASY</strong>&#8482; program gives you the control
            of easily designing and installing your own frameless shower doors.</p>
                </div>
        <div class="buttonSH" style="width:80%; float:right;  margin:28px auto;  font-size:22px; text-align:center;   background:#f4870b; border:1px solid #e67307; box-shadow: 3px 3px 5px #333333;  padding:25px;"> <a href="<?php echo site_url().$builddoor_url; ?>" style="color:#fff; font-weight:700; text-decoration:none;"><i class="fa fa-refresh"></i> CHANGE DOOR SELECTION</a></div>
      </div>
            </div>
  </div>
          <!-- Header Menu  Start-->
          <div class="header_menu_area">
    <div class="row" style="padding:0px !important; margin:0px !important;">
              <div class="header_menu_main" >
        <ul class="header_menu">
                  <li class="poplinks"> <a  href="#contractor" data-toggle="modal" ><i class="fa fa-cogs" aria-hidden="true"></i> &nbsp;
                    BUYING PROCESS </a> </li>
                  <li class="poplinks"> <a href="#design" data-toggle="modal"> <i class="fa fa-paint-brush" aria-hidden="true"></i> &nbsp; DESIGN TIPS </a> </li>
                  <li class="poplinks"> <a href="#clean" data-toggle="modal"><i class="fa fa-tint" aria-hidden="true"></i> &nbsp; STAY<span style="font-weight:700">CLEAN</span>&#8482; GLASS </a> </li>
                  <li class="poplinks"> <a  href="#warranty" data-toggle="modal"><i class="fa fa-user" aria-hidden="true"></i> &nbsp;
                    PERSONAL TECHNICIAN</a> </li>
                </ul>
      </div>
            </div>
  </div>
          <!-- Header Menu  Closed--> 
          
        </header>
