<?php
// Set Panel ID
$panel_id = 'clubstiftung_panel_contact_us';

// Set prefix
$prefix = 'clubstiftung';

/***********************************************/
/**************** CONTACT US  ******************/
/***********************************************/
/*
$wp_customize->add_panel( $panel_id,
    array(
        'priority'          => 110,
        'capability'        => 'edit_theme_options',
        'theme_supports'    => '',
        'title'             => __( 'Contact us', 'clubstiftung' ),
        'description'       => __( 'Control various options for contact us section from front page.', 'clubstiftung' ),
    )
);
*/

/***********************************************/
/******************* General *******************/
/***********************************************/
$wp_customize->add_section( $prefix . '_contact_us_general' ,
    array(
        'title'         => __( 'Contact us', 'clubstiftung' ),
        'description'   => __( 'Control various options for contact us section from front page.', 'clubstiftung' ),
        'priority'      => 109
        // 'title'       => __( 'General', 'clubstiftung' ),
        // 'panel' 	  => $panel_id
    )
);

// Show this section
$wp_customize->add_setting( $prefix . '_contact_us_general_show',
    array(
        'sanitize_callback' => $prefix . '_sanitize_checkbox',
        'default'           => 1,
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix . '_contact_us_general_show',
    array(
        'type'      => 'checkbox',
        'label'     => __( 'Show this section?', 'clubstiftung' ),
        'section'   => $prefix . '_contact_us_general',
        'priority'  => 1
    )
);

// Title
$wp_customize->add_setting( $prefix .'_contact_us_general_title',
    array(
        'sanitize_callback' => 'clubstiftung_sanitize_html',
        'default'           => __( 'Contact us', 'clubstiftung' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_contact_us_general_title',
    array(
        'label'         => __( 'Title', 'clubstiftung' ),
        'description'   => __( 'Add the title for this section.', 'clubstiftung'),
        'section'       => $prefix . '_contact_us_general',
        'priority'      => 2
    )
);

// Entry
$wp_customize->add_setting( $prefix .'_contact_us_general_entry',
    array(
        'sanitize_callback' => 'clubstiftung_sanitize_html',
        'default'           => __( 'And we will get in touch as son as possible.', 'clubstiftung' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_contact_us_general_entry',
    array(
        'label'         => __( 'Entry', 'clubstiftung' ),
        'description'   => __( 'Add the content for this section.', 'clubstiftung'),
        'section'       => $prefix . '_contact_us_general',
        'priority'      => 3,
        'type'          => 'textarea'
    )
);

// Address Title
$wp_customize->add_setting( $prefix .'_contact_us_general_address_title',
    array(
        'sanitize_callback' => 'clubstiftung_sanitize_html',
        'default'           => __( 'Address', 'clubstiftung' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_contact_us_general_address_title',
    array(
        'label'         => __( 'Address Title', 'clubstiftung' ),
        'description'   => __( 'Add the title for address block from this section.', 'clubstiftung'),
        'section'       => $prefix . '_contact_us_general',
        'priority'      => 4
    )
);

// Customer Support Title
$wp_customize->add_setting( $prefix .'_contact_us_general_customer_support_title',
    array(
        'sanitize_callback' => 'clubstiftung_sanitize_html',
        'default'           => __( 'Customer Support', 'clubstiftung' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_contact_us_general_customer_support_title',
    array(
        'label'         => __( 'Customer Support Title', 'clubstiftung' ),
        'description'   => __( 'Add the title for customer support block from this section.', 'clubstiftung'),
        'section'       => $prefix . '_contact_us_general',
        'priority'      => 5
    )
);

// Contact Form 7
$wp_customize->add_setting( 'clubstiftung_contact_us_general_contact_form_7',
    array(
        'sanitize_callback' => 'sanitize_key'
    )
);
$wp_customize->add_control( new clubstiftung_CF7_Custom_Control(
    $wp_customize,
    'clubstiftung_contact_us_general_contact_form_7',
        array(
            'label'             => __( 'Select the contact form you\'d like to display (powered by Contact Form 7)', 'clubstiftung' ),
            'section'           => $prefix . '_contact_us_general',
            'priority'          => 6,
            'type'              => 'clubstiftung_contact_form_7'
        )
    )
);

// Contact Form Creation
$wp_customize->add_setting(
    $prefix . '_contact_us_general_install_contact_form_7',
    array(
        'sanitize_callback' => 'esc_html',
        'default'           => '',
        'transport'         => 'refresh'
    )
);
$wp_customize->add_control(
    new clubstiftung_Text_Custom_Control(
        $wp_customize, $prefix . '_contact_us_general_install_contact_form_7',
        array(
            'label'             => __( 'Contact Form Creation', 'clubstiftung' ),
            'description'       => sprintf( '%s %s %s', __( 'Install', 'clubstiftung' ), '<a href="https://wordpress.org/plugins/contact-form-7/" title="Contact Form 7" target="_blank">Contact Form 7</a>', __( 'and select a contact form to work this setting.', 'clubstiftung' ) ),
            'section'           => $prefix .'_contact_us_general',
            'settings'          => $prefix . '_contact_us_general_install_contact_form_7',
            'priority'          => 7,
            'active_callback'   => 'clubstiftung_is_not_active_contact_form_7'
        )
    )
);