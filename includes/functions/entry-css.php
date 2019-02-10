<?php
// Entry CSS
function ntt_entry_css( $classes ) {
    
    global $post;
    
    // Default
    $r_defaults_css = array(
        'entry-'. $post->ID,
        'entry',
        'h-entry',
        'cm-singular',
        'cp',
    );
    
    foreach ( $r_defaults_css as $default_css ) {
        $classes[] = $default_css;
    }
    
    // Post Formats
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
            $classes[] = $post_format_css. '-post';
        } else {
            $classes[] = 'standard-post';
        }
    }
        
    // Entry Categories
    foreach ( ( get_the_category( $post->ID ) ) as $category ) {
        $classes[] = $category->category_nicename. '-category';
    }
    
    return $classes;
}
add_filter( 'post_class', 'ntt_entry_css' );

// Entry CSS Status Classes
function ntt_entry_css_status_classes( $classes ) {
    
    global $post;

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

    // Entry More Tag Ability Status
    if ( strpos( $post->post_content, '<!--more-->' ) ) {
        $classes[] = 'entry-more-tag--enabled';
    } else {
        $classes[] = 'entry-more-tag--disabled';
    }
    
    return $classes;
}
add_filter( 'post_class', 'ntt_entry_css_status_classes' );

// Entry CSS Status Classes added to HTML Element
add_filter( 'ntt_html_css_wp_filter', function( $classes ) {
    return is_singular() ? ntt_entry_css_status_classes( $classes ) : $classes;
} );

// Empty Entry, 404, 0 Search Results CSS
function ntt_get_empty_entry_css( $class='' ) {   
    
    $classes = array();

    $r_defaults_css = array(
        'empty-entry',
        'entry',
        'h-entry',
        'cm-singular',
        'cp',
    );
    
    foreach ( $r_defaults_css as $default_css ) {
        $classes[] = $default_css;
    }

    if ( ! empty( $class ) ) {
        if ( !is_array( $class ) )
            $class = preg_split( '#\s+#', $class );
        $classes = array_merge( $classes, $class );
    } else {
        // Ensure that we always coerce class to being an array.
        $class = array();
    }
 
    $classes = array_map( 'esc_attr', $classes );

    /**
     * Filters the list of CSS html classes.
     *
     * @since NTT 0.0.91
     *
     * @param array $classes An array of classes.
     * @param array $class   An array of additional classes.
     */
    $classes = apply_filters( 'ntt_empty_entry_css_wp_filter', $classes, $class );
 
    return array_unique( $classes );
}

function ntt_empty_entry_css( $class='' ) {
    echo join( ' ', ntt_get_empty_entry_css( $class ) );
}

function ntt_empty_entry_css_type_classes( $classes ) {
    if ( is_404() ) {
        $classes[] = 'empty-entry-404';
    } else {
        $classes[] = 'empty-entry-zero-search';
    }
    
    return $classes;
}
add_filter( 'ntt_empty_entry_css_wp_filter', 'ntt_empty_entry_css_type_classes' );