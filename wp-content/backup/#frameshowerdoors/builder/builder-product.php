<?php



if(is_user_logged_in()) {
	$current_user = wp_get_current_user();

	//echo '<pre>'.print_r($current_user).'</pre>';
	if($current_user->roles[0] == 'sales_rep' || $current_user->roles[0] == 'administrator' ){
		$current_user_role = $current_user->roles[0];
	}
	else if($current_user->roles[1] == 'sales_rep' || $current_user->roles[1] == 'administrator' ){
		$current_user_role = $current_user->roles[1];
	}
	

	if($current_user_role == 'sales_rep' || $current_user_role == 'administrator'){
		
	}else{
		header("Location: ".site_url());
		exit();
	}
}else{
	header("Location: ".site_url().'/builder-login/');
	exit();
}

	get_header('builder');


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
		var wordsToBold=["Single Shower","Hydroslide","Serenity","Cottage","Inline","90 Degree","Neo Angle","Steam","Fixed"];
    return content.replace(new RegExp('(\\b)(' + wordsToBold.join('|') + ')(\\b)','ig'), '$1<b>$2</b>$3');
});	 

jQuery('.door-title').html(function(index, content) {
		var wordsToBold=["Single","Hydroslide","Serenity","Cottage","Inline","90 Degree","Neo Angle","Steam","Splash Guard"];
    return content.replace(new RegExp('(\\b)(' + wordsToBold.join('|') + ')(\\b)','ig'), '$1<b>$2</b>$3');
});	 
jQuery('.buttonSH').css('display','none');  	  
jQuery('.doorreturn').click(function(e){
    e.preventDefault();
   jQuery('.buttonSH').css('display','block');    
  });

	});
</script>

<!-- #Container Area -->

<div style="background: #a3d5d7; /* Old browsers */
background: -moz-linear-gradient(top, #a3d5d7 0%, #429ba0 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top, #a3d5d7 0%,#429ba0 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom, #a3d5d7 0%,#429ba0 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a3d5d7', endColorstr='#429ba0',GradientType=0 ); /* IE6-9 */
   height:100vh; ">			
<div id="builder-mode" style="background:none">
		<div class="twoColbg">
			<div class="">
			   <div class="doorbuilder">

			   		
	   				<div class="get_started clearfix builder-layout" style="border-bottom:none !important;  border-bottom-color: #ffffff !important;">
	   					<div class="custom_left_tab_menu get-started-tab-menu" style="height:100vh; background:#fff;">
                           
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
		   							echo '<li ><a rel="'.$wcatTerm->slug.'" class="list-group-item text-left" href="javascript:void(0)"><div class="title">'.$wcatTerm->name.'</div></a></li>';
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
								$img_html = '<a data-re_cat="'.$wcatTerm->term_id.'-layout" href="javascript:void(0)"  class="doorreturn btn dark-btn custom_orange_btn  btn-v4 fullwidth inline align-center">View All '.$count.' Layouts</a>';
							}

	   			  				echo '<div class="tab-content clearfix" id="'.$wcatTerm->slug.'" >
<div class="showshower">
		   			  				<div class="section_text"> <h2>'.$wcatTerm->name.'</h2>
		   								'.$img_html.'</div>
										
		   			  				<div class="section_heading">
		   								
		   							</div>	
									
		   								<div class="custom_renderContainer" style="background:url('.$variable['url'].') no-repeat; background-size:cover; background-position: 0 50%;">&nbsp;
		   									
		   								</div>
	   								</div>

	   								
	   							</div>';
	   			  			} ?>
	   			  		</div>
	   			  	</div>
					<?php 

					
						/*Archive*/
						
						echo '<div class="col-md-12 page-content doorWidget animated_glass doorbuilder" >
						
						<div style="width:80%; margin:0px auto;">
					
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
								
									
									echo '<div class="section_text2" style="padding-top:25px; padding-bottom:25px;"> <h2>'.$wcatTerm->name.'</h2></div>';
										$the_queryy = new WP_Query( $args );
										if ( $the_queryy->have_posts() ) {
											while ( $the_queryy->have_posts() ) { 
													$the_queryy->the_post();
													$feat_image_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID()) );

										      
										   	echo '<div class="col-md-4 margin-bottom-30 ">
									   		   
									   		 <div class="kioskproduct">  <div class="img-kiosk">
<a href="'.get_permalink().'?mode=builder" data-re_layout="'.get_the_ID().'-single-layout"><img src="'.$feat_image_url.'" data-animated="images/product/single_1_5.gif"></a>
									   		   </div>
									   		   
									   		   <div class="door-title">
									   		   	 <p>  '.get_the_title().'</p>
									   		   </div>
									   		   
									   		   <div class="align-center doorbtn">
									   		   	<a href="'.get_permalink().'?mode=builder" data-re_layout="'.get_the_ID().'-single-layout" >
									   		   		Start Building
									   		   	</a>
									   		   </div>
</div>
									   		</div>';
										      

											}
										}
									wp_reset_postdata(); 
								echo '</div>';
							}
						echo '</div></div></div>';
					?>

			</div>	 
	    </div>
	</div>

</div>

</div>	


		
