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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/kiosk/kioskfonts/css/font-awesome.min.css"  />


		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<?php wp_get_archives('type=monthly&format=link'); ?>
		<meta name="viewport" content="width=1080, initial-scale=.67" />
		<link href='//fonts.googleapis.com/css?family=Cardo:400,700,400italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link href='//fonts.googleapis.com/css?family=Lato:400,300,700,900' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
		<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/fav/favicon.ico" type="image/vnd.microsoft.icon"/>
		<link rel="icon" href="<?php bloginfo('template_url'); ?>/images/fav/favicon.ico" type="image/x-ico"/>
		
	<link href="<?php bloginfo('template_url'); ?>/kiosk/keyboard/css/jquery-ui.min.css" rel="stylesheet">
	<script src="<?php bloginfo('template_url'); ?>/kiosk/keyboard/js/jquery-ui.min.js"></script>
	<link href="<?php bloginfo('template_url'); ?>/kiosk/keyboard/css/keyboard.css" rel="stylesheet">
	<script src="<?php bloginfo('template_url'); ?>/kiosk/keyboard/js/jquery.keyboard.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/kiosk/keyboard/js/jquery.keyboard.extension-typing.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/kiosk/keyboard/js/jquery.keyboard.extension-caret.js"></script>  
   <script src="<?php bloginfo('template_url'); ?>/js/modernizr.js"></script>
   

 

    <script type="text/javascript">

        	 	jQuery(document).ready(function() {

        	 		(function ($){

         				jQuery('.poplinks a').click(function(event){

         				   event.preventDefault();

         				   var popup = $(this).attr('rel');

         				    jQuery(popup).bPopup({

         				        closeClass:'b-close'

         				    });

         				    jQuery('body').find(".button-flat.active").trigger('click');

         				}); 





        	    	}(jQuery));

        		});

        	</script>
            
        	
 <script type="text/javascript">

jQuery(document).ready(function(){	
                jQuery('.bar').hide();
			$('.bar2').hide(); 
     jQuery('#loadform').submit(function() {
		 (function ($){
       $('.bar').show(); 
       return true;
   }(jQuery));
     });
	  jQuery('.topbutton').click(function() {
		 (function ($){
       $('.bar2').show(); 
	  
    return true;
   }(jQuery));
     });
	 
});
 </script>
 
 	

<style type="text/css">


.bar {
	display:none;
	position:absolute;
	z-index:100000;
	top: 500px;
width: 580px;
left: 36px;
height: 25px;
  border: 1px solid #2980b9;
  border-radius: 3px;
  background-image: 
    repeating-linear-gradient(
      -45deg,
      #229895,
      #27A19F 11px,
      #2CAAAA 10px,
      #37BABC 20px /* determines size */
    );
  background-size: 28px 28px;
  animation: move .5s linear infinite;
}

