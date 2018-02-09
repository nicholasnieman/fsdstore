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
function smallpkg_shipping_method_init() {

    if (!class_exists('WC_speedship_Shipping_Method')) {

        class WC_speedship_Shipping_Method extends WC_Shipping_Method {

            public function __construct() {
                $this->id = 'Speedship'; // Id for your shipping method. Should be uunique.
                $this->method_title = __('Speedship');  // Title shown in admin
                $this->method_description = __(''); // Description shown in admin

                $this->enabled = "yes"; // This can be added as an setting but for this example its forced enabled
                $this->title = "Speedship"; // This can be added as an setting but for this example its forced.

                $this->init();
                add_action('woocommerce_checkout_update_order_review', array($this, 'calculate_shipping'));
            }

            function init() {

                $this->init_form_fields(); // This is part of the settings API. Override the method to add your own settings
                $this->init_settings(); // This is part of the settings API. Loads settings you previously init.
                // Save settings in admin if you have any defined
                add_action('woocommerce_update_options_shipping_' . $this->id, array($this, 'process_admin_options'));
            }

            public function init_form_fields() {
                $this->form_fields = array(
                    'enabled' => array(
                        'title' => __('Enable / Disable', 'woocommerce'),
                        'type' => 'checkbox',
                        'label' => __('Enable This Shipping Service', 'woocommerce'),
                        'default' => 'no',
                        'id' => 'speed_freight_enable_disable_shipping'
                    )
                );
            }

            public function calculate_shipping($package) {

                // calling global variable
                global $wpdb;

                // declear golbal variable
                global $current_user;

                // include quotes file
                require_once 'carrier_service.php';

                // declear weight varible
                $weight = 0;

                // declear diminsion variale
                $dimensions = 0;

                // declear freight class variable
                $ltl_freight_class = "";

                // get dimension of product / shipping
                foreach ($package['contents'] as $item_id => $values) {

                    // get woocommrce cart value
                    $_product = $values['data'];

                    // calculate weight of product 
                    $weight = $weight + $_product->get_weight() * $values['quantity'];

                    // calculate dimension
                    $dimensions = $dimensions + (($_product->length * $values['quantity']) * $_product->width * $_product->height);
                }

                $selected_quotes_service_options_array = array();

                if (get_option('wc_settings_Service_UPS_Next_Day_Early_AM_small_packages_quotes') == 'yes') {
                    //UPS Next Day Early AM
                    $selected_quotes_service_options_array[] = '1DM';
                }

                if (get_option('wc_settings_Service_UPS_Next_Day_Air_small_packages_quotes') == 'yes') {
                    //UPS Next Day Air 
                    $selected_quotes_service_options_array[] = '1DA';
                }

                if (get_option('wc_settings_Service_UPS_Next_Day_Air_Saver_small_packages_quotes') == 'yes') {
                    //UPS Next Day Air Saver
                    $selected_quotes_service_options_array[] = '1DP';
                }

                if (get_option('wc_settings_Service_UPS_2nd_Day_AM_quotes') == 'yes') {
                    //UPS 2nd Day AM 
                    $selected_quotes_service_options_array[] = '2DM';
                }

                if (get_option('wc_settings_Service_UPS_2nd_Day_PM_quotes') == 'yes') {
                    // UPS 2nd Day PM 
                    $selected_quotes_service_options_array[] = '2DA';
                }

                if (get_option('wc_settings_Service_UPS_3rd_Day_quotes') == 'yes') {
                    // UPS 3rd Day 
                    $selected_quotes_service_options_array[] = '3DS';
                }

                if (get_option('wc_settings_Service_UPS_Ground_quotes') == 'yes') {
                    // UPS Ground
                    $selected_quotes_service_options_array[] = 'GND';
                }

                $result = json_decode($output); //  guotes array
                // print_r($result);die;
                if ($result->q && !empty($result->q)) { // quotes array in loop
                    foreach ($result->q as $item) { // quotes array in loop
                        $item = (array) $item;

                        $serviceFeeGrandTotal = (array) $item['serviceFeeDetail']->serviceFeeGrandTotal;

                        if (in_array($item['serviceCode'], $selected_quotes_service_options_array)) {

                            $sandBox = ""; // declear for sandbox

                            if ($result->t) { // check if result for staging doamin 
                                $sandBox = ' (Sandbox) ';
                            }
                            // shipping freight array
                            $all_freight_array[] = array(
                                'WWE_rate_id' => $item['rateEstimateId'],
                                'WWE_rate_label' => $item['serviceDescription'] . $sandBox,
                                'WWE_rate_cost' => array_shift($serviceFeeGrandTotal),
                                'WWE_rate_transitDays' => $item['estimateDelivery'],
                            );
                        }
                    }
                }
                
                $price_sorted_key = array();

                if (count($all_freight_array)) { // if ther are quotes from API
                    foreach ($all_freight_array as $key => $cost_carrier) {

                        $price_sorted_key[$key] = $cost_carrier['WWE_rate_cost'];
                    }
                    // sor quotes array
                    array_multisort($price_sorted_key, SORT_ASC, $all_freight_array);
                }
                $calculate_type = 0;

                //  if admin set markup as % / set flag 
                if (strpos(get_option('wc_settings_hand_free_mark_up_wwe_small_packages'), '%') == true) {

                    $calculate_type = 2; // set flage if user set markup as %
                    // assing markup value to variable
                    $mark_up_fee = str_replace("%", "", get_option('wc_settings_hand_free_mark_up_wwe_small_packages'));
                } else {

                    // IF admin set fix value from admin as markup rate
                    $mark_up_fee = get_option('wc_settings_hand_free_mark_up_wwe_small_packages');

                    $calculate_type = 1;
                }
                //  }

                if ($wwe_small_packges_shipping_addrss > 0) {

                    if (count($all_freight_array) > 0) {

                        $count_wwe_carrier = 0;

                        // loop on all services to calculate markup rate
                        foreach ($all_freight_array as $wwe_freight):

                            $calculated_mark_up_price = "";

                            if ($calculate_type > 0) {

                                if ($calculate_type == 2) {

                                    // formula to calculate markup / 
                                    $percent_mark_up_ = $mark_up_fee / 100;

                                    $percent_mark_up_free = $percent_mark_up_ + 1;

                                    $calculated_mark_up_price = $percent_mark_up_free;
                                }
                                if ($calculate_type == 1) {

                                    // fix value as markup rate on all services
                                    $calculated_mark_up_price = $mark_up_fee;
                                }
                            } else {

                                $calculated_mark_up_price = 1;
                            }


                            // cost from markup as % . and adding price to total cost
                            if ($calculate_type == 2) {

                                if (empty($calculated_mark_up_price)) {

                                    $wwe_cost = $wwe_freight['WWE_rate_cost'];
                                } else {

                                    $wwe_cost = $wwe_freight['WWE_rate_cost'] * $calculated_mark_up_price;
                                }
                            }
                            // cost from markup as fix. adding price to total cost
                            if ($calculate_type == 1) {

                                if (empty($calculated_mark_up_price)) {

                                    $wwe_cost = $wwe_freight['WWE_rate_cost'];
                                } else {

                                    $wwe_cost = $wwe_freight['WWE_rate_cost'] + $calculated_mark_up_price;
                                }
                            }

                            // array of all services
                            $rates['10001' . $count_wwe_carrier] = array(
                                'id' => '10001' . $count_wwe_carrier,
                                'label' => $wwe_freight['WWE_rate_label'],
                                'cost' => $wwe_cost
                            );

                            $count_wwe_carrier ++;

                        endforeach;
                    }

                    // return rate to wooCommrece class
                    if (count($rates)) {
                        foreach ($rates as $key => $rate) {

                            $this->add_rate($rate);
                        }
                    }
                    
                }
            }

        }

    }
}
