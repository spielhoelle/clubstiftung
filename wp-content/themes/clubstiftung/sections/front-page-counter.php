<?php
/**
 *	The template for displaying the counter section in front page.
 *
 *	@package WordPress
 *	@subpackage clubstiftung
 */
?>

<?php
	$counter_background_type = get_theme_mod( 'clubstiftung_counter_background_type', 'image' );
	$counter_background_image = get_theme_mod( 'clubstiftung_counter_background_image', esc_url( get_template_directory_uri() . '/layout/images/front-page/front-page-counter.jpg' ) );
	$counter_background_color = get_theme_mod( 'clubstiftung_counter_background_color', '#000000' );
	$counter_general_entry = get_theme_mod( 'clubstiftung_counter_general_entry', '' );
  $counter_general_title = get_theme_mod( 'clubstiftung_counter_general_title', '' );

?>

<?php
if( $counter_background_type == 'image' ):
	$counter_style = 'background-image: url('. esc_url( $counter_background_image ) .');';
elseif( $counter_background_type == 'color' ):
	$counter_style = 'background-color:' . $counter_background_color;
else :
	$counter_style = '';
endif;
?>

<?php if ( is_active_sidebar( 'front-page-counter-sidebar' ) ) { ?>

<section id="counter" class="background front-page-section" style="<?php echo $counter_style; ?>">
	<div class="counter-overlay"></div>
	<div class="container">

		<div class="section-header padding--bottom">
    <h3><?php echo $counter_general_title ?></h3>
			<p><?php echo $counter_general_entry; ?></p>
		</div>
		<div class="row">
			<?php
			if( is_active_sidebar( 'front-page-counter-sidebar' ) ):
				dynamic_sidebar( 'front-page-counter-sidebar' );
			endif;
			?>
		</div><!--/.row-->
	</div><!--/.container-->
</section><!--/#counter.front-page-section-->

<?php } ?>
