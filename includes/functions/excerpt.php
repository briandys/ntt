<?php
/**
 * <!--more--> Quicktag
 */
function ntt__function__more_quicktag_excerpt() {    
    return ntt__tag__view_entry_details_action();
}
add_filter( 'the_content_more_link', 'ntt__function__more_quicktag_excerpt' );

/**
 * Auto-Excerpt Delimiter
 */
function ntt__function__auto_excerpt( $more ) {
    return '&hellip;';
}
add_filter( 'excerpt_more', 'ntt__function__auto_excerpt' );

/**
 * Manual Excerpt, Search Excerpt
 */
function ntt__function__manual_excerpt__search_excerpt( $excerpt ) {
    
    if ( is_search() || is_page() ) {
        $query = apply_filters( 'ntt__wp_filter__manual_excerpt__search_excerpt_query', '' );
        ?>
        <p class="ntt--entry-snippet-content ntt--obj" data-name="Entry Snippet Content">
            <a href="<?php echo esc_url( get_permalink( get_the_ID() ). $query ); ?>"><?php echo wp_kses_post( $excerpt ); ?></a>
        </p>
        <?php
        echo ntt__tag__view_entry_details_action( $excerpt );
    } else {
        return $excerpt;
    }
}
add_filter( 'get_the_excerpt', 'ntt__function__manual_excerpt__search_excerpt' );