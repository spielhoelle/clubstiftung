<?php
/**
 * Getting started template
 */

$customizer_url = admin_url() . 'customize.php' ;
?>

<div id="getting_started" class="clubstiftung-tab-pane active">

	<div class="clubstiftung-tab-pane-center">

		<h1 class="clubstiftung-welcome-title"><?php _e('Welcome to clubstiftung!', 'clubstiftung'); ?> <?php if( !empty($clubstiftung_lite['Version']) ): ?> <sup id="clubstiftung-theme-version"><?php echo esc_attr( $clubstiftung_lite['Version'] ); ?> </sup><?php endif; ?></h1>

		<p><?php esc_html_e( 'Our most popular free one page WordPress theme, clubstiftung!','clubstiftung'); ?></p>
		<p><?php esc_html_e( 'We want to make sure you have the best experience using clubstiftung and that is why we gathered here all the necessary information for you. We hope you will enjoy using clubstiftung, as much as we enjoy creating great products.', 'clubstiftung' ); ?>

	</div>

	<hr />

	<div class="clubstiftung-tab-pane-center">

		<h1><?php esc_html_e( 'Getting started', 'clubstiftung' ); ?></h1>

		<h4><?php esc_html_e( 'Customize everything in a single place.' ,'clubstiftung' ); ?></h4>
		<p><?php esc_html_e( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'clubstiftung' ); ?></p>
		<p><a href="<?php echo esc_url( $customizer_url ); ?>" class="button button-primary"><?php esc_html_e( 'Go to Customizer', 'clubstiftung' ); ?></a></p>

	</div>

	<hr />

</div>
