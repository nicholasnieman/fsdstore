<?php
ob_start();
/*
** Register custom sidebars
*/
register_sidebar(array(
	'name' => 'Sidebar 1',
	'id'            => 'Sidebar 1',
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>',
));

register_sidebar(array(
	'name' => 'Footer 1',
	'id' => 'Footer 1',
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>',
));

register_sidebar(array(
	'name' => 'Footer 2',
	'id' => 'Footer 2',
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>',
));

register_sidebar(array(
	'name' => 'Footer 3',
	'id' => 'Footer 3',
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>',
));

register_sidebar(array(
	'name' => 'Footerr 4',
	'id' => 'Footerr 4',
	'before_widget' => '<div id="%1$s" class="gift-special widget-container %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h4 class="section_heading widget-title">',
	'after_title' => '</h4>',
));

register_sidebar(array(
	'name' => 'Footer 5',
	'id' => 'Footer 5',
	'before_widget' => '<div id="%1$s" class="gift-special widget-container %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h4 class="section_heading widget-title">',
	'after_title' => '</h4>',
));

register_sidebar(array(
	'name' => 'Service Layout',
	'id' => 'Service Layout',
	'before_widget' => '<div id="%1$s" class="gift-special widget-container %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="section_heading widget-title">',
	'after_title' => '</h3>',
));

register_sidebar(array(
	'name' => 'Why FSD Layout',
	'id' => 'Why FSD Layout',
	'before_widget' => '<div id="%1$s" class="gift-special widget-container %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="section_heading widget-title">',
	'after_title' => '</h3>',
));


register_sidebar(array(
	'name' => 'DIY Center Navigation',
	'id' => 'DIY Center Navigation',
	'before_widget' => '<div id="%1$s" class="gift-special widget-container %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="section_heading widget-title">',
	'after_title' => '</h3>',
));

register_sidebar(array(
	'name' => 'Link Section',
	'id' => 'Link Section',
	'before_widget' => '<div id="%1$s" class="gift-special widget-container %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="section_heading widget-title">',
	'after_title' => '</h3>',
));

register_sidebar(array(
	'name' => 'link Section Images',
	'id' => 'Link Section Images',
	'before_widget' => '<div id="%1$s" class="gift-special widget-container %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="section_heading widget-title">',
	'after_title' => '</h3>',
));
/*
** Register Menus
*/
register_nav_menus( array(
	'primary' => __( 'Primary Navigation', 'theme' ),
));

register_nav_menus( array(
	'footer' => __( 'Footer Navigation', 'theme' ),
));

/*
** Add thumbnail support
*/
if (function_exists( 'add_theme_support' )) { 
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150, true ); 
}

/*
** Add custom class to menu item
*/
function wpb_first_and_last_menu_class($items) {
    $items[1]->classes[] = 'first-menu-item';
    $items[count($items)]->classes[] = 'last-menu-item';
    return $items;
}
add_filter('wp_nav_menu_objects', 'wpb_first_and_last_menu_class');

/**
* Custom body class based on browsers
*/

function improved_browser_body_class($classes) {
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
	if($is_lynx) $classes[] = 'lynx';
	elseif($is_gecko) $classes[] = 'gecko';
	elseif($is_opera) $classes[] = 'opera';
	elseif($is_NS4) $classes[] = 'ns4';
	elseif($is_safari) $classes[] = 'safari';
	elseif($is_chrome) $classes[] = 'chrome';
	elseif($is_IE) {
		$classes[] = 'ie';
		if(preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version))
		$classes[] = 'ie'.$browser_version[1];
	} else $classes[] = 'unknown';
	if($is_iphone) $classes[] = 'iphone';
	if ( stristr( $_SERVER['HTTP_USER_AGENT'],"mac") ) {
		$classes[] = 'osx';
	} elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"linux") ) {
		$classes[] = 'linux';
	} elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"windows") ) {
		$classes[] = 'windows';
	}
	return $classes;
}
add_filter('body_class','improved_browser_body_class');

/*
** Filters wp_title to print a neat <title> tag based on what is being viewed.
*/
function improved_wp_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() )
	return $title;

	// Add the blog name
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
	$title .= " $sep $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
	$title .= " $sep " . sprintf( __( 'Page %s' ), $paged, $page );

	return $title;
}
add_filter( 'wp_title', 'improved_wp_title', 10, 2 );

/*
** Enqueue custom jQuery scripts
*/
function improved_adding_scripts() {
	$classes = get_body_class();
	if( in_array('single',$classes) && is_single() ){
		wp_register_script('product_js',get_template_directory_uri().'/js/jquery.product.js', array('jquery'),'1.1', false);
		wp_enqueue_script('product_js');
		wp_localize_script( 'product_js', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'we_value' => 1234 ) );
	}
	else if(in_array('page-builder',$classes) || in_array('page-kiosk',$classes) || in_array('page-template-landing-page',$classes ) ){
		wp_register_script('product_js',get_template_directory_uri().'/js/jquery.product.js', array('jquery'),'1.1', false);
		wp_enqueue_script('product_js');	
		wp_localize_script( 'product_js', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'we_value' => 1234 ) );
	}
	wp_register_script('builder_js', get_template_directory_uri().'/js/jquery.builder.js', array('jquery'),'1.1', false);
	wp_enqueue_script('builder_js');	
	wp_localize_script('builder_js','ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'we_value' => 4567 ) );
	wp_register_script('custom_js', get_template_directory_uri().'/js/jquery.custom.js', array('jquery'),'1.1', false);
	wp_enqueue_script('custom_js');
	wp_localize_script( 'custom_js', 'ajax_object', array( 'ajax_url' => admin_url('admin-ajax.php'),'we_value' => 1234) );
	wp_enqueue_script( 'NiceScroller_js', get_template_directory_uri().DIRECTORY_SEPARATOR.'js'.DIRECTORY_SEPARATOR.'/jquery.nicescroll.min.js', array('jquery') );
	wp_enqueue_script( 'jquerybpopup', get_template_directory_uri().DIRECTORY_SEPARATOR.'js'.DIRECTORY_SEPARATOR.'jquery.bpopup.min.js', array('jquery') );
	wp_enqueue_script( 'fancybox_pack', get_template_directory_uri().DIRECTORY_SEPARATOR.'js'.DIRECTORY_SEPARATOR.'jquery.fancybox.pack.js', array('jquery') );
	wp_enqueue_script( 'fancybox_buttons', get_template_directory_uri().DIRECTORY_SEPARATOR.'js'.DIRECTORY_SEPARATOR.'jquery.fancybox-buttons.js', array('jquery') );
	wp_enqueue_script( 'fancybox_media', get_template_directory_uri().DIRECTORY_SEPARATOR.'js'.DIRECTORY_SEPARATOR.'jquery.fancybox-media.js', array('jquery') );
	wp_enqueue_script( 'fancybox_thumbs', get_template_directory_uri().DIRECTORY_SEPARATOR.'js'.DIRECTORY_SEPARATOR.'jquery.fancybox-thumbs.js', array('jquery') );
	wp_enqueue_script( 'fancybox_mousewheel_pack', get_template_directory_uri().DIRECTORY_SEPARATOR.'js'.DIRECTORY_SEPARATOR.'jquery.mousewheel.pack.js', array('jquery') );
	wp_enqueue_script( 'owlcarousel', get_template_directory_uri().DIRECTORY_SEPARATOR.'js'.DIRECTORY_SEPARATOR.'owl.carousel.js', array('jquery') );
	wp_enqueue_script( 'idle-timer', get_template_directory_uri().DIRECTORY_SEPARATOR.'js'.DIRECTORY_SEPARATOR.'idle-timer.js', array('jquery') );
}
add_action( 'wp_enqueue_scripts', 'improved_adding_scripts' );

/*
** Additional CSS files included for mobile menu, responsive & slider
*/
function improved_styles_enqueue() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR.'basic-css/bootstrap.css' );
	wp_enqueue_style( 'utility', get_template_directory_uri().DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR.'utility.css' );
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri().DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR.'owl-carousel/owl.carousel.css' );
	wp_enqueue_style( 'owl-theme', get_template_directory_uri().DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR.'owl-carousel/owl.theme.css' );
	wp_enqueue_style( 'fancybox', get_template_directory_uri().DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR.'basic-css/jquery.fancybox.css' );
	$classes = get_body_class();
	if( is_home() || is_front_page() && in_array('home',$classes) || in_array('page-template-hardware-finishes',$classes) || in_array('page-template-get-started',$classes) || in_array('page-template-get-startedWORKING',$classes) || in_array('page-template-door-builder',$classes) || in_array('page-template-thank-you',$classes) || in_array('page-main-thank-you',$classes ) || in_array('page-template-contractor',$classes ) || in_array('page-builder',$classes )|| in_array('page-kiosk',$classes ) || in_array('page-template-landing-page',$classes ) ){ 
		wp_enqueue_style( 'big-wrapper', get_template_directory_uri().DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR.'big-wrapper.css' );
		wp_enqueue_style( 'animate', get_template_directory_uri().DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR.'basic-css/animate.css' );
	}
	else if( in_array('post-type-archive-product', $classes) && in_array('post-type-archive', $classes) ){
		wp_enqueue_style( 'inner', get_template_directory_uri().DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR.'inner.css' );
		wp_enqueue_style( 'innerstyle', get_template_directory_uri().DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR.'style.css' );
		wp_enqueue_style( 'inner-wrappper', get_template_directory_uri().DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR.'inner-wrappper.css' );
	}
	else if( is_archive() && in_array('archive',$classes) || in_array('page-template-about-DFI',$classes) ){
		wp_enqueue_style( 'big-wrapper', get_template_directory_uri().DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR.'big-wrapper.css' );
	}
	else if( in_array('single',$classes) && is_single() ){
		global $post;
		$storemetabox       =   get_post_meta( get_the_ID(), 'tinfini_storemetabox', true );
		if( in_array('single-product',$classes) && $storemetabox == 'on' ){
			wp_enqueue_style( 'inner', get_template_directory_uri().DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR.'inner.css' );
			wp_enqueue_style( 'innerstyle', get_template_directory_uri().DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR.'style.css' );
			wp_enqueue_style( 'inner-wrappper', get_template_directory_uri().DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR.'inner-wrappper.css' );
		}
		else{
			wp_enqueue_style( 'big-wrapper', get_template_directory_uri().DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR.'big-wrapper.css' );
		}
	}
	else{
		wp_enqueue_style( 'inner', get_template_directory_uri().DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR.'inner.css' );
		wp_enqueue_style( 'innerstyle', get_template_directory_uri().DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR.'style.css' );
		wp_enqueue_style( 'inner-wrappper', get_template_directory_uri().DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR.'inner-wrappper.css' );
	}
	wp_enqueue_style( 'responsive', get_template_directory_uri().DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR.'responsive/responsive.css' );
}
add_action( 'wp_enqueue_scripts', 'improved_styles_enqueue' );

/*
** Excerpt Customization
*/
function improved_trim_excerpt($text) {
	global $post;
	if ( '' == $text ) {
		$text = get_the_content('');
		$text = apply_filters('the_content', $text);
		$text = str_replace('\]\]\>', ']]&gt;', $text);
		$text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
		$text = strip_tags($text, '<ul><li><p><br><em>&nbsp;<strong>');
		$excerpt_length = 100;
		$words = explode(' ', $text, $excerpt_length + 1);

		if (count($words) > $excerpt_length) {
			array_pop($words);
			array_push($words, '...<a class="read_mre" href="'.get_permalink().'">Continue Reading '.get_the_title().'</a>');
			$text = implode(' ', $words);
		}
	}
	return $text;
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'improved_trim_excerpt');

/*
** Get featured image
*/
function improved_featured_image(){
	$featured_image = $featured_image_out = null;

	$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );

	if(!empty($featured_image)){
		$featured_image_out = '<div class="featured_image_box">
			<a href="'.get_permalink().'" title="'.get_the_title().'">
				<img src="'.$featured_image[0].'" width="'.$featured_image[1].'" height="'.$featured_image[2].'" alt="'.get_the_title().'" />
			</a>
		</div>';
	}
	echo $featured_image_out;
}

function limit_words_next($string, $word_limit) {

	$excerpt = explode(' ', $string);

	$excerpt = implode(' ', array_slice($excerpt,0, $word_limit));

	$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
	
	$excerpt = strip_tags($excerpt, '');

	return $excerpt;

}

 /**
* Custom body class based on browsers
*/

