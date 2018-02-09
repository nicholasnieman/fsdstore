<?php

	get_header('dummy');


	if( isset($_GET['city']) && $_SERVER["REQUEST_METHOD"] == "GET" ){
		
			$city_name =  $_GET["city"];		
	}else{
		$city_name = 'null';
	}
	
?>	
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.custom_left_tab_menu a').hover(function(event){
         
			event.preventDefault();
            jQuery('#selected-layout').empty();
			
            var text_html = jQuery(this).text();
            jQuery('#selected-layout').html('<strong>Door Style: </strong> '+text_html);
     });
	
	
	
	jQuery('.custom_left_tab_menu a').html(function(index, content) {
		var wordsToBold=["Single Shower","Hydroslide","Sebastian","Cottage","Inline","90 Degree","Neo Angle","Steam","Fixed"];
    return content.replace(new RegExp('(\\b)(' + wordsToBold.join('|') + ')(\\b)','ig'), '$1<b>$2</b>$3');
});	 

jQuery('.door-title').html(function(index, content) {
		var wordsToBold=["Single","Hydroslide","Sebastian","Cottage","Inline","90 Degree","Neo Angle","Steam","Splash Guard"];
    return content.replace(new RegExp('(\\b)(' + wordsToBold.join('|') + ')(\\b)','ig'), '$1<b>$2</b>$3');
});	 


});
	
</script>