.bartext {position:absolute; top:-30px; text-align:center; font-size:18px; font-weight:bold; color:#333333; width:100%}

@keyframes move {
  0% {
    background-position: 0 0;
  }
  100% {
    background-position: 28px 0;
  }
}

.bar2 {
	display:none;
	position:absolute;
	z-index:100000;
	top: 58px;
width: 300px;
left: 70px;
height: 25px;
  border: 1px solid #2980b9; 
  border-radius: 3px;
  background-image: 
    repeating-linear-gradient(
      -45deg,
      #229895,
      #27A19F 11px,
      #2CAAAA 10px,
      #37BABC 20px /* determines size */
    );
  background-size: 28px 28px;
  animation: move .5s linear infinite;
}

.bartext2 {position:absolute; top:-30px; text-align:center; font-size:18px; font-weight:bold; color:#333333; width:100%}

@keyframes move {
  0% {
    background-position: 0 0;
  }
  100% {
    background-position: 28px 0;
  }
}
		

.modal-header .close {
    margin-top: -26px !important;
				}
				
				.close {
   
    width: 100px;
    height: 100px;
}
				
                .steam_cont_form label {
    display: inline-block;
    padding-top: 13px;
    color: #ffffff !important;}

	html
	{
       -ms-content-zooming: none;
	
}
	body {margin:0px; padding:0px; background: #F0EFEF !important;
	}
	.table > tbody > tr > td {border-top: none !important;}
	.selectionbk2 .single-tild-sect {
		/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#c4c4c4+0,000000+100&0.65+0,0+91 */
		background: -moz-linear-gradient(top,  rgba(196,196,196,0.65) 0%, rgba(18,18,18,0) 91%, rgba(0,0,0,0) 100%); /* FF3.6-15 */
		background: -webkit-linear-gradient(top,  rgba(196,196,196,0.65) 0%,rgba(18,18,18,0) 91%,rgba(0,0,0,0) 100%); /* Chrome10-25,Safari5.1-6 */
		background: linear-gradient(to bottom,  rgba(196,196,196,0.65) 0%,rgba(18,18,18,0) 91%,rgba(0,0,0,0) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a6c4c4c4', endColorstr='#00000000',GradientType=0 ); /* IE6-9 */
	}
	
	#backNav::before, #backNav > *::before {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    border-bottom: 24px solid transparent;
    border-image: none;
    border-right-color: inherit;
    border-style: solid solid solid solid !important;
    border-top: 24px solid transparent;
    border-width: 24px 20px 24px 0;
    content: "";
    height: 0;
    position: absolute;
    right: 100%;
    top: -1px;
    width: 0;
    z-index: 2;
}
	
	
	.kiosk .rbs_gallery_button .button-flat {
    text-shadow: none;
    background: #4cafb3;
    border: 1px solid #ccc;
    -webkit-box-shadow: none;
    box-shadow: none;
    -webkit-transition-duration: .3s;
    -o-transition-duration: .3s;
    transition-duration: .3s;
    -webkit-transition-property: background;
    -o-transition-property: background;
    transition-property: background;
    padding: 15px !important;
    width: 170px;
    color: #ffffff;
}
	.selectionbk2 .modal-content {
		background-clip: padding-box;
		background-color: #F5F4F3!important;
		border: 1px solid rgba(0, 0, 0, 0.2)!important;
		border-radius:0px!important;
		box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5)!important;
		height: auto!important;
		margin: 0 auto!important;
		outline: medium none;
		padding: 6px 53px!important;
		position: relative;
		width: 320px!important;
	}
	#kiosk_dummy  .selectionbk2 .mains {width:100% !important}
	#designtips .item{
	  	margin: 3px;
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
    #stepNavigation {display:none;}
    .footer_top {display:none;}
	/*.single-tild-sect {height: 100vh;}*/
	.builder-mode .single-tild-sect {
	    height: auto;
	}
	.builder_sect .builder-mode .single-tild-sect {height: auto;}

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
	.header_area .container{
	    width: 100%;
	}
	.body {
	    box-sizing: border-box;
	    margin: 0;
		padding:0px;
	}
	.header_area{
		background: #026267; /* Old browsers */
		background: -moz-linear-gradient(left,  #026267 0%, #65b4b8 100%); /* FF3.6-15 */
		background: -webkit-linear-gradient(left,  #026267 0%,#65b4b8 100%); /* Chrome10-25,Safari5.1-6 */
		background: linear-gradient(to right,  #026267 0%,#65b4b8 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#026267', endColorstr='#65b4b8',GradientType=1 ); /* IE6-9 */
		padding-bottom: 27px;
		text-align:left
	}
	.header_logo p{
	    color: #fff;
	    font-size: 14px;
		line-height:18px !important;
		text-align:left;
	}
	.header_menu_area{
	  background:#333333 !important;
	}
	.header_menu{
	    list-style: none;
	    margin: 0;
	    width: 100%; 
		background:#333333 !important;
	 }
	.header_menu_main {background:#333333 !important;}
	.header_menu li img{
	    display: block;
	    margin: 10px auto 6px;
	    height: 32px;
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
	
	#kiosk_dummy .cd-breadcrumb, .cd-multi-steps {
		width: 100%;
		max-width: 100%;
		padding: 0.5em 1em;
		margin: 1em auto;
		background-color: #1D6E72;
	}
	#kiosk_dummy .cd-breadcrumb:after, .cd-multi-steps:after {
		content: "";
		display: table;
		clear: both;
	}
	#kiosk_dummy .cd-breadcrumb li, .cd-multi-steps li {
		display: inline-block;
		float: left;
		margin: 0.5em 0;
	}
	#kiosk_dummy .cd-breadcrumb.triangle {
		/* reset basic style */
		background-color: transparent;
		padding: 0;
	}
	#kiosk_dummy .cd-breadcrumb.triangle li {
		position: relative;
		padding: 0;
		margin: 4px 4px 4px 0;
	}
	#kiosk_dummy .cd-breadcrumb.triangle li:last-of-type {
		margin-right: 0;
	}
	#kiosk_dummy .cd-breadcrumb.triangle li > * {
		position: relative;
		padding: 1em 2em;
		color: #ffffff;
		background-color: #1D6E72;
		/* the border color is used to style its ::after pseudo-element */
		border-color: #1D6E72;
	}
	#kiosk_dummy .cd-breadcrumb.triangle li a:hover {
		background-color: #1D6E72;
		border-color: #1D6E72;
		color: #ffffff;
	}
	#kiosk_dummy .cd-breadcrumb.triangle li:first-of-type > * {
	    border-radius: 0;
	    padding: 5px 40px 5px 24px;
	}
	#kiosk_dummy .cd-breadcrumb.triangle li a {
	    background-color: #198c93;
	    border-color: #198c93;
	    color: #ffffff;
	    display: block;
	    font-weight: normal;
	    line-height: 19px;
	    padding: 5px 40px 5px 24px;
	    position: relative;
	}
	.cd-breadcrumb.triangle li::after, .cd-breadcrumb.triangle li > *::after {
		content: '';
		position: absolute;
		top: 0;
		left: 100%;
		content: '';
		height: 0;
		width: 0;
		/* 48px is the height of the <a> element */
		border: 0 solid transparent;
		border-right-width: 0;
		border-left-width: 0;
	}
	#kiosk_dummy  .cd-breadcrumb.triangle li::after {
		/* this is the white separator between two items */
		z-index: 1;
		-webkit-transform: translateX(4px);
		-moz-transform: translateX(4px);
		-ms-transform: translateX(4px);
		-o-transform: translateX(4px);
		transform: translateX(4px);
		border-left-color: #ffffff;
		/* reset style */
		margin: 0;
	}
	#kiosk_dummy  .cd-breadcrumb.triangle li > *::after {
		/* this is the colored triangle after each element */
		z-index: 2;
		border-left-color: inherit;
	}
	#kiosk_dummy .cd-breadcrumb.triangle li:last-of-type::after, .cd-breadcrumb.triangle li:last-of-type > *::after {
		/* hide the triangle after the last step */
		display: none;
	}
	#selected_opt .cd-breadcrumb.triangle li:last-child a{
	    background: #035c62 none repeat scroll 0 0;
	}
	#kiosk_dummy .handle_style li {
		float:left;
	}
	#kiosk_dummy .attribute-handle_size .bundle-tild-sect > li,  .attribute-handle_style .bundle-tild-sect > li {
		float:left;
		margin: 5px 15px;
		width: 43% !important;
	}
	#kiosk_dummy ul li.glass-type, #attribute-option-13d.attribute-handle-combo-towelbar_style ul li {
		float: left;
		margin: 5px 13px;
		overflow: hidden;
		text-align: center;
		width: 45% !important;
	}
	@media only screen and (min-width: 1080px) and (max-width: 1080px){
		#attribute-option-8 .handle_size img {
		    max-height: 400px;
		    width: auto;
		}
		#attribute-option-11 .attribute-active img {background:none;}
		.woocommerce #attribute-option-11 img {background:none;}
		.attribute-glass_pulltype .bundle-tild-sect > li {
			margin: 5px 2px;
			max-width: 100%;
			width: 100% !important;
		}
		.attribute-glass_pulltype .btn-v-tild, .attribute-handle_style .attribute-towelbar_size .btn-v-tild {
			width: 80%;
			margin:0px auto;
		}
		.btn-v-tild {
			display: inline-block;
			float: none;
			margin: 0 ;
			text-align: center;
			width: 100%;
		}
		#attribute-option-13d.attribute-handle-combo-towelbar_style.build-showerdoor a {
			cursor: pointer;
			float: left;
			margin: 5px 13px;
			font-size: 0;
			height:225px;
			overflow: hidden;
			line-height: 150px;
			width: 225px !important;
			position:relative;
		}
		#attribute-option-12 ul li label, #attribute-option-13d.attribute-handle-combo-towelbar_style label {
			max-height: auto;
			max-width: 100%;
			padding: 0px 0px;
			height:335px;
		}
		#attribute-option-12 ul li label, #attribute-option-13d.attribute-handle-combo-towelbar_style img {
			max-height: auto;
			padding: 0px 0px;
		}
		.show-attribute-combo .btn-v-tild {margin:0px auto;}
	}
	.circlemain { position:relative; width:100%; left: 0; text-align:center; vertical-align:bottom}
	.circlef {position: absolute; left: -40px; width: 1075px; text-align: center;  }
	.no-js #loader { display: none;  }
	.js #loader { display: block; position: absolute; left: 100px; top: 0; }
	.se-pre-con {
		position: fixed;
		left: 0px;
		top: 0px;
		width: 100%;
		height: 100%;
		z-index: 9999;
		background: url("<?php echo site_url(); ?>/wp-content/uploads/2016/11/Preloader_2.gif") center no-repeat #fff;
	}
 </style>
        
        
	</head>
	<body id="kiosk_dummy" <?php body_class(); ?> background="#f9f9f9 !important" class="kiosk2">
		<!--<div class="se-pre-con"></div>-->
