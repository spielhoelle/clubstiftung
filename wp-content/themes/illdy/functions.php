<?php
/**
 *	Sets up theme defaults and registers support for various WordPress features.
 *
 *	Note that this function is hooked into the after_setup_theme hook, which
 *	runs before the init hook. The init hook is too late for some features, such
 *	as indicating support for post thumbnails.
 */
if(!function_exists('illdy_setup')) {
	add_action( 'after_setup_theme', 'illdy_setup' );
	function illdy_setup() {
		// Extras
		require_once( 'inc/extras.php' );

		// Template Tags
		require_once( 'inc/template-tags.php' );

		// Customizer
		require_once( 'inc/customizer/customizer.php' );

		// JetPack
		require_once( 'inc/jetpack.php' );

		// TGM Plugin Activation
		require_once( 'inc/tgm-plugin-activation/tgm-plugin-activation.php' );

		// Components
		require_once( 'inc/components/pagination/class.mt-pagination.php' );
		require_once( 'inc/components/entry-meta/class.mt-entry-meta.php' );
		require_once( 'inc/components/author-box/class.mt-author-box.php' );
		require_once( 'inc/components/related-posts/class.mt-related-posts.php' );
		require_once( 'inc/components/nav-walker/class.mt-nav-walker.php' );

		// Widgets
		require_once( 'widgets/class-widget-recent-posts.php' );
		require_once( 'widgets/class-widget-skill.php' );
		require_once( 'widgets/class-widget-project.php' );
		require_once( 'widgets/class-widget-service.php' );
		require_once( 'widgets/class-widget-counter.php' );
		require_once( 'widgets/class-widget-person.php' );

		// Load Theme Textdomain
		load_theme_textdomain( 'illdy', get_template_directory() . '/languages' );

		// Add Theme Support
		add_theme_support( 'woocommerce' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'custom-background' );
		add_theme_support( 'custom-logo', array(
			   'flex-width' => true,
			   'flex-height' => true,
			) );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
		add_theme_support( 'custom-header', array(
				'default-image'		=> esc_url( get_template_directory_uri() . '/layout/images/blog/blog-header.png' ),
				'width'				=> 1920,
				'height'			=> 532,
				'flex-height'		=> true,
				'random-default'	=> false,
				'header-text'		=> false
		) );

		// Add Image Size
		add_image_size( 'illdy-blog-list', 653, 435, true );
		add_image_size( 'illdy-widget-recent-posts', 70, 70, true );
		add_image_size( 'illdy-blog-post-related-articles', 240, 206, true );
		add_image_size( 'illdy-front-page-latest-news', 360, 213, true );
		add_image_size( 'illdy-front-page-supports', 476, 476, true );
		add_image_size( 'illdy-front-page-projects', 476, 476, true );
		add_image_size( 'illdy-front-page-person', 125, 125, true );

		// Register Nav Menus
		register_nav_menus( array(
			'primary-menu'	=> __( 'Primary Menu', 'illdy' ),
		) );

		/**
	     *  Back compatible
	    */
	    require get_template_directory() . '/inc/back-compatible.php';

	    /*******************************************/
        /*************  Welcome screen *************/
        /*******************************************/

        if ( is_admin() ) {

            global $illdy_required_actions;

            /*
             * id - unique id; required
             * title
             * description
             * check - check for plugins (if installed)
             * plugin_slug - the plugin's slug (used for installing the plugin)
             *
             */
            $illdy_required_actions = array(
                array(
                    "id" => 'illdy-req-ac-frontpage-latest-news',
                    "title" => esc_html__( 'Get the one page template' ,'illdy' ),
                    "description"=> esc_html__( 'If you just installed Illdy, and are not able to see the one page template, you need to go to Settings -> Reading , Front page displays and select "Static Page".','illdy' ),
                    "check" => illdy_is_not_latest_posts()
                ),
                array(
                    "id" => 'illdy-req-ac-install-contact-forms',
                    "title" => esc_html__( 'Install Contact Form 7' ,'illdy' ),
                    "description"=> esc_html__( 'Illdy works perfectly with Contact Form 7. Please install it & make sure you create at least 1 contact form before trying to set it on the front-page.','illdy' ),
                    "check" => defined("WPCF7_PLUGIN"),
                    "plugin_slug" => 'contact-form-7'
                ),
            );

            require get_template_directory() . '/inc/admin/welcome-screen/welcome-screen.php';
        }


	}

	// Add Editor Style
	add_editor_style( 'illdy-google-fonts' );

}

if( !function_exists( 'illdy_is_not_latest_posts' ) ) {
    function illdy_is_not_latest_posts() {
        return ('page' == get_option( 'show_on_front' ) ? true : false);
    }
}


/**
 *	Set the content width in pixels, based on the theme's design and stylesheet.
 *
 *	Priority 0 to make it available to lower priority callbacks.
 *
 *	@global int $content_width
 */
