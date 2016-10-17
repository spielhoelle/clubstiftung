<?php
/**
 *	The template for dispalying the sidebar.
 *
 *	@package WordPress
 *	@subpackage clubstiftung
 */
?>
<div class="col-sm-4">
	<div id="sidebar">
		<?php
		if( is_active_sidebar( 'blog-sidebar' ) ):
			dynamic_sidebar( 'blog-sidebar' );
		else:
			$the_widget_args = array(
				'before_widget'	=> '<div class="widget">',
				'after_widget'	=> '</div>',
				'before_title'	=> '<div class="widget-title"><h3>',
				'after_title'	=> '</h3></div>'
			);

			the_widget( 'clubstiftung_Widget_Recent_Posts', 'title='. __( 'Recent Posts', 'clubstiftung' ) .'&display_title=on&numberofposts=4', $the_widget_args );
			the_widget( 'WP_Widget_Categories', 'title=' . __( 'Categories', 'clubstiftung' ), $the_widget_args );
			the_widget( 'WP_Widget_Archives', 'title=' . __( 'Archive', 'clubstiftung' ), $the_widget_args );
		endif;
		?>
	</div><!--/#sidebar-->
</div><!--/.col-sm-4-->
