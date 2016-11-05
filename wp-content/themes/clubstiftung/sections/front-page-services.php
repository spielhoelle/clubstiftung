<?php
/**
 *	The template for displaying services section in front page.
 *
 *	@package WordPress
 *	@subpackage clubstiftung
 */
?>
<?php
	$services_general_title = get_theme_mod( 'clubstiftung_services_general_title', __( 'Services', 'clubstiftung' ) );
	$services_general_entry = get_theme_mod( 'clubstiftung_services_general_entry', __( 'In order to help you grow your business, our carefully selected experts can advise you in in the following areas:', 'clubstiftung' ) );
	$services_background_type = get_theme_mod( 'clubstiftung_services_background_type', 'image' );
	$services_background_image = get_theme_mod( 'clubstiftung_services_background_image', esc_url( get_template_directory_uri() . '/layout/images/front-page/front-page-counter.jpg' ) );
	$services_background_color = get_theme_mod( 'clubstiftung_services_background_color', '#000000' );

	if( $services_background_type == 'image' ):
		$services_style = 'background-image: url('. esc_url( $services_background_image ) .');';
	elseif( $services_background_type == 'color' ):
		$services_style = 'background-color:' . $services_background_color;
	else :
		$services_style = '';
	endif;
?>


<?php if ( $services_general_title != '' || $services_general_entry != '' || is_active_sidebar( 'front-page-services-sidebar' ) ) { ?>

<section id="services" class="front-page-section background" style="<?php echo $services_style; ?>">
	<?php if( $services_general_title || $services_general_entry ): ?>
		<div class="section-header">
			<div class="container">
				<div class="row">
					<?php if( $services_general_title ): ?>
						<div class="col-sm-12">
							<h3><?php echo clubstiftung_sanitize_html( $services_general_title ); ?></h3>
						</div><!--/.col-sm-12-->
					<?php endif; ?>
					<?php if( $services_general_entry ): ?>
						<div class="col-sm-10 col-sm-offset-1">
							<p><?php echo clubstiftung_sanitize_html( $services_general_entry ); ?></p>
						</div><!--/.col-sm-10.col-sm-offset-1-->
					<?php endif; ?>
				</div><!--/.row-->
			</div><!--/.container-->
		</div><!--/.section-header-->
	<?php endif; ?>
	<div class="section-content">
		<div class="container">
			<div class="row faders">
				<?php
				if( is_active_sidebar( 'front-page-services-sidebar' ) ):
					dynamic_sidebar( 'front-page-services-sidebar' );
				endif;
				?>
			</div><!--/.row-->
		</div><!--/.container-->
	</div><!--/.section-content-->
</section><!--/#services.front-page-section-->

<?php } ?>
