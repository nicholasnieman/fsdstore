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
		
		<meta name="viewport" content="width=1080, initial-scale=.7" />
		
		<link href='//fonts.googleapis.com/css?family=Cardo:400,700,400italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link href='//fonts.googleapis.com/css?family=Lato:400,300,700,900' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
		<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/fav/favicon.ico" type="image/vnd.microsoft.icon"/>
		<link rel="icon" href="<?php bloginfo('template_url'); ?>/images/fav/favicon.ico" type="image/x-ico"/>
        
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/kiosk/kioskfonts/css/font-awesome.min.css"  />
		<script src='https://www.framelessshowerdoors.com/wp-content/themes/frameshowerdoors/js/jquery.builder.js?ver=1.1'></script>
	</head>
	<body <?php body_class(); ?>>
	<?php wp_head(); ?>

	