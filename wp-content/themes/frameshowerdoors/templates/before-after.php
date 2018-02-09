<?php
/*Template Name: Before After*/

	//get_header();

	get_header( 'inner' );

?>	
<?php global $frame_breadcumb;?>

	<div id="mwrapbg">
	  <div id="mbar">
	    <div id="mwrap">
	      <div id="main">
	      	<div id="main-header">
				<h2> <?php the_title();?> </h2>
				<div id="buying-guide"><a href="<?php bloginfo('url'); ?>/buying-guide/">Buying Guide</a></div>
				<div id="need-help"><a href="<?php bloginfo('url'); ?>/contact/">Need Help?</a></div> 
	      	</div>
            <!-- <div class="breadcrumbs">
				<ul>
					<li class="cms_page">
						<?php 
							//if ((class_exists('frame_breadcrumb_class'))) {$frame_breadcumb->custom_breadcrumb();}
						?>
					</li>
				</ul>
			</div>	--> 				
	        	<?php  $args = array( 'post_type' => 'gallery', 'posts_per_page' => 10, 'p' => 1227 );
				$loop = new WP_Query( $args );
				?>
				
	        <div class="main50">
	        	<?php
				while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<div id="b4Note">Hover an image to see the before</div>	
			    <div id="galslider1" class="b4afterWrap">
			    	<h2><?php the_title(); ?></h2>
			    	<a class="shop-now btn-sm" href="<?php echo site_url(); ?>/get-started">Shop Now</a>
					<div class="b4as">
			    		<?php $gallery_images = get_field('_before_after_uploader'); 
				    	
				    	foreach ($gallery_images as $gallery_images_value) { ?>
				    		<div class="item"><a title="<?php the_title_attribute(); ?>" >				    			
								<img class= "before" src="<?php echo $gallery_images_value['before_image']['url'] ?>">
								<img class= "after" src="<?php echo $gallery_images_value['_after_image']['url'] ?>"> 
								<span>
									<em>B</em>
									<i>A</i>
								</span> 
							</a>
							</div>

						<?php } ?>
				    	
			    	</div>
				</div>
				<div class="fclear22"></div>
				<?php endwhile; ?>
	         	<div class="clear"></div>
	        	</div>
	        </div>
	      </div>
	    </div>
	</div>

<?php get_footer(); ?>