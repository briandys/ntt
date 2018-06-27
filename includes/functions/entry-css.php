<?php

function ntt_entry_css( $classes ) {
    global $post;
    
    // Default
    $r_css = array(
        'cm-singular',
        'entry',
        'entry-'. $post->ID,
        'h-entry',
    );
    
    foreach ( $r_css as $css ) {
        $classes[] = esc_attr( $css );
    }

    // Entry Security Status / Password Protected
    if ( ! post_password_required() ) {
        $classes[] = 'entry-security--password-unprotected';
    } else {
        $classes[] = 'entry-security--password-protected';
    }
    
    // Post Format
    $r_post_formats = array(
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

    foreach ( $r_post_formats as $post_format ) {

        if ( has_post_format( $post_format ) ) {
            $classes[] = esc_attr( $post_format ). '-post';
        }
    }
        
    // Entry Name / Title
    if ( isset( $post ) ) {

        if ( $post->post_title ) {
            $post_name = $post->post_name;
        } else {
            $post_name = 'entry'. '-'. $post->post_name;
        }

        $classes[] = esc_attr( $post->post_type ). '-entry';
        $classes[] = esc_attr( $post_name. '-'. $post->post_type ). '-entry';
    }

    // Entry Name Population Status
    if ( get_the_title() ) {
        $classes[] = 'entry-name--populated';
    } else {
        $classes[] = 'entry-name--empty';
    }
    
    // Entry Author Avatar Ability Status
    if ( get_option( 'show_avatars' ) == 0 ) {
        $classes[] = 'entry-author-avatar--disabled';
    } else {
        $classes[] = 'entry-author-avatar--enabled';
    }

    // Entry Categories Population Status
    if ( has_category( '', $post->ID ) ) {
        $classes[] = 'entry-categories--populated';
    } else {
        $classes[] = 'entry-categories--empty';
    }
        
    // Entry Category
    foreach ( ( get_the_category( $post->ID ) ) as $category ) {
        $classes[] = esc_attr( $category->category_nicename ). '-category';
    }

    // Entry Tags Population Status
    if ( get_the_tag_list( '', '', '', $post->ID ) ) {
        $classes[] = 'entry-tags--populated';
    } else {
        $classes[] = 'entry-tags--empty';
    }

    // Entry Banner Visuals / Featured Image Ability Status
    if ( '' !== get_the_post_thumbnail() ) {
        $classes[] = 'entry-banner-visuals--enabled';
    } else {
        $classes[] = 'entry-banner-visuals--disabled';
    }

    // Entry Summary Content / Excerpt Ability Status
    if ( has_excerpt() ) {
        $classes[] = 'entry-summary-content--enabled';
    } else {
        $classes[] = 'entry-summary-content--disabled';
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