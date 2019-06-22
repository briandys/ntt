<?php
function ntt_get_html_css( $class='' ) {

    global $post;
    
    // Making conditionals out of search results
    global $wp_query;
    $query_found_posts = $wp_query->found_posts;
    $is_no_search_results = ( is_search() && $query_found_posts == 0 );
    $is_with_search_results = ( is_search() && $query_found_posts >= 1 );
    
    $classes = array();

    /**
     * Defaults
     */

    $classes[] = 'ntt';
    $classes[] = 'ntt--view';
    $classes[] = 'no-js';

    /**
     * Entry Count Types
     */

    if ( is_home() || is_archive() || $is_with_search_results ) {
        $classes[] = 'ntt--multiple-entries';
	} elseif ( is_singular() ) {
		$classes[] = 'ntt--single-entry';
	} elseif ( is_404() || $is_no_search_results ) {
        $classes[] = 'ntt--zero-entry';
    }

    /**
     * Entry Index Types
     */

    if ( is_home() ) {
        $classes[] = 'ntt--current-index';
    } elseif ( is_archive() ) {
        $classes[] = 'ntt--archive-index';
    } elseif( $is_with_search_results ) {
        $classes[] = 'ntt--search-index';
    }

    /**
     * View Position Types
     */
    
    if ( is_front_page() ) {
        $classes[] = 'ntt--front-view';
    } else {
        $classes[] = 'ntt--inner-view';
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
     * Customizer Color Scheme
     */
    if ( get_theme_mod( 'colorscheme' ) == 'custom' ) {
        $classes[] = 'ntt--customizer-color-scheme---custom';
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
    $classes = apply_filters( 'ntt_html_css_filter', $classes, $class );
 
    return array_unique( $classes );
}

function ntt_html_css( $class='' ) {
    echo join( ' ', ntt_get_html_css( $class ) );
}