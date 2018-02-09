



<?php get_header( ); ?>


<?php global $frame_breadcumb;?>
<!-- #Container Area -->
<?php $classes = get_body_class(); ?>
      <div class="container">

       
	        <div class="page_header_inner"> 
				<div class="heading-left">
					<h2>
						<?php 
						
						if(in_array('blog',$classes)){
							echo 'Blog';
						}else{
							the_title(); 
						}
						?>
					</h2>
				</div>
				<div class="two-btn">
					<div id="buying-guide"><a href="<?php bloginfo('url'); ?>/buying-guide/">Buying Guide</a></div>
				</div>
				<div class="two-btn">
					<div id="need-help"><a href="<?php bloginfo('url'); ?>/contact/">Need Help?</a></div>
				</div>
			</div>

            <div class="breadcrumbs">
				<ul>
					<?php
						if(in_array('blog',$classes)){ ?>
							<li class="home"> <a title="Go to Home Page" href="<?php bloginfo('url'); ?>">Home </a> <span> / </span> </li>
							<li class="cms_page"> <?php echo 'Blog| The Original Frameless Shower Doors '; ?> </li> <?php
						}else{ ?>
							<li class="home"> <a title="	Go to Home Page" href="<?php bloginfo('url'); ?>"><?php the_title(); ?></a> <span>/ </span> </li>
							<li class="cms_page"> <?php if ((class_exists('frame_breadcrumb_class'))) {$frame_breadcumb->custom_breadcrumb();} ?> </li><?php
						}
					?>
				</ul>
			</div>
       
			<div class="mains col-md-12 page-content doorWidget animated_glass doorbuilder">
				 <div class="twoColbg">
	 				<!-- Get Post Loop -->
	 				<?php get_template_part('loop','post'); ?>
	 				<!-- /Get Post Loop -->
			 	</div>	 

	      	</div>
  

<?php get_footer("home"); ?>