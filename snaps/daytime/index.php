<?php

function ntt_snaps_styles_scripts() {

    $name = 'daytime';
    
    wp_enqueue_style( 'ntt-snaps-style', get_template_directory_uri(). '/snaps/'. $name. '/assets/styles/'. $name.'.min.css' );
}
add_action('wp_enqueue_scripts', 'ntt_snaps_styles_scripts', 0);