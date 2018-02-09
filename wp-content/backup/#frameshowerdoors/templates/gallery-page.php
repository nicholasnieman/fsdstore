<?php
/*Template Name: Gallary page*/

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
					<div id="buying-guide"><a href=" <?php bloginfo('url'); ?>/buying-guide/">Buying Guide</a></div>
					<div id="need-help"><a href=" <?php bloginfo('url'); ?>/contact/">Need Help?</a></div> 
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
					 
		        
                [robo-gallery id="11937"]
                
		        </div>
		      </div>
		    </div>
		  </div>
<?php

get_footer();

?>