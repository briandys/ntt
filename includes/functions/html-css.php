<?php
function ntt_get_html_css( $class='' ) {
    
    global $wp_query;
    $query_found_posts = $wp_query->found_posts;
    $zero_search_index = ( is_search() && $query_found_posts == 0 );
    $search_index = ( is_search() && $query_found_posts >= 1 );
    
    $classes = array();

    $enabled_css = '1';

    /**
     * Defaults
     */
    $classes[] = 'ntt';
    $classes[] = 'view';
    $classes[] = 'no-js';

    /**
     * Entity View Count Types
     */
    if ( is_home() || is_archive() || $search_index ) {
        $classes[] = 'plural-view';
	} elseif ( is_singular() ) {
		$classes[] = 'singular-view';
	} elseif ( is_404() || $zero_search_index ) {
        $classes[] = 'none-view';
    }

    /**
     * Entity Logo Ability Status
     */
    if ( has_custom_logo() ) {
        $classes[] = 'entity-logo--'. $enabled_css;
    }
    
    /**
     * Entity Banner Visuals Ability Status
     */
    if ( has_header_image() ) {
        $classes[] = 'entity-banner-visuals--'. $enabled_css;
    }

    /**
     * WP Customizer Color Scheme
     */
    if ( get_theme_mod( 'colorscheme' ) == 'custom' ) {
        $classes[] = 'wp-customizer-color-scheme--'. ntt_wp_customize_color_scheme_sanitizer( get_theme_mod( 'colorscheme' ) );
	}

    /**
     * Entry Index Types
     */
    if ( is_home() ) {
        $classes[] = 'current-index-view';
    } elseif ( is_archive() ) {
        $classes[] = 'archive-index-view';
    } elseif( $search_index ) {
        $classes[] = 'search-index-view';
    }

    if ( ! empty( $class ) ) {
        if ( !is_array( $class ) )
            $class = preg_split( '#\s+#', $class );
        $classes = array_merge( $classes, $class );
    } else {
        // Ensure that we always coerce class to being an array.
        $class = array();
    }
 
    $classes = array_map( 'esc_attr', $classes );

    /**
     * Filters the list of CSS html classes.
     *
     * @param array $classes An array of classes.
     * @param array $class   An array of additional classes.
     */
    $classes = apply_filters( 'ntt_html_css_wp_filter', $classes, $class );
 
    return array_unique( $classes );
}

function ntt_html_css( $class='' ) {
    echo join( ' ', ntt_get_html_css( $class ) );
}