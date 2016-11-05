<?php
/**
 *	The template for displaying the header.
 *
 *	@package WordPress
 *	@subpackage clubstiftung
 */
?>
<?php
$logo = get_custom_logo();
$text_logo = get_theme_mod( 'clubstiftung_text_logo', __('clubstiftung', 'clubstiftung') );
$jumbotron_general_image = get_theme_mod( 'clubstiftung_jumbotron_general_image', esc_url( get_template_directory_uri() . '/layout/images/front-page/front-page-header.png' ) );
$preloader_enable = get_theme_mod( 'clubstiftung_preloader_enable', 1 );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php

		if( $preloader_enable == 1 ): ?>
			<div class="pace-overlay"></div>
		<?php endif;
		if( is_front_page() ):
			$url = ( ( $jumbotron_general_image ) ? esc_url( $jumbotron_general_image ) : '' );
		elseif(is_single()):
			$url = ((wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )[0]) ? wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )[0] : esc_url( $jumbotron_general_image ));
		else:
			$url = ( ( $jumbotron_general_image ) ? esc_url( $jumbotron_general_image ) : '' );
		endif; ?>
		<header id="header" class="background <?php if( is_front_page() ): echo 'header-front-page'; else: echo 'header-blog'; endif; ?>"
		style="background-image: url('<?php echo $url ?>');">
			<div class="top-header">
				<div class="container">
					<div class="row">
						<div class="header-block flexed">
							<?php if( $logo ): ?>
								<?php echo $logo ?>
							<?php else: ?>
								<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="header-logo"><?php echo clubstiftung_sanitize_html( $text_logo ); ?></a>
							<?php endif; ?>
							<nav class="header-navigation">
								<ul class="clearfix">
									<?php
									wp_nav_menu( array(
										'theme_location'	=> 'primary-menu',
										'menu'				=> '',
										'container'			=> '',
										'container_class'	=> '',
										'container_id'		=> '',
										'menu_class'		=> '',
										'menu_id'			=> '',
										'items_wrap'		=> '%3$s',
										'walker'			=> new clubstiftung_Extended_Menu_Walker(),
										'fallback_cb'		=> 'clubstiftung_Extended_Menu_Walker::fallback'
									) );
									echo "<li>";
									echo qtranxf_generateLanguageSelectCode('text');
									echo "</li>";
										?>
								</ul><!--/.clearfix-->

							</nav><!--/.header-navigation-->
							<button class="open-responsive-menu"><i class="fa fa-bars"></i></button>

						</div>
					</div><!--/.row-->
				</div><!--/.container-->
			</div><!--/.top-header-->
			<nav class="responsive-menu">
				<ul>
					<?php
					wp_nav_menu( array(
						'theme_location'	=> 'primary-menu',
						'menu'				=> '',
						'container'			=> '',
						'container_class'	=> '',
						'container_id'		=> '',
						'menu_class'		=> '',
						'menu_id'			=> '',
						'items_wrap'		=> '%3$s',
						'walker'			=> new clubstiftung_Extended_Menu_Walker(),
						'fallback_cb'		=> 'clubstiftung_Extended_Menu_Walker::fallback'
					) );
					echo "<li>";
					echo qtranxf_generateLanguageSelectCode('text');
					echo "</li>";
					?>
				</ul>
			</nav><!--/.responsive-menu-->
			<?php
			if( get_option( 'show_on_front' ) == 'page' && is_front_page() ):
				get_template_part( 'sections/front-page', 'bottom-header' );
			else:
				get_template_part( 'sections/blog', 'bottom-header' );
			endif;
			?>
		</header><!--/#header-->
