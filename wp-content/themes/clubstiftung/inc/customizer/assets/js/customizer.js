/**
 *	jQuery Document Ready
 */
jQuery( document ).ready( function($) {
	// Front page - About Sidebar
	wp.customize.section( 'sidebar-widgets-front-page-about-sidebar' ).panel( 'clubstiftung_panel_about' );
	wp.customize.section( 'sidebar-widgets-front-page-about-sidebar' ).priority( '2' );

	// Front page - Projects Sidebar
	wp.customize.section( 'sidebar-widgets-front-page-projects-sidebar' ).panel( 'clubstiftung_panel_projects' );
	wp.customize.section( 'sidebar-widgets-front-page-projects-sidebar' ).priority( '2' );

	// Front page - Supports Sidebar
	wp.customize.section( 'sidebar-widgets-front-page-services-sidebar' ).panel( 'clubstiftung_panel_services' );
	wp.customize.section( 'sidebar-widgets-front-page-services-sidebar' ).priority( '2' );

	// Front page - Supports Sidebar
	wp.customize.section( 'sidebar-widgets-front-page-supports-sidebar' ).panel( 'clubstiftung_panel_supports' );
	wp.customize.section( 'sidebar-widgets-front-page-supports-sidebar' ).priority( '2' );

	// Front page - Counter Sidebar
	wp.customize.section( 'sidebar-widgets-front-page-counter-sidebar' ).panel( 'clubstiftung_panel_counter' );
	wp.customize.section( 'sidebar-widgets-front-page-counter-sidebar' ).priority( '3' );

	// Front page - Team Sidebar
	wp.customize.section( 'sidebar-widgets-front-page-team-sidebar' ).panel( 'clubstiftung_panel_team' );
	wp.customize.section( 'sidebar-widgets-front-page-team-sidebar' ).priority( '2' );
});