<!--<div class="loader"></div>-->





<div id="contractor" class="modal fade" style="display:none;">

			<div class="modal-dialog">

				<div class="kiosk">

					<div class="modal-content ">

						<div class="modal-header">

							<button type="button" class="close b-close" data-dismiss="modal" aria-hidden="true" style="font-size: 50px;">&times;</button>

							<h2 class="modal-title">Buying <strong>Process</strong></h2>

						</div>

						<div class="modal-body">

							<img src="/wp-content/themes/frameshowerdoors/kiosk/images/buyingprocess.png" style="width:90%" /><hr style="margin-top:15px; margin-bottom:15px;" />
<div style="text-align:left;"> <img src="/wp-content/uploads/2016/06/kioskdan.png" style="float:right; padding-left:15px;">
<h1 style="color:#05646a; font-weight:bold">PERSONAL TECHNICIAN</h1>
								<h2>You don't always know what you need. <strong>That's why Dan comes free with every order.</strong><br><br></h2>
                                
<p style="font-size:21px; line-height:28px">With each order we provide a personal technician that will stay by your side from measuring to the installation of your shower door.<br><br> </p>                                
                     
<p style="font-size:21px; line-height:28px"><strong>Your personal technician will provide:</strong></p>
                                
           

<ul style="list-style:square; margin-top:15px; margin-bottom:15px; list-style-position:outside">
<!--<li style="font-size:18px; line-height:28px;  margin-left:25px;"><strong>FREE</strong> in home estimate</li>-->
<li style="font-size:18px; line-height:28px; margin-left:25px;">FREE Design advice</li>
<li style="font-size:18px; line-height:28px; margin-left:25px;">Expert Installation</li>

