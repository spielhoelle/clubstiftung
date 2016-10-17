<?php
/**
 *	The template for displaying the latest news section in front page.
 *
 *	@package WordPress
 *	@subpackage clubstiftung
 */
?>
<?php
if ( current_user_can( 'edit_theme_options' ) ) {
	$general_title = get_theme_mod( 'clubstiftung_latest_news_general_title', __( 'Latest News', 'clubstiftung' ) );
	$general_entry = get_theme_mod( 'clubstiftung_latest_news_general_entry', __( 'If you are interested in the latest articles in the industry, take a sneak peek at our blog. You have got nothing to loose!', 'clubstiftung' ) );
	$button_text = get_theme_mod( 'clubstiftung_latest_news_button_text', __( 'See blog', 'clubstiftung' ) );
	$button_url = get_theme_mod( 'clubstiftung_latest_news_button_url', esc_url( '#' ) );
	$number_of_posts = get_theme_mod( 'clubstiftung_latest_news_number_of_posts', absint( 3 ) );
}else{
	$general_title = get_theme_mod( 'clubstiftung_latest_news_general_title' );
	$general_entry = get_theme_mod( 'clubstiftung_latest_news_general_entry' );
	$button_text = get_theme_mod( 'clubstiftung_latest_news_button_text' );
	$button_url = get_theme_mod( 'clubstiftung_latest_news_button_url' );
	$number_of_posts = get_theme_mod( 'clubstiftung_latest_news_number_of_posts', absint( 3 ) );
}

$post_query_args = array (
	'post_type'					=> array( 'post' ),
	'nopaging'					=> false,
	'posts_per_page'			=> absint( $number_of_posts ),
	'ignore_sticky_posts'		=> true,
	'cache_results'				=> true,
	'update_post_meta_cache'	=> true,
	'update_post_term_cache'	=> true,
);

$post_query = new WP_Query( $post_query_args );

if ( $post_query->have_posts() || $general_title != '' || $general_entry != '' || $button_text != '' ) {

?>

<section id="latest-news" class="front-page-section">
	<div class="section-header">
		<div class="container">
			<div class="row">
				<?php if( $general_title ): ?>
					<div class="col-sm-12">
						<h3><?php echo clubstiftung_sanitize_html( $general_title ); ?></h3>
					</div><!--/.col-sm-12-->
				<?php endif; ?>
				<?php if( $general_entry ): ?>
					<div class="col-sm-10 col-sm-offset-1">
						<p><?php echo clubstiftung_sanitize_html( $general_entry ); ?></p>
					</div><!--/.col-sm-10.col-sm-offset-1-->
				<?php endif; ?>
			</div><!--/.row-->
		</div><!--/.container-->
	</div><!--/.section-header-->


	<?php if( $post_query->have_posts() ): ?>
		<div class="section-content">
			<div class="container">
				<div class="faders newsflex">
					<?php while( $post_query->have_posts() ): ?>
						<?php
						$post_query->the_post();
						get_template_part( 'template-parts/content', '' );
					endwhile; ?>
				</div><!--/.row-->
			</div><!--/.container-->
		</div><!--/.section-content-->
	<?php endif; ?>
	<?php if( $button_text && $button_url ): ?>
		<a href="<?php echo esc_url( $button_url ); ?>" title="<?php echo esc_attr( $button_text ); ?>" class="latest-news-button header-button-one"><i class="fa fa-chevron-circle-right"></i><?php echo esc_html( $button_text ); ?></a>
	<?php endif; ?>
	<?php wp_reset_postdata(); ?>
</section><!--/#latest-news.front-page-section-->

<?php } ?>
