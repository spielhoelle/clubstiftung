jQuery(document).on( 'click', '.clubstiftung-error-update .notice-dismiss', function() {

    jQuery.ajax({
        url: ajaxurl,
        method: "POST",
        data: {
            action: 'clubstiftung_remove_upate_notice'
        }
    })

})