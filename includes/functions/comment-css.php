<?php
function ntt_get_comment_css( $class='' ) {   
    
    $classes = array();
    $comment_id = get_comment_ID();

    $r_defaults = array(
        'comment-'. $comment_id,
        'p-comment',
        'h-entry',
        'cp',
    );
    
    foreach ( $r_defaults as $css ) {
        $classes[] = $css;
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
    $classes = apply_filters( 'ntt_comment_css_wp_filter', $classes, $class );
 
    return array_unique( $classes );
}