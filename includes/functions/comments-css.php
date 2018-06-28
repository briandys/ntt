<?php

function comments_css() {
    
    if ( is_singular() ) {
        // Comments
        $comments_count = (int) get_comments_number( get_the_ID() );

        // Comments Population Status
        if ( $comments_count > 1 ) {
            $css[] = 'comments--populated';
        } else {
            $css[] = 'comments--empty';
        }

        // Comments Population Count
        if ( $comments_count == 1 ) {
            $css[] = 'comments--single';
        } elseif ( $comments_count > 1 ) {
            $css[] = 'comments--multiple';
        } elseif ( $comments_count == 0 ) {
            $css[] = 'comments--zero';
        }

        // Comment Creation Ability Status
        if ( comments_open() ) {
            $css[] = 'comment-creation--enabled';
        } else {
            $css[] = 'comment-creation--disabled';
        }

        echo ' '. implode( ' ', $css );
    }
}

function ntt_comments_css() {
    comments_css();
}
add_action( 'ntt_comment_css_wp_hook', 'comments_css');