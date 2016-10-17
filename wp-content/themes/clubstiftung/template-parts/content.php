<?php
/**
 *	The template for dispalying the content.
 *
 *	@package WordPress
 *	@subpackage clubstiftung
 */
$jumbotron_general_image = get_theme_mod( 'clubstiftung_jumbotron_general_image', esc_url( get_template_directory_uri() . '/layout/images/front-page/front-page-header.png' ) );
$url = ((wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )[0]) ? wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )[0] : esc_url( $jumbotron_general_image ));
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="blog-post-title">
    <img class="blog-post-image" src="/wp-includes/images/blank.gif" style="background-image: url(<?php echo $url; ?>);">
  </a>
  <div class="blog-post">
    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="blog-post-title"><?php the_title(); ?></a>
  	<?php do_action( 'clubstiftung_archive_meta_content' ); ?>
  	<div class="blog-post-entry">
  		<?php the_excerpt(); ?>
  	</div><!--/.blog-post-entry-->
  	<a href="<?php the_permalink(); ?>" title="<?php _e( 'Read more', 'clubstiftung' ); ?>" class="blog-post-button"><i class="fa fa-chevron-circle-right"></i><?php _e( 'Read more', 'clubstiftung' ); ?></a>
  </div>
</article><!--/#post-<?php the_ID(); ?>.blog-post-->
