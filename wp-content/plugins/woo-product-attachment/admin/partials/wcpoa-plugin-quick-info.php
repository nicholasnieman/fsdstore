<?php
$plugin_name = WCPOA_PLUGIN_NAME;
$plugin_version = WCPOA_PLUGIN_VERSION;
?>
<div class="wcpoa-section-left">
    <div class="wcpoa-table-main res-cl">
        <h2>Introduction</h2>
        <table class="wcpoa-tableouter">
            <tbody>
                <tr>
                    <td class="fr-1">Product Type</td>
                    <td class="fr-2">WordPress Plugin</td>
                </tr>
                <tr>
                    <td class="fr-1">Product Name</td>
                    <td class="fr-2"><?php echo $plugin_name ?></td>
                </tr>
                <tr>
                    <td class="fr-1">Installed Version</td>
                    <td class="fr-2"><?php echo $plugin_version; ?></td>
                </tr>
                <tr>
                    <td class="fr-1">License & Terms of use</td>
                    <td class="fr-2"><a href="#">Click here</a> to view license and terms of use.</td>
                </tr>
                <tr>
                    <td class="fr-1">Help & Support</td>
                    <td class="fr-2">
                        <ul class="help-support">
                            <li><a target="_blank" href="<?php echo site_url('wp-admin/admin.php?page=woocommerce_product_attachment&tab=wcpoa-plugin-getting-started'); ?>">Quick Start Guide</a></li>
                            <li><a target="_blank" href="#">Documentation</a>
                            </li>
                            <li><a target="_blank" href="https://store.multidots.com/dotstore-support-panel/">Support Forum</a></li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td class="fr-1">Localization</td>
                    <td class="fr-2">English, Spanish</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>