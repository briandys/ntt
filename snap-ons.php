<?php

$name = '';

// Change $name to Snap-On name; set only one
$name = 'ntt';
//$name = 'daytime';

if ( $name ) {
    require_once( get_parent_theme_file_path( '/snap-ons/'. $name. '/index.php' ) );
}