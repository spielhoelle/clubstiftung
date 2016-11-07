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
  <div class="blog-post">
    <h1 class="blog-post-title"><?php the_title(); ?></h1>
    <?php
      echo '<h3 class="post-meta-time"><i class="fa fa-calendar margin--right"></i><time datetime="'. sprintf( '%s-%s-%s', get_the_date( 'Y' ), get_the_date( 'm' ), get_the_date( 'd' ) ) .'">'. sprintf( '%s %s, %s', get_the_date( 'F' ), get_the_date( 'd' ), get_the_date( 'Y' ) ) .'</time></h3>';
    ?>
    <br>
  	<div class="blog-post-entry">
  		<?php the_content(); ?>
  	</div><!--/.blog-post-entry-->
  </div>
</article><!--/#post-<?php the_ID(); ?>.blog-post-->
