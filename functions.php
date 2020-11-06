<?php
/**
 * Classes
 */
$ntt_r_classes = array(
    'class-script-loader',
);

foreach ( $ntt_r_classes as $ntt_class ) {
    require( get_parent_theme_file_path( '/classes/'. $ntt_class. '.php' ) );
}

/**
 * Functions
 */
$ntt_r_functions = array(
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

foreach ( $ntt_r_functions as $ntt_function ) {
    require( get_parent_theme_file_path( '/includes/functions/'. $ntt_function. '.php' ) );
}

/**
 * Tags
 */
$ntt_r_tags = array(
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
    'entry-category-name',
    'entry-content',
    'entry-content-navigation',
    'entry-count',
    'entry-datetime',
    'entry-footer',
    'entry-full-content',
    'entry-header-structure',
    'entry-header',
    'entry-heading',
    'entry-main',
    'entry-meta',
    'entry-navigation',
    'entry-sub-content-navigation',
    'entry-excerpt-content',
    'entry-taxonomy',
    'entry-trimmed-content',
    'view-details-action',
);

foreach ( $ntt_r_tags as $ntt_tag ) {
    require( get_parent_theme_file_path( '/includes/tags/'. $ntt_tag. '.php' ) );
}