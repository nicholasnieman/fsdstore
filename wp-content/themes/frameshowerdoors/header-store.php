<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
	<head>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/bootstrap.css" media="screen and (max-width: 980px)" />
        	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/store.css" />
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
					
				}
			}    
		?>
	</head>
	<body <?php body_class(); ?>>
	<?php wp_head(); ?>

	<style type="text/css">
	
	body {background:none !important}

	#mwrap {background:none !important}
	
	#mbar {
	background:none !important
}
	#main-header {background:none !important}
	
	#mwrapbg {background:none !important}
	
	
		@media only screen and (max-width:1000px){
			<?php
			     
				wp_enqueue_style( 'cutom', get_template_directory_uri().DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR.'cutom.css' );
				wp_enqueue_style( 'bootstrap', get_template_directory_uri().DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR.'bootstrap.css' );
				
			?>
		}
	
	</style>
	
		<!-- #Header Area -->
			<div class="store" style="margin:0px; padding:0px;">

		
				
<div style="width:100%; background:#4cafb3">
				
					<div class="container ">
						<div class="row">
							<div class="col-sm-6 col-md-col-6">
						
							  	<a  href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name') ?>">
							  		<img src="<?php echo get_template_directory_uri(); ?>/images/FramelessShowerDoors_logo.gif" />
							  	</a><p class="slogan">America's only direct from the manufacturer frameless shower door company.</p>
							  
							</div>
							<div class="col-sm-6 col-md-col-6">
							
							 
							     <ul class="social_icons">
							        <li><a href="https://www.linkedin.com/company/frameless-shower-doors"><i class="fa fa-linkedin"></i></a></li>
							        <li><a href="https://plus.google.com/105012829330780115683"><i class="fa fa-google-plus"></i></a></li>
							        <li><a href="http://www.youtube.com/user/FramelessShowerDoors"><i class="fa fa-youtube"></i></a></li>
							        <li><a href="https://twitter.com/FramelesShower"><i class="fa fa-twitter"></i></a></li>
							        <li><a href="http://www.facebook.com/theoriginalframelessshowerdoors"><i class="fa fa-facebook"></i></a></li>
							      </ul>
							</div>
						</div>
					</div>  	
				</div>
		