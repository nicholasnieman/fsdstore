<?php get_header( ); ?>
<!-- #Container Area -->
		<div class="et_pb_section et_pb_fullwidth_section et_pb_section_0 et_pb_with_background et_section_regular" id="catgory-heading">
      		<section class="et_pb_fullwidth_header et_pb_module et_pb_bg_layout_dark et_pb_text_align_left et_pb_fullwidth_header_0">
				<div class="et_pb_fullwidth_header_container left">
					<div class="header-content-container center">
						<div class="header-content">
							<div class="row">
							    <div class="col-md-12">
							        <h1 class="page-title"><?php
									printf( __( '%s', 'twentyten' ), '<span>' . single_cat_title( '', false ) . '</span>' );
									?></h1>
									<h2><?php the_title();?></h2>
							    </div>
							</div>
						</div>
					</div>
				</div>
				<div class="et_pb_fullwidth_header_overlay"></div>
				<div class="et_pb_fullwidth_header_scroll"></div>
			</section>
		</div>
      	<div class="container">
			<div class="mains col-md-12 page-content doorWidget animated_glass doorbuilder">
				<div class="twoColbg">
	 			<?php
	 				$category= get_queried_object();
	 				$cat_id = $category->term_id; 
	 			?>				
	 			<section class="slider">	
	 			<div class="col-md-12 page-content doorWidget animated_glass doorbuilder flexslider">
	 			<ul class="slides">
					<?php 

					$args = array(
					'post_type' => 'gallery',
					'tax_query' => array(
					    array(
					    'taxonomy' => 'gallery_cat',
					    'field' => 'id',
					    'terms' => $cat_id
					     )
					  )
					);
					$the_queryy = new WP_Query( $args ); 

						if ( $the_queryy->have_posts() ) {
							while ( $the_queryy->have_posts() ) {
								$the_queryy->the_post();
								?>
								<li class="cat_posts clearfix">
								<?php
								
						       ?>						       
						       <?php
						       if( have_rows('_gallery_section') ):

								 	// loop through the rows of data
								    while ( have_rows('_gallery_section') ) : the_row();

								        // display a sub field value
								        ?>
								        <div class="smile clearfix">
									        <div class="before">
										        <img src="<?php the_sub_field('_before_image');?>"><?php 
										        ?><p><?php the_sub_field('_before_text');?></p>
									        </div>
									        <div class="before">
										        <img src="<?php the_sub_field('_after_image');?>"><?php
										        ?><p><?php the_sub_field('_after_text'); ?></p>
									        </div>

								        </div>
								        
								        <?php

								    endwhile;

								else :
								    // no rows found
								endif;
							?>
								<div class="postss">
							        <?php ?><div class="description"><?php the_content(); ?></div><?php
							        if (has_post_thumbnail( get_the_ID())){
							        $feat_image_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID(),'thumbnail') );
							        ?>
							        <img width="250" height="400" src="<?php echo $feat_image_url;?>">
							        <?php }?>
							    </div>
							</li><?php
							}
						}
						?>
						</ul>
						</div>
						
						</section>
						<?php
						wp_reset_postdata(); 

					
					?>    	
				 </div>
			 </div>	 

      </div>
  
</div>

<?php get_footer(); ?>