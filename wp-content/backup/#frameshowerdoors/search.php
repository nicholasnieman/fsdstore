<?php get_header( 'inner' ); ?>


<?php global $frame_breadcumb;?>
<!-- #Container Area -->
<div id="mwrapbg">
  	<div id="mbar">
   		 <div id="mwrap">
      		<div id="main">
        		<div id="main-header">
					<h2> <?php the_title(); ?> </h2>
					<div id="buying-guide"><a href="<?php bloginfo('url'); ?>/buying-guide/">Buying Guide</a></div>
					<div id="need-help"><a href="<?php bloginfo('url'); ?>/contact/">Need Help?</a></div> </div>
		            <!-- <div class="breadcrumbs">
						<ul>
							<li class="home">
								<a title="Go to Home Page" href="<?php bloginfo('url'); ?>/"><?php the_title(); ?></a>
							<span>/ </span>
							</li>
							
							<li class="cms_page">
								<?php 
									if ((class_exists('frame_breadcrumb_class'))) {$frame_breadcumb->custom_breadcrumb();}
								?>
							</li>
						</ul>
					</div> -->
		       		
					<!-- Get Post Loop -->
					<?php get_template_part('loop','post'); ?>
					<!-- /Get Post Loop -->
				</div>
   			 </div>
  		</div>
  	</div>
</div>
<?php get_footer(); ?>