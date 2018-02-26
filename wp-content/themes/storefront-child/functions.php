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

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function remove_header_content() {
	remove_action( 'storefront_header', 'storefront_site_branding', 20 );

	remove_action( 'storefront_header', 'storefront_skip_links', 0 );
}

add_action('init', 'remove_header_content');

function my_remove_variation_price( $price ) {
$price = '';
return $price;
}

add_filter( 'woocommerce_variable_sale_price_html', 'my_remove_variation_price', 10, 2 );
add_filter( 'woocommerce_variable_price_html', 'my_remove_variation_price', 10, 2 );
 

