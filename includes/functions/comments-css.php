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
     * @param array $classes An array of classes.
     * @param array $class   An array of additional classes.
     */
    $classes = apply_filters( 'ntt_comments_css_wp_filter', $classes, $class );
 
    return array_unique( $classes );
}

function ntt_comments_css( $class='' ) {
    echo join( ' ', ntt_get_comments_css( $class ) );
}

// Add Comments Status CSS
function ntt_status_css_comments_css( $classes ) {
    
    $comments_count = (int) get_comments_number( get_the_ID() );
    
    // Comments Population Status
    if ( $comments_count >= 1 ) {
        $classes[] = 'ntt--comments---populated';
    } else {
        $classes[] = 'ntt--comments---empty';
    }

    // Comment Creation Ability Status
    if ( comments_open() ) {
        $classes[] = 'ntt--comment-creation---1';
    } else {
        $classes[] = 'ntt--comment-creation---0';
    }

    return $classes;
}
add_filter( 'ntt_comments_css_wp_filter', 'ntt_status_css_comments_css' );

add_filter( 'ntt_html_css_wp_filter', function( $classes ) {
    return is_singular() ? ntt_status_css_comments_css( $classes ) : $classes;
} );