<li style="font-size:18px; line-height:28px; margin-left:25px;">For our DIY <strong>Installation</strong><strong style="color:#5cc5c9">EASY</strong>&#8482; program, your technician will send you step by step measuring and installation videos along with easy to follow printable instructions based on the style you choose. </li>          
</ul>                                
<p style="color:#05646a; font-size:21px; line-height:28px;"> Your personal technician will be available anytime you need them, <strong>from measure to install... we've got your back. </strong></p>

							</div>
						</div>

						<div class="modal-footer">

							<button type="button" class="btn btn-default b-close" data-dismiss="modal">Close</button>

						</div>

					</div>

				</div>

			</div>

		</div> 

        

        <div id="gallery" class="modal fade" style="display:none;">

            <div class="modal-dialog">

			    <div class="kiosk">

			        <div class="modal-content ">

			        	<div class="modal-header">

			                <button type="button" class="close b-close" data-dismiss="modal" aria-hidden="true" style="font-size: 50px;">&times;</button>

			                <h2 class="modal-title">Gallery</strong></h2>

			            </div>

						<div class="modal-body"> 

							<div class="page_cont">

								<?php echo do_shortcode('[robo-gallery id="11937"]'); ?>

							</div>

						</div>

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

							<button type="button" class="close b-close" data-dismiss="modal" aria-hidden="true" style="font-size: 50px;">&times;</button>

							<h2 class="modal-title">Our Exclusive <strong>STAY</strong><span style="font-weight:700; color:#5cc5c9">CLEAN</span>&#8482; <strong>Glass</strong></h2>

						</div>

						<div class="modal-body">

							<div  class="text-left">

								<h2>Say <strong>NO</strong> to soap scum and hard mineral deposits! </h2>

								<div class="col-md-12" style="padding:0px !important; list-style-position: inside;">

									<br><p style="font-size:25px; line-height:30px;"><strong>Stay</strong><strong style="color:#5cc5c9">CLEAN</strong>&#8482; Protective glass is available for all of our <strong>Installation</strong><strong style="color:#5cc5c9">EASY</strong>&#8482; glass shower doors.</p> <br> <p style="font-size:25px; line-height:30px;">The benefits of our <strong>Stay</strong><strong style="color:#5cc5c9">CLEAN</strong>&#8482; glass is water and oil repellant resulting in:</p> <br>

									<img src="/wp-content/themes/frameshowerdoors/kiosk/images/stayclean.jpg" width="50%" style="float:right; padding-left:10px" >

									<ul style="list-style:square; list-style-position:inside; font-size:18px; line-height:35px;">

										<li>Stain resistance</li>

										<li>Scratch resistance</li>

										<li>Impact resistance</li>

										<li><strong>20%</strong> more brilliance</li>

										<li><strong>No</strong> need for harsh chemical cleaners</li>

										<li><strong>90% </strong>less frequent cleanings</li>

										<li>Reduction in mold and bacteria</li>

										<li>Lifetime warranty</li>

									</ul>

								</div>



								<div class="row">

									<div class="col-md-12">

										<div class="DYIcontent"></div>

										<div class="col-md-12" style="padding:0px !important;">

											<br>    <p style="font-size:20px; line-height:25px;">Nowhere else can you get direct from the manufacturer pricing, as little as 48 hour fabrication time and our exclusive <strong>Stay</strong><strong style="color:#5cc5c9">CLEAN</strong>&#8482; Water &amp; Stain Resistant glass. It's our way of saying thank you for helping us become the nation's largest truly frameless shower door manufacturer.
                                            
                                          </p>

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

							<button type="button" class="close b-close" data-dismiss="modal" aria-hidden="true" style="font-size: 50px;">&times;</button>

							<h2 class="modal-title">About <strong>Us</strong></h2>

						</div>

						<div class="modal-body">
<p style="text-align:left; margin-bottom:25px; font-size:21px; line-height:28px;">For over 25 years we have designed, shipped or installed custom glass frameless shower door enclosures for homeowners and contractors all over the globe. In addition to manufacturing our own line of frameless shower door enclosures, we offer our exclusive <strong>Stay<span style="color:#5cc5c9">CLEAN</span></strong>™ protective glass and DIY <strong>Installation<span style="color:#5cc5c9">EASY</span>™</strong> program. <br><br>
The Original Frameless Shower Doors is committed to providing fast and courteous service while offering affordable custom shower and bathtub enclosures that fit perfectly in every opening at standard door prices. 

</p>

<img src="<?php bloginfo('template_url'); ?>/kiosk/images/grouppict.jpg" width="100%">
							
<p style="text-align:left; font-size:28px;margin-top:25px; margin-bottom:25px;color:#05646a;"><strong>We are changing the way buying a shower door is done.&#8482; </strong><br></p>

