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
class WC_Settings_Small_Packages extends WC_Settings_Page {

    /**
     * Constructor
     */
    public function __construct() {

        $this->id = 'wwe_small_packages_quotes';
        add_filter('woocommerce_settings_tabs_array', array($this, 'add_settings_tab'), 50);
        add_action('woocommerce_sections_' . $this->id, array($this, 'output_sections'));
        add_action('woocommerce_settings_' . $this->id, array($this, 'output'));
        add_action('woocommerce_settings_save_' . $this->id, array($this, 'save'));
    }

    /**
     * Add plugin options tab
     *
     * @return array
     */
    public function add_settings_tab($settings_tabs) {

        $settings_tabs[$this->id] = __('Speedship', 'woocommerce-settings-wwe_small_packages_quotes');

        return $settings_tabs;
    }

    /**
     * Get sections
     *
     * @return array
     */
    public function get_sections() {

        /**
         * Create section in small packages tab in woocommree admin tab
         */
        $sections = array(
            'section-0' => __('Connection', 'woocommerce-settings-wwe_small_packages_quotes'),
            'section 1' => __('Settings', 'woocommerce-settings-wwe_small_packages_quotes'),
        );

        return apply_filters('woocommerce_get_sections_' . $this->id, $sections);
    }

    /**
     * Get sections
     *
     * @return array
     */
    public function speeship_con_setting() {

        echo '<div class="connection_section_class">';
        /**
         * Tiltle of tab
         */
        $settings = array(
            'section_title_wwe_small_packages' => array(
                'name' => __('', 'woocommerce-settings-wwe_small_packages_quotes'),
                'type' => 'title',
                'desc' => '<br> ',
                'id' => 'wc_settings_wwe_small_packages_title_section_connection',
            ),
            /**
             * world woide account Number input field
             */
            'account_number_wwe_small_packages_quotes' => array(
                'name' => __('Worldwide Express Account Number : ', 'woocommerce-settings-wwe_small_packages_quotes'),
                'type' => 'text',
                'desc' => __('', 'woocommerce-settings-wwe_small_packages_quotes'),
                'id' => 'wc_settings_account_number_wwe_small_packages_quotes',
                'placeholder' => 'Please Enter Speedship Worldwide Express Account Number'
            ),
            /**
             * Speed Ship UserName input field
             */
            'username_wwe_small_packages_quotes' => array(
                'name' => __('Speedship Username : ', 'woocommerce-settings-wwe_small_packages_quotes'),
                'type' => 'text',
                'desc' => __('', 'woocommerce-settings-wwe_small_packages_quotes'),
                'id' => 'wc_settings_username_wwe_small_packages_quotes',
                'placeholder' => 'Please Enter Speedship Username'
            ),
            /**
             * Speed Ship Password input field
             */
            'password_wwe_small_packages' => array(
                'name' => __('Speedship Password : ', 'woocommerce-settings-wwe_small_packages_quotes'),
                'type' => 'text',
                'desc' => __('', 'woocommerce-settings-wwe_small_packages_quotes'),
                'id' => 'wc_settings_password_wwe_small_packages',
                'placeholder' => 'Please Enter Speedship Password'
            ),
            /**
             * Speed Ship Authenticaion Key input field
             */
            'authentication_key_wwe_small_packages_quotes' => array(
                'name' => __('Authentication Key : ', 'woocommerce-settings-wwe_small_packages_quotes'),
                'type' => 'text',
                'desc' => __('', 'woocommerce-settings-wwe_small_packages_quotes'),
                'id' => 'wc_settings_authentication_key_wwe_small_packages_quotes',
                'placeholder' => 'Please Enter Authentication Key'
            ),
            /**
             * Plugin License Key input field
             */
            'plugin_licence_key_wwe_small_packages_quotes' => array(
                'name' => __('Plugin license Key : ', 'woocommerce-settings-wwe_small_packages_quotes'),
                'type' => 'text',
                'desc' => __('obtain a License Key from <a href="https://eniture.com/products/" target="_blank" >eniture.com </a>', 'woocommerce-settings-wwe_small_packages_quotes'),
                'id' => 'wc_settings_plugin_licence_key_wwe_small_packages_quotes',
                'placeholder' => 'Please Enter Plugin license Key'
            ),
            'section_end_wwe_small_packages' => array(
                'type' => 'sectionend',
                'id' => 'wc_settings_plugin_licence_key_wwe_small_packages_quotes'
            ),
        );

        return $settings;
    }

