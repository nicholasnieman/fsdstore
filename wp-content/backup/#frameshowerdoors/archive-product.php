<!-- #Container Area -->
	<?php 
		$category= get_queried_object();
		$cat_id = $category->term_id; 
		$cat_nm = $category->name; 

	$wcatTerms = get_terms('product_cat',
		array(
			'hide_empty' => false,
			'orderby' => 'name',
			'parent' => 0,
		)
	);
	$term_arr = array();
	foreach($wcatTerms as $wcatTerm){
		$t_id = $wcatTerm->term_id;
		$variable = get_field('_is_bundled_cat', 'product_cat_'.$t_id);
		if($variable == 'Yes'){
			$term_arr[$wcatTerm->term_id] = $wcatTerm->term_id;
		}
	}
	if(in_array($cat_id,$term_arr)){

		get_header();
		global $frame_breadcumb; ?>
	    <div class="container myarchive">
	        <div class="page_header_inner"> <!-- row -->
				<div class="heading-left">
					<h2 id="product-cat-<?php echo $cat_id; ?>"><?php echo $category->name; ?></h2>
				</div>
				<div class="two-btn">
					<div id="buying-guide"><a href="<?php echo site_url(); ?>/buying-guide/">Buying Guide</a></div>
				</div>
				<div class="two-btn">
					<div id="need-help"><a href="<?php echo site_url(); ?>/contact/">Need Help?</a></div>
				</div>
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
	   
			<div class="mains col-md-12 page-content doorWidget animated_glass doorbuilder">
				<div class="twoColbg">
					<div class="row">
					    <div class="col-md-12">
					        <h2 style="margin-bottom:25px; color:#026267"><strong>PICK</strong> YOUR DESIGN</h2>
					        <p style="font-weight:bold; font-size:26px">
					        	<?php $title=single_cat_title( '', false );
					        	if($title == "Single Shower Door"){
					        		echo 'Single Door' ; 
					        	}
					        	else{  echo  $title;  } ?>
					        </p>

					        <p>If you don't see a layout that is similar to your opening, don't worry just
					        <a href="<?php bloginfo('url');?>/shower-door-frameless-steam-units/"><button type="submit" class="form-btn">Click Here</button></a>
					        to send us a photo, or you can call us at 855.372.6537.</p>
					    </div>
					</div>

					<?php

					if ( has_term_have_children( $cat_id ) && $cat_id != 93 && $cat_id != 98) {
					   	$wsub_subargs = array(
							'hierarchical' => 1,
							'show_option_none' => '',
							'hide_empty' => false,
							'parent' => $cat_id,
							'taxonomy' => 'product_cat',
							'order' => 'ASC'
						);
						$wsub_subcats = get_categories($wsub_subargs);
						
						foreach ($wsub_subcats as $catskey => $catsvalue) {
						
							?>

							<h2><?php echo $catsvalue->name; ?></h2>
				 			<div class="col-md-12 page-content doorWidget animated_glass doorbuilder">
								<?php 
									$args = array(
										'post_type' => 'product',
										'post_status' => 'publish',
										'posts_per_page' => -1,
										'tax_query' => array(
										    array(
										    'taxonomy' => 'product_cat',
										    'field' => 'id',
										    'terms' => $catsvalue->term_id
										     )
										  )
									);
									$the_queryy = new WP_Query( $args );
									if ( $the_queryy->have_posts() ) {
										while ( $the_queryy->have_posts() ) {
											$the_queryy->the_post(); 
											$feat_image_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID()) );
									       ?>
									   		<div class="col-md-3 margin-bottom-30">
									   		    <div class="img"><img src="<?php echo $feat_image_url; ?>" data-animated="images/product/single_1_5.gif"></div>
									   		    <strong class="door-title"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></strong>
									   		    <div class="align-center"><a href="<?php echo get_permalink(); ?>" class="btn-v4 inline align-center">Start Building</a></div>
									   		</div>
									       <?php
										}
									} 
									wp_reset_postdata(); 
								?>    	
							</div>
							<?php
						}	
					}else{
					?>

		 			<div class="col-md-12 page-content doorWidget animated_glass doorbuilder">
						<?php 
							$args = array(
								'post_type' => 'product',
								'post_status' => 'publish',
								'posts_per_page' => -1,
								'tax_query' => array(
								    array(
								    'taxonomy' => 'product_cat',
								    'field' => 'id',
								    'terms' => $cat_id
								     )
								  )
							);
							$the_queryy = new WP_Query( $args );
							if ( $the_queryy->have_posts() ) {
								while ( $the_queryy->have_posts() ) {
									$the_queryy->the_post(); 
									$feat_image_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID()) );
							       ?>
							   		<div class="col-md-3 margin-bottom-30">
							   		    <div class="img"><img src="<?php echo $feat_image_url; ?>" data-animated="images/product/single_1_5.gif"></div>
							   		    <p class="align-center" style="font-size:18px !important; padding:10px;"><strong><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></strong></p>
							   		    <div class="align-center"><a href="<?php echo get_permalink(); ?>" class="btn-v4 inline align-center">Start Building</a></div>
							   		</div>
							       <?php
								}
							} 
							wp_reset_postdata(); 
						?>    	
					</div>
					<?php } ?>

				</div>	 
		    </div>
		</div>

	<?php

	 testiominal_code();  

	 pages_link_section();

	 get_footer("home"); 

 } 
 else{
 	//echo 'Store Product';

 	get_header( 'inner' ); 
	global $frame_breadcumb;
	global $post;

?>

<script type="text/javascript">
	jQuery(document).ready(function(){
		var cat_nm = '<?php echo $cat_nm; ?>';
		jQuery('.breadcrumbs li .cont_nav_inner .skt-breadcrumbs-separator').after('<span>'+cat_nm+'</span>');
	});
</script>

		<div id="mwrapbg">
		  <div id="mbar">
		    <div id="mwrap">
		      <div id="main">
		        <div id="main-header">
		            <h2> Store </h2>
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
		            <div class="twoColbg">
		                <div class="col-main">
		                	<div class="page-title category-title">
		                	    <h2 class="steps-header"><?php echo $cat_nm; ?></h2>
		                	</div>

	                        <div class="page_cont category-products">
                        		<ul class="products-grid">
	                        	<?php 
	                        	
	                        		$args = array(
	                        			'post_type' => 'product',
	                        			'post_status' => 'publish',
	                        			'posts_per_page' => -1,
	                        			'tax_query' => array(
	                        			    array(
	                        			    'taxonomy' => 'product_cat',
	                        			    'field' => 'id',
	                        			    'terms' => $cat_id
	                        			     )
	                        			  ),
	                        			'meta_query' => array(
	                        				array('key'     => 'tinfini_storemetabox', 'value'   => 'on', 'compare' => '=', ),
	                        			),
	                        		);
	                        		$query = new WP_Query($args);

	                        			while ($query->have_posts()) :
	                        				$query->the_post(); 
	                        				$main_pro_id =  get_the_id();
	                        				$pro_title =  get_the_title();
	                        				$pro_permlink =  get_permalink();
	                        				$store_grp = get_field('_store_group', $main_pro_id );
	                        				//echo $main_pro_id.'->'.$store_grp.'<br/>';
	                        				if($store_grp){
	                        					 $inner_args = array(
                    						        'posts_per_page' => -1,
                    						        'orderby' => 'rand',
                    						        'post_type' => 'product',
                    						        'post_status' => 'publish',
                    						        'tax_query' => array(
                    						            array('taxonomy' => 'product_cat', 'field'    => 'id', 'terms'    => $cat_id, ),
                    						            array('taxonomy' => 'product_store', 'field'    => 'term_id', 'terms'    => $store_grp, ),
                    						        ),
                    						    );
                    						    $inner_query = new WP_Query($inner_args);
                    						    $price_cal = array();

                    						    if ( $inner_query->have_posts() ) {
	                    						    while ($inner_query->have_posts()) :

	                    						    	$inner_query->the_post();
	                    						    	$cur_tag_id = get_the_ID(); 
		                    						    if($main_pro_id != $cur_tag_id){
															$price_cal[$cur_tag_id] = get_post_meta($cur_tag_id, '_price' , true);
		                    						    }
	                    						        
                    						    	endwhile;
                    							}
                    						    wp_reset_postdata();

                    						    $show_product_id = array_search (min( $price_cal), $price_cal);
												$min_price = min( $price_cal);
												$price_meta = get_post_meta($show_product_id, '_price' , true);
												$price_meta = number_format($price_meta, 2, '.', '');
												$image_url  = wp_get_attachment_image_src( get_post_thumbnail_id( $show_product_id ) , 'full' );
                    						    ?>
                    						    	<li class="item first last odd">
                    						    		<a class="product-image" title="<?php echo $pro_title; ?>" href="<?php echo $pro_permlink; ?>">
                    						    			<img width="150" height="150" src="<?php echo $image_url[0]; ?>" data-animated="<?php echo $feat_image_url; ?>">
                    						    		</a> 
                    						    		<h2 class="product-name">
                    						                <a title="<?php echo $pro_title; ?>" href="<?php echo $pro_permlink; ?>">
                    						                    <?php echo $pro_title; ?>
                    						                </a>
                    						            </h2>											                
                    						    		<div class="price-box">
                    						    			<span id="product-price-<?php echo $main_pro_id; ?>" class="regular-price">
                    						    				<span itemprop="price" class="price"><?php echo '$'.$price_meta; ?></span>
                    						    			</span>
                    						    		</div>
                    						    		<div class="actions">
                    						    				<a title="<?php echo $pro_title; ?>" class="single_add_to_cart_button button alt" href="<?php echo $pro_permlink; ?>">Add to cart</a>
                    						    				<!-- <button data-product_id="<?php echo $main_pro_id; ?>" class="single_add_to_cart_button button alt" type="submit"></button> -->

                    						    		</div>												                    
                    						    	</li> 
                    						    <?php
                    						    // $query->reset_postdata();
	                        				}
	                        		        else{
	                        		        	$price_meta = get_post_meta($main_pro_id, '_price' , true);
	                        		        	$price_meta = number_format($price_meta, 2, '.', '');
	                        		        	$image_url  = wp_get_attachment_image_src( get_post_thumbnail_id( $main_pro_id ) , 'full' );
	                        		        	?>
	                        		        		<li class="item first last odd">
	                        		        			<a class="product-image" title="<?php echo $pro_title; ?>" href="<?php echo $pro_permlink; ?>">
	                        		        				<img width="150" height="150" src="<?php echo $image_url[0]; ?>" data-animated="<?php echo $feat_image_url; ?>">
	                        		        			</a> 
	                        		        			<h2 class="product-name">
	                        		        	            <a title="<?php echo $pro_title; ?>" href="<?php echo $pro_permlink; ?>">
	                        		        	                <?php echo $pro_title; ?>
	                        		        	            </a>
	                        		        	        </h2>											                
	                        		        			<div class="price-box">
	                        		        				<span id="product-price-<?php echo $main_pro_id; ?>" class="regular-price">
	                        		        					<span itemprop="price" class="price"><?php echo '$'.$price_meta; ?></span>
	                        		        				</span>
	                        		        			</div>
	                        		        			<div class="actions">
	                        		        				<form enctype="multipart/form-data" method="post" class="cart">
	                        		        					<input type="hidden" value="<?php echo $main_pro_id; ?>" name="add-to-cart">
	                        		        					<button data-product_id="<?php echo $main_pro_id; ?>" class="single_add_to_cart_button button alt" type="submit">Add to cart</button>
	                        		        				</form>

	                        		        			</div>												                    
	                        		        		</li> 
	                        		        	<?php
	                        		        }
	                        			endwhile;
	                        			wp_reset_postdata();
                        			// 	}
                        			// }
                        			// wp_reset_postdata();
	                        	?>
                        		</ul>
	                        </div>                
		                </div>

		                <div id="snav">
		                  <div id="snav">
		                    <div class="gift-special widget-container widget_nav_menu" id="nav_menu-8">
		                      <h3 class="section_heading widget-title">Category</h3>
		                      <div class="menu-why-fsd-container">
		                        <ul class="menu" id="menu-why-fsd">
		                          <?php
		                            $wcatTerms = get_terms(
		                              'product_cat',
		                              array('hide_empty' => 0, 'orderby'  => 'name', 'order'   => 'ASC', 'parent'   => 0, 'exclude'  => array(66, 99, 98, 102, 92, 100, 93, 101, 89, 91, 88, 87, 86, 84) )
		                            );
		                            foreach($wcatTerms as $wcatTerm){ 
		                            	if($cat_id == $wcatTerm->term_id){
		                            		echo '<li class="active"> <a id="cat-id-'.$wcatTerm->term_id.'" href="'.get_term_link( $wcatTerm->slug, $wcatTerm->taxonomy ).' "> '.$wcatTerm->name.'</a> </li>';
		                            	}
	                            		else{
	                            			echo '<li> <a id="cat-id-'.$wcatTerm->term_id.'" href="'.get_term_link( $wcatTerm->slug, $wcatTerm->taxonomy ).' "> '.$wcatTerm->name.'</a> </li>';
	                            		}
		                            	
		                              
		                            }
		                          ?>
		                          </ul>
		                        </div>
		                      </div>                
		                    </div>
		                </div>

		                <div class="clear"></div>
		            </div>
		        </div>
		      </div>
		    </div>
		  </div>
		</div> 
		<?php
	get_footer();
 }

 ?>