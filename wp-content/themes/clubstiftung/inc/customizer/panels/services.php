<?php
// Set Panel ID
$panel_id = 'clubstiftung_panel_services';

// Set prefix
$prefix = 'clubstiftung';

/***********************************************/
/****************** SERVICES  ******************/
/***********************************************/
$wp_customize->add_panel( $panel_id,
    array(
        'priority'          => 105,
        'capability'        => 'edit_theme_options',
        'theme_supports'    => '',
        'title'             => __( 'Services', 'clubstiftung' ),
        'description'       => __( 'Control various options for services section from front page.', 'clubstiftung' ),
    )
);

/***********************************************/
/******************* General *******************/
/***********************************************/
$wp_customize->add_section( $prefix . '_services_general' ,
    array(
        'title'     => __( 'General', 'clubstiftung' ),
        'panel'     => $panel_id,
        'priority'  => 1
    )
);

// Show this section
$wp_customize->add_setting( $prefix . '_services_general_show',
    array(
        'sanitize_callback' => $prefix . '_sanitize_checkbox',
        'default'           => 1,
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix . '_services_general_show',
    array(
        'type'      => 'checkbox',
        'label'     => __( 'Show this section?', 'clubstiftung' ),
        'section'   => $prefix . '_services_general',
        'priority'  => 1
    )
);

// Title
$wp_customize->add_setting( $prefix .'_services_general_title',
    array(
        'sanitize_callback' => 'clubstiftung_sanitize_html',
        'default'           => __( 'Services', 'clubstiftung' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_services_general_title',
    array(
        'label'         => __( 'Title', 'clubstiftung' ),
        'description'   => __( 'Add the title for this section.', 'clubstiftung'),
        'section'       => $prefix . '_services_general',
        'priority'      => 2
    )
);

// Entry
$wp_customize->add_setting( $prefix .'_services_general_entry',
    array(
        'sanitize_callback' => 'clubstiftung_sanitize_html',
        'default'           => __( 'In order to help you grow your business, our carefully selected experts can advise you in in the following areas:', 'clubstiftung' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_services_general_entry',
    array(
        'label'         => __( 'Entry', 'clubstiftung' ),
        'description'   => __( 'Add the content for this section.', 'clubstiftung'),
        'section'       => $prefix . '_services_general',
        'priority'      => 3,
        'type'          => 'textarea'
    )
);

/***********************************************/
/**************** Background *******************/
/***********************************************/
$wp_customize->add_section( $prefix . '_services_background' ,
    array(
        'title'     => __( 'Background', 'clubstiftung' ),
        'panel'     => $panel_id,
        'priority'  => 2
    )
);

// Type of Background
$wp_customize->add_setting( $prefix . '_services_background_type', array(
    'default'           => 'image',
    'sanitize_callback' => 'clubstiftung_sanitize_radio_buttons',
    'transport'         => 'postMessage'
) );
$wp_customize->add_control( $prefix . '_services_background_type', array(
    'label'     => __( 'Type of Background', 'clubstiftung' ),
    'section'   => $prefix .'_services_background',
    'settings'  => $prefix . '_services_background_type',
    'type'      => 'radio',
    'choices'   => array(
        'image'     => __( 'Image', 'clubstiftung' ),
        'color'     => __( 'Color', 'clubstiftung' )
    ),
    'priority'  => 1
) );

// Image
$wp_customize->add_setting(
    $prefix . '_services_background_image',
    array(
        'sanitize_callback' => 'esc_url_raw',
        'default'           => esc_url( get_template_directory_uri() . '/layout/images/front-page/front-page-counter.jpg' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize, $prefix . '_services_background_image',
        array(
            'label'     => __( 'Image', 'clubstiftung' ),
            'section'   => $prefix .'_services_background',
            'settings'  => $prefix . '_services_background_image',
            'priority'  => 2
        )
    )
);

// Color
$wp_customize->add_setting(
    $prefix . '_services_background_color',
    array(
        'sanitize_callback' => 'sanitize_hex_color',
        'default'           => '#000000',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    $prefix . '_services_background_color',
    array(
        'label'     => __( 'Color', 'clubstiftung' ),
        'section'   => $prefix .'_services_background',
        'settings'  => $prefix . '_services_background_color',
        'priority'  => 3
    ) ) 
);
