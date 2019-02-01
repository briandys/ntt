<?php
if ( ! function_exists( 'ntt_entries_nav' ) ) {
    function ntt_entries_nav() {

        if ( ! get_the_posts_pagination() ) {
            return;
        }

        global $wp_query;
        $current_page = ( get_query_var('paged') ? get_query_var('paged') : 1 );
        $total_pages = $wp_query->max_num_pages;

        $next_term = __( 'Next', 'ntt' );
        $previous_term = __( 'Previous', 'ntt' );
        $page_term = __( 'Page', 'ntt' );
        
        $l_mu_start = '<span class="entries-navi---l">';
            $l_mu_start .= '<span class="entries-navi---glabel page---text">'. esc_html( $page_term ). '</span>';
            $l_mu_start .= ' '. '<span class="entries-navi---txt page-number---txt num">';
            $l_mu_end = '</span>';
        $l_mu_end .= '</span>';

        $adjacent_navi_mu = '<span class="entries-navi---l adjacent-navi---l '. esc_attr( '%2$s' ). '-adjacent-navi---l" title="%3$s">';
            $adjacent_navi_mu .= '<span class="'. esc_attr( '%2$s' ). '---text entries-navi---txt">%1$s</span>';
            $adjacent_navi_mu .= ' '. '<span class="page---text entries-navi---glabel">'. esc_html( $page_term ). '</span>';
        $adjacent_navi_mu .= '</span>';
        
        $next = sprintf( $adjacent_navi_mu,
            esc_html_x( 'Next', '->Next<- Page', 'ntt' ),
            sanitize_title( $next_term ),
            esc_attr__( 'Next Page', 'ntt' )
        );
        
        $previous = sprintf( $adjacent_navi_mu,
            esc_html_x( 'Previous', '->Previous<- Page', 'ntt' ),
            sanitize_title( $previous_term ),
            esc_attr__( 'Previous Page', 'ntt' )
        );
        ?>
        
        <div role="navigation" class="entries-nav adjacent-nav nav pagination cp" data-name="Entries Navigation">
            <div class="entries-nav---cr">
                <?php
                the_posts_pagination( array(
                    'screen_reader_text'    => __( 'Entries Navigation', 'ntt' ),
                    'show_all'              => true,
                    'mid_size'              => 0,
                    'type'                  => 'list',
                    'before_page_number'    => $l_mu_start,
                    'after_page_number'     => $l_mu_end,
                    'next_text'             => $next,
                    'prev_text'             => $previous,
                ) );
                ?>

                <div class="page-indicator obj" data-name="Page Indicator">
                    <div class="l">
                        <span class="page-indicator---glabel"><?php echo $page_term; ?></span>
                        <span class="current-page---txt num"><?php echo $current_page; ?></span>
                        <span class="preposition---txt"><?php esc_html_e( 'of', 'ntt' ); ?></span>
                        <span class="total-pages---txt num"><?php echo $total_pages; ?></span>
                    </div>
                </div>
            </div>
        </div>
        <?php 
    }
}