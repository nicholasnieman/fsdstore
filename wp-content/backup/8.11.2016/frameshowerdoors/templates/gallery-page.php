<?php
/*Template Name: Gallery page*/

	//get_header();

	get_header( );

?>	

<?php global $frame_breadcumb;?>

<div style="background:#fff;" class="">

	<div class="container">

		<div class=""> <!-- row -->

			<div class="col-md-12 page-content why-fsd padding-bottom-50">

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

</div>

<div class="about-DFI-footer">
	<?php  
		testiominal_code();
		pages_link_section();
	?>
</div>

<?php

get_footer('home');

?>