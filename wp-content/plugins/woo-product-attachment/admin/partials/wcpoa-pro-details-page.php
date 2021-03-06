<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
$plugin_text_domain = WCPOA_PLUGIN_TEXT_DOMAIN;
require_once('header/plugin-header.php');
?>
<div class="wcpoa-section-left">
    <div class="wcpoa-main-table res-cl">
        <div class="wcpoa-premium-features">
            <div class="section section-odd clear">
                <h1><?php _e('Premium Features', $plugin_text_domain);?></h1>
                <div class="landing-container pro-master-settings">
                    <div class="col-2">
                        <div class="section-title">
                            <h2><?php _e('Set Attachment on Product Page', $plugin_text_domain);?></h2>
                        </div>
                        <ul>
                         <li><p><?php _e('Every store owner wants to enhance their product pages with downloadable files, such as technical descriptions, certificates and licenses, user guides, and manuals, etc. So Customer will get details information about the product. you can set an expiring date for particular attachment.', $plugin_text_domain) ?></p></li>
                        </ul>
                    </div>
                    <div class="col-1">
                        <img src="<?php echo WCPOA_PLUGIN_URL . 'admin/images/features.png'; ?>" alt="<?php _e('Product bulk attachment', $plugin_text_domain);?>" />
                    </div>
                </div>
            </div>
            <div class="section section-even clear">
                <div class="landing-container">
                    <div class="col-1">
                        <img src="<?php echo WCPOA_PLUGIN_URL . 'admin/images/features_01.png'; ?>" alt="<?php _e('Shipping method Based On Country, State and Zipcode', $plugin_text_domain);?>" />
                    </div>
                    <div class="col-2">
                        <div class="section-title">
                            <h2><?php _e('Set Attachment on My Account page', $plugin_text_domain);?></h2>
                        </div>
                        <p><?php _e('With this option, you can set attachment file on order details page. A store owner can set attachment based on order status (match this status then auto enable on each order download available) as per below:', $plugin_text_domain);?></p>
                        <ul>
                            <li><?php _e('Pending payment', $plugin_text_domain);?></li>
                            <li><?php _e('Processing', $plugin_text_domain);?></li>
                            <li><?php _e('On hold', $plugin_text_domain);?></li>
                            <li><?php _e('Completed', $plugin_text_domain);?></li>
                            <li><?php _e('Cancelled', $plugin_text_domain);?></li>
                            <li><?php _e('Refunded', $plugin_text_domain);?></li>
                            <li><?php _e('Failed', $plugin_text_domain);?></li>
                        </ul>
                    </div>
                </div>
            </div>
             <div class="section section-odd clear">
                <div class="landing-container pro-master-settings">
                    <div class="col-2">
                        <div class="section-title">
                            <h2><?php _e('Email Attachment by Order status', $plugin_text_domain);?></h2>
                        </div>
                        <ul>
                         <li><p><?php _e('With this plugin, you can attach same file to every new account, new order, processing order, complete order and invoice email  is sent by WooCommerce', $plugin_text_domain) ?></p></li>
                        </ul>
                    </div>
                    <div class="col-1">
                        <img src="<?php echo WCPOA_PLUGIN_URL . 'admin/images/features_02.png'; ?>" alt="<?php _e('Product bulk attachment', $plugin_text_domain);?>" />
                    </div>
                </div>
            </div>
            <div class="section section-even clear">
                <div class="landing-container">
                    <div class="col-1">
                        <img src="<?php echo WCPOA_PLUGIN_URL . 'admin/images/features_03.png'; ?>" alt="<?php _e('Shipping method Based On Country, State and Zipcode', $plugin_text_domain);?>" />
                    </div>
                    <div class="col-2">
                        <div class="section-title">
                            <h2><?php _e('Bulk Products Attachments', $plugin_text_domain);?></h2>
                        </div>
                        <ul>
                            <li><b><?php _e('Apply for Category :', $plugin_text_domain) ?></b> <?php _e('Apply bulk attachment for specefic category.', $plugin_text_domain);?></li>
                            <li><b><?php _e('Apply for child Category :', $plugin_text_domain) ?></b> <?php _e('Apply bulk attachment for all patent and their child category.', $plugin_text_domain);?></li>
                            <li><b><?php _e('Apply for Woo order:', $plugin_text_domain) ?></b> <?php _e('Attachment visible on specefic order status.', $plugin_text_domain);?></li>
                            <li><p><?php _e('With this options, you can assign attachment directly to categories. It will visible to all product of that category. Attachments will be downloadable/viewable in the Order details and/or Product pages. In case of visibility on order details page, every file can be visible for different order statuses.
                                Bulk products attachments assign to parent category with subcategories (parent category is higher precedence.', $plugin_text_domain) ?></p></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="section section-odd clear">
                <div class="landing-container pro-master-settings">
                    <div class="col-2">
                        <div class="section-title">
                            <h2><?php _e('Support Multiple File Types', $plugin_text_domain);?></h2>
                        </div>
                        <ul>
                         <li><p><?php _e('You can upload several file types such as docs, PDF, excel sheets, images, audio, videos and many other types. You can Attach multiple files to product or category.It will be available automatically show after purchase on order page and product details page.', $plugin_text_domain) ?></p></li>
                        </ul>
                    </div>
                    <div class="col-1">
                        <img src="<?php echo WCPOA_PLUGIN_URL . 'admin/images/features_04.png'; ?>" alt="<?php _e('Product bulk attachment', $plugin_text_domain);?>" />
                    </div>
                </div>
            </div>
             <div class="section section-even clear">
                <div class="landing-container">
                    <div class="col-1">
                        <img src="<?php echo WCPOA_PLUGIN_URL . 'admin/images/features_05.png'; ?>" alt="<?php _e('Shipping method Based On Country, State and Zipcode', $plugin_text_domain);?>" />
                    </div>
                    <div class="col-2">
                        <div class="section-title">
                            <h2><?php _e('Orders Attachments', $plugin_text_domain);?></h2>
                        </div>
                        <p><?php _e('You can upload one or more files directly from the order edit page. Store owner can add as many files as per your requirement. Every attachment can be visible only for specific order statuses', $plugin_text_domain);?></p>
                    </div>
                </div>
            </div>
            <div class="section section-cta section-odd">
                <div class="landing-container afsrm_upgrade_to_pro">
                    <div class="wcpoa-wishlist-cta">
                        <p><?php _e("Upgrade to the PREMIUM VERSION to increase your affiliate program bonus!", $plugin_text_domain) ?></p>
                        <a target="_blank" href="<?php echo esc_url('store.multidots.com/woocommerce-product-attachment'); ?>">
                            <img src="<?php echo WCPOA_PLUGIN_URL . 'admin/images/upgrade_new.png'; ?>">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('header/plugin-sidebar.php'); ?>