function get_browser_body_class($classes) {
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
	if($is_lynx) $classes[] = 'lynx';
	elseif($is_gecko) $classes[] = 'gecko';
	elseif($is_opera) $classes[] = 'opera';
	elseif($is_NS4) $classes[] = 'ns4';
	elseif($is_safari) $classes[] = 'safari';
	elseif($is_chrome) $classes[] = 'chrome';
	elseif($is_IE) {
		$classes[] = 'ie';
		if(preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version))
		$classes[] = 'ie'.$browser_version[1];
	} else $classes[] = 'unknown';
	if($is_iphone) $classes[] = 'iphone';
	if ( stristr( $_SERVER['HTTP_USER_AGENT'],"mac") ) {
		$classes[] = 'osx';
	} elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"linux") ) {
		$classes[] = 'linux';
	} elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"windows") ) {
		$classes[] = 'windows';
	}
	return $classes;
}
add_filter('body_class','get_browser_body_class');

function is_tree($pid) {      // $pid = The ID of the page we're looking for pages underneath
	global $post;         // load details about this page
	if(is_page()&&($post->post_parent==$pid||is_page($pid))) 
        return true;   // we're at the page or at a sub page
	else 
        return false;  // we're elsewhere
};
include('includes/frame-breadcrumb.php');
include('includes/tild-functions.php');
include('includes/custompost-type.php');
include('cmb2/meta-fields.php' );

/**
 * Gel List for product tags
 */
function product_tag_func($productid, $re_cattid){
	$_product_tagarr = array();
   	if( get_field('_product_tag', $productid) ): 
   	   while( has_sub_field('_product_tag', $productid) ): 

   	   	    $product_category   = get_sub_field('_product_category_grouped');
   	   		$product_taged 		= get_sub_field('_product_taged_group');
   	   		$term 			= get_term( $product_category, 'product_cat' );

   	   	    $product_cat_slug 	= $term->slug;
   	   	    if($product_cat_slug == $re_cattid){		    	
   	   			$_product_tagarr[]  = $product_taged;
   	   	    }
   	  endwhile;
   	endif;
   	return $_product_tagarr;
}

/**
 * Ajax action for Glass Type using Glass Thickness return Glass Type
 */
function wc_rebundled_product(){
	global $wpdb;
 	if( isset($_REQUEST['data']) ){
	    $vall = $_REQUEST['data'];
	    $vall = trim($vall);
	    $_glstypearr[] = array();
	   	global $wpdb;
	   	$se = " select DISTINCT glass_type from ".$wpdb->prefix."bundlied_productmeta where glass_thickness= '$vall' AND product_cate='Glass' ";
	   	$re = $wpdb->get_results($se);
	   	foreach($re as $k => $rowe) // = mysql_fetch_object($re))
	   	{
	   		foreach ($rowe as $key => $value) {
	   			if(trim($value) == 'Bronze' && $vall == '1/2 in.'){
	   				//Do Nothing
	   			}
	   			else{
	   				$_glstypearr[] = trim($value);
	   			}
	   		}
	   	}
	   	echo $_glstypearr = json_encode($_glstypearr);
  	}
  	exit();
}
add_action('wp_ajax_rebundled_product', 'wc_rebundled_product');
add_action('wp_ajax_nopriv_rebundled_product', 'wc_rebundled_product');

/**
 * Ajax action for rebundled_product_hardwrfinish return Hardware Finish
 */
function wc_rebundled_product_hardwrfinish(){
	global $wpdb;
 	if( isset($_REQUEST['glsthckns_val']) &&  isset($_REQUEST['productid']) ){
	    $glsthckns_val = trim($_REQUEST['glsthckns_val']);
	    $productid = trim($_REQUEST['productid']);
	    $hingetaggarr =  $title_arr = $_glstypearr[] = array();
		$hinge_cattid = 'hinge';
		$hingetaggarr = product_tag_func($productid, $hinge_cattid);
		if($hingetaggarr){
			foreach ($hingetaggarr as $key => $taggvalue) {
		   		$args = array(
		  	    	'posts_per_page' => -1,
		  	    	'orderby' => 'rand',
		  	    	'post_type' => 'product',
		  	    	'post_status' => 'publish',
		  			'tax_query' => array(
		  				array('taxonomy' => 'product_tag', 'field'    => 'term_id', 'terms'    => $taggvalue[0], ),
		  			),
		  			'meta_query' => array(
		  				array('key'     => 'glass_thickness', 'value'   => $glsthckns_val, 'compare' => '=', ),
		  			),
		  	    );
		  	   $wpdb->query('SET SQL_BIG_SELECTS = 1');
		  	   $query = new WP_Query( $args );
		  		if ( $query->have_posts() ) {
		  			while ( $query->have_posts() ) {
		  				$query->the_post();
		  				$hf_name = get_post_meta(get_the_ID(), 'hardware_finish' , true);
		  				$title_arr[ get_the_ID() ]  =  $hf_name;
		  			}
		  		}
		  		wp_reset_postdata();
		   	}
		}
	   	$se = " select DISTINCT hardware_finish from ".$wpdb->prefix."bundlied_productmeta where glass_thickness = '$glsthckns_val'";
	   	$re = $wpdb->get_results($se);
	   	foreach($re as $k => $rowe) // = mysql_fetch_object($re))
	   	{
	   		$rowval =  $rowe->hardware_finish;
	   		if($title_arr){
	   			foreach ($title_arr as $key => $title_vl) {
	   				if($rowval == $title_vl){
	   					$_glstypearr[$key] = $title_vl;
	   				}
	   			}
	   		}
	   		else{
	   			$_glstypearr[] = $rowval;
	   		}
	   		
	   	}
	   	echo $_glstypearr = json_encode($_glstypearr);
	}
  	exit();
}
add_action('wp_ajax_rebundled_product_hardwrfinish', 'wc_rebundled_product_hardwrfinish');
add_action('wp_ajax_nopriv_rebundled_product_hardwrfinish', 'wc_rebundled_product_hardwrfinish');

/**
 * Ajax action for rebundled_product_hardwrfinish return Hinges
 */
function wc_rebundled_product_hinge(){
	global $wpdb;
 	if( isset($_REQUEST['hardwrfinish_val']) && isset($_REQUEST['glsthckns_val']) &&  isset($_REQUEST['productid']) ){
		$glsthckns_val 		= trim($_REQUEST['glsthckns_val']);
		$hardwrfinish_val 	= trim($_REQUEST['hardwrfinish_val']);
		$productid 			= trim($_REQUEST['productid']);
	    $title_arr[] = $ky_arr[] = array();
	    $hinge_cattid = 'hinge';
	   	$hingetaggarr = product_tag_func($productid, $hinge_cattid);
		if($hingetaggarr){
			foreach ($hingetaggarr as $key => $taggvalue) {
		   		$args = array(
		  	    	'posts_per_page' => -1,
		  	    	'orderby' => 'rand',
		  	    	'post_type' => 'product',
		  	    	'post_status' => 'publish',
		  			'tax_query' => array(
		  				array('taxonomy' => 'product_tag', 'field'    => 'term_id', 'terms'    => $taggvalue[0], ),
		  			),
		  			'meta_query' => array(
		  				'relation' => 'AND',
		  				array('key'     => 'glass_thickness', 'value'   => $glsthckns_val, 'compare' => '=', ),
		  				array('key'     => 'hardware_finish', 'value'   => $hardwrfinish_val, 'compare' => '=', ),
		  			),
		  	    );
		  	   $wpdb->query('SET SQL_BIG_SELECTS = 1');
		  	   $query = new WP_Query( $args );
		  		if ( $query->have_posts() ) {
		  			while ( $query->have_posts() ) {
		  				$query->the_post();
		  				$hstyle_name = get_post_meta(get_the_ID(), 'hinge_style' , true);
		  				$title_arr[ get_the_ID() ]  =  $hstyle_name;
		  			}
		  		}	
		  		wp_reset_postdata();
		   	}
		}
		else{
		   	$se = " select * from ".$wpdb->prefix."bundlied_productmeta where hardware_finish= '$hardwrfinish_val' AND glass_thickness = '$glsthckns_val'  AND product_cate='Hinge' ";
		   	$re = $wpdb->get_results($se);
		   	foreach($re as $keyval => $rowe) // = mysql_fetch_object($re))
		   	{
				$title_arr[$rowe->hinge_style] = $rowe->hinge_style;
		   	}
		}
	   	echo $title_arr = json_encode($title_arr);
	}
  	exit();
}
add_action('wp_ajax_rebundled_product_hinge', 'wc_rebundled_product_hinge');
add_action('wp_ajax_nopriv_rebundled_product_hinge', 'wc_rebundled_product_hinge');


/**
 * Ajax action for rebundled_product_knob return Knob Style
 */
function wc_rebundled_product_knob(){
	global $wpdb;
 	if( isset($_REQUEST['hardwrfinish_val']) && isset($_REQUEST['glsthckns_val']) && isset($_REQUEST['productid']) && isset($_REQUEST['hinges_val']) ){
	    $glsthckns_val = trim($_REQUEST['glsthckns_val']);
	    $hardwrfinish_val = trim($_REQUEST['hardwrfinish_val']);
	    $hinges_val = trim($_REQUEST['hinges_val']);
	    $productid = trim($_REQUEST['productid']);
	    $returnarr = $_glstypearr[] = array();
		$re_cattid = 'knob';
	    $taggarr = product_tag_func($productid, $re_cattid);
		$style_name = '';

	    $args = array(
	    	'posts_per_page' => -1,
	    	'orderby' => 'rand',
	    	'post_type' => 'product',
			'tax_query' => array(
				'relation' => 'AND',
				array('taxonomy' => 'product_cat', 'field'    => 'slug', 'terms'    => $re_cattid, ),
				array('taxonomy' => 'product_tag', 'field'    => 'term_id', 'terms'    => $taggarr[0], ),
			),
			'meta_query' => array(
				array('key'     => 'hardware_finish', 'value'   => $hardwrfinish_val, 'compare' => '=', ),
			),
	    );
	   $wpdb->query('SET SQL_BIG_SELECTS = 1');
	   $query = new WP_Query( $args );

		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				$style_name =  get_post_meta(get_the_ID(),'knob_style',true);
				if($style_name != ''){
					$thumbnail_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full');
					$returnarr[$thumbnail_image[0]] = $style_name;
				}
			}
		}
		wp_reset_postdata();
		echo $returnarr = json_encode($returnarr);
  	}
  	exit();
}
add_action('wp_ajax_rebundled_product_knob', 'wc_rebundled_product_knob');
add_action('wp_ajax_nopriv_rebundled_product_knob', 'wc_rebundled_product_knob');

/*Function will return number from string in array format*/
function get_numerics ($str) {
    preg_match_all('/\d+/', $str, $matches);
    return $matches[0];
}

/**
 * Ajax action for rebundled_product_handle return Handle Style
 */
function wc_rebundled_product_handle(){
	global $wpdb;
 	if( isset($_REQUEST['hardwrfinish_val']) && isset($_REQUEST['handle_size']) && isset($_REQUEST['productid']) && isset($_REQUEST['hinges_val']) ){
	    $handle_size = trim($_REQUEST['handle_size']);
	    $hardwrfinish_val = trim($_REQUEST['hardwrfinish_val']);
	    $hinges_val = trim($_REQUEST['hinges_val']);
	        $productid = trim($_REQUEST['productid']);
	        $return_arr = $_glstypearr[] = array();
	    	$re_cattid = 'handle';
	        $taggarr = product_tag_func($productid, $re_cattid);
	      	$style_name = '';
	        $args = array(
	        	'posts_per_page' => -1,
	        	'orderby' => 'rand',
	        	'post_type' => 'product',
	    		'tax_query' => array(
	    			'relation' => 'AND',
	    			array('taxonomy' => 'product_cat', 'field'    => 'slug', 'terms'    => $re_cattid, ),
	    			array('taxonomy' => 'product_tag', 'field'    => 'term_id', 'terms'    => $taggarr[0], ),
	    		),
	    		'meta_query' => array(
	    			array('key'     => 'hardware_finish', 'value'   => $hardwrfinish_val, 'compare' => '=', ),
	    			array('key'     => 'handle_size', 'value'   => $handle_size, 'compare' => '=', ),
	    		),
	        );
	       $wpdb->query('SET SQL_BIG_SELECTS = 1');
	       $query = new WP_Query( $args );
	    	if ( $query->have_posts() ) {
	    		while ( $query->have_posts() ) {
	    			$query->the_post();
	    			$style_name =  get_post_meta(get_the_ID(),'handle_style',true).' ';
	    			if($style_name != ''){
	    				$thumbnail_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full');
	    				$return_arr[$thumbnail_image[0]] = $style_name;
	    			}
	    		}
	    	}
	    	wp_reset_postdata();
	    	echo $return_arr = json_encode($return_arr);
  	}
  	exit();
}
add_action('wp_ajax_rebundled_product_handle', 'wc_rebundled_product_handle');
add_action('wp_ajax_nopriv_rebundled_product_handle', 'wc_rebundled_product_handle');

