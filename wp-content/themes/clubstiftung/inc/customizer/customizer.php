<?php
/**
 *  Customizer
 */
if(!function_exists('clubstiftung_customize_register')) {
    function clubstiftung_customize_register( $wp_customize ) {

        // Get Settings
        $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
        $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
        $wp_customize->get_setting( 'header_image'  )->transport = 'postMessage';
        $wp_customize->get_setting( 'header_image_data'  )->transport = 'postMessage';

        $wp_customize->get_control( 'custom_logo'  )->section = 'clubstiftung_general_section';

        // Get Sections
        $wp_customize->get_section( 'header_image' )->title = __( 'Blog Header Image', 'clubstiftung' );

        /**********************************************/
        /*************** INIT ************************/
        /**********************************************/

        // Custom Controls
        require_once get_template_directory() . '/inc/customizer/custom-controls.php';

        // General Options
        require_once get_template_directory() . '/inc/customizer/panels/general-options.php';

        // Single Post Option
        require_once get_template_directory() . '/inc/customizer/panels/single-post-options.php';

        // Jumbotron
        require_once get_template_directory() . '/inc/customizer/panels/jumbotron.php';

        // Sections Order
        require_once get_template_directory() . '/inc/customizer/panels/sections-order.php';

        // About
        require_once get_template_directory() . '/inc/customizer/panels/about.php';

        // Supports
        require_once get_template_directory() . '/inc/customizer/panels/supports.php';

        // Projects
        require_once get_template_directory() . '/inc/customizer/panels/projects.php';

        // Services
        require_once get_template_directory() . '/inc/customizer/panels/services.php';

        // Latest News
        require_once get_template_directory() . '/inc/customizer/panels/latest-news.php';

        // Counter
        require_once get_template_directory() . '/inc/customizer/panels/counter.php';

        // Team
        require_once get_template_directory() . '/inc/customizer/panels/team.php';

        // Contact Us
        require_once get_template_directory() . '/inc/customizer/panels/contact-us.php';
    }
    add_action( 'customize_register', 'clubstiftung_customize_register');
}

/**
 *  Customizer Live Preview
 */
if(!function_exists('clubstiftung_customizer_live_preview')) {
    add_action( 'customize_preview_init', 'clubstiftung_customizer_live_preview' );
    function clubstiftung_customizer_live_preview() {
        wp_enqueue_script( 'clubstiftung-customizer-live-preview', get_template_directory_uri() . '/inc/customizer/assets/js/clubstiftung-customizer-live-preview.js', array('customize-preview'), '1.0', true);
    }
}

/**
 *  Customizer
 */
if(!function_exists('clubstiftung_customizer')) {
    add_action( 'customize_controls_enqueue_scripts', 'clubstiftung_customizer' );
    function clubstiftung_customizer() {
        wp_enqueue_script( 'clubstiftung-customizer', get_template_directory_uri() . '/inc/customizer/assets/js/customizer.js', array( 'jquery' ), '' /* '20120206' */, true  );
    }
}


/**
 *  Sanitize Radio Buttons
 */
if(!function_exists('clubstiftung_sanitize_radio_buttons')) {
    function clubstiftung_sanitize_radio_buttons( $input, $setting ) {
        global $wp_customize;

        $control = $wp_customize->get_control( $setting->id );

        if ( array_key_exists( $input, $control->choices ) ) {
            return $input;
        } else {
            return $setting->default;
        }
    }
}

/**
 *  Customizer CSS
 */
if( !function_exists( 'clubstiftung_customizer_css' ) ) {
    add_action( 'wp_head', 'clubstiftung_customizer_css' );
    function clubstiftung_customizer_css() {
        $preloader_primary_color = esc_attr(get_theme_mod( 'clubstiftung_preloader_primary_color', '#f1d204' ));
        $preloader_secondly_color = esc_attr(get_theme_mod( 'clubstiftung_preloader_secondly_color', '#ffffff' ));
        $preloader_background_color = esc_attr(get_theme_mod( 'clubstiftung_preloader_background_color', '#ffffff' ));

        $output = '';

        $output .= '<style type="text/css">';
            $output .= ( $preloader_primary_color ? '.pace .pace-progress {background-color: '. $preloader_primary_color .'; color: '. $preloader_primary_color .';}' : '' );
            $output .= ( $preloader_primary_color || $preloader_secondly_color ? '.pace .pace-activity {box-shadow: inset 0 0 0 2px '. $preloader_primary_color .', inset 0 0 0 7px '. $preloader_secondly_color .';}' : '' );
            $output .= ( $preloader_background_color ? '.pace-overlay {background-color: '. $preloader_background_color .';}' : '' );
        $output .= '</style>';

        echo $output;
    }
}

if( !function_exists( 'clubstiftung_sanitize_checkbox' ) ) {
    /**
     * Function to sanitize checkboxes
     *
     * @param $value
     * @return int
     */
    function clubstiftung_sanitize_checkbox($value)
    {
        if ($value == 1) {
            return 1;
        } else {
            return 0;
        }
    }
}

/**
 *  Active Callback: Is active JetPack Testimonials
 */
if( !function_exists( 'clubstiftung_is_active_jetpack_testimonials' ) ) {
    function clubstiftung_is_active_jetpack_testimonials() {
        if( post_type_exists( 'jetpack-testimonial' ) ) {
            return true;
        } else {
            return false;
        }
    }
}

/**
 *  Active Callback: Is not active JetPack Testimonials
 */
if( !function_exists( 'clubstiftung_is_not_active_jetpack_testimonials' ) ) {
    function clubstiftung_is_not_active_jetpack_testimonials() {
        if( !post_type_exists( 'jetpack-testimonial' ) ) {
            return true;
        } else {
            return false;
        }
    }
}

/**
 *  Active Callback: Is not active Contact Form 7
 */
if( !function_exists( 'clubstiftung_is_not_active_contact_form_7' ) ) {
    function clubstiftung_is_not_active_contact_form_7() {
        if( !class_exists( 'WPCF7' ) ) {
            return true;
        } else {
            return false;
        }
    }
}

/**
 *  Sanitize HTML
 */
if( !function_exists( 'clubstiftung_sanitize_html' ) ) {
    function clubstiftung_sanitize_html( $input ) {
        $input = force_balance_tags( $input );
        
        $allowed_html = array(
            'a' => array(
                'href' => array(),
                'title' => array()
            ),
            'br' => array(),
            'em' => array(),
            'img' => array(
                'alt' => array(),
                'src' => array(),
                'srcset' => array(),
                'title' => array()
            ),
            'strong' => array(),
        );
        $output = wp_kses( $input, $allowed_html );
        return $output;
    }
}

/**
 *  Sanitize Select
 */
if( !function_exists( 'clubstiftung_sanitize_select' ) ) {
    function clubstiftung_sanitize_select( $input ) {
        if( is_numeric( $input ) ) {
            return intval( $input );
        }
    }
}
