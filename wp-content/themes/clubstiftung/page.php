<?php
/**
 *	The template for dispalying the page.
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
				get_template_part( 'template-parts/content', 'page' );
			endwhile;
		endif;
		?>
	</section><!--/#page.php-->
</div><!--/.container-->
<?php get_footer(); ?>
