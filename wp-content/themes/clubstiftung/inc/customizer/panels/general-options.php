<?php
    // Set Panel ID
    $panel_id = 'clubstiftung_panel_general';

    // Set prefix
    $prefix = 'clubstiftung';

    // Change panel for Site Title & Tagline Section
    $site_title        = $wp_customize->get_section( 'title_tagline' );
    $site_title->panel = $panel_id;

    // Remove sections from customizer front-view
    $wp_customize->remove_section('colors');

    // Change panel for Background Image
    $site_title        = $wp_customize->get_section( 'background_image' );
    $site_title->panel = $panel_id;

    // Change panel for Static Front Page
    $site_title        = $wp_customize->get_section( 'static_front_page' );
    $site_title->panel = $panel_id;


    // // Change priority for Site Title
    // $site_title           = $wp_customize->get_control( 'blogname' );
    // $site_title->priority = 15;

    // // Change priority for Site Tagline
    // $site_title           = $wp_customize->get_control( 'blogdescription' );
    // $site_title->priority = 17;


    /***********************************************/
    /************** GENERAL OPTIONS  ***************/
    /***********************************************/


    $wp_customize->add_panel( $panel_id,
        array(
            'priority' => 1,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __( 'General Options', 'clubstiftung' ),
            'description' => __('You can change the site layout in this area as well as your contact details (the ones displayed in the header & footer) ', 'clubstiftung'),
        )
    );

    /***********************************************/
    /****************** Preloader  *****************/
    /***********************************************/

    $wp_customize->add_section( $prefix . '_preloader_section',
        array(
            'title'       => __( 'Preloader', 'clubstiftung' ),
            'priority'    => 1,
            'panel'       => $panel_id
        )
    );

    // Enable the preloader?
    $wp_customize->add_setting( $prefix . '_preloader_enable',
        array(
            'sanitize_callback' => $prefix . '_value_checkbox_helper',
            'default'           => 1
        )
    );
    $wp_customize->add_control(
        $prefix . '_preloader_enable',
        array(
            'type'          => 'checkbox',
            'label'         => __( 'Enable the preloader?', 'clubstiftung' ),
            'section'       => $prefix . '_preloader_section',
            'priority'      => 1
        )
    );

    // Background Color
    $wp_customize->add_setting(
        $prefix . '_preloader_background_color',
        array(
            'sanitize_callback' => 'sanitize_hex_color',
            'default'           => '#ffffff',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        $prefix . '_preloader_background_color',
        array(
            'label'     => __( 'Background Color', 'clubstiftung' ),
            'section'   => $prefix . '_preloader_section',
            'settings'  => $prefix . '_preloader_background_color',
            'priority'  => 2
        ) )
    );

    // Primary Color
    $wp_customize->add_setting(
        $prefix . '_preloader_primary_color',
        array(
            'sanitize_callback' => 'sanitize_hex_color',
            'default'           => '#f1d204',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        $prefix . '_preloader_primary_color',
        array(
            'label'     => __( 'Primary Color', 'clubstiftung' ),
            'section'   => $prefix . '_preloader_section',
            'settings'  => $prefix . '_preloader_primary_color',
            'priority'  => 3
        ) )
    );

    // Secondly Color
    $wp_customize->add_setting(
        $prefix . '_preloader_secondly_color',
        array(
            'sanitize_callback' => 'sanitize_hex_color',
            'default'           => '#ffffff',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        $prefix . '_preloader_secondly_color',
        array(
            'label'     => __( 'Secondly Color', 'clubstiftung' ),
            'section'   => $prefix . '_preloader_section',
            'settings'  => $prefix . '_preloader_secondly_color',
            'priority'  => 4
        ) )
    );

    /***********************************************/
    /*********** General Site Settings  ************/
    /***********************************************/

    /* Logo */
    $wp_customize->add_section( $prefix.'_general_section' ,
        array(
            'title'       => __( 'Logo', 'clubstiftung' ),
            'priority'    => 2,
            'panel' 	  => $panel_id
        )
    );


    /* Company text logo */
    $wp_customize->add_setting($prefix.'_text_logo',
        array(
            'sanitize_callback' => 'clubstiftung_sanitize_html',
            'default'           => __('clubstiftung', 'clubstiftung'),
            'transport'         => 'postMessage'
        )
    );

    $wp_customize->add_control(
        $prefix.'_text_logo',
        array(
            'label' 		=> __('Enter company name', 'clubstiftung'),
            'description'   => __('This field is best used when you don\'t have a professional image logo', 'clubstiftung'),
            'section' 		=> $prefix.'_general_section',
            'priority' 		=> 2
        )
    );


    /***********************************************/
    /************** Contact Details  ***************/
    /***********************************************/

    $wp_customize->add_section( $prefix.'_general_contact_section' ,
        array(
            'title'         => __( 'Contact Details', 'clubstiftung' ),
            'description'   => __( 'These are the contact details displayed in the Contact us section from front page.', 'clubstiftung' ),
            'priority'      => 3,
            'panel'         => $panel_id
        )
    );

	/* Facebook URL */
	$wp_customize->add_setting( 'clubstiftung_contact_bar_facebook_url',
		array(
			'sanitize_callback'  => 'esc_url',
			'default'            => esc_url('#'),
            'transport'          => 'postMessage'
		)
	);

	$wp_customize->add_control( 'clubstiftung_contact_bar_facebook_url',
		array(
			'label'          => __( 'Facebook URL', 'clubstiftung' ),
			'description'    => __( 'Will be displayed in the contact section from front page.', 'clubstiftung' ),
			'section'        => $prefix.'_general_contact_section',
			'settings'       => 'clubstiftung_contact_bar_facebook_url',
			'priority'       => 10
		)
	);

	/* Twitter URL */
	$wp_customize->add_setting( $prefix.'_contact_bar_twitter_url',
		array(
			'sanitize_callback'  => 'esc_url',
			'default'            => esc_html('#'),
            'transport'          => 'postMessage'
		)
	);

	$wp_customize->add_control( $prefix.'_contact_bar_twitter_url',
		array(
			'label'          => __( 'Twitter URL', 'clubstiftung' ),
			'description'    => __('Will be displayed in the contact section from front page.', 'clubstiftung'),
			'section'        => $prefix.'_general_contact_section',
			'settings'       => $prefix.'_contact_bar_twitter_url',
			'priority'       => 10
		)
	);

	/* LinkedIN URL */
	$wp_customize->add_setting( $prefix.'_contact_bar_linkedin_url',
		array(
			'sanitize_callback'  => 'esc_url',
			'default'            => esc_html('#'),
            'transport'          => 'postMessage'
		)
	);

	$wp_customize->add_control( $prefix.'_contact_bar_linkedin_url',
		array(
			'label'          => __( 'LinkedIN URL', 'clubstiftung' ),
			'description'    => __('Will be displayed in the contact section from front page.', 'clubstiftung'),
			'section'        => $prefix.'_general_contact_section',
			'settings'       => $prefix.'_contact_bar_linkedin_url',
			'priority'       => 10
		)
	);

	/* email */
    $wp_customize->add_setting( $prefix.'_email',
        array(
            'sanitize_callback'  => 'sanitize_text_field',
            'default'            => __( 'contact@site.com', 'clubstiftung' ),
            'transport'          => 'postMessage'
        )
    );

    $wp_customize->add_control( $prefix.'_email',
        array(
            'label'         => __( 'Email addr.', 'clubstiftung' ),
            'description'   => __( 'Will be displayed in the contact section from front page.', 'clubstiftung'),
            'section'       => $prefix.'_general_contact_section',
            'settings'      => $prefix.'_email',
            'priority'      => 10
        )
    );


    /* phone number */
    $wp_customize->add_setting( $prefix.'_phone',
        array(
            'sanitize_callback'  => 'clubstiftung_sanitize_html',
            'default'            => __( '(555) 555-5555', 'clubstiftung' ),
            'transport'          => 'postMessage'
        )
    );

    $wp_customize->add_control( $prefix.'_phone',
        array(
            'label'         => __( 'Phone number', 'clubstiftung' ),
            'description'   => __( 'Will be displayed in the contact section from front page.', 'clubstiftung'),
            'section'       => $prefix.'_general_contact_section',
            'settings'      => $prefix.'_phone',
            'priority'      => 12
        )
    );

    // Address 1
    $wp_customize->add_setting(
        $prefix . '_address1',
        array(
            'sanitize_callback'  => 'clubstiftung_sanitize_html',
            'default'            => __( 'Street 221B Baker Street, ', 'clubstiftung' ),
            'transport'          => 'postMessage'
        )
    );

    $wp_customize->add_control(
        $prefix . '_address1',
        array(
            'label'         => __( 'Address 1', 'clubstiftung' ),
            'description'   => __( 'Will be displayed in the contact section from front page.', 'clubstiftung'),
            'section'       => $prefix . '_general_contact_section',
            'priority'      => 13
        )
    );

    // Address 2
    $wp_customize->add_setting(
        $prefix . '_address2',
        array(
            'sanitize_callback'  => 'clubstiftung_sanitize_html',
            'default'            => __( 'London, UK', 'clubstiftung' ),
            'transport'          => 'postMessage'
        )
    );

    $wp_customize->add_control(
        $prefix . '_address2',
        array(
            'label'         => __( 'Address 2', 'clubstiftung' ),
            'description'   => __( 'Will be displayed in the contact section from front page.', 'clubstiftung'),
            'section'       => $prefix . '_general_contact_section',
            'priority'      => 13
        )
    );

      /***********************************************/
      /************** Footer Details  ***************/
      /***********************************************/
      $wp_customize->add_section( $prefix.'_general_footer_section' ,
          array(
              'title'       => __( 'Footer Details', 'clubstiftung' ),
              'description' => __( 'Change the footer copyright message from here. Note: no HTML allowed.', 'clubstiftung'),
              'priority'    => 4,
              'panel' => $panel_id
          )
      );

      // Display theme copyright in the footer?
      $wp_customize->add_setting( $prefix . '_general_footer_display_copyright',
          array(
              'sanitize_callback' => $prefix . '_sanitize_checkbox',
              'default'           => 1,
              'transport'         => 'postMessage'
          )
      );
      $wp_customize->add_control(
          $prefix . '_general_footer_display_copyright',
          array(
              'type'          => 'checkbox',
              'label'         => __( 'Display theme copyright in the footer?', 'clubstiftung' ),
              'section'       => $prefix . '_general_footer_section',
              'priority'      => 1
          )
      );

      /* Footer Copyright */
      $wp_customize->add_setting(
          $prefix . '_footer_copyright',
          array(
              'sanitize_callback' => 'clubstiftung_sanitize_html',
              'default'           => __( '&copy; Copyright 2016. All Rights Reserved.', 'clubstiftung' ),
              'transport'         => 'postMessage'
          )
      );

      $wp_customize->add_control(
          $prefix . '_footer_copyright',
          array(
              'label'     => __( 'Footer Copyright', 'clubstiftung' ),
              'section'   => $prefix . '_general_footer_section',
              'priority'  => 2
          )
      );

      /* Footer Image Logo */
      $wp_customize->add_setting(
          $prefix . '_img_footer_logo',
          array(
              'sanitize_callback' => 'esc_url_raw',
              'transport'         => 'postMessage'
          )
      );

      $wp_customize->add_control(
          new WP_Customize_Image_Control(
              $wp_customize, $prefix . '_img_footer_logo',
              array(
                  'label'     => __( 'Footer Logo', 'clubstiftung' ),
                  'section'   => $prefix.'_general_footer_section',
                  'settings'  => $prefix . '_img_footer_logo',
                  'priority'  => 3
              )
          )
      );
