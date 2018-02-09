<?php
get_header('store');
global $frame_breadcumb;
global $post;
?>

<script type="text/javascript">
    jQuery(document).ready(function () {
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
foreach ($wcatTerms as $wcatTerm) {
    $t_id = $wcatTerm->term_id;
    $variable = get_field('_is_bundled_cat', 'product_cat_' . $t_id);
    if (!$variable == 'Yes') {
        $term_arr[$wcatTerm->term_id] = $wcatTerm->term_id;
    }

}

?>
<div id="mwrapbg">
    <div id="mbar">
        <div id="mwrap">

            <!--  <div id="main-header">
                  <h2>Store </h2>
                  <div id="buying-guide"><a href="/buying-guide/">Buying Guide</a></div>
                  <div id="need-help"><a href="/contact/">Need Help?</a></div>
              </div>
  -->
            <div class="container">
                <div class="row">

                    <div class="breadcrumbs">
                        <ul>
                            <li class="cms_page">
                                <?php
                                if ((class_exists('frame_breadcrumb_class'))) {
                                    $frame_breadcumb->custom_breadcrumb();
                                }
                                ?>
                            </li>
                        </ul>
                    </div>


                    <div class="container">
                        <div class="row">

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
                                                        array(
                                                            'hide_empty' => 0,
                                                            'orderby' => 'ID',
                                                            'parent' => 0,
                                                            'include' => array(76, 75, 79, 85, 73, 77, 72, 83, 81, 82, 252))
                                                    );
                                                    foreach ($wcatTerms as $wcatTerm) {
                                                        echo '<li> <a id="cat-id-' . $wcatTerm->term_id . '" href="' . get_term_link($wcatTerm->slug, $wcatTerm->taxonomy) . ' "> ' . $wcatTerm->name . '</a> </li>';
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-8 col-md-col-8">
                                <div id="item-list" class="page_cont">
                                    <ul class="even">
                                        <?php //woocommerce_content();

                                        $wcatTerms = get_terms(
                                            'product_cat',
                                            array('hide_empty' => 0, 'orderby' => 'name', 'order' => 'ASC', 'parent' => 0, 'include' => array(76, 75, 79, 85, 73, 77, 72, 83, 81, 82, 252))
                                        );
                                        foreach ($wcatTerms as $wcatTerm) {
                                            $thumbnail_id = get_woocommerce_term_meta($wcatTerm->term_id, 'thumbnail_id', true);
                                            $image = wp_get_attachment_url($thumbnail_id);
                                            echo '<li>
                        		  	<a style="text-decoration:none" id="cat-id-' . $wcatTerm->term_id . '" href="' . get_term_link($wcatTerm->slug, $wcatTerm->taxonomy) . ' ">
                        		  		<img width="150" height="150" alt="" src="' . $image . '">
                        		   		<strong>' . $wcatTerm->name . '</strong>
                        		   		<span style="background-color: rgb(86, 163, 169);">View More Info</span>
                        		   	</a>
                        		  </li>';
                                        }


                                        ?>
                                    </ul>
                                </div>

                            </div>


                            <div class="clear"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
