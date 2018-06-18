<?php

function my_theme_enqueue_styles() {
    $parent_style = 'storefront';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'storefront-child',
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style ),
		wp_get_theme()->get('Version')
    );
}

function remove_header_content() {
	remove_action( 'storefront_header', 'storefront_site_branding', 20 );
	remove_action( 'storefront_header', 'storefront_skip_links', 0 );
	remove_action('storefront_header', 'storefront_product_search', 40);
}

function my_remove_variation_price( $price ) {
$price = '';
return $price;
}

function fsd_enqueue() {
	wp_register_style( 'fsd_vollkorn_font', 'https://fonts.googleapis.com/css?family=Vollkorn+SC' );
	wp_register_script( 'fsd_font_awesome', 'https://use.fontawesome.com/releases/v5.0.8/js/all.js' );
	wp_register_script( 'fsd_javascript', '/wp-content/themes/storefront-child/functions.js');
	wp_enqueue_style( 'fsd_vollkorn_font' );
	wp_enqueue_script( 'fsd_font_awesome' );
	wp_enqueue_script( 'fsd_javascript' );
}

add_filter( 'woocommerce_variable_sale_price_html', 'my_remove_variation_price', 10, 2 );
add_filter( 'woocommerce_variable_price_html', 'my_remove_variation_price', 10, 2 );
add_filter( 'wc_product_enable_dimensions_display', '__return_false' );

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'fsd_enqueue' );
add_action('init', 'remove_header_content');

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );


add_filter( 'get_terms', 'exclude_category', 10, 3 );
function exclude_category( $terms, $taxonomies, $args ) {
  $new_terms = array();
  // if a product category and on a page
  if ( in_array( 'product_cat', $taxonomies ) ) {
    foreach ( $terms as $key => $term ) {
  // Enter the name of the category you want to exclude in array
      if ( ! in_array( $term->slug, array( 'seals', 'threshold', 'door-sweeps', 'u-channel' ) ) ) {
        $new_terms[] = $term;
      }
    }
    $terms = $new_terms;
  }
  return $terms;
}




 

