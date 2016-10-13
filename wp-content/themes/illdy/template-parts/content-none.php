<?php
/**
 *	Template part for displaying a message that posts cannot be found.
 *
 *	@package WordPress
 *	@subpackage illdy
 */
?>
<article <?php post_class( 'blog-post nothing-found' ); ?>>
    <?php _e( 'Nothing Found', 'illdy' ); ?>
</article><!--/#post-<?php the_ID(); ?>.blog-post-->
