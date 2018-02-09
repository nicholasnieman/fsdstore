<?php
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
class smallpkg_shipping_get_quotes {

    function check_if_zip_code() {

        // declear zipcode variable
        $freight_zipcode = "";

        // declear state variable 
        $freight_state = "";

        // getting customere state 
        $freight_state = WC()->customer->get_state();

        // getting customer zip code
        $freight_zipcode = WC()->customer->get_postcode();

        // checking if user entered zip code , state or not.
        if (strlen($freight_zipcode) > 0 && strlen($freight_state) > 0) {

            return 1;
        } else {

            return 0;
        }
    }

    function get_web_service_array($package) {

        // declear zipcode variable 
        $freight_zipcode = "";

        // declear state variable 
        $freight_state = "";

        $freight_state = WC()->customer->get_state();

        $freight_zipcode = WC()->customer->get_postcode();
        $freightClass_ltl_gross_small = array();
        foreach ($package['contents'] as $item_id => $values) {
            $_product = $values['data'];
            if (!$product->is_virtual) {
                $_product = $values['data'];
                $product_width[] = $_product->width;
                $product_height[] = $_product->height;
                $product_length[] = $_product->length;
                $product_price_service_array[] = $_product->get_price();
                $product_weight[] = $_product->get_weight();
                $product_post_title[] = $_product->post->post_title;
                $product_post_quantity[] = $values['quantity'];


                global $woocommerce;

                $shipping_methods = $woocommerce->shipping->load_shipping_methods();
                
                if ($values['data']->get_shipping_class() == 'ltl_freight' && $shipping_methods['LTL_shipping_method']->enabled == 'yes') {

                    $freightClass_ltl_gross_small[] = $values['data']->get_shipping_class();
                }
            }
        }

        if (count($freightClass_ltl_gross_small) > 0) {

            $find_ltl_class = 'ltl';
            return $find_ltl_class;
        } else {

            // get server name
            $domain = $_SERVER['SERVER_NAME'];
            // array for all fields 
            $post_data = [
                'speed_ship_username' => get_option('wc_settings_username_wwe_small_packages_quotes'),
                'speed_ship_password' => get_option('wc_settings_password_wwe_small_packages'),
                'authentication_key' => get_option('wc_settings_authentication_key_wwe_small_packages_quotes'),
                'world_wide_express_account_number' => get_option('wc_settings_account_number_wwe_small_packages_quotes'),
                'plugin_licence_key' => get_option('wc_settings_plugin_licence_key_wwe_small_packages_quotes'),
                'speed_ship_domain_name' => eniture_parse_url($domain),
                'speed_ship_reciver_city' => $freight_city,
                'speed_ship_receiver_state' => $freight_state,
                'speed_ship_receiver_zip_code' => $freight_zipcode,
                'speed_ship_senderCity' => get_option('wc_settings_wwe_small_packages_city'),
                'speed_ship_senderState' => get_option('wc_settings_wwe_small_packages_state'),
                'speed_ship_senderZip' => get_option('wc_settings_wwe_small_packages_zip_code'),
                'speed_ship_senderCountryCode' => get_option('wc_settings_wwe_small_packages_country'),
                'residentials_delivery' => get_option('wc_settings_quest_as_residential_delivery_wwe_small_packages'),
                'product_width_array' => $product_width,
                'product_height_array' => $product_height,
                'product_length_array' => $product_length,
                'speed_ship_product_price_array' => $product_price_service_array,
                'speed_ship_product_weight' => $product_weight,
                'speed_ship_title_array' => $product_post_title,
                'speed_ship_quantity_array' => $product_post_quantity,
            ];

//                echo '<pre>';
//                print_r($post_data);
//                echo '</pre>';
            // array in query form
            return $field_string = http_build_query($post_data);
        }
    }

    function get_web_quotes($field_string) {
        $ch = curl_init();
        // set url

        curl_setopt($ch, CURLOPT_URL, "http://eniture.com/WweSmallPkWebService/speedship/quoteSpeedshipShipment.php");

        // send curl value by post method
        curl_setopt($ch, CURLOPT_POST, 1);

        // array of values
        curl_setopt($ch, CURLOPT_POSTFIELDS, $field_string);

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch);

        return $output;
    }

}

// instance of class
$web_service_inst = new smallpkg_shipping_get_quotes();

// get array for post
$web_service_arr = $web_service_inst->get_web_service_array($package);

//echo $web_service_arr;

if ($web_service_arr != 'ltl') {

// get quotes array 
    $output = $web_service_inst->get_web_quotes($web_service_arr);

// check if user added zip code and state 
    $wwe_small_packges_shipping_addrss = $web_service_inst->check_if_zip_code();
}