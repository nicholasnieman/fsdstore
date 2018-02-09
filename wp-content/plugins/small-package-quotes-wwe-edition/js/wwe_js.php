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
add_action('admin_footer', 'smallpkg_ajax_carrrier_button');

function smallpkg_ajax_carrrier_button() {
    ?>
    <script>
        jQuery(".connection_section_class .button-primary").attr("disabled", false);
        jQuery('.connection_section_class .button-primary').click(function (e) {

            var postForm = {//Fetch form data
                'action': 'speedship_action',
                'world_wide_express_account_number': jQuery('#wc_settings_account_number_wwe_small_packages_quotes').val(),
                'speed_freight_username': jQuery('#wc_settings_username_wwe_small_packages_quotes').val(),
                'speed_freight_password': jQuery('#wc_settings_password_wwe_small_packages').val(),
                'speed_freight_licence_key': jQuery('#wc_settings_plugin_licence_key_wwe_small_packages_quotes').val(),
                'authentication_key': jQuery('#wc_settings_authentication_key_wwe_small_packages_quotes').val(),
            };
//            jQuery.post(ajaxurl, data, function(response) {
//			alert('Got this from the server: ' + response);
//	   });
//            
            jQuery.ajax({//Process the form using $.ajax()
                type: 'POST', //Method type
                url: ajaxurl, //Your form processing file URL
                data: postForm, //Forms name
                dataType: 'json',
                beforeSend: function () {
                    // setting a timeout
                    jQuery(".connection_section_class .button-primary").attr("disabled", true);
                    jQuery(".connection_save_button").remove();
                    jQuery('.connection_section_class .form-table tbody').append('<div class="windows8"><div class="wBall" id="wBall_1"><div class="wInnerBall"></div></div><div class="wBall" id="wBall_2"><div class="wInnerBall"></div></div><div class="wBall" id="wBall_3"><div class="wInnerBall"></div></div><div class="wBall" id="wBall_4"><div class="wInnerBall"></div></div><div class="wBall" id="wBall_5"><div class="wInnerBall"></div></div></div>');
                    jQuery('.connection_section_class .button-primary').after('<input class="connection_save_button" type="submit" value="Save Changes" name="save">');

                },
                success: function (data) {
                    
                    if (data.success) { //If fails

                        jQuery(".windows8").remove();
                        jQuery(".class_success_message").remove();
                        jQuery(".class_error_message").remove();
                        jQuery(".connection_section_class .button-primary").attr("disabled", false);
                        jQuery('.connection_section_class .form-table').before('<p class="class_success_message" > Success! Please review your Settings before enabling the plugin in your shopping cart. </p>');
                    }
                    else {
                        jQuery(".class_error_message").remove();
                        jQuery(".windows8").remove();
                        jQuery(".class_success_message").remove();
                        jQuery(".connection_section_class .button-primary").attr("disabled", false);
                        jQuery('.connection_section_class .form-table').before('<p class="class_error_message" > Your connection failed. Please confirm the credentials with your Worldwide Express representative and try again. </p>');
                    }
                }
            });
            e.preventDefault();
        })
    </script>
    <?php
}




add_action('admin_footer', 'smallpkg_change_carrier_submit_button_text');
function smallpkg_change_carrier_submit_button_text() {
    echo '<script>
   jQuery( document ).ready(function() {
    jQuery(".connection_section_class .button-primary").val("Test Conncection");
});
    </script>';
}

add_action('admin_footer', 'smallpkg_admin_quote_setting_input');

function smallpkg_admin_quote_setting_input() {
    ?>
    <input type="hidden" id="show_wwe_saved_method" value="<?php echo get_option('wc_settings_wwe_rate_method'); ?>" />
    <script>
        jQuery(document).ready(function () {

            jQuery('#wc_settings_hand_free_mark_up_wwe_small_packages').focusout('click', function (e) {
                var num = parseFloat(jQuery("#wc_settings_hand_free_mark_up_wwe_small_packages").val());

                if (/^[0-9]+\.?[0-9]*$/.test(num) == true) {

                    if (jQuery("#wc_settings_hand_free_mark_up_wwe_small_packages").val().indexOf('%') != -1) {

                        if (jQuery("#wc_settings_hand_free_mark_up_wwe_small_packages").val().indexOf('.') != -1) {
                            var new_num_cross = jQuery("#wc_settings_hand_free_mark_up_wwe_small_packages").val(num.toFixed(2));
                            var handfree = jQuery("#wc_settings_hand_free_mark_up_wwe_small_packages").val();
                            jQuery("#wc_settings_hand_free_mark_up_wwe_small_packages").val(handfree + '%');
                        } else {
                            var new_num = jQuery("#wc_settings_hand_free_mark_up_wwe_small_packages").val();
                        }

                    } else {
                        var new_num = jQuery("#wc_settings_hand_free_mark_up_wwe_small_packages").val(num.toFixed(2));
                    }

                }
                else {
                    if (!jQuery.isNumeric(num)) {
                        if (jQuery("#wc_settings_hand_free_mark_up_wwe_small_packages").val().length > 0) {
                            alert('Only numaric value allowed with decimal points');
                        }
                    }
                    var new_num = jQuery("#wc_settings_hand_free_mark_up_wwe_small_packages").val('');
                }

            });
        })



        jQuery(document).ready(function () {

            jQuery('.quotes_services').closest('tr').addClass('quotes_services_tr');
            jQuery('.quotes_services').closest('td').addClass('quotes_services_td');

        })


    </script>
    <?php
}
