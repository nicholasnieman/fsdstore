<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
$plugin_txt_domain = WCPOA_PLUGIN_TEXT_DOMAIN;
$image_url = WCPOA_PLUGIN_URL . 'admin/images/right_click.png';
?>
<div class="dotstore_plugin_sidebar">
    <div class="dotstore_discount_voucher">
        <span class="dotstore_discount_title"><?php _e('Discount Voucher', $plugin_txt_domain); ?></span>
        <span class="dotstore-upgrade"><?php _e('Upgrade to premium now and get', $plugin_txt_domain); ?></span>
        <strong class="dotstore-OFF"><?php _e('10% OFF', $plugin_txt_domain); ?></strong>
        <span class="dotstore-with-code"><?php _e('with code', $plugin_txt_domain); ?><b><?php _e('FLAT10', $plugin_txt_domain); ?></b></span>
        <a class="dotstore-upgrade" href="<?php echo esc_url('store.multidots.com/woocommerce-product-attachment'); ?>" target="_blank"><?php _e('Upgrade Now!', $plugin_txt_domain); ?></a>
    </div>

    <div class="dotstore-important-link">
        <h2><span class="dotstore-important-link-title"><?php _e('Important link', WCPOA_PLUGIN_TEXT_DOMAIN); ?></span></h2>
        <div class="video-detail important-link">
            <ul>
                <li>
                    <img src="<?php echo $image_url; ?>">
                    <a target="_blank" href="https://www.wordpress.org/plugins/woo-product-attachment/"><?php _e('Plugin documentation', WCPOA_PLUGIN_TEXT_DOMAIN); ?></a>
                </li> 
                <li>
                    <img src="<?php echo $image_url; ?>">
                    <a target="_blank" href="https://store.multidots.com/dotstore-support-panel"><?php _e('Support platform', WCPOA_PLUGIN_TEXT_DOMAIN); ?></a>
                </li>
                <li>
                    <img src="<?php echo $image_url; ?>">
                    <a target="_blank" href="https://store.multidots.com/suggest-a-feature"><?php _e('Suggest A Feature', WCPOA_PLUGIN_TEXT_DOMAIN); ?></a>
                </li>
                <li>
                    <img src="<?php echo $image_url; ?>">
                    <a  target="_blank" href="https://www.wordpress.org/plugins/woo-product-attachment/"><?php _e('Changelog', WCPOA_PLUGIN_TEXT_DOMAIN); ?></a>
                </li>
            </ul>
        </div>
    </div>

    <!-- html for popular plugin !-->
    <div class="dotstore-important-link">
        <h2><span class="dotstore-important-link-title"><?php _e('OUR POPULAR PLUGINS', WCPOA_PLUGIN_TEXT_DOMAIN); ?></span></h2>
        <div class="video-detail important-link">
            <ul>
                <li>
                    <img class="sidebar_plugin_icone" src="<?php echo WCPOA_PLUGIN_URL . 'admin/images/advance-flat-rate.png'; ?>">
                    <a target="_blank" href="https://store.multidots.com/advanced-flat-rate-shipping-method-for-woocommerce"><?php _e('Advanced Flat Rate Shipping Method', WCPOA_PLUGIN_TEXT_DOMAIN); ?></a>
                </li> 
                <li>
                    <img class="sidebar_plugin_icone" src="<?php echo WCPOA_PLUGIN_URL . 'admin/images/wc-conditional-product-fees.png'; ?>">
                    <a  target="_blank" href="https://store.multidots.com/woocommerce-conditional-product-fees-checkout"><?php _e('WooCommerce Conditional Product Fees', WCPOA_PLUGIN_TEXT_DOMAIN); ?></a>
                </li>
                <li>
                    <img class="sidebar_plugin_icone" src="<?php echo WCPOA_PLUGIN_URL . 'admin/images/advance-menu-manager.png'; ?>">
                    <a  target="_blank" href="https://store.multidots.com/advance-menu-manager-wordpress"><?php _e('Advance Menu Manager', WCPOA_PLUGIN_TEXT_DOMAIN); ?></a>
                </li>
                <li>
                    <img class="sidebar_plugin_icone" src="<?php echo WCPOA_PLUGIN_URL . 'admin/images/wc-enhanced-ecommerce-analytics-integration.png'; ?>">
                    <a target="_blank" href="https://store.multidots.com/woocommerce-enhanced-ecommerce-analytics-integration-with-conversion-tracking"><?php _e('Woo Enhanced Ecommerce Analytics Integration', WCPOA_PLUGIN_TEXT_DOMAIN); ?></a>
                </li>
                <li>
                    <img  class="sidebar_plugin_icone" src="<?php echo WCPOA_PLUGIN_URL . 'admin/images/advanced-product-size-charts.png'; ?>">
                    <a target="_blank" href="https://store.multidots.com/woocommerce-advanced-product-size-charts"><?php _e('Advanced Product Size Charts', WCPOA_PLUGIN_TEXT_DOMAIN); ?></a>
                </li>
                </br>
            </ul>
        </div>
        <div class="view-button">
            <a class="view_button_dotstore" target="_blank" href="https://store.multidots.com/plugins"><?php _e('VIEW ALL', WCPOA_PLUGIN_TEXT_DOMAIN); ?></a>
        </div>
    </div>
    <!-- html end for popular plugin !-->

    <div class="dotstore-important-link">
        <h2><span class="dotstore-important-link-title"><?php _e('OUR POPULAR THEMES', WCPOA_PLUGIN_TEXT_DOMAIN); ?></span></h2>
        <div class="video-detail important-link">
            <ul>
                <li><img  class="sidebar_plugin_icone" src="<?php echo WCPOA_PLUGIN_URL . 'admin/images/appify-wp.png'; ?>">
                    <a target="_blank" href="https://store.multidots.com/appify-multipurpose-one-page-mobile-app-landing-page-wordpress-theme"><?php _e('Appify – Multipurpose WordPress Theme', WCPOA_PLUGIN_TEXT_DOMAIN); ?></a>
                </li>
                <li><img  class="sidebar_plugin_icone" src="<?php echo WCPOA_PLUGIN_URL . 'admin/images/brand-agency.png'; ?>">
                    <a target="_blank" href="https://store.multidots.com/brand-agency-one-page-wordpress-theme-for-agency"><?php _e('Brand Agency – WordPress Theme for Agency', WCPOA_PLUGIN_TEXT_DOMAIN); ?></a>
                </li>
                <li><img  class="sidebar_plugin_icone" src="<?php echo WCPOA_PLUGIN_URL . 'admin/images/meraki-wp.png'; ?>">
                    <a target="_blank" href="https://store.multidots.com/meraki-one-page-resume-wordpress-theme"><?php _e('Meraki - WordPress Theme for Resume', WCPOA_PLUGIN_TEXT_DOMAIN); ?></a>
                </li>
                <br>
            </ul>
        </div>
        <div class="view-button">
            <a class="view_button_dotstore" target="_blank" href="https://store.multidots.com/themes"><?php _e('VIEW ALL', WCPOA_PLUGIN_TEXT_DOMAIN); ?></a>
        </div>
    </div>

</div>
</div>
</body>
</html>