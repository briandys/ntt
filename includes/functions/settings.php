<?php
/**
 * WP Theme Settings
 */
function ntt__wp_theme() {
    
    load_theme_textdomain( 'ntt' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    
    add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );
    
    add_image_size( 'ntt-large', 1920, 1440 );
    add_image_size( 'ntt-medium', 1280, 960 );
    add_image_size( 'ntt-medium-hd', 1280, 800 );
    add_image_size( 'ntt-small', 1024, 768 );
    add_image_size( 'ntt-thumbnail', 640, 480 );

    add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);
    
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

    // Add support for full and wide align images.
    add_theme_support( 'align-wide' );

    /*
	 * Adds `async` and `defer` support for scripts registered or enqueued
	 * by the theme.
	 */
	$loader = new NTT_Script_Loader();
	add_filter( 'script_loader_tag', array( $loader, 'ntt__function__filter_script_loader_tag' ), 10, 2 );
}
add_action( 'after_setup_theme', 'ntt__wp_theme' );

/**
 * Content Width
 */
function ntt__function__content_width() {
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters( 'ntt_content_width_filter', 640 );
}
add_action( 'after_setup_theme', 'ntt__function__content_width', 0 );

/**
 * Custom Image Size
 *
 * Adds an option in Dashboard
 */
function ntt__function__custom_image_size_option( $sizes ) {
    $custom_sizes = array( 'ntt-hd-thumbnail' => 'Thumbnail (16:9)', );
    return array_merge( $sizes, $custom_sizes );
}
add_filter( 'image_size_names_choose', 'ntt__function__custom_image_size_option' );