<?php
// Entry CSS
function ntt_entry_css( $classes ) {
    
    global $post;
    
    // Default
    $r_defaults = array(
        'entry-'. $post->ID,
        'entry',
        'cp',
    );
    
    foreach ( $r_defaults as $css ) {
        $classes[] = $css;
    }
    
    return $classes;
}
add_filter( 'post_class', 'ntt_entry_css' );