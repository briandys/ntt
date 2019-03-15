<?php
/**
 * Sub-Content Navigation
 * 
 * Similar to entries-navigation.php
 * 
 * Navigation to use for pages that display all entries within a specific category.
 */
if ( ! function_exists('ntt_sub_content_nav' ) ) {
    function ntt_sub_content_nav( $total ) {

        $next_text = _x( 'Next', 'Next Page', 'ntt' );
        $previous_text = _x( 'Previous', 'Previous Page', 'ntt' );
        $page_text = _x( 'Page', '[Next / Previous] Page', 'ntt' );
        
        $l_mu_start = '<span class="l">';
        $l_mu_start .= '<span class="page---text">'. esc_html( $page_text ). '</span>';
        $l_mu_start .= ' '. '<span class="page-number---txt num">';
        $l_mu_end = '</span>';
        $l_mu_end .= '</span>';

        $adjacent_navi_mu = '<span title="'. esc_attr( '%3$s' ). '" class="l">';
            $adjacent_navi_mu .= '<span class="'. esc_attr( '%2$s' ). '">'. esc_html( '%1$s' ). '</span>';
            $adjacent_navi_mu .= ' '. '<span class="page---text">'. esc_html( $page_text ). '</span>';
        $adjacent_navi_mu .= '</span>';
        
        $next = sprintf( $adjacent_navi_mu,
            $next_text,
            'next---text',
            $next_text. ' '. $page_text
        );
        
        $previous = sprintf( $adjacent_navi_mu,
            $previous_text,
            'previous---text',
            $previous_text. ' '. $page_text
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