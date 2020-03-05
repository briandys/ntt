<?php
/**
 * HTML Wrapper - Support for a custom class attribute in the native gallery shortcode
 * Usage: Use [gallery] shortcode [gallery ids="<ids>" columns="<number of columns>" class="<class name>"] and add class attribute
 * Note: Markup will not appear if class attibute is not present in the shortcode
 * https://wordpress.stackexchange.com/a/208207/59838
 */
function ntt__function__gallery__markup( $html, $attr, $instance ) {
    
    if ( isset( $attr['class'] ) && $class = $attr['class'] ) {
        
        // Unset attribute to avoid infinite recursive loops
        unset( $attr['class'] ); 

        $html = sprintf( '<div class="ntt--gallery ntt--cp %s" data-name="Gallery">%s</div>',
            esc_attr( $class ),
            gallery_shortcode( $attr )
        );
    }
    return $html;
}
add_filter( 'post_gallery', 'ntt__function__gallery__markup', 10, 3 );