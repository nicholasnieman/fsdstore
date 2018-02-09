<?php
    $url = $_SERVER['REQUEST_URI'];
    if($url == "/" || $url == '/installation-guide/'){
        echo do_shortcode('[geo_home]');
    }
    /*Template Name: Page with sidebar*/
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
		           		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('link Section Images') ) :
		           		endif; 
		           	?>

		           	<?php //get_sidebar(); ?>
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