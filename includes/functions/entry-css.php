<?php
/**
 * Entry CSS
 */

function ntt_entry_css( $classes ) {
    
    global $post;
    
    /**
     * Defaults
     */

    $r_defaults = array(
        'ntt--entry--'. $post->ID,
        'ntt--entry',
        'ntt--cp',
    );
    
    foreach ( $r_defaults as $css ) {
        $classes[] = $css;
    }

    /**
     * Entry Name
     */

    if ( $post->post_title ) {
        $classes[] = 'ntt--'. $post->post_type. '--'. $post->post_name;
    }

    /**
     * Entry Type View
     */

    $classes[] = 'ntt--'. $post->post_type;
    
    return $classes;
}
add_filter( 'post_class', 'ntt_entry_css' );

/**
 * Entry CSS added to HTML
 */
add_filter( 'ntt_html_css_filter', function( $classes ) {
    return is_singular() ? ntt_entry_css( $classes ) : $classes;
} );