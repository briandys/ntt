<?php

if ( ! function_exists( 'ntt_entries_nav' ) ) {
    function ntt_entries_nav() {
        
        // Terms Definitions
        $page_term = esc_html__( 'Page', 'ntt' );
        $next_term = esc_html__( 'Next', 'ntt' );
        $previous_term = esc_html__( 'Previous', 'ntt' );
        $page_navi_css = 'page-navi';
        $adjacent_navi_css = 'adjacent-navi';
        
        $l_mu_start = '<span class="entries-navi---l l">';
            $l_mu_start .= '<span class="page---txt txt">Page</span>';
            $l_mu_start .= ' '. '<span class="page-number---txt num txt">';
            $l_mu_end = '</span>';
        $l_mu_end .= '</span>';

        $adjacent_navi_mu = '<span class="entries-navi---l adjacent-navi---l '. sanitize_title( '%1$s' ).'-adjacent-navi---l l" title="%2$s">';
            $adjacent_navi_mu .= '<span class="'. sanitize_title( '%1$s' ).'---txt txt">%1$s</span>';
            $adjacent_navi_mu .= ' '. '<span class="page---txt txt">Page</span>';
        $adjacent_navi_mu .= '</span>';
        
        $next = sprintf( $adjacent_navi_mu,
            esc_html__( 'Next', 'ntt' ),
            esc_attr__( 'Next Page', 'ntt' )
        );
        
        $previous = sprintf( $adjacent_navi_mu,
            esc_html__( 'Previous', 'ntt' ),
            esc_attr__( 'Previous Page', 'ntt' )
        );
        
        if ( get_the_posts_pagination() ) { ?>

            <div role="navigation" class="entries-nav adjacent-nav nav pagination cp" data-name="Entries Navigation">
                <div class="entries-nav---cr">
                
                <?php the_posts_pagination( array(
                    'show_all'              => true,
                    'mid_size'              => 0,
                    'type'                  => 'list',
                    'before_page_number'    => $l_mu_start,
                    'after_page_number'     => $l_mu_end,
                    'next_text'             => $next,
                    'prev_text'             => $previous,
                    'screen_reader_text'    => __( 'Entries Navigation', 'ntt' ),
                ) ); ?>
                
                </div>
            </div>
        <?php }
    }
}