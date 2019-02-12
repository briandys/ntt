<?php
// Entry CSS
function ntt_entry_css( $classes ) {
    
    global $post;
    
    // Default
    $r_defaults_css = array(
        'entry-'. $post->ID,
        'entry',
        'cp',
    );
    
    foreach ( $r_defaults_css as $default_css ) {
        $classes[] = $default_css;
    }
    
    return $classes;
}
add_filter( 'post_class', 'ntt_entry_css' );