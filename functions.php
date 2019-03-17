<?php
$GLOBALS['ntt_name'] = 'NTT';

// Functions
$r_functions = array(
    // Primary
    'back-compatibility',
    'settings',
    'hooks',
    'styles-scripts',
    // Secondary
    'comment-css',
    'comments-css',
    'comment-form',
    'custom-visuals',
    'entry-css',
    'gallery',
    'html-css',
    'pingback-header',
    'widgets',
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
    'comments-navigation',
    'entity-navigation',
    'entity-view-heading',
    'entries-navigation',
    'entry-actions',
    'entry-author',
    'entry-banner',
    'entry-content',
    'entry-content-navigation',
    'entry-count',
    'entry-datetime',
    'entry-footer',
    'entry-full-content',
    'entry-header',
    'entry-heading',
    'entry-meta',
    'entry-navigation',
    'entry-sub-content-navigation',
    'entry-summary-content',
    'entry-taxonomy',
);

foreach ( $r_tags as $file_name ) {
    require( get_parent_theme_file_path( '/includes/tags/'. $file_name. '.php' ) );
}