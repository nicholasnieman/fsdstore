<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.multidots.com/
 * @since      1.0.0
 *
 * @package    Woocommerce_Product_Attachment
 * @subpackage Woocommerce_Product_Attachment/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Woocommerce_Product_Attachment
 * @subpackage Woocommerce_Product_Attachment/admin
 * @author     multidots <mahesh.prajapati@multidots.com>
 */
class Woocommerce_Product_Attachment_Admin
{

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
     * @param      string $plugin_name The name of this plugin.
     * @param      string $version The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

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
        $current_screen = get_current_screen();
        $post_type = $current_screen->post_type;
        if (isset($_GET['page']) && !empty($_GET['page']) && ($_GET['page'] == "woocommerce_product_attachment") || !empty($post_type) && ($post_type == 'product')) {
            wp_enqueue_style('thickbox');
            wp_enqueue_style($this->plugin_name . '-wcpoa-main-style', plugin_dir_url(__FILE__) . 'css/style.css', array(), $this->version, 'all');
            wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/woocommerce-product-attachment-admin.css', array(), $this->version, 'all');
            wp_enqueue_style($this->plugin_name . '-wcpoa-main-style', plugin_dir_url(__FILE__) . 'css/style.css', array(), $this->version, 'all');
            wp_enqueue_style($this->plugin_name . '-font-awesome', plugin_dir_url(__FILE__) . 'css/font-awesome.min.css', array(), $this->version, 'all');
            wp_enqueue_style($this->plugin_name . '-main-jquery-ui', plugin_dir_url(__FILE__) . 'css/jquery-ui.min.css', array(), $this->version, 'all');
        }
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

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
        $current_screen = get_current_screen();
        $post_type = $current_screen->post_type;
        if (isset($_GET['page']) && !empty($_GET['page']) && ($_GET['page'] == "woocommerce_product_attachment") || !empty($post_type) && ($post_type == 'product')) {
            wp_enqueue_script('jquery');
            wp_enqueue_script('media-upload');
            wp_enqueue_script('thickbox');
            wp_enqueue_script('jquery-ui-core');
            wp_enqueue_script('jquery-ui-datepicker');
            wp_enqueue_style('wp-jquery-ui-dialog');
            wp_enqueue_script($this->plugin_name . '-datepicker', plugin_dir_url(__FILE__) . 'js/datepicker.min.js', array('jquery'), $this->version, false);
            wp_enqueue_script($this->plugin_name . '-validation', plugin_dir_url(__FILE__) . 'js/jquery.validation.js', array('jquery'), $this->version, false);
            wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/woocommerce-product-attachment-admin.js', array('jquery'), $this->version, false);
            wp_enqueue_style($this->plugin_name . '-jquery-ui-css', plugin_dir_url(__FILE__) . 'css/jquery-ui.min.css', array(), $this->version, 'all');
            wp_enqueue_script($this->plugin_name . '-main', plugin_dir_url(__FILE__) . 'js/wcpoa-input.js', array('jquery'), $this->version, false);
            wp_enqueue_script($this->plugin_name . 'custom-jquery', plugin_dir_url(__FILE__) . 'js/custom-script.js', array('jquery', 'jquery-ui-dialog', 'jquery-ui-accordion', 'jquery-ui-sortable'), $this->version, false);
            wp_enqueue_media();
        }
    }
    
     public function welcome_wcpoa_plugin_screen_do_activation_redirect() {
        // if no activation redirect
        if (!get_transient('_welcome_screen_activation_redirect_data')) {
            return;
        }

        // Delete the redirect transient
        delete_transient('_welcome_screen_activation_redirect_data');

        // if activating from network, or bulk
        if (is_network_admin() || isset($_GET['activate-multi'])) {
            return;
        }
        // Redirect to extra cost welcome  page

        wp_safe_redirect(add_query_arg(array('page' => 'woocommerce_product_attachment&tab=wcpoa-plugin-getting-started'), admin_url('admin.php')));
    }
    
    /**
     *
     * dotsstore menu add
     */
    public function dot_store_menu()
    {
        global $GLOBALS;
        
        if (empty($GLOBALS['admin_page_hooks']['dots_store'])) {
            add_menu_page(
                'DotStore Plugins', 'DotStore Plugins', 'NULL', 'dots_store', array($this, 'dot_store_menu_page'), plugin_dir_url(__FILE__) . 'images/menu-icon.png', 25
            );
        }
    }

    /**
     *
     * WooCommerce Product Attachment menu add
     */
    public function wcpoa_plugin_menu()
    {
        add_submenu_page("dots_store", "WooCommerce Product Attachment", "WooCommerce Product Attachment", "manage_options", "woocommerce_product_attachment", array($this, "wcpoa_options_page"), "", 99);
    }

    /**
     * WooCommerce Product Attachment Option Page HTML
     *
     */
    public function wcpoa_options_page() {
        include_once('partials/header/plugin-header.php');
        if (!empty($_GET["tab"])) {
            if ($_GET["tab"] == "wcpoa_plugin_setting_page") {
                self::wcpoa_setting_page();
            }
            if ($_GET['tab'] == "wcpoa-plugin-getting-started") {
                self::wcpoa_get_started_dots_about_plugin_settings();
            }
            if($_GET['tab'] == "wcpoa-pro-details-page") {
                self::wcpoa_details_page();
            }
            if ($_GET["tab"] == "wcpoa-plugin-quick-info") {
                self::wcpoa_dotstore_about_plugin_store_pro();
            }

        } else {
            self::wcpoa_setting_page();
        }
        ?>
        <!-- end here !-->
        <?php
        include_once('partials/header/plugin-sidebar.php');
    }

    public function wcpoa_setting_page() {
        //$plugin_name = WCPOA_PLUGIN_NAME;
        //$plugin_version = WCPOA_PLUGIN_VERSION;
        $wcpoa_product_tab = isset($_POST['wcpoa_product_tab_name']) && !empty($_POST['wcpoa_product_tab_name']) ? $_POST['wcpoa_product_tab_name'] : 'WooCommerce Product Attachment';
        $wcpoa_order_tab = isset($_POST['wcpoa_order_tab_name']) && !empty($_POST['wcpoa_order_tab_name']) ? $_POST['wcpoa_order_tab_name'] : 'WooCommerce Product Attachment';
        $wcpoa_expired_date_label = isset($_POST['wcpoa_expired_date_label']) && !empty($_POST['wcpoa_expired_date_label']) ? $_POST['wcpoa_expired_date_label'] : '';

        //save on database two tab value
        if (isset($_POST["submit"]) && isset($_GET['page']) == 'woocommerce_product_attachment') {
            update_option('wcpoa_product_tab_name', $wcpoa_product_tab);
            update_option('wcpoa_order_tab_name', $wcpoa_order_tab);
            update_option('wcpoa_expired_date_label', $wcpoa_expired_date_label);
        }
        //store value in variable
        $wcpoa_product_tname = get_option('wcpoa_product_tab_name');
        $wcpoa_order_tname = get_option('wcpoa_order_tab_name');
        $wcpoa_expired_date_tlabel = get_option('wcpoa_expired_date_label');
        ?>
        <div class="wcpoa-section-left">
            <div class="wcpoa-table-main">
            <form method="post" action="#">
                <table class="wcpoa-tableouter">
                    <tbody>
                    <tr>
                        <th>
                            <span class="wcpoa-name"><?php _e('Product Details Page Tab Title') ?></span>
                        </th>
                        <td class="">
                            <div class="wcpoa-name-txtbox">
                                <input type="text" name="wcpoa_product_tab_name"
                                       value="<?php echo $wcpoa_product_tname; ?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <span class="wcpoa-name"><?php _e('Order Details Page Tab Title') ?></span>
                        </th>
                        <td class="">
                            <div class="wcpoa-name-txtbox">
                                <input type="text" name="wcpoa_order_tab_name" value="<?php echo $wcpoa_order_tname ?>">
                            </div>
                        </td>
                    </tr>
                      <tr>
                        <th>
                            <span class="wcpoa-name"><?php _e('Attachements Date Label Show') ?></span>
                        </th>
                        <td class="">
                            <div class="wcpoa-name-txtbox">
                               <select name="wcpoa_expired_date_label" class="wcpoa_expired_date_label" data-type="" data-key="">
                                    <option name="yes" value="yes" <?php echo ($wcpoa_expired_date_tlabel == "yes") ? 'selected' : ''; ?>><?php _e('Yes') ?></option>
                                    <option name="no" value="no" class="" <?php echo ($wcpoa_expired_date_tlabel == "no") ? 'selected' : ''; ?>><?php _e('No') ?></option>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="wcpoa-setting-btn">
                            <?php submit_button(); ?>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>
        </div>
        <?php
    }

    /**
     * function for custom get started page
     *
     */
    function wcpoa_get_started_dots_about_plugin_settings()
    {
        require_once("partials/wcpoa-plugin-get-started.php");
    }
    /**
     * function for pro plugin info page
     *
     */
    function wcpoa_details_page()
    {
        require_once("partials/wcpoa-pro-details-page.php");
    }
    /**
     * Custom menu html for information about plugin
     *
     */
    function wcpoa_dotstore_about_plugin_store_pro()
    {
        require_once("partials/wcpoa-plugin-quick-info.php");
    }

    public function wcpoa_add_meta_box($post_type)
    {
        //global $post;
        $plugin_txt_domain = WCPOA_PLUGIN_TEXT_DOMAIN;
        $post_type = array('product');
        add_meta_box('wcpoa_attachment', __('WooCommerce Product Attachment', $plugin_txt_domain), array($this, 'wcpoa_attachment_product_page'), $post_type, 'advanced', 'high');
    }

    public function wcpoa_hidden_input($atts)
    {
        echo $this->wcpoa_get_hidden_input($atts);
    }

    public function wcpoa_get_hidden_input($atts)
    {
        $atts['type'] = 'hidden';

        return '<input ' . $this->wcpoa_esc_attr($atts) . ' />';
    }

    public function wcpoa_esc_attr($atts)
    {

        // is string?
        if (is_string($atts)) {

            $atts = trim($atts);
            return esc_attr($atts);
        }


        // validate
        if (empty($atts)) {

            return '';
        }


        // vars
        $e = array();


        // loop through and render
        foreach ($atts as $k => $v) {

            // object
            if (is_array($v) || is_object($v)) {

                $v = json_encode($v);

                // boolean
            } elseif (is_bool($v)) {

                $v = $v ? 1 : 0;

                // string
            } elseif (is_string($v)) {

                $v = trim($v);
            }


            // append
            $e[] = $k . '="' . esc_attr($v) . '"';
        }


        // echo
        return implode(' ', $e);
    }

    /**
     *
     */
    public function wcpoa_attachment_product_page()
    {
        global $product, $post, $i, $field;

        // vars
        $div = array(
            'class' => 'wcpoa-repeater',
            'data-min' => $field['min'],
            'data-max' => $field['max']
        );

        // ensure value is an array
        if (empty($field['value'])) {

            $field['value'] = array();

            $div['class'] .= ' -empty';
        }

        // rows
        $field['min'] = empty($field['min']) ? 0 : $field['min'];
        $field['max'] = empty($field['max']) ? 0 : $field['max'];
        // populate the empty row data (used for wcpoacloneindex and min setting)
        $empty_row = array();

        // If there are less values than min, populate the extra values
        if ($field['min']) {

            for ($i = 0; $i < $field['min']; $i++) {

                // continue if already have a value
                if (array_key_exists($i, $field['value'])) {

                    continue;
                }


                // populate values
                $field['value'][$i] = $empty_row;
            }
        }


        // If there are more values than man, remove some values
        if ($field['max']) {

            for ($i = 0; $i < count($field['value']); $i++) {

                if ($i >= $field['max']) {

                    unset($field['value'][$i]);
                }
            }
        }

        // setup values for row clone
        $field['value']['wcpoacloneindex'] = $empty_row;
        // show columns
        $show_order = true;
        $show_add = true;
        $show_remove = true;

        if ($field['max']) {

            if ($field['max'] == 1) {

                $show_order = false;
            }

            if ($field['max'] <= $field['min']) {

                $show_remove = false;
                $show_add = false;
            }
        }

        // field wrap
        $el = 'td';
        $before_fields = '';
        $after_fields = '';

        if ('row' == 'row') {

            $el = 'div';
            $before_fields = '<td class="wcpoa-fields -left">';
            $after_fields = '</td>';
        }
        
        // layout
        $div['class'] .= ' -' . 'row';
        $plugin_txt_domain = WCPOA_PLUGIN_TEXT_DOMAIN;
        $product_id = $post->ID;
        $product = wc_get_product($product_id);
        $wcpoa_attachment_ids = get_post_meta($product_id, 'wcpoa_attachments_id', true);
        $wcpoa_attachment_name = get_post_meta($product_id, 'wcpoa_attachment_name', true);
        $wcpoa_attachment_url = get_post_meta($product_id, 'wcpoa_attachment_url', true);
        $wcpoa_attachment_description = get_post_meta($product_id, 'wcpoa_attachment_description', true);
        $wcpoa_product_page_enable = get_post_meta($product_id, 'wcpoa_product_page_enable', true);
        $wcpoa_product_variation = get_post_meta($product_id, 'wcpoa_variation', true);
        $wcpoa_pd_enable = get_post_meta($product_id, 'wcpoa_expired_date_enable', true);
        $wcpoa_expired_date = get_post_meta($product_id, 'wcpoa_expired_date', true);
        $wcpoa_order_status = array();    
        wp_nonce_field(plugin_basename(__FILE__), 'wcpoa_attachment_nonce');
       
       ?>
        <div class="wcpoa-field wcpoa-field-repeater wcpoa-field-58f496d436130" data-name="attachments"
             data-type="repeater" data-key="field_58f496d436130">
            <div class="wcpoa-label">
                <label for="wcpoa-pro"><?php _e('Attachments', $plugin_txt_domain) ?></label>
                <span><?php _e('Enhance your customer experience of product pages with downloadable files, such as technical descriptions, certificates, and licenses, user guides, and manuals, etc. A plugin will help you to attach/ upload any kind of files (doc, jpg, videos, pdf) for a customer orders.') ?></span><br>

                <span><?php _e('Attachments can be downloadable/viewable on the Order details and/or Product pages. This will help customers to get more details about products they purchase.') ?></span>
            </div>

            <div class="wcpoa-input">
                <div <?php $this->wcpoa_esc_attr_e($div); ?>>
                    <table class="wcpoa-table">
                        <tbody class="wcpoa-ui-sortable">
                        <?php
                        if (!empty($wcpoa_attachment_ids)) {

                            foreach ((array)$wcpoa_attachment_ids as $key => $wcpoa_attachments_id) {

                                if (!empty($wcpoa_attachments_id)) {
                                    $attachment_name = isset($wcpoa_attachment_name[$key]) && !empty($wcpoa_attachment_name[$key]) ? $wcpoa_attachment_name[$key] : '';
                                    $wcpoa_attachment_file_id=isset($wcpoa_attachment_url[$key]) && !empty($wcpoa_attachment_url[$key]) ? $wcpoa_attachment_url[$key] : '';
                                    $wcpoa_attachment_descriptions = isset($wcpoa_attachment_description[$key]) && !empty($wcpoa_attachment_description[$key]) ? $wcpoa_attachment_description[$key] : '';
                                    $wcpoa_product_p_enable = isset($wcpoa_product_page_enable[$key]) && !empty($wcpoa_product_page_enable[$key]) ? $wcpoa_product_page_enable[$key] : '';
                                    $wcpoa_product_date_enable = isset($wcpoa_pd_enable[$key]) && !empty($wcpoa_pd_enable[$key]) ? $wcpoa_pd_enable[$key] : '';
                                    $wcpoa_expired_dates = isset($wcpoa_expired_date[$key]) && !empty($wcpoa_expired_date[$key]) ? $wcpoa_expired_date[$key] : '';
                                    $wcpoa_order_status_value = get_post_meta($product_id, 'wcpoa_order_status', true);
                                    $wcpoa_order_status = isset($wcpoa_order_status_value[$wcpoa_attachments_id]) && !empty($wcpoa_order_status_value[$wcpoa_attachments_id]) ? $wcpoa_order_status_value[$wcpoa_attachments_id] : array();
                                    
                                     //file upload
                                        // vars
                                        $uploader = 'uploader';

                                        // vars
                                        $o = array(
                                            'icon' => '',
                                            'title' => '',
                                            'url' => '',
                                            'filesize' => '',
                                            'filename' => '',
                                        );

                                        $filediv = array(
                                            'class' => 'wcpoa-file-uploader wcpoa-cf',
                                            'data-uploader' => $uploader
                                        );
                                     
                                        // has value?
                                        if (!empty($wcpoa_attachment_file_id)) {

                                            $file = get_post($wcpoa_attachment_file_id);

                                            if ($file) {

                                                $o['icon'] = wp_mime_type_icon($wcpoa_attachment_file_id);
                                                $o['title'] = $file->post_title;
                                                $o['filesize'] = @size_format(filesize(get_attached_file($wcpoa_attachment_file_id)));
                                                $o['url'] = wp_get_attachment_url($wcpoa_attachment_file_id);

                                                $explode = explode('/', $o['url']);
                                                $o['filename'] = end($explode);

                                            }
                                            // url exists
                                            if ($o['url']) {

                                                $filediv['class'] .= ' has-value';

                                            }

                                        }
                                    ?>

                                    <tr class="wcpoa-row wcpoa-has-value -collapsed" data-id="">

                                        <?php if ($show_order) { ?>

                                            <td class="wcpoa-row-handle order" title="<?php _e('Drag to reorder', $plugin_txt_domain); ?>">
                                                <?php // if ($field['collapsed']) { ?>
                                                    <a class="wcpoa-icon -collapse small" href="#"
                                                       data-event="collapse-row"
                                                       title="<?php _e('Click to toggle', $plugin_txt_domain); ?>"></a>
                                                <?php // } ?>
                                                <span><?php echo intval($i) + 1; ?></span>

                                            </td>
                                        <?php } ?>

                                        <?php echo $before_fields ?>

                                        <div class="wcpoa-field wcpoa-field-text" data-name="id" data-type="text" data-key="">
                                            <div class="wcpoa-label">
                                                <label for=""><?php _e('Id',$plugin_txt_domain) ?> </label>
                                                <p class="description"><?php _e('Attachments Id used to identify each product attachment.This value is automatically generated.',$plugin_txt_domain) ?></p>
                                            </div>
                                            <div class="wcpoa-input">
                                                <div class="wcpoa-input-wrap">
                                                    <input readonly="" class="wcpoa_attachments_id" name="wcpoa_attachments_id[]" value="<?php echo $wcpoa_attachments_id; ?>" placeholder="" type="text">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="wcpoa-field -collapsed-target" data-name="_name" data-type="text" data-key="">
                                            <div class="wcpoa-label">
                                                <label for="attchment_name"><?php _e('Attachment Name',$plugin_txt_domain); ?><span class="wcpoa-required"> *</span></label>
                                                <p class="description"><?php _e('Add a product attachment (downloadable files) name like such as technical descriptions, certificates, and licenses, user guides, and manuals, etc. It will be displayed in the front end',$plugin_txt_domain) ?></p>
                                            </div>
                                            <div class="wcpoa-input wcpoa-att-name-parent">
                                                    <input class="wcpoa-attachment-name" type="text" name="wcpoa_attachment_name[]" data-validation="[NOTEMPTY]" value="<?php echo $attachment_name; ?>" required="required">
                                            </div>
                                        </div>
                                         <div class="wcpoa-field wcpoa-field-textarea " data-name="description" data-type="textarea" data-key="" data-required="1">
                                             <div class="wcpoa-label">
                                                 <label for="attchment_desc"><?php _e('Attachment Description',$plugin_txt_domain); ?></label>
                                                 <p class="description"><?php _e('You can type a short description of the attachment file. So User will get details about attachment file.',$plugin_txt_domain) ?></p>
                                             </div>
                                            <div class="wcpoa-input">
                                                <textarea class="" name="wcpoa_attachment_description[]" placeholder="" rows="8" ><?php echo $wcpoa_attachment_descriptions; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="wcpoa-field wcpoa-field-file -collapsed-target required" data-name="file" data-type="file" data-key="" data-required="1">
                                            <div class="wcpoa-label">
                                                <div class="wcpoa-label">
                                                    <label for="fee_settings_start_date"><?php _e('Upload Attachment',$plugin_txt_domain); ?>
                                                        <span class="wcpoa-required">*</span>
                                                    </label>
                                                    <p class="description"><?php _e('Upload Attachment File.',$plugin_txt_domain) ?></p>
                                                </div>
                                            </div>
                                            <div class="wcpoa-input">
                                                <div class="wcpoa-input">
                                                    <div <?php $this->wcpoa_esc_attr_e($filediv); ?>>
                                                        <div class="wcpoa-error-message"><p><?php echo 'File value is required'; ?></p>
                                                            <input name="wcpoa_attachment_file[]" data-validation="[NOTEMPTY]" value="<?php echo $wcpoa_attachment_file_id ?>" data-name="id" type="hidden" required="required">
                                                        </div>    
                                                            <div class="show-if-value file-wrap wcpoa-soh">
                                                                <div class="file-icon">
                                                                    <img data-name="icon" src="<?php echo $o['icon']; ?>" alt=""/>
                                                                </div>
                                                                <div class="file-info">
                                                                    <p>
                                                                        <strong data-name="title"><?php echo $o['title']; ?></strong>
                                                                    </p>
                                                                    <p>
                                                                        <strong><?php _e('File name', 'wcpoa'); ?>:</strong>
                                                                        <a data-name="filename" href="<?php echo $o['url']; ?>"
                                                                           target="_blank"><?php echo $o['filename']; ?></a>
                                                                    </p>
                                                                    <p>
                                                                        <strong><?php _e('File size', 'wcpoa'); ?>:</strong>
                                                                        <span data-name="filesize"><?php echo $o['filesize']; ?></span>
                                                                    </p>

                                                                    <ul class="wcpoa-hl wcpoa-soh-target">
                                                                        <?php if ($uploader != 'basic'): ?>
                                                                            <li><a class="wcpoa-icon -pencil dark" data-name="edit" href="#"></a></li>
                                                                        <?php endif; ?>
                                                                        <li><a class="wcpoa-icon -cancel dark" data-name="remove" href="#"></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="hide-if-value">
                                                                <?php if ($uploader == 'basic'): ?>

                                                                    <?php if ($field['value'] && !is_numeric($field['value'])): ?>
                                                                        <div class="wcpoa-error-message"><p><?php echo $field['value']; ?></p></div>
                                                                    <?php endif; ?>

                                                                    <input type="file" name="<?php echo $field['name']; ?>" id="<?php echo $field['id']; ?>"/>

                                                                <?php else: ?>

                                                                    <p style="margin:0;"><?php _e('No file selected', 'wcpoa'); ?> <a data-name="add" class="wcpoa-button button" href="#"><?php _e('Add File', 'wcpoa'); ?></a>
                                                                    </p>

                                                                <?php endif; ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>

                                        </div>
                                        <div class="wcpoa-field">
                                            <div class="wcpoa-label">
                                                <label for="product_page_enable"><?php _e('Show on Product page',$plugin_txt_domain); ?></label>
                                                <p class="description"><?php _e('On Product Details page show attachment.',$plugin_txt_domain) ?></p>
                                            </div>
                                            <div class="wcpoa-input">
                                                <select id="wcpoa_product_page_enable" name="wcpoa_product_page_enable[]">
                                                    <option name="yes" <?php echo ($wcpoa_product_p_enable == "yes") ? 'selected' : ''; ?>
                                                            value="yes"><?php _e('Yes') ?></option>
                                                    <option name="no" <?php echo ($wcpoa_product_p_enable == "no") ? 'selected' : ''; ?>
                                                            value="no"><?php _e('No') ?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <?php
                                        if ($product->is_type('variable')) {
                                            $variations = $product->get_available_variations();
                                            if (!empty($variations)) {
                                                ?>
                                                <div class="wcpoa-field">
                                                    <div class="wcpoa-label">
                                                        <label><?php _e('Variants',$plugin_txt_domain); ?></label>
                                                        <p class="description"><?php _e('In case of variable product, you can enable attachments only for specific variants. Leave unselected to apply to all',$plugin_txt_domain); ?></p>
                                                    </div>
                                                    <div class="wcpoa-input wcpoa_product_variation">
                                                        <?php foreach ($variations as $variation_key => $variation) {
                                                            ?>
                                                            <input id="_checkbox1" type="checkbox" class="" value="<?php echo $variation['variation_id']; ?>" name="wcpoa_variation[<?php echo $wcpoa_attachments_id; ?>][]"
                                                            <?php if (!is_null($wcpoa_product_variation) && in_array($variation['variation_id'], $wcpoa_product_variation[$wcpoa_attachments_id])) echo 'checked="checked"'; ?>
                                                            <label class="variation"><?php echo $variation['variation_id']; ?></label>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <div class="wcpoa-field">
                                            <div class="wcpoa-label">
                                                <label for="attchment_order_status"><?php _e('Order status',$plugin_txt_domain); ?></label>
                                                <p class="description"><?php _e('Select order status for which the attachment(s) will be visible.Leave unselected to apply to all.',$plugin_txt_domain); ?></p>
                                            </div>
                                            <div class="wcpoa-input">
                                                <ul class="wcpoa-checkbox-list">
                                                    <li><label for="wcpoa_wc_order_completed">
                                                            <input name="wcpoa_order_status[<?php echo $wcpoa_attachments_id; ?>][]"
                                                                   class="" value="wcpoa-wc-completed" type="checkbox"
                                                                <?php 
                                                                if (!is_null($wcpoa_order_status) && in_array('wcpoa-wc-completed', $wcpoa_order_status)) echo 'checked="checked"'; ?>>
                                                            <?php _e('Completed', $plugin_txt_domain); ?>
                                                        </label>
                                                    </li>
                                                    <li><label for="wcpoa_wc_order_on_hold">
                                                            <input name="wcpoa_order_status[<?php echo $wcpoa_attachments_id; ?>][]"
                                                                   class="" value="wcpoa-wc-on-hold" type="checkbox"
                                                                <?php if (!is_null($wcpoa_order_status) && in_array('wcpoa-wc-on-hold', $wcpoa_order_status)) echo 'checked="checked"'; ?>>
                                                            <?php _e('On Hold', $plugin_txt_domain); ?>
                                                        </label>
                                                    </li>
                                                    <li><label for="wcpoa_wc_order_pending">
                                                            <input name="wcpoa_order_status[<?php echo $wcpoa_attachments_id; ?>][]"
                                                                   class="" value="wcpoa-wc-pending" type="checkbox"
                                                                <?php if (!is_null($wcpoa_order_status) && in_array('wcpoa-wc-pending', $wcpoa_order_status)) echo 'checked="checked"'; ?>>
                                                            <?php _e('Pending payment', $plugin_txt_domain); ?>
                                                        </label>
                                                    </li>
                                                    <li><label for="wcpoa_wc_order_processing">
                                                            <input name="wcpoa_order_status[<?php echo $wcpoa_attachments_id; ?>][]"
                                                                   class="" value="wcpoa-wc-processing" type="checkbox"
                                                                <?php if (!is_null($wcpoa_order_status) && in_array('wcpoa-wc-processing', $wcpoa_order_status)) echo 'checked="checked"'; ?>>
                                                            <?php _e('Processing', $plugin_txt_domain); ?>
                                                        </label>
                                                    </li>
                                                    <li><label for="wcpoa_wc_order_cancelled">
                                                            <input name="wcpoa_order_status[<?php echo $wcpoa_attachments_id; ?>][]"
                                                                   class="" value="wcpoa-wc-cancelled" type="checkbox"
                                                                <?php if (!is_null($wcpoa_order_status) && in_array('wcpoa-wc-cancelled', $wcpoa_order_status)) echo 'checked="checked"'; ?>>
                                                            <?php _e('Cancelled', $plugin_txt_domain); ?>
                                                        </label>
                                                    </li>
                                                    <li><label for="wcpoa_wc_order_failed">
                                                            <input name="wcpoa_order_status[<?php echo $wcpoa_attachments_id; ?>][]"
                                                                   class="" value="wcpoa-wc-failed" type="checkbox"
                                                                <?php if (!is_null($wcpoa_order_status) && in_array('wcpoa-wc-failed', $wcpoa_order_status)) echo 'checked="checked"'; ?>>
                                                            <?php _e('Failed', $plugin_txt_domain); ?>
                                                        </label>
                                                    </li>
                                                    <li><label for="wcpoa_wc_order_refunded">
                                                            <input name="wcpoa_order_status[<?php echo $wcpoa_attachments_id; ?>][]"
                                                                   class="" value="wcpoa-wc-refunded" type="checkbox"
                                                                <?php if (!is_null($wcpoa_order_status) && in_array('wcpoa-wc-refunded', $wcpoa_order_status)) echo 'checked="checked"'; ?>>
                                                            <?php _e('Refunded', $plugin_txt_domain); ?>
                                                        </label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="wcpoa-field">
                                            <div class="wcpoa-label">
                                                <label for="wcpoa_expired_date_enable"><?php _e('Set expire Date ',$plugin_txt_domain); ?></label>
                                                <p class="description"><?php _e('Expires?',$plugin_txt_domain); ?></p>
                                            </div>
                                            <div class="wcpoa-input enable_expire_date">
                                                <select name="wcpoa_expired_date_enable[]" class="enable_date" data-type="enable_date_<?php echo $wcpoa_attachments_id; ?>" data-key="">
                                                    <option name="yes" <?php echo ($wcpoa_product_date_enable == "yes") ? 'selected' : ''; ?>
                                                            value="yes"><?php _e('Yes') ?></option>
                                                    <option name="no" <?php echo ($wcpoa_product_date_enable == "no") ? 'selected' : ''; ?>
                                                            value="no" class=""><?php _e('No') ?></option>
                                                </select>


                                            </div>
                                        </div>

                                        <div class="wcpoa-field enable_date_<?php echo $wcpoa_attachments_id; ?> wcpoa-field-date-picker" data-name="date" data-type="date_picker" data-key="" data-required="1" style=''>
                                            <div class="wcpoa-label">
                                                <label for="wcpoa_expired_date"><?php _e('Set Date',$plugin_txt_domain); ?></label>
                                                <p class="description"><?php _e('If an order is placed after the selected date, the attachments will be no longer visible for download',$plugin_txt_domain) ?></p>
                                            </div>
                                            <div class="wcpoa-input">
                                                <div class="wcpoa-date-picker wcpoa-input-wrap" data-date_format="yy/mm/dd">
                                                    <input id="" class="input-alt" name="wcpoa_expired_date[]" value="<?php if ($wcpoa_product_date_enable == "yes") echo $wcpoa_expired_dates ?>" type="hidden">
                                                    <input class="input wcpoa-php-date-picker" value="<?php if ($wcpoa_product_date_enable == "yes") echo $wcpoa_expired_dates ?>" type="text">
                                                </div>
                                            </div>

                                        </div>

                                        <?php echo $after_fields ?>

                                        <?php if ($show_remove): ?>
                                            <td class="wcpoa-row-handle remove">
                                                <a class="wcpoa-icon -plus small wcpoa-js-tooltip" href="#" data-event="add-row" title="<?php _e('Add row', $plugin_txt_domain); ?>"></a>
                                                <a class="wcpoa-icon -minus small wcpoa-js-tooltip" href="#" data-event="remove-row" title="<?php _e('Remove row', $plugin_txt_domain); ?>"></a>
                                            </td>
                                        <?php endif; ?>

                                    </tr>
                                    <?php
                                }
                            }
                        }

                        foreach ($field['value'] as $i => $row) {

                            $row_class = 'wcpoa-row';


                            if ($i === 'wcpoacloneindex') {

                                $row_class .= ' wcpoa-clone';
                            }
                            ?>
                            <tr class="<?php echo $row_class; ?>" data-id="<?php echo $i; ?>">


                                <?php if ($show_order) { ?>

                                    <td class="wcpoa-row-handle order" title="<?php _e('Drag to reorder', 'wcpoa'); ?>">
                                        <a class="wcpoa-icon -collapse small" href="#" data-event="collapse-row" title="<?php _e('Click to toggle', 'wcpoa'); ?>"></a>
                                        <span><?php echo intval($i) + 1; ?></span>

                                    </td>
                                <?php } ?>
                                <td class="wcpoa-fields -left">

                                    <div class="wcpoa-field wcpoa-field-text wcpoa-field-58f4972436131" data-name="id" data-type="text" data-key="field_58f4972436131">
                                        <div class="wcpoa-label">
                                            <label for=""><?php _e('Id',$plugin_txt_domain) ?> </label>
                                            <p class="description"><?php _e('Attachments Id used to identify each product attachment.This value is automatically generated.',$plugin_txt_domain) ?></p>
                                        </div>
                                        <div class="wcpoa-input">
                                            <div class="wcpoa-input-wrap">
                                                <input readonly="" class="wcpoa_attachments_id" class="wcpoa_attachments_id" name="wcpoa_attachments_id[]" value="" placeholder="" type="text">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="wcpoa-field -collapsed-target">
                                        <div class="wcpoa-label">
                                            <label for="attchment_name"><?php _e('Attachment Name',$plugin_txt_domain); ?><span class="wcpoa-required"> *</span></label>
                                            <p class="description"><?php _e('Add a product attachment (downloadable files) name like such as technical descriptions, certificates, and licenses, user guides, and manuals, etc. It will be displayed in the front end',$plugin_txt_domain) ?></p>
                                        </div>
                                        <div class="wcpoa-input">
                                            <input class="wcpoa-attachment-name" type="text" name="wcpoa_attachment_name[]" value="" required="required">
                                        </div>
                                    </div>
                                    <div class="wcpoa-field wcpoa-field-textarea " data-name="description" data-type="textarea" data-key="" data-required="1">
                                        <div class="wcpoa-label">
                                            <label for="attchment_desc"><?php _e('Attachment Description',$plugin_txt_domain); ?></label>
                                            <p class="description"><?php _e('You can type a short description of the attachment file. So User will get details about attachment file.',$plugin_txt_domain) ?></p>
                                        </div>
                                        <div class="wcpoa-input">
                                           <textarea class="" name="wcpoa_attachment_description[]" placeholder="" rows="8"></textarea>
                                        </div>
                                    </div>
                                    <div class="wcpoa-field wcpoa-field-file -collapsed-target" data-name="file" data-type="file" data-key="field_58f4974e36133" data-required="1">
                                        <div class="wcpoa-label">
                                            <div class="wcpoa-label">
                                                <label for="fee_settings_start_date"><?php _e('Upload Attachment', $plugin_txt_domain); ?>
                                                    <span class="wcpoa-required">*</span>
                                                </label>
                                                <p class="description"><?php _e('Upload Attachment File.', $plugin_txt_domain) ?></p>
                                            </div>
                                        </div>
                                        <div class="wcpoa-input">
                                            <div class="wcpoa-file-uploader wcpoa-cf" data-uploader="uploader">
                                                <div class="wcpoa-error-message"><p><?php echo 'File value is required'; ?></p>
                                                    <input name="wcpoa_attachment_file[]" value="" data-name="id" type="hidden">
                                                </div>
                                                <div class="show-if-value file-wrap wcpoa-soh">
                                                    <div class="file-icon">
                                                        <img data-name="icon" src="/wp-includes/images/media/default.png" alt="" title="">
                                                    </div>
                                                    <div class="file-info">
                                                        <p>
                                                            <strong data-name="title"></strong>
                                                        </p>
                                                        <p>
                                                            <strong>File name:</strong>
                                                            <a data-name="filename" href="" target="_blank"></a>
                                                        </p>
                                                        <p>
                                                            <strong>File size:</strong>
                                                            <span data-name="filesize"></span>
                                                        </p>

                                                        <ul class="wcpoa-hl wcpoa-soh-target">
                                                            <li><a class="wcpoa-icon -pencil dark" data-name="edit"
                                                                   href="#"></a></li>
                                                            <li><a class="wcpoa-icon -cancel dark" data-name="remove"
                                                                   href="#"></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="hide-if-value">
                                                    <p style="margin:0;">No file selected <a data-name="add" class="wcpoa-button button" href="#">Add File</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                        <div class="wcpoa-field">
                                            <div class="wcpoa-label">
                                                <label for="product_page_enable"><?php _e('Show on Product page',$plugin_txt_domain); ?></label>
                                                <p class="description"><?php _e('On Product Details page show attachment.',$plugin_txt_domain) ?></p>
                                            </div>
                                            <div class="wcpoa-input">
                                                <select id="wcpoa_product_page_enable" name="wcpoa_product_page_enable[]">
                                                    <option name="yes" value="yes"><?php _e('Yes') ?></option>
                                                    <option name="no" value="no" selected><?php _e('No') ?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <?php
                                        if ($product->is_type('variable')) {
                                            $variations = $product->get_available_variations();

                                            if (!empty($variations)) {
                                                ?>
                                                <div class="wcpoa-field">
                                                    <div class="wcpoa-label">
                                                        <label><?php _e('Variants',$plugin_txt_domain); ?></label>
                                                        <p class="description"><?php _e('In case of variable product, you can enable attachments only for specific variants. Leave unselected to apply to all',$plugin_txt_domain); ?></p>
                                                    </div>
                                                    <div class="wcpoa-input wcpoa_product_variation">
                                                        <?php foreach ($variations as $key => $variation) { ?>
                                                            <input id="_checkbox1" type="checkbox" class="" value="<?php echo $variation['variation_id']; ?>" name="wcpoa_variation[]" checked="">
                                                            <label class="variation"><?php echo $variation['variation_id']; ?></label>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <div class="wcpoa-field">
                                            <div class="wcpoa-label">
                                                <label for="attchment_order_status"><?php _e('Order status',$plugin_txt_domain); ?></label>
                                                <p class="description"><?php _e('Select order status for which the attachment(s) will be visible.Leave unselected to apply to all.',$plugin_txt_domain); ?></p>
                                            </div>
                                            <div class="wcpoa-input">
                                                <ul class="wcpoa-order-checkbox-list">
                                                    <li>
                                                        <label for="wcpoa_wc_order_completed">
                                                            <input name="wcpoa_order_status[]" class="" value="wcpoa-wc-completed" <?php ?> type="checkbox"><?php _e('Completed', $plugin_txt_domain) ?>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label for="wcpoa_wc_order_on_hold">
                                                            <input name="wcpoa_order_status[]" class="" value="wcpoa-wc-on-hold" type="checkbox"><?php _e('On Hold', $plugin_txt_domain) ?>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label for="wcpoa_wc_order_pending">
                                                            <input name="wcpoa_order_status[]" class="" value="wcpoa-wc-pending" type="checkbox"><?php _e('Pending payment', $plugin_txt_domain) ?>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label for="wcpoa_wc_order_processing">
                                                            <input name="wcpoa_order_status[]" class="" value="wcpoa-wc-processing" type="checkbox"><?php _e('Processing', $plugin_txt_domain) ?>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label for="wcpoa_wc_order_cancelled">
                                                            <input name="wcpoa_order_status[]" class="" value="wcpoa-wc-cancelled" type="checkbox"><?php _e('Cancelled', $plugin_txt_domain) ?>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label for="wcpoa_wc_order_failed">
                                                            <input name="wcpoa_order_status[]" class="" value="wcpoa-wc-failed" type="checkbox"><?php _e('Failed', $plugin_txt_domain) ?>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label for="wcpoa_wc_order_refunded">
                                                            <input name="wcpoa_order_status[]" class="" value="wcpoa-wc-refunded" type="checkbox"><?php _e('Refunded', $plugin_txt_domain) ?>
                                                        </label>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="wcpoa-field">
                                            <div class="wcpoa-label">
                                                <label for="wcpoa_expired_date_enable"><?php _e('Set expire Date ',$plugin_txt_domain); ?></label>
                                                <p class="description"><?php _e('Expires?',$plugin_txt_domain); ?></p>
                                            </div>
                                            <div class="wcpoa-input enable_expire_date">
                                                <select name="wcpoa_expired_date_enable[]" class="enable_date" data-type="" data-key="">
                                                    <option name="yes" value="yes"><?php _e('Yes') ?></option>
                                                    <option name="no" value="no" class="" selected=""><?php _e('No') ?></option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="wcpoa-field enable_date_r wcpoa-field-date-picker" data-name="date" data-type="date_picker" data-key="" data-required="1" style='display: none'>
                                            <div class="wcpoa-label">
                                                <label for="wcpoa_expired_date"><?php _e('Set Date',$plugin_txt_domain); ?></label>
                                                <p class="description"><?php _e('If an order is placed after the selected date, the attachments will be no longer visible for download',$plugin_txt_domain) ?></p>
                                            </div>
                                            <div class="wcpoa-input">
                                                <div class="wcpoa-date-picker wcpoa-input-wrap" data-date_format="yy/mm/dd">
                                                    <input id="" class="input-alt" name="wcpoa_expired_date[]" value="" type="hidden">
                                                    <input class="input" value="" type="text">
                                                </div>
                                            </div>
                                        </div>


                                </td>
                                <?php if ($show_remove): ?>
                                    <td class="wcpoa-row-handle remove">
                                        <a class="wcpoa-icon -plus small wcpoa-js-tooltip" href="#" data-event="add-row" title="<?php _e('Add row', $plugin_txt_domain); ?>"></a>
                                        <a class="wcpoa-icon -minus small wcpoa-js-tooltip" href="#" data-event="remove-row" title="<?php _e('Remove row', $plugin_txt_domain); ?>"></a>
                                    </td>
                                <?php endif; ?>


                            </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                    <?php if ($show_add): ?>

                        <ul class="wcpoa-actions wcpoa-hl">
                            <li>
                                <a class="wcpoa-button button button-primary"data-event="add-row"><?php _e('Add Attchment') ?></a>
                            </li>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!--File validation-->
        
        <!--End file validation-->
        <?php
        
    }

    public function wcpoa_esc_attr_e($atts)
    {

        echo $this->wcpoa_esc_attr($atts);
    }

    /**
     * Save Meta for post types.
     *
     * @param $product_id
     */
    public function wcpoa_attachment_meta_data($product_id)
    {

        if (empty($product_id)) {
            return;
        }
        // If this is an autosave, our form has not been submitted, so we don't want to do anything.
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }
        
        // Check post type is product
        if (isset($_POST['post_type']) && 'product' == $_POST['post_type']) {
            $wcpoa_attachment_name = !empty($_POST['wcpoa_attachment_name']) && isset($_POST['wcpoa_attachment_name']) ? $_POST['wcpoa_attachment_name'] : '';

            $wcpoa_expired_date = !empty($_POST['wcpoa_expired_date']) && isset($_POST['wcpoa_expired_date']) ? $_POST['wcpoa_expired_date'] : '';
            $wcpoa_order_status_all = $_POST['wcpoa_order_status'];
            update_post_meta($product_id, 'wcpoa_attachments_id', $_POST['wcpoa_attachments_id']);
            update_post_meta($product_id, 'wcpoa_attachment_name', $wcpoa_attachment_name);
            update_post_meta($product_id, 'wcpoa_attachment_url', $_POST['wcpoa_attachment_file']);
            update_post_meta($product_id, 'wcpoa_attachment_description', $_POST['wcpoa_attachment_description']);
            update_post_meta($product_id, 'wcpoa_order_status', $wcpoa_order_status_all);
            update_post_meta($product_id, 'wcpoa_product_page_enable', $_POST['wcpoa_product_page_enable']);
            update_post_meta($product_id, 'wcpoa_expired_date_enable', $_POST['wcpoa_expired_date_enable']);
            if ($_POST['wcpoa_expired_date_enable'] == 'no') {
                update_post_meta($product_id, 'wcpoa_expired_date', array());
            } else {
                update_post_meta($product_id, 'wcpoa_expired_date', $wcpoa_expired_date);
            }
            update_post_meta($product_id, 'wcpoa_variation', $_POST['wcpoa_variation']);

        }
    }

    public function wcpoa_attachment_edit_form()
    {
        echo ' enctype="multipart/form-data"';
    }

    /**
     * Order wcpoa order meta fields.
     *
     */
    public function wcpoa_order_add_meta_boxes()
    {
        global $woocommerce, $order, $post;
        $plugin_txt_domain = WCPOA_PLUGIN_TEXT_DOMAIN;
        add_meta_box('wcpoa_order_meta_fields', __('WooCommerce Product Attachment', $plugin_txt_domain), array($this, 'wcpoa_order_fields_data'), 'shop_order', 'normal', 'low');
    }

    /**
     * Admin side:Product attachments order data.
     *
     */
    public function wcpoa_order_fields_data() {
        global $product, $post, $order;
        $order = wc_get_order($post->ID);
        $order_statuses = wc_get_order_statuses();
        $items = $order->get_items(array('line_item'));
        $plugin_text_domain = WCPOA_PLUGIN_TEXT_DOMAIN;
        foreach ($items as $item_id => $item) {

            $wcpoa_order_attachment_items = wc_get_order_item_meta($item_id, 'wcpoa_order_attachment_order_arr', true);
            if (!empty($wcpoa_order_attachment_items)) {

                $wcpoa_attachment_ids = $wcpoa_order_attachment_items['wcpoa_attachment_ids'];
                $wcpoa_attachment_name = $wcpoa_order_attachment_items['wcpoa_attachment_name'];
                $wcpoa_attachment_url = $wcpoa_order_attachment_items['wcpoa_attachment_url'];
                $wcpoa_order_status = $wcpoa_order_attachment_items['wcpoa_order_status'];
                $wcpoa_order_attachment_expired = $wcpoa_order_attachment_items['wcpoa_order_attachment_expired'];
                foreach ((array) $wcpoa_attachment_ids as $key => $wcpoa_attachments_id) {
                    if (!empty($wcpoa_attachment_ids)) {
                        $attachment_name = isset($wcpoa_attachment_name[$key]) && !empty($wcpoa_attachment_name[$key]) ? $wcpoa_attachment_name[$key] : '';
                        $wcpoa_attachment_file = isset($wcpoa_attachment_url[$key]) && !empty($wcpoa_attachment_url[$key]) ? $wcpoa_attachment_url[$key] : '';
                        $wcpoa_order_status_new = str_replace('wcpoa-', '', $wcpoa_order_status[$wcpoa_attachments_id]);
                        $wcpoa_expired_dates = isset($wcpoa_order_attachment_expired[$key]) && !empty($wcpoa_order_attachment_expired[$key]) ? $wcpoa_order_attachment_expired[$key] : '';
                        $attachment_id = $wcpoa_attachment_file; // ID of attachment
                        $current_date = date("Y/m/d");
                        echo '<table class="wcpoa_order">';
                        echo '<tbody>';
                        $wcpoa_attachment_expired_date = strtotime($wcpoa_expired_dates);
                        $wcpoa_today_date = strtotime($current_date);
                        $get_permalink_structure = get_permalink();
                        if (strpos($get_permalink_structure,"?")) {
                            $wcpoa_attachment_url_arg = '&';
                        } else {
                            $wcpoa_attachment_url_arg = '?';
                        }
                        
                        $attachment_order_name = '<h3 class="wcpoa_attachment_name">' . $attachment_name . '</h3>';
                        $wcpoa_file_url_btn = '<a class="wcpoa_attachmentbtn" href="' . get_permalink() . $wcpoa_attachment_url_arg . 'attachment_id=' . $attachment_id . '&download_file=' . $wcpoa_attachments_id . '" rel="nofollow">Download</a>';
                        $wcpoa_file_expired_url_btn = '<a class="wcpoa_order_attachment_expire" rel="nofollow"><?php _e("Download",$plugin_text_domain);?></a>';
                        $wcpoa_expire_date_text = '<p class="order_att_expire_date">' . __('This Attachment Expire Date Is :: ',$plugin_text_domain) . $wcpoa_expired_dates . '</p>';
                        $wcpoa_expired_date_text = '<p class="order_att_expire_date">' . __('This Attachment Expired',$plugin_text_domain) . '</p>';
                        $wcpoa_never_expired_date_text = '<p class="order_att_expire_date">' . __('This Attachment Is Never Expire',$plugin_text_domain) . '</p>';
                        if (!empty($wcpoa_attachment_expired_date)) {
                            if ($wcpoa_today_date > $wcpoa_attachment_expired_date) {
                                echo $attachment_order_name;
                                echo $wcpoa_file_expired_url_btn;
                                echo $wcpoa_expired_date_text;
                            } else {
                                echo $attachment_order_name;
                                echo $wcpoa_file_url_btn;
                                echo $wcpoa_expire_date_text;
                            }
                        } else {
                            echo $attachment_order_name;
                            echo $wcpoa_file_url_btn;
                            echo $wcpoa_never_expired_date_text;
                        }
                        echo '<div class="wcpoa-order-status">';
                        foreach ($order_statuses as $wcpoa_order_status_key => $wcpoa_order_status_value) {
                            
                            if (in_array($wcpoa_order_status_key, $wcpoa_order_status_new)) {
                                $order_status_available = '<h3><span class="dashicons dashicons-yes"></span>' . $wcpoa_order_status_value . '</h3>';
                                echo $order_status_available;
                            } else {
                                $order_status_available = '<h3><span class="dashicons dashicons-no"></span>' . $wcpoa_order_status_value . '</h3>';
                                echo $order_status_available;
                            }
                        }
                        echo '</div>';
                        echo '</tbody>';
                        echo '</table>';
                    }
                }
            }
        }
    }

    /**
     * Newslatter Subscription.
     */
    public function wcpoa_free_subscribe_newsletter()
    {
        $email_id = (isset($_POST["email_id"]) && !empty($_POST["email_id"])) ? $_POST["email_id"] : '';
        $log_url = !empty($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '';
        $cur_date = date('Y-m-d');
        $request_url = 'https://store.multidots.com/wp-content/themes/business-hub-child/API/wp-add-plugin-users.php';
        if (!empty($email_id)) {
            $response_args = array(
                'method' => 'POST',
                'timeout' => 45,
                'redirection' => 5,
                'httpversion' => '1.0',
                'blocking' => true,
                'headers' => array(),
                'body' => array('user' => array('plugin_id' => '73', 'user_email' => $email_id, 'plugin_site' => $log_url, 'status' => 1, 'activation_date' => $cur_date)),
                'cookies' => array()
            );
            $request_response = wp_remote_post($request_url, $response_args);
            if ( !is_wp_error( $request_response ) ) {
                update_option('wbl_plugin_notice_shown', 'true');
            }
        }
        wp_die();
    }
}
