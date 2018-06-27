<?php

function ntt_wp_customizer_color_patterns() {
    $hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) );
    $saturation = absint( apply_filters( 'ntt_custom_colors_saturation', 50 ) );
    $reduced_saturation = ( .8 * $saturation ) . '%';
    $saturation = $saturation . '%';
    $css = '
    .wp-customizer-color-scheme--custom .entity-header---cr {
        background-color: hsl('. $hue. ', '. $saturation. ', 50%);
    }

    .wp-customizer-color-scheme--custom .entity-primary-name---a,
    .wp-customizer-color-scheme--custom .entity-primary-description---a {
        color: white;
    ';
    return apply_filters( 'ntt_wp_customizer_color_patterns', $css, $hue, $saturation );
}