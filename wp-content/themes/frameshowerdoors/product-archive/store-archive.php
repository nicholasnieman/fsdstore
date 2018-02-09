<?php
 	get_header( 'inner' ); 
	global $frame_breadcumb;
	global $post;		
	$subcatarr = subct_product_ids($cat_id);
	
?>
<script type="text/javascript">
	jQuery(document).ready(function(){
		var cat_nm = '<?php echo $cat_nm; ?>';
		jQuery('.breadcrumbs li .cont_nav_inner .skt-breadcrumbs-separator').after('<span>'+cat_nm+'</span>');
	});
</script>

<div id="mwrapbg">
  	<div id="mbar">
    	<div id="mwrap">
      		<div id="main">


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
                    <div class="row"></div>
                    <div class="col-sm-4 col-md-col-4">

                        <div id="snav">
                            <div id="snav">
                                <div class="gift-special widget-container widget_nav_menu" id="nav_menu-8">
                                    <h3 class="section_heading widget-title">Category</h3>
                                    <div class="menu-why-fsd-container">
                                        <ul class="menu" id="menu-why-fsd">
                                            <?php
                                            $wcatTerms = get_terms(
                                                'product_cat',
                                                array('hide_empty' => 0, 'orderby'  => 'ID', 'parent'   => 0, 'include'  => array(76, 75, 79, 85, 73, 77, 72, 83, 81, 82, 252) )
                                            );
                                            foreach($wcatTerms as $wcatTerm){
                                                if($cat_id == $wcatTerm->term_id){
                                                    echo '<li class="active"> <a id="cat-id-'.$wcatTerm->term_id.'" href="'.get_term_link( $wcatTerm->slug, $wcatTerm->taxonomy ).' "> '.$wcatTerm->name.'</a> </li>';
                                                }
                                                else{
                                                    echo '<li> <a id="cat-id-'.$wcatTerm->term_id.'" href="'.get_term_link( $wcatTerm->slug, $wcatTerm->taxonomy ).' "> '.$wcatTerm->name.'</a> </li>';
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-8 col-md-col-8">
                        <div class="page-title category-title">
                            <h2 class="steps-header"><?php echo $cat_nm; ?></h2>
                        </div>
                        <div class="page_cont category-products">
                            <ul class="products-grid">
                                <?php
                                $args = array(
                                    'post_type' => 'product',
                                    'post_status' => 'publish',
                                    'posts_per_page' => -1,
                                    'post__not_in' => $subcatarr,
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'product_cat',
                                            'field' => 'id',
                                            'terms' => $cat_id
                                        )
                                    ),
                                    'meta_query' => array(
                                        array('key'     => 'tinfini_storemetabox', 'value'   => 'on', 'compare' => '=', ),
                                    ),
                                );
                                $query = new WP_Query($args);

                                while ($query->have_posts()) :
                                    $query->the_post();
                                    $main_pro_id =  get_the_id();
                                    $pro_title =  get_the_title();
                                    $pro_permlink =  get_permalink();
                                    $store_grp = get_field('_store_group', $main_pro_id );
                                    $main_pro_id.'->'.$store_grp.'<br/>';
                                    if($store_grp){
                                        $inner_args = array(
                                            'posts_per_page' => -1,
                                            'orderby' => 'rand',
                                            'post_type' => 'product',
                                            'post_status' => 'publish',
                                            'tax_query' => array(
                                                array('taxonomy' => 'product_cat', 'field'    => 'id', 'terms'    => $cat_id, ),
                                                array('taxonomy' => 'product_store', 'field'    => 'term_id', 'terms'    => $store_grp, ),
                                            ),
                                        );
                                        $inner_query = new WP_Query($inner_args);
                                        $price_cal = array();

                                        if ( $inner_query->have_posts() ) {
                                            while ($inner_query->have_posts()) :

                                                $inner_query->the_post();
                                                $cur_tag_id = get_the_ID();
                                                if($main_pro_id != $cur_tag_id){
                                                    $price_cal[$cur_tag_id] = get_post_meta($cur_tag_id, '_price' , true);
                                                }

                                            endwhile;
                                        }
                                        wp_reset_postdata();

                                        $show_product_id = array_search (min( $price_cal), $price_cal);
                                        $min_price = min( $price_cal);
                                        $price_meta = get_post_meta($show_product_id, '_price' , true);
                                        $price_meta = number_format($price_meta, 2, '.', '');
                                        $image_url  = wp_get_attachment_image_src( get_post_thumbnail_id( $show_product_id ) , 'full' );
                                        ?>
                                        <li class="item first last odd">
                                            <a class="product-image" title="<?php echo $pro_title; ?>" href="<?php echo $pro_permlink; ?>">
                                                <img width="150" height="150" src="<?php echo $image_url[0]; ?>" data-animated="<?php echo $feat_image_url; ?>">
                                            </a>
                                            <h2 class="product-name">
                                                <a title="<?php echo $pro_title; ?>" href="<?php echo $pro_permlink; ?>">
                                                    <?php echo $pro_title; ?>
                                                </a>
                                            </h2>

                                            <div class="actions">
                                                <a title="<?php echo $pro_title; ?>" class="single_add_to_cart_button button alt" href="<?php echo $pro_permlink; ?>">Add to cart</a>
                                                <!-- <button data-product_id="<?php echo $main_pro_id; ?>" class="single_add_to_cart_button button alt" type="submit"></button> -->

                                            </div>
                                        </li>
                                        <?php
                                        // $query->reset_postdata();
                                    }
                                    else{
                                        $price_meta = get_post_meta($main_pro_id, '_price' , true);
                                        $price_meta = number_format($price_meta, 2, '.', '');
                                        $image_url  = wp_get_attachment_image_src( get_post_thumbnail_id( $main_pro_id ) , 'full' );
                                        ?>
                                        <li class="item first last odd">
                                            <a class="product-image" title="<?php echo $pro_title; ?>" href="<?php echo $pro_permlink; ?>">
                                                <img width="150" height="150" src="<?php echo $image_url[0]; ?>" data-animated="<?php echo $feat_image_url; ?>">
                                            </a>
                                            <h2 class="product-name">
                                                <a title="<?php echo $pro_title; ?>" href="<?php echo $pro_permlink; ?>">
                                                    <?php echo $pro_title; ?>
                                                </a>
                                            </h2>

                                            <div class="actions">
                                                <form enctype="multipart/form-data" method="post" class="cart">
                                                    <input type="hidden" value="<?php echo $main_pro_id; ?>" name="add-to-cart">
                                                    <button data-product_id="<?php echo $main_pro_id; ?>" class="single_add_to_cart_button button alt" type="submit">Add to cart</button>
                                                </form>

                                            </div>
                                        </li>
                                        <?php
                                    }
                                endwhile;
                                wp_reset_postdata();
                                ?>
                            </ul>
                            <?php
                            if ( has_term_have_children( $cat_id ) ) {
                                $wsub_subargs = array(
                                    'hierarchical' => 1,
                                    'show_option_none' => '',
                                    'hide_empty' => false,
                                    'parent' => $cat_id,
                                    'taxonomy' => 'product_cat',
                                    'order' => 'ASC'
                                );
                                $wsub_subcats = get_categories($wsub_subargs);

                                foreach ($wsub_subcats as $catskey => $catsvalue) {

                                    $subcat_title = $catsvalue->name;

                                    ?>

                                    <div class="page-title category-title">
                                        <h2 class="steps-header"><?php echo $subcat_title; ?></h2>
                                    </div>


                                    <ul class="products-grid">
                                        <?php

                                        $args = array(
                                            'post_type' => 'product',
                                            'post_status' => 'publish',
                                            'posts_per_page' => -1,
                                            'tax_query' => array(
                                                array(
                                                    'taxonomy' => 'product_cat',
                                                    'field' => 'id',
                                                    'terms' => $catsvalue->term_id
                                                )
                                            ),
                                            'meta_query' => array(
                                                array('key'     => 'tinfini_storemetabox', 'value'   => 'on', 'compare' => '=', ),
                                            ),
                                        );
                                        $query = new WP_Query($args);

                                        while ($query->have_posts()) :
                                            $query->the_post();
                                            $main_pro_id =  get_the_id();
                                            $pro_title =  get_the_title();
                                            $pro_permlink =  get_permalink();
                                            $store_grp = get_field('_store_group', $main_pro_id );
                                            //echo $main_pro_id.'->'.$store_grp.'<br/>';
                                            if($store_grp){
                                                $inner_args = array(
                                                    'posts_per_page' => -1,
                                                    'orderby' => 'rand',
                                                    'post_type' => 'product',
                                                    'post_status' => 'publish',
                                                    'tax_query' => array(
                                                        array('taxonomy' => 'product_cat', 'field'    => 'id', 'terms'    => $cat_id, ),
                                                        array('taxonomy' => 'product_store', 'field'    => 'term_id', 'terms'    => $store_grp, ),
                                                    ),
                                                );
                                                $inner_query = new WP_Query($inner_args);
                                                $price_cal = array();

                                                if ( $inner_query->have_posts() ) {
                                                    while ($inner_query->have_posts()) :

                                                        $inner_query->the_post();
                                                        $cur_tag_id = get_the_ID();
                                                        if($main_pro_id != $cur_tag_id){
                                                            $price_cal[$cur_tag_id] = get_post_meta($cur_tag_id, '_price' , true);
                                                        }

                                                    endwhile;
                                                }
                                                wp_reset_postdata();

                                                $show_product_id = array_search (min( $price_cal), $price_cal);
                                                $min_price = min( $price_cal);
                                                $price_meta = get_post_meta($show_product_id, '_price' , true);
                                                $price_meta = number_format($price_meta, 2, '.', '');
                                                $image_url  = wp_get_attachment_image_src( get_post_thumbnail_id( $show_product_id ) , 'full' );
                                                ?>
                                                <li class="item first last odd">
                                                    <a class="product-image" title="<?php echo $pro_title; ?>" href="<?php echo $pro_permlink; ?>">
                                                        <img width="150" height="150" src="<?php echo $image_url[0]; ?>" data-animated="<?php echo $feat_image_url; ?>">
                                                    </a>
                                                    <h2 class="product-name">
                                                        <a title="<?php echo $pro_title; ?>" href="<?php echo $pro_permlink; ?>">
                                                            <?php echo $pro_title; ?>
                                                        </a>
                                                    </h2>

                                                    <div class="actions">
                                                        <a title="<?php echo $pro_title; ?>" class="single_add_to_cart_button button alt" href="<?php echo $pro_permlink; ?>">Add to cart</a>
                                                        <!-- <button data-product_id="<?php echo $main_pro_id; ?>" class="single_add_to_cart_button button alt" type="submit"></button> -->

                                                    </div>
                                                </li>
                                                <?php
                                                // $query->reset_postdata();
                                            }
                                            else{
                                                $price_meta = get_post_meta($main_pro_id, '_price' , true);
                                                $price_meta = number_format($price_meta, 2, '.', '');
                                                $image_url  = wp_get_attachment_image_src( get_post_thumbnail_id( $main_pro_id ) , 'full' );
                                                ?>
                                                <li class="item first last odd">
                                                    <a class="product-image" title="<?php echo $pro_title; ?>" href="<?php echo $pro_permlink; ?>">
                                                        <img width="150" height="150" src="<?php echo $image_url[0]; ?>" data-animated="<?php echo $feat_image_url; ?>">
                                                    </a>
                                                    <h2 class="product-name">
                                                        <a title="<?php echo $pro_title; ?>" href="<?php echo $pro_permlink; ?>">
                                                            <?php echo $pro_title; ?>
                                                        </a>
                                                    </h2>

                                                    <div class="actions">
                                                        <form enctype="multipart/form-data" method="post" class="cart">
                                                            <input type="hidden" value="<?php echo $main_pro_id; ?>" name="add-to-cart">
                                                            <button data-product_id="<?php echo $main_pro_id; ?>" class="single_add_to_cart_button button alt" type="submit">Add to cart</button>
                                                        </form>

                                                    </div>
                                                </li>
                                                <?php
                                            }
                                        endwhile;
                                        wp_reset_postdata();
                                        ?>
                                    </ul>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>

      		</div>
    	</div>
  	</div>
</div> 
