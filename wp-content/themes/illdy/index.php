<?php
/**
 *	The template for dispalying the index.
 *
 *	@package WordPress
 *	@subpackage illdy
 */
?>
<?php get_header(); ?>
<div class="max-width">
	<div class="row">
		<div class="container">
			<?php get_search_form(); ?>
			<section id="blog" class="faders newsflex">
				<?php do_action( 'illdy_above_content_after_header' ); ?>
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
				<?php do_action( 'illdy_after_content_above_footer' ); ?>
			</section><!--/#index.php-->
		</div>
	</div><!--/.row-->
</div><!--/.container-->
<?php get_footer(); ?>