<div class="col-md-6">
<ul style="list-style:square; text-align: left; font-size:18px; line-height:28px;">
<li>Unparalleled Technical Support</li><li>Zero Fabricatione</li><li>Expert Installation</li></ul></div>

		<div class="col-md-6">								

<ul style="list-style:square; text-align: left; font-size:18px; line-height:28px;">
<li>Easy-to-follow DIY Online Resources</li><li>Fastest turnaround in the industry</li></ul></div>
<div style="clear:both"></div>
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
							<button type="button" class="close b-close" data-dismiss="modal" aria-hidden="true" style="font-size: 50px;">&times;</button>
							<h2 class="modal-title">Design <strong>Tips</strong></h2>
			            </div>
						<div class="modal-body">
						    <div class="container">
								
								<div class="owl-carousel owl-theme text-left" id="designtips">
								    <div class="item">
                                    <p class="text-left" style="margin-bottom:15px; font-size:16px; color:#1f8f96"><em><img src="/wp-content/themes/frameshowerdoors/kiosk/images/fingerpointer.png" width="60"  style="width:60px !important;"> <strong>Swipe left to view next tip</strong></em></p>
                                    
									    <p>For over 25 years we have been in business designing custom frameless shower enclosures, in that time we have come across just about everything. From design flaws, to Do-it-Yourself disasters that are just too dreadful to even mention. So, we created design tips to help guide you, as well as illustrate for you what to avoid when preparing your opening for a Frameless Shower Door.</p>
									    <img src="/wp-content/uploads/2016/03/881x418xstart.png.pagespeed.ic_.PxBYBJ0lOl.png">
						    		</div>

						          	<div class="item">
                                    <p class="text-left" style="margin-bottom:15px; font-size:16px; color:#1f8f96"><em><img src="/wp-content/themes/frameshowerdoors/kiosk/images/fingerpointer.png" width="60"  style="width:60px !important;"> <strong>Swipe left to view next tip</strong></em></p>
									    <h3><strong>DESIGN TIP #1</strong></h3>
									    <p>Never design a curb (the sill that is under the door area) on an angle. This applies to 135 degree standard angle enclosures, 90 degree enclosures, as well as custom angle enclosure openings. Always design a curb so the door can swing freely in and out. The only way to do this is by making the curb hit the return knee wall or angle sill at 90 degrees (square).</p>
									    <img src="/wp-content/uploads/2016/03/881x248x1.png.pagespeed.ic_.mtn8bCR9m_.png" >
						    		</div>

						          	<div class="item">
                                    <p class="text-left" style="margin-bottom:15px; font-size:16px; color:#1f8f96"><em><img src="/wp-content/themes/frameshowerdoors/kiosk/images/fingerpointer.png" width="60"  style="width:60px !important;"> <strong>Swipe left to view next tip</strong></em></p>
									    <h3><strong>DESIGN TIP #2</strong></h3>
									    <p>Always pitch seats and shower floor pans so the water drains properly to the drain area. You do not want water to be stagnant or puddling will occur. Always pitch the curb sill under the door, on knee walls, and under all fixed panels approximately 3/16” in towards the interior of the shower enclosure to ensure proper drainage with no stagnant water buildup. Always try and use a continuous piece of marble or granite to minimize grout joints under the glass.</p>
						    			<img src="/wp-content/uploads/2016/03/881x346x2.jpg.pagespeed.ic_.PeRym7kQdY.jpg" >
						    		</div>

						          	<div class="item">
                                    <p class="text-left" style="margin-bottom:15px; font-size:16px; color:#1f8f96"><em><img src="/wp-content/themes/frameshowerdoors/kiosk/images/fingerpointer.png" width="60"  style="width:60px !important;"> <strong>Swipe left to view next tip</strong></em></p>
									    <h3><strong>DESIGN TIP #3</strong></h3>
									    <p>There is nothing standard about a frameless shower enclosure, but you should always work off of standard angles when possible.90 degree, 135 degree, 180 degree angles are your standard in the industry.</p>
									    <img src="/wp-content/uploads/2016/03/880x555x3.png.pagespeed.ic_.3AE74Tca4z.png" >
									</div>

						          	<div class="item">
                                    <p class="text-left" style="margin-bottom:15px; font-size:16px; color:#1f8f96"><em><img src="/wp-content/themes/frameshowerdoors/kiosk/images/fingerpointer.png" width="60"  style="width:60px !important;"> <strong>Swipe left to view next tip</strong></em></p>
									    <h3><strong>DESIGN TIP #4</strong></h3>
									    <p>For best results the soffits must be plumb to the lower curbs. The will ensure satisfaction on your design and give a perfect reveal.</p>
									    <img src="/wp-content/uploads/2016/03/881x347x4.png.pagespeed.ic_.ZQDG0zWMjF.png" >
						    		</div>

						          	<div class="item">
                                    <p class="text-left" style="margin-bottom:15px; font-size:16px; color:#1f8f96"><em><img src="/wp-content/themes/frameshowerdoors/kiosk/images/fingerpointer.png" width="60"  style="width:60px !important;"> <strong>Swipe left to view next tip</strong></em></p>
									    <h3><strong>DESIGN TIP #5</strong></h3>
									    <p>For best results, all body sprays should be directed towards the tile wall or fixed panels. Keep direct water spray away from the door. Never install body sprays directly opposite an enclosure door or opening. The only vulnerable area of a frameless shower enclosure is the door! So try to always keep direct water spray away (body jets and shower heads) from the door to ensure less water from escaping.</p>
									    <img src="/wp-content/uploads/2016/03/880x342x5-1.png.pagespeed.ic_.uM5RTgREvS.png" >
								    </div>

						          	<div class="item">
                                    <p class="text-left" style="margin-bottom:15px; font-size:16px; color:#1f8f96"><em><img src="/wp-content/themes/frameshowerdoors/kiosk/images/fingerpointer.png" width="60"  style="width:60px !important;"> <strong>Swipe left to view next tip</strong></em></p>
									    <h3><strong>DESIGN TIP #6</strong></h3>
									    <p>Due to polishing and tempering procedures a 4 ½” minimum width is required for glass panels.</p>
									    <img src="/wp-content/uploads/2016/03/881x851x6.png.pagespeed.ic_.PPfiQzuJxc.png" >
						    		</div>

						          	<div class="item">
                                    <p class="text-left" style="margin-bottom:15px; font-size:16px; color:#1f8f96"><em><img src="/wp-content/themes/frameshowerdoors/kiosk/images/fingerpointer.png" width="60"  style="width:60px !important;"> <strong>Swipe left to view next tip</strong></em></p>
									    <h3><strong>DESIGN TIP #7</strong></h3>
									    <p>If you are planning to use a decorative listello raised border or any border for that matter, always use one that is flush or flat with the other tile in the shower door area. If you choose to use one that sticks out past the wall tile, make sure it stops before the door area. Nothing should be protruding out that would interfere with the door swing.</p>
									    <img src="/wp-content/uploads/2016/03/880x419x7-1.png.pagespeed.ic_.9EqFQAfFij.png" >
									</div>

						          	<div class="item">
                                    <p class="text-left" style="margin-bottom:15px; font-size:16px; color:#1f8f96"><em><img src="/wp-content/themes/frameshowerdoors/kiosk/images/fingerpointer.png" width="60"  style="width:60px !important;"> <strong>Swipe left to view next tip</strong></em></p>
									    <h3><strong>DESIGN TIP #8</strong></h3>
									    <p>Never use glass tiles! When considering a frameless design that would require drilling into the tile. Inevitable the glass will crack during the drilling process, or over time.</p>
									    <img src="/wp-content/uploads/2016/03/881x368x8.png.pagespeed.ic_.Ls5ZNJPaUh.png" >
									</div>

						          	<div class="item">
                                    <p class="text-left" style="margin-bottom:15px; font-size:16px; color:#1f8f96"><em><img src="/wp-content/themes/frameshowerdoors/kiosk/images/fingerpointer.png" width="60"  style="width:60px !important;"> <strong>Swipe left to view next tip</strong></em></p>
									    <h3><strong>DESIGN TIP #9</strong></h3>
									    <p>Any overhangs near the door opening may cause problems, such as gaps, that will result in serious leaking issues. Always run the tile flush with the vertical rise tile.</p>
									    <img src="/wp-content/uploads/2016/03/881x368x9.png.pagespeed.ic_.IolKtIiAIW.png" >
						    		</div>

						          	<div class="item">
                                    <p class="text-left" style="margin-bottom:15px; font-size:16px; color:#1f8f96"><em><img src="/wp-content/themes/frameshowerdoors/kiosk/images/fingerpointer.png" width="60"  style="width:60px !important;"> <strong>Swipe left to view next tip</strong></em></p>
									    <h3><strong>DESIGN TIP #10</strong></h3>
									    <p>Pitch guidelines for shower curb. See below.</p>
									    <img src="/wp-content/uploads/2016/03/880x361x10-1.png.pagespeed.ic_.aRGkBuqTbQ.png" >
								    </div>

						          	<div class="item">
                                    <p class="text-left" style="margin-bottom:15px; font-size:16px; color:#1f8f96"><em><img src="/wp-content/themes/frameshowerdoors/kiosk/images/fingerpointer.png" width="60"  style="width:60px !important;"> <strong>Swipe left to view next tip</strong></em></p>
									    <h3><strong>DESIGN TIP #11</strong></h3>
									    <p>Always level the rise where the door closes this is most important; otherwise a costly custom double cut door is required.</p>

									    <img src="/wp-content/uploads/2016/03/881x415x11.png.pagespeed.ic_.SdkbOkozsV.png" >
								    </div>

						          	<div class="item">
                                    <p class="text-left" style="margin-bottom:15px; font-size:16px; color:#1f8f96"><em><img src="/wp-content/themes/frameshowerdoors/kiosk/images/fingerpointer.png" width="60"  style="width:60px !important;"> <strong>Swipe left to view next tip</strong></em></p>
									    <h3><strong>DESIGN TIP #12</strong></h3>
									    <p>When a return panel of glass that sits on a knee wall or a tub deck requires the glass to be notched, make sure the “leg” is no smaller than 4 ½” or a separate piece will need to be added creating another seam that can be avoided.</p>
									    <img src="/wp-content/uploads/2016/03/881x369x12.png.pagespeed.ic_.-LkCokjrP9.png" >
								    </div>

						          	<div class="item">
                                    <p class="text-left" style="margin-bottom:15px; font-size:16px; color:#1f8f96"><em><img src="/wp-content/themes/frameshowerdoors/kiosk/images/fingerpointer.png" width="60"  style="width:60px !important;"> <strong>Swipe left to view next tip</strong></em></p>
									    <h3><strong>DESIGN TIP #13</strong></h3>
									    <p>When designing your enclosure, try to never leave your tile, marble, granite, tub decks, etc. overhang anywhere. If it does, a notch can be made with a diamond saw. Make the notch 1/8” wider than the glass and no more than ¾” deep to minimize breakage.</p>
									    <img src="/wp-content/uploads/2016/03/881x369x13.png.pagespeed.ic_.6xXsTakrPz.png" >
						    		</div>

						          	<div class="item">
                                    <p class="text-left" style="margin-bottom:15px; font-size:16px; color:#1f8f96"><em><img src="/wp-content/themes/frameshowerdoors/kiosk/images/fingerpointer.png" width="60"  style="width:60px !important;"> <strong>Swipe left to view next tip</strong></em></p>
									    <h3><strong>DESIGN TIP #14</strong></h3>
									    <p>Always install a vertical wood stud where the door hinges will be placed or fixed panels are to be clipped too. Never run wires or pipes through or in front of the studs where the anchoring will be done. If you already did put pipes or wires where they shouldn’t be, make sure you tell us and we will manufacture the glass to ensure the screws miss them when the installation takes place.</p>
									    <img src="/wp-content/uploads/2016/03/880x390x14-1.png.pagespeed.ic_.WBWZa0h2a5.png" >
						    		</div>

						          	<div class="item">
                                    <p class="text-left" style="margin-bottom:15px; font-size:16px; color:#1f8f96"><em><img src="/wp-content/themes/frameshowerdoors/kiosk/images/fingerpointer.png" width="60"  style="width:60px !important;"> <strong>Swipe left to view next tip</strong></em></p>
									    <h3><strong>DESIGN TIP #15</strong></h3>
									    <p>If you are designing an enclosure that has a knee wall, always allow enough of a ledge for a small panel to join the 90 degree return panel that goes on top of the knee wall. This not only creates a small shelf and more room in the shower area, it secures the larger return panel eliminating almost all the flex from the 90 degree return piece.</p>
									    <img src="/wp-content/uploads/2016/03/881x493x15.png.pagespeed.ic_.VRbsHAyNU3.png" >
								    </div>
						         	<div class="item">
                                    <p class="text-left" style="margin-bottom:15px; font-size:16px; color:#1f8f96"><em><img src="/wp-content/themes/frameshowerdoors/kiosk/images/fingerpointer.png" width="60"  style="width:60px !important;"> <strong>Swipe left to view next tip</strong></em></p>
									    <h3><strong>DESIGN TIP #16</strong></h3>
											<p><strong>Wall Problems</strong><br>
											Walls which meet a door or a glass panel DO NOT need to be exactly vertical or “plumb” in order to prevent gaps, uneven joints, etc. Here at Frameless, we specialize in custom cutting your glass in house to conform to out of plumb walls (not level or perfectly straight). Other companies will tell you that this is not possible. We are telling you it is! It is very rare that we cannot configure a frameless shower door or enclosure to accommodate even the worst of openings.<br>
											<br>
											<strong>The Images Below.</strong> <br>
											Yes mean we can use a wall mounted hinge. The ones that say “need header” simply means we can cut the glass to the belly or bow or even high points of tiles that stick out, we would just have to use a header to offset the hinges to accommodate a bad tile job. </p>
					    					<img src="/wp-content/uploads/2016/03/x16.png.pagespeed.ic_.h8_f0hoCCo.png" >
						    			</div>
						          	<div class="item">
                                    <p class="text-left" style="margin-bottom:15px; font-size:16px; color:#1f8f96"><em><img src="/wp-content/themes/frameshowerdoors/kiosk/images/fingerpointer.png" width="60"  style="width:60px !important;"> <strong>Swipe left to view next tip</strong></em></p>
									    <h3><strong>DESIGN TIP #17</strong></h3>
									    <p>Be careful where you place your towel bar! Remember, we are here to help. If you have a question or concern, please let us know and we will make sure issues like this one does not happen to you. </p>
									    <img src="/wp-content/uploads/2016/03/880x343x17-1-1.jpg.pagespeed.ic_.ZwjPPTuxrJ-1.jpg" >
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
		</div>

	<?php wp_head(); ?>
