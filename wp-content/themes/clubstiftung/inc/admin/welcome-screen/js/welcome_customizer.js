jQuery(document).ready(function() {
    var clubstiftung_aboutpage = clubstiftungLiteWelcomeScreenCustomizerObject.aboutpage;
    var clubstiftung_nr_actions_required = clubstiftungLiteWelcomeScreenCustomizerObject.nr_actions_required;

    /* Number of required actions */
    if ((typeof clubstiftung_aboutpage !== 'undefined') && (typeof clubstiftung_nr_actions_required !== 'undefined') && (clubstiftung_nr_actions_required != '0')) {
        jQuery('#accordion-section-themes .accordion-section-title').append('<a href="' + clubstiftung_aboutpage + '"><span class="clubstiftung-actions-count">' + clubstiftung_nr_actions_required + '</span></a>');
    }


});
