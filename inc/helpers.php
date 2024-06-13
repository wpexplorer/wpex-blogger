<?php
/**
 * This file includes helper functions used throughout the theme.
 *
 * @package     Blogger WordPress theme
 * @subpackage  Includes
 * @author      Alexander Clarke
 * @link        https://www.wpexplorer.com/
 * @since       2.0.0
 */

/**
 * Returns escaped post title
 *
 * @since 2.0.0
 */
function wpex_get_esc_title() {
	return esc_attr( the_title_attribute( 'echo=0' ) );
}

/**
 * Outputs escaped post title
 *
 * @since 2.0.0
 */
function wpex_esc_title() {
	echo wpex_get_esc_title();
}

/**
 * Returns array of social links
 *
 * @since 2.0.0
 */
function wpex_social_links() {
	$array = array(
		'twitter',
		'facebook',
		'youtube',
		'instagram',
		'tiktok',
		'discord',
		'linkedin',
		'pinterest',
		'vk',
		'rss',
	);
	return (array) apply_filters( 'wpex_social_array', $array );
}

/**
 * Returns social icon svg.
 *
 * @since 2.0.0
 */
function wpex_get_social_icon_svg( $site = '' ) {
	$svg = '';
	switch ( $site ) {
		case 'twitter':
			$svg = '<svg role="img" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 512 512"><title>Twitter X</title><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg>';
			break;
		case 'facebook':
			$svg = '<svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="18" height="18"><title>Facebook</title><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>';
			break;
		case 'linkedin':
			$svg = '<svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="18" height="18"><title>LinkedIn</title><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>';
			break;
		case 'pinterest':
			$svg = '<svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="18" height="18"><title>Pinterest</title><path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.162-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.401.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.354-.629-2.758-1.379l-.749 2.848c-.269 1.045-1.004 2.352-1.498 3.146 1.123.345 2.306.535 3.55.535 6.607 0 11.985-5.365 11.985-11.987C23.97 5.39 18.592.026 11.985.026L12.017 0z"/></svg>';
			break;
		case 'vk':
			$svg = '<svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="18" height="18"><title>VK</title><path d="m9.489.004.729-.003h3.564l.73.003.914.01.433.007.418.011.403.014.388.016.374.021.36.025.345.03.333.033c1.74.196 2.933.616 3.833 1.516.9.9 1.32 2.092 1.516 3.833l.034.333.029.346.025.36.02.373.025.588.012.41.013.644.009.915.004.98-.001 3.313-.003.73-.01.914-.007.433-.011.418-.014.403-.016.388-.021.374-.025.36-.03.345-.033.333c-.196 1.74-.616 2.933-1.516 3.833-.9.9-2.092 1.32-3.833 1.516l-.333.034-.346.029-.36.025-.373.02-.588.025-.41.012-.644.013-.915.009-.98.004-3.313-.001-.73-.003-.914-.01-.433-.007-.418-.011-.403-.014-.388-.016-.374-.021-.36-.025-.345-.03-.333-.033c-1.74-.196-2.933-.616-3.833-1.516-.9-.9-1.32-2.092-1.516-3.833l-.034-.333-.029-.346-.025-.36-.02-.373-.025-.588-.012-.41-.013-.644-.009-.915-.004-.98.001-3.313.003-.73.01-.914.007-.433.011-.418.014-.403.016-.388.021-.374.025-.36.03-.345.033-.333c.196-1.74.616-2.933 1.516-3.833.9-.9 2.092-1.32 3.833-1.516l.333-.034.346-.029.36-.025.373-.02.588-.025.41-.012.644-.013.915-.009ZM6.79 7.3H4.05c.13 6.24 3.25 9.99 8.72 9.99h.31v-3.57c2.01.2 3.53 1.67 4.14 3.57h2.84c-.78-2.84-2.83-4.41-4.11-5.01 1.28-.74 3.08-2.54 3.51-4.98h-2.58c-.56 1.98-2.22 3.78-3.8 3.95V7.3H10.5v6.92c-1.6-.4-3.62-2.34-3.71-6.92Z"/></svg>';
			break;
		case 'instagram':
			$svg = '<svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="18" height="18"><title>Instagram</title><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/></svg>';
			break;
		case 'discord':
			$svg = '<svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="18" height="18"><title>Discord</title><path d="M20.317 4.3698a19.7913 19.7913 0 00-4.8851-1.5152.0741.0741 0 00-.0785.0371c-.211.3753-.4447.8648-.6083 1.2495-1.8447-.2762-3.68-.2762-5.4868 0-.1636-.3933-.4058-.8742-.6177-1.2495a.077.077 0 00-.0785-.037 19.7363 19.7363 0 00-4.8852 1.515.0699.0699 0 00-.0321.0277C.5334 9.0458-.319 13.5799.0992 18.0578a.0824.0824 0 00.0312.0561c2.0528 1.5076 4.0413 2.4228 5.9929 3.0294a.0777.0777 0 00.0842-.0276c.4616-.6304.8731-1.2952 1.226-1.9942a.076.076 0 00-.0416-.1057c-.6528-.2476-1.2743-.5495-1.8722-.8923a.077.077 0 01-.0076-.1277c.1258-.0943.2517-.1923.3718-.2914a.0743.0743 0 01.0776-.0105c3.9278 1.7933 8.18 1.7933 12.0614 0a.0739.0739 0 01.0785.0095c.1202.099.246.1981.3728.2924a.077.077 0 01-.0066.1276 12.2986 12.2986 0 01-1.873.8914.0766.0766 0 00-.0407.1067c.3604.698.7719 1.3628 1.225 1.9932a.076.076 0 00.0842.0286c1.961-.6067 3.9495-1.5219 6.0023-3.0294a.077.077 0 00.0313-.0552c.5004-5.177-.8382-9.6739-3.5485-13.6604a.061.061 0 00-.0312-.0286zM8.02 15.3312c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9555-2.4189 2.157-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.9555 2.4189-2.1569 2.4189zm7.9748 0c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9554-2.4189 2.1569-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.946 2.4189-2.1568 2.4189Z"/></svg>';
			break;
		case 'tiktok':
			$svg = '<svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="18" height="18"><title>TikTok</title><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>';
			break;
		case 'youtube':
			$svg = '<svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="18" height="18"><title>YouTube</title><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>';
			break;
		case 'rss':
			$svg = '<svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="18" height="18"><title>RSS</title><path d="M19.199 24C19.199 13.467 10.533 4.8 0 4.8V0c13.165 0 24 10.835 24 24h-4.801zM3.291 17.415c1.814 0 3.293 1.479 3.293 3.295 0 1.813-1.485 3.29-3.301 3.29C1.47 24 0 22.526 0 20.71s1.475-3.294 3.291-3.295zM15.909 24h-4.665c0-6.169-5.075-11.245-11.244-11.245V8.09c8.727 0 15.909 7.184 15.909 15.91z"/></svg>';
			break;
	}
	return apply_filters( 'wpex_social_icon_svg', $svg, $site );
}

