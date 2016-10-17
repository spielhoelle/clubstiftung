<?php
/**
 * Welcome Screen Class
 */
class clubstiftung_Welcome {

	/**
	 * Constructor for the welcome screen
	 */
	public function __construct() {

		/* create dashbord page */
		add_action( 'admin_menu', array( $this, 'clubstiftung_welcome_register_menu' ) );

		/* activation notice */

		/* enqueue script and style for welcome screen */
		add_action( 'admin_enqueue_scripts', array( $this, 'clubstiftung_welcome_style_and_scripts' ) );

		/* enqueue script for customizer */
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'clubstiftung_welcome_scripts_for_customizer' ) );

		/* load welcome screen */
		add_action( 'clubstiftung_welcome', array( $this, 'clubstiftung_welcome_getting_started' ), 	    10 );
		add_action( 'clubstiftung_welcome', array( $this, 'clubstiftung_welcome_actions_required' ),        20 );
		add_action( 'clubstiftung_welcome', array( $this, 'clubstiftung_welcome_github' ), 		            40 );
		add_action( 'clubstiftung_welcome', array( $this, 'clubstiftung_welcome_changelog' ), 				50 );

		/* ajax callback for dismissable required actions */
		add_action( 'wp_ajax_clubstiftung_dismiss_required_action', array( $this, 'clubstiftung_dismiss_required_action_callback') );
		add_action( 'wp_ajax_nopriv_clubstiftung_dismiss_required_action', array($this, 'clubstiftung_dismiss_required_action_callback') );

	}

	/**
	 * Creates the dashboard page
	 * @see  add_theme_page()
	 * @since 1.8.2.4
	 */
	public function clubstiftung_welcome_register_menu() {
		add_theme_page( 'About clubstiftung', 'About clubstiftung', 'activate_plugins', 'clubstiftung-welcome', array( $this, 'clubstiftung_welcome_screen' ) );
	}


	/**
	 * Display an admin notice linking to the welcome screen
	 * @since 1.8.2.4
	 */
	public function clubstiftung_welcome_admin_notice() {
		?>
			<div class="updated notice is-dismissible">
				<p><?php echo sprintf( esc_html__( 'Welcome! Thank you for choosing clubstiftung! To fully take advantage of the best our theme can offer please make sure you visit our %swelcome page%s.', 'clubstiftung' ), '<a href="' . esc_url( admin_url( 'themes.php?page=clubstiftung-welcome' ) ) . '">', '</a>' ); ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=clubstiftung-welcome' ) ); ?>" class="button" style="text-decoration: none;"><?php _e( 'Get started with clubstiftung', 'clubstiftung' ); ?></a></p>
			</div>
		<?php
	}

	/**
	 * Load welcome screen css and javascript
	 * @since  1.8.2.4
	 */
	public function clubstiftung_welcome_style_and_scripts( $hook_suffix ) {

		if ( 'appearance_page_clubstiftung-welcome' == $hook_suffix ) {
			wp_enqueue_style( 'clubstiftung-welcome-screen-css', get_template_directory_uri() . '/inc/admin/welcome-screen/css/welcome.css' );
			wp_enqueue_script( 'clubstiftung-welcome-screen-js', get_template_directory_uri() . '/inc/admin/welcome-screen/js/welcome.js', array('jquery') );

			global $clubstiftung_required_actions;

			$nr_actions_required = 0;

			/* get number of required actions */
			if( get_option('clubstiftung_show_required_actions') ):
				$clubstiftung_show_required_actions = get_option('clubstiftung_show_required_actions');
			else:
				$clubstiftung_show_required_actions = array();
			endif;

			if( !empty($clubstiftung_required_actions) ):
				foreach( $clubstiftung_required_actions as $clubstiftung_required_action_value ):
					if(( !isset( $clubstiftung_required_action_value['check'] ) || ( isset( $clubstiftung_required_action_value['check'] ) && ( $clubstiftung_required_action_value['check'] == false ) ) ) && ((isset($clubstiftung_show_required_actions[$clubstiftung_required_action_value['id']]) && ($clubstiftung_show_required_actions[$clubstiftung_required_action_value['id']] == true)) || !isset($clubstiftung_show_required_actions[$clubstiftung_required_action_value['id']]) )) :
						$nr_actions_required++;
					endif;
				endforeach;
			endif;

			wp_localize_script( 'clubstiftung-welcome-screen-js', 'clubstiftungLiteWelcomeScreenObject', array(
				'nr_actions_required' => $nr_actions_required,
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'template_directory' => get_template_directory_uri(),
				'no_required_actions_text' => __( 'Hooray! There are no required actions for you right now.','clubstiftung' )
			) );
		}
	}

	/**
	 * Load scripts for customizer page
	 * @since  1.8.2.4
	 */
	public function clubstiftung_welcome_scripts_for_customizer() {

		wp_enqueue_style( 'clubstiftung-welcome-screen-customizer-css', get_template_directory_uri() . '/inc/admin/welcome-screen/css/welcome_customizer.css' );
		wp_enqueue_script( 'clubstiftung-welcome-screen-customizer-js', get_template_directory_uri() . '/inc/admin/welcome-screen/js/welcome_customizer.js', array('jquery'), '20120206', true );

		global $clubstiftung_required_actions;

		$nr_actions_required = 0;

		/* get number of required actions */
		if( get_option('clubstiftung_show_required_actions') ):
			$clubstiftung_show_required_actions = get_option('clubstiftung_show_required_actions');
		else:
			$clubstiftung_show_required_actions = array();
		endif;

		if( !empty($clubstiftung_required_actions) ):
			foreach( $clubstiftung_required_actions as $clubstiftung_required_action_value ):
				if(( !isset( $clubstiftung_required_action_value['check'] ) || ( isset( $clubstiftung_required_action_value['check'] ) && ( $clubstiftung_required_action_value['check'] == false ) ) ) && ((isset($clubstiftung_show_required_actions[$clubstiftung_required_action_value['id']]) && ($clubstiftung_show_required_actions[$clubstiftung_required_action_value['id']] == true)) || !isset($clubstiftung_show_required_actions[$clubstiftung_required_action_value['id']]) )) :
					$nr_actions_required++;
				endif;
			endforeach;
		endif;

		wp_localize_script( 'clubstiftung-welcome-screen-customizer-js', 'clubstiftungLiteWelcomeScreenCustomizerObject', array(
			'nr_actions_required' => $nr_actions_required,
			'aboutpage' => esc_url( admin_url( 'themes.php?page=clubstiftung-welcome#actions_required' ) ),
			'customizerpage' => esc_url( admin_url( 'customize.php#actions_required' ) ),
			'themeinfo' => __('View Theme Info','clubstiftung'),
		) );
	}

	/**
	 * Dismiss required actions
	 * @since 1.8.2.4
	 */
	public function clubstiftung_dismiss_required_action_callback() {

		global $clubstiftung_required_actions;

		$clubstiftung_dismiss_id = (isset($_GET['dismiss_id'])) ? $_GET['dismiss_id'] : 0;

		echo $clubstiftung_dismiss_id; /* this is needed and it's the id of the dismissable required action */

		if( !empty($clubstiftung_dismiss_id) ):

			/* if the option exists, update the record for the specified id */
			if( get_option('clubstiftung_show_required_actions') ):

				$clubstiftung_show_required_actions = get_option('clubstiftung_show_required_actions');

				$clubstiftung_show_required_actions[$clubstiftung_dismiss_id] = false;

				update_option( 'clubstiftung_show_required_actions',$clubstiftung_show_required_actions );

			/* create the new option,with false for the specified id */
			else:

				$clubstiftung_show_required_actions_new = array();

				if( !empty($clubstiftung_required_actions) ):

					foreach( $clubstiftung_required_actions as $clubstiftung_required_action ):

						if( $clubstiftung_required_action['id'] == $clubstiftung_dismiss_id ):
							$clubstiftung_show_required_actions_new[$clubstiftung_required_action['id']] = false;
						else:
							$clubstiftung_show_required_actions_new[$clubstiftung_required_action['id']] = true;
						endif;

					endforeach;

				update_option( 'clubstiftung_show_required_actions', $clubstiftung_show_required_actions_new );

				endif;

			endif;

		endif;

		die(); // this is required to return a proper result
	}


	/**
	 * Welcome screen content
	 * @since 1.8.2.4
	 */
	public function clubstiftung_welcome_screen() {

		require_once( ABSPATH . 'wp-load.php' );
		require_once( ABSPATH . 'wp-admin/admin.php' );
		require_once( ABSPATH . 'wp-admin/admin-header.php' );
		?>

		<ul class="clubstiftung-nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#getting_started" aria-controls="getting_started" role="tab" data-toggle="tab"><?php esc_html_e( 'Getting started','clubstiftung'); ?></a></li>
			<li role="presentation" class="clubstiftung-w-red-tab"><a href="#actions_required" aria-controls="actions_required" role="tab" data-toggle="tab"><?php esc_html_e( 'Actions required','clubstiftung'); ?></a></li>
			<li role="presentation"><a href="#github" aria-controls="github" role="tab" data-toggle="tab"><?php esc_html_e( 'Contribute','clubstiftung'); ?></a></li>
			<li role="presentation"><a href="#changelog" aria-controls="changelog" role="tab" data-toggle="tab"><?php esc_html_e( 'Changelog','clubstiftung'); ?></a></li>
		</ul>

		<div class="clubstiftung-tab-content">

			<?php
			/**
			 * @hooked clubstiftung_welcome_getting_started - 10
			 * @hooked clubstiftung_welcome_actions_required - 20
			 * @hooked clubstiftung_welcome_child_themes - 30
			 * @hooked clubstiftung_welcome_github - 40
			 * @hooked clubstiftung_welcome_changelog - 50
			 */
			do_action( 'clubstiftung_welcome' ); ?>

		</div>
		<?php
	}

	/**
	 * Getting started
	 * @since 1.8.2.4
	 */
	public function clubstiftung_welcome_getting_started() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/getting-started.php' );
	}

	/**
	 * Actions required
	 * @since 1.8.2.4
	 */
	public function clubstiftung_welcome_actions_required() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/actions-required.php' );
	}

	/**
	 * Contribute
	 * @since 1.8.2.4
	 */
	public function clubstiftung_welcome_github() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/github.php' );
	}

	/**
	 * Changelog
	 * @since 1.8.2.4
	 */
	public function clubstiftung_welcome_changelog() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/changelog.php' );
	}
}

new clubstiftung_Welcome();
