<?php
// Set Panel ID
$panel_id = 'clubstiftung_panel_about';

// Set prefix
$prefix = 'clubstiftung';

/***********************************************/
/********************* ABOUT  ******************/
/***********************************************/
$wp_customize->add_panel( $panel_id,
    array(
        'priority'          => 102,
        'capability'        => 'edit_theme_options',
        'theme_supports'    => '',
        'title'             => __( 'About', 'clubstiftung' ),
        'description'       => __( 'Control various options for about section from front page.', 'clubstiftung' ),
    )
);

/***********************************************/
/******************* General *******************/
/***********************************************/
$wp_customize->add_section( $prefix . '_about_general' ,
    array(
        'title'     => __( 'General', 'clubstiftung' ),
        'panel'     => $panel_id,
        'priority'  => 1
    )
);

// Show this section
$wp_customize->add_setting( $prefix . '_about_general_show',
    array(
        'sanitize_callback' => $prefix . '_sanitize_checkbox',
        'default'           => 1,
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix . '_about_general_show',
    array(
        'type'      => 'checkbox',
        'label'     => __( 'Show this section?', 'clubstiftung' ),
        'section'   => $prefix . '_about_general',
        'priority'  => 1
    )
);

// Title
$wp_customize->add_setting( $prefix .'_about_general_title',
    array(
        'sanitize_callback' => 'clubstiftung_sanitize_html',
        'default'           => __( 'About', 'clubstiftung' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_about_general_title',
    array(
        'label'         => __( 'Title', 'clubstiftung' ),
        'description'   => __( 'Add the title for this section.', 'clubstiftung'),
        'section'       => $prefix . '_about_general',
        'priority'      => 2
    )
);

// Entry
$wp_customize->add_setting( $prefix .'_about_general_entry',
    array(
        'sanitize_callback' => 'clubstiftung_sanitize_html',
        'default'           => __( 'It is an amazng one-page theme with great features that offers an incredible experience. It is easy to install, make changes, adapt for your business. A modern design with clean lines and styling for a wide variety of content, exactly how a business design should be. You can add as many images as you want to the main header area and turn them into slider.', 'clubstiftung' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_about_general_entry',
    array(
        'label'         => __( 'Entry', 'clubstiftung' ),
        'description'   => __( 'Add the content for this section.', 'clubstiftung'),
        'section'       => $prefix . '_about_general',
        'priority'      => 3,
        'type'          => 'textarea'
    )
);