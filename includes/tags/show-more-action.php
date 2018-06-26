<?php

if ( ! function_exists( 'ntt_show_more_action' ) ) {
    function ntt_show_more_action( $excerpt ) {
        $entry_text = __( 'Entry', 'ntt' );
        $entry_id = get_the_id();
        $show_text = _x( 'Show', 'Object: Show More Action | Usage: >Show< more of <Entry Name>', 'ntt' );
        $more_text = _x( 'more', 'Object: Show More Action | Usage: Show >more< of <Entry Name>', 'ntt' );
        $of_text = _x( 'of', 'Object: Show More Action | Usage: Show more >of< <Entry Name>', 'ntt' );
        
        if ( get_the_title( get_the_ID() ) ) {
            $entry_name_text = get_the_title( get_the_ID() );
            $entry_name = '<span class="entry-name---txt">'. esc_html( $entry_name_text ). '</span>';
        } else {
            $entry_name_text = $entry_text. ' '. $entry_id;
            $entry_name = '<span class="entry-name---txt"><span class="entry---txt txt">'. $entry_text. '</span>'. ' '. '<span class="entry-id---txt num txt">'. $entry_id. '</span></span>';
        }

        $title_attr = $show_text. ' '. $more_text. ' '. $of_text. ' '. $entry_name_text;

        if ( ! is_search() ) {
            $more_hash = '#more-'. get_the_ID();
        } else {
            $more_hash = '';
        }

        $excerpt = '<div class="show-more-axn axn obj" data-name="Show More Action">';
            $excerpt .= '<a href="'. esc_url( get_permalink( get_the_ID() ) ). $more_hash. '" class="show-more-axn---a a" title="'. esc_attr( $title_attr ).'">';
                $excerpt .= '<span class="show-more-axn---l l"><span class="show---txt txt">Show</span> <span class="more---txt txt">more</span> <span class="of---txt txt">of</span> '. $entry_name. '</span>';
            $excerpt .= '</a>';
        $excerpt .= '</div>';

        return $excerpt;
    }
}