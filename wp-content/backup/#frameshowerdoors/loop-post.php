
<div class="mains col-md-12 page-content doorWidget animated_glass doorbuilder">
	 <div class="twoColbg">
	 		
		<?php if(is_category()) { ?>
		<h3 class="blog-post-title">
			<?php// printf( __( 'Category Archives: %s', 'twentyten' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?>
		</h3>
		<?php } elseif(is_author()) { ?>
		<?php  $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
		<h3 class="blog-post-title author">
			<?php echo "Author Archives: "; echo $curauth->display_name;  ?>
		</h3>
		<?php } elseif(is_archive()) { ?>
		<!-- <h3 class="blog-post-title">
			<?php if ( is_day() ) : ?>
				<?php printf( __( 'Daily Archives: <span>%s</span>', 'twentyten' ), get_the_date() ); ?>
			<?php elseif ( is_month() ) : ?>
				<?php printf( __( 'Monthly Archives: <span>%s</span>', 'twentyten' ), get_the_date('F Y') ); ?>
			<?php elseif ( is_year() ) : ?>
				<?php printf( __( 'Yearly Archives: <span>%s</span>', 'twentyten' ), get_the_date('Y') ); ?>
			<?php else : ?>
				<?php _e( 'Blog Archives', 'twentyten' ); ?>
			<?php endif; ?>
		</h3> -->
		<?php } elseif(is_tag()) { ?>
		<h3 class="blog-post-title">
			<?php if ( is_day() ) : ?>
				<?php printf( __( 'Daily Archives: <span>%s</span>', 'twentyten' ), get_the_date() ); ?>
			<?php elseif ( is_month() ) : ?>
				<?php printf( __( 'Monthly Archives: <span>%s</span>', 'twentyten' ), get_the_date('F Y') ); ?>
			<?php elseif ( is_year() ) : ?>
				<?php printf( __( 'Yearly Archives: <span>%s</span>', 'twentyten' ), get_the_date('Y') ); ?>
			<?php else : ?>
				<?php _e( 'Blog Archives', 'twentyten' ); ?>
			<?php endif; ?>
		</h3>
		<?php } elseif(is_search()) { ?>
		<h3 class="blog-post-title">
			<?php printf( __( 'Search Results for: %s', 'twentyten' ), '<span>' . get_search_query() . '</span>' ); ?>
		</h3>
		<?php } ?>
			<?php $loop=new WP_Query( array('order' => 'ASC'));
			if($loop->have_posts()) : ?>
			<?php while($loop->have_posts()) : $loop->the_post(); ?>
			<?php $thumbnail_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>

			<div id="post_<?php the_ID(); ?>" class="post">
				<h2 class="entry-title">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> <?php the_title(); ?> </a>
				</h2>

				<div class="post_meta_data">
					<span class="meta_date"><?php the_time('F jS, Y') ?> </span>
					<span class="meta_category"><?php the_category(', '); ?> </span>
					<span class="meta_tag"><?php the_tags(', '); ?>  </span>
					<span class="meta_author"> <?php the_author_posts_link(); ?> </span>
					<!-- <span class="meta_comment"> <?php comments_popup_link('No Comments ', '1 Comment ', '% Comments: ') ; ?> </span> -->
				   
					<!-- <span class="edit_post_link"><?php edit_post_link('Edit','|','') ; ?></span>  -->
				</div>

				<div class="entry">

					<?php echo improved_featured_image(); echo $thumbnail_image ;?>
					<div class="blog-excerpt">
						<?php 
							the_excerpt();
		
						//link_pages('<p><strong>Pages:</strong> ', '</p>', 'number');
						?>
					</div>
					<?php $classes = get_body_class();
					if( in_array('blog',$classes) ){
					?>
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
					<? } ?>
					
				</div>
				<div class="comments-link">
					<a href="<?php the_title();?>">Leave a comment</a>	
				</div>
				<div class="comments-template">
					<?php// comments_template(); ?>
				</div>
			</div>

			<?php endwhile; ?>

			<?php else : ?>
			<div class="post not-found-post"><h2><?php _e('Apologies but the page you requested could not be found!'); ?></h2></div>
			<?php endif; ?>
		</div>			
    </div>
</div>
