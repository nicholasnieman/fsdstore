<?php

/*
  Plugin Name: WooCommerce WWE Small Package Quotes
  Plugin URI: https://eniture.com/products/
  Description: Obtains a dynamic estimate of Small Package rates via the Worldwide Express Speedship API for your orders.
  Author: Eniture Technology
  Author URI: http://eniture.com/
  Version: 1.1.0
  Text Domain: eniture-technology
  License: GPL version 2 or later - http://www.eniture.com/
 */
/*
Small Package Quotes for WooCommerce - Worldwide Express Edition
Copyright (C) 2016  Eniture LLC d/b/a Eniture Technology

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License version 2
as published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Inquiries can be emailed to info@eniture.com or sent via the postal service to Eniture Technology, 320 W. Lanier Ave, Suite 200, Fayetteville, GA 30214, USA.
*/

// check if plugin core function included or not
if (!function_exists('is_plugin_active')) {
    require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

// add settings and support links in plugins listing 
add_filter('plugin_action_links', 'wwe_smallpkg_add_action_plugin', 10, 5);
function wwe_smallpkg_add_action_plugin($actions, $plugin_file) {
    static $plugin;

    if (!isset($plugin))
        $plugin = plugin_basename(__FILE__);
    if ($plugin == $plugin_file) {

        $settings = array('settings' => '<a href="admin.php?page=wc-settings&tab=wwe_small_packages_quotes">' . __('Settings', 'General') . '</a>');
        $site_link = array('support' => '<a href="https://eniture.com/support/" target="_blank">Support</a>');

        $actions = array_merge($settings, $actions);
        $actions = array_merge($site_link, $actions);
    }

    return $actions;
}

// inclure speedship file
require_once( 'quoteSpeedShipShipment.php' );

// check if woocommrece activated or not
function smallpkg_woocommerce_avaibility_error() {
    $class = "error";
    $message = "WooCommerce WWE Small Package is enabled but not effective. It requires WooCommerce in order to work , Please Install Woocommrce Plugin. <a target='_blank' href='https://wordpress.org/plugins/woocommerce/installation/'>Install<a>";
    echo"<div class=\"$class\"> <p>$message</p></div>";
}

//  if woocommrece don't activated, show error message
if (!class_exists('Woocommerce')) {
    add_action('admin_notices', 'smallpkg_woocommerce_avaibility_error');
}

// include wwe small package css
wp_enqueue_style('small_packges_style', plugins_url('/css/small_packges_style.css', __FILE__));

// extend woocommerce shipping class
require_once 'small_packages_shipping_class.php';
// call shipping class on init
add_action('woocommerce_shipping_init', 'smallpkg_shipping_method_init');

// add filter on shipping class , to add shipping
add_filter('woocommerce_shipping_methods', 'smallpkg_add_shipping_method');

function smallpkg_add_shipping_method($methods) {
    $methods[] = 'WC_speedship_Shipping_Method';
    return $methods;
}

// add admin setting class
add_filter('woocommerce_get_settings_pages', 'smallpkg_shipping_sections');

function smallpkg_shipping_sections($settings) {
    $settings[] = include( 'small_packages_tab_class_woocommrece.php' );
    return $settings;
}

add_filter('woocommerce_package_rates', 'speedship_hide_shipping');

function speedship_hide_shipping($available_methods) {
    
    if (get_option('wc_settings_allow_other_plugins_wwe_small_packages') == 'no') {
        if (count($available_methods) > 0) {
            $speedship_rates = array();
            foreach ($available_methods as $index => $method) {
                if ($method->method_id == 'Speedship' || $method->method_id == 'LTL_shipping_method') {

                    $speedship_rates[$index] = $available_methods[$index];
                }
            }
//            if ($speedship_rates) {
                return $speedship_rates;
//            } else {
//                return $available_methods;
//            }
        }
    } else {
        return $available_methods;
    }
}


add_filter('woocommerce_package_rates', 'speedship_overRide_message', 10, 1);

function speedship_overRide_message($available_methods) {

    if (count($available_methods) < 1) {

        if (get_option('wc_settings_pervent_checkout_proceed_wwe_small_packages') == 'prevent') {

            add_action('wp_footer', 'input_checkout');

            function input_checkout() {
                ?>
                <script>
                    jQuery(document).ready(function () {
                        jQuery('.wc-proceed-to-checkout a').addClass('disabled ');
                        jQuery(".wc-proceed-to-checkout a").attr('href', 'javascript:void(0)');

                    });
                </script>

                <?php

            }

            add_filter('woocommerce_cart_no_shipping_available_html', 'prevent_proceed_checkout');

            function prevent_proceed_checkout($message) {
                return __(get_option('prevent_user_to_proceed_checkout'));
            }

        } else {

            add_filter('woocommerce_cart_no_shipping_available_html', 'Allow_proceed_checkout');

            function Allow_proceed_checkout($message) {
                return __(get_option('allow_user_to_proceed_checkout'));
            }

        }
    }
    return $available_methods;
}


// remove free lable from shipping
add_filter('woocommerce_cart_shipping_method_full_label', 'smallpkg_remove_free_label', 10, 2);

function smallpkg_remove_free_label($full_label, $method) {
    $full_label = str_replace("(Free)", "", $full_label);
    return $full_label;
}

// include wwe speedship js
require_once 'js/wwe_js.php';



add_action('init', 'wwe_save_no_method_available');

function wwe_save_no_method_available() {

    if (get_option('allow_user_to_proceed_checkout') !== false) {
        // The option already exists, so we just update it.
        if (isset($_POST['allow_user_to_proceed_checkout']) && !empty($_POST['allow_user_to_proceed_checkout'])) {
            update_option('allow_user_to_proceed_checkout', $_POST['allow_user_to_proceed_checkout']);
        }
        if (isset($_POST['prevent_user_to_proceed_checkout']) && !empty($_POST['prevent_user_to_proceed_checkout'])) {
            update_option('prevent_user_to_proceed_checkout', $_POST['prevent_user_to_proceed_checkout']);
        }
    } else {
        // The option hasn't been added yet. We'll add it with $autoload set to 'no'.
        $deprecated = null;
        $autoload = 'no';
        add_option('allow_user_to_proceed_checkout', $_POST['allow_user_to_proceed_checkout'], $deprecated, $autoload);
        add_option('prevent_user_to_proceed_checkout', $_POST['prevent_user_to_proceed_checkout'], $deprecated, $autoload);
    }
}