<?php 

$cityname = $_REQUEST['FDLocation'];
$discount_kiosk =   $_REQUEST['56_temp'];

?>
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

$FDLocation 	=	$_REQUEST['FDLocation'];
$discount_kiosk	=	$_REQUEST['56_temp'];

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
}else if($FDLocation){
	$builddoor_url = '/fdkiosk/kiosk/?FDLocation='.$FDLocation.'&56_temp='.$discount_kiosk;
}

?>

<div id="header-builder" class="<?php echo $class_name; ?>" >
<div class="header_area">
			<div class="container"> 
					<div class="header_main">
						<div class="header_logo" >
			<div class="col-md-6">
			  <a href="<?php echo site_url().$builddoor_url; ?>"><img src="/wp-content/uploads/2016/08/KioskFrameless_logo.png" width="70%" alt="Logo" ></a>
			  <p >America's only buy direct from the manufacturer frameless <br>shower door company.</p>
			</div></div></div>
			<div class="col-md-5 col-md-offset-1" >
				<a style="color:#fff; font-weight:700; text-decoration:none;" href="/fdkiosk/kiosk/?FDLocation=<?php if($cityname){ echo $cityname; } ?>&56_temp=<?php echo $discount_kiosk; ?>" class="topbutton"><div style="width:80%;  margin:28px auto;  font-size:22px; text-align:center;   background:#f4870b; border:1px solid #e67307; box-shadow: 3px 3px 5px #333333; padding:25px;"><i class="fa fa-hand-pointer-o"></i>
