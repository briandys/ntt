<?php
function ntt_get_html_css( $class='' ) {
    
    $classes = array();

    // Default CSS Class Names
    $classes[] = 'ntt';
    $classes[] = 'view';
    $classes[] = 'no-js';

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

function ntt_widgets_html_css( $classes ) {

    $enabled = '--1';
	
	// Entity Widgets Ability Status
    $r_entity_widgets = array(
        'entity-primary-axns',
        'entity-banner-aside',
        'entity-header-aside',
        'entity-main-header-aside',
        'entity-main-main-aside',
        'entity-footer-aside',
    );

    foreach ( $r_entity_widgets as $entity_widgets ) {
        if ( is_active_sidebar( $entity_widgets ) ) {
            $classes[] = $entity_widgets. $enabled;
        }
    }
	
	// Entry Widgets Ability Status
    $r_entry_widgets = array(
        'entry-banner-aside',
        'entry-header-aside',
        'entry-main-aside',
        'entry-footer-aside',
    );

    foreach ( $r_entry_widgets as $entry_widgets ) {
        if ( is_singular() && is_active_sidebar( $entry_widgets ) ) {
            $classes[] = $entry_widgets. $enabled;
        }
    }

	return $classes;
}
add_filter( 'ntt_html_css_wp_filter', 'ntt_widgets_html_css' );