/*Combo Handle Towelbar combo return Combo Towelbar Size */

function wc_rebundled_combo_towelbar(){
	global $wpdb;
 	if( isset($_REQUEST['hardwrfinish_val']) && isset($_REQUEST['combo_handle_size']) && isset($_REQUEST['productid']) ){
	    $combo_handle_size = trim($_REQUEST['combo_handle_size']);
	    $hardwrfinish_val = trim($_REQUEST['hardwrfinish_val']);
	        $productid = trim($_REQUEST['productid']);
	        $returnarr = $_glstypearr[] = array();
	    	$re_cattid = 'handle-towelbar-combo';
	        $taggarr = product_tag_func($productid, $re_cattid);
	    	$style_name = '';

	        $args = array(
	        	'posts_per_page' => -1,
	        	'orderby' => 'rand',
	        	'post_type' => 'product',
	    		'tax_query' => array(
	    			'relation' => 'AND',
	    			array('taxonomy' => 'product_cat', 'field'    => 'slug', 'terms'    => $re_cattid, ),
	    			array('taxonomy' => 'product_tag', 'field'    => 'term_id', 'terms'    => $taggarr[0], ),
	    		),
	    		'meta_query' => array(
	    			array('key'     => 'combo_handle_size', 'value'   => $combo_handle_size, 'compare' => '=', ),
	    			array('key'     => 'hardware_finish', 'value'   => $hardwrfinish_val, 'compare' => '=', ),
	    		),
	        );
	       $wpdb->query('SET SQL_BIG_SELECTS = 1');
	       $query = new WP_Query( $args );

	    	if ( $query->have_posts() ) {
	    		while ( $query->have_posts() ) {
	    			$query->the_post();
	    			$style_name =  get_post_meta(get_the_ID(),'combo_towelbar_size',true);
	    			if($style_name != ''){
	    				$thumbnail_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full');
	    				$returnarr[$thumbnail_image[0]] = $style_name;
	    			}
	    		}
	    	}
	    	wp_reset_postdata();
	    echo $returnarr = json_encode($returnarr);
  	}
  	exit();
}
add_action('wp_ajax_rebundled_combo_towelbar', 'wc_rebundled_combo_towelbar');
add_action('wp_ajax_nopriv_rebundled_combo_towelbar', 'wc_rebundled_combo_towelbar');

/**
 * Ajax action for rebundled_product_towelbarstyle pull return Combo Style
 */
function wc_rebundled_product_towelbarstyle(){
	global $wpdb;
 	if( isset($_REQUEST['hardwrfinish_val']) && isset($_REQUEST['combo_towelbar_size']) && isset($_REQUEST['combo_handle_size']) && isset($_REQUEST['productid']) ){
	    $hardwrfinish_val 	= trim($_REQUEST['hardwrfinish_val']);
		$combo_towelbar_size 		= trim($_REQUEST['combo_towelbar_size']);
		$combo_handle_size 	= trim($_REQUEST['combo_handle_size']);
		$productid 			= trim($_REQUEST['productid']);
	    $closed = $_glstypearr = $temp_arr = array();
	    $tstyle = '';
		$post_id 	= $productid;
		$re_cattid 	= 'handle-towelbar-combo';
			$_product_tagarr = array();
		   	if( get_field('_product_tag', $productid) ):
		   	   while( has_sub_field('_product_tag', $productid) ):
		   	   	    $product_category   = get_sub_field('_product_category_grouped');
		   	   		$product_taged 		= get_sub_field('_product_taged_group');
		   	   		$term 			= get_term( $product_category, 'product_cat' );
		   	   	    $product_cat_slug 	= $term->slug;
		   	   	    if($product_cat_slug == $re_cattid){
		   	   			$_product_tagarr[]  = $product_taged;
		   	   	    }
		   	  endwhile;
		   	endif;

		$closed[] = array('key' => 'hardware_finish', 'value' => $hardwrfinish_val, 'compare' => '=');
		$closed[] = array('key' => 'combo_towelbar_size', 'value' => $combo_towelbar_size, 'compare' => '=');
		$closed[] = array('key' => 'combo_handle_size', 'value' => $combo_handle_size, 'compare' => '=');
		$re_cattid 	= 'handle-towelbar-combo';
		$_product_tag = '';
		$productnm = array();
		foreach ($_product_tagarr as $_product_tag) {
			$args = array(
				'posts_per_page' => -1,
				'orderby' => 'rand',
				'post_type' => 'product',
				'tax_query' => array('taxonomy' => 'product_cat', 'field'    => 'slug', 'terms'    => $re_cattid, ),
				'tax_query' => array(array('taxonomy' => 'product_tag', 'field' => 'term_id', 'terms' => $_product_tag ) ),
				'meta_query' => array('relation' => 'AND', $closed )
			);
			$postslist = get_posts( $args );
			foreach ( $postslist as $post ) : setup_postdata( $post );
			$thumbnail_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full');
					
				$style_name =  get_post_meta($post->ID,'combo_style',true);
				if( $style_name == 'C Pull'){
					$style_name = "'C' Pull";
				}
				$productnm[$thumbnail_image[0]] = $style_name;
			endforeach; 
			wp_reset_postdata();
		}
	  	echo $_glstypearr = json_encode($productnm);
  	}
  	exit();
}
add_action('wp_ajax_rebundled_product_towelbarstyle', 'wc_rebundled_product_towelbarstyle');
add_action('wp_ajax_nopriv_rebundled_product_towelbarstyle', 'wc_rebundled_product_towelbarstyle');

/*Combo Handle Towelbar combo return Combo Towelbar Size */
function wc_rebundled_towelbar(){
	global $wpdb;
 	if( isset($_REQUEST['hardwrfinish_val']) && isset($_REQUEST['productid']) ){
	    $hardwrfinish_val = trim($_REQUEST['hardwrfinish_val']);
	        $productid = trim($_REQUEST['productid']);
	        $returnarr = $_glstypearr[] = array();
	    	$re_cattid = 'towelbar';
	        $taggarr = product_tag_func($productid, $re_cattid);
	    	$style_name = '';
	        $args = array(
	        	'posts_per_page' => -1,
	        	'orderby' => 'rand',
	        	'post_type' => 'product',
	    		'tax_query' => array(
	    			'relation' => 'AND',
	    			array('taxonomy' => 'product_cat', 'field'    => 'slug', 'terms'    => $re_cattid, ),
	    			array('taxonomy' => 'product_tag', 'field'    => 'term_id', 'terms'    => $taggarr[0], ),
	    		),
	    		'meta_query' => array(
	    			array('key'     => 'hardware_finish', 'value'   => $hardwrfinish_val, 'compare' => '=', ),
	    		),
	        );
	       $wpdb->query('SET SQL_BIG_SELECTS = 1');
	       $query = new WP_Query( $args );
	    	if ( $query->have_posts() ) {
	    		while ( $query->have_posts() ) {
	    			$query->the_post();
	    			$style_name =  get_post_meta(get_the_ID(),'towelbar_size',true);
	    			if($style_name != ''){
	    				$thumbnail_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full');
	    				$returnarr[$thumbnail_image[0]] = $style_name;
	    			}
	    		}
	    	}
	    	wp_reset_postdata();
	    echo $returnarr = json_encode($returnarr);
  	}
  	exit();
}
add_action('wp_ajax_rebundled_towelbarsize', 'wc_rebundled_towelbar');
add_action('wp_ajax_nopriv_rebundled_towelbarsize', 'wc_rebundled_towelbar');

/*Combo Handle Towelbar combo return Combo Towelbar Size */
function wc_rebundled_towelbarside(){
	global $wpdb;
 	if( isset($_REQUEST['hardwrfinish_val']) && isset($_REQUEST['productid'])&& isset($_REQUEST['towelbar_size']) ){
	    $hardwrfinish_val = trim($_REQUEST['hardwrfinish_val']);
	    $towelbar_size = trim($_REQUEST['towelbar_size']);
	        $productid = trim($_REQUEST['productid']);
	        $returnarr = $_glstypearr[] = array();
	    	$re_cattid = 'towelbar';
	        $taggarr = product_tag_func($productid, $re_cattid);
	    	$style_name = '';
	        $args = array(
	        	'posts_per_page' => -1,
	        	'orderby' => 'rand',
	        	'post_type' => 'product',
	    		'tax_query' => array(
	    			'relation' => 'AND',
	    			array('taxonomy' => 'product_cat', 'field'    => 'slug', 'terms'    => $re_cattid, ),
	    			array('taxonomy' => 'product_tag', 'field'    => 'term_id', 'terms'    => $taggarr[0], ),
	    		),
	    		'meta_query' => array(
	    			array('key'     => 'hardware_finish', 'value'   => $hardwrfinish_val, 'compare' => '=', ),
	    			array('key'     => 'towelbar_size', 'value'   => $towelbar_size, 'compare' => '=', ),
	    		),
	        );
	       $wpdb->query('SET SQL_BIG_SELECTS = 1');
	       $query = new WP_Query( $args );

	    	if ( $query->have_posts() ) {
	    		while ( $query->have_posts() ) {
	    			$query->the_post();
	    			$style_name =  get_post_meta(get_the_ID(),'towelbar_sides',true);
	    			if($style_name != ''){
	    				$thumbnail_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full');
	    				$returnarr[$thumbnail_image[0]] = $style_name;
	    			}
	    		}
	    	}
	    	wp_reset_postdata();
	    echo $returnarr = json_encode($returnarr);
  	}
  	exit();
}
add_action('wp_ajax_rebundled_towelbarside', 'wc_rebundled_towelbarside');
add_action('wp_ajax_nopriv_rebundled_towelbarside', 'wc_rebundled_towelbarside');

/**
 * Ajax action for rebundled_product_combo return Towelbar Style (YES/NO)
 */
function wc_rebundled_product_combo(){
	global $wpdb;
 	if( isset($_REQUEST['hardwrfinish_val']) && isset($_REQUEST['towelbar_size']) && isset($_REQUEST['towelbar_side']) ){
	    $towelbar_size = trim($_REQUEST['towelbar_size']);
	    $hardwrfinish_val = trim($_REQUEST['hardwrfinish_val']);
	    $towelbar_side = trim($_REQUEST['towelbar_side']);
	        $productid = trim($_REQUEST['productid']);
	        $returnarr = $_glstypearr[] = array();
	    	$re_cattid = 'towelbar';
	        $taggarr = product_tag_func($productid, $re_cattid);
	    	$style_name = '';
	        $args = array(
	        	'posts_per_page' => -1,
	        	'orderby' => 'rand',
	        	'post_type' => 'product',
	    		'tax_query' => array(
	    			'relation' => 'AND',
	    			array('taxonomy' => 'product_cat', 'field'    => 'slug', 'terms'    => $re_cattid, ),
	    			array('taxonomy' => 'product_tag', 'field'    => 'term_id', 'terms'    => $taggarr[0], ),
	    		),
	    		'meta_query' => array(
	    			array('key'     => 'towelbar_size', 'value'   => $towelbar_size, 'compare' => '=', ),
	    			array('key'     => 'hardware_finish', 'value'   => $hardwrfinish_val, 'compare' => '=', ),
	    			array('key'     => 'towelbar_sides', 'value'   => $towelbar_side, 'compare' => '=', ),
	    		),
	        );
	       $wpdb->query('SET SQL_BIG_SELECTS = 1');
	       $query = new WP_Query( $args );
	    	if ( $query->have_posts() ) {
	    		while ( $query->have_posts() ) {
	    			$query->the_post();
	    			$style_name =  get_post_meta(get_the_ID(),'towelbar_style',true);
	    			if($style_name != ''){
	    				$thumbnail_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full');
	    				$returnarr[$thumbnail_image[0]] = $style_name;
	    			}
	    		}
	    	}
	    	wp_reset_postdata();
	    echo $returnarr = json_encode($returnarr);
  	}
  	exit();
}
add_action('wp_ajax_rebundled_product_combo', 'wc_rebundled_product_combo');
add_action('wp_ajax_nopriv_rebundled_product_combo', 'wc_rebundled_product_combo');

