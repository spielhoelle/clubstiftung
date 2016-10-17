<?php
/**
 *	The template for dispalying the archive.
 *
 *	@package WordPress
 *	@subpackage clubstiftung
 */
?>
<?php get_header(); ?>
<div class="max-width">
	<div class="row">
			<div class="container">
				<?php get_search_form(); ?>
			<section id="blog" class="newsflex">
				<?php do_action( 'clubstiftung_above_content_after_header' ); ?>
				<?php
				if( have_posts() ):
					while( have_posts() ):
						the_post();
						get_template_part( 'template-parts/content', '' );
					endwhile;
				else:
					get_template_part( 'template-parts/content', 'none' );
				endif;
				?>
				<?php do_action( 'clubstiftung_after_content_above_footer' ); ?>
			</section><!--/#search.php-->
		</div>
	</div><!--/.row-->
</div><!--/.container-->
<?php get_footer(); ?>
