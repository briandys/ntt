<?php

/**
 * Entry
 */
function ntt_entry_css( $css ) {
    global $post;
    
    // Default
    $r_defaults_css = array(
        'cm-singular',
        'entry',
        'entry-'. $post->ID,
        'h-entry',
    );
    
    foreach ( $r_defaults_css as $default_css ) {
        $css[] = esc_attr( $default_css );
    }
    
    // Post Format
    $r_post_formats_css = array(
        'aside',
        'audio',
        'chat',
        'gallery',
        'link',
        'image',
        'quote',
        'status',
        'video',
    );

    foreach ( $r_post_formats_css as $post_format_css ) {

        if ( has_post_format( $post_format_css ) ) {
            $css[] = esc_attr( $post_format_css. '-post' );
        } else {
            $css[] = 'standard-post';
        }
    }

    // Entry Name Population Status
    if ( get_the_title() ) {
        $css[] = 'entry-name--populated';
    } else {
        $css[] = 'entry-name--empty';
    }
    
    // Entry Author Avatar Ability Status
    if ( get_option( 'show_avatars' ) == 0 ) {
        $css[] = 'entry-author-avatar--disabled';
    } else {
        $css[] = 'entry-author-avatar--enabled';
    }

    // Entry Categories Population Status
    if ( has_category( '', $post->ID ) ) {
        $css[] = 'entry-categories--populated';
    } else {
        $css[] = 'entry-categories--empty';
    }
        
    // Entry Category
    foreach ( ( get_the_category( $post->ID ) ) as $category ) {
        $css[] = esc_attr( $category->category_nicename ). '-category';
    }

    // Entry Tags Population Status
    if ( get_the_tag_list( '', '', '', $post->ID ) ) {
        $css[] = 'entry-tags--populated';
    } else {
        $css[] = 'entry-tags--empty';
    }

    // Entry Banner Visuals / Featured Image Ability Status
    if ( '' !== get_the_post_thumbnail() ) {
        $css[] = 'entry-banner-visuals--enabled';
    } else {
        $css[] = 'entry-banner-visuals--disabled';
    }

    // Entry Summary Content / Excerpt Ability Status
    if ( has_excerpt() ) {
        $css[] = 'entry-summary-content--enabled';
    } else {
        $css[] = 'entry-summary-content--disabled';
    }

    // Entry More Tag
    if ( strpos( $post->post_content, '<!--more-->' ) ) {
        $css[] = 'entry-more-tag--enabled';
    } else {
        $css[] = 'entry-more-tag--disabled';
    }
    
    return $css;
}
add_filter( 'post_class', 'ntt_entry_css' );

/**
 * Empty Entry, 404, 0 Search Results
 */
function ntt_empty_entry_entry_css() {
        
    $r_defaults_css = array(
        'cm-singular',
        'entry',
        'empty-entry',
        'h-entry',
    );
    
    foreach ( $r_defaults_css as $default_css ) {
        $css[] = esc_attr( $default_css );
    }

    echo esc_attr( implode( ' ', $css ) );
}
add_action( 'ntt_empty_entry_css_wp_hook', 'ntt_empty_entry_entry_css');