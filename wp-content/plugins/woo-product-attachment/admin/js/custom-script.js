(function($) {
    $(window).load(function() {
        //Subscribe Newsletter

        $("#dotstore_subscribe_dialog").dialog({
            modal: true, title: 'Subscribe To Our Newsletter', zIndex: 10000, autoOpen: true,
            width: '500', resizable: false,
            position: {my: "center", at: "center", of: window},
            dialogClass: 'dialogButtons',
            buttons: [
                {
                    id: "Delete",
                    text: "YES",
                    click: function() {
                        var email_id = jQuery('#txt_user_sub_wcpoa').val();
                        var data = {
                            'action': 'wcpoa_free_subscribe_newsletter',
                            'email_id': email_id
                        };
                        // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
                        jQuery.post(ajaxurl, data, function(response) {
                            jQuery('#dotstore_subscribe_dialog').html('<h2>You have been successfully subscribed</h2>');
                            jQuery(".ui-dialog-buttonpane").remove();
                        });
                    }
                },
                {
                    id: "No",
                    text: "No, Remind Me Later",
                    click: function() {
                        jQuery(this).dialog("close");
                    }
                }
            ]
        });
        jQuery("div.dialogButtons .ui-dialog-buttonset button").removeClass('ui-state-default');
        jQuery("div.dialogButtons .ui-dialog-buttonset button").addClass("button-primary woocommerce-save-button");
});
})(jQuery);