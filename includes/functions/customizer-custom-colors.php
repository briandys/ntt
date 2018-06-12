<?php

function ntt_custom_theme_colors_style_tag() {
    
    if ( 'custom' !== get_theme_mod( 'colorscheme' ) && ! is_customize_preview() ) {
        return;
    }

    require( get_parent_theme_file_path( '/includes/functions/customizer-color-patterns.php' ) );

    $hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) ); ?>

    <style id="ntt-custom-theme-colors-style"<?php if ( is_customize_preview() ) { echo ' '. 'data-hue="' . esc_attr( $hue ) . '"'; } ?>>
        <?php echo ntt_customizer_color_patterns(); ?>
    </style>

<?php }
add_action( 'wp_head', 'ntt_custom_theme_colors_style_tag' );