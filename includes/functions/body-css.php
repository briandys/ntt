<?php
function ntt_body_css( $classes ) {
    $classes[] = 'body';
    return $classes;
}
add_filter( 'body_class', 'ntt_body_css' );