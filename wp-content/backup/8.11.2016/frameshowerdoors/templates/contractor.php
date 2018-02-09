<?php
/*Template Name: Contractor*/

	//get_header();

	get_header();

?>

<?php global $frame_breadcumb;?>

<!-- #Container Area -->
<div id="container">
	<div class="mwrap">
	    <div class="container">
		   	<div id="main-header">
				<h2><?php the_title();?></h2>
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
	<div class="container contractor-page">
		 <?php wp_reset_query(); ?>
  		<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>
		
				<?php the_content(); ?>
	
		<?php endwhile; ?>
		<?php else : ?>
		<?php endif; ?>
		
		<section id="btm-green">
			<div id="dt-selector">	
				<ul>
					<?php

					$wcatTerms = get_terms(
						'product_cat',
						array(
							'hide_empty' => 0,
							'orderby'	 => 'name',
							'order'   => 'ASC',
							'parent'	 => 0,
							'include'	 => array(98, 92, 102, 93,)
						)
					);
		
					$html = '';
					foreach($wcatTerms as $wcatTerm){
						
						$t_id = $wcatTerm->term_id;
						$variable = get_field('_category_image', 'product_cat_'.$t_id);
						$thumbnail_id = get_woocommerce_term_meta( $wcatTerm->term_id, 'thumbnail_id', true );
						$image = wp_get_attachment_url( $thumbnail_id );
						$cat_name = $wcatTerm->name;

						if($t_id == 92){
							$newcat_name = 'Frameless Shower Doors';
						}
						else if($t_id == 93){
							$newcat_name = 'Frameless Sliding Shower Doors';
						}
						else {
							$newcat_name=$cat_name;
						}

							echo $html = '
							<li>
															
								<a id="cat-id-'.$wcatTerm->term_id.'" href="'.get_term_link( $wcatTerm->slug, $wcatTerm->taxonomy ).'" class="btn-v inline align-center"><strong>'.$newcat_name.' </strong><img src="'.$image.'" /></a>
							</li>';
					
					}
						echo $html = '
						<li>
							<a href="'.site_url().'/shower-door-frameless-steam-units" class="btn-v inline align-center"><strong>Frameless Steam Units</strong> <img src="'.get_template_directory_uri().'/images/new-3D-steam.gif" /> </a>
						</li>';
					?>
					</ul>
			</div>
		</section>

	</div>
</div>

	<?php testiominal_code();  ?>

	<?php pages_link_section(); ?>


</div>


	


		
<?php get_footer("home"); ?>