    public function get_settings($section = null) {

        /**
         * small packages connection tab, on clicking on connection link
         * */
        switch ($section) {

            case 'section-0' :

                $settings = $this->speeship_con_setting();

                break;
            /**
             * Small packages Setting tab, on clicking on Setting tab link
             * */
            case 'section-1':
                $settings = array(
                    'section_title_quote' => array(
                        //'name' => __('Quote Settings', 'woocommerce-settings-wwe_small_packages_quotes'),
                        'title' => __('', 'woocommerce-settings-wwe_small_packages_quotes'),
                        'type' => 'title',
                        'desc' => 'Shipment Origin',
                        'id' => 'wc_settings_wwe_section_title_quote'
                    ),
                    /**
                     *  Origin Zip Code input field
                     */
                    'wwe_small_packages_zip_code' => array(
                        'name' => __('ZIP Code:', 'woocommerce-settings-wwe_small_packages_quotes'),
                        'type' => 'text',
                        'desc' => __('Please Enter origin Zip code e.g. 30214.', 'woocommerce-settings-wwe_small_packages_quotes'),
                        'id' => 'wc_settings_wwe_small_packages_zip_code',
                        'placeholder' => 'Please Enter ZIP Code.'
                    ),
                    /**
                     *  Origin City input field
                     */
                    'wwe_small_packages_city' => array(
                        'name' => __('City:', 'woocommerce-settings-wwe_small_packages_quotes'),
                        'type' => 'text',
                        'desc' => __('Please Enter origin City e.g. Fayetteville.', 'woocommerce-settings-wwe_small_packages_quotes'),
                        'id' => 'wc_settings_wwe_small_packages_city',
                        'placeholder' => 'Please Enter City.'
                    ),
                    /**
                     *  Origin State input field
                     */
                    'wwe_small_packages_state' => array(
                        'name' => __('State:', 'woocommerce-settings-wwe_small_packages_quotes'),
                        'type' => 'text',
                        'desc' => __('Please Enter origin State e.g. GA.', 'woocommerce-settings-wwe_small_packages_quotes'),
                        'id' => 'wc_settings_wwe_small_packages_state',
                        'placeholder' => 'Please Enter State.',
                        'custom_attributes' => array(
                            'maxlength' => '2'
                        ),
                    ),
                    /**
                     *  Origin country input field
                     */
                    'wwe_small_packages_country' => array(
                        'name' => __('Country:', 'woocommerce-settings-wwe_small_packages_quotes'),
                        'type' => 'text',
                        'desc' => __('Origin restricted to points within the continental United States.', 'woocommerce-settings-tab-demo'),
                        'id' => 'wc_settings_wwe_small_packages_country',
                        'default' => 'US',
                        'custom_attributes' => array(
                            'readonly' => 'readonly'
                        ),
                    ),
                    /**
                     *  Services Section title
                     */
                    'Services_quoted_wwe_small_packages' => array(
                        'title' => __('', 'woocommerce'),
                        'name' => __('', 'woocommerce-settings-wwe_small_packages_quotes'),
                        'desc' => '',
                        'id' => 'woocommerce_Services_quoted_wwe_small_packages',
                        'css' => '',
                        'default' => '',
                        'type' => 'title',
                    ),
                    'Sevice_wwe_small_packages' => array(
                        'name' => __('Quote Service Options:', 'woocommerce-settings-wwe_small_packages_quotes'),
                        'type' => 'title',
                        'desc' => '',
                        'id' => 'wc_settings_Sevice_wwe_small_packages'
                    ),
                    /**
                     *  UPS Next Day Early AM  Input Field
                     */
                    'Service_UPS_Next_Day_Early_AM_small_packages_quotes' => array(
                        'name' => __('UPS Next Day Early AM', 'woocommerce-settings-wwe_small_packages_quotes'),
                        'type' => 'checkbox',
                        'desc' => __('', 'woocommerce-settings-wwe_small_packages_quotes'),
                        'id' => 'wc_settings_Service_UPS_Next_Day_Early_AM_small_packages_quotes',
                        'class' => 'quotes_services',
                    ),
                    /**
                     *  UPS Next Day Air Input Field
                     */
                    'Service_UPS_Next_Day_Air_small_packages_quotes' => array(
                        'name' => __('UPS Next Day Air', 'woocommerce-settings-wwe_small_packages_quotes'),
                        'type' => 'checkbox',
                        'desc' => __('', 'woocommerce-settings-wwe_small_packages_quotes'),
                        'id' => 'wc_settings_Service_UPS_Next_Day_Air_small_packages_quotes',
                        'class' => 'quotes_services',
                    ),
                    /**
                     *  UPS Next Day Air Saver Input Field
                     */
                    'Service_UPS_Next_Day_Air_Saver_small_packages_quotes' => array(
                        'name' => __('UPS Next Day Air Saver', 'woocommerce-settings-wwe_small_packages_quotes'),
                        'type' => 'checkbox',
                        'desc' => __('', 'woocommerce-settings-wwe_small_packages_quotes'),
                        'id' => 'wc_settings_Service_UPS_Next_Day_Air_Saver_small_packages_quotes',
                        'class' => 'quotes_services',
                    ),
                    /**
                     *  UPS 2nd Day AM Input Field
                     */
                    'Service_UPS_2nd_Day_AM_quotes' => array(
                        'name' => __('UPS 2nd Day AM', 'woocommerce-settings-wwe_small_packages_quotes'),
                        'type' => 'checkbox',
                        'desc' => __('', 'woocommerce-settings-wwe_small_packages_quotes'),
                        'id' => 'wc_settings_Service_UPS_2nd_Day_AM_quotes',
                        'class' => 'quotes_services',
                    ),
                    /**
                     *  UPS 2nd Day PM Input Field
                     */
                    'Service_UPS_2nd_Day_PM_quotes' => array(
                        'name' => __('UPS 2nd Day PM', 'woocommerce-settings-wwe_small_packages_quotes'),
                        'type' => 'checkbox',
                        'desc' => __('', 'woocommerce-settings-wwe_small_packages_quotes'),
                        'id' => 'wc_settings_Service_UPS_2nd_Day_PM_quotes',
                        'class' => 'quotes_services',
                    ),
                    /**
                     *  UPS 3rd Day Input Field
                     */
                    'Service_UPS_3rd_Day_quotes' => array(
                        'name' => __('UPS 3rd Day', 'woocommerce-settings-wwe_small_packages_quotes'),
                        'type' => 'checkbox',
                        'desc' => __('', 'woocommerce-settings-wwe_small_packages_quotes'),
                        'id' => 'wc_settings_Service_UPS_3rd_Day_quotes',
                        'class' => 'quotes_services',
                    ),
                    /**
                     *  UPS Ground Input Field
                     */
                    'Service_UPS_Ground_quotes' => array(
                        'name' => __('UPS Ground', 'woocommerce-settings-wwe_small_packages_quotes'),
                        'type' => 'checkbox',
                        'desc' => __('', 'woocommerce-settings-wwe_small_packages_quotes'),
                        'id' => 'wc_settings_Service_UPS_Ground_quotes',
                        'class' => 'quotes_services',
                    ),
                    /**
                     *  Quotes as Residential Delivery Input Field
                     */
                    'quest_as_residential_delivery_wwe_small_packages' => array(
                        'name' => __('Quote as Residential Delivery:', 'woocommerce-settings-wwe_small_packages_quotes'),
                        'type' => 'checkbox',
                        'desc' => __('', 'woocommerce-settings-wwe_small_packages_quotes'),
                        'id' => 'wc_settings_quest_as_residential_delivery_wwe_small_packages'
                    ),
                    /**
                     *  Hand Free / Mark Up Input Field
                     */
                    'hand_free_mark_up_wwe_small_packages' => array(
                        'name' => __('Handling Fee / Mark Up:', 'woocommerce-settings-wwe_small_packages_quotes'),
                        'type' => 'text',
                        'desc' => 'Amount excluding tax. Enter an amount, e.g 3.75, or a percentage, e.g, 5%. Leave blank to disable.',
                        'id' => 'wc_settings_hand_free_mark_up_wwe_small_packages'
                    ),
                    // Quote Settings Allow other plugins Admin Field
                    'allow_other_plugins_wwe_small_packages' => array(
                        'name' => __('Allow other plugins to show quotes:', 'woocommerce-settings-wwe_small_packages_quotes'),
                        'type' => 'select',
                        'default' => '3',
                        'desc' => __('', 'woocommerce-settings-wwe_small_packages_quotes'),
                        'id' => 'wc_settings_allow_other_plugins_wwe_small_packages',
                        'options' => array(
                            'no' => __('NO', 'NO'),
                            'yes' => __('YES', 'YES')
                        )
                    ),
                    /**
                     *  Quotes as Residential Delivery Input Field
                     */
                    'unable_retrieve_shipping_clear_wwe_small_packages' => array(
                        'title' => __('', 'woocommerce'),
                        'name' => __('', 'woocommerce-settings-wwe_small_packages_quotes'),
                        'desc' => '',
                        'id' => 'woocommerce_unable_retrieve_shipping_clear_wwe_small_packages',
                        'css' => '',
                        'default' => '',
                        'type' => 'title',
                    ),
                    
                    'unable_retrieve_shipping_wwe_small_packages' => array(
                        'name' => __('Checkout options if the plugin fails to return a rate:', 'woocommerce-settings-wwe_small_packages_quotes'),
                        'type' => 'title',
                        'desc' => 'When the plugin is unable to retrieve shipping quotes and no other shipping options are provided by an alternative source:',
                        'id' => 'wc_settings_unable_retrieve_shipping_wwe_small_packages'
                    ),
                    
                    'pervent_checkout_proceed_wwe_small_packages' => array(
                        'name' => __('', 'woocommerce-settings-wwe_small_packages_quotes'),
                        'type' => 'radio',
                        'options' => array(
                            'allow' => __('Allow user to continue to check out and display this message: <br><textarea name="allow_user_to_proceed_checkout" class="prevent_text_box" >'. get_option("allow_user_to_proceed_checkout") .'</textarea>', 'woocommerce'),
                            'prevent' => __('Prevent user from checking out and display this message: &nbsp; &nbsp; &nbsp; &nbsp;<br><textarea name="prevent_user_to_proceed_checkout" class="prevent_text_box" >'. get_option("prevent_user_to_proceed_checkout") .'</textarea>', 'woocommerce'),

                        ),
                        'id' => 'wc_settings_pervent_checkout_proceed_wwe_small_packages',
                    ),
                    
                    'section_end_quote' => array(
                        'type' => 'sectionend',
                        'id' => 'wc_settings_quote_section_end'
                    )
                );
                break;


            /**
             * Small packges defual tab, under Small packages tab
             * */
            default:

                $settings = $this->speeship_con_setting();

                break;
        }

        return apply_filters('woocommerce-settings-wwe_small_packages_quotes', $settings, $section);
    }

    /**
     * Output the settings
     */
    public function output() {
        global $current_section;
        $settings = $this->get_settings($current_section);
        WC_Admin_Settings::output_fields($settings);
    }

    /**
     * Save settings
     */
    public function save() {
        global $current_section;

        $settings = $this->get_settings($current_section);

        WC_Admin_Settings::save_fields($settings);
    }

}

return new WC_Settings_Small_Packages();
