<?php
function ntt_get_html_css( $class='' ) {
    
    // Making conditionals out of search results
    global $wp_query;
    $query_found_posts = $wp_query->found_posts;
    $is_zero_search_results = ( is_search() && $query_found_posts == 0 );
    $is_with_search_results = ( is_search() && $query_found_posts >= 1 );
    
    $classes = array();

    /**
     * Defaults
     */
    $classes[] = 'ntt';
    $classes[] = 'ntt--view';
    $classes[] = 'no-js';

    /**
     * Entity View Count Types
     */
    if ( is_home() || is_archive() || $is_with_search_results ) {
        $classes[] = 'ntt--plural-view';
	} elseif ( is_singular() ) {
		$classes[] = 'ntt--singular-view';
	} elseif ( is_404() || $is_zero_search_results ) {
        $classes[] = 'ntt--none-view';
    }

    /**
     * Entity Logo Ability Status
     */
    if ( has_custom_logo() ) {
        $classes[] = 'ntt--entity-logo---1';
    } else {
        $classes[] = 'ntt--entity-logo---0';
    }

    /**
     * Entity Primary Name, Entity Description Ability Status
     */
    if ( get_header_textcolor() === 'blank' || ( ! get_bloginfo( 'name', 'display' ) && ! get_bloginfo( 'description', 'display' ) ) ) {
        $classes[] = 'ntt--entity-name-description---0';
    } else {
        $classes[] = 'ntt--entity-name-description---1';
    }
    
    /**
     * Entity Banner Visuals Ability Status
     */
    if ( has_header_image() ) {
        $classes[] = 'ntt--entity-banner-visuals---1';
    }

    /**
     * WP Customizer Color Scheme
     */
    if ( get_theme_mod( 'colorscheme' ) == 'custom' ) {
        $classes[] = 'ntt--wp-customizer-color-scheme---'. ntt_wp_customize_color_scheme_sanitizer( get_theme_mod( 'colorscheme' ) );
	}

    /**
     * Entry Index Types
     */
    if ( is_home() ) {
        $classes[] = 'ntt--current-index-view';
    } elseif ( is_archive() ) {
        $classes[] = 'ntt--archive-index-view';
    } elseif( $is_with_search_results ) {
        $classes[] = 'ntt--search-index-view';
    }

    if ( is_front_page() ) {
        $classes[] = 'ntt--front-view';
    } else {
        $classes[] = 'ntt--inner-view';
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