if(!function_exists('illdy_content_width')) {
	add_action( 'after_setup_theme', 'illdy_content_width', 0 );
	function illdy_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'illdy_content_width', 640 );
	}
}

/**
 *	WP Enqueue Stylesheets
 */
if(!function_exists('illdy_enqueue_stylesheets')) {
	add_action( 'wp_enqueue_scripts', 'illdy_enqueue_stylesheets' );

	function illdy_enqueue_stylesheets() {

		// Google Fonts
		$google_fonts_args = array(
			'family'	=> 'Source+Sans+Pro:400,900,700,300,300italic'
		);

		// WP Register Style
		wp_register_style( 'illdy-google-fonts', add_query_arg( $google_fonts_args, 'https://fonts.googleapis.com/css' ), array(), null );

		// WP Enqueue Style
		if( get_theme_mod( 'illdy_preloader_enable', 1 ) == 1 ) {
			wp_enqueue_style( 'illdy-pace', get_template_directory_uri() . '/layout/css/pace.css', array(), '', 'all' );
		}

		wp_enqueue_style( 'illdy-google-fonts' );
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/layout/css/bootstrap.min.css', array(), '3.3.6', 'all' );
		wp_enqueue_style( 'bootstrap-theme', get_template_directory_uri() . '/layout/css/bootstrap-theme.min.css', array(), '3.3.6', 'all' );
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/layout/css/font-awesome.min.css', array(), '4.5.0', 'all' );
		wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/layout/css/owl-carousel.min.css', array(), '2.0.0', 'all' );
		wp_enqueue_style( 'illdy-style', get_template_directory_uri() . '/style.css', array(), '1.0.16', 'all' );
	}
}


/**
 *	WP Enqueue JavaScripts
 */
