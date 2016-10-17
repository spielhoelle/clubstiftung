<?php
/***********************************************/
/*************** Sections Order  ***************/
/***********************************************/
$wp_customize->add_section( $prefix.'_general_sections_order' ,
    array(
        'title'       => __( 'Sections Order', 'clubstiftung' ),
        'priority'    => 101
    )
);

// First section
$wp_customize->add_setting(
    $prefix . '_general_sections_order_first_section',
    array(
        'sanitize_callback' => 'clubstiftung_sanitize_select',
        'default'           => 1
    )
);
$wp_customize->add_control(
    $prefix . '_general_sections_order_first_section',
    array(
        'label'         => __( 'First section', 'clubstiftung' ),
        'description'   => __( 'Please select what you want to display on the first section from front page.', 'clubstiftung' ),
        'type'          => 'select',
        'section'       => $prefix . '_general_sections_order',
        'choices'       => array(
            1   => __( 'About', 'clubstiftung' ),
            2   => __( 'Projects', 'clubstiftung' ),
            3   => __( 'Supports', 'clubstiftung' ),
            4   => __( 'Services', 'clubstiftung' ),
            5   => __( 'Latest News', 'clubstiftung' ),
            6   => __( 'Counter', 'clubstiftung' ),
            7   => __( 'Team', 'clubstiftung' ),
            8   => __( 'Contact us', 'clubstiftung' )
        )
    )
);

// Second section
$wp_customize->add_setting(
    $prefix . '_general_sections_order_second_section',
    array(
        'sanitize_callback' => 'clubstiftung_sanitize_select',
        'default'           => 2
    )
);
$wp_customize->add_control(
    $prefix . '_general_sections_order_second_section',
    array(
        'label'         => __( 'Second section', 'clubstiftung' ),
        'description'   => __( 'Please select what you want to display on the second section from front page.', 'clubstiftung' ),
        'type'          => 'select',
        'section'       => $prefix . '_general_sections_order',
        'choices'       => array(
            1   => __( 'About', 'clubstiftung' ),
            2   => __( 'Projects', 'clubstiftung' ),
            3   => __( 'Supports', 'clubstiftung' ),
            4   => __( 'Services', 'clubstiftung' ),
            5   => __( 'Latest News', 'clubstiftung' ),
            6   => __( 'Counter', 'clubstiftung' ),
            7   => __( 'Team', 'clubstiftung' ),
            8   => __( 'Contact us', 'clubstiftung' )
        )
    )
);

// Third section
$wp_customize->add_setting(
    $prefix . '_general_sections_order_third_section',
    array(
        'sanitize_callback' => 'clubstiftung_sanitize_select',
        'default'           => 3
    )
);
$wp_customize->add_control(
    $prefix . '_general_sections_order_third_section',
    array(
        'label'         => __( 'Third section', 'clubstiftung' ),
        'description'   => __( 'Please select what you want to display on the third section from front page.', 'clubstiftung' ),
        'type'          => 'select',
        'section'       => $prefix . '_general_sections_order',
        'choices'       => array(
            1   => __( 'About', 'clubstiftung' ),
            2   => __( 'Projects', 'clubstiftung' ),
            3   => __( 'Supports', 'clubstiftung' ),
            4   => __( 'Services', 'clubstiftung' ),
            5   => __( 'Latest News', 'clubstiftung' ),
            6   => __( 'Counter', 'clubstiftung' ),
            7   => __( 'Team', 'clubstiftung' ),
            8   => __( 'Contact us', 'clubstiftung' )
        )
    )
);

// Fourth section
$wp_customize->add_setting(
    $prefix . '_general_sections_order_fourth_section',
    array(
        'sanitize_callback' => 'clubstiftung_sanitize_select',
        'default'           => 4
    )
);
$wp_customize->add_control(
    $prefix . '_general_sections_order_fourth_section',
    array(
        'label'         => __( 'Fourth section', 'clubstiftung' ),
        'description'   => __( 'Please select what you want to display on the fourth section from front page.', 'clubstiftung' ),
        'type'          => 'select',
        'section'       => $prefix . '_general_sections_order',
        'choices'       => array(
            1   => __( 'About', 'clubstiftung' ),
            2   => __( 'Projects', 'clubstiftung' ),
            3   => __( 'Supports', 'clubstiftung' ),
            4   => __( 'Services', 'clubstiftung' ),
            5   => __( 'Latest News', 'clubstiftung' ),
            6   => __( 'Counter', 'clubstiftung' ),
            7   => __( 'Team', 'clubstiftung' ),
            8   => __( 'Contact us', 'clubstiftung' )
        )
    )
);

