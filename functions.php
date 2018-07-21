<?php

$GLOBALS['ntt_name'] = 'NTT';

// Functions
$r_functions = array(
    
    // First things first
    'settings',
    'hooks',
    'styles-scripts',
    
    'body-css',
    'comments-css',
    'comment-form',
    'custom-visuals',
    'entry-css',
    'excerpt',
    'gallery',
    'features',
    'html-css',
    'icons',
    'pingback-header',
    'widgets-asides',
    'wp-customizer',
    'wp-customizer-custom-colors',
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
    'entry-banner',
    'entry-content',
    'entry-content-navigation',
    'entry-datetime',
    'entry-full-content',
    'entry-heading',
    'entry-meta',
    'entry-navigation',
    'entry-summary-content',
    'entry-taxonomy',
    'show-more-action',
    'view-name',
);

foreach ( $r_tags as $file_name ) {
    require( get_parent_theme_file_path( '/includes/tags/'. $file_name. '.php' ) );
}

require( get_parent_theme_file_path( '/snaps/functions.php' ) );