<?php
// Set Panel ID
$panel_id = 'clubstiftung_panel_supports';

// Set prefix
$prefix = 'clubstiftung';

/***********************************************/
/****************** SUPPORTS  ******************/
/***********************************************/
$wp_customize->add_panel( $panel_id,
    array(
        'priority'          => 103,
        'capability'        => 'edit_theme_options',
        'theme_supports'    => '',
        'title'             => __( 'Supports', 'clubstiftung' ),
        'description'       => __( 'Control various options for supports section from front page.', 'clubstiftung' ),
    )
);

/***********************************************/
/******************* General *******************/
/***********************************************/
$wp_customize->add_section( $prefix . '_supports_general' ,
    array(
        'title'     => __( 'General', 'clubstiftung' ),
        'panel'     => $panel_id,
        'priority'  => 1
    )
);

// Show this section
$wp_customize->add_setting( $prefix . '_supports_general_show',
    array(
        'sanitize_callback' => $prefix . '_sanitize_checkbox',
        'default'           => 1,
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix . '_supports_general_show',
    array(
        'type'      => 'checkbox',
        'label'     => __( 'Show this section?', 'clubstiftung' ),
        'section'   => $prefix . '_supports_general',
        'priority'  => 1
    )
);

// Title
$wp_customize->add_setting( $prefix .'_supports_general_title',
    array(
        'sanitize_callback' => 'clubstiftung_sanitize_html',
        'default'           => __( 'Supports', 'clubstiftung' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_supports_general_title',
    array(
        'label'         => __( 'Title', 'clubstiftung' ),
        'description'   => __( 'Add the title for this section.', 'clubstiftung'),
        'section'       => $prefix . '_supports_general',
        'priority'      => 2
    )
);

// Entry
$wp_customize->add_setting( $prefix .'_supports_general_entry',
    array(
        'sanitize_callback' => 'clubstiftung_sanitize_html',
        'default'           => __( 'You\'ll love our work. Check it out!', 'clubstiftung' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_supports_general_entry',
    array(
        'label'         => __( 'Entry', 'clubstiftung' ),
        'description'   => __( 'Add the content for this section.', 'clubstiftung'),
        'section'       => $prefix . '_supports_general',
        'priority'      => 3,
        'type'          => 'textarea'
    )
);
