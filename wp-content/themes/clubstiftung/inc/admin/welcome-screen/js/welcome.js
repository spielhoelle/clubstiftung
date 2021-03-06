jQuery(document).ready(function() {

	/* If there are required actions, add an icon with the number of required actions in the About clubstiftung page -> Actions required tab */
    var clubstiftung_nr_actions_required = clubstiftungLiteWelcomeScreenObject.nr_actions_required;

    if ( (typeof clubstiftung_nr_actions_required !== 'undefined') && (clubstiftung_nr_actions_required != '0') ) {
        jQuery('li.clubstiftung-w-red-tab a').append('<span class="clubstiftung-actions-count">' + clubstiftung_nr_actions_required + '</span>');
    }

    /* Dismiss required actions */
    jQuery(".clubstiftung-dismiss-required-action").click(function(){

        var id= jQuery(this).attr('id');
        console.log(id);
        jQuery.ajax({
            type       : "GET",
            data       : { action: 'clubstiftung_lite_dismiss_required_action',dismiss_id : id },
            dataType   : "html",
            url        : clubstiftungLiteWelcomeScreenObject.ajaxurl,
            beforeSend : function(data,settings){
				jQuery('.clubstiftung-tab-pane#actions_required h1').append('<div id="temp_load" style="text-align:center"><img src="' + clubstiftungLiteWelcomeScreenObject.template_directory + '/inc/admin/welcome-screen/img/ajax-loader.gif" /></div>');
            },
            success    : function(data){
				jQuery("#temp_load").remove(); /* Remove loading gif */
                jQuery('#'+ data).parent().remove(); /* Remove required action box */

                var clubstiftung_lite_actions_count = jQuery('.clubstiftung-actions-count').text(); /* Decrease or remove the counter for required actions */
                if( typeof clubstiftung_lite_actions_count !== 'undefined' ) {
                    if( clubstiftung_lite_actions_count == '1' ) {
                        jQuery('.clubstiftung-actions-count').remove();
                        jQuery('.clubstiftung-tab-pane#actions_required').append('<p>' + clubstiftungLiteWelcomeScreenObject.no_required_actions_text + '</p>');
                    }
                    else {
                        jQuery('.clubstiftung-actions-count').text(parseInt(clubstiftung_lite_actions_count) - 1);
                    }
                }
            },
            error     : function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        });
    });

	/* Tabs in welcome page */
	function clubstiftung_welcome_page_tabs(event) {
		jQuery(event).parent().addClass("active");
        jQuery(event).parent().siblings().removeClass("active");
        var tab = jQuery(event).attr("href");
        jQuery(".clubstiftung-tab-pane").not(tab).css("display", "none");
        jQuery(tab).fadeIn();
	}

	var clubstiftung_actions_anchor = location.hash;

	if( (typeof clubstiftung_actions_anchor !== 'undefined') && (clubstiftung_actions_anchor != '') ) {
		clubstiftung_welcome_page_tabs('a[href="'+ clubstiftung_actions_anchor +'"]');
	}

    jQuery(".clubstiftung-nav-tabs a").click(function(event) {
        event.preventDefault();
		clubstiftung_welcome_page_tabs(this);
    });

		/* Tab Content height matches admin menu height for scrolling purpouses */
	 $tab = jQuery('.clubstiftung-tab-content > div');
	 $admin_menu_height = jQuery('#adminmenu').height();
	 if( (typeof $tab !== 'undefined') && (typeof $admin_menu_height !== 'undefined') )
	 {
		 $newheight = $admin_menu_height - 180;
		 $tab.css('min-height',$newheight);
	 }

});
