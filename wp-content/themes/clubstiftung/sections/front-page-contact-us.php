<?php
/**
 *	The template for displaying the contact us section in front page.
 *
 *	@package WordPress
 *	@subpackage clubstiftung
 */
?>
<?php
if ( current_user_can( 'edit_theme_options' ) ) {

	$contact_bar_facebook_url = get_theme_mod( 'clubstiftung_contact_bar_facebook_url', esc_url( '#' ) );
	$contact_bar_twitter_url = get_theme_mod( 'clubstiftung_contact_bar_twitter_url', esc_url( '#' ) );
	$contact_bar_linkedin_url = get_theme_mod( 'clubstiftung_contact_bar_linkedin_url', esc_url( '#' ) );
	$email = get_theme_mod( 'clubstiftung_email', __( 'contact@site.com', 'clubstiftung' ) );
	$phone = get_theme_mod( 'clubstiftung_phone', __( '(555) 555-5555', 'clubstiftung' ) );
	$address1 = get_theme_mod( 'clubstiftung_address1', __( 'Street 221B Baker Street, ', 'clubstiftung' ) );
	$address2 = get_theme_mod( 'clubstiftung_address2', __( 'London, UK', 'clubstiftung' ) );
	$general_title = get_theme_mod( 'clubstiftung_contact_us_general_title', __( 'Contact us', 'clubstiftung' ) );
	$general_entry = get_theme_mod( 'clubstiftung_contact_us_general_entry', __( 'And we will get in touch as son as possible.', 'clubstiftung' ) );
	$general_contact_form_7 = get_theme_mod( 'clubstiftung_contact_us_general_contact_form_7' );
	$general_address_title = get_theme_mod( 'clubstiftung_contact_us_general_address_title', __( 'Address', 'clubstiftung' ) );
	$customer_support_title = get_theme_mod( 'clubstiftung_contact_us_general_customer_support_title', __( 'Customer Support', 'clubstiftung' ) );
}else{
	$contact_bar_facebook_url = get_theme_mod( 'clubstiftung_contact_bar_facebook_url' );
	$contact_bar_twitter_url = get_theme_mod( 'clubstiftung_contact_bar_twitter_url' );
	$contact_bar_linkedin_url = get_theme_mod( 'clubstiftung_contact_bar_linkedin_url' );
	$email = get_theme_mod( 'clubstiftung_email' );
	$phone = get_theme_mod( 'clubstiftung_phone' );
	$address1 = get_theme_mod( 'clubstiftung_address1' );
	$address2 = get_theme_mod( 'clubstiftung_address2' );
	$general_title = get_theme_mod( 'clubstiftung_contact_us_general_title' );
	$general_entry = get_theme_mod( 'clubstiftung_contact_us_general_entry' );
	$general_contact_form_7 = get_theme_mod( 'clubstiftung_contact_us_general_contact_form_7' );
	$general_address_title = get_theme_mod( 'clubstiftung_contact_us_general_address_title' );
	$customer_support_title = get_theme_mod( 'clubstiftung_contact_us_general_customer_support_title' );
}

