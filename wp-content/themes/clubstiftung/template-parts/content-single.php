<?php
/**
 *	The template for displaying the single content.
 *
 *	@package WordPress
 *	@subpackage clubstiftung
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post' ); ?>>
	<?php do_action( 'clubstiftung_single_entry_meta' ); ?>
	<div class="blog-post-entry markup-format">
		
		<?php do_action( 'clubstiftung_archive_meta_content' ); ?>
		<?php
		the_content();

		wp_link_pages( array(
			'before'	=> '<div class="link-pages">' . __( 'Pages:', 'clubstiftung' ),
			'after'		=> '</div><!--/.link-pages-->'
		) );
		?>
	</div><!--/.blog-post-entry.markup-format-->
	<?php do_action( 'clubstiftung_single_after_content' ); ?>

</article><!--/#post-<?php the_ID(); ?>.blog-post-->
