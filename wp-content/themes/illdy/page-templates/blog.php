<?php
/**
 *	Template Name: Blog
 *
 *	The template for dispalying Custom Page Template: Blog.
 *
 *	@package WordPress
 *	@subpackage illdy
 */
?>
<?php get_header(); ?>
<div class="container">
	<div class="row">
		<section id="blog">
			<?php do_action( 'illdy_above_content_after_header' ); ?>
			<?php
			$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
			$wp_query_args = array (
				'post_type'					=> array( 'post' ),
				'cache_results'				=> true,
				'update_post_meta_cache'	=> true,
				'update_post_term_cache'	=> true,
				'paged'						=> $paged
			);

			$wp_query = new WP_Query( $wp_query_args );

			if( $wp_query->have_posts() ):
				while( $wp_query->have_posts() ):
					$wp_query->the_post();
					get_template_part( 'template-parts/content', 'none' );
				endwhile;
			else:
				get_template_part( 'template-parts/content', 'none' );
			endif;

			wp_reset_postdata();
			?>
			<?php do_action( 'illdy_after_content_above_footer' ); ?>
		</section><!--/#blog.php-->
	</div><!--/.row-->
</div><!--/.container-->
<?php get_footer(); ?>
