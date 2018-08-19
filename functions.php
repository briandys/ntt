<?php

$GLOBALS['ntt_name'] = 'NTT';

// Functions
$r_functions = array(
    
    // First things first
    'back-compatibility',
    'settings',
    'hooks',
    'styles-scripts',
    
    'body-css',
    'comments-css',
    'comment-form',
    'custom-visuals',
    'entry-css',
    'gallery',
    'html-css',
    'icons',
    'ntt-features',
    'pingback-header',
    'widgets-asides',
    'wp-customizer',
    'wp-excerpt',
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
    'entity-view-name',
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
    'entry-sub-content-navigation',
    'entry-summary-content',
    'entry-taxonomy',
    'show-more-action',
);

foreach ( $r_tags as $file_name ) {
    require( get_parent_theme_file_path( '/includes/tags/'. $file_name. '.php' ) );
}