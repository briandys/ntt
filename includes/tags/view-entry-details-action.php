<?php
/**
 * View Entry Details Action
 */
if ( ! function_exists( 'ntt__tag__view_entry_details_action' ) ) {
    
    function ntt__tag__view_entry_details_action() {
        $text = _x( 'View details of', 'View details of Entry Name', 'ntt' );
        
        // Attribute
        if ( get_the_title( get_the_ID() ) ) {
            $label = $text. ' '. get_the_title( get_the_ID() );
        } else {
            $label = $text. ' '. __( 'Entry', 'ntt' ). ' '. get_the_id();
        }

        $query = apply_filters( 'ntt__wp_filter__view_entry_details_action_query', '' );

        $markup = '<div aria-label="'. esc_attr( $label ).'" title="'. esc_attr( $label ).'" class="ntt--view-entry-details-axn ntt--axn ntt--obj" data-name="Show More Action">';
            $markup .= '<a href="'. esc_url( get_permalink( get_the_ID() ) ). $query. '">';
                $markup .= '<span class="ntt--txt">'. esc_html_x( 'More', 'Show More of Entry', 'ntt' ). '</span>';
            $markup .= '</a>';
        $markup .= '</div>';

        return $markup;
    }
}