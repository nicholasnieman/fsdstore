<?php
/**
 * Description
 *
 * @package WPA_WCVS
 * @version 1.0.0
 * @author  WPAddon
 */
if ( ! defined('ABSPATH' ) ) {
	exit;
}

/**
 * Class description.
 *
 * @version 1.0.0
 */
class WPA_WCVS_Frontend {
	/**
	 * Initialize.
	 *
	 * @return  void
	 */
	public static function init() {
		// Enqueue frontend assets
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue_assets' ) );

		// Custom woocommerce template path
		add_filter( 'woocommerce_locate_template', array( __CLASS__, 'wpa_wcvs_woocommerce_locate_template' ), 20, 3 );
        // custom variations numbers
        add_filter( 'woocommerce_ajax_variation_threshold', array(__CLASS__, 'wpa_wcvs_woocommerce_ajax_variation_threshold'), 10); 
        
		include_once( 'wcvs-template-hooks.php' );
	}

	/**
	 * Enqueue front assets.
	 *
	 * @return  void
	 */
	public static function enqueue_assets() {
		wp_enqueue_style( 'wpa-wcvs-frontend', WPA_WCVS()->plugin_url() . '/assets/css/wcvs-frontend.css' );
		wp_enqueue_script( 'wpa-wcvs-frontend', WPA_WCVS()->plugin_url() . '/assets/js/wcvs-frontend.js', array('jquery'), NULL, true );
		wp_localize_script( 'wpa-wcvs-frontend', 'wpa_wcvs', self::localize_script() );
	}

	/**
	 * Embed baseline script.
	 *
	 * @return  array
	 */
	public static function localize_script() {
		return array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'_nonce' => wp_create_nonce( 'wpa-wcvs-nonce' ),
		);
	}

	/**
	 * Render custom image in product detail.
	 *
	 * @return  array
	 */
	public static function get_image( $term_id, $product_id = 0 ) {
		$attachment_id = absint( get_woocommerce_term_meta( $term_id, 'thumbnail_id', true ) );
		if ( $product_id ) {
			$attr_swatch = get_post_meta( $product_id, 'wpa_wcvs_attrs', true );

			if ( is_array( $attr_swatch ) ) {
				foreach( $attr_swatch as $attr_swatch_key => $attr_swatch_value ) {
					if ( isset( $attr_swatch_value[$term_id] ) && $attr_swatch_value[$term_id] > 0 ) {
						$attachment_id = $attr_swatch_value[$term_id];
					}
				}
			}

		}
		$output = '';

		if ( ( int ) $attachment_id == 0 ) {
			$attachment_id = absint( get_woocommerce_term_meta( $term_id, 'thumbnail_id', true ) );
		}
		if ( ( int ) $attachment_id > 0 ) {
			$output = wp_get_attachment_thumb_url( $attachment_id );
		}
		return $output;
	}

	/**
	 * Custom woocommerce template path
	 *
	 * @return string
	 */
	public static function wpa_wcvs_woocommerce_locate_template( $template, $template_name, $template_path ) {
		global $woocommerce;
		$_template = $template;

		if ( ! $template_path ) {
			$template_path = $woocommerce->template_url;
		}
		$plugin_path  = WPA_WCVS()->plugin_path() . '/includes/woocommerce/';

		// Look within passed path within the theme - this is priority
		$template = locate_template(
			array(
				$template_path . $template_name,
				$template_name
			)
		);

		// Modification: Get the template from this plugin, if it exists
		if ( ! $template && file_exists( $plugin_path . $template_name ) ) {
			$template = $plugin_path . $template_name;
		}

		// Use default template
		if ( ! $template ) {
			$template = $_template;
		}

		// Return what we found
		return $template;
	}

	/**
	 * Get image gallery
	 *
	 * @return array
	 */
	public static function image_galleries( $product_id, $available_variations ) {
		// List of meta key which we want to search
		$search_meta_keys = array();
		foreach ( $available_variations as $variation ) {
			foreach ( $variation['attributes'] as $attribute_name => $attribute_value ) {
				$attribute_name     = str_replace( 'attribute_pa_', '', $attribute_name );
				$search_meta_keys[] = '_product_image_gallery_pa_' . $attribute_name . '-' . $attribute_value;
			}
		}

		// Get all post meta then search galleries
		$post_metas = get_post_meta( $product_id );
		$galleries  = array();

		foreach ( $post_metas as $meta_key => $meta_value ) {
			if ( in_array( $meta_key, $search_meta_keys ) ) {
				$galleries[ $meta_key ] = $meta_value[0];
			}
		}

		// Get images attributes
		$images = array();
		foreach ( $galleries as $meta_key => $gallery ) {
			$attachment_ids = array_filter( explode( ',', $gallery ) );
			foreach ( $attachment_ids as $key => $attachment_id ) {
				$full_size_image             = wp_get_attachment_image_src( $attachment_id, 'full' );
				$single                      = wp_get_attachment_image_src( $attachment_id, 'shop_single' );
				$thumbnail                   = wp_get_attachment_image_src( $attachment_id, 'shop_thumbnail' );
				$images[ $meta_key ][ $key ] = array(
					'single'                  => $single[0],
					'thumbnail'               => $thumbnail[0],
					'data-src'                => $full_size_image[0],
					'data-large_image'        => $full_size_image[0],
					'data-large_image_width'  => $full_size_image[1],
					'data-large_image_height' => $full_size_image[2],
				);
			}
		}
		// Get default gallery
		$product        = new WC_product( $product_id );
		$attachment_ids = $product->get_gallery_image_ids();
		if ( has_post_thumbnail( $product_id ) ) {
			$attachment_ids = $result = array_merge( array( get_post_thumbnail_id( $product_id ) ), $attachment_ids );
		}
		foreach ( $attachment_ids as $key => $attachment_id ) {
			$full_size_image             = wp_get_attachment_image_src( $attachment_id, 'full' );
			$single                      = wp_get_attachment_image_src( $attachment_id, 'shop_single' );
			$thumbnail                   = wp_get_attachment_image_src( $attachment_id, 'shop_thumbnail' );
			$images['default_gallery'][ $key ] = array(
				'single'                  => $single[0],
				'thumbnail'               => $thumbnail[0],
				'data-src'                => $full_size_image[0],
				'data-large_image'        => $full_size_image[0],
				'data-large_image_width'  => $full_size_image[1],
				'data-large_image_height' => $full_size_image[2],
			);
		}

		return $images;
	}
	public static function wpa_wcvs_woocommerce_ajax_variation_threshold() {
	    return 1000;    
	}
}

WPA_WCVS_Frontend::init();