<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$plugin_url = WCPOA_PLUGIN_URL;
$plugin_name = WCPOA_PLUGIN_NAME;
$plugin_text_domain = WCPOA_PLUGIN_TEXT_DOMAIN;
?>

<div id="dotsstoremain">
    <div class="all-pad">
        <header class="dots-header">
            <div class="dots-logo-main">
                <img  src="<?php echo $plugin_url . '/admin/images/woo-product-att-logo.png'; ?>">
            </div>
            <div class="dots-header-right">
                <div class="logo-detail">
                    <strong><?php _e($plugin_name); ?></strong>
                    <span><?php _e('Free Version'); ?> <?php echo WCPOA_PLUGIN_VERSION ?></span>
                </div>

                <div class="button-dots">
                    <span class="upgrade_pro_image">
                        <a target="_blank" href="<?php echo esc_url('store.multidots.com/woocommerce-product-attachment'); ?>">
                            <img src="<?php echo $plugin_url . 'admin/images/upgrade_new.png'; ?>">
                        </a>
                    </span>
                    <span class="support_dotstore_image">
                        <a target="_blank" href="<?php echo esc_url('store.multidots.com/dotstore-support-panel'); ?>" >
                            <img src="<?php echo $plugin_url . 'admin/images/support_new.png'; ?>">
                        </a>
                    </span>
                </div>
            </div>
            <?php
            $about_plugin_setting_menu_enable = '';
            $about_plugin_get_started = '';
            $about_plugin_quick_info = '';
            $dotstore_setting_menu_enable = '';
            $wcpoa_plugin_setting_page = '';
            $wcpoa_pro_details = '';

            if (!empty($_GET['tab']) && $_GET['tab'] == 'wcpoa_plugin_setting_page') {
                $wcpoa_plugin_setting_page = "acitve";
            }
            if (empty($_GET['tab']) && $_GET['page'] == 'woocommerce_product_attachment') {
                $wcpoa_plugin_setting_page = "acitve";
            }
            if (!empty($_GET['tab']) && $_GET['tab'] == 'wcpoa-pro-details-page') {
                $wcpoa_pro_details = "acitve";
            }
            if (!empty($_GET['tab']) && $_GET['tab'] == 'wcpoa-plugin-getting-started') {
                $about_plugin_setting_menu_enable = "acitve";
                $about_plugin_get_started = "acitve";
            }
            if (!empty($_GET['tab']) && $_GET['tab'] == 'wcpoa-plugin-quick-info') {
                $about_plugin_setting_menu_enable = "acitve";
                $about_plugin_quick_info = "acitve";
            }
            ?>

            <div class="dots-menu-main">
                <nav>
                    <ul>
                        <li><a class="dotstore_plugin <?php echo $wcpoa_plugin_setting_page; ?>" href="<?php echo site_url('wp-admin/admin.php?page=woocommerce_product_attachment&tab=wcpoa_plugin_setting_page'); ?>"><?php _e('Settings', $plugin_text_domain) ?></a></li>
                        <li>
                            <a class="dotstore_plugin <?php echo $about_plugin_setting_menu_enable; ?>" href="<?php echo site_url('wp-admin/admin.php?page=woocommerce_product_attachment&tab=wcpoa-plugin-getting-started'); ?>"><?php _e('About Plugin', $plugin_text_domain) ?></a>
                            <ul class="sub-menu">
                                <li>
                                    <a class="dotstore_plugin <?php echo $about_plugin_get_started; ?>" href="<?php echo site_url('wp-admin/admin.php?page=woocommerce_product_attachment&tab=wcpoa-plugin-getting-started'); ?>"><?php _e('Getting Started', $plugin_text_domain) ?></a>
                                </li>
                                <li>
                                    <a class="dotstore_plugin <?php echo $about_plugin_quick_info; ?>" href="<?php echo site_url('wp-admin/admin.php?page=woocommerce_product_attachment&tab=wcpoa-plugin-quick-info'); ?>"><?php _e('Introduction', $plugin_text_domain) ?></a>
                                </li>
                                <li><a target="_blank" href="https://store.multidots.com/suggest-a-feature/">Suggest A Feature</a></li>
                            </ul>
                        </li>
                        <li><a class="dotstore_plugin <?php echo $wcpoa_pro_details; ?>" href="<?php echo site_url('wp-admin/admin.php?page=woocommerce_product_attachment&tab=wcpoa-pro-details-page'); ?>"><?php _e('Premium Version', $plugin_text_domain) ?></a></li>
                        <li>
                            <a class="dotstore_plugin <?php echo $dotstore_setting_menu_enable; ?>"  href="#">Dotstore</a>
                            <ul class="sub-menu">
                                <li><a target="_blank" href="https://store.multidots.com/go/flatrate-pro-new-interface-woo-plugins">WooCommerce Plugins</a></li>
                                <li><a target="_blank" href="https://store.multidots.com/go/flatrate-pro-new-interface-wp-plugins">Wordpress Plugins</a></li><br>
                                <li><a target="_blank" href="https://store.multidots.com/go/flatrate-pro-new-interface-wp-free-plugins">Free Plugins</a></li>
                                <li><a target="_blank" href="https://store.multidots.com/go/flatrate-pro-new-interface-free-theme">Free Themes</a></li>
                                <li><a target="_blank" href="https://store.multidots.com/go/flatrate-pro-new-interface-dotstore-support">Contact Support</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>