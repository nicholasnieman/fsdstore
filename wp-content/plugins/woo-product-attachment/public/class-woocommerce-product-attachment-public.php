<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://www.multidots.com/
 * @since      1.0.0
 *
 * @package    Woocommerce_Product_Attachment
 * @subpackage Woocommerce_Product_Attachment/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Woocommerce_Product_Attachment
 * @subpackage Woocommerce_Product_Attachment/public
 * @author     multidots <mahesh.prajapati@multidots.com>
 */
class Woocommerce_Product_Attachment_Public {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $plugin_name The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string $plugin_name The name of the plugin.
     * @param      string $version The version of this plugin.
     */
    public function __construct($plugin_name, $version) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Woocommerce_Product_Attachment_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Woocommerce_Product_Attachment_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/woocommerce-product-attachment-public.css', array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Woocommerce_Product_Attachment_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Woocommerce_Product_Attachment_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/woocommerce-product-attachment-public.js', array('jquery'), $this->version, false);
    }

    // Start the download if there is a request for that
    public function wcpoa_download_file() {
        if (!empty($_GET["attachment_id"]) && !empty($_GET["download_file"]) && !empty($_GET["wcpoa_attachment_order_id"])) {
            $wcpoa_attachment_order_id = $_GET["wcpoa_attachment_order_id"];
            $order = new WC_Order($wcpoa_attachment_order_id);
            $items = $order->get_items(array('line_item'));

            foreach ($items as $items_key => $items_value) {
                $wcpoa_order_attachment_items = wc_get_order_item_meta($items_key, 'wcpoa_order_attachment_order_arr', true);
                $wcpoa_attachment_ids = $wcpoa_order_attachment_items['wcpoa_attachment_ids'];
                $wcpoa_order_attachment_expired = $wcpoa_order_attachment_items['wcpoa_order_attachment_expired'];
                $wcpoa_order_attachment_expired_new = array();
                $wcpoa_order_attachment_expired_new = array_combine($wcpoa_attachment_ids, $wcpoa_order_attachment_expired);
                $current_date = date("Y/m/d");
                $wcpoa_today_date = strtotime($current_date);
                $download_flag = 0;
                foreach ($wcpoa_order_attachment_expired_new as $attach_key => $attach_value) {
                    if ($attach_key == $_GET["download_file"] && ( (strtotime($attach_value) >= $wcpoa_today_date) || empty($attach_value) )) {
                        $download_flag = 1;
                    }
                }
                if ($download_flag == 1) {
                    $this->wcpoa_send_file();
                }
            }
            wp_die('<strong>This Attachement is Expired.</strong> You are no longer to download this attachement.');
        } else {
            $this->wcpoa_send_file();
        }
    }

    public function wcpoa_send_file() {
        //get filedata
	    if (isset($_GET['attachment_id'])) {
		    $attID = $_GET['attachment_id'];
		    $theFile = wp_get_attachment_url($attID);
		    if (!$theFile) {
			    return;
		    }
		    //clean the fileurl
		    $file_url = stripslashes(trim($theFile));
		    //get filename
		    $file_name = basename($theFile);
		    //get fileextension

		    $file_extension = pathinfo($file_name);

		    //security check
		    $fileName = strtolower($file_url);

		    $file_new_name = $file_name;
		    $content_type = "";
		    // Workaround: Save temp file
		    set_time_limit(0);

		    $url = $file_url;
		    $file = basename($url);

		    $fp = fopen($file, 'w');

		    $ch = curl_init($url);
		    curl_setopt($ch, CURLOPT_FILE, $fp);

		    $data = curl_exec($ch);

		    curl_close($ch);
		    fclose($fp);

		    header('Content-Description: File Transfer');
		    header('Content-Type: application/octet-stream');
		    header('Content-Disposition: attachment; filename=' . basename($file));
		    header('Content-Transfer-Encoding: binary');
		    header('Expires: 0');
		    header('Cache-Control: must-revalidate');
		    header('Pragma: public');
		    header('Content-Length: ' . filesize($file));
		    ob_clean();
		    flush();
		    readfile($file);
		    ob_end_flush();
		    exit;
	    }
    }

    // Adds the new tab
    public function wcpoa_new_product_tab($tabs) {

        global $post;
        $product_id = $post->ID;
        $product_tab_name = get_option('wcpoa_product_tab_name');

        $wcpoa_product_page_enable = get_post_meta($product_id, 'wcpoa_product_page_enable', true);
        if (!empty($wcpoa_product_page_enable)) {
            foreach ($wcpoa_product_page_enable as $wcpoa_p_page_enable) {
                if ($wcpoa_p_page_enable == "yes") {
                    $tabs['wcpoa_product_tab'] = array(
                        'title' => $product_tab_name,
                        'priority' => 50,
                        'callback' => array($this, 'wcpoa_new_product_tab_content')
                    );

                    return $tabs;
                }
            }
        }
    }

    /*
     * The wcpoa_new_product_tab tab content
     */

    public function wcpoa_new_product_tab_content($attachment_id) {
        global $product, $post;
        $wcpoa_text_domain = WCPOA_PLUGIN_TEXT_DOMAIN ;
        $product_id = $post->ID;
        $product = wc_get_product($product_id);
        $wcpoa_attachment_ids = get_post_meta($product_id, 'wcpoa_attachments_id', true);
        $wcpoa_attachment_name = get_post_meta($product_id, 'wcpoa_attachment_name', true);
        $wcpoa_attachment_description = get_post_meta($product_id, 'wcpoa_attachment_description', true);
        $wcpoa_product_page_enable = get_post_meta($product_id, 'wcpoa_product_page_enable', true);
        $wcpoa_attachment_url = get_post_meta($product_id, 'wcpoa_attachment_url', true);
        $wcpoa_expired_date = get_post_meta($product_id, 'wcpoa_expired_date', true);
        $wcpoa_expired_date_tlabel = get_option('wcpoa_expired_date_label');
        $get_permalink_structure = get_permalink();
        if (strpos($get_permalink_structure, "?")) {
            $wcpoa_attachment_url_arg = '&';
        } else {
            $wcpoa_attachment_url_arg = '?';
        }

        if (!empty($wcpoa_attachment_ids)) {
            foreach ((array) $wcpoa_attachment_ids as $key => $wcpoa_attachments_id) {
                if (!empty($wcpoa_attachments_id)) {

                    $wcpoa_attachments_name = isset($wcpoa_attachment_name[$key]) && !empty($wcpoa_attachment_name[$key]) ? $wcpoa_attachment_name[$key] : '';
                    $wcpoa_attachment_file = isset($wcpoa_attachment_url[$key]) && !empty($wcpoa_attachment_url[$key]) ? $wcpoa_attachment_url[$key] : '';
                    $wcpoa_product_pages_enable = isset($wcpoa_product_page_enable[$key]) && !empty($wcpoa_product_page_enable[$key]) ? $wcpoa_product_page_enable[$key] : '';
                    $wcpoa_expired_dates = isset($wcpoa_expired_date[$key]) && !empty($wcpoa_expired_date[$key]) ? $wcpoa_expired_date[$key] : '';
                    $wcpoa_attachment_descriptions = isset($wcpoa_attachment_description[$key]) && !empty($wcpoa_attachment_description[$key]) ? $wcpoa_attachment_description[$key] : '';
                    $attachment_id = $wcpoa_attachment_file; // ID of attachment
                    $current_date = date("Y/m/d");
                    if ($wcpoa_product_pages_enable == "yes") {
                        $wcpoa_attachment_expired_date = strtotime($wcpoa_expired_dates);
                        $wcpoa_today_date = strtotime($current_date);
                        $wcpoa_attachments_name = '<h3 class="wcpoa_attachment_name">' . __($wcpoa_attachments_name, $wcpoa_text_domain) . '</h3>';
                        $wcpoa_file_url_btn = '<a class="wcpoa_attachmentbtn" href="' . get_permalink() . $wcpoa_attachment_url_arg . 'attachment_id=' . $attachment_id . '&download_file=' . $wcpoa_attachments_id . '" rel="nofollow">Download</a>';
                        $wcpoa_file_expired_url_btn = '<a class="wcpoa_order_attachment_expire" rel="nofollow">' . __('Download', $wcpoa_text_domain) . ' </a>';
                        if($wcpoa_expired_date_tlabel == 'no'){
                            $wcpoa_expire_date_text = '';
                            $wcpoa_expired_date_text = '';
                            $wcpoa_never_expired_date_text = '';
                        } else {
                            $wcpoa_expire_date_text = '<p class="order_att_expire_date"> <span>*</span>' . __('This Attachment Expiry Date :: ', $wcpoa_text_domain) . $wcpoa_expired_dates . '</p>';
                            $wcpoa_expired_date_text = '<p class="order_att_expire_date">' . __('This Attachment Expired.', $wcpoa_text_domain) . '</p>';
                            $wcpoa_never_expired_date_text = '<p class="order_att_expire_date"> <span>*</span>' . __('This Attachment Never Expires.', $wcpoa_text_domain) . '</p>';
                        }
                        $wcpoa_attachment_descriptions = '<p class="wcpoa_attachment_desc">' . __($wcpoa_attachment_descriptions,$wcpoa_text_domain) . '</p>';
                        if (!empty($wcpoa_attachment_expired_date)) {
                            if ($wcpoa_today_date > $wcpoa_attachment_expired_date) {
                                echo $wcpoa_attachments_name;
                                echo $wcpoa_file_expired_url_btn;
                                echo $wcpoa_attachment_descriptions;
                                echo $wcpoa_expired_date_text;
                            } else {
                                echo $wcpoa_attachments_name;
                                echo $wcpoa_file_url_btn;
                                echo $wcpoa_attachment_descriptions;
                                echo $wcpoa_expire_date_text;
                            }
                        } else {
                            echo $wcpoa_attachments_name;
                            echo $wcpoa_file_url_btn;
                            echo $wcpoa_attachment_descriptions;
                        }
                    }
                }
            }
        }
    }

    /**
     * Product attachments data save in order table.
     *
     * @param $item_id
     */
	public function wcpoa_add_values_to_order_item_meta($item_id, $item, $order_id) {

		$item_product = new WC_Order_Item_Product($item);

		$product_id = $item_product->get_product_id();
		$wcpoa_attachment_ids = get_post_meta($product_id, 'wcpoa_attachments_id', true);
		$wcpoa_attachment_name = get_post_meta($product_id, 'wcpoa_attachment_name', true);
		$wcpoa_attachment_description = get_post_meta($product_id, 'wcpoa_attachment_description', true);
		$wcpoa_attachment_url = get_post_meta($product_id, 'wcpoa_attachment_url', true);
		$wcpoa_variation = get_post_meta($product_id, 'wcpoa_variation', true);
		$wcpoa_order_status = get_post_meta($product_id, 'wcpoa_order_status', true);
		$wcpoa_expired_date = get_post_meta($product_id, 'wcpoa_expired_date', true);

		if (!empty($wcpoa_attachment_ids)) {
			$wcpoa_order_attachment_order_arr = array(
				'wcpoa_attachment_ids' => $wcpoa_attachment_ids,
				'wcpoa_attachment_name' => $wcpoa_attachment_name,
				'wcpoa_att_order_description' => $wcpoa_attachment_description,
				'wcpoa_attachment_url' => $wcpoa_attachment_url,
				'wcpoa_order_status' => $wcpoa_order_status,
				'wcpoa_order_product_variation' => $wcpoa_variation,
				'wcpoa_order_attachment_expired' => $wcpoa_expired_date
			);
			wc_add_order_item_meta($item_id, 'wcpoa_order_attachment_order_arr', $wcpoa_order_attachment_order_arr);
		}
	}

    /**
     * Product attachments data show on each order page.
     *
     * @since    1.0.0
     * @access   public
     */
    public function wcpoa_order_data_show($order_id) {
        $wcpoa_text_domain = WCPOA_PLUGIN_TEXT_DOMAIN ;
        $order = new WC_Order($order_id);
        $items = $order->get_items(array('line_item'));
        $items_order_status = $order->get_status();
        $items_order_id = $order->get_order_number();
        $wcpoa_order_tab_name = get_option('wcpoa_order_tab_name'); //wcpoa order tab option name
        $wcpoa_expired_date_tlabel = get_option('wcpoa_expired_date_label');
        //wcpoa order tab name

        foreach ($items as $item_id => $item) {
            $wcpoa_order_attachment_items = wc_get_order_item_meta($item_id, 'wcpoa_order_attachment_order_arr', true);
            $wcpoa_order_product_variation_id = $item['variation_id'];
            if (!empty($wcpoa_order_attachment_items)) {
                $wcpoa_attachment_ids = $wcpoa_order_attachment_items['wcpoa_attachment_ids'];
                $wcpoa_attachment_name = $wcpoa_order_attachment_items['wcpoa_attachment_name'];
                $wcpoa_attachment_description = $wcpoa_order_attachment_items['wcpoa_att_order_description'];
                $wcpoa_attachment_url = $wcpoa_order_attachment_items['wcpoa_attachment_url'];
                $wcpoa_order_status = $wcpoa_order_attachment_items['wcpoa_order_status'];
                $wcpoa_order_product_variation = $wcpoa_order_attachment_items['wcpoa_order_product_variation'];
                $wcpoa_order_attachment_expired = $wcpoa_order_attachment_items['wcpoa_order_attachment_expired'];
                echo '<section class="woocommerce-attachment-details">';
                if (!empty($wcpoa_attachment_ids)) {
                    //Woo Product Attachment Order Tab
                    $wcpoa_order_status_tab = array();
                    $wcpoa_order_tab_flag = 0; 
                    foreach ((array) $wcpoa_attachment_ids as $status_tab_key => $wcpoa_attachments_id) {
                        $wcpoa_order_status_tab = str_replace('wcpoa-wc-', '', $wcpoa_order_status[$wcpoa_attachments_id]);
                        if (!empty($wcpoa_order_status_tab) && in_array($items_order_status, $wcpoa_order_status_tab)) {
                            $wcpoa_order_tab_flag = 1;
                        }
                    }
                    if ($wcpoa_order_tab_flag == 1) {
                        echo '<h2 class="woocommerce-order-details__title">' . $wcpoa_order_tab_name . '</h2>';
                    } elseif ( empty($wcpoa_order_status_tab)) {
                        echo '<h2 class="woocommerce-order-details__title">' . $wcpoa_order_tab_name . '</h2>';
                    }
                    //End Woo Product Attachment Order Tab
                    
                    foreach ((array) $wcpoa_attachment_ids as $key => $wcpoa_attachments_id) {
                        $attachment_name = isset($wcpoa_attachment_name[$key]) && !empty($wcpoa_attachment_name[$key]) ? $wcpoa_attachment_name[$key] : '';
                        $wcpoa_attachment_file = isset($wcpoa_attachment_url[$key]) && !empty($wcpoa_attachment_url[$key]) ? $wcpoa_attachment_url[$key] : '';
                        $wcpoa_attachment_descriptions = isset($wcpoa_attachment_description[$key]) && !empty($wcpoa_attachment_description[$key]) ? $wcpoa_attachment_description[$key] : '';
                        $wcpoa_order_status_new = str_replace('wcpoa-wc-', '', $wcpoa_order_status[$wcpoa_attachments_id]);
                        $wcpoa_order_attachment_expired_date = isset($wcpoa_order_attachment_expired[$key]) && !empty($wcpoa_order_attachment_expired[$key]) ? $wcpoa_order_attachment_expired[$key] : '';
                        $attachment_id = $wcpoa_attachment_file; // ID of attachment
                        $current_date = date("Y/m/d");
                        $wcpoa_attachment_expired_date = strtotime($wcpoa_order_attachment_expired_date);
                        $wcpoa_today_date = strtotime($current_date);
                        $get_permalink_structure = get_permalink();
                        if (strpos($get_permalink_structure, "?")) {
                            $wcpoa_attachment_url_arg = '&';
                        } else {
                            $wcpoa_attachment_url_arg = '?';
                        }
                        $attachment_order_name = '<h3 class="wcpoa_attachment_name">' . __($attachment_name, $wcpoa_text_domain) . '</h3>';
                        $wcpoa_file_url_btn = '<a class="wcpoa_attachmentbtn" href="' . get_permalink() . $wcpoa_attachment_url_arg . 'attachment_id=' . $attachment_id . '&download_file=' . $wcpoa_attachments_id . '&wcpoa_attachment_order_id=' . $items_order_id . '" rel="nofollow">Download</a>';
                        $wcpoa_file_expired_url_btn = '<a class="wcpoa_order_attachment_expire" rel="nofollow">' . __('Download', $wcpoa_text_domain) . '</a>';
                        if($wcpoa_expired_date_tlabel == 'no'){
                            $wcpoa_expire_date_text = '';
                            $wcpoa_expired_date_text = '';
                            $wcpoa_never_expired_date_text = '';
                        }  else {
                            $wcpoa_expire_date_text = '<p class="order_att_expire_date">' . __('This Attachment Expiry Date :: ', $wcpoa_text_domain) . $wcpoa_order_attachment_expired_date . '</p>';
                            $wcpoa_expired_date_text = '<p class="order_att_expire_date">' . __('This Attachment Expired', $wcpoa_text_domain) . '</p>';
                            $wcpoa_never_expired_date_text = '<p class="order_att_expire_date">' . __('This Attachment Never Expires', $wcpoa_text_domain) . '</p>';
                        }
                        $wcpoa_order_attachment_descriptions = '<p class="wcpoa_attachment_desc">' . __($wcpoa_attachment_descriptions , $wcpoa_text_domain) . '</p>';
                        if (!empty($wcpoa_order_status_new)) {
                            if (!empty($wcpoa_attachment_expired_date)) {
                                if ($wcpoa_today_date > $wcpoa_attachment_expired_date) {
                                    if (in_array($items_order_status, $wcpoa_order_status_new)) {
                                        if (!empty($wcpoa_order_product_variation_id) && in_array($wcpoa_order_product_variation_id, $wcpoa_order_product_variation[$wcpoa_attachments_id])) {
                                            echo $attachment_order_name;
                                            echo $wcpoa_file_expired_url_btn;
                                            echo $wcpoa_expired_date_text;
                                            echo $wcpoa_order_attachment_descriptions;
                                        } else {
                                            echo $attachment_order_name;
                                            echo $wcpoa_file_expired_url_btn;
                                            echo $wcpoa_expired_date_text;
                                            echo $wcpoa_order_attachment_descriptions;
                                        }
                                    }
                                } else {
                                    if (in_array($items_order_status, $wcpoa_order_status_new)) {
                                        if (!empty($wcpoa_order_product_variation_id) && in_array($wcpoa_order_product_variation_id, $wcpoa_order_product_variation[$wcpoa_attachments_id])) {
                                            echo $attachment_order_name;
                                            echo $wcpoa_file_url_btn;
                                            echo $wcpoa_expire_date_text;
                                            echo $wcpoa_order_attachment_descriptions;
                                        } else {
                                            echo $attachment_order_name;
                                            echo $wcpoa_file_url_btn;
                                            echo $wcpoa_expire_date_text;
                                            echo $wcpoa_order_attachment_descriptions;
                                        }
                                    }
                                }
                            } else {
                                if (in_array($items_order_status, $wcpoa_order_status_new)) {
                                    if (!empty($wcpoa_order_product_variation_id) && in_array($wcpoa_order_product_variation_id, $wcpoa_order_product_variation[$wcpoa_attachments_id])) {
                                        echo $attachment_order_name;
                                        echo $wcpoa_file_url_btn;
                                        echo $wcpoa_order_attachment_descriptions;
                                    } else {
                                        echo $attachment_order_name;
                                        echo $wcpoa_file_url_btn;
                                        echo $wcpoa_order_attachment_descriptions;
                                    }
                                }
                            }
                        } else {
                            if (!empty($wcpoa_attachment_expired_date)) {
                                if ($wcpoa_today_date > $wcpoa_attachment_expired_date) {
                                    echo $attachment_order_name;
                                    echo $wcpoa_file_expired_url_btn;
                                    echo $wcpoa_expired_date_text;
                                    echo $wcpoa_order_attachment_descriptions;
                                } else {
                                    echo $attachment_order_name;
                                    echo $wcpoa_file_url_btn;
                                    echo $wcpoa_order_attachment_descriptions;
                                }
                            } else {
                                echo $attachment_order_name;
                                echo $wcpoa_file_url_btn;
                                echo $wcpoa_order_attachment_descriptions;
                            }
                        }
                    }
                }
            }
        }
        echo '</section>';
        return null;
    }

    /*
     * Emails Attachment
     */

    public function wcpoa_woocommerce_email_order_attachment($fields, $sent_to_admin, $order_id) {

        $this->wcpoa_order_data_show($order_id);
        return $fields;
    }

    /*
     * Emails Attachment custome style
     */

    public function wcpoa_woocommerce_email_add_css_to_email_attachment() {
        echo '<st' . 'yle type="text/css">
                        a.wcpoa_attachmentbtn {padding: 10px;background: #35a87b;color: #fff;}
                        a.wcpoa_order_attachment_expire {padding: 10px;background: #ccc;color: #ffffff;cursor: no-drop;box-shadow: none;}
                        .wcpoa_attachment_desc{padding: 8px 0px;}
                        .order_att_expire_date { padding: 8px 0px; }

                </st' . 'yle>';
    }
}
