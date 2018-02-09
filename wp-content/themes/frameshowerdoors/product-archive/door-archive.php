<?php
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
					        <h2 style="margin-bottom:25px; color:#026267"><strong>PICK</strong> YOUR LAYOUT</h2>
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

?>