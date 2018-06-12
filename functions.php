<?php

// Includes
$r_includes = array(
    'hooks',
    'settings',
    'styles-scripts',
);

foreach ( $r_includes as $file_name ) {
    require( get_parent_theme_file_path( '/includes/'. $file_name. '.php' ) );
}

// Functions
$r_functions = array(
    'body-css',
    'comment-form',
    'custom-fonts',
    'custom-visuals',
    'customizer',
    'customizer-custom-colors',
    'entry-content',
    'entry-css',
    'excerpt',
    'gallery',
    'features',
    'html-css',
    'icons',
    'pingback-header',
    'widgets-asides',
);

foreach ( $r_functions as $file_name ) {
    require( get_parent_theme_file_path( '/includes/functions/'. $file_name. '.php' ) );
}

// Tags
$r_tags = array(
    'breadcrumbs-navigation',
    'comment',
    'comment-actions',
    'comment-author',
    'comment-datetime',
    'comments-actions-snippet',
    'comments-nav',
    'entity-navigation',
    'entries-navigation',
    'entry-actions',
    'entry-author',
    'entry-content-navigation',
    'entry-datetime',
    'entry-navigation',
    'entry-taxonomy',
    'show-more-action',
    'view-name',
);

foreach ( $r_tags as $file_name ) {
    require( get_parent_theme_file_path( '/includes/tags/'. $file_name. '.php' ) );
}

// Snap-On
require( get_parent_theme_file_path( 'snap-ons.php' ) );