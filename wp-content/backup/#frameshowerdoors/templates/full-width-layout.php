<?php
/*Template Name: full width layout*/

	//get_header();

	get_header( 'inner' );

?>	

<?php global $frame_breadcumb;?>



		<div id="mwrapbg">
		  <div id="mbar">
		    <div id="mwrap">
		      <div id="main" >
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
			        <?php wp_reset_query(); ?>
			      		<?php if(have_posts()) : ?>
   						<?php while(have_posts()) : the_post(); ?>
   							<div class="page_cont">
   								<?php the_content(); ?>
   							</div>
   						<?php endwhile; ?>
   						<?php else : ?>
   						<?php endif; ?>
			         <div class="clear"></div>
			        </div>
		        </div>
		      </div>
		    </div>
		  </div>
		</div>
		
<?php

get_footer();

?>