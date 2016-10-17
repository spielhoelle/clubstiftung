<?php
// Set Panel ID
$panel_id = 'clubstiftung_panel_latest_news';

// Set prefix
$prefix = 'clubstiftung';

/***********************************************/
/*************** LATEST NEWS  ******************/
/***********************************************/
/*
$wp_customize->add_panel( $panel_id,
    array(
        'priority'          => 101,
        'capability'        => 'edit_theme_options',
        'theme_supports'    => '',
        'title'             => __( 'Latest News', 'clubstiftung' ),
        'description'       => __( 'Control various options for latest news section from front page.', 'clubstiftung' ),
    )
);
*/

/***********************************************/
/******************* General *******************/
/***********************************************/
$wp_customize->add_section( $prefix . '_latest_news_general' ,
    array(
        'title'         => __( 'Latest News', 'clubstiftung' ),
        'description'   => __( 'Control various options for latest news section from front page.', 'clubstiftung' ),
        'priority'      => 106
        // 'title'       => __( 'General', 'clubstiftung' ),
        // 'panel' 	  => $panel_id
    )
);

// Show this section
$wp_customize->add_setting( $prefix . '_latest_news_general_show',
    array(
        'sanitize_callback' => $prefix . '_sanitize_checkbox',
        'default'           => 1,
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix . '_latest_news_general_show',
    array(
        'type'      => 'checkbox',
        'label'     => __( 'Show this section?', 'clubstiftung' ),
        'section'   => $prefix . '_latest_news_general',
        'priority'  => 1
    )
);

// Title
$wp_customize->add_setting( $prefix .'_latest_news_general_title',
    array(
        'sanitize_callback' => 'clubstiftung_sanitize_html',
        'default'           => __( 'Latest News', 'clubstiftung' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_latest_news_general_title',
    array(
        'label'         => __( 'Title', 'clubstiftung' ),
        'description'   => __( 'Add the title for this section.', 'clubstiftung'),
        'section'       => $prefix . '_latest_news_general',
        'priority'      => 2
    )
);

// Entry
$wp_customize->add_setting( $prefix .'_latest_news_general_entry',
    array(
        'sanitize_callback' => 'clubstiftung_sanitize_html',
        'default'           => __( 'If you are interested in the latest articles in the industry, take a sneak peek at our blog. You have nothing to loose!', 'clubstiftung' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_latest_news_general_entry',
    array(
        'label'         => __( 'Entry', 'clubstiftung' ),
        'description'   => __( 'Add the content for this section.', 'clubstiftung'),
        'section'       => $prefix . '_latest_news_general',
        'priority'      => 3,
        'type'          => 'textarea'
    )
);

// Button Text
$wp_customize->add_setting( $prefix .'_latest_news_button_text',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => __( 'See blog', 'clubstiftung' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_latest_news_button_text',
    array(
        'label'         => __( 'Button Text', 'clubstiftung' ),
        'description'   => __( 'Add the button text for this section.', 'clubstiftung'),
        'section'       => $prefix . '_latest_news_general',
        'priority'      => 4
    )
);

// Button URL
$wp_customize->add_setting( 'clubstiftung_latest_news_button_url',
    array(
        'sanitize_callback'  => 'esc_url',
        'default'            => esc_url( '#' ),
        'transport'          => 'postMessage'
    )
);
$wp_customize->add_control( 'clubstiftung_latest_news_button_url',
    array(
        'label'          => __( 'Button URL', 'clubstiftung' ),
        'description'    => __( 'Add the button URL for this section.', 'clubstiftung'),
        'section'        => $prefix . '_latest_news_general',
        'settings'       => 'clubstiftung_latest_news_button_url',
        'priority'       => 5
    )
);

// Number of posts
$wp_customize->add_setting( $prefix .'_latest_news_number_of_posts',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 3,
    )
);
$wp_customize->add_control(
    $prefix .'_latest_news_number_of_posts',
    array(
        'label'         => __( 'Number of posts', 'clubstiftung' ),
        'description'   => __( 'Add the number of posts to show in this section.', 'clubstiftung'),
        'section'       => $prefix . '_latest_news_general',
        'priority'      => 5
    )
);
