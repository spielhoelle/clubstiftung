<?php
/**
 *	The template for dispalying the single.
 *
 *	@package WordPress
 *	@subpackage clubstiftung
 */
?>
<?php get_header(); ?>
<div class="container">
	<section id="blog">
		<?php
		if( have_posts() ):
			while( have_posts() ):
				the_post();
				get_template_part( 'template-parts/content', 'single' );
			endwhile;
		endif;
		?>
	</section><!--/#single.php-->
</div><!--/.container-->
<?php get_footer(); ?>