&nbsp; 
 START OVER</div></a>
				<div class="bar2"><div class="bartext2">LOADING...</div></div>
                
			</div>
	
        </div>
	</div>

</div>
<div class="header_menu_area">

	    	<div class="row" style="padding:0px !important; margin:0px !important;">

	            <div class="header_menu_main" >

	        		<ul class="header_menu">

	                	<li class="poplinks"> <a  href="javascript:void(0)" rel="#warranty" data-toggle="modal"><div class="linkspace"><i class="fa fa-user" aria-hidden="true"></i> &nbsp;

	                    About Us</div></a></li>  

	                    

	                    <li class="poplinks"> <a  href="javascript:void(0)" rel="#contractor" data-toggle="modal" ><div class="linkspace"><i class="fa fa-cogs" aria-hidden="true"></i> &nbsp;

	                    BUYING PROCESS</div> </a> </li>

	                    

						<li class="poplinks"> <a href="javascript:void(0)" rel="#clean" data-toggle="modal"><div class="linkspace"><i class="fa fa-tint" aria-hidden="true"></i> &nbsp; STAY<span style="font-weight:700">CLEAN</span>&#8482; GLASS</div> </a> </li>

						<li class="poplinks"> <a href="javascript:void(0)" rel="#design" data-toggle="modal" style="width:100%"> <div class="linkspace"><i class="fa fa-paint-brush" aria-hidden="true"></i> &nbsp; DESIGN TIPS </div></a> </li>



						<li class="poplinks"> <a href="javascript:void(0)" rel="#gallery" data-toggle="modal"><div class="linkspace"><i class="fa fa-picture-o" aria-hidden="true"></i> &nbsp; Gallery </div></a> </li>

	                </ul>

	      		</div>

	        </div>

	    </div>
        
