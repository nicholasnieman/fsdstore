<?php


//Custom Post Slider
  function slider_post_type() {
    register_post_type( 'slider',
      array(
        'labels' => array(
          'name' => __( 'Slider' ),
          'singular_name' => __( 'Slider' )
        ),
        'public' => true,
        'has_archive' => true,
        'capability_type' => 'post',
        'rewrite' => array( 'slug' => 'slider' ),
        'exclude_from_search' => true,
        'hierarchical' => true,
        'rewrite' => array( 'slug' => 'slider-categoryy' ),
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        'query_var' => true
      )
    );
  }
  add_action( 'init', 'slider_post_type' );
//Custom Post Slider End


//Custom Post Testimonials
  function testimonial_post_type() {
    register_post_type( 'testimonial',
      array(
        'taxonomies'  => array('testimonial_cat' ),
        'labels' => array(
          'name' => __( 'Testimonial' ),
          'singular_name' => __( 'Testimonial' )
        ),
        'public' => true,
        'has_archive' => true,
        'capability_type' => 'post',
        'rewrite' => array( 'slug' => 'testimonial' ),
        'exclude_from_search' => true,
        'hierarchical' => true,
        'menu_icon' => 'dashicons-testimonial',
        'menu_position' => 5,
        'rewrite' => array( 'slug' => 'testimonial-categoryy' ),
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        'query_var' => true
      )
    );
  }
  add_action( 'init', 'testimonial_post_type' );

  function testimonial_init() {
    register_taxonomy(
      'testimonial_cat',
      'testimonial',
      array(
        'label' => __( 'Testimonial Category' ),
         'sort' => true,
              'hierarchical' => true,
        'name' => __( 'Testimonial Category' ),
        'rewrite' => array( 'slug' => 'testimonial_cat' ),
        'supports' => array( 'developer', 'when developed', 'testimonial_cat' ),
      )
    );
  }
  add_action( 'init', 'testimonial_init' );
//Custom Post Testimonials Ends


//Custom Post Products
  function product_post_type() {
    register_post_type( 'product',
      array(
      	'taxonomies'  => array('product_cat' ),
        'labels' => array(
          'name' => __( 'Product' ),
          'singular_name' => __( 'Product' )
        ),
        'public' => true,
        'has_archive' => true,
        // 'show_in_menu' => 'edit.php?post_type=glass',
        'capability_type' => 'post',
        'rewrite' => array( 'slug' => 'product', 'with_front' => false ),
  			'exclude_from_search' => true,
  			'hierarchical' => true,
  			'rewrite' => array( 'slug' => 'product-cat' ),
  			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
  			'query_var' => true
      )
    );
  }
  add_action( 'init', 'product_post_type' );

  function people_init() {
    register_taxonomy(
      'product_cat',
      'product',
      array(
        'label' => __( 'Product Category' ),
         'sort' => true,
              'hierarchical' => true,
        'name' => __( 'Product Category' ),
        'rewrite' => array( 'slug' => 'product_cat' ),
        'supports' => array( 'developer', 'when developed', 'product_cat' ),
      )
    );
  }
  add_action( 'init', 'people_init' );
//Custom Post Products End

 //add_action('admin_menu', 'my_admin_menu'); 
// function my_admin_menu() { 
//     add_submenu_page('edit.php?post_type=glass', 'Products', 'Products', 'manage_options', 'edit-tags.php?taxonomy=glass_cat&post_type=glass'); 
// }

