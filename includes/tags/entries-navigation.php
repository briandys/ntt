<?php
/**
 * Entries Navigation
 */

function ntt__function__entries_nav_pagination( $total_pages = '' ) {

    $page_text = _x( 'Page', 'Page 1, Page 2', 'ntt' );
    $next_page_text = __( 'Next Page', 'ntt' );
    $previous_page_text = __( 'Previous Page', 'ntt' );
    
    $before_page_number_mu = '<span class="ntt--txt">';
        $before_page_number_mu .= '<span class="ntt--page-text">'. esc_html( $page_text ). '</span>';
        $before_page_number_mu .= ' '. '<span class="ntt--page-number-txt ntt--num">';
        $after_page_number_mu = '</span>';
    $after_page_number_mu .= '</span>';

    $next_text_mu = '<span aria-label="'. esc_attr( $next_page_text ).'" title="'. esc_attr( $next_page_text ).'" class="ntt--txt">'. esc_html( $next_page_text ). '</span>';
    $prev_text_mu = '<span aria-label="'. esc_attr( $previous_page_text ).'" title="'. esc_attr( $previous_page_text ).'" class="ntt--txt">'. esc_html( $previous_page_text ). '</span>';

    $pagination = array(
        'main-query' => array(
            'show_all'              => true,
            'mid_size'              => 0,
            'type'                  => 'list',
            'before_page_number'    => $before_page_number_mu,
            'after_page_number'     => $after_page_number_mu,
            'next_text'             => $next_text_mu,
            'prev_text'             => $prev_text_mu,
        ),
        'custom-query' => array(
            'base'                  => str_replace( 99999999, '%#%', esc_url( get_pagenum_link( 99999999 ) ) ),
            'format'                => '?paged=%#%',
            'current'               => max( 1, get_query_var( 'paged' ) ),
            'total'                 => $total_pages,
        ),
    );

    return $pagination;
}

// Entries Navigation Page Indicator
if ( ! function_exists( 'ntt__tag__entries_nav_page_indicator' ) ) {
    function ntt__tag__entries_nav_page_indicator( $current_page = '', $total_pages = '' ) {

        $page_text = _x( 'Page', 'Page 1, Page 2', 'ntt' );

        $mu = '<div class="ntt--entries-page-indicator ntt--obj" data-name="Entries Page Indicator">';
            $mu .= '<span class="ntt--txt">';
                $mu .= '<span class="ntt--page-text">'. esc_html( $page_text ). '</span>';
                $mu .= '<span class="ntt--current-page-txt ntt--num">'. esc_html( $current_page ). '</span>';
                $mu .= '<span class="ntt--of-text">'. esc_html_x( 'of', 'Page [Current Page Number] of [Total Pages]', 'ntt' ). '</span>';
                $mu .= '<span class="ntt--total-pages-txt ntt--num">'. esc_html( $total_pages ). '</span>';
            $mu .= '</span>';
        $mu .= '</div>';

        echo $mu;
    }
}

// Entries Navigation for Main Query
if ( ! function_exists( 'ntt__tag__entries_nav' ) ) {
    function ntt__tag__entries_nav() {

        if ( ! get_the_posts_pagination() ) {
            return;
        }

        global $wp_query;
        $current_page = ( get_query_var('paged') ? get_query_var('paged') : 1 );
        $total_pages = $wp_query->max_num_pages;

        $page_text = _x( 'Page', 'Next Page, Previous Page', 'ntt' );
        ?>
        
        <div aria-label="<?php esc_attr_e( 'Entries', 'ntt' ); ?>" role="navigation" id="ntt--entries-nav" class="ntt--entries-main-nav ntt--entries-nav ntt--nav ntt--cp" data-name="Entries Navigation">
            <?php
            ntt__tag__entries_nav_page_indicator( $current_page , $total_pages );
            the_posts_pagination ( ntt__function__entries_nav_pagination()['main-query'] );
            ?>
        </div>
        <?php 
    }
}

// Entries Navigation for Custom Query
if ( ! function_exists('ntt__tag__entries_custom_nav' ) ) {
    function ntt__tag__entries_custom_nav( $total_pages ) {

        $current_page = ( get_query_var('paged') ? get_query_var('paged') : 1 );        
        $page_text = _x( 'Page', 'Next Page, Previous Page', 'ntt' );
        ?>

        <div aria-label="<?php esc_attr_e( 'Entries', 'ntt' ); ?>" role="navigation" id="ntt--entries-nav" class="ntt--entries-custom-nav ntt--entries-nav ntt--nav ntt--cp" data-name="Entries Navigation">
            <?php
            ntt__tag__entries_nav_page_indicator( $current_page , $total_pages );
            echo paginate_links( array_merge( ntt__function__entries_nav_pagination( $total_pages )['main-query'], ntt__function__entries_nav_pagination( $total_pages )['custom-query'] ) ); ?>
        </div>
        <?php
    }
}