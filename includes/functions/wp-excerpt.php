<?php
function ntt_show_more_action( $excerpt ) {
    $entry_text = __( 'Entry', 'ntt' );
    $entry_id = get_the_id();
    $show_text = _x( 'Show', '->Show<- more of [Entry Name]', 'ntt' );
    $more_text = _x( 'more', 'Show ->more<- of [Entry Name]', 'ntt' );
    $of_text = _x( 'of', 'Show more ->of<- [Entry Name]', 'ntt' );
    $entry_get_the_title = get_the_title( get_the_ID() );
    
    if ( $entry_get_the_title ) {
        $entry_name_text = $entry_get_the_title;
        $entry_name = '<span class="entry-name---txt">'. esc_html( $entry_name_text ). '</span>';
    } else {
        $entry_name_text = $entry_text. ' '. $entry_id;
        $entry_name = '<span class="entry-name---txt"><span class="entry---txt">'. $entry_text. '</span>'. ' '. '<span class="entry-id---txt num">'. $entry_id. '</span></span>';
    }

    $title_attr = $show_text. ' '. $more_text. ' '. $of_text. ' '. $entry_name_text;

    if ( ! is_search() ) {
        $more_hash = '#more-'. get_the_ID();
    } else {
        $more_hash = '';
    }

    $excerpt = '<div class="show-more-axn axn obj" data-name="Show More Action">';
        $excerpt .= '<a href="'. esc_url( get_permalink( get_the_ID() ) ). $more_hash. '" class="show-more-axn---a" title="'. esc_attr( $title_attr ).'">';
            $excerpt .= '<span class="show-more-axn---l"><span class="show---text">Show</span> <span class="more---text">more</span> <span class="of---text">of</span> '. $entry_name. '</span>';
        $excerpt .= '</a>';
    $excerpt .= '</div>';

    return $excerpt;
}

/**
 * <!--more--> Quicktag
 */
function ntt_more_quicktag_excerpt( $excerpt ) {
    
    if ( is_home() || is_page() || is_archive() ) {
        return ntt_show_more_action( $excerpt );
    }
}
add_filter( 'the_content_more_link', 'ntt_more_quicktag_excerpt' );

/**
 * Auto-Excerpt Delimiter
 */
function ntt_auto_excerpt_delimiter( $more ) {
    return '&hellip;';
}
add_filter( 'excerpt_more', 'ntt_auto_excerpt_delimiter' );

/**
 * Manual, Search Excerpt
 */
function ntt_manual_search_excerpt( $excerpt ) {
    
    if ( is_search() ) {
        ?>
        
        <p><a href="<?php echo esc_url( get_permalink( get_the_ID() ) ); ?>" class="content-snippet-link"><?php echo esc_html( $excerpt ); ?></a></p>

        <?php
        echo ntt_show_more_action( $excerpt );
    } else {
        return $excerpt;
    }
}
add_filter( 'get_the_excerpt', 'ntt_manual_search_excerpt' );