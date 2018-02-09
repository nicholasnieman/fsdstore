<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
	<head>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/bootstrap.css" media="screen and (max-width: 980px)" />
		<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<?php wp_get_archives('type=monthly&format=link'); ?>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link href='//fonts.googleapis.com/css?family=Cardo:400,700,400italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link href='//fonts.googleapis.com/css?family=Lato:400,300,700,900' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
		<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/fav/favicon.ico" type="image/vnd.microsoft.icon"/>
		<link rel="icon" href="<?php bloginfo('template_url'); ?>/images/fav/favicon.ico" type="image/x-ico"/>
        
         <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/kiosk/kioskfonts/css/font-awesome.min.css"  />

		<?php
			global $post;
			if( is_archive() ){
			    global $wp_query;
			    $category = $wp_query->get_queried_object();
			    $cat_id = $category->term_id; 
				$taxonomy = $category->taxonomy;
				if($taxonomy == 'product_cat'){
					$wcatTerms = get_terms('product_cat',
						array('hide_empty' => false, 'orderby' => 'name', 'parent' => 0, )
					);
					$term_arr = array();
					foreach($wcatTerms as $wcatTerm){
						$t_id = $wcatTerm->term_id;
						$variable = get_field('_is_bundled_cat', 'product_cat_'.$t_id);
						if($variable == 'Yes'){
							$term_arr[$wcatTerm->term_id] = $wcatTerm->term_id;
						}
					}
					if(!in_array($cat_id,$term_arr)){
						function archive_styles_enqueue() {
							wp_enqueue_style( 'inner', get_template_directory_uri().DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR.'inner.css' );
							wp_enqueue_style( 'style', get_template_directory_uri().DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR.'style.css' );
							wp_enqueue_style( 'inner-wrappper', get_template_directory_uri().DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR.'inner-wrappper.css' );
							wp_enqueue_style( 'responsive2', get_template_directory_uri().DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR.'responsive.css' );
						}
						add_action( 'wp_enqueue_scripts', 'archive_styles_enqueue' );
					}
				}
			}    
		?>
	</head>
	<body <?php body_class(); ?>>
	<?php wp_head(); ?>

	<style type="text/css">
		@media only screen and (max-width:1000px){
			<?php
			     
				wp_enqueue_style( 'cutom', get_template_directory_uri().DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR.'cutom.css' );
				wp_enqueue_style( 'bootstrap', get_template_directory_uri().DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR.'bootstrap.css' );
				
			?>
		}
	
	</style>
	
		<!-- #Header Area -->
			

			 <div class="inner-header-custom">	
				<div class="top_bar">
				  <div style="min-height:auto;" id="main" class="container custom-min-height">
				    <div class="row">
					<div class="col-sm-7 col-md-col-7">
				      <div class="flag_text"> <img class="navFlag" src="<?php echo get_template_directory_uri(); ?>/images/usa-header.png">
				        <p><em>Always Buy American</em> <span> | </span> Call For a <strong>FREE</strong> Quote Today <strong itemprop="telephone"><a href="tel:+8553726537">855.372.6537</a></strong></p>
				      </div>
				    </div>
				    <div class="col-sm-5 col-md-col-5">
				      <div class="topnav">
				        <!-- <ul class="links">
				          <li class="first"><a title="My Cart" class="" href="<?php bloginfo("url"); ?>/checkout/cart/"><i class="fa fa-shopping-cart"></i> My Cart <strong>(<span id="strongCount"></span> Items)</strong></a> </li>
				          <li><a title="Checkout?" href="<?php bloginfo("url"); ?>/checkout">Checkout</a> </li>
						  <li><a title="Need Help?" href="<?php bloginfo("url"); ?>/contact">Need Help?</a> </li>
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
				</div>




				<div class="main_header inner-header-search-icon">
					<div style="min-height:146px;" id="main" class="container ">
						<div class="row">
						<div class="col-sm-3 col-md-col-3">
						  <div class="logo">
						  	<a id="logo" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name') ?>">
						  		<img src="<?php echo get_template_directory_uri(); ?>/images/FramelessShowerDoors_logo.gif" />
						  	</a>
						  </div>
						</div>
						<div class="col-sm-9 col-md-col-9">
						  <div class="header_right_content">
						    <div class="col-md-col-9">
						      <p class="slogan">America's only direct from the manufacturer frameless shower door company.</p>
						    </div>
						    <div class="col-md-col-4">
						     <ul class="social_icons">
						        <li><a href="https://www.linkedin.com/company/frameless-shower-doors?ISRC=FramelessShowerDoor:homepage:topNav:linkedIn"><i class="fa fa-linkedin"></i></a></li>
						        <li><a href="https://plus.google.com/105012829330780115683?ISRC=FramelessShowerDoor:homepage:topNav:googleplus"><i class="fa fa-google-plus"></i></a></li>
						        <li><a href="http://www.youtube.com/user/FramelessShowerDoors?ISRC=FramelessShowerDoor:homepage:topNav:youtube"><i class="fa fa-youtube"></i></a></li>
						        <li><a href="https://twitter.com/FramelesShower?ISRC=FramelessShowerDoor:homepage:topNav:twitter"><i class="fa fa-twitter"></i></a></li>
						        <li><a href="http://www.facebook.com/theoriginalframelessshowerdoors?ISRC=FramelessShowerDoor:homepage:topNav:facebook"><i class="fa fa-facebook"></i></a></li>
						      </ul>
						    </div>
						  </div>
						</div>
						</div>
					 	<div class="row">
							<div class="col-md-col-12">
							    <div class="custom_menu">
							     	<div class="menu"> <a href="#" id="menu-toggle"><span>menu</span></a>
							     	  	
							     	  	<?php if( function_exists( 'has_nav_menu' ) && has_nav_menu( 'primary' ) ) {
							     	  		wp_nav_menu(array( 'sort_column' => 'menu_order', 'container_class' => 'main-menu', 'container_id' => 'header-main-menu', 'menu_id' => 'main-menu', 'theme_location'  => 'primary') ); ?>
							     	  		<!-- <li><a id="btn-search" href="javascript:void(0);"><i class="fa fa-search"></i></a></li> -->
							     	  	<?php } else { ?>
							     	  	
							     	  	<div id="header-main-menu" class="main-menu">
							     	  		<ul id="menu_list" class="menu">
							     	  			<?php wp_list_pages('title_li=&depth=0'); ?>
							     	  			
							     	  		</ul>

							     	  	</div>
							     	  	<?php } ?>
							     	</div>
							    </div>
							    <div id="search-form">
							    	<a class="close b-close">Close</a>
									<?php get_search_form(); ?>

								</div>
					
							</div>
					  	</div>
					</div>
				</div>
				