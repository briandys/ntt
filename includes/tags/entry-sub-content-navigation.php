<?php
if ( ! function_exists('ntt_sub_content_nav' ) ) {
    function ntt_sub_content_nav( $total ) {

        $page_term = esc_html__( 'Page', 'ntt' );
        
        $l_mu_start = '<span class="entry-sub-content-navi---l">';
            $l_mu_start .= '<span class="page---text">'. $page_term. '</span>';
            $l_mu_start .= ' '. '<span class="page-number---txt num txt">';
            $l_mu_end = '</span>';
        $l_mu_end .= '</span>';

        $adjacent_navi_mu = '<span class="entry-sub-content-navi---l adjacent-navi---l '. sanitize_title( '%1$s' ).'-adjacent-navi---l" title="%2$s">';
            $adjacent_navi_mu .= '<span class="'. sanitize_title( '%1$s' ).'---txt">%1$s</span>';
            $adjacent_navi_mu .= ' '. '<span class="page---text">'. $page_term. '</span>';
        $adjacent_navi_mu .= '</span>';
        
        $next = sprintf( $adjacent_navi_mu,
            esc_html_x( 'Next', '->Next<- Page', 'ntt' ),
            esc_attr__( 'Next Page', 'ntt' )
        );
        
        $previous = sprintf( $adjacent_navi_mu,
            esc_html_x( 'Previous', '->Previous<- Page', 'ntt' ),
            esc_attr__( 'Previous Page', 'ntt' )
        );

        ?>
        <div role="navigation" class="entry-sub-content-nav nav pagination cp" data-name="Entry Sub-Content Navigation">
            <div class="entry-sub-content-nav---cr">
                <?php
                $big_number = 999999999;
                echo paginate_links( array(
                    'base'                  => str_replace( $big_number, '%#%', esc_url( get_pagenum_link( $big_number ) ) ),
                    'format'                => '?paged=%#%',
                    'current'               => max( 1, get_query_var( 'paged' ) ),
                    'total'                 => $total,
                    'show_all'              => true,
                    'mid_size'              => 0,
                    'type'                  => 'list',
                    'before_page_number'    => $l_mu_start,
                    'after_page_number'     => $l_mu_end,
                    'next_text'             => $next,
                    'prev_text'             => $previous,
                ) );
                ?>
            </div>
        </div>
        <?php
    }
}