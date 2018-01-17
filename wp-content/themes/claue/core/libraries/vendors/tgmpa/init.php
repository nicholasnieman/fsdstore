<?php
/**
 * Register the required plugins for this theme.
 *
 * @since   1.0.0
 * @package Claue
 */
// Include the TGM_Plugin_Activation class.
include JAS_CLAUE_PATH . '/core/libraries/vendors/tgmpa/class-tgmpa.php';

/**
 * Register the required plugins for this theme.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function jas_claue_register_required_plugins() {
	$plugins = array(
		array(
			'name'     => esc_html__( 'Claue Addons', 'claue' ),
			'slug'     => 'claue-addons',
			'source'   => 'http://janstudio.net/plugins/janstudio/claue/claue-addons.zip',
			'version' => '1.0.9',
			'required' => true,
		),
		array(
			'name'     => esc_html__( 'Visual Composer', 'claue' ),
			'slug'     => 'js_composer',
			'source'   => JAS_CLAUE_PATH .'/assets/vendors/plugins/js_composer.zip',
			'version'  => '5.4.5',
			'required' => false,
		),
		array(
			'name'     => esc_html__( 'Claue Sample Data', 'claue' ),
			'slug'     => 'claue-sample',
			'source'   => 'http://janstudio.net/plugins/janstudio/claue/claue-sample.zip',
			'required' => false,
			'version'  => '1.0.0'
		),
		array(
			'name'     => esc_html__( 'Pin Maker', 'claue' ),
			'slug'     => 'pin-maker',
			'source'   => JAS_CLAUE_PATH .'/assets/vendors/plugins/pin-maker.zip',
			'version'  => '1.0.4',
		),
		array(
			'name'     => esc_html__( 'Envato Toolkit', 'claue' ),
			'slug'     => 'envato-wordpress-toolkit-master',
			'source'   => 'http://janstudio.net/plugins/vendors/envato-wordpress-toolkit-master.zip',
		),
		array(
			'name'     => esc_html__( 'WPA WooCommerce Product Bundle', 'claue' ),
			'slug'     => 'wpa-woocommerce-product-bundle',
			'source'   => JAS_CLAUE_PATH .'/assets/vendors/plugins/wpa-woocommerce-product-bundle.zip',
			'version'  => '1.1.2',
			'external_url' => true

		),
		array(
			'name'     => esc_html__( 'WooCommerce', 'claue' ),
			'slug'     => 'woocommerce',
			'required' => false,
		),
		array(
			'name'      => esc_html__( 'Meta Slider', 'claue' ),
			'slug'      => 'ml-slider',
			'required'  => false,
		),
		array(
			'name'      => esc_html__( 'Instagram Shop', 'claue' ),
			'slug'      => 'shop-feed-for-instagram-by-snapppt',
			'required'  => false,
		),
		array(
			'name'      => 'Regenerate Thumbnails',
			'slug'      => 'regenerate-thumbnails',
			'required'  => false,
			),
		array(
			'name'      => esc_html__( 'Contact Form 7', 'claue' ),
			'slug'      => 'contact-form-7',
			'required'  => false,
			),
		array(
			'name'      => esc_html__( 'MailChimp', 'claue' ),
			'slug'      => 'mailchimp-for-wp',
			'required'  => false,
			),
		array(
			'name'      => esc_html__( 'YITH WooCommerce Wishlist', 'claue' ),
			'slug'      => 'yith-woocommerce-wishlist',
			'required'  => false,
		),
		array(
			'name'      => esc_html__( 'YITH WooCommerce Newsletter Popup', 'claue' ),
			'slug'      => 'yith-woocommerce-popup',
			'required'  => false,
		),
		array(
			'name'      => esc_html__( 'YITH WooCommerce Ajax Product Filter', 'claue' ),
			'slug'      => 'yith-woocommerce-ajax-navigation',
			'required'  => false,
		),
		array(
			'name'      => esc_html__( 'YIKES Custom Product Tabs', 'claue' ),
			'slug'      => 'yikes-inc-easy-custom-woocommerce-product-tabs',
			'required'  => false,
		),
	);

	if ( ! class_exists( 'ColorSwatch' ) ) {
		$plugins[] = array(
			'name'    => esc_html__( 'WooCommerce Variation Swatch', 'claue' ),
			'slug'    => 'wpa-woocommerce-variation-swatch',
			'source'  => JAS_CLAUE_PATH .'/assets/vendors/plugins/wpa-woocommerce-variation-swatch.zip',
			'version' => '1.0.3'
		);
	}

	$config = array(
		'id'           => 'tgmpa',
		'menu'         => 'jas-install-plugins',
		'parent_slug'  => 'jas',
		'capability'   => 'edit_theme_options',
		'is_automatic' => true,
	);
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'jas_claue_register_required_plugins' );