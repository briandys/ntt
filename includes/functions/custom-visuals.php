<?php

function ntt_custom_visuals() {
    
    // Custom Background
    add_theme_support( 'custom-background' );
        
    // Custom Header
    add_theme_support( 'custom-header', apply_filters( 'ntt_custom_header_args', array(
        'default-image'      => '',
        'default_text_color' => 'black',
        'width'              => 1920,
        'height'             => 1440,
        'flex-width'         => true,
        'flex-height'        => true,
        'wp-head-callback'   => 'ntt_custom_header_callback',
     ) ) );
    
    // Custom Logo
    add_theme_support( 'custom-logo', apply_filters( 'ntt_custom_logo_args', array(
        'width'       => 640,
        'height'      => 640,
        'flex-width'  => true,
        'flex-height' => true,
     ) ) );
}
add_action( 'after_setup_theme', 'ntt_custom_visuals' );

// Custom Header Callback
function ntt_custom_header_callback() {
    
    if ( get_theme_support( 'custom-header', 'default-text-color' ) === get_header_textcolor() ) {
        return;
    }
    
    if ( 'blank' !== get_header_textcolor() ) {
        ?>
        <style id="ntt-custom-header-colors-style">
            .entity-primary-name---a,
            .entity-primary-description {
                color: #<?php echo esc_attr( get_header_textcolor() ); ?>;
            }
        </style>
        <?php
    }
}