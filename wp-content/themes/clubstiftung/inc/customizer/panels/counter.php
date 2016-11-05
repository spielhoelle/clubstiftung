<?php
// Set Panel ID
$panel_id = 'clubstiftung_panel_counter';

// Set prefix
$prefix = 'clubstiftung';

/***********************************************/
/******************* COUNTER  ******************/
/***********************************************/
$wp_customize->add_panel( $panel_id,
    array(
        'priority'          => 107,
        'capability'        => 'edit_theme_options',
        'theme_supports'    => '',
        'title'             => __( 'Counter', 'clubstiftung' ),
        'description'       => __( 'Control various options for counter section from front page.', 'clubstiftung' ),
    )
);

/***********************************************/
/******************* General *******************/
/***********************************************/
$wp_customize->add_section( $prefix . '_counter_general' ,
    array(
        'title'     => __( 'General', 'clubstiftung' ),
        'panel'     => $panel_id,
        'priority'  => 1
    )
);

// Show this section
$wp_customize->add_setting( $prefix . '_counter_general_show',
    array(
        'sanitize_callback' => $prefix . '_sanitize_checkbox',
        'default'           => 1,
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix . '_counter_general_show',
    array(
        'type'      => 'checkbox',
        'label'     => __( 'Show this section?', 'clubstiftung' ),
        'section'   => $prefix . '_counter_general',
        'priority'  => 1
    )
);

// Entry
$wp_customize->add_setting( $prefix .'_counter_general_title',
    array(
        'sanitize_callback' => 'clubstiftung_sanitize_html',
        'default'           => "",
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_counter_general_title',
    array(
        'label'         => __( 'Title', 'clubstiftung' ),
        'description'   => __( 'Add a title for this section.', 'clubstiftung'),
        'section'       => $prefix . '_counter_general',
        'priority'      => 2,
        'type'          => 'textfield'
    )
);

// Entry
$wp_customize->add_setting( $prefix .'_counter_general_entry',
    array(
        'sanitize_callback' => 'clubstiftung_sanitize_html',
        'default'           => "",
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_counter_general_entry',
    array(
        'label'         => __( 'Entry', 'clubstiftung' ),
        'description'   => __( 'Add the content for this section.', 'clubstiftung'),
        'section'       => $prefix . '_counter_general',
        'priority'      => 2,
        'type'          => 'textarea'
    )
);

/***********************************************/
/**************** Background *******************/
/***********************************************/
$wp_customize->add_section( $prefix . '_counter_background' ,
    array(
        'title'     => __( 'Background', 'clubstiftung' ),
        'panel'     => $panel_id,
        'priority'  => 2
    )
);

// Type of Background
$wp_customize->add_setting( $prefix . '_counter_background_type', array(
    'default'           => 'image',
    'sanitize_callback' => 'clubstiftung_sanitize_radio_buttons',
    'transport'         => 'postMessage'
) );
$wp_customize->add_control( $prefix . '_counter_background_type', array(
    'label'     => __( 'Type of Background', 'clubstiftung' ),
    'section'   => $prefix .'_counter_background',
    'settings'  => $prefix . '_counter_background_type',
    'type'      => 'radio',
    'choices'   => array(
        'image'     => __( 'Image', 'clubstiftung' ),
        'color'     => __( 'Color', 'clubstiftung' )
    ),
    'priority'  => 1
) );

// Image
$wp_customize->add_setting(
    $prefix . '_counter_background_image',
    array(
        'sanitize_callback' => 'esc_url_raw',
        'default'           => esc_url( get_template_directory_uri() . '/layout/images/front-page/front-page-counter.jpg' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize, $prefix . '_counter_background_image',
        array(
            'label'     => __( 'Image', 'clubstiftung' ),
            'section'   => $prefix .'_counter_background',
            'settings'  => $prefix . '_counter_background_image',
            'priority'  => 2
        )
    )
);

// Color
$wp_customize->add_setting(
    $prefix . '_counter_background_color',
    array(
        'sanitize_callback' => 'sanitize_hex_color',
        'default'           => '#000000',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
    $wp_customize,
    $prefix . '_counter_background_color',
    array(
        'label'     => __( 'Color', 'clubstiftung' ),
        'section'   => $prefix .'_counter_background',
        'settings'  => $prefix . '_counter_background_color',
        'priority'  => 3
    ) )
);
