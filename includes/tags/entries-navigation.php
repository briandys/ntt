<?php
/**
 * Entries Navigation
 * 
 * Display: Previous | Page 1 | Page 2 | Page 3 | Next | Page 1 of 3
 */

if ( ! function_exists( 'ntt__tag__entries_nav' ) ) {
    function ntt__tag__entries_nav() {

        if ( ! get_the_posts_pagination() ) {
            return;
        }

        global $wp_query;
        $current_page = ( get_query_var('paged') ? get_query_var('paged') : 1 );
        $total_pages = $wp_query->max_num_pages;

        $page_text = _x( 'Page', 'Next Page, Previous Page', 'ntt' );
        $next_page_text = __( 'Next Page', 'ntt' );
        $previous_page_text = __( 'Previous Page', 'ntt' );
        
        $before_page_number_mu = '<span class="ntt--txt">';
            $before_page_number_mu .= '<span class="ntt--page-text">'. esc_html( $page_text ). '</span>';
            $before_page_number_mu .= ' '. '<span class="ntt--page-number-txt ntt--num">';
            $after_page_number_mu = '</span>';
        $after_page_number_mu .= '</span>';
        ?>
        
        <div aria-label="<?php esc_attr_e( 'Entries', 'ntt' ); ?>" role="navigation" id="ntt--entries-nav" class="ntt--entries-nav ntt--nav ntt--cp" data-name="Entries Navigation">
            <div class="ntt--entries-page-indicator ntt--obj" data-name="Entries Page Indicator">
                <span class="ntt--txt">
                    <span class="ntt--page-text"><?php echo esc_html( $page_text ); ?></span>
                    <span class="ntt--current-page-txt ntt--num"><?php echo esc_html( $current_page ); ?></span>
                    <span class="ntt--of-text"><?php echo esc_html_x( 'of', 'Page [Current Page Number] of [Total Pages]', 'ntt' ); ?></span>
                    <span class="ntt--total-pages-txt ntt--num"><?php echo esc_html( $total_pages ); ?></span>
                </span>
            </div>
            <?php
            the_posts_pagination( array(
                'screen_reader_text'    => __( 'Entries Navigation', 'ntt' ),
                'show_all'              => true,
                'mid_size'              => 0,
                'type'                  => 'list',
                'before_page_number'    => $before_page_number_mu,
                'after_page_number'     => $after_page_number_mu,
                'next_text'             => '<span aria-label="'. esc_attr( $next_page_text ).'" title="'. esc_attr( $next_page_text ).'" class="ntt--txt">'. esc_html_x( 'Next', 'Next Page', 'ntt' ).'</span>',
                'prev_text'             => '<span aria-label="'. esc_attr( $previous_page_text ).'" title="'. esc_attr( $previous_page_text ).'" class="ntt--txt">'. esc_html_x( 'Previous', 'Previous Page', 'ntt' ).'</span>',
            ) );
            ?>
        </div>
        <?php 
    }
}