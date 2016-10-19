<?php
/**
 *	The template for dispalying the footer.
 *
 *	@package WordPress
 *	@subpackage clubstiftung
 */
?>
<?php

if ( current_user_can( 'edit_theme_options' ) ) {
	$display_copyright = get_theme_mod( 'clubstiftung_general_footer_display_copyright', 1 );
	$footer_copyright = get_theme_mod( 'clubstiftung_footer_copyright', __( '&copy; Copyright 2016. All Rights Reserved.', 'clubstiftung' ) );
	$img_footer_logo = get_theme_mod( 'clubstiftung_img_footer_logo' );
} else {
	$display_copyright = get_theme_mod( 'clubstiftung_general_footer_display_copyright' );
	$footer_copyright = get_theme_mod( 'clubstiftung_footer_copyright' );
	$img_footer_logo = get_theme_mod( 'clubstiftung_img_footer_logo' );
}
?>
		<footer id="footer">
			<div class="container">
				<div class="row">
					<?php
					$the_widget_args = array(
						'before_widget'	=> '<div class="widget">',
						'after_widget'	=> '</div>',
						'before_title'	=> '<div class="widget-title"><h3>',
						'after_title'	=> '</h3></div>'
					);
					?>
					<?php
					if( is_active_sidebar( 'footer-sidebar-1' ) ):
						dynamic_sidebar( 'footer-sidebar-1' );
					endif;
					?>
					<?php	if( $img_footer_logo ): ?>
						<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="footer-logo">
							<img src="<?php echo esc_url( $img_footer_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
						</a>
					<?php endif; ?>

				</div><!--/.row-->
			</div><!--/.container-->

			<div class="tommy">
        <i class="fa fa-creative-commons" aria-hidden="true"></i> 2016 with <i class="fa fa-heart"></i> by
        <a target="_blank" href="http://www.thomaskuhnert.com">Thomas Kuhnert</a>
			</div><!--/.container-->
		</footer><!--/#footer-->
		<?php wp_footer(); ?>
	</body>
</html>
