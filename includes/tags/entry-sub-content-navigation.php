<?php
/**
 * Entry Subcontent Navigation
 * 
 * Similar to entries-navigation.php
 * 
 * Navigation to use for pages that display all entries within a specific category.
 */

if ( ! function_exists('ntt__tag__subcontent_nav' ) ) {
    function ntt__tag__subcontent_nav( $total ) {

        $next_page_text = __( 'Next Page', 'ntt' );
        $previous_page_text = __( 'Previous Page', 'ntt' );
        $big_number = 99999999;

        $before_page_number_mu = '<span class="ntt--txt">';
            $before_page_number_mu .= '<span class="ntt--page-text">'. esc_html_x( 'Page', 'Next Page, Previous Page', 'ntt' ). '</span>';
            $before_page_number_mu .= ' '. '<span class="ntt--page-number-txt ntt--num">';
            $after_page_number_mu = '</span>';
        $after_page_number_mu .= '</span>';
        ?>
        
        <div aria-label="<?php esc_attr_e( 'Entry Subcontent', 'ntt' ); ?>" role="navigation" class="ntt--entry-subcontent-nav ntt--nav ntt--cp" data-name="Entry Subcontent Navigation">
            <div class="ntt--entry-subcontent-nav-name ntt--nav-name ntt--obj">
                <span class="ntt--txt"><?php esc_html_e( 'Entry Subcontent Navigation', 'ntt' ); ?></span>
            </div>
            <div class="ntt--entry-subcontent-nav-group ntt--nav-group ntt--cp">
                <?php
                echo paginate_links( array(
                    'base'                  => str_replace( $big_number, '%#%', esc_url( get_pagenum_link( $big_number ) ) ),
                    'format'                => '?paged=%#%',
                    'current'               => max( 1, get_query_var( 'paged' ) ),
                    'total'                 => $total,
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
        </div>
        <?php
    }
}