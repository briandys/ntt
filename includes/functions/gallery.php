<?php
/**
 * HTML Wrapper - Support for a custom class attribute in the native gallery shortcode
 * Usage: Add class attribute to Gallery Shortcode [gallery ids="<ids>" class="<class name>"]
 * https://wordpress.stackexchange.com/a/208207/59838
 */
function ntt_gallery_wrapper( $html, $attr, $instance ) {
    
    if ( isset( $attr['class'] ) && $class = $attr['class'] ) {
        
        // Unset attribute to avoid infinite recursive loops
        unset( $attr['class'] ); 

        $html = sprintf( '<div class="ntt--%s-gallery ntt--gallery cn" data-name="Gallery">%s</div>',
            esc_attr( $class ),
            gallery_shortcode( $attr )
        );
    }
    return $html;
}
add_filter( 'post_gallery', 'ntt_gallery_wrapper', 10, 3 );