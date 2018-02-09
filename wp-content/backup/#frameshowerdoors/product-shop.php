<?php
 	get_header( 'inner' ); 
	global $frame_breadcumb;
	global $post;
?>

<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.breadcrumbs li .cont_nav_inner .skt-breadcrumbs-separator').after("<span>Store</span>");
	});
</script>
<!-- #Container Area -->


<?php
$wcatTerms = get_terms('product_cat',
		array(
			'hide_empty' => false,
			'orderby' => 'name',
			'parent' => 0,
		)
	);
	$term_arr = array();
	foreach($wcatTerms as $wcatTerm){
		$t_id = $wcatTerm->term_id;
		$variable = get_field('_is_bundled_cat', 'product_cat_'.$t_id);
		if(!$variable == 'Yes'){
			$term_arr[$wcatTerm->term_id] = $wcatTerm->term_id;
		}
	
	}

?>
	<div id="mwrapbg">
	  <div id="mbar">
	    <div id="mwrap">
	      <div id="main">
	        <div id="main-header">
	            <h2> Store </h2>
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
                        <div id="item-list" class="page_cont">
                        	<ul class="even">
                        	<?php //woocommerce_content(); 

                        		$wcatTerms = get_terms(
                        		  'product_cat',
                        		  array('hide_empty' => 0, 'orderby'  => 'name', 'order'   => 'ASC', 'parent'   => 0, 'exclude'  => array(66, 99, 98, 102, 92, 100, 93, 101, 89, 91, 88, 87, 86, 84, 319, 322, 325) )
                        		);
                        		foreach($wcatTerms as $wcatTerm){ 
                        			$thumbnail_id = get_woocommerce_term_meta( $wcatTerm->term_id, 'thumbnail_id', true );
                        			$image = wp_get_attachment_url( $thumbnail_id );
                        		echo '<li>
                        		  	<a id="cat-id-'.$wcatTerm->term_id.'" href="'.get_term_link( $wcatTerm->slug, $wcatTerm->taxonomy ).' ">
                        		  		<img width="150" height="150" alt="" src="'.$image.'">
                        		   		<strong>'.$wcatTerm->name.'</strong>
                        		   		<span style="background-color: rgb(86, 163, 169);">View More Info</span>
                        		   	</a>
                        		  </li>'; 
                        		}


                        	?>
                        	</ul>
                        </div>                
	                </div>

	                <div id="snav">
	                  <div id="snav">
	                    <div class="gift-special widget-container widget_nav_menu" id="nav_menu-8">
	                      <h3 class="section_heading widget-title">Category</h3>
	                      <div class="menu-why-fsd-container">
	                        <ul class="menu" id="menu-why-fsd">

	                        

	                          <?php
	                            $wcatTerms = get_terms(
	                              'product_cat',
	                              array('hide_empty' => 0, 'orderby'  => 'name', 'order'   => 'ASC', 'parent'   => 0, 'exclude'  => array(66, 99, 98, 102, 92, 100, 93, 101, 89, 91, 88, 87, 86, 84) )
	                            );
	                            foreach($wcatTerms as $wcatTerm){ 
	                              echo '<li> <a id="cat-id-'.$wcatTerm->term_id.'" href="'.get_term_link( $wcatTerm->slug, $wcatTerm->taxonomy ).' "> '.$wcatTerm->name.'</a> </li>'; 
	                            }
	                          ?>
	                          </ul>
	                        </div>
	                      </div>                
	                    </div>
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