/**
 * List categories for specific taxonomy
 * 
 * @link    http://codex.wordpress.org/Function_Reference/wp_get_post_terms
 * @since   1.0.0
 */
if ( ! function_exists( 'wpex_list_post_terms' ) ) {

    function wpex_list_post_terms( $taxonomy = 'category', $echo = true ) {
        $list_terms = array();
        $terms      = wp_get_post_terms( get_the_ID(), $taxonomy );
        foreach ( $terms as $term ) {
            $permalink      = get_term_link( $term->term_id, $taxonomy );
            $list_terms[]   = '<a href="'. $permalink .'" title="'. $term->name .'">'. $term->name .'</a>';
        }
        if ( ! $list_terms ) {
            return;
        }
        $list_terms = implode( ', ', $list_terms );
        if ( $echo ) {
            echo $list_terms;
        } else {
            return $list_terms;
        }
    }

}

/**
 * Custom excerpts based on wp_trim_words
 *
 * @since	1.0.0
 * @link	http://codex.wordpress.org/Function_Reference/wp_trim_words
 */
if ( ! function_exists( 'wpex_excerpt' ) ) {

	function wpex_excerpt( $length = 30, $readmore = false ) {

		// Get global post
		global $post;

		// Get post data
		$id      = $post->ID;
		$excerpt = $post->post_excerpt;

		// Display custom excerpt
		if ( $excerpt ) {
			$output = $excerpt;
		}

		// Check for more tag
		elseif ( strpos( $post->post_content, '<!--more-->' ) ) {
			$wpex_more_tag	= apply_filters( 'wpex_more_tag', null );
			$output			= get_the_content( $wpex_more_tag );
		}

		// Generate auto excerpt
		else {
			$output = wp_trim_words( strip_shortcodes( get_the_content( $id ) ), $length );
			if ( $readmore == true ) {
				$text			= apply_filters( 'wpex_readmore_text', esc_html__( 'continue reading', 'wpex-blogger' ) );
				$readmore_link	= '<span class="wpex-readmore"><a href="' . esc_url( get_permalink( $id ) ) . '" rel="bookmark">'. esc_html( $text ) .' &rarr;</a></span>';
				$output .= apply_filters( 'wpex_readmore_link', $readmore_link );
			}
		}

		// Echo output
		echo $output;

	}
}



