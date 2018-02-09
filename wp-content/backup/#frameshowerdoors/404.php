<?php get_header( 'inner' ); ?>

<!-- #Container Area -->
<div id="mwrapbg">
  	<div id="mbar">
   		 	<div id="mwrap">
      			<div id="main">
      				<div id="main-header">
						<h2> 404 Not Found 1 </h2>
						<div id="buying-guide"><a href="<?php bloginfo('url'); ?>/buying-guide/">Buying Guide</a></div>
						<div id="need-help"><a href="<?php bloginfo('url'); ?>/contact/">Need Help?</a></div> 
			      	</div>
			        <div class="mains">
			         	<div class="twoColbg">
			           		<div class="col-main">
								<div class="post-404 post">
									<h2 class="entry-title"> <?php _e('Apologies but the page you requested could not be found!'); ?> </h2>
									<div class="entry entry_not_found"></div>
								</div>
							</div>
						</div>
					</div>
					<div id="snav">
		           	<?php
		           		/*if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('link Section Images') ) :
		           		endif;*/ 
		           	?>

		           	<?php //get_sidebar(); ?>
		           </div>
		          <div class="clear"></div>
			</div>
		</div>
	</div>
</div>


<?php get_footer(); ?>