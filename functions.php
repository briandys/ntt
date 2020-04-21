<?php
/**
 * Classes
 */

$r_classes = array(
    'class-script-loader',
);

foreach ( $r_classes as $class ) {
    require( get_parent_theme_file_path( '/classes/'. $class. '.php' ) );
}

/**
 * Functions
 */

$r_functions = array(
    'back-compatibility',
    'settings',
    'hooks',
    'styles-scripts',
    'comments-css',
    'comment-form',
    'customizer',
    'custom-visuals',
    'entry-css',
    'excerpt',
    'gallery',
    'pingback-header',
    'view-css',
    'widgets',
);

foreach ( $r_functions as $function ) {
    require( get_parent_theme_file_path( '/includes/functions/'. $function. '.php' ) );
}

/**
 * Tags
 */

$r_tags = array(
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
    'entry-breadcrumbs-navigation',
    'entry-content',
    'entry-content-navigation',
    'entry-count',
    'entry-datetime',
    'entry-footer',
    'entry-full-content',
    'entry-header',
    'entry-heading',
    'entry-main',
    'entry-meta',
    'entry-navigation',
    'entry-sub-content-navigation',
    'entry-summary-content',
    'entry-taxonomy',
);

foreach ( $r_tags as $tag ) {
    require( get_parent_theme_file_path( '/includes/tags/'. $tag. '.php' ) );
}