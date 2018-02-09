<?php
/*Template Name: Glass Option*/

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
	            <div class="breadcrumbs">
					<ul>
						<li class="cms_page">
							<?php 
								if ((class_exists('frame_breadcrumb_class'))) {$frame_breadcumb->custom_breadcrumb();}
							?>
						</li>
					</ul>
				</div>
					 
		        <div class="main50">		       
		        	<?php  $args = array( 'post_type' => 'Glass', 'posts_per_page' => -1, 'order' => 'ASC' );
					$loop = new WP_Query( $args );					
					while ( $loop->have_posts() ) : $loop->the_post(); ?>
				    <div id="glassGal" class="page_cont">				    	
				    	<?php if ( has_post_thumbnail()) : ?>
				    	<ul>
				    		<?php   $full_width_img_url = get_field('_full_width_image') ?>
				    		<li><a class="glass-fancy-box" rel="glass-option" href="<?php echo  $full_width_img_url ?>" title="<?php the_title_attribute(); ?>" >
							<?php the_post_thumbnail('featured-home-thumb'); ?>
							</a>
							<?php endif; ?>
							<?php the_title(); ?></li>
				    	</ul>
					</div>
					<?php endwhile; ?>
		         	<div class="clear"></div>
		        </div>
		        </div>
		      </div>
		    </div>
		  </div>
		
<?php

get_footer();

?>