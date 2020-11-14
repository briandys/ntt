<?php
function ntt__function__view__css__getter( $class='' ) {

    global $post;
    
    $classes = array();

    /**
     * Defaults
     */
    $classes[] = 'ntt';
    $classes[] = 'ntt--view';
    $classes[] = 'ntt--no-js';

    /**
     * View Position Types
     */
    if ( is_front_page() ) {
        $classes[] = 'ntt--view---front';
    } else {
        $classes[] = 'ntt--view---inner';
    }

    /**
     * Entry Display Types
     */
    if ( is_home() || is_archive() || ntt__function__search_results__entity_validation( $match = true ) ) {
        $classes[] = 'ntt--entry-index--view';
	} else if ( is_singular() ) {
		$classes[] = 'ntt--entry-singular--view';
	} else if ( is_404() || ntt__function__search_results__entity_validation( $match = false ) ) {
        $classes[] = 'ntt--entry-zero--view';
    }

    /**
     * Entry Index Types
     */
    if ( is_home() ) {
        $classes[] = 'ntt--entry-index---current--view';
    } else if ( is_archive() ) {
        $classes[] = 'ntt--entry-index---archive--view';

        if ( is_tag() ) {
            $classes[] = 'ntt--entry-index---tag-archive--view';
        }
    } else if( ntt__function__search_results__entity_validation( $match = true ) ) {
        $classes[] = 'ntt--entry-index---search--view';
    }

    /**
     * Entity Logo Ability Status
     */
    if ( has_custom_logo() ) {
        $classes[] = 'ntt--entity-logo---1--view';
    } else {
        $classes[] = 'ntt--entity-logo---0--view';
    }

    /**
     * Entity Name, Entity Description Ability Status
     */
    if ( get_header_textcolor() === 'blank' || ( ! get_bloginfo( 'name', 'display' ) && ! get_bloginfo( 'description', 'display' ) ) ) {
        $classes[] = 'ntt--entity-name-description---0--view';
    } else {
        $classes[] = 'ntt--entity-name-description---1--view';
    }
    
    /**
     * Entity Banner Visuals Ability Status
     */
    if ( has_header_image() ) {
        $classes[] = 'ntt--entity-banner-visuals---1--view';
    }

    /**
     * Customizer Color Scheme
     */
    if ( get_theme_mod( 'colorscheme' ) == 'custom' ) {
        $classes[] = 'ntt--customizer-color-scheme---custom--view';
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
    $classes = apply_filters( 'ntt__wp_filter__view_css', $classes, $class );
 
    return array_unique( $classes );
}

function ntt__function__view__css( $class='' ) {
    echo join( ' ', ntt__function__view__css__getter( $class ) );
}