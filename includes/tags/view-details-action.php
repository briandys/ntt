<?php
/**
 * View Details Action
 */
if ( ! function_exists( 'ntt__tag__view_details_action' ) ) {
    function ntt__tag__view_details_action() {
        $view_details_of_text = _x( 'View details of', 'View details of Entry Name', 'ntt' );
        
        // Attribute
        if ( get_the_title( get_the_ID() ) ) {
            $view_details_attr = $view_details_of_text. ' '. get_the_title( get_the_ID() );
        } else {
            $view_details_attr = $view_details_of_text. ' '. __( 'Entry', 'ntt' ). ' '. get_the_id();
        }

        $view_details_axn = '<div aria-label="'. esc_attr( $view_details_attr ).'" title="'. esc_attr( $view_details_attr ).'" class="ntt--view-details-axn ntt--axn ntt--obj" data-name="Show More Action">';
            $view_details_axn .= '<a href="'. esc_url( get_permalink( get_the_ID() ) ). '">';
                $view_details_axn .= '<span class="ntt--txt">'. esc_html_x( 'More', 'Show More of Entry', 'ntt' ). '</span>';
            $view_details_axn .= '</a>';
        $view_details_axn .= '</div>';

        return $view_details_axn;
    }
}