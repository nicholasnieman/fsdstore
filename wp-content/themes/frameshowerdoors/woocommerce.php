<?php
 /*
 	Template Name: Single Template
 */

 	
global $post;


if ($_SERVER['REQUEST_URI'] == "/builder/" && is_page(11801) && is_page( 'builder' ) ) {

	get_template_part( 'builder/builder', 'product' );
}

else if (is_page(11842) && is_page( 'kiosk' ) ) {
	get_template_part( 'kiosk/kiosk', 'product' );
}

else if (is_page(12217) ) {
	get_template_part( 'dev_kiosk/kiosk', 'product' );
}

else if( is_shop() ){
	$page_id = woocommerce_get_page_id('shop');
	$link = get_permalink($page_id);
	$title = get_the_title($page_id);
	get_template_part( 'product', 'shop' );
	return true;
}

else if( is_archive() ){
	global $wp_query;
    $term = $wp_query->get_queried_object();
    $link = get_term_link($term);
    $title = $term->name;
    get_template_part( 'archive', 'product' );
	return true;
}

else if ($post->post_type != 'product' ) {
   return true;
}

	global $frame_breadcumb;
	global $wp_query;
	//get_template_part( 'single', 'product' );
	/*Check Product is bundled or store*/
	$checkbox_bundled   =   get_post_meta( get_the_ID(), 'tinfini_checkbox_bundled', true );
	$storemetabox       =   get_post_meta( get_the_ID(), 'tinfini_storemetabox', true );

	if($checkbox_bundled  == 'on' ){
		get_template_part( 'single', 'product' );
	}
	
	else if($storemetabox == 'on'){

	    get_header( 'inner' );

	    /*Define Array*/
	    $final_arr_val = $option_arr = $price_pro = $mainarr = $mainarr_temp = $min_price_pro = $price_cal = array();
	    $mainopt = [[]]; 

	    /*Getting Value checked from backend to create store product*/
	    $current_product_id = get_the_ID();
	    $door_angle_store    = get_post_meta( get_the_ID(), 'tinfini_door_angle_store', true );
	    $hinge_style_store    =  get_post_meta( get_the_ID(), 'tinfini_hinge_style_store', true );
	    $hardware_finish_store    =  get_post_meta( get_the_ID(), 'tinfini_hardware_finish_store', true );
	    $gls_thckne_store    = get_post_meta( get_the_ID(), 'tinfini_gls_thckne_store', true );
	    $handle_size_store    = get_post_meta( get_the_ID(), 'tinfini_handle_size_store', true );
	    $combo_handle_size_store    = get_post_meta( get_the_ID(), 'tinfini_combo_handle_size_store', true );
	    $towelbar_size_store    = get_post_meta( get_the_ID(), 'tinfini_towelbar_size_store', true );
	    $store_grp = get_field('_store_group', get_the_ID());

	    /*Push all check values in array with thier key*/
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

		/*create predefined array*/
		$args = array(
			'posts_per_page' => -1,
			'post_type' => 'product',
			'post_status' => 'publish',
			'tax_query' => array(
				array('taxonomy' => 'product_store', 'field'    => 'term_id', 'terms'    => $store_grp, ),
			),
		); 

		/*Preparing array for default use json*/
		foreach ($option_arr as $option_key => $opt_value){
			$option_key_name = $option_key;
			break;
		}
		$main = array();
		$query = new WP_Query( $args );
		$i = 0;
		if ( $query->have_posts() ) {
		  	while ( $query->have_posts() ) {
				$query->the_post();
				if($option_key_name){
		            $key_value = get_post_meta(get_the_ID(), $option_key_name , true);
		          	if($key_value){
						$image_url  = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ) , 'full' );
						$temparr = array();
						$temparr['id'] = get_the_ID();
						$temparr['title'] = get_the_title();
						$temparr['_price'] = get_post_meta(get_the_ID(), '_price' , true);
						$temparr['_sku'] = get_post_meta(get_the_ID(), '_sku' , true);
						$temparr['hardware_finish'] = get_post_meta(get_the_ID(), 'hardware_finish' , true);
						$temparr['door_angle'] = get_post_meta(get_the_ID(), 'door_angle' , true);
						$temparr['glass_thickness'] = get_post_meta(get_the_ID(), 'glass_thickness' , true);
						$temparr['handle_size'] = get_post_meta(get_the_ID(), 'handle_size' , true);
						$temparr['combo_handle_size'] = get_post_meta(get_the_ID(), 'combo_handle_size' , true);
						$temparr['towelbar_size'] = get_post_meta(get_the_ID(), 'towelbar_size' , true);
						$temparr['image'] = $image_url[0];
						$temparr['description'] = get_the_content();
						$main[$key_value][] = $temparr;
		        	}
		    	}
		  	}
		}
		wp_reset_postdata();
		$mainarr = json_encode($main);

		/*Preparing array for html structure*/
		$query = new WP_Query( $args );
		if ( $query->have_posts() ) {
		  	while ( $query->have_posts() ) {
		      	$query->the_post();
				if($current_product_id != get_the_ID()){
				  	$price_cal[get_the_ID()] = get_post_meta(get_the_ID(), '_price' , true);    
				}

		      	foreach ($option_arr as $option_key => $option_value) {
		          	if($option_key){
		              	$key_value = get_post_meta(get_the_ID(), $option_key , true);
		              	if($key_value){
							$temparr = array();
							$temparr[] = $key_value;
							$temparr = array_filter($temparr);
							$mainopt[$option_key][get_the_ID()] = $temparr;
		              	}
		          	}
		      	}
		  	}
		}
		wp_reset_postdata();

		/*Getting minimum price and all other info of minimum product*/
		$max_show_product_id = array_search (max( $price_cal), $price_cal);
		$show_product_id = array_search (min( $price_cal), $price_cal);
		$min_price = min( $price_cal);
		$image_url  = wp_get_attachment_image_src( get_post_thumbnail_id( $show_product_id ) , 'full' );

		$min_price_pro['id'] = $show_product_id;
		$min_price_pro['title'] = get_the_title($show_product_id);
		$min_price_pro['hardware_finish'] = get_post_meta($show_product_id, 'hardware_finish' , true);
		$min_price_pro['door_angle'] = get_post_meta($show_product_id, 'door_angle' , true);
		$min_price_pro['glass_thickness'] = get_post_meta($show_product_id, 'glass_thickness' , true);
		$min_price_pro['combo_handle_size'] = get_post_meta($show_product_id, 'combo_handle_size' , true);
		$min_price_pro['towelbar_size'] = get_post_meta($show_product_id, 'towelbar_size' , true);
		$min_price_pro['_price'] = get_post_meta($show_product_id, '_price' , true);
		$min_price_pro['_sku'] = get_post_meta($show_product_id, '_sku' , true);
		$min_price_pro['image'] = $image_url[0];
		$min_price_pro['description'] = get_post_field('post_content', $show_product_id);
		$min_price_pro['min_price'] = get_post_meta($show_product_id, '_price' , true);
		$min_price_pro['max_price'] = get_post_meta($show_product_id, '_price' , true);

		$price_pro[get_the_ID()] = $min_price_pro;

		if($store_grp){
		  	$price_pro = json_encode($price_pro);	
		}
		  
	    global $woocommerce;
	?>
	<div id="mwrapbg">
	  <div id="mbar">
	    <div id="mwrap">
	      <div id="main">
	        <div id="main-header">
	            <h2> <?php the_title();?> </h2>
	            <div id="buying-guide"><a href="<?php bloginfo('url'); ?>/buying-guide/">Buying Guide</a></div>
	            <div id="need-help"><a href="<?php bloginfo('url'); ?>/contact/">Need Help?</a></div> 
	        </div>

	        <div class="breadcrumbs">
	            <ul>                                    
	                <li class="cms_page">
	                    <?php 
	                        if ((class_exists('frame_breadcrumb_class'))) {$frame_breadcumb->custom_breadcrumb();}
	                    ?>
	                </li>
	            </ul>
	        </div>

              <div class="mains">
                  <div class="row" style="margin: 0px;">

                      <div class="col-sm-3 col-md-col-3">
                          <!-- Store Sidebar -->
                          <div id="snav">
                              <div id="snav">
                                  <div class="gift-special widget-container widget_nav_menu" id="nav_menu-8">
                                      <h3 class="section_heading widget-title">Category</h3>
                                      <div class="menu-why-fsd-container">
                                          <ul class="menu" id="menu-why-fsd">
                                              <?php
                                              $wcatTerms = get_terms(
                                                  'product_cat',
                                                  array('hide_empty' => 0, 'orderby'  => 'name', 'order'   => 'ASC', 'parent'   => 0, 'include'  => array(76, 75, 79, 85, 73, 77, 72, 83, 81, 82, 252) )
                                              );
                                              foreach($wcatTerms as $wcatTerm){
                                                  echo '<li> <a id="cat-id-'.$wcatTerm->term_id.'" href="'.get_term_link( $wcatTerm->slug, $wcatTerm->taxonomy ).' "> '.$wcatTerm->name.'</a> </li>';
                                              }
                                              ?>
                                          </ul>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- Store Sidebar Ends -->
                      </div>

                      <div class="col-sm-9 col-md-col-9">
                          <div class="row">
                              <div class="col-sm-8 col-sm-7">
                                  <div class="page_cont">
                                      <!-- <product Details -->
                                      <h1 class="product_title entry-title" itemprop="name"> <?php echo get_the_title(); ?></h1>
                                        <div id="product-description" style="display: block;">
                                            <p></p>
                                            <span class="regular-price"><span itemprop="price" class="price"><span class="amount"></span></span></span>
                                        </div>
                                      <div><?php do_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 ); ?></div>
                                      <!--div id="product-description" style="display: block;">
                                          <p>< ?php echo get_the_content(); ?></p>
                                      </div-->

                                      <p class="availability">
                                          Availability:
                                          <span><?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?></span>
                                      </p>

                                      <!--div class="price-box">
                                        <span id="product-price-4267_clone" class="regular-price">
                                            <span itemprop="price" class="price">< ?php echo $product->get_price_html(); ?></span>
                                        </span>
                                      </div-->

                                      <?php
                                      //woocommerce_content();
                                      //$image_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
                                      ?>

                                      <!--div class="more-views">
                                          <h2>More Views</h2>
                                          <ul>
                                              <li>
                                                  <a class="fancyimg" title="" rel="lbx" class="fancy"
                                                     href="< ?php echo $image_url[0]; ?>">
                                                      <img width="56" height="56" alt=""
                                                           src="< ?php echo $image_url[0]; ?>" itemprop="image">
                                                  </a>
                                              </li>
                                          </ul>
                                      </div-->
                                      <!-- <product Details End -->
                                  </div>
                              </div>
                              <div class="col-sm-4">
                                  <div class="page_cont">

                                      <!-- Store Dropdown Html -->
                                      <?php
                                      $mainopt = array_filter($mainopt);
                                      if ($mainopt) {
                                          echo '<fieldset id="product-options-wrapper" class="product-options">';
                                          foreach ($mainopt as $mainopt_key => $mainopt_value) {
                                              if ($mainopt_key) {

                                                  echo '<div class="product_option"><label class="required"><em>*</em>' . str_replace("_", " ", $mainopt_key) . '</label>

		                                  	<select id="' . $mainopt_key . '" class="required-entry super-attribute-select" name="super_attribute[]" data-rel_keyname="' . $key_name . '">
		                                    <option value="">Choose an Option...</option>';
                                                  foreach ($mainopt_value as $arr_key => $arr_value) {
                                                      $final_arr_val[] = $arr_value[0];
                                                  }
                                                  $final_arr_val = array_unique($final_arr_val);
                                                  foreach ($final_arr_val as $final_arrkey => $final_arr_value) {

                                                      $args = array(
                                                          'posts_per_page' => -1,
                                                          'orderby' => 'name',
                                                          'order' => 'ASC',
                                                          'post_type' => 'product',
                                                          'post_status' => 'publish',
                                                          'tax_query' => array(
                                                              array('taxonomy' => 'product_store', 'field' => 'term_id', 'terms' => $store_grp,),
                                                          ),
                                                          'meta_query' => array(
                                                              array('key' => $mainopt_key, 'value' => $final_arr_value, 'compare' => '=',),
                                                          ),
                                                      );

                                                      $price_val = array();
                                                      $wpdb->query('SET SQL_BIG_SELECTS = 1');
                                                      $query = new WP_Query($args);
                                                      $next_option_value = array();
                                                      if ($query->have_posts()) {
                                                          while ($query->have_posts()) {
                                                              $query->the_post();
                                                              $price_val[] = get_post_meta(get_the_ID(), '_price', true);
                                                          }
                                                      }
                                                      wp_reset_postdata();

                                                      $min_price = min($price_val);
                                                      $min_price = number_format($min_price, 2, '.', '');

                                                      $max_price = max($price_val);
                                                      $max_price = number_format($max_price, 2, '.', '');

                                                      if ((!$max_price) || ($max_price == $min_price)) {
                                                          echo '<option value="' . $final_arr_value . '"> ' . $final_arr_value . '</option>';
                                                      } else {
                                                          echo '<option value="' . $final_arr_value . '"> ' . $final_arr_value . '</option>';
                                                      }
                                                  }
                                                  echo '</select><span class="validation-advice" style="display:none;">This field is equired</span></div>';
                                              }
                                          }
                                          echo ' </fieldset>';
                                      }
                                      ?>

                                      <div id="product-options-bottom" itemprop="offers" itemscope
                                           itemtype="http://schema.org/Offer">
                                          <div class="product-options-bottom">
                                              <div class="price-box">
		                                <span id="product-price-4267_clone" class="regular-price">
		                              <span itemprop="price"
                                            class="price"><?php echo $product->get_price_html(); ?></span>
		                            </span>
                                              </div>

                                          </div>
                                          <meta itemprop="price"
                                                content="<?php echo esc_attr($product->get_price()); ?>"/>
                                          <meta itemprop="priceCurrency"
                                                content="<?php echo esc_attr(get_woocommerce_currency()); ?>"/>
                                          <link itemprop="availability"
                                                href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>"/>
                                      </div>
                                      <div class="add-to-cart">
                                          <?php do_action( 'woocommerce_simple_add_to_cart', 'woocommerce_simple_add_to_cart', 30 );?>
                                      </div>
                                  </div>

                              </div>
                          </div>

                      </div>

                  </div>
              </div>

	      </div>
	    </div>
	  </div>
	</div>                

	<script type="text/javascript">
	jQuery(document).ready(function(){


	jQuery(".fancyimg img, .page_cont .type-product .images > img").click(function(ev) {
		ev.preventDefault();
		var src_attr = jQuery(this).attr('src');
		jQuery.fancybox({
	        autoScale: false,
	        width: 400, // 783 in your demo or whatever
	        height: 400, // 700
	        transitionIn: 'elastic',
	        transitionOut: 'none',
	        titlePosition: 'inside',
	        overlayColor: '#fff',
	        href: src_attr, // the URL of the image
	        helpers: {
	          overlay : {
	            speedOut : 0
	          }
	        }
	    });
	});   



	    var price_pro = <?php echo $price_pro; ?>;
	    var data = <?php echo $mainarr; ?>;
	    jQuery('.entry-summary .cart .quantity').prepend('<label>Qty:</label>');
	    if(price_pro){
	    	jQuery.each(price_pro, function(sub_key, sub_value) {
	    	    jQuery.each(sub_value, function(sub_keyy, sub_valuee) {
	    	        if(sub_keyy == '_price'){
	    	        	var price = parseFloat(sub_valuee); 
	    	            jQuery('.entry-summary').find('.price').text( '$'+price.toFixed(2) );
	    	            jQuery('.page_cont').find('.price .amount').text( '$'+price.toFixed(2) );
	    	        }
	    	        if(sub_keyy == '_sku'){
	    	            jQuery('.entry-summary .product_meta').find('.sku').text( sub_valuee );
	    	        }
	    	        if(sub_keyy == 'image'){
	    	            jQuery('.images').find('img').attr('src', sub_valuee);
	    	            jQuery('.more-views').find('a').attr('href', sub_valuee);
	    	            jQuery('.more-views a').find('img').attr('src', sub_valuee);
	    	        }
	    	        if(sub_keyy == 'description'){
	    	            jQuery('#product-description p').text( sub_valuee );
	    	        }
	    	        if(sub_keyy == 'id'){
	    	            jQuery('.entry-summary .cart input[name="add-to-cart"]').val(sub_valuee);
	    	        }
	    	        
	    	    });
	    	});
	    }
	    

	    jQuery(".single_add_to_cart_button").on('click', function(ev) {
	      	ev.preventDefault();
	        var re_productidchk = true;
	        jQuery('body').find('select.super-attribute-select').removeClass('validation-failed');
	        jQuery('body').find('.product_option').find('span').hide(0);
	        jQuery('body').find('select.super-attribute-select').each(function() {
	            var re_productid = jQuery(this).val();
	            if(re_productid == '' || re_productid == 'undefined' ){
					re_productidchk = false;

					jQuery(this).addClass('validation-failed');
					jQuery(this).closest('.product_option').find('span').show(0);
	            }
	        });
	        if(re_productidchk != false){
	            jQuery(".cart").submit();
	        }
	    });

	    jQuery('.super-attribute-select').prop('disabled', 'disabled');
	    jQuery(".super-attribute-select:first").prop('disabled', false);

	    function unique_arr(arr) {
	      var result = {};
	      jQuery.each(arr, function(i,v){
	        if(check_value_exist(result, v) == 'no'){
	          result[i] = v;
	        }
	      });
	      return result;
	    }

	    var ary = [];  // Generation key value array
	    var obj = {};
	    function pushToAry(name, val) {
	       obj[name] = val;
	       ary.push(obj);
	       return obj;
	    }

	    function check_value_exist(arr, value){
	      var check = 'no';
	      jQuery.each(arr, function(i,v){
	        if(v == value){
	          check = 'yes';
	        }
	      });

	      return check;
	    }

	    /*On Change Of Dropdown Get Values*/
	    jQuery(".super-attribute-select").change(function (){ // Change values on select
	        tstmarkers = {};
	        tstmarkers['12 in.'] = {};
	        tstmarkers['8 in.'] = {};
	        tstmarkers['6 in.'] = {};
	        tstmarkers['24 in.'] = {};

	        var option_val      =  this.value;
	        var option_text      =  jQuery(this).find('option:selected').attr('data-re_value');

	        if(option_val){

	            var option_key;
	            var bundledagain = [];
	            var current_opt = jQuery(this).closest('.super-attribute-select').attr('id');

	            jQuery('.entry-summary .cart').find('#ch-'+current_opt).val(option_val);
	            jQuery('body').find('select.super-attribute-select').removeClass('validation-failed');
	            jQuery('body').find('.product_option').find('span').hide(0);

	            var next_opt = jQuery(this).parent('div').next('.product_option').find('select').attr('id');
	            var next_next_opt = jQuery(this).parent('div').next('.product_option').next('.product_option').find('select').attr('id');
	            
	            if(next_opt){
	              jQuery(this).parent('div').next('.product_option').find('select').attr('data-prev_select', option_val);
	              jQuery(this).parent('div').next('.product_option').find('select').prop('disabled', false);
	              jQuery('#'+next_opt).empty();
	              jQuery('#'+next_opt).append('<option value="">Choose an Option...</option>');
	            }

	            var prev_sel_key = jQuery('#'+current_opt).attr('data-prev_select');
	            var prev_combohadle_key = jQuery('#combo_handle_size').attr('data-prev_select');
	            var optionmainarr = [];
	            
	            jQuery.each(data, function(first_key, first_value) {
	                jQuery.each(first_value, function(sec_keyy, sec_valuee) {
	                    if(option_val == first_key){
	                        var myarrayval = {};
	                        var price_vall;

	                        jQuery.each(sec_valuee, function(thrd_keyy, thrd_valuee) {
	                  
	                          if(thrd_keyy == 'id'){
	                            jQuery('.entry-summary .cart input[name="add-to-cart"]').val(thrd_valuee);
	                          }
	                          else if(thrd_keyy == 'title'){
	                            varTitle = jQuery('<textarea />').html(thrd_valuee).text();
	                            jQuery('.page_cont').find('.product_title').text( varTitle );
	                          }
	                          else if(thrd_keyy == '_price'){
	                            price_vall = parseFloat(thrd_valuee);
	                           jQuery('.entry-summary').find('.price').text( '$'+price_vall.toFixed(2) );
	                            jQuery('.page_cont').find('.price .amount').text( '$'+price_vall.toFixed(2) );
	                          }
	                          else if(thrd_keyy == '_sku'){
	                            jQuery('.entry-summary .product_meta').find('.sku').text( thrd_valuee );
	                          }
	                          else if(thrd_keyy == 'image'){
	                            jQuery('.images').find('img').attr('src', thrd_valuee);
	                            jQuery('.more-views').find('a').attr('href', thrd_valuee);
	                            jQuery('.more-views a').find('img').attr('src', thrd_valuee);
	                          }
	                          
	                          else if(thrd_keyy == 'description'){
	                            jQuery('#product-description p').text( thrd_valuee );
	                          }

	                          else if(thrd_keyy == next_opt){
	                            var yytyt = next_next_opt;
	                            if( yytyt != null){
	                                option_key = thrd_keyy;
	                                tstmarkers[thrd_valuee][sec_keyy] = price_vall;                                
	                            }else{
	                                jQuery('#'+thrd_keyy).append('<option data-re_value="'+ sec_keyy +'" value="'+ thrd_valuee +'"> '+ thrd_valuee + ': ' + price_vall.toFixed(2) + '</option>');
	                            }
	                          }
	                        });
	                    }
	                    else if( prev_sel_key == first_key || prev_combohadle_key == first_key){
	                        if(option_text.indexOf('/') > -1){
	                            strx   = option_text.split('/');
	                            array  = [];
	                            array = array.concat(strx);
	                            var len = array.length; 
	                              for (var i = 0; i < len; i++) {
	                                if( array[i] == sec_keyy ){
	                                	if(array[i]){
	                                      	var price_val;
	                                      	jQuery.each(sec_valuee, function(thrd_keyy, thrd_valuee) {
												if(thrd_keyy == 'id'){
													jQuery('.entry-summary .cart input[name="add-to-cart"]').val(thrd_valuee);
												}
												else if(thrd_keyy == 'title'){
													varTitle = jQuery('<textarea />').html(thrd_valuee).text();
													jQuery('.page_cont').find('.product_title').text( varTitle );
												}
												else if(thrd_keyy == '_price'){
													price_val = parseFloat(thrd_valuee);
													jQuery('.entry-summary').find('.price').text( '$'+price_val.toFixed(2) );
													jQuery('.page_cont').find('.price .amount').text( '$'+price_val.toFixed(2) );
												}
												else if(thrd_keyy == '_sku'){
													jQuery('.entry-summary .product_meta').find('.sku').text( thrd_valuee );
												}
												else if(thrd_keyy == 'image'){
													jQuery('.images').find('img').attr('src', thrd_valuee);
													jQuery('.more-views').find('a').attr('href', thrd_valuee);
													jQuery('.more-views a').find('img').attr('src', thrd_valuee);
												}
												else if(thrd_keyy == 'description'){
													jQuery('#product-description p').text( thrd_valuee );
												}
												else if(thrd_keyy == next_opt){
													jQuery('#'+next_opt).append('<option data-re_value="'+ sec_keyy +'" value="'+ thrd_valuee +'"> '+ thrd_valuee + ' :' + price_val.toFixed(2) +'</option>');
												}
	                                    	});
									    }
	                              	}
	                            }
	                        }
	                        else{
	                            if(option_text == sec_keyy){
	                                var price_val;
	                                jQuery.each(sec_valuee, function(thrd_keyy, thrd_valuee) {
	                                    if(thrd_keyy == 'id'){
	                                      jQuery('.entry-summary .cart input[name="add-to-cart"]').val(thrd_valuee);
	                                    }
	                                    else if(thrd_keyy == 'title'){
	                                      varTitle = jQuery('<textarea />').html(thrd_valuee).text();
	                                      jQuery('.page_cont').find('.product_title').text( varTitle );
	                                    }
	                                    else if(thrd_keyy == '_price'){
	                                      price_val = parseFloat(thrd_valuee);
	                                     jQuery('.entry-summary').find('.price').text( '$'+price_val.toFixed(2) );
	                                      jQuery('.page_cont').find('.price .amount').text( '$'+price_val.toFixed(2) );
	                                    }
	                                    else if(thrd_keyy == '_sku'){
	                                      jQuery('.entry-summary .product_meta').find('.sku').text( thrd_valuee );
	                                    }
	                                    else if(thrd_keyy == 'image'){
	                                      jQuery('.images').find('img').attr('src', thrd_valuee);
	                                      jQuery('.more-views').find('a').attr('href', thrd_valuee);
	                                      jQuery('.more-views a').find('img').attr('src', thrd_valuee);
	                                    }
	                                    else if(thrd_keyy == 'description'){
	                                      jQuery('#product-description p').text( thrd_valuee );
	                                    }
	                                    else if(thrd_keyy == next_opt){
	                                    	price_val = parseFloat(price_val);
	                                    	//alert(price_val);
	                                      jQuery('#'+next_opt).append('<option data-re_value="'+ sec_keyy +'" value="'+ thrd_valuee +'"> '+ thrd_valuee + ' :' + price_val.toFixed(2) +'</option>');
	                                    }
	                                });
	                            }
	                        }
	                  	}
	                });
	            });

	            jQuery.each(tstmarkers, function(keyy, valuee) {
	                var add = '';
	                var temp_bundled = {};
	                var key_bundled = [];
	                if(valuee){
	                   jQuery.each(valuee, function(valuee_keyy, valuee_valuee) {
	                       
	                       temp_bundled[valuee_keyy]  = valuee_valuee;
	                       key_bundled[keyy]  = valuee_keyy;
	                       add += valuee_keyy +'/';

	                   });


	                   var arr = Object.keys( temp_bundled ).map(function ( key ) { return temp_bundled[key]; });
	                   var min = Math.min.apply( null, arr );
	                   var max = Math.max.apply( null, arr );

	                   if(min == max){
	                       jQuery('#'+option_key).append('<option data-re_value="'+ add +'" value="'+ keyy +'"> '+ keyy + ': ' + min.toFixed(2) + '</option>');
	                   }
	                   else{
	                       if(min && min != 'Infinity'){
	                           jQuery('#'+option_key).append('<option data-re_value="'+ add +'" value="'+ keyy +'"> '+ keyy + ': '+ min.toFixed(2) + ' to ' +  max.toFixed(2) + '</option>');    
	                       }
	                   } 
	                }
	                
	            });
	            
	        }
	    });
	});
	</script>
	<?php  get_footer(); } ?>
