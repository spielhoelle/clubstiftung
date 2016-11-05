<?php
/**
 *	The template for displaying the supports section in front page.
 *
 *	@package WordPress
 *	@subpackage clubstiftung
 */
?>
<?php
	$general_title = get_theme_mod( 'clubstiftung_supports_general_title', esc_html__( 'Supports', 'clubstiftung' ) );
	$general_entry = get_theme_mod( 'clubstiftung_supports_general_entry', esc_html__( 'You\'ll love our work. Check it out!', 'clubstiftung' ) );

?>

<?php if ( $general_title != '' || $general_entry != '' || is_active_sidebar( 'front-page-supports-sidebar' ) ) { ?>

<section id="supports" class="front-page-section" style="<?php if( !$general_title && !$general_entry ): echo 'padding-top: 0;'; endif; ?>">
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
		</div><!--/.section-header-->
	<?php endif; ?>
	<div class="section-content">
		<div class="container">
			<div class="carousel">
				<?php
				if( is_active_sidebar( 'front-page-supports-sidebar' ) ):
					dynamic_sidebar( 'front-page-supports-sidebar' );
				endif;
				?>
			</div><!--/.row-->
		</div><!--/.container-fluid-->
	</div><!--/.section-content-->
</section><!--/#supports.front-page-section-->

<?php } ?>
