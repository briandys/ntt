<?php
/**
 * Show More Action
 */
function ntt__function__show_more_action() {
    $show_more_of_text = _x( 'Show more of', 'Show more of Entry Name', 'ntt' );
    
    // Show More Attribute
    if ( get_the_title( get_the_ID() ) ) {
        $show_more_attr = $show_more_of_text. ' '. get_the_title( get_the_ID() );
    } else {
        $show_more_attr = $show_more_of_text. ' '. __( 'Entry', 'ntt' ). ' '. get_the_id();
    }

    $show_more_axn = '<div aria-label="'. esc_attr( $show_more_attr ).'" title="'. esc_attr( $show_more_attr ).'" class="ntt--show-more-axn ntt--axn ntt--obj" data-name="Show More Action">';
        $show_more_axn .= '<a href="'. esc_url( get_permalink( get_the_ID() ) ). '">';
            $show_more_axn .= '<span class="ntt--txt">'. esc_html_x( 'More', 'Show More of Entry', 'ntt' ). '</span>';
        $show_more_axn .= '</a>';
    $show_more_axn .= '</div>';

    return $show_more_axn;
}

/**
 * <!--more--> Quicktag
 */
function ntt__function__more_quicktag_excerpt() {    
    return ntt__function__show_more_action();
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
    
    if ( is_search() ) {
        ?>
        <p class="ntt--entry-snippet-content ntt--obj" data-name="Entry Snippet Content">
            <a href="<?php echo esc_url( get_permalink( get_the_ID() ) ); ?>"><?php echo esc_html( $excerpt ); ?></a>
        </p>
        <?php
        echo ntt__function__show_more_action( $excerpt );
    } else {
        return $excerpt;
    }
}
add_filter( 'get_the_excerpt', 'ntt__function__manual_excerpt__search_excerpt' );