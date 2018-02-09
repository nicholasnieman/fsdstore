<?php
/**
 * Plugin Name: First Data Payeezy for WooCommerce
 * Plugin URI: http://www.cardpaysolutions.com/woocommerce?pid=83cf9aa647bc5b4e
 * Description: Adds the First Data Payeezy Gateway to WooCommerce. First Data TransArmor Solution is used to securely support saved credit card profiles, subscriptions, and pre-orders.
 * Version: 1.0.1
 * Author: Cardpay Solutions, Inc.
 * Author URI: http://www.cardpaysolutions.com/
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: woocommerce-payeezy
 * Domain Path: /languages
 *
 * Copyright 2016 Cardpay Solutions, Inc.  (email : sales@cardpaysolutions.com)
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 * 
 * @author Cardpay Solutions, Inc.
 * @package First Data Payeezy for WooCommerce
 * @since 1.0.0
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Main class to set up the Payeezy gateway
 */
class WC_Payeezy {

	/**
	 * Constructor
	 */
	public function __construct() {
		define( 'WC_PAYEEZY_TEMPLATE_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) . '/templates/' );
		define( 'WC_PAYEEZY_PLUGIN_URL', untrailingslashit( plugins_url( basename( plugin_dir_path( __FILE__ ) ), basename( __FILE__ ) ) ) );

		add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( $this, 'plugin_action_links' ) );
		add_action( 'plugins_loaded', array( $this, 'init' ), 0 );
		add_action( 'woocommerce_order_status_completed', array( $this, 'process_capture' ) );
		add_action( 'init', array( $this, 'create_credit_card_post_type' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'load_css' ) );
	}

	/**
	 * Add relevant links to plugins page
	 * @param  array $links
	 * @return array
	 */
	public function plugin_action_links( $links ) {
		$addons = ( class_exists( 'WC_Subscriptions_Order' ) || class_exists( 'WC_Pre_Orders_Order' ) ) ? '_addons' : '';
		$plugin_links = array(
			'<a href="' . admin_url( 'admin.php?page=wc-settings&tab=checkout&section=wc_payeezy_gateway' . $addons ) . '">' . __( 'Settings', 'woocommerce-payeezy' ) . '</a>',
		);
		return array_merge( $plugin_links, $links );
	}

	/**
	 * Init function
	 */
	public function init() {
		if ( ! class_exists( 'WC_Payment_Gateway' ) ) {
			return;
		}

		// Includes
		include_once( 'includes/class-wc-payeezy-gateway.php' );
		include_once( 'includes/class-wc-payeezy-api.php' );
		include_once( 'includes/class-wc-payeezy-credit-cards.php' );

		if ( class_exists( 'WC_Subscriptions_Order' ) || class_exists( 'WC_Pre_Orders_Order' ) ) {
			include_once( 'includes/class-wc-payeezy-gateway-addons.php' );
			// Support Subscriptions 1.x
			if ( ! function_exists( 'wcs_create_renewal_order' ) ) {
				include_once( 'includes/deprecated/class-wc-payeezy-gateway-addons-deprecated.php' );
			}
		}

		// Localisation
		load_plugin_textdomain( 'woocommerce-payeezy', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

		// Add Payeezy Gateway
		add_filter( 'woocommerce_payment_gateways', array( $this, 'add_gateway' ) );
	}

	/**
	 * Add Payeezy gateway to Woocommerce
	 */
	public function add_gateway( $methods ) {
		if ( class_exists( 'WC_Subscriptions_Order' ) || class_exists( 'WC_Pre_Orders_Order' ) ) {
			if ( class_exists( 'WC_Subscriptions_Order' ) && ! function_exists( 'wcs_create_renewal_order' ) ) {
				$methods[] = 'WC_Payeezy_Gateway_Addons_Deprecated';
			} else {
				$methods[] = 'WC_Payeezy_Gateway_Addons';
			}
		} else {
			$methods[] = 'WC_Payeezy_Gateway';
		}

		return $methods;
	}

	/**
	 * process_capture function
	 * 
	 * @param int $order_id
	 * @return void
	 */
	public function process_capture( $order_id ) {
		$gateway = new WC_Payeezy_Gateway();
		$gateway->process_capture( $order_id );
	}

	/**
	 * create_credit_card_post_type function
	 */
	public function create_credit_card_post_type() {
		register_post_type( 'payeezy_credit_card',
			array(
				'labels' => array(
					'name' => __( 'Credit Cards', 'woocommerce-payeezy' )
				),
				'public'              => false,
				'show_ui'             => false,
				'map_meta_cap'        => false,
				'rewrite'             => false,
				'query_var'           => false,
				'supports'            => false,
			)
		);
	}

	/**
	 * Load style sheet
	 */
	public function load_css() {
		wp_enqueue_style( 'payeezy', plugins_url( 'assets/css/payeezy.css', __FILE__ ) );
	}
}
new WC_Payeezy();
