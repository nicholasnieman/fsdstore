<?php get_header( ); ?>


<?php global $frame_breadcumb;?>
<?php $classes = get_body_class();
 ?>
<!-- #Container Area -->
    <div class="container">
        <div class="page_header_inner"> <!-- row -->
			<div class="heading-left">
				<h2>
					<?php 
					
					if(in_array('single',$classes)){
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
					if(in_array('single',$classes)){ ?>
						<li class="home"> <a title="Go to Home Page" href=" <?php bloginfo('url'); ?>">Home </a> <span> / </span> </li>
						<li class="cms_page"> <?php echo ' Blog| The Original Frameless Shower Doors '; ?> </li> <?php
					}else{ ?>
						<li class="home"> <a title="	Go to Home Page" href="<?php bloginfo('url'); ?>"><?php the_title(); ?></a> <span>/ </span> </li>
						<li class="cms_page"> <?php if ((class_exists('frame_breadcrumb_class'))) {$frame_breadcumb->custom_breadcrumb();} ?> </li><?php
					}
					?>
					
				</ul>
			</div>
       
			<div class="mains col-md-12 page-content doorWidget animated_glass doorbuilder">
				<div class="twoColbg">
	 				<?php if(have_posts()) : ?>
	 				<?php while(have_posts()) : the_post(); ?>
	 				<div <?php post_class('single-post-listing'); ?> id="post_<?php the_ID(); ?>">
	 					<div class="post-tile clearfix">
	 						<div class="entry-title">
	 							<h2><?php the_title(); ?> </h2>
	 						</div>
	 						<div class="post_meta_data">
								<span class="meta_date"><?php the_time('F jS, Y') ?> </span>
								<span class="meta_category"><?php the_category(','); ?> </span>
								<span class="meta_tag"><?php the_tags(', '); ?>  </span>
								<span class="meta_author"> <?php the_author_posts_link(); ?> </span>
								<!-- <span class="meta_comment"> <?php comments_popup_link('No Comments ', '1 Comment ', '% Comments: ') ; ?> </span> -->
							   
								<!-- <span class="edit_post_link"><?php edit_post_link('Edit','|','') ; ?></span>  -->
							</div>
	 					</div>
	 					<div class="entry">
	 						<?php
		 						improved_featured_image();
		 						the_content();
	 						?>
	 					</div>
	 					<div class="sfsi_plus_Sicons"> 
							<ul>
								<li><strong>Please follow and like us:</strong></li>
								<li class="follow-us"><a href="" target="_blank"><img src="<?php bloginfo( 'template_directory' );?>/images/index.png" /></a></li>
								<li class="sfb blue-icon"><a href="http://www.facebook.com/share.php?u=[<?php the_permalink(); ?>]&title=[<?php echo get_the_title(); ?>]" target="_blank"><i class="fa fa-facebook-square"></i><span> Like</span></a></li>
								<li class="share blue-icon"><a href="" target="_blank"><span>Share</span></a></li>
								<li class="stweet"><a href="http://twitter.com/intent/tweet?status=[<?php echo get_the_title(); ?>]+[<?php the_permalink(); ?>]" target="_blank"><i class="fa fa-twitter"></i><span> Tweet</span></a></li>
								<li class="spin gray-border" style="padding:1px 5px"><a href="http://pinterest.com/pin/create/bookmarklet/?media=[MEDIA]&url=[<?php the_permalink(); ?>]&is_video=false&description=[<?php echo get_the_title(); ?>]" target="_blank"><span>P<em>in it</em></span></a></li>
								<li class="gplus gray-border"> <a href="https://plus.google.com/share?url=[<?php the_permalink(); ?>]" target="_blank" ><span>G+1</span></a></li>
							</ul>
						</div>
	 					
	 				</div>
	 				<?php endwhile; ?>
	 				<?php endif; ?>		
				</div>
				<div class="next-post-link">
					<h1>Post navigation</h1>
					<?php previous_post_link(); ?>&nbsp;<?php  next_post_link(); ?>	
				 </div>
      	</div>

      		
 </div> 

<?php get_footer("home"); ?>
