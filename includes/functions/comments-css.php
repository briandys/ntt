<?php
function ntt__function__comments__css__getter( $class='' ) {   
    
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
    $classes = apply_filters( 'ntt_comments_css_filter', $classes, $class );
 
    return array_unique( $classes );
}

function ntt__function__comments__css( $class='' ) {
    echo join( ' ', ntt__function__comments__css__getter( $class ) );
}

/**
 * Comments Status CSS
 */
function ntt__function__comments_status__css( $classes ) {

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
add_filter( 'ntt_comments_css_filter', 'ntt__function__comments_status__css' );