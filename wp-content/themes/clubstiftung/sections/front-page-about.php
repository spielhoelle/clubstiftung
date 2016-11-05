<?php
/**
 *	The template for displaying about section in front page.
 *
 *	@package WordPress
 *	@subpackage clubstiftung
 */
?>
<?php
if ( current_user_can( 'edit_theme_options' ) ) {
	$general_title = get_theme_mod( 'clubstiftung_about_general_title', __( 'About', 'clubstiftung' ) );
	$general_entry = get_theme_mod( 'clubstiftung_about_general_entry', __( 'It is an amazng one-page theme with great features that offers an incredible experience. It is easy to install, make changes, adapt for your business. A modern design with clean lines and styling for a wide variety of content, exactly how a business design should be. You can add as many images as you want to the main header area and turn them into slider.', 'clubstiftung' ) );
}else{
	$general_title = get_theme_mod( 'clubstiftung_about_general_title' );
	$general_entry = get_theme_mod( 'clubstiftung_about_general_entry' );
}
?>

<?php if ( $general_title != '' || $general_entry != '' || is_active_sidebar( 'front-page-about-sidebar' ) ) { ?>

<section id="about" class="front-page-section" style="<?php if( !$general_title && !$general_entry ): echo 'padding-top: 130px;'; endif; ?>">
	<?php if( $general_title || $general_entry ): ?>
		<div class="section-header">
				<div class="container">
					<div class="row">
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
			</div>
			<div class="section-header">
				<div class="container">
					<div class="row padding--bottom">
						<?php
						if( is_active_sidebar( 'front-page-about-sidebar' ) ):
							dynamic_sidebar( 'front-page-about-sidebar' );
						endif;

						?>
					</div><!--/.row-->
					<div class="row">
						<?php
						echo "<h3>Newsletter</h3>";
						echo do_shortcode('[newsletter-form]');
						?>
					</div>
				</div><!--/.container-->
		</div><!--/.section-header-->
	<?php endif; ?>
</section><!--/#about.front-page-section-->

<?php } ?>
