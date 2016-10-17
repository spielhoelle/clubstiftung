<?php
/**
 *	The template for dispalying the team section in front page.
 *
 *	@package WordPress
 *	@subpackage clubstiftung
 */
?>
<?php
if ( current_user_can( 'edit_theme_options' ) ) {
	$general_title = get_theme_mod( 'clubstiftung_team_general_title', __( 'Team', 'clubstiftung' ) );
	$general_entry = get_theme_mod( 'clubstiftung_team_general_entry', __( 'Meet the people that are going to take your business to the next level.', 'clubstiftung' ) );
}else{
	$general_title = get_theme_mod( 'clubstiftung_team_general_title' );
	$general_entry = get_theme_mod( 'clubstiftung_team_general_entry' );
}

?>

<?php if ( $general_title != '' || $general_entry != '' || is_active_sidebar( 'front-page-team-sidebar' ) ) { ?>

<section id="team" class="front-page-section">
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
			<div class="row team faders">
				<?php
				if( is_active_sidebar( 'front-page-team-sidebar' ) ):
					dynamic_sidebar( 'front-page-team-sidebar' );
				elseif ( current_user_can( 'edit_theme_options' ) ):
					$the_widget_args = array(
						'before_widget'	=> '<div class="widget_clubstiftung_person">',
						'after_widget'	=> '</div>',
						'before_title'	=> '',
						'after_title'	=> ''
					);

					the_widget( 'clubstiftung_Widget_Person', 'title='. __( 'Mark Lawrance', 'clubstiftung' ) .'&image='. esc_url( '/layout/images/front-page/front-page-team-1.jpg' ) .'&position='. __( 'Web Designer', 'clubstiftung' ) .'&entry='. __( 'Creative, detail-oriented, always focused.', 'clubstiftung' ) .'&facebook_url='. esc_url( '#' ) .'&twitter_url='. esc_url( '#' ) .'&linkedin_url='. esc_url( '#' ) .'&color=#f18b6d', $the_widget_args );
					the_widget( 'clubstiftung_Widget_Person', 'title='. __( 'Jane  Stenton', 'clubstiftung' ) .'&image='. esc_url( '/layout/images/front-page/front-page-team-2.jpg' ) .'&position='. __( 'SEO Specialist', 'clubstiftung' ) .'&entry='. __( 'Curious, tech-geeck and gets serious when it comes to work.', 'clubstiftung' ) .'&facebook_url='. esc_url( '#' ) .'&twitter_url='. esc_url( '#' ) .'&linkedin_url='. esc_url( '#' ) .'&color=#f1d204', $the_widget_args );
					the_widget( 'clubstiftung_Widget_Person', 'title='. __( 'John Smith', 'clubstiftung' ) .'&image='. esc_url( '/layout/images/front-page/front-page-team-3.jpg' ) .'&position='. __( 'Developer', 'clubstiftung' ) .'&entry='. __( 'Enthusiastic, passionate with great sense of humor.', 'clubstiftung' ) .'&facebook_url='. esc_url( '#' ) .'&twitter_url='. esc_url( '#' ) .'&linkedin_url='. esc_url( '#' ) .'&color=#6a4d8a', $the_widget_args );
				endif;
				?>
			</div><!--/.row-->
		</div><!--/.container-->
	</div><!--/.section-content-->
</section><!--/#team.front-page-section-->

<?php } ?>
