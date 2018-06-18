<?php

// Defaults
$GLOBALS['ntt_snaps_name'] = '';
$name = 'ntt';

// Snaps
//$name = 'daytime';
$name = 'misty';

$GLOBALS['ntt_snaps_name'] = $name;

if ( $GLOBALS['ntt_snaps_name'] ) {
    require_once( get_parent_theme_file_path( '/snaps/'. $GLOBALS['ntt_snaps_name']. '/index.php' ) );
}

function ntt_snaps_styles_scripts() {

    wp_enqueue_style( 'ntt-snaps-style', get_template_directory_uri(). '/snaps/'. $GLOBALS['ntt_snaps_name']. '/assets/styles/'. $GLOBALS['ntt_snaps_name'].'.min.css' );

    wp_enqueue_script( 'ntt-snaps-script', get_template_directory_uri(). '/snaps/'. $GLOBALS['ntt_snaps_name']. '/assets/scripts/'. $GLOBALS['ntt_snaps_name'].'.js', array( 'jquery', 'ntt-script' ), null, true );
}
add_action( 'wp_enqueue_scripts', 'ntt_snaps_styles_scripts', 0 );

function ntt_snaps_html_css() {

    echo ' '. $GLOBALS['ntt_snaps_name']. '-snaps';
}
add_action( 'ntt_html_css_wp_hook', 'ntt_snaps_html_css');