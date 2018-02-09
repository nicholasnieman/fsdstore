<?php
/*Template Name: hardware finishes*/

	//get_header();

	get_header();

?>	

<?php global $frame_breadcumb;?>

	<div id="container">
		      	
  		<div class="mwrap">
  		    <div class="container">
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
  			</div>
  		</div>
					 
        <div class="container atribut-preety-effect">

	        <ul class="thumbnail">
	        	 <?php  $args = array( 'post_type' => 'hardwrfinish', 'posts_per_page' => -1 ,'order'=>'ASC');
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post(); ?>
			    <li id="finishList" class="page_cont col-md-4">				    	
			    	<?php if ( has_post_thumbnail()) : ?>
			    		<?php $src= wp_get_attachment_url(get_post_thumbnail_id()); ?>
			    		<a rel="<?php echo $src; ?>" class="screenshot" href="javascript:void(0)" title="<?php the_title_attribute(); ?>" >
							<img src="<?php echo $src; ?>" />
						</a>
						<?php endif; ?>
				<?php the_title(); ?>
			   	</li> 	
				<?php endwhile; ?>
         	</ul>
        </div>
  </div>
		
<?php

get_footer("home");

?>