<script type='text/javascript' src='https://www.framelessshowerdoors.com/wp-content/plugins/robo-gallery/gallery/js/jquery.evemb.min.js?ver=2.3.3'></script>
<script type='text/javascript' src='https://www.framelessshowerdoors.com/wp-content/plugins/robo-gallery/gallery/js/jquery.utils.min.js?ver=2.3.3'></script>
<script type='text/javascript' src='https://www.framelessshowerdoors.com/wp-content/plugins/robo-gallery/gallery/js/jquery.magnific.min.js?ver=2.3.3'></script>
<script type='text/javascript' src='https://www.framelessshowerdoors.com/wp-content/plugins/robo-gallery/gallery/js/jquery.touch.min.js?ver=2.3.3'></script>
<script type='text/javascript' src='https://www.framelessshowerdoors.com/wp-content/plugins/robo-gallery/gallery/js/jquery.collagePlus.min.js?ver=2.3.3'></script>
<script type='text/javascript' src='https://www.framelessshowerdoors.com/wp-content/plugins/robo-gallery/js/script.js?ver=2.3.3'></script>


<link rel='stylesheet' id='robo-gallery-magnific-css'  href='https://www.framelessshowerdoors.com/wp-content/plugins/robo-gallery/gallery/css/magnific.css?ver=2.3.3' type='text/css' media='all' />
<link rel='stylesheet' id='robo-gallery-gallery-css'  href='https://www.framelessshowerdoors.com/wp-content/plugins/robo-gallery/gallery/css/gallery.css?ver=2.3.3' type='text/css' media='all' />
<link rel='stylesheet' id='robo-gallery-utils-css'  href='https://www.framelessshowerdoors.com/wp-content/plugins/robo-gallery/gallery/css/gallery.utils.css?ver=2.3.3' type='text/css' media='all' />
<link rel='stylesheet' id='robo-gallery-rbs-style-css'  href='https://www.framelessshowerdoors.com/wp-content/plugins/robo-gallery/css/style.css?ver=2.3.3' type='text/css' media='all' />
<link rel='stylesheet' id='robo-gallery-rbs-button-css'  href='https://www.framelessshowerdoors.com/wp-content/plugins/robo-gallery/addons/button/buttons.css?ver=2.3.3' type='text/css' media='all' />