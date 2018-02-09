<?php
/*Template Name: Why-fsd with sidebar*/

	//get_header();

	get_header( 'inner' );

?>

<?php global $frame_breadcumb;?>

	<div id="mwrapbg">
	  <div id="mbar">
	    <div id="mwrap">
	      <div id="main">
	      	<div id="main-header">
	      		<?php  $page_title=get_field('_page_title');
	      			if($page_title!=''){
	      				echo '<h2>'. $page_title.'</h2>';
	      			}
	      			else{
	      				echo '<h2>'. get_the_title().'</h2>';
	      			}
	      		 ?>
				
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

	        <div class="mains">
	            <div class="twoColbg">
		            <div class="col-main">
           				<?php if(have_posts()) : ?>
   						<?php while(have_posts()) : the_post(); ?>
   							<div class="page_cont">
   								<?php the_content(); ?>
   							</div>
   						<?php endwhile; ?>
   						<?php else : ?>
   						<?php endif; ?>
		           						
		            </div>
		            <div id="snav">
		           	<?php
		           		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Why FSD Layout') ) :
		           		endif; 
		           	?>
		            </div>

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