<?php
/*Template Name:Our Facility*/

	//get_header();

	get_header( 'inner' );

?>	

<?php global $frame_breadcumb;?>
<div id="mwrapbg">
	<div id="mbar">
		<div id="mwrap">
		    <div id="main" >
		      	<div id="main-header" class="relative">
					<h2> <?php the_title();?> </h2>
					<div id="locddc">
						<div><a id="locddbtn" class="ddopen">Select an FSD Florida Satellite Location</a></div>
						<div id="locdd">
							<ul>
							<li><a href="<?php bloginfo('url'); ?>/contact" target="_blank">Coral Springs, FL - World HQ</a></li>
							<li><a href="<?php bloginfo('url'); ?>/hollywood" target="_blank">Hollywood, FL</a></li>
							<li><a href="<?php bloginfo('url'); ?>/pompano-beach" target="_blank">Pompano Beach, FL</a></li>
							<li><a href="<?php bloginfo('url'); ?>/sunrise" target="_blank">Sunrise, FL</a></li>
							<li><a href="<?php bloginfo('url'); ?>/delray-beach" target="_blank">Delray Beach, FL</a></li>
							<li><a href="<?php bloginfo('url'); ?>/west-palm-beach" target="_blank">West Palm Beach, FL</a></li>
							<li><a href="<?php bloginfo('url'); ?>/port-st-lucie" target="_blank">Port ST Lucie, FL</a></li>
							<li><a href="<?php bloginfo('url'); ?>/doral" target="_blank">Doral, FL</a></li>
							<li><a href="<?php bloginfo('url'); ?>/palmetto-bay" target="_blank">Palmetto Bay, FL</a></li>
							<li><a href="<?php bloginfo('url'); ?>/lake-worth" target="_blank">Lake Worth, FL</a></li>
							</ul>
						</div>
					</div>
		      	</div>
		        <div class="main50">
			       <?php $left_section_content=get_field('_left_section_content');
			       		 $right_section_content=get_field('_right_section_content');	
			       ?>
			      	<div class=" facilityPage">
  						 <div class="left">
  					 		<?php echo $left_section_content; ?>
  					 		<div class="of1">
								<p>Join our CEO as he explains our culture and provides a tour of our state-of-the-art Headquarters in Coral Springs, Florida.</p>
								<div class="ofgal">
									<h5>Our Facility Photos</h5>
									<a id="ofGalLaunch" class="btn-sm">View Gallery</a>
									<?php	$args = array(
													'hierarchical' => 1,
													'show_option_none' => '',
													'hide_empty' => 0,
													'parent' => 198,
													'taxonomy' => 'gallery_cat'
												);
										$subcats = get_categories($args);

										//print_r($subcats);
										$i=0;

										foreach ($subcats as $subcat) {
											$slug=$subcat->slug;
											$term_id=$subcat->term_id ;
											$args = array(
												'post_type' => 'gallery',
												'order'=>'ASC',
												'tax_query' => array(
													array(
														'taxonomy' => 'gallery_cat',
														'field'    => $slug,
														'terms'    =>$term_id,
													),
												),

											);
											$loop = new WP_Query( $args );
											echo  '<div class="ofss" id="ofss'.$i.'"><ul>';
											while ( $loop->have_posts() ) : $loop->the_post();
												$full_img=get_field('our_facility_full_image'); 
												echo '<li><a  class="fancyimg" rel="facility"  href="'.$full_img.'"><img src=" '.wp_get_attachment_url(get_post_thumbnail_id()).'" /></a></li>';
												endwhile; wp_reset_postdata(); 
											$i++; 
											echo  '</ul></div>';
										}
									
								?>
								</div>
							</div>
						</div>
						<div class="right">
							<?php echo $right_section_content; ?>
							<div id="oftxt2">
								<h2 style="margin: 0;">Would you like a tour?</h2>
								 <div id="fform"><?php echo do_shortcode('[wp_tour_form]'); ?></div>
							</div>
						</div>							
  					</div>


				</div>
			</div>
		</div>
	</div>
</div>

<?php

get_footer();

?>