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

// Custom Fonts
if ( ! function_exists( 'ntt_custom_fonts_url') ) {
    function ntt_custom_fonts_url() {
        $fonts_url = '';
        $font_switch = _x( 'on', 'Font: on or off', 'ntt' );

        if ( 'off' !== $font_switch ) {
            $font_families = array();
            $font_families[] = 'Noto Sans:400,700';
            $query_args = array(
                'family' => urlencode( implode( '|', $font_families ) ),
                'subset' => urlencode( 'latin,latin-ext' ),
            );
            $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
        }
        return esc_url_raw( $fonts_url );
    }
}

// Custom Fonts Settings
if ( ! function_exists( 'ntt_custom_fonts_settings') ) {
    function ntt_custom_fonts_settings() {
        ?>

        <style id="ntt-custom-fonts-style">
            body,
            input,
            textarea {
                font-family: 'Noto Sans', sans-serif;
            }
        </style>
        <?php
    }
    add_action( 'wp_head', 'ntt_custom_fonts_settings' );
}

// Custom Fonts Style
function ntt_custom_fonts_style() {
    wp_enqueue_style( 'ntt-custom-fonts-style', ntt_custom_fonts_url() );
}
add_action( 'wp_enqueue_scripts', 'ntt_custom_fonts_style', 0);