/*filter to give permission to  upload swf files in wordpress medias */
add_filter('upload_mimes', 'pixert_upload_swf');
function pixert_upload_swf($existing_mimes){
	$existing_mimes['swf'] = 'text/swf'; //allow swf files
	return $existing_mimes;
}

/**
 * Ajax action for Glass Price rebundled_product_knob
 */
function wc_rebundled_glass_price(){
	global $post;
		if( isset($_REQUEST['data']) ){
			$bundledagainJson = $_REQUEST['data'];
			$json_text = stripslashes($bundledagainJson);
			$bundledagain = json_decode($json_text, true);
			$tstyle = '';
			$pricearr = $closed = array();
			if( !empty($bundledagain) ){
				foreach( $bundledagain as $bundledkey => $bundledvalue){
					$re_productid = $bundledvalue['re_productid'];
					$re_cattid = $bundledvalue['re_cattid'];
					$_product_catarr = $_product_tagarr = $_default_qty = $mainarr = array();
					if( get_field('_product_tag', $re_productid) ):
					   while( has_sub_field('_product_tag', $re_productid) ):
					    $product_category   = get_sub_field('_product_category_grouped');
						$product_taged 		= get_sub_field('_product_taged_group');
						$default_qty 		= get_sub_field('_default_qty');
						$term 				= get_term( $product_category, 'product_cat' );
					    $product_cat_slug 	= $term->slug;
					    if($product_cat_slug == $re_cattid){
							$_product_tagarr[]  = $product_taged;
							$_default_qty[] 	= $default_qty;
					    }
					  endwhile;
					endif;
					if($re_cattid == 'glass'){
						if($bundledvalue['re_keyname'] == 'glass_thickness' || $bundledvalue['re_keyname'] == 'glass_type'){
							$pricearr[$bundledvalue['re_keyname']] = $bundledvalue['total_area'];
						}
					}

					if($re_cattid == 'standard-door'){
						if($bundledvalue['re_keyname'] == 'standard_door_height' || $bundledvalue['re_keyname'] == 'hardware_finish'){
							$pricearr[$bundledvalue['re_keyname']] = $bundledvalue['total_area'];
						}
					}

					else if($re_cattid == 'hinge'){
						if($bundledvalue['re_keyname'] == 'glass_thickness' || $bundledvalue['re_keyname'] == 'hinge_style' || $bundledvalue['re_keyname'] == 'hardware_finish'){
								$pricearr[$bundledvalue['re_keyname']] = $bundledvalue['total_area'];
							}
					}

					else if($re_cattid == 'knob'){
						if($bundledvalue['re_keyname'] == 'hardware_finish' || $bundledvalue['re_keyname'] == 'knob_style' ){
							$pricearr[$bundledvalue['re_keyname']] = $bundledvalue['total_area'];
						}
					}

					else if($re_cattid == 'handle'){
						if( $bundledvalue['re_keyname'] == 'handle_size' || $bundledvalue['re_keyname'] == 'hardware_finish' || $bundledvalue['re_keyname'] == 'handle_style' ){
							$pricearr[$bundledvalue['re_keyname']] = $bundledvalue['total_area'];
						}
					}

					else if($re_cattid == 'handle-towelbar-combo'){
						if($bundledvalue['re_keyname'] == 'hardware_finish' || $bundledvalue['re_keyname'] == 'combo_handle_size' || $bundledvalue['re_keyname'] == 'combo_towelbar_size' || $bundledvalue['re_keyname'] == 'combo_style'){
							$pricearr[$bundledvalue['re_keyname']] = $bundledvalue['total_area'];
						}
					}

					else if($re_cattid == 'towelbar'){
						if($bundledvalue['re_keyname'] == 'hardware_finish' || $bundledvalue['re_keyname'] == 'towelbar_size' || $bundledvalue['re_keyname'] == 'towelbar_style' || $bundledvalue['re_keyname'] == 'towelbar_sides'){
							$pricearr[$bundledvalue['re_keyname']] = $bundledvalue['total_area'];
						}
						$tsize1 = '';
						if($bundledvalue['re_keyname'] == 'towelbar_side'){
							$tside1 = $bundledvalue['total_area'];
						}
						if($bundledvalue['re_keyname'] == 'undefined'){
							$size2 = get_numerics($bundledvalue['total_area']);
						}
					}
				}
				foreach ($pricearr as $pricekey => $priceval) {$closed[] = array('key' => $pricekey, 'value' => $priceval, 'compare' => '='); }

				$cnt_tag= $_product_tag = '';
				$cnt_tag = count($_product_tagarr);
				if($cnt_tag == 1){
					foreach ($_product_tagarr as $_product_tag) {
						if( $re_cattid == 'towelbar' ){
							$args = array(
								'post_type'  => 'product',
								'post_count' => -1,
								'tax_query' => array(
									'relation' => 'AND',
									array('taxonomy' => 'product_cat', 'field'    => 'slug', 'terms'    => $re_cattid, ),
									array('taxonomy' => 'product_tag', 'field'    => 'term_id', 'terms'    =>  $_product_tag[0], ),
								),
								'meta_query' => array('relation' => 'AND', $closed )
							);
						}
						else{
							$args = array(
								'post_type'  => 'product',
								'post_count' => -1,
								'tax_query' => array(
									'relation' => 'AND',
									array('taxonomy' => 'product_cat', 'field'    => 'slug', 'terms'    => $re_cattid, ),
									array('taxonomy' => 'product_tag', 'field'    => 'term_id', 'terms'    =>  $_product_tag[0], ),
								),
								'meta_query' => array('relatio n' => 'AND', $closed )
							);
						}
						$query = new WP_Query( $args );
						$finalarr = array();
						if ( $query->have_posts() ) {
							while ( $query->have_posts() ) {
								$query->the_post();
								if($re_cattid == 'towelbar'){
									$sku = get_post_meta(get_the_ID(), '_sku', true);
									$new_sku = get_post_meta(get_the_ID(), '_price', true);
									if($tside1 == 'Single'){
										if (strpos($sku, 'X') == false) {
											$finalarr[] = array(
												'sku'  => get_post_meta(get_the_ID(), '_sku', true),
												'price'=> $new_sku * $_default_qty[0]
											);
										}
									}else{
										if (strpos($sku, 'X') !== false) {
											$finalarr[] = array( 
												'sku'  => get_post_meta(get_the_ID(), '_sku', true),
												'price'=> $new_sku * $_default_qty[0]
											);
										}
										
									}
								}
								else{
									get_post_meta(get_the_ID(), '_sku', true);
									$new_sku = get_post_meta(get_the_ID(), '_price', true);
									$finalarr[] = array(
										'sku'  => get_post_meta(get_the_ID(), '_sku', true),
										'price'=> $new_sku * $_default_qty[0]
									);
								}
							}
						}
						wp_reset_postdata();
					}
				}
				else{
					$finalarr = array();
					$_product_tag = '';
					foreach ($_product_tagarr as $key => $_product_tag) {
						if( $re_cattid == 'towelbar' ){
							$args = array(
								'post_type'  => 'product',
								'post_count' => -1,
								'tax_query' => array(
									'relation' => 'OR',
									array('taxonomy' => 'product_cat', 'field'    => 'slug', 'terms'    => $re_cattid, ),
									array('taxonomy' => 'product_tag', 'field'    => 'term_id', 'terms'    =>  $_product_tag[0], ),
								),
								'meta_query' => array('relation' => 'AND', $closed ) 
							);
						}
						else{
							$args = array(
								'post_type'  => 'product',
								'post_count' => -1,
								'tax_query' => array(
									'relation' => 'AND',
									array('taxonomy' => 'product_cat', 'field'    => 'slug', 'terms'    => $re_cattid, ),
									array('taxonomy' => 'product_tag', 'field'    => 'term_id', 'terms'    =>  $_product_tag[0], ),
								),
								'meta_query' => array('relation' => 'AND', $closed )
							);
						}
						$query = new WP_Query( $args );
						if ( $query->have_posts() ) {
							while ( $query->have_posts() ) {
								$query->the_post();
								if($re_cattid == 'towelbar'){
									$sku = get_post_meta(get_the_ID(), '_sku', true);
									$new_price = get_post_meta(get_the_ID(), '_price', true);
									if($tside1 == 'Single'){
										if (strpos($sku, 'X') == false) {
											$finalarr[] = array( 
												'sku'  => get_post_meta(get_the_ID(), '_sku', true),
												'price'=> $new_price * $_default_qty[0]
											);
										}
										else{
											$finalarr[] = array(
												'sku'  => 'No Sku Find for towelbar single',
												'price'=> ' for towelbar single'
											);
										}
									}else{
										$new_price = get_post_meta(get_the_ID(), '_price', true);
										if (strpos($sku, 'X') !== false) {
											$finalarr[] = array(
												'sku'  => get_post_meta(get_the_ID(), '_sku', true),
												'price'=> $new_price * $_default_qty[0]
											);
										}
										else{
											$finalarr[] = array( 
												'sku'  => 'No Sku Find for towelbar back2back',
												'price'=> ' for towelbar back2back'
											);
										}
									}
								}
								else{
									$product_sku = get_post_meta(get_the_ID(), '_sku', true);
									if($product_sku){
										$new_price = get_post_meta(get_the_ID(), '_price', true);
										$finalarr[] = array(
											'sku'  => get_post_meta(get_the_ID(), '_sku', true),
											'price'=> $new_price * $_default_qty[0]
										);
									}
									else{
										$finalarr[] = array( 
											'sku'  => 'No Sku Find',
											'price'=> ''
										);
									}
								}
							}
						}
						wp_reset_postdata();
					}
				}
				if (!empty($finalarr)) {
					$mainarr[$re_cattid] = $finalarr;
				}
				else{
					$finalarr[] = array( 
						'sku'  => 'Nothing Foundd',
						'price'=> ''
					);
					$mainarr[$re_cattid] = array_unique($finalarr);
				}
			}
			echo $mainarr = json_encode($mainarr);
		}
	exit();
}
add_action('wp_ajax_rebundled_glass_price', 'wc_rebundled_glass_price');
add_action('wp_ajax_nopriv_rebundled_glass_price', 'wc_rebundled_glass_price');

/**
 * Ajax action for create price for backend product
 */
function callback_backend_price($tad_arr, $cat_id, $qty, $meta_arr){
	global $wpdb;
	$cnt_tag ='';
	$cnt_tag = count($tad_arr);
	if($cnt_tag == 1){
		$_product_tag = '';
		foreach ($tad_arr as $key => $_product_tag) {
			foreach ($qty as $qty_key => $qty_val) {
				if($_product_tag[0] == $qty_key){
					$quantity = $qty_val;
				}
			}
			$args = array(
				'post_type'  => 'product',
				'post_count' => -1,
				'tax_query' => array(
					'relation' => 'AND',
					array('taxonomy' => 'product_cat', 'field'    => 'slug', 'terms'    => $cat_id, ),
					array('taxonomy' => 'product_tag', 'field'    => 'term_id', 'terms'    =>  $_product_tag[0], ),
				), 'meta_query' => array('relation' => 'AND', $meta_arr ) 
			);
			$wpdb->query('SET SQL_BIG_SELECTS = 1');
			$query = new WP_Query( $args );
			$finalarr = array();
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					$current_sku = get_post_meta(get_the_ID(), '_sku', true);
					$new_price = (get_post_meta(get_the_ID(), '_price', true) * $quantity);
					if($current_sku != ''){
						$finalarr[] = array(
							'sku'  => get_post_meta(get_the_ID(), '_sku', true),
							'price'=> $new_price
						);
					}
				}
			}
			wp_reset_postdata();
		}
	}
	else{
		$finalarr = array();
		$_product_tag = '';
		foreach ($tad_arr as $key => $_product_tag) {
			foreach ($qty as $qty_key => $qty_val) {
				if($_product_tag[0] == $qty_key){
					$quantity = $qty_val;
				}
			}
			$args = array(
				'post_type'  => 'product',
				'post_count' => -1,
				'tax_query' => array(
					'relation' => 'AND',
					array('taxonomy' => 'product_cat', 'field'    => 'slug', 'terms'    => $cat_id, ),
					array('taxonomy' => 'product_tag', 'field'    => 'term_id', 'terms'    =>  $_product_tag[0], ),
				),
				'meta_query' => array('relation' => 'AND', $meta_arr )
			);
			$wpdb->query('SET SQL_BIG_SELECTS = 1');
			$query = new WP_Query( $args );
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					$current_sku = get_post_meta(get_the_ID(), '_sku', true);
					$new_price = (get_post_meta(get_the_ID(), '_price', true) * $quantity);
					if($current_sku != ''){
						$finalarr[] = array(
							'sku'  => get_post_meta(get_the_ID(), '_sku', true),
							'price'=> $new_price
						);
					}
				}
			}wp_reset_postdata();
		}
	}
	if (!empty($finalarr)) {
		return $finalarr;
	}
	else{
		$finalarr[] = array(
			'sku'  => 'No Sku Foundd',
			'price'=> ''
		);
		return $finalarr;
	}
}

