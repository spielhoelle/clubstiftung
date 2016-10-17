<?php
// Set Panel ID
$panel_id = 'clubstiftung_panel_team';

// Set prefix
$prefix = 'clubstiftung';

/***********************************************/
/********************** TEAM  ******************/
/***********************************************/
$wp_customize->add_panel( $panel_id,
    array(
        'priority'          => 108,
        'capability'        => 'edit_theme_options',
        'theme_supports'    => '',
        'title'             => __( 'Team', 'clubstiftung' ),
        'description'       => __( 'Control various options for team section from front page.', 'clubstiftung' ),
    )
);

/***********************************************/
/******************* General *******************/
/***********************************************/
$wp_customize->add_section( $prefix . '_team_general' ,
    array(
        'title'     => __( 'General', 'clubstiftung' ),
        'panel'     => $panel_id,
        'priority'  => 1
    )
);

// Show this section
$wp_customize->add_setting( $prefix . '_team_general_show',
    array(
        'sanitize_callback' => $prefix . '_sanitize_checkbox',
        'default'           => 1,
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix . '_team_general_show',
    array(
        'type'      => 'checkbox',
        'label'     => __( 'Show this section?', 'clubstiftung' ),
        'section'   => $prefix . '_team_general',
        'priority'  => 1
    )
);

// Title
$wp_customize->add_setting( $prefix .'_team_general_title',
    array(
        'sanitize_callback' => 'clubstiftung_sanitize_html',
        'default'           => __( 'Team', 'clubstiftung' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_team_general_title',
    array(
        'label'         => __( 'Title', 'clubstiftung' ),
        'description'   => __( 'Add the title for this section.', 'clubstiftung'),
        'section'       => $prefix . '_team_general',
        'priority'      => 2
    )
);

// Entry
$wp_customize->add_setting( $prefix .'_team_general_entry',
    array(
        'sanitize_callback' => 'clubstiftung_sanitize_html',
        'default'           => __( 'Meet the people that are going to take your business to the next level.', 'clubstiftung' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_team_general_entry',
    array(
        'label'         => __( 'Entry', 'clubstiftung' ),
        'description'   => __( 'Add the content for this section.', 'clubstiftung'),
        'section'       => $prefix . '_team_general',
        'priority'      => 3,
        'type'          => 'textarea'
    )
);