// Fifth section
$wp_customize->add_setting(
    $prefix . '_general_sections_order_fifth_section',
    array(
        'sanitize_callback' => 'clubstiftung_sanitize_select',
        'default'           => 5
    )
);
$wp_customize->add_control(
    $prefix . '_general_sections_order_fifth_section',
    array(
        'label'         => __( 'Fifth section', 'clubstiftung' ),
        'description'   => __( 'Please select what you want to display on the fifth section from front page.', 'clubstiftung' ),
        'type'          => 'select',
        'section'       => $prefix . '_general_sections_order',
        'choices'       => array(
            1   => __( 'About', 'clubstiftung' ),
            2   => __( 'Projects', 'clubstiftung' ),
            3   => __( 'Supports', 'clubstiftung' ),
            4   => __( 'Services', 'clubstiftung' ),
            5   => __( 'Latest News', 'clubstiftung' ),
            6   => __( 'Counter', 'clubstiftung' ),
            7   => __( 'Team', 'clubstiftung' ),
            8   => __( 'Contact us', 'clubstiftung' )
        )
    )
);

// Sixth section
$wp_customize->add_setting(
    $prefix . '_general_sections_order_sixth_section',
    array(
        'sanitize_callback' => 'clubstiftung_sanitize_select',
        'default'           => 6
    )
);
$wp_customize->add_control(
    $prefix . '_general_sections_order_sixth_section',
    array(
        'label'         => __( 'Sixth section', 'clubstiftung' ),
        'description'   => __( 'Please select what you want to display on the sixth section from front page.', 'clubstiftung' ),
        'type'          => 'select',
        'section'       => $prefix . '_general_sections_order',
        'choices'       => array(
            1   => __( 'About', 'clubstiftung' ),
            2   => __( 'Projects', 'clubstiftung' ),
            3   => __( 'Supports', 'clubstiftung' ),
            4   => __( 'Services', 'clubstiftung' ),
            5   => __( 'Latest News', 'clubstiftung' ),
            6   => __( 'Counter', 'clubstiftung' ),
            7   => __( 'Team', 'clubstiftung' ),
            8   => __( 'Contact us', 'clubstiftung' )
        )
    )
);

// Seventh section
$wp_customize->add_setting(
    $prefix . '_general_sections_order_seventh_section',
    array(
        'sanitize_callback' => 'clubstiftung_sanitize_select',
        'default'           => 7
    )
);
$wp_customize->add_control(
    $prefix . '_general_sections_order_seventh_section',
    array(
        'label'         => __( 'Seventh section', 'clubstiftung' ),
        'description'   => __( 'Please select what you want to display on the seventh section from front page.', 'clubstiftung' ),
        'type'          => 'select',
        'section'       => $prefix . '_general_sections_order',
        'choices'       => array(
            1   => __( 'About', 'clubstiftung' ),
            2   => __( 'Projects', 'clubstiftung' ),
            3   => __( 'Supports', 'clubstiftung' ),
            4   => __( 'Services', 'clubstiftung' ),
            5   => __( 'Latest News', 'clubstiftung' ),
            6   => __( 'Counter', 'clubstiftung' ),
            7   => __( 'Team', 'clubstiftung' ),
            8   => __( 'Contact us', 'clubstiftung' )
        )
    )
);

// Eighth section
$wp_customize->add_setting(
    $prefix . '_general_sections_order_eighth_section',
    array(
        'sanitize_callback' => 'clubstiftung_sanitize_select',
        'default'           => 8
    )
);
$wp_customize->add_control(
    $prefix . '_general_sections_order_eighth_section',
    array(
        'label'         => __( 'Eighth section', 'clubstiftung' ),
        'description'   => __( 'Please select what you want to display on the eighth section from front page.', 'clubstiftung' ),
        'type'          => 'select',
        'section'       => $prefix . '_general_sections_order',
        'choices'       => array(
            1   => __( 'About', 'clubstiftung' ),
            2   => __( 'Projects', 'clubstiftung' ),
            3   => __( 'Supports', 'clubstiftung' ),
            4   => __( 'Services', 'clubstiftung' ),
            5   => __( 'Latest News', 'clubstiftung' ),
            6   => __( 'Counter', 'clubstiftung' ),
            7   => __( 'Team', 'clubstiftung' ),
            8   => __( 'Contact us', 'clubstiftung' )
        )
    )
);
