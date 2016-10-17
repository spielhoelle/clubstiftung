<?php
/**
 *	Archive Title
 */
if(!function_exists('clubstiftung_archive_title')) {
	function clubstiftung_archive_title( $before = '', $after = '' ) {
		if ( is_category() ) {
			$title = sprintf( __( 'Category: %s', 'clubstiftung' ), single_cat_title( '', false ) );
		} elseif ( is_tag() ) {
			$title = sprintf( __( 'Tag: %s', 'clubstiftung' ), single_tag_title( '', false ) );
		} elseif ( is_author() ) {
			$title = sprintf( __( 'Author: %s', 'clubstiftung' ), '<span class="vcard">' . get_the_author() . '</span>' );
		} elseif ( is_year() ) {
			$title = sprintf( __( 'Year: %s', 'clubstiftung' ), get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'clubstiftung' ) ) );
		} elseif ( is_month() ) {
			$title = sprintf( __( 'Month: %s', 'clubstiftung' ), get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'clubstiftung' ) ) );
		} elseif ( is_day() ) {
			$title = sprintf( __( 'Day: %s', 'clubstiftung' ), get_the_date( esc_html_x( 'F j, Y', 'daily archives date format', 'clubstiftung' ) ) );
		} elseif ( is_tax( 'post_format' ) ) {
			if ( is_tax( 'post_format', 'post-format-aside' ) ) {
				$title = esc_html_x( 'Asides', 'post format archive title', 'clubstiftung' );
			} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
				$title = esc_html_x( 'Galleries', 'post format archive title', 'clubstiftung' );
			} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
				$title = esc_html_x( 'Images', 'post format archive title', 'clubstiftung' );
			} elseif ( is_tax('post_format', 'post-format-video' ) ) {
				$title = esc_html_x( 'Videos', 'post format archive title', 'clubstiftung' );
			} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
				$title = esc_html_x( 'Quotes', 'post format archive title', 'clubstiftung' );
			} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
				$title = esc_html_x( 'Links', 'post format archive title', 'clubstiftung' );
			} elseif ( is_tax( 'post_format', 'post-format-status') ) {
				$title = esc_html_x( 'Statuses', 'post format archive title', 'clubstiftung' );
			} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
				$title = esc_html_x( 'Audio', 'post format archive title', 'clubstiftung' );
			} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
				$title = esc_html_x( 'Chats', 'post format archive title', 'clubstiftung' );
			}
		} elseif ( is_post_type_archive() ) {
			$title = sprintf( __( 'Archives: %s', 'clubstiftung' ), post_type_archive_title( '', false ) );
		} elseif ( is_tax() ) {
			$tax = get_taxonomy( get_queried_object()->taxonomy );
			/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
			$title = sprintf( __( '%1$s: %2$s', 'clubstiftung' ), $tax->labels->singular_name, single_term_title( '', false ) );
		} elseif ( is_home() ) {
			$title = get_bloginfo('name');
		} elseif ( is_search() ) {
			$title = sprintf( __( 'Search Results for: %s', 'clubstiftung' ), get_search_query() );
		}else {
			$title = __( 'Archives', 'clubstiftung' );
		}

		/**
		* Filter the archive title.
		*
		* @param string $title Archive title to be displayed.
		*/
		$title = apply_filters('get_the_archive_title', $title);

		if (!empty($title)) {
			echo $before . $title . $after;  // WPCS: XSS OK.
		}
	}
}


/**
 *	Archive Description
 */
if(!function_exists('clubstiftung_archive_description')) {
	function clubstiftung_archive_description( $before = '', $after = '' ) {
		$description = apply_filters( 'get_the_archive_description', term_description() );
		if ( !empty( $description ) ) {
			echo $before . $description . $after;
		}
	}
}
