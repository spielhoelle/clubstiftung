<?php
// Set Panel ID
$panel_id = 'illdy_panel_services';

// Set prefix
$prefix = 'illdy';

/***********************************************/
/****************** SERVICES  ******************/
/***********************************************/
$wp_customize->add_panel( $panel_id,
    array(
        'priority'          => 105,
        'capability'        => 'edit_theme_options',
        'theme_supports'    => '',
        'title'             => __( 'Services', 'illdy' ),
        'description'       => __( 'Control various options for services section from front page.', 'illdy' ),
    )
);

/***********************************************/
/******************* General *******************/
/***********************************************/
$wp_customize->add_section( $prefix . '_services_general' ,
    array(
        'title'     => __( 'General', 'illdy' ),
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
        'label'     => __( 'Show this section?', 'illdy' ),
        'section'   => $prefix . '_services_general',
        'priority'  => 1
    )
);

// Title
$wp_customize->add_setting( $prefix .'_services_general_title',
    array(
        'sanitize_callback' => 'illdy_sanitize_html',
        'default'           => __( 'Services', 'illdy' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_services_general_title',
    array(
        'label'         => __( 'Title', 'illdy' ),
        'description'   => __( 'Add the title for this section.', 'illdy'),
        'section'       => $prefix . '_services_general',
        'priority'      => 2
    )
);

// Entry
$wp_customize->add_setting( $prefix .'_services_general_entry',
    array(
        'sanitize_callback' => 'illdy_sanitize_html',
        'default'           => __( 'In order to help you grow your business, our carefully selected experts can advise you in in the following areas:', 'illdy' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_services_general_entry',
    array(
        'label'         => __( 'Entry', 'illdy' ),
        'description'   => __( 'Add the content for this section.', 'illdy'),
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
        'title'     => __( 'Background', 'illdy' ),
        'panel'     => $panel_id,
        'priority'  => 2
    )
);

// Type of Background
$wp_customize->add_setting( $prefix . '_services_background_type', array(
    'default'           => 'image',
    'sanitize_callback' => 'illdy_sanitize_radio_buttons',
    'transport'         => 'postMessage'
) );
$wp_customize->add_control( $prefix . '_services_background_type', array(
    'label'     => __( 'Type of Background', 'illdy' ),
    'section'   => $prefix .'_services_background',
    'settings'  => $prefix . '_services_background_type',
    'type'      => 'radio',
    'choices'   => array(
        'image'     => __( 'Image', 'illdy' ),
        'color'     => __( 'Color', 'illdy' )
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
            'label'     => __( 'Image', 'illdy' ),
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
        'label'     => __( 'Color', 'illdy' ),
        'section'   => $prefix .'_services_background',
        'settings'  => $prefix . '_services_background_color',
        'priority'  => 3
    ) ) 
);