// For Pull Handle Price
function wc_rebundled_installation_price(){
	global $wpdb,$post;
		if( isset($_REQUEST['data']) )
		{
			$bundledagainJson = $_REQUEST['data'];
			$json_text = stripslashes($bundledagainJson);
			$bundledagain = json_decode($json_text, true);
			$mainarr = $clampmeta = $clamp = $pricearr = $closed = $headermeta = $header = array();
			if( !empty($bundledagain) )
			{
				foreach( $bundledagain as $bundledkey => $bundledvalue){ /*Installation Kit*/
					if($bundledvalue['re_keyname'] == 'install_kit'){
						$pricearr[$bundledvalue['re_keyname']] = $bundledvalue['total_area'];
					}
					$re_productid = $bundledvalue['re_productid'];
				}

				foreach ($pricearr as $pricekey => $priceval) {
					$priceval .= $priceval;
				}
				foreach ($pricearr as $pricekey => $priceval) {
					$priceval = explode(' ', $priceval);
					$priceval = array_filter($priceval);
					$ins_arr[] = array('key' => $pricekey, 'value' => $priceval[0], 'compare' => '=');
				}
				$args = array(
						'post_type'  => 'product',
						'tax_query' => array(
							array(
								'taxonomy' => 'product_cat',
								'field'    => 'slug',
								'terms'    => array( 'installation' ),
							)
						),'meta_query' => array($ins_arr )
					);
				$finalarr = array();
				$wpdb->query('SET SQL_BIG_SELECTS = 1');
				$query = new WP_Query( $args );
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post();
						$title_pro = get_the_title();
						$new_price = get_post_meta(get_the_ID(), '_price', true);
						$finalarr['sku'] = get_post_meta(get_the_ID(), '_sku', true);
						$finalarr['price'] = $new_price;
					}
				}
				else{
					$finalarr['sku'] = 'No Charges for installation';
					$finalarr['price'] = 0;
				}
				wp_reset_postdata();
				if( $finalarr) { $mainarr['installation'] = $finalarr; } /*Installation Query End*/
				$re_cattid_clamp = $re_cattid_shelfc = $re_cattid_sleev = $re_cattid_basic = $re_cattid_uchanl = $re_cattid_header = $re_cattid_door = $re_cattid_door = '';
				$_product_basic_tagarr = $_default_basic_qty = $basicarr = array();
				$_product_door_tagarr = $re_cattid_door = $_default_door_qty = array();
				$_product_clamp_tagarr = $_default_clamp_qty = $exclosed = $expricearr = $clamparr = array();
				$_product_shlfc_tagarr = $_default_shlfc_qty = $shlfcclosed = $exshlfcrarr = $shelfarr = array();
				$_product_sleev_tagarr = $_default_sleev_qty = $sleevclosed = $exsleevarr = $sleevarr = array();
				$_product_uchanl_tagarr = $_default_uchanl_qty = $uchanlclosed = $exuchanlarr = $uchanlarr = array();
				$_product_header_tagarr = $_default_header_qty = $headerclosed = $exheaderarr = $headerarr = array();
				if( get_field('_product_tag', $re_productid) ){
				   	while( has_sub_field('_product_tag', $re_productid) ){
					    $product_category   = get_sub_field('_product_category_grouped');
						$product_taged 		= get_sub_field('_product_taged_group');
						$default_qty 		= get_sub_field('_default_qty');
						$term 				= get_term( $product_category, 'product_cat' );
					    $product_cat_slug 	= $term->slug;
					    /*Clamp*/
		    		    if($product_cat_slug == 'clamp'){
		    		    	$re_cattid_clamp			= 'clamp';
		    		    	if($re_cattid_clamp			= 'clamp'){
		    		    		$_product_clamp_tagarr[]    = $product_taged;
		    		    		$_default_clamp_qty[$product_taged[0]] = $default_qty;
		    		    	}
		    		    	foreach( $bundledagain as $bundledkey => $bundledvalue){
		    					if($bundledvalue['re_keyname'] == 'hardware_finish' || $bundledvalue['re_keyname'] == 'hinge_style'){
		    						$expricearr[$bundledvalue['re_keyname']] = $bundledvalue['total_area'];
		    					}
		    				}
		    				foreach ($expricearr as $pricekey => $priceval) {$exclosed[] = array('key' => $pricekey, 'value' => $priceval, 'compare' => '='); }
		    			
		  					$clamparr = callback_backend_price($_product_clamp_tagarr, $re_cattid_clamp, $_default_clamp_qty, $exclosed);
		    		    }
		    		    /*Shelf Clamp*/
		    		    if($product_cat_slug == 'shelf-clamp'){	
		    		    	$re_cattid_shelfc			= 'shelf-clamp';
		    		    	$_product_shlfc_tagarr[]    = $product_taged;
		    		    	$_default_shlfc_qty[$product_taged[0]] 	    = $default_qty;
		    		    	foreach( $bundledagain as $bundledkey => $bundledvalue){
		    		    		if($bundledvalue['re_keyname'] == 'hardware_finish' || $bundledvalue['re_keyname'] == 'hinge_style' || $bundledvalue['re_keyname'] == 'glass_thickness'){
		    		    			$exshlfcrarr[$bundledvalue['re_keyname']] = $bundledvalue['total_area'];
		    		    		}
		    		    		$re_productid = $bundledvalue['re_productid'];
		    		    	}
		    		    	foreach ($exshlfcrarr as $pricekey => $priceval) {$shlfcclosed[] = array('key' => $pricekey, 'value' => $priceval, 'compare' => '='); }
		    		    	$shelfarr = callback_backend_price($_product_shlfc_tagarr, $re_cattid_shelfc, $_default_shlfc_qty, $shlfcclosed);
		    		    }
		    		    /*Sleev Over Clamp*/
		    		    if($product_cat_slug == 'sleeve-over-clamp'){	
		    		    	$re_cattid_sleev			= 'sleeve-over-clamp';
		    		    	$_product_sleev_tagarr[]    = $product_taged;
		    		    	$_default_sleev_qty[$product_taged[0]] 	    = $default_qty;
		    		    	foreach( $bundledagain as $bundledkey => $bundledvalue){
		    		    		if( $bundledvalue['re_keyname'] == 'hardware_finish'){
		    		    			$exsleevarr[$bundledvalue['re_keyname']] = $bundledvalue['total_area'];
		    		    		}
		    		    		$re_productid = $bundledvalue['re_productid'];
		    		    	}
		    		    	foreach ($exsleevarr as $pricekey => $priceval) {$sleevclosed[] = array('key' => $pricekey, 'value' => $priceval, 'compare' => '='); }
		    		    	$sleevarr = callback_backend_price($_product_sleev_tagarr, $re_cattid_sleev, $_default_sleev_qty, $sleevclosed);
		    		    }
		    		    /*U Channel*/
		    		    if($product_cat_slug == 'u-channel'){	
		    		    	$re_cattid_uchanl			= 'u-channel';
		    		    	$_product_uchanl_tagarr[]    = $product_taged;
		    		    	$_default_uchanl_qty[$product_taged] 	    = $default_qty;
		    		    	foreach( $bundledagain as $bundledkey => $bundledvalue){
		    		    		if($bundledvalue['re_keyname'] == 'hardware_finish' || $bundledvalue['re_keyname'] == 'glass_thickness'){
		    		    			$exuchanlarr[$bundledvalue['re_keyname']] = $bundledvalue['total_area'];
		    		    		}
		    		    		$re_productid = $bundledvalue['re_productid'];
		    		    	}
		    		    	foreach ($exuchanlarr as $pricekey => $priceval) {$uchanlclosed[] = array('key' => $pricekey, 'value' => $priceval, 'compare' => '='); }
		    		    	$uchanlarr = callback_backend_price($_product_uchanl_tagarr, $re_cattid_uchanl, $_default_uchanl_qty, $uchanlclosed);
		    		    }
		    		   	/*Header*/
		    		    if($product_cat_slug == 'header'){
		    		    	$re_cattid_header			= 'header';
		    		    	$_product_header_tagarr[]    = $product_taged;
		    		    	$_default_header_qty[$product_taged[0]] 	    = $default_qty;
		    		    	foreach( $bundledagain as $bundledkey => $bundledvalue){
		    		    		if($bundledvalue['re_keyname'] == 'hardware_finish'){
		    		    			$exheaderarr[$bundledvalue['re_keyname']] = $bundledvalue['total_area'];
		    		    		}
		    		    		$re_productid = $bundledvalue['re_productid'];
		    		    	}
		    		    	foreach ($exheaderarr as $pricekey => $priceval) {$headerclosed[] = array('key' => $pricekey, 'value' => $priceval, 'compare' => '='); }
		    		    	$headerarr = callback_backend_price($_product_header_tagarr, $re_cattid_header, $_default_header_qty, $headerclosed);
		    		    }
		    		    /*Basic*/
		    		    if($product_cat_slug == 'basic')
		    		    {
		    		    	$re_cattid_door = 'basic';
		    		    	$_product_basic_tagarr[]    = $product_taged;
		    		    	$_default_basic_qty[] 	    = $default_qty;
		    		    	$cnt_basic = '';
		    		    	$cnt_basic = count($_product_basic_tagarr);
		    		    	if($cnt_basic ==1) {
		    		    		foreach ($_product_basic_tagarr as $key => $value) {	
		    		    			$args = array(
		    		    				'posts_per_page' => -1,
		    		    				'orderby' => 'rand',
		    		    				'post_type' => 'product',
		    		    				'tax_query' => array(array('taxonomy' => 'product_cat', 'field' => 'slug', 'terms' => $_product_basic_tagarr ) ),
		    		    				'tax_query' => array(array('taxonomy' => 'product_tag', 'field' => 'term_id', 'terms' => $value[0] ) )
		    		    			);
		    		    			$postslist = get_posts( $args );
		    		    			$basicarr = array();
		    		    			foreach ( $postslist as $post ) : setup_postdata( $post );
		    		    				$productnm[$post->ID] = $post->post_title;
		    		    					$new_price = get_post_meta($post->ID, '_price', true);
		    		    					$basicarr[] = array(
		    		    						'sku'  => get_post_meta($post->ID, '_sku', true),
		    		    						'price'=> $new_price * $_default_basic_qty[0]
		    		    					);
		    		    			endforeach; 
		    		    			wp_reset_postdata();
		    		    		}
		    		    		if( $basicarr) { $mainarr['basic'] = $basicarr; }
		    		    	}
		    		    	else{
		    		    		foreach ($_product_basic_tagarr as $key => $value) {	
		    		    			$args = array(
		    		    				'posts_per_page' => -1,
		    		    				'orderby' => 'rand',
		    		    				'post_type' => 'product',
		    		    				'tax_query' => array(array('taxonomy' => 'product_cat', 'field' => 'slug', 'terms' => $_product_basic_tagarr ) ),
		    		    				'tax_query' => array(array('taxonomy' => 'product_tag', 'field' => 'term_id', 'terms' => $value[0] ) )
		    		    			);
		    		    			$postslist = get_posts( $args );
		    		    			$basicarr = array();
		    		    			foreach ( $postslist as $post ) : setup_postdata( $post );
		    		    				$productnm[$post->ID] = $post->post_title;
		    		    				$new_price = get_post_meta($post->ID, '_price', true);
		    		    					$basicarr[] = array(
		    		    						'sku'  => get_post_meta($post->ID, '_sku', true),
		    		    						'price'=> $new_price * $_default_basic_qty[0]
		    		    					);
		    		    			endforeach; 
		    		    			wp_reset_postdata();
		    		    		}
		    		    		if( $basicarr) { $mainarr['basic'] = $basicarr; }
		    		    	}
		    		    }
		    		    /*Door Part*/
		    		    if($product_cat_slug == 'door-part')
		    		    {
		    		    	$re_cattid_door = 'door-part';
		    		    	$_product_door_tagarr[]    = $product_taged;
		    		    	$_default_door_qty[] 	    = $default_qty;
		    		    	$cnt_door = '';
		    		    	$cnt_door = count($_product_door_tagarr);
		    		    	$re_cattid_door = 'door-part';
		    		    	if($cnt_door == 1){
		    		    		foreach ($_product_door_tagarr as $key => $value) {	
		    		    			$args = array(
		    		    				'post_type'  => 'product',
		    		    				'post_count' => -1,
		    		    				'tax_query' => array(
		    		    					'relation' => 'AND',
		    		    					array('taxonomy' => 'product_cat', 'field'    => 'slug', 'terms'    => $re_cattid_door, ),
		    		    					array('taxonomy' => 'product_tag', 'field'    => 'term_id', 'terms'    =>  $value[0], ),
		    		    				)
		    		    			);
		    		    			$query = new WP_Query( $args );  $doorpartarr = array();
		    		    			if ( $query->have_posts() ) {
		    		    				while ( $query->have_posts() ) {
		    		    					$query->the_post();
		    		    					$new_price = get_post_meta(get_the_ID(), '_price', true);
		    		    					$doorpartarr[] = array(
	    		    							'sku'  => get_post_meta(get_the_ID(), '_sku', true),
	    		    							'price'=> $new_price * $_default_door_qty[0]
	    		    						);
		    		    				}
		    		    			}
		    		    			wp_reset_postdata();
		    		    		}
		    		    		if( $doorpartarr) { $mainarr['door-part'] = $doorpartarr; }
		    		    	}
		    		    	else{
		    		    		$doorpartarr = array();
		    		    		foreach ($_product_door_tagarr as $key => $value) {
		    		    			$args = array(
		    		    				'post_type'  => 'product',
		    		    				'post_count' => -1,
		    		    				'tax_query' => array(
		    		    					'relation' => 'AND',
		    		    					array('taxonomy' => 'product_cat', 'field'    => 'slug', 'terms'    => $re_cattid_door, ),
		    		    					array('taxonomy' => 'product_tag', 'field'    => 'term_id', 'terms'    =>  $value[0], ),
		    		    				)
		    		    			);
		    		    			$query = new WP_Query( $args );
		    		    			if ( $query->have_posts() ) {
		    		    				while ( $query->have_posts() ) {
		    		    					$query->the_post();
		    		    					$new_price = get_post_meta(get_the_ID(), '_price', true);
		    		    					$doorpartarr[] = array(
	    		    							'sku'  => get_post_meta(get_the_ID(), '_sku', true),
	    		    							'price'=> $new_price * $_default_door_qty[0]
	    		    						);
		    		    				}
		    		    			}
		    		    			wp_reset_postdata();
		    		    		}
		    		    		if( $doorpartarr) { $mainarr['door-part'] = $doorpartarr; }
		    		    	}
		    		    }
			      	}//End of While
			    }//End of if

				if( $clamparr) { $mainarr['clamp'] = $clamparr; }

				if( $shelfarr) { $mainarr['shelf-clamp'] = $shelfarr; }

				if( $sleevarr) { $mainarr['sleeve-over-clamp'] = $sleevarr; }

				if( $uchanlarr) { $mainarr['u-channel'] = $uchanlarr; }

				if( $headerarr) { $mainarr['header'] = $headerarr; }
				
			}
			echo $mainarr = json_encode($mainarr);
		}
	exit();
}
add_action('wp_ajax_rebundled_installation_price', 'wc_rebundled_installation_price');
add_action('wp_ajax_nopriv_rebundled_installation_price', 'wc_rebundled_installation_price');

