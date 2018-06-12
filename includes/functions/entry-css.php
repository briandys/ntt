<?php

function ntt_entry_css( $classes ) {
    global $post;
    
    // Generic
    $r_css = array(
        'cm-singular',
        'entry',
        'entry-'. $post->ID,
        'h-entry',
    );
    
    foreach ( $r_css as $css ) {
        $classes[] = esc_attr( $css );
    }

    // Post Thumbnail
    if ( '' !== get_the_post_thumbnail() ) {
        $classes[] = 'banner-visuals--enabled';
    } else {
        $classes[] = 'banner-visuals--disabled';
    }

    // Excerpt Class
    if ( has_excerpt() ) {
        $classes[] = 'excerpt--enabled';
    } else {
        $classes[] = 'excerpt--disabled';
    }

    // Category
    if ( has_category( '', $post->ID ) ) {
        $classes[] = 'category--populated';
    } else {
        $classes[] = 'category--empty';
    }
    
    // Author Avatar
    if ( get_option( 'show_avatars' ) == 0 ) {
        $classes[] = 'author-avatar--disabled';
    }
    if ( get_the_title() ) {
        $classes[] = 'entry-name--populated';
    } else {
        $classes[] = 'entry-name--empty';
    }
    
    return $classes;
}
add_filter( 'post_class', 'ntt_entry_css' );

function ntt_content_none_entry_css() {
    $r = array(
        ' '. 'article',
        ' '. 'post',
        ' '. 'post--empty',
    );
    
    foreach ( $r as $class_name ) {
        echo esc_attr( $class_name );
    }
}
add_action( 'ntt_entry_css_wp_hook', 'ntt_content_none_entry_css');