/**
 * Numbered Pagination
 *
 * @since	1.0.0
 * @link	https://codex.wordpress.org/Function_Reference/paginate_links
 */
if ( ! function_exists( 'wpex_pagination') ) {

	function wpex_pagination( $custom_query = '' ) {

		// Get currect number of pages and define total var
		if ( $custom_query ) {
			$total = $custom_query->max_num_pages;
		} else {
			global $wp_query;
			$total = $wp_query->max_num_pages;
		}

		// Display pagination if total var is greater then 1 ( current query is paginated )
		if ( $total > 1 )  {

			// Set current page if not defined
			if ( ! $current_page = get_query_var( 'paged') ) {
				 $current_page = 1;
			 }

			// Get currect format
			if ( get_option( 'permalink_structure') ) {
				$format = 'page/%#%/';
			} else {
				$format = '&paged=%#%';
			}

			// Display pagination
			echo '<div class="wpex-page-numbers-wrap">' . paginate_links(array(
				'base'      => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
				'format'    => $format,
				'current'   => max( 1, get_query_var( 'paged') ),
				'total'     => $total,
				'mid_size'  => 2,
				'type'      => 'list',
				'prev_text' => '<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 24 24" width="1em" fill="currentColor"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15.61 7.41L14.2 6l-6 6 6 6 1.41-1.41L11.03 12l4.58-4.59z"/></svg><span class="screen-reader-text">' . esc_html( 'Previous', 'wpex-blogger' ) . '</span>',
				'next_text' => '<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 24 24" width="1em" fill="currentColor"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M10.02 6L8.61 7.41 13.19 12l-4.58 4.59L10.02 18l6-6-6-6z"/></svg><span class="screen-reader-text">' . esc_html( 'Next', 'wpex-blogger' ) . '</span>',
			) ) . '</div>';
		}
	}

}


/**
 * Next and previous pagination
 *
 * @since	1.0.0
 */
if ( ! function_exists( 'wpex_pagejump' ) ) {
	function wpex_pagejump( $pages = '' ) {

		// Set correct paged var
		global $paged;
		if ( empty( $paged ) ) {
			$paged = 1;
		}

		// Get pages var
		if ( ! $pages ) {
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if ( ! $pages ) {
				$pages = 1;
			}
		}

		// Display next/previous pagination
		if ( 1 != $pages ) {
			echo '<div class="post-navigation clr"><div class="alignleft">';
				previous_posts_link( '&larr; ' . __( 'Newer Posts', 'wpex-blogger' ) );
			echo '</div><div class="alignright">';
				next_posts_link( __( 'Older Posts', 'wpex-blogger' ) .' &rarr;' );
			echo '</div></div>';
		}

	}
}