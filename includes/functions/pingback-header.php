<?php
function ntt__function__pingback_header() {
        
    if ( is_singular() && pings_open() ) {
        printf( '<link rel="pingback" href="%s">' . "\n", esc_attr( get_bloginfo( 'pingback_url' ) ) );
    }
}
add_action( 'wp_head', 'ntt__function__pingback_header' );