//Custom Post Gallery
  function gallery_post_type() {
    register_post_type( 'gallery',
      array(
        'taxonomies'  => array('gallery_cat' ),
        'labels' => array(
          'name' => __( 'Gallery' ),
          'singular_name' => __( 'Gallery' )
        ),
        'public' => true,
        'has_archive' => true,
        'capability_type' => 'post',
        'rewrite' => array( 'slug' => 'gallery' ),
        'exclude_from_search' => true,
        'hierarchical' => true,
        'rewrite' => array( 'slug' => 'gallery-category' ),
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        'query_var' => true
      )
    );
  }
  add_action( 'init', 'gallery_post_type' );

  function gallery_init() {
    register_taxonomy(
      'gallery_cat',
      'gallery',
      array(
        'label' => __( 'Gallery Category' ),
         'sort' => true,
              'hierarchical' => true,
        'name' => __( 'Gallery Category' ),
        'rewrite' => array( 'slug' => 'gallery_cat' ),
        'supports' => array( 'developer', 'when developed', 'gallery_cat' ),
      )
    );
  }
  add_action( 'init', 'gallery_init' );
//Custom Post Gallery End


  function ex_rewrite( $wp_rewrite ) {

      $feed_rules = array(
          '(.+)'    =>  'index.php?products_category='. $wp_rewrite->preg_index(1)
      );

      $wp_rewrite->rules = $wp_rewrite->rules + $feed_rules;
  }
  // refresh/flush permalinks in the dashboard if this is changed in any way
  add_filter( 'generate_rewrite_rules', 'ex_rewrite' );


  //Custom Post Hardwre Finish
    function hardwrfinish_post_type() {
      register_post_type( 'hardwrfinish',
        array(
          'taxonomies'  => array('hardwrfinish_cat' ),
          'labels' => array(
            'name' => __( 'Hardwre Finish' ),
            'singular_name' => __( 'Hardwre Finish' )
          ),
          'public' => true,
          'has_archive' => true,
          'capability_type' => 'post',
          'rewrite' => array( 'slug' => 'hardwrfinish' ),
          'exclude_from_search' => true,
          'hierarchical' => true,
          'rewrite' => array( 'slug' => 'hardwrfinish-category' ),
          'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
          'query_var' => true
        )
      );
    }
    add_action( 'init', 'hardwrfinish_post_type' );

    function hardwrfinish_init() {
      register_taxonomy(
        'hardwrfinish_cat',
        'hardwrfinish',
        array(
          'label' => __( 'Hardwre Finish Category' ),
           'sort' => true,
                'hierarchical' => true,
          'name' => __( 'Hardwre Finish Category' ),
          'rewrite' => array( 'slug' => 'hardwrfinish_cat' ),
          'supports' => array( 'developer', 'when developed', 'hardwrfinish_cat' ),
        )
      );
    }
    add_action( 'init', 'hardwrfinish_init' );
  //Custom Post Hardwre End

  //Custom Post Glass
    function glass_post_type() {
      register_post_type( 'glass',
        array(
          'taxonomies'  => array('glass_cat' ),
          'labels' => array(
            'name' => __( 'Glass' ),
            'singular_name' => __( 'Glass' )
          ),
          'public' => true,
          'has_archive' => true,
          'capability_type' => 'post',
          'rewrite' => array( 'slug' => 'glass' ),
          'exclude_from_search' => true,
          'hierarchical' => true,
          'rewrite' => array( 'slug' => 'glass-category' ),
          'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
          'query_var' => true
        )
      );
    }
    add_action( 'init', 'glass_post_type' );

    function glass_init() {
      register_taxonomy(
        'glass_cat',
        'glass',
        array(
          'label' => __( 'Glass Category' ),
           'sort' => true,
                'hierarchical' => true,
          'name' => __( 'Glass Category' ),
          'rewrite' => array( 'slug' => 'glass_cat' ),
          'supports' => array( 'developer', 'when developed', 'glass_cat' ),
        )
      );
    }
    add_action( 'init', 'glass_init' );
  //Custom Post Glass End



      function product_init() {
        register_taxonomy(
          'product_store',
          'product',
          array(
            'label' => __( 'Store Tag' ),
             'sort' => true,
                  'hierarchical' => true,
            'name' => __( 'Store Tag' ),
            'rewrite' => array( 'slug' => 'product_store' ),
            'supports' => array( 'developer', 'when developed', 'product_store' ),
          )
        );
      }
      add_action( 'init', 'product_init' );
    