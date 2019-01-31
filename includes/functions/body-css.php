<?php
function ntt_body_css( $css ) {
    
    $css[] = 'body';
    
    return $css;
}
add_filter( 'body_class', 'ntt_body_css' );