if ( $general_title != '' || $general_entry != '' || $general_address_title != '' || $address1 != '' || $address2 != '' || $customer_support_title != '' || $email != '' || $phone != ''
|| $contact_bar_twitter_url != '' || $contact_bar_facebook_url != '' || $contact_bar_linkedin_url != '' || $general_contact_form_7 != null && $general_contact_form_7 != 'default' ) {

?>
<section id="contact-us" class="front-page-section">
	<div id="map_canvas" data="<?php echo clubstiftung_sanitize_html( $address1 ) . clubstiftung_sanitize_html($address2); ?>" style="width:100%; height:100%"></div>
	<?php if( $general_title || $general_entry ): ?>
		<div class="section-header">
			<div class="container">
				<div class="row mappable">
					<?php if( $general_title ): ?>
						<div class="col-sm-12">
							<h3><?php echo clubstiftung_sanitize_html( $general_title ); ?></h3>
						</div><!--/.col-sm-12-->
					<?php endif; ?>
					<?php if( $general_entry ): ?>
						<div class="col-sm-10 col-sm-offset-1">
						<p><?php echo clubstiftung_sanitize_html( $general_entry ); ?></p>
					</div><!--/.col-sm-10.col-sm-offset-1-->
					<?php endif; ?>
				</div><!--/.row-->
			</div><!--/.container-->
			<button id="show_map" type="submit" class="mapbutton"><i class="fa fa-map-o" aria-hidden="true"></i></button>
		</div><!--/.section-header-->
	<?php endif; ?>
	<div class="section-content">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="row mappable" style="margin-bottom: 45px;">
						<div class="col-sm-4">
							<div class="contact-us-box">
								<?php if( $general_address_title ): ?>
									<div class="box-left" data-customizer="box-left-address-title">
										<?php echo clubstiftung_sanitize_html( $general_address_title ); ?>
									</div><!--/.box-left-->
								<?php endif; ?>
								<div class="box-right">
									<?php if( $address1 ): ?>
										<span class="box-right-row" data-customizer="contact-us-address-1"><?php echo clubstiftung_sanitize_html( $address1 ); ?></span>
									<?php endif; ?>
									<?php if( $address2 ): ?>
										<span class="box-right-row" data-customizer="contact-us-address-2"><?php echo clubstiftung_sanitize_html( $address2 ); ?></span>
									<?php endif; ?>
								</div><!--/.box-right-->
							</div><!--/.contact-us-box-->
						</div><!--/.col-sm-4-->
						<div class="col-sm-5">
							<div class="contact-us-box">
								<?php if( $customer_support_title ): ?>
									<div class="box-left" data-customizer="box-left-customer-support-title">
										<?php echo clubstiftung_sanitize_html( $customer_support_title ); ?>
									</div><!--/.box-left-->
								<?php endif; ?>
								<div class="box-right">
									<?php if( $email ): ?>
										<span class="box-right-row"><?php _e( 'E-mail:', 'clubstiftung' ); ?> <a href="mailto:<?php echo esc_attr( $email ); ?>" title="<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></span>
									<?php endif; ?>
									<?php if( $phone ): ?>
										<span class="box-right-row" data-customizer="contact-us-phone"><?php _e( 'Phone:', 'clubstiftung' ); ?> <?php echo clubstiftung_sanitize_html( $phone ); ?></span>
									<?php endif; ?>
								</div><!--/.box-right-->
							</div><!--/.contact-us-box-->
						</div><!--/.col-sm-5-->
						<div class="col-sm-3">
							<?php if( $contact_bar_twitter_url || $contact_bar_facebook_url || $contact_bar_linkedin_url ): ?>
								<div class="contact-us-social">
									<?php if( $contact_bar_twitter_url && $contact_bar_twitter_url !== '#' ): ?>
										<a href="<?php echo esc_url( $contact_bar_twitter_url ); ?>" title="<?php _e( 'Twitter', 'clubstiftung' ); ?>" target="_blank"><i class="fa fa-2x fa-twitter"></i></a>
									<?php endif; ?>
									<?php if( $contact_bar_facebook_url && $contact_bar_facebook_url !== '#' ): ?>
										<a href="<?php echo esc_url( $contact_bar_facebook_url ); ?>" title="<?php _e( 'Facebook', 'clubstiftung' ); ?>" target="_blank"><i class="fa fa-2x fa-facebook"></i></a>
									<?php endif; ?>
									<?php if( $contact_bar_linkedin_url && $contact_bar_linkedin_url !== '#' ): ?>
										<a href="<?php echo esc_url( $contact_bar_linkedin_url ); ?>" title="<?php _e( 'LinkedIn', 'clubstiftung' ); ?>" target="_blank"><i class="fa fa-2x fa-linkedin"></i></a>
									<?php endif; ?>
								</div><!--/.contact-us-social-->
							<?php endif; ?>
						</div><!--/.col-sm-3-->
					</div><!--/.row-->
				</div><!--/.col-sm-12-->
			</div><!--/.row-->
			<div class="row">
				<div class="col-sm-12">
					<?php if( class_exists('WPCF7') && $general_contact_form_7 != null && $general_contact_form_7 != 'default' ): ?>
						<?php $shortcode = '[contact-form-7 id="'. esc_html( $general_contact_form_7 ) .'"]'; ?>
						<?php echo do_shortcode( $shortcode ); ?>
					<?php endif; ?>
				</div><!--/.col-sm-12-->
			</div><!--/.row-->
		</div><!--/.container-->
	</div><!--/.section-content-->
</section><!--/#contact-us.front-page-section-->

<?php } ?>
