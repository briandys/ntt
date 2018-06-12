<?php

// Preconnect Google Fonts
function ntt_preconnect_google_fonts( $urls, $relation_type ) {
    
    if ( wp_style_is( 'ntt-custom-fonts-style', 'queue' ) && 'preconnect' === $relation_type ) {
        $urls[] = array(
            'href' => 'https://fonts.gstatic.com',
            'crossorigin',
        );
    }

    return $urls;
}
add_filter( 'wp_resource_hints', 'ntt_preconnect_google_fonts', 10, 2 );

// Font URL
function ntt_custom_fonts_url() {
    $fonts_url = '';
    $font_switch = _x( 'on', 'Font: on or off', 'ntt' );

    if ( 'off' !== $font_switch ) {
        $font_families = array();
        $font_families[] = 'Noto Sans:400,700|Noto Serif:400,700';
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }
    return esc_url_raw( $fonts_url );
}

// Font Style
function ntt_custom_fonts_url_style() {
    wp_enqueue_style( 'ntt-custom-fonts-url-style', ntt_custom_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'ntt_custom_fonts_url_style', 0);

// Font Settings
function ntt_font_settings() { ?>

    <style id="ntt-custom-fonts-style">
        .body {
            font-family: 'Noto Sans', sans-serif;
        }
    </style>
    
<?php }
add_action( 'wp_head', 'ntt_font_settings' );