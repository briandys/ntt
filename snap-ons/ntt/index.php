<?php

function ntt_snap_on_styles_scripts() {

    $name = 'ntt';
    
    wp_enqueue_style( 'ntt-snap-on-style', get_template_directory_uri(). '/snap-ons/'. $name. '/assets/styles/'. $name.'.min.css' );

    wp_enqueue_script( 'ntt-snap-on-script', get_template_directory_uri(). '/snap-ons/'. $name. '/assets/scripts/'. $name.'.js', array( 'jquery', 'ntt-script' ), '0.0.0', true );
}
add_action('wp_enqueue_scripts', 'ntt_snap_on_styles_scripts', 0);

function cm_datetime_year_mod() {
    return 'M';
}
add_filter( 'cm_datetime_year', 'cm_datetime_year_mod' );