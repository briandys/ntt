<?php
if ( ! function_exists( 'ntt_entries_nav' ) ) {
    function ntt_entries_nav() {

        if ( ! get_the_posts_pagination() ) {
            return;
        }

        global $wp_query;
        $current_page = ( get_query_var('paged') ? get_query_var('paged') : 1 );
        $total_pages = $wp_query->max_num_pages;

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
        
        <div role="navigation" class="entries-nav nav cp" data-name="Entries Navigation">
            <div class="entries-nav---cr nav---cr">
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

                <div class="entries-page-indicator obj" data-name="Entries Page Indicator">
                    <span class="l">
                        <span class="page---text"><?php echo esc_html( $page_text ); ?></span>
                        <span class="current-page---txt num"><?php echo esc_html( $current_page ); ?></span>
                        <span class="of---text"><?php echo esc_html_x( 'of', 'Page [Current Page Number] of [Total Pages]', 'ntt' ); ?></span>
                        <span class="total-pages---txt num"><?php echo esc_html( $total_pages ); ?></span>
                    </span>
                </div>
            </div>
        </div>
        <?php 
    }
}