/*
** For Product Group options backend
*/
function product_category_grouped_field_choices( $field ) {
    $wcatTerms = get_terms(
      	'product_cat',
      	array(
      		'hide_empty' => 0,
      		'orderby' => 'name',
      		'parent' => 0
      	)
    );
    foreach($wcatTerms as $wcatTerm){
      	$field['choices'][ $wcatTerm->term_id ] = $wcatTerm->term_id.' - '.$wcatTerm->name;
    }
    return $field; // return the field 
}
add_filter('acf/load_field/name=_product_category_grouped', 'product_category_grouped_field_choices');

function product_taged_group_field_choices( $field ) {
    $wcatTerms = get_terms(
      	'product_tag',
      	array(
      		'hide_empty' => 0,
      		'orderby' => 'name',
      		'parent' => 0
      	)
    );
    foreach($wcatTerms as $wcatTerm){
      	$field['choices'][ $wcatTerm->term_id ] = $wcatTerm->term_id.' - '.$wcatTerm->name;
    }
    return $field; // return the field
}
add_filter('acf/load_field/name=_product_taged_group', 'product_taged_group_field_choices');

/*
** For Store Group options backend
*/
function store_grouped_field_choices( $field ) {
    $wcatTerms = get_terms(
      	'product_store',
      	array(
      		'hide_empty' => 0,
      		'orderby' => 'name',
      		'parent' => 0
      	)
    );
    foreach($wcatTerms as $wcatTerm){
      	$field['choices'][ $wcatTerm->term_id ] = $wcatTerm->term_id.' - '.$wcatTerm->name;
    }
    return $field; // return the field 
}
add_filter('acf/load_field/name=_store_group', 'store_grouped_field_choices');
/*
** Declare WooCommerce support
*/
add_theme_support('woocommerce');

/*
** Enque script admin area
*/
function load_custom_wp_admin_script() {
    wp_enqueue_script( 'custom_wp_admin_js', get_template_directory_uri().DIRECTORY_SEPARATOR.'js'.DIRECTORY_SEPARATOR.'admin-custom-jquery.js', array('jquery') );	
}
add_action( 'admin_head', 'load_custom_wp_admin_script' );

/**
* Hide non base product on shop on category page
*/
function wc_include_custom_fields_in_search($query){
	if( !is_admin() && $query->is_main_query() && is_shop() && is_archive() ){
	   $query->set( 'tax_query', array(array(
	   'taxonomy' => 'product_cat',
	   'field' => 'id',
	   'terms' => array( 66, 99, 98, 102, 92, 100, 93, 101, 89, 91, 88, 87, 86, 84 ),
	   'operator' => 'NOT IN'
	)));
  }
}
add_action( 'pre_get_posts', 'wc_include_custom_fields_in_search' );

/**
* Ajax action for next_opt_reorder_option
*/
function wc_next_opt_reorder_option(){
  if( isset($_REQUEST['grp_id']) && isset($_REQUEST['option_val']) && isset($_REQUEST['current_opt']) ){
    $grp_id 		= $_REQUEST['grp_id'];
    $option_val 	= $_REQUEST['option_val'];
    $current_opt 	= $_REQUEST['current_opt'];
    $next_opt 		= $_REQUEST['next_opt'];
    $prev_opt 		= $_REQUEST['prev_opt'];
    $prev_sel_key 		= $_REQUEST['prev_sel_key'];
    $hold_key_dataJson 		= $_REQUEST['hold_key_dataJson'];
    $json_text = stripslashes($hold_key_dataJson);
    $hold_key_ = json_decode($json_text, true);
    $meta_key = $mainarr = array();
    if( !empty($hold_key_) ){
    	foreach( $hold_key_ as $hold_key_key => $hold_key_value){
    		foreach ($hold_key_value as $key => $value) {
    			$meta_key[] = array('key' => $key, 'value' => $value, 'compare' => '=');
    		}
    	}
    }
    $args = array(
        'posts_per_page' => -1,
        'orderby' => 'name',
        'order' => 'ASC',
        'post_type' => 'product',
        'post_status' => 'publish',
        'tax_query' => array(
            array('taxonomy' => 'product_store', 'field'    => 'term_id', 'terms'    => $grp_id, ),
        ),
        'meta_query' => array('relation' => 'OR', $meta_key ) 
    );
    $query = new WP_Query( $args );
    $next_option_value = array();
    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            $image_url   =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
			$current_val =  get_post_meta(get_the_ID(), $current_opt , true);
			if($next_opt){
				$next_val 		=	get_post_meta(get_the_ID(), $next_opt , true);
	        	if($option_val == $current_val){
	        		$price_val = get_post_meta(get_the_ID(), '_price' , true);
	        		$next_option_value[$price_val] = $next_val;
					$next_option_value = array_unique($next_option_value);
	        		$next_option_value['id'] = get_the_ID();
	        		$next_option_value['title'] = get_the_title(get_the_ID());
	        		$next_option_value['_price'] = get_post_meta(get_the_ID(), '_price' , true);
	        		$next_option_value['_sku'] = get_post_meta(get_the_ID(), '_sku' , true);
	        		$image_url  = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
	        		$next_option_value['image'] = $image_url[0];
	        		$next_option_value['description'] = get_post_field('post_content', get_the_ID());
	        	}
			}
			else if($prev_sel_key){
				$prev_key_value =  get_post_meta(get_the_ID(), $prev_sel_key , true);
				if($option_val == $current_val){
				   	if($prev_opt == $prev_key_value){
			    		$next_option_value['id'] = get_the_ID();
			    		$next_option_value['title'] = get_the_title(get_the_ID());
			    		$next_option_value['_price'] = get_post_meta(get_the_ID(), '_price' , true);
			    		$next_option_value['_sku'] = get_post_meta(get_the_ID(), '_sku' , true);
			    		$image_url  = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
			    		$next_option_value['image'] = $image_url[0];
			    		$next_option_value['description'] = get_post_field('post_content', get_the_ID());
			    	}
			    }
			}
			else{
				if($option_val == $current_val){
			    		$next_option_value['id'] = get_the_ID();
			    		$next_option_value['title'] = get_the_title(get_the_ID());
			    		$next_option_value['_price'] = get_post_meta(get_the_ID(), '_price' , true);
			    		$next_option_value['_sku'] = get_post_meta(get_the_ID(), '_sku' , true);
			    		$image_url  = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
			    		$next_option_value['image'] = $image_url[0];
			    		$next_option_value['description'] = get_post_field('post_content', get_the_ID());
			    }
			}
        }
    }
    wp_reset_postdata();
    if($next_opt){
    	$mainarr[$next_opt] = $next_option_value;
    	echo $return_arr = json_encode($mainarr);
    }
    else{
    	echo $return_arr = json_encode($next_option_value);
    }
  }
  exit();
}
add_action('wp_ajax_next_opt_reorder_option', 'wc_next_opt_reorder_option');
add_action('wp_ajax_nopriv_next_opt_reorder_option', 'wc_next_opt_reorder_option');

/*
** This function used for apped 'menu options' before 'add to cart' button on product single frontend
*/
function wc_rma_before_add_to_cart_button(){
	global $post;
	$current_product_id = get_the_ID();
	$door_angle_store    = get_post_meta( get_the_ID(), 'tinfini_door_angle_store', true );
	$hinge_style_store    =  get_post_meta( get_the_ID(), 'tinfini_hinge_style_store', true );
	$hardware_finish_store    =  get_post_meta( get_the_ID(), 'tinfini_hardware_finish_store', true );
	$gls_thckne_store    = get_post_meta( get_the_ID(), 'tinfini_gls_thckne_store', true );
	$handle_size_store    = get_post_meta( get_the_ID(), 'tinfini_handle_size_store', true );
	$combo_handle_size_store    = get_post_meta( get_the_ID(), 'tinfini_combo_handle_size_store', true );
	$towelbar_size_store    = get_post_meta( get_the_ID(), 'tinfini_towelbar_size_store', true );

	$store_grp = get_field('_store_group', get_the_ID());
	 $final_arr_val = $store_option = $html_box = $option_arr = array();
	$mainopt = [[]];

	if( $hardware_finish_store == 'on' ){
	    $option_arr['hardware_finish'] = 'Hardware Finish';
	}
	if( $door_angle_store == 'on' ){
	    $option_arr['door_angle'] = 'Door Angle';
	}
	if( $gls_thckne_store == 'on' ){
	    $option_arr['glass_thickness'] = 'Glass Thickness';
	}
	if( $handle_size_store == 'on' ){
	    $option_arr['handle_size'] = 'Handle Size';
	}
	if( $combo_handle_size_store == 'on' ){
	    $option_arr['combo_handle_size'] = 'Handle Size';
	}
	if( $towelbar_size_store == 'on' ){
	    $option_arr['towelbar_size'] = 'Towelbar Size';
	}

	if ( $option_arr ) {
		echo '<div id="wc_rma_opts_wrap">';
		foreach ( $option_arr as $key => $field ) {
			echo '<input type="hidden" name="user_data[]" value="" id="ch-'.$key.'" />';
		}
		echo '<input type="hidden" name="user_data[]" value="'.$_SERVER['REQUEST_URI'].'" id="ch-url" />';
		echo '</div>';
	}
}
add_action( 'woocommerce_before_add_to_cart_button','wc_rma_before_add_to_cart_button' );

