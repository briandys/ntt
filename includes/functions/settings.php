<?php
/**
 * Settings
 */
function ntt_settings() {
    
    load_theme_textdomain( 'ntt' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    
    add_image_size( 'ntt-large', 1920, 1440 );
    add_image_size( 'ntt-medium', 1280, 960 );
    add_image_size( 'ntt-medium-hd', 1280, 800 );
    
    add_theme_support( 'html5', array(
		'search-form',
		'comment-list',
		'gallery',
		'caption',
     ) );
    
    add_theme_support( 'post-formats', array(
		'aside',
		'gallery',
		'link',
		'image',
		'quote',
		'status',
		'video',
		'audio',
		'chat',
     ) );
	
    add_theme_support( 'customize-selective-refresh-widgets' );
}
add_action( 'after_setup_theme', 'ntt_settings' );

/**
 * Content Width
 */
function ntt_content_width() {
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters( 'ntt_content_width_wp_filter', 640 );
}
add_action( 'after_setup_theme', 'ntt_content_width', 0 );

/**
 * Custom Image Size
 *
 * Adds an option in Dashboard
 */
function ntt_custom_image_size_option( $sizes ) {
    $custom_sizes = array( 'ntt-hd-thumbnail' => 'Thumbnail (16:9)', );
    return array_merge( $sizes, $custom_sizes );
}
add_filter( 'image_size_names_choose', 'ntt_custom_image_size_option' );