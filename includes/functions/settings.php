<?php

/**
 * Settings
 */
function ntt_settings() {
    load_theme_textdomain( 'ntt' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    
    if ( ! isset( $content_width ) ) {
        $content_width = 1920;
    }
	
    add_theme_support( 'post-thumbnails' );
    
    add_image_size( 'ntt-large', 1920, 1440 );
    add_image_size( 'ntt-thumbnail', 1280, 960 );
    add_image_size( 'ntt-hd-thumbnail', 1280, 800 );
    
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
 * Custom Image Size
 *
 * Adds an option in Dashboard
 */
function ntt_custom_image_size_option( $sizes ) {
    $custom_sizes = array( 'ntt-hd-thumbnail' => 'Thumbnail (16:9)', );
    return array_merge( $sizes, $custom_sizes );
}
add_filter( 'image_size_names_choose', 'ntt_custom_image_size_option' );