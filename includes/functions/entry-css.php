<?php
/**
 * Entry CSS
 */

function ntt__function__entry__css( $classes ) {
    
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

    return $classes;
}
add_filter( 'post_class', 'ntt__function__entry__css' );