/*Add Custom Data in WooCommerce Session*/
add_filter('woocommerce_add_cart_item_data','wdm_add_item_data');
 
if(!function_exists('wdm_add_item_data'))
{
    function wdm_add_item_data($cart_item_data,$product_id)
    {
        //Here, We are adding item in WooCommerce session with, wdm_user_custom_data_value name
        global $woocommerce;
        session_start();
        $user_custom_data_values =  $_POST['user_data'];
        $_SESSION['user_data'] = $user_custom_data_values;
        if (isset($_SESSION['user_data'])) {
            $option = $_SESSION['user_data'];       
            $new_value = array('wdm_user_custom_data_value' => $option);
        }
        if(empty($option))
            return $cart_item_data;
        else{
            if(empty($cart_item_data))
                return $new_value;
            else
                return array_merge($cart_item_data,$new_value);
        }
        unset($_SESSION['user_data']);//Unset our custom session variable, as it is no longer needed.
    }
}

/*Extract Custom Data from WooCommerce Session and Insert it into Cart Object*/
add_filter('woocommerce_get_cart_item_from_session', 'wdm_get_cart_items_from_session', 1, 3 );
if(!function_exists('wdm_get_cart_items_from_session')){
    function wdm_get_cart_items_from_session($item,$values,$key){
        if (array_key_exists( 'wdm_user_custom_data_value', $values ) ){
        	$item['wdm_user_custom_data_value'] = $values['wdm_user_custom_data_value'];
        }       
        return $item;
    }
}

/*Add Custom Data as Metadata to the Order Items*/
add_action('woocommerce_add_order_item_meta','wdm_add_values_to_order_item_meta',1,2);
if(!function_exists('wdm_add_values_to_order_item_meta')){
  	function wdm_add_values_to_order_item_meta($item_id, $values){
        global $woocommerce,$wpdb;
        $user_custom_values = $values['wdm_user_custom_data_value'];
        if(!empty($user_custom_values)){
            wc_add_order_item_meta($item_id,'wdm_user_custom_data',$user_custom_values);
        }
  	}
}
//Remove User Custom Data, if Product is Removed from Cart
add_action('woocommerce_before_cart_item_quantity_zero','wdm_remove_user_custom_data_options_from_cart',1,1);
if(!function_exists('wdm_remove_user_custom_data_options_from_cart')){
    function wdm_remove_user_custom_data_options_from_cart($cart_item_key){
        global $woocommerce;
        // Get cart
        $cart = $woocommerce->cart->get_cart();
        // For each item in cart, if item is upsell of deleted product, delete it
        foreach( $cart as $key => $values)
        {
        if ( $values['wdm_user_custom_data_value'] == $cart_item_key )
            unset( $woocommerce->cart->cart_contents[ $key ] );
        }
    }
}

/**
* Add sku to cart product name
*/
function wc_add_sku_to_cart( $product_name, $cart_item, $cart_item_key ){
	$numItems = count($cart_item['wdm_user_custom_data_value']);
	$i = 0;
	if($cart_item['wdm_user_custom_data_value']){
		foreach ($cart_item['wdm_user_custom_data_value'] as $key => $value) {
			if(++$i === $numItems) {
				$permalink_product .= $value;
			}
			else{
				$return_string .= "<span>" . $value . "</span>";	
			}
		}
	}
    return $product_name.'<a class="custom-product-cart" href="'.$permalink_product.'">'.get_the_title($cart_item['data']->id).'</a>'.$return_string;
}
add_filter( 'woocommerce_cart_item_name', 'wc_add_sku_to_cart', 1, 3 );
/**
* Add body class for buying guide page
*/
function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}
	return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

add_action( 'admin_menu', 'wporg_custom_admin_menu' );
function wporg_custom_admin_menu() {
    add_options_page(
        'My Plugin Title',
        'Door Bulder',
        'manage_options',
        'doorbuilder-options',
        'dborg_options_page'
    );
}

/**
 * Add custom style to backend head
 */
function tinfini_custom_admin_head() {
	echo '<link rel="stylesheet" href="'.get_template_directory_uri().'/css/tinfini_admin.css" type="text/css" media="all" />';
}
add_action( 'admin_head', 'tinfini_custom_admin_head' );

function dborg_options_page() {
	// define variables and set to empty values
	$dis_optErr = $dis_opt = $global_txt = $global_description = $global_optErr = "";
	/*Custom Discount option Form Submission*/
	if( isset($_POST['submit_custom']) && $_SERVER["REQUEST_METHOD"] == "POST" ){
		$dis_val =  $_POST["dis_opt"];
		if (empty($dis_val)) {
		    update_option('discount_option', '');
		} else {
		    $dis_opt = $_POST["dis_opt"];
		    update_option('discount_option', $dis_opt);
		}
		if ( empty($_POST["global_txt"]) ) {
		    update_option('global_discount_txt', 0);
		    if( empty( $_POST["global_description"] ) ){
		    	update_option('global_discount_description', '');
		    }
		} else {
		    $global_txt =  $_POST["global_txt"];
			$global_description =  $_POST["global_description"];
			update_option('global_discount_txt', $global_txt);
			update_option('global_discount_description', $global_description);
		}
		$wcatTerms = get_terms(
			'product_cat',
			array(
				'hide_empty' => 0,
				'orderby'	 => 'name',
				'order'   => 'ASC',
				'parent'	 => 0,
				'include'	 => array(66, 99, 98, 102, 92, 100, 93)
			)
		);
		foreach($wcatTerms as $wcatTerm){
			$args = array(
				'post_type' => 'product',
				'post_status' => 'publish',
				'posts_per_page' => -1,
				'orderby' => 'term_order',
				'order' => 'ASC',
				'tax_query' => array(
				    array(
					    'taxonomy' => 'product_cat',
					    'field' => 'id',
					    'terms' => $wcatTerm->term_id,
					)
				)
			);
			$the_queryy = new WP_Query( $args );
			if ( $the_queryy->have_posts() ) {
				while ( $the_queryy->have_posts() ) {
					$the_queryy->the_post();
					foreach ($_POST as $key => $value_custom) {
						$explode = explode('_', $key);
						if( $explode[1] == get_the_ID() ){
							if($value_custom != ''){
								if($explode[0] == 'cdisount'){
									update_option('cdisount_'.get_the_ID() , $value_custom);
								}
								elseif($explode[0] == 'cdiscrtn'){
									update_option('cdiscrtn_'.get_the_ID() , $value_custom);
								}
							}else{
								if($explode[0] == 'cdisount'){
									update_option('cdisount_'.get_the_ID() , 0);
								}
								elseif($explode[0] == 'cdiscrtn'){
									update_option('cdiscrtn_'.get_the_ID() , '');
								}
							}
						}
					}
				}
			}
		}
	}
	/*Get Options Value*/
	$discount_option = get_option('discount_option');
	$global_discount_txt = get_option('global_discount_txt');
	$global_discount_description = get_option('global_discount_description');
	$hide_discount = get_option('hide_discount_option');
 ?>
 	<!-- Discount Mode Options -->
    <div class="wp-core-ui"><h2>Discount Mode</h2>
    	<p><span class="error">* required field.</span></p>
	    <form id="discount_mode" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?page=doorbuilder-options">
		    <p>
				<input type="radio" name="dis_opt" <?php if (isset($discount_option) && $discount_option=="global") echo "checked";?> value="global"><label for="global">Global Discount </label>
			</p>
			<p>
				<input type="radio" name="dis_opt" <?php if (isset($discount_option) && $discount_option=="custom") echo "checked";?> value="custom"><label for="custom">Individual Door Discount </label>
			</p>
			<p>
				<span class="error"><?php echo $dis_optErr;?></span>
			</p>
	<!--End of Discount Mode Options -->
	<?php    	
        /*Global Discount option Form*/
        if($global_discount_txt || $global_discount_txt == 0){
        	$glbl_txt = $global_discount_txt;
		}else{
        	$glbl_txt = '';
        }
        if($global_discount_description){
        	$global_descr = $global_discount_description;
        }else{
        	$global_descr = '';
        }
        echo '<div id="global_discount" class="discount_form"><h2>Global options for Discount</h2>
	        	<input type="number" name="global_txt" value="'.$glbl_txt.'" placeholder="Discount Text" max="100" min="0">
	        	<textarea name="global_description" rows="0" cols="40" placeholder="Discount Description">'.$global_descr.'</textarea>
	        	<span class="error">'.$global_optErr.'</span>
	        	<br><br>
        	</div>';
        /*End of Global Discount option Form*/
      	/*Custom Discount option Form*/
        	echo '<div id="custom_discount" class="discount_form"><h2>Custom options for Discount</h2>';
        	$wcatTerms = get_terms(
        		'product_cat',
        		array('hide_empty' => 0, 'orderby' => 'name', 'order' => 'ASC', 'parent'=> 0, 'include' => array(66, 99, 98, 102, 92, 100, 93) )
        	);
        	foreach($wcatTerms as $wcatTerm){
        		echo '<p><div id="'.$wcatTerm->term_id.'-'.$wcatTerm->name.'" class="product_discount"><span class="detailed-product">+</span><a href="javascript:void(0)" data-re_attrid="'.$wcatTerm->term_id.'" class="'.$wcatTerm->term_id.'-door-title">'.$wcatTerm->name.'</a><div id="'.$wcatTerm->term_id.'" class="product_discount_options" style="display:none;">';
        		$args = array(
        			'post_type' => 'product',
        			'post_status' => 'publish',
        			'posts_per_page' => -1,
        			'orderby' => 'term_order',
        			'order' => 'ASC',
        			'tax_query' => array(array('taxonomy' => 'product_cat', 'field' => 'id', 'terms' => $wcatTerm->term_id, ) )
        		);
        		$the_queryy = new WP_Query( $args );
        		if ( $the_queryy->have_posts() ) {
        			while ( $the_queryy->have_posts() ) {
        				$the_queryy->the_post();
        				$cdisount = get_option('cdisount_'.get_the_ID());
						$cdiscrtn = get_option('cdiscrtn_'.get_the_ID());

						if($cdisount || $cdisount == 0){
							$cdisount_val = $cdisount;
						}else{
							$cdisount_val = '';
						}
						if($cdiscrtn){
							$cdiscrtn_val = $cdiscrtn;
						}else{
							$cdiscrtn_val = '';
						}
						echo '<p><label>'.get_the_title().': </label> ';
        				echo '<input type="number" name="cdisount_'.get_the_ID().'" value="'.$cdisount_val.'" placeholder="Discount Text" max="100" min="0">
        				<textarea name="cdiscrtn_'.get_the_ID().'" rows="0" cols="40" placeholder="Discount Description">'.$cdiscrtn_val.'</textarea></p>';
        			}
        		}
        		wp_reset_postdata();
        		echo '</div></div>';
        	}
    echo '<p></p></div><input type="submit" name="submit_custom" value="Submit" class="button-primary"></form>';        
    if( isset($_POST['submit_hidden_discount']) && $_SERVER["REQUEST_METHOD"] == "POST" ){
		$wcatTerms = get_terms('product_cat', array('hide_empty' => 0, 'orderby' => 'name', 'order'	=> 'ASC', 'parent' => 0, 'include' => array(66, 99, 98, 102, 92, 100, 93) ) );
		foreach($wcatTerms as $wcatTerm){
			$args = array('post_type' => 'product', 'post_status' => 'publish', 'posts_per_page' => -1, 'orderby' => 'term_order', 'order' => 'ASC', 'tax_query' => array(array('taxonomy' => 'product_cat', 'field' => 'id', 'terms' => $wcatTerm->term_id, ) ) );
			$the_queryy = new WP_Query( $args );
			
			if ( $the_queryy->have_posts() ) {
				while ( $the_queryy->have_posts() ) {
					$the_queryy->the_post();
					$value_custom = '';
					foreach ($_POST as $key => $value_custom) {
						$explode = explode('_', $key);
						if( $explode[1] == get_the_ID() ){
							if($value_custom != ''){
								if($explode[0] == 'hidedisount'){
									update_option('hide_disount_'.get_the_ID() , $value_custom);
								}
							}else{
								update_option('hide_disount_'.get_the_ID() , 0);
							}
						}
					}
				}
			}
		}
	} ?>
	<form id="discount_hide" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?page=doorbuilder-options"><?php
		/*Custom Discount option Form*/
		echo '<div id="hide_discount" class="discount_form_hide"><h2>Hide Discount</h2>';
		$wcatTerms = get_terms('product_cat', array('hide_empty' => 0, 'orderby' => 'name', 'order' => 'ASC', 'parent' => 0, 'include' => array(66, 99, 98, 102, 92, 100, 93) ) );
    	foreach($wcatTerms as $wcatTerm){
    		echo '<p><div id="'.$wcatTerm->term_id.'-'.$wcatTerm->name.'-hide" class="product_discount"><span class="detailed-product">+</span><a href="javascript:void(0)" data-re_attrid="'.$wcatTerm->term_id.'" class="'.$wcatTerm->term_id.'-door-title">'.$wcatTerm->name.'</a><div id="'.$wcatTerm->term_id.'-hide" class="product_discount_options" style="display:none;">';
    		
    		$args = array('post_type' => 'product', 'post_status' => 'publish', 'posts_per_page' => -1, 'orderby' => 'term_order', 'order' => 'ASC', 'tax_query' => array(array('taxonomy' => 'product_cat', 'field' => 'id', 'terms' => $wcatTerm->term_id, ) ) );
    		$the_queryy = new WP_Query( $args );
    		if ( $the_queryy->have_posts() ) {
    			while ( $the_queryy->have_posts() ) {
    				$the_queryy->the_post();
    				$hidedisount = get_option('hide_disount_'.get_the_ID());
					echo '<p><label>'.get_the_title().': </label> ';
    				echo '<input type="number" name="hidedisount_'.get_the_ID().'" value="'.$hidedisount.'" placeholder="Discount Text" max="100" min="0">';
    			}
    		}
    		wp_reset_postdata();
    		echo '</div></div>';
    	}
		echo '<p></p></div><input type="submit" name="submit_hidden_discount" value="Submit" class="button-primary"></form></div>';
       	/*End of Custom Discount option Form*/
}

