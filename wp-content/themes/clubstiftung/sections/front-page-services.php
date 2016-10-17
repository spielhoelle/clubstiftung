<?php
/**
 *	The template for displaying services section in front page.
 *
 *	@package WordPress
 *	@subpackage clubstiftung
 */
?>
<?php
if ( current_user_can( 'edit_theme_options' ) ) {
	$services_general_title = get_theme_mod( 'clubstiftung_services_general_title', __( 'Services', 'clubstiftung' ) );
	$services_general_entry = get_theme_mod( 'clubstiftung_services_general_entry', __( 'In order to help you grow your business, our carefully selected experts can advise you in in the following areas:', 'clubstiftung' ) );
	$services_background_type = get_theme_mod( 'clubstiftung_services_background_type', 'image' );
	$services_background_image = get_theme_mod( 'clubstiftung_services_background_image', esc_url( get_template_directory_uri() . '/layout/images/front-page/front-page-counter.jpg' ) );
	$services_background_color = get_theme_mod( 'clubstiftung_services_background_color', '#000000' );

}else{
	$services_general_title = get_theme_mod( 'clubstiftung_services_general_title' );
	$services_general_entry = get_theme_mod( 'clubstiftung_services_general_entry' );

	$services_background_type = get_theme_mod( 'clubstiftung_services_background_type' );
	$services_background_image = get_theme_mod( 'clubstiftung_services_background_image' );
	$services_background_color = get_theme_mod( 'clubstiftung_services_background_color' );	
}

?>
<?php
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
				elseif( current_user_can( 'edit_theme_options' ) ):
					$the_widget_args = array(
						'before_widget'	=> '<div class="col-sm-4 widget_clubstiftung_service">',
						'after_widget'	=> '</div>',
						'before_title'	=> '',
						'after_title'	=> ''
					);

					the_widget( 'clubstiftung_Widget_Service', 'title='. __( 'Web Design', 'clubstiftung' ) .'&icon=fa-pencil&entry='. __( 'Consectetur adipiscing elit. Praesent molestie urna hendrerit erat tincidunt tempus. Aliquam a leo risus. Fusce a metus non augue dapibus porttitor at in mauris. Pellentesque commodo...', 'clubstiftung' ) .'&color=#f18b6d', $the_widget_args );
					the_widget( 'clubstiftung_Widget_Service', 'title='. __( 'Web Development', 'clubstiftung' ) .'&icon=fa-code&entry='. __( 'Consectetur adipiscing elit. Praesent molestie urna hendrerit erat tincidunt tempus. Aliquam a leo risus. Fusce a metus non augue dapibus porttitor at in mauris. Pellentesque commodo...', 'clubstiftung' ) .'&color=#f1d204', $the_widget_args );
					the_widget( 'clubstiftung_Widget_Service', 'title='. __( 'SEO Analisys', 'clubstiftung' ) .'&icon=fa-search&entry='. __( 'Consectetur adipiscing elit. Praesent molestie urna hendrerit erat tincidunt tempus. Aliquam a leo risus. Fusce a metus non augue dapibus porttitor at in mauris. Pellentesque commodo...', 'clubstiftung' ) .'&color=#6a4d8a', $the_widget_args );
				endif;
				?>
			</div><!--/.row-->
		</div><!--/.container-->
	</div><!--/.section-content-->
</section><!--/#services.front-page-section-->

<?php } ?>