if(!function_exists('illdy_enqueue_javascripts')) {
	add_action( 'wp_enqueue_scripts', 'illdy_enqueue_javascripts' );

	function illdy_enqueue_javascripts() {
		if( get_theme_mod( 'illdy_preloader_enable', 1 ) == 1 ) {
			wp_enqueue_script( 'illdy-pace', get_template_directory_uri() . '/layout/js/pace/pace.min.js', array( 'jquery' ), '', false );
		}
		wp_enqueue_script( 'jquery-ui-progressbar', '', array( 'jquery' ), '', true );
		wp_enqueue_script( 'illdy-bootstrap', get_template_directory_uri() . '/layout/js/bootstrap/bootstrap.min.js', array( 'jquery' ), '3.3.6', true );
		wp_enqueue_script( 'illdy-owl-carousel', get_template_directory_uri() . '/layout/js/owl-carousel/owl-carousel.min.js', array( 'jquery' ), '2.0.0', true );
		wp_enqueue_script( 'illdy-count-to', get_template_directory_uri() . '/layout/js/count-to/count-to.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'illdy-visible', get_template_directory_uri() . '/layout/js/visible/visible.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'gmap', 'http://maps.google.com/maps/api/js?key=AIzaSyAVJF6ZZOBhPCsCKOj7XGVWS1BSbn3Tb10', array('jquery'), '1.9.5', true);

		// wp_enqueue_script( 'gmap', 'http://maps.google.com/maps/api/js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'illdy-scripts', get_template_directory_uri() . '/layout/js/scripts.min.js', array( 'jquery' ), '1.0.16', true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}


/**
 *	Widgets
 */
if(!function_exists('illdy_widgets')) {
	add_action( 'widgets_init', 'illdy_widgets' );

	function illdy_widgets() {

		// Blog Sidebar
		register_sidebar( array(
			'name'			=> __( 'Blog Sidebar', 'illdy' ),
			'id'			=> 'blog-sidebar',
			'description'	=> __( 'The widgets added in this sidebar will appear in blog page.', 'illdy' ),
			'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<div class="widget-title"><h3>',
			'after_title'	=> '</h3></div>',
		) );

		// Footer Sidebar 1
		register_sidebar( array(
			'name'			=> __( 'Footer Sidebar 1', 'illdy' ),
			'id'			=> 'footer-sidebar-1',
			'description'	=> __( 'The widgets added in this sidebar will appear in first block from footer.', 'illdy' ),
			'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<div class="widget-title"><h3>',
			'after_title'	=> '</h3></div>',
		) );

		// About Sidebar
		register_sidebar( array(
			'name'			=> __( 'Front page - About Sidebar', 'illdy' ),
			'id'			=> 'front-page-about-sidebar',
			'description'	=> __( 'The widgets added in this sidebar will appear in about section from front page.', 'illdy' ),
			'before_widget'	=> '<div id="%1$s" class="col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1 col-lg-4 col-lg-offset-0 %2$s">',
			'after_widget'	=> '</div>',
			'before_title'	=> '',
			'after_title'	=> '',
		) );

		// Projects Sidebar
		register_sidebar( array(
			'name'			=> __( 'Front page - Projects Sidebar', 'illdy' ),
			'id'			=> 'front-page-projects-sidebar',
			'description'	=> __( 'The widgets added in this sidebar will appear in projects section from front page.', 'illdy' ),
			'before_widget'	=> '<div id="%1$s" class="no-padding %2$s">',
			'after_widget'	=> '</div>',
			'before_title'	=> '',
			'after_title'	=> '',
		) );

		// Supports Sidebar
		register_sidebar( array(
			'name'			=> __( 'Front page - Supports Sidebar', 'illdy' ),
			'id'			=> 'front-page-supports-sidebar',
			'description'	=> __( 'The widgets added in this sidebar will appear in supports section from front page.', 'illdy' ),
			'before_widget'	=> '<div id="%1$s" class="no-padding %2$s">',
			'after_widget'	=> '</div>',
			'before_title'	=> '',
			'after_title'	=> '',
		) );

		// Services Sidebar
		register_sidebar( array(
			'name'			=> __( 'Front page - Services Sidebar', 'illdy' ),
			'id'			=> 'front-page-services-sidebar',
			'description'	=> __( 'The widgets added in this sidebar will appear in services section from front page. <a href="http://fontawesome.io/icons/">All icons</a>', 'illdy' ),
			'before_widget'	=> '<div id="%1$s" class="col-sm-4 %2$s">',
			'after_widget'	=> '</div>',
			'before_title'	=> '',
			'after_title'	=> '',
		) );

		// Counter Sidebar
		register_sidebar( array(
			'name'			=> __( 'Front page - Counter Sidebar', 'illdy' ),
			'id'			=> 'front-page-counter-sidebar',
			'description'	=> __( 'The widgets added in this sidebar will appear in counter section from front page.', 'illdy' ),
			'before_widget'	=> '<div id="%1$s" class="%2$s">',
			'after_widget'	=> '</div>',
			'before_title'	=> '',
			'after_title'	=> '',
		) );

		// Team Sidebar
		register_sidebar( array(
			'name'			=> __( 'Front page - Team Sidebar', 'illdy' ),
			'id'			=> 'front-page-team-sidebar',
			'description'	=> __( 'The widgets added in this sidebar will appear in team section from front page.', 'illdy' ),
			'before_widget'	=> '<div id="%1$s" class="%2$s">',
			'after_widget'	=> '</div>',
			'before_title'	=> '',
			'after_title'	=> '',
		) );

		// WooCommerce Sidebar
		if( class_exists( 'WooCommerce' ) ) {
			register_sidebar( array(
				'name'			=> __( 'WooCommerce Sidebar', 'illdy' ),
				'id'			=> 'woocommerce-sidebar',
				'description'	=> __( 'The widgets added in this sidebar will appear in WooCommerce pages.', 'illdy' ),
				'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
				'after_widget'	=> '</div>',
				'before_title'	=> '<div class="widget-title"><h3>',
				'after_title'	=> '</h3></div>',
			) );
		}
	}
}


/**
 *  Checkbox helper function
 */
if( !function_exists( 'illdy_value_checkbox_helper' ) ) {
	function illdy_value_checkbox_helper( $value ) {
	    if ($value == 1) {
	        return 1;
	    } else {
	        return 0;
	    }
	}
}

function mytheme_setup() {
	// Set default values for the upload media box
	update_option('image_default_align', 'center' );
	update_option('image_default_link_type', 'media' );
	update_option('image_default_size', 'large' );

}
add_action('after_setup_theme', 'mytheme_setup');

add_filter('widget_text','do_shortcode');


/**
*	 USER ROLES
*/

// Do this only once. Can go anywhere inside your functions.php file
$role_object = get_role( 'editor' );
$role_object->add_cap( 'edit_theme_options' );

// remove admin menu entrys for roles other than admin
function remove_menus(){
  $user = wp_get_current_user();
  if ( !in_array( 'administrator', (array) $user->roles ) ) {
      // remove_menu_page( 'index.php' );                  //Dashboard
      // remove_menu_page( 'upload.php' );                 //Media
      // remove_menu_page( 'edit.php?post_type=page' );    //Pages
      remove_menu_page( 'edit-comments.php' );          //Comments
      // remove_menu_page( 'themes.php' );                 //Appearance
      // remove_menu_page( 'plugins.php' );                //Plugins
      // remove_menu_page( 'users.php' );                  //Users
      remove_menu_page( 'tools.php' );                  //Tools
      remove_menu_page( 'options-general.php' );        //Settings
      remove_menu_page( 'wpcf7' );
      remove_menu_page( 'jetpack' );
    };
}

add_action( 'admin_menu', 'remove_menus' );
