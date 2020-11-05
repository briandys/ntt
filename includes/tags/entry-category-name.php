<?php
/**
 * Entry Category Name
 */
if ( ! function_exists( 'ntt__tag__entry_category_name' ) ) {    
    function ntt__tag__entry_category_name( $category_slug = '' ) {

        if ( $category_slug ) {
            $cat_obj = get_category_by_slug( $category_slug ); 
            $cat_name = $cat_obj->name;
            $cat_ID = $cat_obj->term_id;
            $cat_link = get_category_link( $cat_ID );

            $cat = sprintf( '<a href="'. esc_attr( '%2$s' ).'" rel="category tag" title="'. esc_attr( '%1$s' ).'">'. esc_html( '%1$s' ). '</a>',
                $cat_name,
                $cat_link
            );

            echo $cat;
        } else {
            esc_html_e( 'No category', 'ntt' );
        }
    }
}