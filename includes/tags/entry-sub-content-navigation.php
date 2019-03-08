<?php
if ( ! function_exists('ntt_sub_content_nav' ) ) {
    function ntt_sub_content_nav( $total ) {

        $page_term = __( 'Page', 'ntt' );
        
        $l_mu_start = '<span class="page---text">'. esc_html( $page_term ). '</span>';
        $l_mu_start .= ' '. '<span class="page-number---txt num">';
        $l_mu_end = '</span>';

        $adjacent_navi_mu = '<span class="l" title="'. esc_attr( '%2$s' ). '">';
            $adjacent_navi_mu .= '<span class="'. esc_attr( sanitize_title( '%1$s' ) ).'---text">'. esc_html( '%1$s' ). '</span>';
            $adjacent_navi_mu .= ' '. '<span class="page---text">'. esc_html( $page_term ). '</span>';
        $adjacent_navi_mu .= '</span>';
        
        $next = sprintf( $adjacent_navi_mu,
            _x( 'Next', 'Next Page', 'ntt' ),
            __( 'Next Page', 'ntt' )
        );
        
        $previous = sprintf( $adjacent_navi_mu,
            _x( 'Previous', 'Previous Page', 'ntt' ),
            __( 'Previous Page', 'ntt' )
        );
        ?>
        
        <div role="navigation" class="entry-sub-content-nav nav cp" data-name="Entry Sub-Content Navigation">
            <div class="entry-sub-content-nav---cr nav---cr">
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