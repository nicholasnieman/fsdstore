<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
<title>
<?php wp_title( '|', true, 'right' ); ?>
</title>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_get_archives('type=monthly&format=link'); ?>
<meta name="viewport" content="width=device-width, initial-scale=1" />

<meta name="google-site-verification" content="hjf2Occ1NA0WAPKVpJZIMkU90dbfcAj55ntFPSYTltQ" />


<?php wp_head(); ?>
<style type="text/css">
.slider-left-content {
    background:none;
    color: #fff;
    height: 100%;
    left: 0;
    padding: 30px 27px;
    position: absolute;
    top: 0;
    width: 46%;


    font-size: 18px;
    font-weight: 100;
    line-height: 150%;
}


</style>

<!---Favicon-image-->
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/fav/favicon.ico" type="image/vnd.microsoft.icon"/>
<link rel="icon" href="<?php bloginfo('template_url'); ?>/images/fav/favicon.ico" type="image/x-ico"/>
<!---Favicon-image-->
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
<link href='//fonts.googleapis.com/css?family=Piedra' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,700,600italic,700italic,800,800italic' rel='stylesheet' type='text/css'>


<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');

fbq('init', '607336452749550');
fbq('track', "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=607336452749550&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
<!-- Pintrest Pixel Code -->
<script type="text/javascript">
          !function(e){if(!window.pintrk){window.pintrk=function(){window.pintrk.queue.push(Array.prototype.slice.call(arguments))};var n=window.pintrk;n.queue=[],n.version="3.0";var t=document.createElement("script");t.async=!0,t.src=e;var r=document.getElementsByTagName("script")[0];r.parentNode.insertBefore(t,r)}}("https://s.pinimg.com/ct/core.js");

          pintrk('load','2615112756435');
		  
          pintrk('page', {
          page_name: 'My Page',
          page_category: 'My Page Category'
          });
          </script>
          <noscript>
          <img height="1" width="1" style="display:none;" alt=""
          src="https://ct.pinterest.com/v3/?tid=2615112756435&noscript=1" />
          </noscript>

<!-- End Pintrest Pixel Code -->

</head>

<body <?php body_class(); ?>>
<h1>Test</h1>
<div class="blanket" style="display: none;"></div>

<!-- #Header Area -->
<header>
  <div id="header" class="container skehead-headernav">
    <div class="top_bar">
      <div class="container">
        <div class="col-sm-6 col-md-6">
          <div class="flag_text"> <img class="navFlag" alt="shower doors" src="<?php echo get_template_directory_uri(); ?>/images/usa-header.png">
            <p><em>Always Buy American</em> <span> | </span> Call For a <strong>FREE</strong> Quote <strong itemprop="telephone"><a href="tel:+8553726537">855.372.6537</a></strong></p>
          </div>
        </div>
        <div class="col-sm-6 col-md-6">
          <div class="topnav">
            <!-- <ul class="links">
              <li class="first"><a title="My Cart" class="" href="<?php bloginfo("url"); ?>/checkout/cart/"><i class="fa fa-shopping-cart"></i> My Cart <strong>(<span id="strongCount"></span> Items)</strong></a> </li>
                       <li><a title="Checkout?" href="<?php bloginfo("url"); ?>/checkout/onepage/">Checkout</a> </li>
              <li><a title="Need Help?" href="<?php bloginfo("url"); ?>/contact?ISRC=FramelessShowerDoor:homepage:topNav:contact">Need Help?</a> </li>
              <li class="last">
          	          	<?php
          					if ( is_user_logged_in() ) {
          						?>
          							<a class="nav-login" title="Log In" href="<?php bloginfo("url"); ?>/my-account/customer-logout/">Log Out</a>
          						<?php
          					} else {
          						?>
          							<a class="nav-login" title="Log In" href="<?php bloginfo("url"); ?>/my-account/">Log In</a>
          						<?php
          					}
          	          	?>
			          </li>
            </ul> -->
          </div>
        </div>
      </div>
    </div>
    <div class="main_header">
      <div class="container">
        <div class="col-sm-3 col-md-3">
          <div class="logo"> <a id="logo" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name') ?>"> <img src="<?php echo get_template_directory_uri(); ?>/images/FramelessShowerDoors_logo.gif" alt-"Frameless Shower Doors" /> </a> </div>
        </div>
        <div class="col-sm-9 col-md-9">
          <div class="row header_right_content">
            <div class="col-md-9">
              <p class="slogan">America's only direct from the manufacturer frameless shower door company.</p>
            </div>
            <div class="col-md-3">
              <ul class="social_icons">
                <li><a href="https://www.linkedin.com/company/frameless-shower-doors?ISRC=FramelessShowerDoor:homepage:topNav:linkedIn"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="https://plus.google.com/105012829330780115683?ISRC=FramelessShowerDoor:homepage:topNav:googleplus"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="http://www.youtube.com/user/FramelessShowerDoors?ISRC=FramelessShowerDoor:homepage:topNav:youtube"><i class="fa fa-youtube"></i></a></li>
                <li><a href="https://twitter.com/FramelesShower?ISRC=FramelessShowerDoor:homepage:topNav:twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a href="http://www.facebook.com/theoriginalframelessshowerdoors?ISRC=FramelessShowerDoor:homepage:topNav:facebook"><i class="fa fa-facebook"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="row">
            <div class="custom_menu">
              <div class="menu"> <a href="#" id="menu-toggle"><span>menu</span></a>
                <?php if( function_exists( 'has_nav_menu' ) && has_nav_menu( 'primary' ) ) {
			            		wp_nav_menu(array( 'sort_column' => 'menu_order', 'container_class' => 'main-menu', 'container_id' => 'header-main-menu', 'menu_id' => 'main-menu', 'theme_location'  => 'primary') );
			            	} else { ?>
                <div id="header-main-menu" class="main-menu">
                  <ul id="menu_list" class="menu">
                    <?php wp_list_pages('title_li=&depth=0'); ?>
                  </ul>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12 device-none clear">
          <p class="align-center clear">Call For a <strong>FREE</strong> Quote <strong itemprop="telephone">855.372.6537</strong></p>
          <p class="align-center slogan">America's only direct from the manufacturer frameless shower door company.</p>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- #Header Area --> 

