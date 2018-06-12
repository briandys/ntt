<?php

function ntt_snap_on_styles_scripts() {

    $name = 'daytime';
    
    wp_enqueue_style( 'ntt-snap-on-style', get_template_directory_uri(). '/snap-on/'. $name. '/assets/styles/'. $name.'.min.css' );
}
add_action('wp_enqueue_scripts', 'ntt_snap_on_styles_scripts', 0);