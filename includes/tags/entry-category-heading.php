<?php
/**
 * Entry Category Name
 */
if ( ! function_exists( 'ntt__tag__entry_category_heading' ) ) {    
    function ntt__tag__entry_category_heading( $category_slug = '' ) {

        if ( $category_slug ) {
            $cat_obj = get_category_by_slug( $category_slug ); 
            $cat_name = $cat_obj->name;
            $cat_description = $cat_obj->description;
            $cat_ID = $cat_obj->term_id;
            $cat_link = get_category_link( $cat_ID );

            if ( $cat_description ) {
                $cat_description = '<div class="ntt--category-description ntt--obj">'. esc_html( $cat_description ).'</div>';
            } else {
                $cat_description = '';
            }

            $cat = sprintf( '<div class="ntt--category-heading ntt--cp" data-name="Category Heading"><div class="ntt--category-name ntt--obj"><a href="'. esc_attr( '%2$s' ).'" rel="category tag" title="'. esc_attr( '%1$s' ).'">'. esc_html( '%1$s' ). '</a></div>'. '%3$s'. '</div>',
                $cat_name,
                $cat_link,
                $cat_description
            );

            echo $cat;
        }
    }
}