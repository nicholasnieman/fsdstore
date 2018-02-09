<?php get_header( ); ?>


<?php global $frame_breadcumb;?>

<!-- #Container Area -->

      <div class="container">
		<?php 
			$category= get_queried_object();
			$cat_id = $category->term_id; 
		?>
       
	        <div class="page_header_inner"> <!-- row -->
				<div class="heading-left">
					<h2>About US</h2>
				</div>
				<div class="two-btn">
					<div id="buying-guide"><a href="/buying-guide/">Buying Guide</a></div>
				</div>
				<div class="two-btn">
					<div id="need-help"><a href="/contact/">Need Help?</a></div>
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
			        <h1 class="align-center">PICK YOUR DESIGN</h1>
			        <h2 class="align-center">
			        	<?php printf('<span>' . single_cat_title( '', false ) . '</span>' ); ?>
			        </h2>

			        <p class="align-center">If you don't see a layout that is similar to your opening, don't worry just
			        <a href="/shower-door-frameless-steam-units"><button type="submit" class="form-btn">Click Here</button></a>
			        to send us a photo, or you can call us at 855.372.6537.</p>
			    </div>
			</div>
 			<div class="col-md-12 page-content doorWidget animated_glass doorbuilder">
				<?php 
					$args = array(
						'post_type' => 'products',
						'post_status' => 'publish',
						'posts_per_page' => -1,
						'order'   => 'DESC',
						'tax_query' => array(
						    array(
						    'taxonomy' => 'products_category',
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
					   		    <strong class="door-title"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></strong>
					   		    <div class="align-center"><a href="<?php echo get_permalink(); ?>" class="btn-v4 inline align-center">Start Building</a></div>
					   		</div>
					       <?php
						}
					} 
					wp_reset_postdata(); 
				?>    	
			</div>
		</div>	 
    </div>
  
</div>
<?php get_footer("home"); ?>