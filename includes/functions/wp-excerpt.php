<?php

/**
 * <!--more-->
 */
function ntt_more_tag_excerpt( $excerpt ) {
    
    if ( is_home() || is_page() || is_archive() ) {
        return ntt_show_more_action( $excerpt );
    }
}
add_filter( 'the_content_more_link', 'ntt_more_tag_excerpt' );

/**
 * Auto-Excerpt
 */
function ntt_auto_excerpt( $more ) {
    return '&hellip;';
}
add_filter( 'excerpt_more', 'ntt_auto_excerpt' );

/**
 * Manual, Search Excerpt
 */
function ntt_manual_search_excerpt( $excerpt ) {
    
    if ( is_search() ) {
        ?>
        
        <p><a href="<?php echo esc_url( get_permalink( get_the_ID() ) ); ?>" class="content-snippet-link"><?php echo wp_strip_all_tags( $excerpt ); ?></a></p>

        <?php
        echo ntt_show_more_action( $excerpt );
    } else {
        return $excerpt;
    }
}
add_filter( 'get_the_excerpt', 'ntt_manual_search_excerpt' );