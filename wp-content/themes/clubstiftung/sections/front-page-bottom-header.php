<?php
/**
 *	The template for displaying the bottom header section in front page.
 *
 *	@package WordPress
 *	@subpackage clubstiftung
 */
?>
<?php
	$first_row_from_title = get_theme_mod( 'clubstiftung_jumbotron_general_first_row_from_title', __( 'Clean', 'clubstiftung' ) );
	$second_row_from_title = get_theme_mod( 'clubstiftung_jumbotron_general_second_row_from_title', __( 'Slick', 'clubstiftung' ) );
	$third_row_from_title = get_theme_mod( 'clubstiftung_jumbotron_general_third_row_from_title', __( 'Pixel Perfect', 'clubstiftung' ) );
	$entry = get_theme_mod( 'clubstiftung_jumbotron_general_entry', __( 'clubstiftung is a great one-page theme, perfect for developers and designers but also for someone who just wants a new website for his business. Try it now!', 'clubstiftung' ) );
	$first_button_title = get_theme_mod( 'clubstiftung_jumbotron_general_first_button_title', __( 'Learn more', 'clubstiftung' ) );
	$first_button_url = get_theme_mod( 'clubstiftung_jumbotron_general_first_button_url', esc_url( '#' ) );
	$second_button_title = get_theme_mod( 'clubstiftung_jumbotron_general_second_button_title', __( 'Download', 'clubstiftung' ) );
	$second_button_url = get_theme_mod( 'clubstiftung_jumbotron_general_second_button_url', esc_url( '#' ) );

if ( $first_row_from_title || $second_row_from_title || $third_row_from_title || $entry || $first_button_title || $second_button_title ) {

?>
<div class="bottom-header front-page">
	<div class="container">
		<div class="row">
			<?php if( $first_row_from_title || $second_row_from_title || $third_row_from_title ): ?>
				<div class="col-sm-12 show-after-pace">
					<h2 class="show-after-pace"><?php if( $first_row_from_title ): echo '<span data-customizer="first-row-from-title">'. clubstiftung_sanitize_html( $first_row_from_title ) .'</span><span class="span-dot first-span-dot">'. __( '.', 'clubstiftung' ) .'</span>'; endif; ?> <?php if( $second_row_from_title ): echo '<span data-customizer="second-row-from-title">'. clubstiftung_sanitize_html( $second_row_from_title ) .'</span><span class="span-dot second-span-dot">'. __( '.', 'clubstiftung' ) .'</span>'; endif; ?> <?php if( $third_row_from_title ): echo '<span data-customizer="third-row-from-title">'. clubstiftung_sanitize_html( $third_row_from_title ) .'</span>'; endif; ?></h2>
				</div><!--/.col-sm-12-->
			<?php endif; ?>
			<div class="col-sm-8 col-sm-offset-2 show-after-pace">
				<?php if( $entry ): ?>
					<p class="padding--bottom"><?php echo clubstiftung_sanitize_html( $entry ); ?></p>
				<?php endif; ?>
				<?php if( $first_button_title && $first_button_url ): ?>
					<a href="<?php echo esc_url( $first_button_url ); ?>" title="<?php echo esc_attr( $first_button_title ); ?>" class="header-button-one"><?php echo esc_html( $first_button_title ); ?></a>
				<?php endif; ?>
				<?php if( $second_button_title && $second_button_url ): ?>
					<a href="<?php echo esc_url( $second_button_url ); ?>" title="<?php echo esc_attr( $second_button_title ); ?>" class="header-button-two"><?php echo esc_html( $second_button_title ); ?></a>
				<?php endif; ?>
			</div><!--/.col-sm-8.col-sm-offset-2-->
		</div><!--/.row-->
	</div><!--/.container-->
	<div class="show-after-pace">
		<i class="fa fa-angle-double-down" aria-hidden="true"></i>
	</div>
</div><!--/.bottom-header.front-page-->

<?php } ?>