<!-- #Container Area -->
<div style="width:100%;" >			

		<div class="twoColbg" >
			<div class="">
			   <div class="doorbuilder" style="background:#000000 !important;">

			   		
	   				<div class="get_started clearfix builder-layout" style="border-bottom:none !important; border-bottom-color: #ffffff !important;" >
	   					<div class="custom_left_tab_menu get-started-tab-menu">
                       
	   						<ul class="door_type_menu" >
		   				  	<?php 
		   						$category= get_queried_object();
		   						$cat_id = $category->term_id; 
		   						$wcatTerms = get_terms('product_cat',
		   							array(
		   								'hide_empty' => false,
		   								'orderby' => 'ID',
		   								'parent' => 0,
		   								'include'	 => array(66, 99, 102, 92, 100, 101, 320, 323, 326)
		   							)
		   						);
		   						foreach($wcatTerms as $wcatTerm){
		   							$t_id = $wcatTerm->term_id;
		   							$bundled_product_category = get_field('kiosk_image', 'product_cat_'.$t_id);
		   							echo '<li><a rel="'.$wcatTerm->slug.'" class="list-group-item text-center" href="javascript:void(0)"><div class="title">'.$wcatTerm->name.'</div></a></li>';
		   						}
		   					?>
		   					</ul>
                           
	   		  			</div>
	   			  		<div class="custom_right_tab_content"><?php  
	   			  			foreach($wcatTerms as $wcatTerm){ 
	   			  				$args = array(
										'post_type' => 'product',
										'post_status' => 'publish',
										'posts_per_page' => -1,
										'tax_query' => array(array('taxonomy' => 'product_cat', 'field' => 'id', 'terms' => $wcatTerm->term_id, ) )
	   							);
	   							$count = 0;
	   							$the_queryy = new WP_Query( $args );
	   							if ( $the_queryy->have_posts() ) {
	   								while ( $the_queryy->have_posts() ) {
	   									$the_queryy->the_post(); 
	   									$count++;
	   								}
	   					
	   							} 
	   							wp_reset_postdata(); 		
	   			  			$wsubargs = array(
	   			  				'hierarchical' => 1,
	   			  				'show_option_none' => '',
	   			  				'hide_empty' => false,
	   			  				'parent' => $wcatTerm->term_id,
	   			  				'taxonomy' => 'product_cat',
	   			  				'order' => 'DESC'	   			  				
	   			  			);
	   			  			$wsubcats = get_categories($wsubargs);
	   			  			$t_id = $wcatTerm->term_id;
	   			  			$variable = get_field('kiosk_image', 'product_cat_'.$t_id);
	   			  			$bundled_product_category = get_field('kiosk_image', 'product_cat_'.$t_id);
	   			  			$thumbnail_id = get_woocommerce_term_meta( $wcatTerm->term_id, 'thumbnail_id', true );
	   			  			$image = wp_get_attachment_url( $thumbnail_id );

	   			  			if($count==0){
	  							$img_html = '<a data-re_cat="'.$wcatTerm->term_id.'-layout" href="javascript:void(0)" class=" btn dark-btn custom_orange_btn  btn-v4 fullwidth inline align-center">Contact Us </a>';
	  						}
							else{
								$img_html = '<a data-re_cat="'.$wcatTerm->term_id.'-layout" href="javascript:void(0)" class=" btn dark-btn custom_orange_btn  btn-v4 fullwidth inline align-center">View All '.$count.' Layouts</a>';
							}

	   			  				echo '<div class="tab-content clearfix" id="'.$wcatTerm->slug.'" >
<div class="showshower">
		   			  				<div class="section_text"> <h2>'.$wcatTerm->name.'</h2>
		   								'.$img_html.'</div>
										
		   			  				<div class="section_heading">
		   								
		   							</div>	
									
		   								<div class="custom_renderContainer" style="background:url('.$variable['url'].') no-repeat; background-size:cover;background-position:top right">&nbsp;
		   									
		   								</div>
	   								</div>

	   								
	   							</div>';
	   			  			} ?>
	   			  		</div>
	   			  	</div>
					<?php 

					
						/*Archive*/
						
						echo '<div class="col-md-12 page-content doorWidget animated_glass doorbuilder" >
						
						
					
						<div id="layout-listing" >';


						echo '<h4 class="get_template-sect" style="display:none;">Select your Installation<strong>Easy</strong>&#8482; design</h4>';
							foreach($wcatTerms as $wcatTerm){
								$args = array(
									'post_type' => 'product',
									'post_status' => 'publish',
									'posts_per_page' => -1,
									//'orderby' => 'term_order',
									//'order' => 'ASC',
									'tax_query' => array(array('taxonomy' => 'product_cat', 'field' => 'id', 'terms' => $wcatTerm->term_id, ) )
								);
							
								$thumbnail_id = get_woocommerce_term_meta( $wcatTerm->term_id, 'thumbnail_id', true );
								$image = wp_get_attachment_url( $thumbnail_id );
								


									echo '<div id="'.$wcatTerm->term_id.'-layout" class="product-layout_section" >';
									echo '<div class="content_heading" ><h2 ><strong>'.$wcatTerm->name.'</strong></h2><div style="margin-top:10px; width:20%; margin:0px auto; border-radius:8px; font-size:14px; line-height:20px; background:#026267; padding:8px;"><a href="/dummy-kiosk/" style="color:#ffffff; text-decoration:none;">CHANGE DOOR SECTION</a></div></div>';
										$the_queryy = new WP_Query( $args );
										if ( $the_queryy->have_posts() ) {
											while ( $the_queryy->have_posts() ) { 
													$the_queryy->the_post();
													$feat_image_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID()) );

													if( $city_name != '' && $city_name != 'null' && $city_name != 'index'){
														$href= ''.get_permalink().'?mode=kiosk&city='.$city_name.'';	
													}else{
														$href= ''.get_permalink().'?mode=kiosk/';
													}
										      
										   	echo '<div class="col-md-4 margin-bottom-30">
									   		   
									   		   <div class="img">
									   		    	<img src="'.$feat_image_url.'" data-animated="images/product/single_1_5.gif">
									   		   </div>
									   		   
									   		   <div class="door-title">
									   		   	<a href="'.$href.'" data-re_layout="'.get_the_ID().'-single-layout">'.get_the_title().'</a>
									   		   </div>
									   		   
									   		   <div class="align-center">
									   		   	<a href="'.$href.'" data-re_layout="'.get_the_ID().'-single-layout" class="btn-v4 inline align-center">
									   		   		<strong>Start Building</strong>
									   		   	</a>
									   		   </div>

									   		</div>';
										      
											}
										}
									wp_reset_postdata(); 
								echo '</div>';
							}
						echo '</div></div>';
					?>

			</div>	 
	    </div>
	</div>

</div>

<?php get_footer("dummy"); ?>