<?php
/**
 * Functions
 */

$r_functions = array(
    // Primary
    'back-compatibility',
    'settings',
    'hooks',
    'styles-scripts',
    // Secondary
    'comments-css',
    'comment-form',
    'customizer',
    'custom-visuals',
    'entry-css',
    'excerpt',
    'gallery',
    'html-css',
    'pingback-header',
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

/**
 * List User Defined Functions
 * https://www.php.net/manual/en/function.get-defined-functions.php
 * https://stackoverflow.com/a/10474285
 */
( function() {

    $arr = get_defined_functions()['user'];

    //$arr = array_filter( $arr, function ( $var ) { return ( (stripos( $var, 'ntt' ) !== false) && (stripos( $var, 'css' ) !== false) ); } );
    
    $arr = array_filter( $arr, function ( $var ) { return ( stripos( $var, 'ntt' ) !== false ); } );

    sort($arr);

    foreach( $arr as $func ) {
        echo "<li>". $func. "</li>";
    }
} )();