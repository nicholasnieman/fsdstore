<?php get_header(); ?>

<div class="home-slider owl-carousel owl-theme" id="home-slider">
	<?php

		// The Query
		$args = array(
			'post_type' => 'slider',
			'post_status' => 'publish',
			'posts_per_page' => -1,
			'order'   => 'DESC'
		);
		$the_query = new WP_Query( $args );
		$cnt=1;
		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				$post_id = get_the_ID();
				$feat_image_url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );
				$_slider_text = get_post_meta($post_id,'_slider_text',true);
				$_slider_url = get_post_meta($post_id,'_slider_url',true); ?>
				<div class="item abcd" data-hash="<?php echo $cnt; ?>">
				    <div class="slider-left-content">
				        <h1><?php echo get_the_title(); ?></h1><?php 
				        the_content();
				        if($_slider_text!=""&&$_slider_url!=""){
				        	echo '<a class="btn-v3 pull-left margin-top-8 text-uppercase font-weight-600" href="'.$_slider_url.'">'.$_slider_text.'</a>'; 
						}					
			        	?>
				        
				    </div>
					<img src="<?php echo $feat_image_url; ?>"> 
				</div>
				<?php $cnt++;
			}
		} 
		wp_reset_postdata(); 

		
	?>
</div>

<!-- #Container Area -->
<div id="container">
	<div style="background:#ffffff;">
		<div class="homepagelead">
			<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>
				<div class="page_cont">
					<?php the_content(); ?>
				</div>
			<?php endwhile; ?>
			<?php else : ?>
			<?php endif; ?>
		</div>
	</div>

	

	<div class="doorWidget animated_glass padding-top-10 padding-bottom-10">
		<div class="container">
			<?php if (function_exists('z_taxonomy_image_url')) echo z_taxonomy_image_url(); ?> 
			<?php category_listing(); ?>
		</div>
	</div>

	<!-- <div class="padding-top-20 padding-bottom-8">
	  <div class="container">
	    <div class="row">
	      <div class="col-md-24"><a class="btn-v2 pull-right" href="<?php echo site_url(); ?>/get-started">Build Your  Shower Door</a></div>
	    </div>
	  </div>
	</div> -->

	<?php pages_link_section(); ?>

	<div class="home_banner_dfi">
	  <div class="container">
		<div class="row"><!-- row -->
		  <div class="col-md-12 home_left_services">
		    <div class="homepage_middle_container padding-top-20 padding-bottom-10">
			  <div class="row">
				<?php meta_bxx_section1(); ?>
			  </div>
			</div>
		    <div class="bottom_shadow"><img src="<?php bloginfo('template_url'); ?>/images/shadow_bottom.png" /></div>
		  </div>
		</div>

		<div class="row"><div class="col-md-12"></div> </div><!-- row icons -->

		<div class="row"><!-- row -->
		  <div class="col-md-12">
		   <div class="homepage_middle_container align-center padding-top-30 padding-left-50 padding-right-50 padding-bottom-30 margin-top-0">
				<?php meta_bxx_section2(); ?>
		   </div>
		   <div class="bottom_shadow"> <img src="<?php bloginfo('template_url'); ?>/images/shadow_bottom.png" alt="test" /> </div>
		  </div>
		</div>
	  </div>
	</div>


<?php testiominal_code();  ?>
	

</div>

<!-- #Container Area -->

<?php get_footer("home"); ?>