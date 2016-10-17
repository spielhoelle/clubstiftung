<?php
/**
 *	Template part for displaying a message that posts cannot be found.
 *
 *	@package WordPress
 *	@subpackage clubstiftung
 */
?>
<article <?php post_class( 'blog-post nothing-found' ); ?>>
    <?php _e( 'Nothing Found', 'clubstiftung' ); ?>
</article><!--/#post-<?php the_ID(); ?>.blog-post-->
