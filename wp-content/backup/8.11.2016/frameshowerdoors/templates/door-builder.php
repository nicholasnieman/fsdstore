<?php
/*Template Name: Door Builder*/

	//get_header();

	get_header();

?>

<?php global $frame_breadcumb;?>

<!-- #Container Area -->

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
<div class="container">
	<div class=""> <!-- row -->
		<div style="background: rgb(239, 254, 255) none repeat scroll 0px 0px;padding:0;margin-bottom:30px;" class="col-md-12">
			
			<?php wp_reset_query(); ?>
	      		<?php if(have_posts()) : ?>
					<?php while(have_posts()) : the_post(); ?>
			<div class="col-md-12">
				<?php the_content(); ?>
			</div>
			<?php endwhile; ?>
				<?php else : ?>
				<?php endif; ?>	
		</div>
		
	</div>
</div>
	

<?php testiominal_code();  ?>

<?php pages_link_section(); ?>



	


		
<?php get_footer("home"); ?>