/*
** Internal Builder login false
*/
add_action( 'wp_login_failed', 'my_front_end_login_fail' );  // hook failed login
function my_front_end_login_fail( $username ) {
   $referrer = get_site_url();  // where did the post submission come from?
   // if there's a valid referrer, and it's not the default log-in screen
   if ( !empty($referrer) && !strstr($referrer,'builder-login') && !strstr($referrer,'builder-login') ) {
      wp_redirect( $referrer . '/builder-login?login=failed' );  // let's append some information (login=failed) to the URL for the theme to use
      exit;
   }
}

/*
** Generate Password link for builder
*/
add_action( 'login_form_middle', 'add_lost_password_link' );
function add_lost_password_link() {
	return '<a href="/wp-login.php?action=lostpassword">Forget Password?</a>';
}

/*
** To Disable all the Nags & Notifications
*/
function remove_core_updates_nags(){
	global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
add_filter('pre_site_transient_update_core','remove_core_updates_nags');
add_filter('pre_site_transient_update_plugins','remove_core_updates_nags');
add_filter('pre_site_transient_update_themes','remove_core_updates_nags');

/**
 * Ajax action for rebundled_product_hardwrfinish return Hardware Finish
 */
function full_configuration_db(){
	global $wpdb,$post;
	if( isset($_REQUEST['data']) && isset($_REQUEST['pid']) ){
	    $productconfigJson 		= 	$_REQUEST['data'];
	    $pid 					= 	$_REQUEST['pid'];
	    $dfi_price 				= 	$_REQUEST['dfi_price'];
	    $discount_price 		= 	$_REQUEST['discount_price'];
	    $total_price 			= 	$_REQUEST['total_price'];
	    $glassqft 				= 	$_REQUEST['glassqft'];
	    $hide_discount_price	= 	$_REQUEST['hide_discount_price'];
	    $unique_id = uniqid();

		$json_text = stripslashes($productconfigJson);
		$productconfig = json_decode($json_text, true);
		if( !empty($productconfig) ){
			$configvalue_arr = array();
			$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id($pid), 'full' );
			$configvalue_arr['pid'] 				= 	$pid;
			$configvalue_arr['unique_id'] 			= 	$unique_id;
			$configvalue_arr['layout_name'] 		=   get_the_title( $pid );
			$configvalue_arr['product_image'] 		=   $featured_image[0];
			if($dfi_price){
				$configvalue_arr['dfi_price'] 		= 	$dfi_price;	
			}else{
				$configvalue_arr['dfi_price'] 		= 	'';
			}
			if($discount_price){
				$configvalue_arr['discount_price'] 	= 	$discount_price;
			}else{
				$configvalue_arr['discount_price'] 	= 	'';
			}
			if($total_price){
				$configvalue_arr['total_price'] 	= 	$total_price;	
			}else{
				$configvalue_arr['total_price'] 	= 	'';
			}
			if($glassqft){
				$configvalue_arr['glassqft'] 		= 	$glassqft;	
			}else{
				$configvalue_arr['glassqft'] 		= 	'';
			}
			if($hide_discount_price){
				$configvalue_arr['hide_discount_price'] 		= 	$hide_discount_price;	
			}else{
				$configvalue_arr['hide_discount_price'] 		= 	'';
			}
			foreach( $productconfig as $configkey => $configvalue){ /*Installation Kit*/
				foreach ($configvalue as $configvalue_key => $configvalue_value) {
					foreach ($configvalue_value as $key => $value) {
						$serialized_arr=serialize($value);
						$configvalue_arr[$key] = $serialized_arr;
					}
				}
			}
			$table_name    = $wpdb->prefix . 'product_configuration';
			$wpdb->insert($table_name,$configvalue_arr);
			$ch=$wpdb->rows_affected;
		}
		if($ch == 1){
			echo uniqid();
		}
	}
  	exit();
}
add_action('wp_ajax_full_configuration_db', 'full_configuration_db');
add_action('wp_ajax_nopriv_full_configuration_db', 'full_configuration_db');

/*
** Modify Contact Methods
*/
function modify_contact_methods($profile_fields) {
	// Add new fields
	$profile_fields['designtn'] = 'Designation';
	return $profile_fields;
}
add_filter('user_contactmethods', 'modify_contact_methods');

/**
* Ajax action for rebundled_product_hardwrfinish return Hardware Finish
*/
function update_db_price(){
	global $wpdb,$post;
	if( isset($_REQUEST['unique_id']) ){
	    $unique_idd 				=  $_REQUEST['unique_id'].time();
	   	$pid 						=  $_REQUEST['pid'];
	   	$door_layout 				=  $_REQUEST['door_layout'];
	    $first_name 				=  $_REQUEST['first_name'];
	   	$last_name 					=  $_REQUEST['last_name'];
	   	$email 						=  $_REQUEST['email'];
	   	$message 					=  $_REQUEST['comments'];
	   	$product_img 				=  $_REQUEST['product_img'];
	   	$mode_type 					=  'Internal builder';
	   	$first_name_sales 			=  $_REQUEST['first_name_sales'];
	   	$last_name_sales 			=  $_REQUEST['last_name_sales'];
	   	$sales_email 				=  $_REQUEST['sales_email'];
	   	$phone_number_sales 		=  $_REQUEST['phone_number_sales'];
	   	$sales_shipping 			=  $_REQUEST['sales_shipping'];
	   	$sqftclean 					=  $_REQUEST['sqftclean'];
	   	$installation_price 		=  $_REQUEST['installation_price'];
	   	$show_price_diff 			=  $_REQUEST['show_price_diff'];
	   	$stayclean_option 			=  $_REQUEST['stayclean_option'];
	   	$stayclean_before_discount  =  $_REQUEST['stayclean_before_discount'];
	   	$stayclean_discount_per 	=  $_REQUEST['stayclean_discount_per'];
	   	$stayclean_discount_total   =  $_REQUEST['stayclean_discount_total'];
	   	$sales_crating 				=  $_REQUEST['sales_crating'];
	   	$door_before_discount 		=  $_REQUEST['door_before_discount'];
	   	$door_discount_per 			=  $_REQUEST['door_discount_per'];
	    $door_discount_total 		=  $_REQUEST['door_discount_total'];
	    $outside_sales 				=  $_REQUEST['outside_sales'];
	    $door_discount_total 		=  round($door_discount_total,2);
	    $builder0_arr = $buildr1_arr = 	$buildr2_arr = array();

	    $builder0 		=  	$_REQUEST['builder0'];
	    $builder0 		= 	stripslashes($builder0);
	    $builder0_arr 	= 	json_decode($builder0, true);

	    $buildr 		=  	$_REQUEST['buildr'];
	    $buildr1 		= 	stripslashes($buildr);
	    $buildr1_arr 	= 	json_decode($buildr1, true);

	    $builder2 		=  	$_REQUEST['builder2'];
	    $buildr2 		= 	stripslashes($builder2);
	    $buildr2_arr 	= 	json_decode($buildr2, true);

	    $builder_val_1 	= 	array_merge($builder0_arr,$buildr2_arr);
	    $final_array 	= 	array_merge($buildr1_arr,$builder_val_1);

	    $custom_hardware_arr = array();
	    for ($x = 1; $x <= 4; $x++) {
	    	if($_REQUEST['custom_hardware'.$x.'_val']){
	    		$custom_hardware_arr[$_REQUEST['custom_hardware'.$x.'_label']] = $_REQUEST['custom_hardware'.$x.'_val'];
	    	}
	    }
	    $custom_hardware = serialize($custom_hardware_arr);
	    if($custom_hardware == ''){
	    	$custom_hardware = 0;
	    }
	    if($sales_shipping == ''){
			$sales_shipping = 0;
		}
	    if($sales_crating == ''){
			$sales_crating = 0;
		}
	    if($stayclean_before_discount == ''){
			$stayclean_before_discount = 0;
		}
	    if($stayclean_discount_per == ''){
			$stayclean_discount_per = 0;
		}
	    if($stayclean_discount_total == ''){
			$stayclean_discount_total =0;
		}
	    if($door_before_discount == ''){
			$door_before_discount = 0;
		}
	    if($door_discount_per == ''){
			$door_discount_per = 0;
		}
	    if($door_discount_total == ''){
			$door_discount_total = 0;
		}
	    $userid = get_current_user_id();
	    $configuration = base64_encode(serialize($final_array));
	    $table_name    = $wpdb->prefix . 'internal_builder';

	    $wpdb->query("INSERT INTO ".$table_name." (quote_id_req, userid, productid, door_layout, first_name, last_name, email, comments, product_img, configuration, first_name_sales, last_name_sales, sales_email, phone_number_sales, sales_shipping,sqftclean, installation_price, show_price_diff, stayclean_option, stayclean_before_discount, stayclean_discount_per, stayclean_discount_total, sales_crating, door_before_discount,  door_discount_per, door_discount_total, custom_hardware,outside_sales) VALUES ('$unique_idd', '$userid', '$pid', '$door_layout', '$first_name', '$last_name', '$email', '$message', '$product_img', '$configuration', '$first_name_sales', '$last_name_sales', '$sales_email', '$phone_number_sales', '$sales_shipping', '$sqftclean', '$installation_price','$show_price_diff', '$stayclean_option', '$stayclean_before_discount',  '$stayclean_discount_per', '$stayclean_discount_total', '$sales_crating','$door_before_discount'  ,'$door_discount_per' ,'$door_discount_total', '$custom_hardware', '$outside_sales')"  ); 
	    $response =  $ch=$wpdb->rows_affected;
	    if($response == 1){
	    	echo 'successs#'.$unique_idd;
	    }else{
	    	echo 'Failed#'.$unique_idd;
	    }
	}
  	exit();
}
add_action('wp_ajax_update_db_price', 'update_db_price');
add_action('wp_ajax_nopriv_update_db_price', 'update_db_price');

/*
** Hide Admin-bar from Builder and Kiosk
*/
add_action('get_header', 'my_filter_head');
function my_filter_head() {
	if (strpos($_SERVER['REQUEST_URI'], "kiosk") !== false || strpos($_SERVER['REQUEST_URI'], "builder") !== false){
		remove_action('wp_head', '_admin_bar_bump_cb');
	}
	else if ( is_page( 'builder-thank-you' ) || is_page( 'main-thank-you' )) {
		remove_action('wp_head', '_admin_bar_bump_cb');
	}
}
ob_clean();
?>