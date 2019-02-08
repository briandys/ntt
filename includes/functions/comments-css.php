<?php
function ntt_get_comments_css( $class='' ) {   
    
    $classes = array();

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
    $classes = apply_filters( 'ntt_comments_css_wp_filter', $classes, $class );
 
    return array_unique( $classes );
}

function ntt_comments_css( $class='' ) {
    echo join( ' ', ntt_get_comments_css( $class ) );
}

function ntt_comments_css_status_classes( $classes ) {
    if ( is_singular() ) {
        // Comments
        $comments_count = (int) get_comments_number( get_the_ID() );

        // Comments Population Status
        if ( $comments_count >= 1 ) {
            $classes[] = 'comments--populated';
        } else {
            $classes[] = 'comments--empty';
        }

        // Comments Population Count
        if ( $comments_count == 1 ) {
            $classes[] = 'comments--single';
        } elseif ( $comments_count > 1 ) {
            $classes[] = 'comments--multiple';
        } elseif ( $comments_count == 0 ) {
            $classes[] = 'comments--zero';
        }

        // Comment Creation Ability Status
        if ( comments_open() ) {
            $classes[] = 'comment-creation--enabled';
        } else {
            $classes[] = 'comment-creation--disabled';
        }
    }

    return $classes;
}
add_filter( 'ntt_comments_css_wp_filter', 'ntt_comments_css_status_classes' );

// Comments CSS Status Classes added to HTML Element
add_filter( 'ntt_html_css_wp_filter', function( $classes ) {
    return is_singular() ? ntt_comments_css_status_classes( $classes ) : $classes;
} );